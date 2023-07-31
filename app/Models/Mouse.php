<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mouse extends Model
{
    use HasFactory;

    protected $table = 'mouse';

    protected $fillable = [
        'mouse_id',
        'product_id',
        'category_id',
        'mouse_brand',
        'mouse_model',
        'mouse_connection_type',
        'technology',
        'mouse_color',
        'mouse_led',
        'dpi',
        'mouse_battery',
        'mouse_weight',
        'mouse_create_date',
        'mouse_update_date'
    ];

    function product()
    {
        $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
