<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\OrderDetailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UCheckSuccessController extends Controller
{
    function __construct()
    {
        $this->orderDetailController = new OrderDetailController();
    }

    public function index()
    {
        $orderId = Session::get('orderId');
        $orderDetails = $this->orderDetailController->getOrderDetail($orderId);

        return view('clients.check-out-success.index', ['orderDetails' =>$orderDetails]);
    }
}
