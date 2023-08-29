<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogImage extends Model
{
    use HasFactory;
    protected $table = 'blogimage';

    protected $fillable = [
        'img_id',
        'blog_id',
        'img_binary',
        'img_create_date',
        'img_update_date'
    ];

    function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id', 'blog_id');
    }
}
