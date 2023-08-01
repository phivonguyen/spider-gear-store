<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Payload;
use App\Models\ShoppingCartItem;
use App\Http\Resources\ShoppingCartItemResource;
class CartController extends Controller
{
    public function getUserCartItemList(string $cartId)
    {
        $carItemtList = ShoppingCartItem::where('shopping_cart_id', $cartId)->get();

        if ($carItemtList->isEmpty()) {
            return Payload::toJson(null, 'Data Not Found', 404);
        }

        return Payload::toJson(ShoppingCartItemResource::collection($carItemtList), 'Ok', 200);
    }
}