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
        'discount',
        'total',
        'user_des',
        'received_address',
        'shipping_id',
        'payment_type',
        'created_at',
        'updated_at',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id', 'invoice_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function orderdetail(){
        return $this->hasMany(OrderDetail::class, 'order_id', 'order_id');
    }
}
