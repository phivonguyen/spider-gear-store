<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
    use HasFactory;
    protected $table = 'productdescription';

    protected $fillable = [
        'product_id',
        'content',
        'des_create_date',
        'des_update_date',
    ];


}