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
        'district',
        'city',
        'country',
        'user_update_date',
    ];

    public function user()
    {
        $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
