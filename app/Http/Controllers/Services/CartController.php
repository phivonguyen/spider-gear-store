<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function getCartByUserId($id)
    {
        $cart = Cart::where('user_id', $id)->first();

        if ($cart == null) {
            return Payload::toJson(null, "Data not found", 404);
        }

        return Payload::toJson(new CartResource($cart), "OK", 200);
    }

    public function getAllItemByCartId($id)
    {
        $cartItems = CartItem::where('cart_id', $id)->get();

        if ($cartItems->isEmpty()) {
            return Payload::toJson(null, "Data not found", 404);
        }

        return Payload::toJson(CartResource::collection($cartItems), "OK", 200);
    }

    public function save($req)
    {
    }

    public function remove($id)
    {
    }

    public function addToCart($user_id, $product_id)
    {
    }
}
