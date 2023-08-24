<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;
    protected $table = 'voucher';

    protected $fillable = [
        'voucher_id',
        'code',
        'voucher_type',
        'voucher_discount',
        'qty_in_stock',
        'expire_date'
    ];

    public function order()
    {
        return $this->hasMany(Order::class, 'oder_id', 'order_id');
    }
}