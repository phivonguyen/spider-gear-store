<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UHomeController extends Controller
{
    function __construct()
    {
        $this->cartController = new CartController();
        $this->CartId = 1;
    }

    public function index()
    {
        $cartItemList = $this->updateSessionCartList();
        return view('clients.home.index', ['cartItemList'=>$cartItemList]);
    }

    public function updateSessionCartList() {
        $cartItemList = $this->cartController->getUserCartItemList($this->CartId ?? 1);
        if($cartItemList['data'] != null){
            $total = 0;
            foreach($cartItemList['data'] as $item){
                $total += $item['product']->product_price * $item->quantity;
            }
            Session::put(['cartItemList' => $cartItemList, 'total' => $total]);
        }else{
            Session::put(['cartItemList' => [], 'total' => 0]);
        }
    }
}