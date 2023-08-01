<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{
    public function getProductList()
    {
        $productList = Product::all();

        if ($productList->isEmpty()) {
            return Payload::toJson(null, 'Data Not Found', 404);
        }

        return Payload::toJson(ProductResource::collection($productList), 'Ok', 200);
    }

    public function getProductById(string $id) {
        $product = Product::where('product_id', $id)->first();
        if ($product->isEmpty()) {
            return Payload::toJson(null, 'Data Not Found', 404);
        }
        return Payload::toJson(ProductResource::collection($product), 'Ok', 200);
    }
}