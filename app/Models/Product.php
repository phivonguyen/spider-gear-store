<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
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
        return $this->belongsTo(ProductDescription::class, 'product_id', 'product_id');
    }

    public function productimage()
    {
        return $this->belongsTo(Image::class, 'product_id', 'product_id');
    }

    public function headphone()
    {
        return $this->belongsTo(Headphone::class, 'product_id', 'product_id');
    }

    public function mouse()
    {
        return $this->belongsTo(Mouse::class, 'product_id', 'product_id');
    }

    public function laptop()
    {
        return $this->belongsTo(Laptop::class, 'product_id', 'product_id');
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }




}