<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gpu extends Model
{
    use HasFactory;

    protected $table = 'gpu';

    protected $fillable = [
        'gpu_id',
        'gpu_brand',
        'gpu_model',
        'gpu_ram'
    ];
}
