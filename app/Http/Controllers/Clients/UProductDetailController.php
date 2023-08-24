<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Services\ProductController;
use App\Models\Comment;
use App\Models\ShoppingCartItem;

class UProductDetailController extends Controller
{
    function __construct()
    {
        $this->productController = new ProductController();
        $this->categoryRalatedProducts = '';
    }

    public function index()
    {
        return view('clients.product-detail.index');
    }

    public function showProductDetail(string $id)
    {
        $product = $this->productController->getProductById($id);
        $this->categoryRalatedProducts = $product['data']->category_id;
        $randomRelatedProducts = $this->productController->getRandomRelatedProductByCategoryID($this->categoryRalatedProducts);

        $avgRating = $this->calculateAvgRating($product);
        return view('clients.product-detail.index', [
            'product' => $product,
            'randomRelatedProducts' => $randomRelatedProducts,
            'avgRating' => $avgRating,
        ]);
    }

    public function calculateAvgRating($product) {
        $avgRating = 0;
        $sumRating = array_sum(array_column($product['data']->comment->toArray(), 'rating'));
        $countRating = count($product['data']->comment) ;
        if($countRating != 0){
            $avgRating = $sumRating / $countRating;
        }
    }

    function postComment(Request $request) {
        Comment::create([
            'product_id' => $request->input('product_id'),
            'user_id'=>  $request->input('user_id'),
            'content' => $request->input('content'),
            'rating' => $request->input('rating'),
        ]);

        return redirect()->back();
    }
}
