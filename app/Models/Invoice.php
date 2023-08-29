<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoices';

    protected $fillable = [
        'id',
        'user_id',
        'order_id',
        'created_at',
        'updated_at'
    ];

    protected $cast = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
