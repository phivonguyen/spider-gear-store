<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $table = 'shoppingcart';

    protected $fillable = [
        'shopping_cart_id',
        'user_id',
        'shopping_cart_status',
        'total',
    ];

    public function shoppingcartitem()
    {
        return $this->hasMany(ShoppingCartItem::class, 'shopping_cart_id', 'shopping_cart_id');
    }

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
