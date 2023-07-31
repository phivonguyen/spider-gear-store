<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCartItem extends Model
{
    use HasFactory;

    protected $table = 'shoppingcartitem';

    protected $fillable = [
        'shopping_cart_item_id',
        'shopping_cart_id',
        'product_id',
        'quantity',
        'totalPrice'
    ];

    public function shoppingcart()
    {
        $this->belongsTo(ShoppingCart::class, 'shopping_cart_id', 'shopping_cart_id');
    }

    public function product()
    {
        $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
