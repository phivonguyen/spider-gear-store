<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';

    protected $fillable = [
        'product_id',
        'product_name',
        'brand_id',
        'category_id',
        'qty_in_stock',
        'product_price'
    ];


    public function productdescription()
    {
        return $this->hasMany(ProductDescription::class, 'product_id', 'product_id');
    }

    public function productimage()
    {
        return $this->hasMany(Image::class, 'product_id', 'product_id');
    }

    public function headphone()
    {
        return $this->hasMany(Headphone::class, 'product_id', 'product_id');
    }

    public function mouse()
    {
        return $this->hasMany(Mouse::class, 'product_id', 'product_id');
    }

    public function laptop()
    {
        return $this->hasMany(Laptop::class, 'product_id', 'product_id');
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function shoppingcartitem() {
        return $this->hasMany(ShoppingCartItem::class, 'product_id', 'product_id');
    }
}