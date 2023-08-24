<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\OrderController;
use App\Models\Order;
use Illuminate\Http\Request;

class UCheckProcessingController extends Controller
{
    function __construct()
    {
        $this->userId = 1;
    }

    public function index()
    {
        $orders = Order::where('user_id', $this->userId)
                    ->orderBy('created_at', 'desc')
                    ->get();
        return view('clients.check-processing.index', ['orders' => $orders]);
    }
    public function updateOrderStatus($orderId){
        Order::where('order_id', $orderId)->update([
            'order_status' => 'canceled'
        ]);

        return redirect()->back();
    }
}
