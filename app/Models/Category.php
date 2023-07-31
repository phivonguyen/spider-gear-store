<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';

    protected $fillable = [
        'category_id',
        'category_name'
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'category_id', 'category_id');
    }
    public function headphone()
    {
        return $this->hasMany(Headphone::class, 'category_id', 'category_id');
    }
    public function laptop()
    {
        return $this->hasMany(Laptop::class, 'category_id', 'category_id');
    }
    public function mouse()
    {
        return $this->hasMany(Mouse::class, 'category_id', 'category_id');
    }
}
