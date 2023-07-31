<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UProductDetailController extends Controller
{
    function __construct()
    {
    }

    public function index()
    {
        return view('clients.product-detail.index');
    }
}
