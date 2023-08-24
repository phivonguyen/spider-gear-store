<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\OrderController as ServicesOrderController;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    function __construct()
    {
        $this->orderController = new ServicesOrderController();
    }

    public function index()
    {
        $orders = $this->orderController->getAllOrder();

        return view('admin.order.index', ['orders' => $orders]);
    }
}
