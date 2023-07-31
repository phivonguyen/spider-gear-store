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
        'order_id',
        'voucher_discount',
        'qty_in_stock',
    ];

    public function order()
    {
        return $this->hasMany(Order::class, 'oder_id', 'order_id');
    }
}
