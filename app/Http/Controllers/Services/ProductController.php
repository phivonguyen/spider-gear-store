<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    private function returnData($product)
    {
        if ($product->count() === 0) {
            return Payload::toJson(null, 'Data Not Found', 404);
        }

        return Payload::toJson(ProductResource::collection($product), 'Ok', 200);
    }

    public function getAllProduct()
    {
        $product = Product::all();

        return $this->returnData($product);
    }

    public function getProductById(string $id)
    {
        $product = Product::where('product_id', '=', $id)->first();

        return Payload::toJson(new ProductResource($product), 'Ok', 200);
    }

    public function getProductByCategory(int $id)
    {
        $product = Product::where('category_id', '=', $id)->get();

        return $this->returnData($product);
    }

    public function getProductByBrand(int $id)
    {
        $product = Product::where('brand_id', '=', $id)->get();

        return $this->returnData($product);
    }

    public function getProductByPrice(float $from, float $to)
    {
        $product = Product::where('price', '>=', $from)->where('price', '<=', $to)->get();

        return $this->returnData($product);
    }
}
