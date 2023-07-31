<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;

class UCartController extends Controller
{
    function __construct()
    {
    }

    public function index()
    {
        return view('clients.cart.index');
    }
}
