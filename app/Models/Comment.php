<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comment';

    protected $fillable = [
        'product_id',
        'user_id',
        'content',
        'rating',
        'created_at',
        'updated_at',
    ];

    function product()
    {
        $this->belongsTo(Product::class, 'product_id', 'product_id');
    }

    function user()
    {
        $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
