<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use HasFactory;
    protected $table = 'shipping';

    protected $fillable = [
       'shipping_id',
       'shipping_method',
       'shipping_type',
       'shipping_fee',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'shipping_id', 'shipping_id');
    }

}
