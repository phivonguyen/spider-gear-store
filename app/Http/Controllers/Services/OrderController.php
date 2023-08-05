<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private function returnData($order)
    {
        if ($order->isEmpty()) {
            return Payload::toJson(null, 'Data Not Found', 404);
        }

        return Payload::toJson(OrderResource::collection($order), 'Ok', 200);
    }

    public function getAllOrder()
    {
        $order = Order::all();

        return $this->returnData($order);
    }

    public function getOrderById(string $id)
    {
        $order = Order::where('order_id', '=', $id)->first();

        return $this->returnData($order);
    }

    public function getOrderByUserId(string $id)
    {
        $order = Order::where('user_id', '=', $id)->get();

        return $this->returnData($order);
    }
}
