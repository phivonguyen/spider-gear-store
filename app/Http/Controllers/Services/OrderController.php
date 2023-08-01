<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getOrderList()
    {
        $orderList = Order::all();

        if ($orderList->isEmpty()) {
            return Payload::toJson(null, 'Data Not Found', 404);
        }

        return Payload::toJson(OrderResource::collection($orderList), 'Ok', 200);
    }

    public function getOrderById(string $id)
    {
        $order = Order::where('order_id', $id)->first();

        if ($order->isEmpty()) {
            return Payload::toJson(null, 'Data Not Found', 404);
        }

        return Payload::toJson(OrderResource::collection($order), 'Ok', 200);
    }
}