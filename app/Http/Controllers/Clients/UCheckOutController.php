<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Clients\UVnpayController;
use App\Http\Controllers\Services\CartController;
use App\Http\Controllers\Services\VoucherController;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartItem;
use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class UCheckOutController extends Controller
{
    function __construct()
    {
        $this->cartController = new CartController();
        $this->voucherController = new VoucherController();
        $this->vnPayController = new UVnpayController();
        $this->cartId = 1;
        $this->userId = 1;
    }

    public function index()
    {
        $cartItemList = $this->updateSessionCartList();
        $vouchers = $this->voucherController->getVouchers();
        return view('clients.check-out.index', [
            'cartItemList' => $cartItemList,
            'vouchers' => $vouchers
        ]);
    }

    public function addOrder(Request $request) {
        $finalPrice = $request->final_price;
        $order = Order::create([
            'order_id' => rand(),
            'user_id' => 1,
            'order_status' => 'pending',
            'discount' => 10,
            'total' => $finalPrice,
            'user_des' => $request->order_description,
            'received_address' => $request->received_address,
            'shipping_id' => 1,
            'payment_type' => $request->payment_type
        ]);

        foreach(Session::get('cartItemList')['data'] as $item){
            OrderDetail::create([
                'order_id' => $order->order_id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->product_price,
                'total' => $item->quantity * $item->product->product_price,
            ]);
        }

        if($request->payment_type == 'cod'){
            Session::put(['orderId' =>  $order->order_id]);
            $this->sendMail($order);
            $this->deleteAllCartItem();
            Session::forget('voucher');
            return redirect('/checkout-success');
        }

        if($request->payment_type == 'vn_pay'){

            // Save session to a form
            $data = $request->only(['first_name', 'last_name', 'phone', 'email', 'country', 'received_address', 'order_description', 'payment_type']);
            Session::put(['user_data' => $data]);

            $data_url = $this->vnPayController->vn_payment($order->order_id, $finalPrice);
            return redirect()->to($data_url);
        }

    }

    public function vnPayCheck(Request $request) {
        $vnp_ResponseCode =  $request->get('vnp_ResponseCode');
        $vnp_TxnRef =  $request->get('vnp_TxnRef');
        $vnp_Amount =  $request->get('vnp_Amount');

        if($vnp_ResponseCode != null) {
            if($vnp_ResponseCode == 00){
                $order = Order::where('order_id', $vnp_TxnRef)->first();
                $total = Session::get('total');
                $this->sendMail($order);
                $this->deleteAllCartItem();

                Session::forget('voucher');
                Session::forget('user_data');
                Session::put(['orderId' => $vnp_TxnRef]);

                return redirect('/checkout-success');
            }
            else{
                Order::where('order_id', $vnp_TxnRef)->delete();
                return redirect('/checkout')->with('notification', 'Payment failed or canceled. Please try again');
            }
        }
    }

    public function sendMail($order){
        $email_to = $order->user->email ?? 'duyhienn175@gmail.com';
        Mail::send('clients.check-out.email',
                    compact('order'),
                    function($message) use ($email_to){
                        $message->from('spiderStore@gmail.com', 'Spider Store');
                        $message->to($email_to, 'DH');
                        $message->subject('Thank you for your order');
                    }
        );
    }

    public function applyVoucher(Request $request){
        $code = $request->code;
        $voucher = Voucher::where('code', $code)->first();

        if (!$voucher) {
            $response = [
                'success' => false,
                'errorCode' => '3',
                'message' => 'The voucher\'s code does not exist or you have entered it incorrectly',
                'data' => []
            ];
        } else {
            $voucherType =  $voucher->voucher_type;
            $voucherDiscount =  $voucher->voucher_discount;
            $qtyStock = $voucher->qty_in_stock;
            $expireDate = Carbon::parse($voucher->expire_date)->format('Y-m-d');
            $currentDate = Carbon::now()->format('Y-m-d');

            if ($qtyStock === 0) {
                $response = [
                    'success' => false,
                    'errorCode' => '2',
                    'message' => 'Out of stock',
                    'data' => []
                ];
            } elseif ($expireDate < $currentDate) {
                $response = [
                    'success' => false,
                    'errorCode' => '1',
                    'message' => 'The voucher has expired',
                    'data' => []
                ];
            } else {
                $newQuantity = $qtyStock - 1;

                Voucher::where('code', $code)->update(['qty_in_stock' => $newQuantity]);
                Session::put(['voucher' => $voucher]);

                $response = [
                    'success' => true,
                    'message' => 'Apply successfully',
                    'data' => [
                        'code' => $code,
                        'voucherType' => $voucherType,
                        'voucherDiscount' => $voucherDiscount,
                        'expireDate' => $expireDate,
                        'currentDate' => $currentDate
                    ]
                ];
            }
        }
        return response()->json($response);
    }

    public function deleteVoucher($code) {
        $voucher = Voucher::where('code', $code)->first();
        if($voucher){
            Voucher::where('code', $code)->update(['qty_in_stock' => $voucher->qty_in_stock + 1]);
        }
        Session::forget('voucher');
        return redirect('/checkout');
    }

    public function updateSessionCartList() {
        $cartItemList = $this->cartController->getUserCartItemList($this->cartId);
        if($cartItemList['data'] != null){
            $total = 0;
            foreach($cartItemList['data'] as $item){
                $total += $item['product']->product_price * $item->quantity;
            }
            ShoppingCart::where('shopping_cart_id', $this->cartId)
                        ->update(['total' =>  $total]);
            Session::put(['cartItemList' => $cartItemList, 'total' => $total]);
        }else{
            ShoppingCart::where('shopping_cart_id', $this->cartId)
                        ->update(['total' =>  0]);
            Session::put(['cartItemList' => [], 'total' => 0]);
        }
        return $cartItemList;
    }

    public function deleteAllCartItem() {
        ShoppingCartItem::where('shopping_cart_id', $this->cartId)
                        ->delete();
        $this->updateSessionCartList();
    }
}