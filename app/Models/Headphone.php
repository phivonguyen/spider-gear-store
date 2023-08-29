<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Headphone extends Model
{
    use HasFactory;

    protected $table = 'headphones';

    protected $fillable = [
        'id',
        'product_id',
        'brand_id',
        'model',
        'type',
        'color',
        'microphone',
        'impedance',
        'battery',
        'in_the_box',
        'created_at',
        'updated_at'
    ];

    protected $cast = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
