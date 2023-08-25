<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogComments extends Model
{
    use HasFactory;

    protected $table = 'blog_comments';

    protected $fillable = [
        'comment_id',
        'blog_id',
        'user_id',
        'content',
        'created_at',
        'updated_at',
    ];

    function blog()
    {
        $this->belongsTo(Blog::class, 'blog_id', 'blog_id');
    }

    function user()
    {
        $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}

