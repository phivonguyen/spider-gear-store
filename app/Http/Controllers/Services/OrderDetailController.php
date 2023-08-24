<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\OrderDetailResource;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
class OrderDetailController extends Controller
{
    private function returnData($order)
    {
        if ($order->isEmpty()) {
            return Payload::toJson(null, 'Data Not Found', 404);
        }

        return Payload::toJson(OrderDetailResource::collection($order), 'Ok', 200);
    }


    public function getOrderDetail($orderId){
        $order = OrderDetail::where('order_id', $orderId)->get();
        return $this->returnData($order);
    }
}