<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table = 'blog';

    protected $fillable = [
        'blog_id',
        'user_id',
        'b_category_id',
        'title',
        'content',
        'updated_at',
        'created_at',
        'blogimage',
    ];

    function user()
    {
        $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    function blogcategory()
    {
        $this->belongsTo(BlogCategories::class, 'b_category_id', 'b_category_id');
    }
    function blog_comments()
    {
        $this->hasMany(BlogComments::class, 'blog_id', 'blog_id');
    }

    function blogimage()
    {
        $this->hasMany(BlogImage::class, 'blog_id', 'blog_id');
    }
}
