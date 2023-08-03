<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\ProductController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UProductsController extends Controller
{
    function __construct()
    {
        $this->productController = new ProductController();
    }

    public function index()
    {
        $products = $this->productController->getAllProduct();
        return view('clients.products.index',  ['products' => $products['data']]);
    }

    public function showProductDetail(string $id) {
        $product = $this->productController->getProductById($id);
        return view('clients.product-detail.index', ['product' => $product['data']]);
    }
}