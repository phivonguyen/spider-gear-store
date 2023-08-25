<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Services\ProductController;

class UProductDetailController extends Controller
{
    protected $productController;
    function __construct()
    {
        $this->productController = new ProductController();
    }

    public function index()
    {
        return view('clients.product-detail.index');
    }
}
