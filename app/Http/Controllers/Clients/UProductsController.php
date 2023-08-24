<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Services\ProductController;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UProductsController extends Controller
{
    function __construct()
    {
        $this->productController = new ProductController();
    }

    public function index(Request $request)
    {
        $brands = Brand::all();
        $categories = Category::all();

        $filterBrand = $request->input('brand') ?? [];
        $perPage = $request->input('show') ?? '3';
        $sortBy = $request->input('sort_by') ?? 'latest';
        $search = $request->input('search') ?? '';
        $products = $this->productController->getAllProduct($filterBrand,$perPage, $sortBy, $search);
        // return new Response($products, 200, ['Content-Type' => 'application/json']);
        return view('clients.products.index',  ['products' => $products, 'brands' => $brands, 'categories' => $categories]);
    }

    public function filterCategory($categoryName, Request $request){
        $brands = Brand::all();
        $categories = Category::all();

        $filterBrand = $request->input('brand') ?? [];
        $perPage = $request->input('show') ?? '3';
        $sortBy = $request->input('sort_by') ?? 'latest';
        $products = $this->productController->getProductByCategoryName($filterBrand,$categoryName, $perPage, $sortBy);
        return view('clients.products.index',  ['products' => $products, 'brands' => $brands, 'categories' => $categories]);
    }

}