<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table = 'invoice';

    protected $fillable = [
        'invoice_id',
        'user_id',
        'order_id',
        'invoice_update_date',
        'invoice_create_date',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'invoice_id', 'invoice_id');
    }
}