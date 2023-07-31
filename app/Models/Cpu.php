<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cpu extends Model
{
    use HasFactory;

    protected $table = 'cpu';

    protected $fillable = [
        'cpu_id',
        'cpu_brand',
        'cpu_model',
        'cpu_threads',
        'cpu_cores',
        'cpu_cache'
    ];
}
