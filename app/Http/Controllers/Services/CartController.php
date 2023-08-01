<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Payload;
use App\Models\ShoppingCartItem;
use App\Http\Resources\ShoppingCartItemResource;

class CartController extends Controller
{
    public function getUserCartItemList(string $id)
    {
        $cartItem = ShoppingCartItem::where('shopping_cart_id', '=', $id)->get();

        if ($cartItem->isEmpty()) {
            return Payload::toJson(null, 'Data Not Found', 404);
        }

        return Payload::toJson(ShoppingCartItemResource::collection($cartItem), 'Ok', 200);
    }
}
