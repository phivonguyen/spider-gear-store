<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $fillable = [
        'order_id',
        'user_id',
        'invoice_id',
        'order_status',
        'tax',
        'discount',
        'user_des',
        'received_address',
        'shipping_id',
        'order_create_date',
        'order_update_date',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id', 'invoice_id');
    }
}
