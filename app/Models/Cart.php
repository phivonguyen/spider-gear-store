<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'shoppingcart';

    public function getCartList()
    {

        return DB::table('shoppingcart')
        ->join('shoppingcartitem', 'shoppingcart.shopping_cart_id', '=', 'shoppingcartitem.shopping_cart_id')
        ->join('product', 'product.product_id', '=', 'shoppingcartitem.product_id')
        ->join('productimage', 'product.product_id', '=', 'productimage.product_id')
        ->groupBy('shoppingcartitem.product_id')
        ->select('*')
        ->get();
    }

}