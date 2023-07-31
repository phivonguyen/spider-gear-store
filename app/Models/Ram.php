<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ram extends Model
{
    use HasFactory;

    protected $table = 'ram';

    protected $fillable = [
        'ram_id',
        'ram_amount',
        'ram_slot_left',
    ];

    function laptop()
    {
        $this->hasMany(Laptop::class, 'ram_id', 'ram_id');
    }
}
