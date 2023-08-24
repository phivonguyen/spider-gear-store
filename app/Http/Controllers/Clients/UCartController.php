<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartItem;
use Illuminate\Support\Facades\Session;

class UCartController extends Controller
{
    function __construct()
    {
        $this->cartController = new CartController();
        $this->cartId = 1;
        $this->userId = 1;
    }

    public function index(string $cartId)
    {
        $cartItemList = $this->updateSessionCartList();
        return view('clients.cart.index',  ['cartItemList' => $cartItemList]);
    }

    public function updateSessionCartList() {
        $cartItemList = $this->cartController->getUserCartItemList($this->cartId);
        if($cartItemList['data'] != null && count($cartItemList['data']) > 0){
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

    public function addToCart(Request $request) {
        $shoppingcartId = $request->input('shopping_cart_id');
        $productId = $request->input('product_id');
        $newQuantity = 0;
        $isChecked = false;

        $shoppingCartItems = ShoppingCartItem::where('shopping_cart_id', $this->cartId)->get();
        if($shoppingCartItems !== null && count($shoppingCartItems) > 0){
            foreach($shoppingCartItems as $shoppingCartItem){
                if($shoppingCartItem->product_id === $request->input('product_id')){
                    $newQuantity = $shoppingCartItem->quantity +1;
                    $isChecked = true;
                }
            }
        }

        if($this->userId){
            $shoppingCart = ShoppingCart::where('user_id', $this->userId)->first();
            if (!$shoppingCart) {
                $shoppingCart = ShoppingCart::create([
                    'shopping_cart_id' => rand(),
                    'user_id' => $this->userId,
                    'shopping_cart_status' => 'active',
                    'total' => 0,
                ]);
            }


            if($isChecked){
                ShoppingCartItem::where('product_id', $productId)
                                ->where('shopping_cart_id', $this->cartId)
                                ->update([
                    'quantity' => $newQuantity
                ]);

                $this->updateSessionCartList();
            }
            else{
                ShoppingCartItem::create([
                    'shopping_cart_item_id' => $productId.rand(),
                    'shopping_cart_id' => $this->cartId,
                    'product_id' => $request->input('product_id'),
                    'quantity' => 1,
                ]);

                $this->updateSessionCartList();
            }

        }

        return redirect()->back();
    }

    public function deleteItem($cartItemId) {
        ShoppingCartItem::where('shopping_cart_item_id', $cartItemId)
                        ->delete();
        $this->updateSessionCartList();
        return redirect()->back();
    }

    public function deleteAllCartItem() {
        ShoppingCartItem::where('shopping_cart_id', $this->cartId)
                        ->delete();
        $this->updateSessionCartList();
        return redirect()->back();
    }

    public function updateQty(Request $request){
        $cartItemId = $request->cartItemId;
        $qty = $request->qty;
        if($cartItemId == null && $qty == null){
            return;
        }

        ShoppingCartItem::where('shopping_cart_item_id',$cartItemId)
                         ->update(['quantity' => $qty]);
        $this->updateSessionCartList();

        $response = [
            'success' => true,
            'message' => 'Quantity updated successfully',
            'data' => [
                'cartItemId' => $cartItemId,
                'newQuantity' => $qty
            ]
        ];

        return response()->json($response);
    }
}
