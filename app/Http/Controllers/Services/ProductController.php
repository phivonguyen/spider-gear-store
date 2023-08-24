<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use App\Http\Payload;
use App\Http\Resources\ImageResource;
use App\Http\Resources\ProductResource;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;

class ProductController extends Controller
{
    private function returnData($product)
    {
        if ($product->count() === 0) {
            return Payload::toJson(null, 'Data Not Found', 404);
        }

        return Payload::toJson(ProductResource::collection($product), 'Ok', 200);
    }

    public function getAllProduct($filterBrand, $perPage, $sortBy, $search)
    {
        $products = Product::where('product_name', 'like', '%'.$search.'%' );
        $products = $this->filter($products, $filterBrand);
        $products = $this->sortAndPaginate($products,  $sortBy, $perPage, $search);

        return $this->returnData($products);
    }

    public function getProductByCategoryName($filterBrand, $categoryName, $perPage, $sortBy)
    {
        $category = Category::where('category_name', $categoryName)->first();
        $products = $category->product();
        $products = $this->filter($products, $filterBrand);

        $products = $this->sortAndPaginate($products, $sortBy, $perPage, '');
        return $this->returnData($products);
    }

    public function filter($products, $filterBrand) {
        $brands = $filterBrand;
        $brand_ids = array_keys($brands);
        $products = $brand_ids != null ? $products->WhereIn('brand_id', $brand_ids) : $products;
        return $products;
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

    public function getRandomRelatedProductByCategoryID($categoryId){
        $randomRelatedProduct = Product::where('category_id', $categoryId)->inRandomOrder()->limit(4)->get();
        return $this->returnData($randomRelatedProduct);
    }

    public function sortAndPaginate($product, $sortBy, $perPage, $search) {
        switch($sortBy) {
            case 'latest':
                $product = $product->orderBy('category_id')
                                    ->orderBy('brand_id');
                break;
            case 'oldest':
                $product = $product->orderBy('category_id')
                                    ->orderByDesc('brand_id');
                break;
            case 'name-ascending':
                $product = $product->orderBy('product_name');
                break;
            case 'name-descending':
                $product = $product->orderByDesc('product_name');
                break;
            case 'price-ascending':
                $product = $product->orderBy('product_price');
                break;
            case 'price-descending':
                $product = $product->orderByDesc('product_price');
                break;
            default:
                $product = $product->orderBy('category_id')
                                   ->orderBy('brand_id');
        }

        $product = $product->paginate($perPage)
                            ->appends(
                                    [  'sort_by' => $sortBy,
                                       'show' => $perPage,
                                       'search' => $search
                                    ]);
        return $product;
    }



}