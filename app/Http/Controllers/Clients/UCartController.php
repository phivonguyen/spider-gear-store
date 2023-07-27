<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;

class UCartController extends Controller
{

    public function index()
    {
        $cart = new Cart();
        $cartList = $cart->getCartList();
        $total = 0;
        foreach($cartList as $item) {
            $total += $item->product_price * $item->quantity;
        }

        $b = DB::table('productimage')
            ->select('product_id', DB::raw('GROUP_CONCAT(img_binary) as url'))
            ->groupBy('product_id')
            ->get();

        foreach($b as $a) {
            $productNames = explode(',', $a->url);
            dd($productNames);
        }



        dd($b);

        return view('clients/cart/index')->with([
            'cartList' => $cartList, 'total' => $total]);
    }

    public function deleteSingleRecord(string $productId){
        $deleted = DB::table('shoppingcartitem')
                    ->where('product_id', $productId)
                    ->delete();
    }

    public function updateQuantity(string $productId, int $quantity ) {
        $affected = DB::table('shoppingcartitem')->where('id', $productId)
        ->update(
                [
                    'quantity'=>$quantity
                ]
        );
    }

    public function checkout() {
        $affected = DB::table('order')->insert([
            'order_id' => '',
            'user_id' => '',
            'invoice_id' => '',
            'order_status' => 'Pending',
            'tax' => '',
            'discount' => '',
            'user_des' => '',
            'received_address' => '',
            'shipping_id' => '',
            'order_create_date' => '',
            ' order_update_date' => ''
        ]);
    }
}