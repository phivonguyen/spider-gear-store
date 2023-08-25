<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategories extends Model
{
    use HasFactory;

    protected $table = 'blogcategories';

    protected $fillable = [
        'b_category_id',
        'name',
    ];

    public function blogs()
    {
        $this->hasMany(Blog::class, 'b_category_id', 'b_category_id');
    }
}
