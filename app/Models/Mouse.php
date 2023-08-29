<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mouse extends Model
{
    use HasFactory;

    protected $table = 'mice';

    protected $fillable = [
        'id',
        'product_id',
        'brand_id',
        'model',
        'connection_type',
        'technology',
        'color',
        'led',
        'dpi',
        'created_at',
        'updated_at'
    ];

    protected $cast = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
