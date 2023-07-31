<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Headphone extends Model
{
    use HasFactory;

    protected $table = 'headphone';

    protected $fillable = [
        'headphone_id',
        'product_id',
        'category_id',
        'headphone_brand',
        'headphone_model',
        'headphone_type',
        'headphone_color',
        'microphone',
        'impedance',
        'headphone_battery',
        'headphone_itb',
        'headphone_create_date',
        'headphone_update_date'
    ];

    function product()
    {
        $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
}
