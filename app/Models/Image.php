<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'productimage';

    protected $fillable = [
        'img_id',
        'product_id',
        'img_binary',
        'img_create_date',
        'img_update_date'
    ];

    function product()
    {
        $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
