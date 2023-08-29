<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gpu extends Model
{
    use HasFactory;

    protected $table = 'gpus';

    protected $fillable = [
        'id',
        'name',
        'brand_id',
        'model',
    ];
}
