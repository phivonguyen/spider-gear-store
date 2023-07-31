<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UProductsController extends Controller
{
    function __construct()
    {
    }

    public function index()
    {
        return view('clients.products.index');
    }
}
