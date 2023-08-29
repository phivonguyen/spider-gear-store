<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cpu extends Model
{
    use HasFactory;

    protected $table = 'cpus';

    protected $fillable = [
        'id',
        'name',
        'brand_id',
        'model',
        'threads',
        'cores',
        'cache'
    ];

    protected $cast = [];
}
