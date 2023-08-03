<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\CartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;
class UCartController extends Controller
{
    function __construct()
    {
        $this->cartController = new CartController();
    }

    public function index()
    {
        return view('clients.cart.index');
    }

    public function showCartList(string $id) {
        $cartItemList = $this->cartController->getUserCartItemList($id);
        return view('clients.cart.index',  ['cartItemList' => $cartItemList['data']]);
    }
}
