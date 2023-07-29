<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'address';

    protected $fillable = [
        'user_id',
        'number',
        'street',
        'ward',
        'distric',
        'city',
        'country',
        'user_update_id',
    ];

}
