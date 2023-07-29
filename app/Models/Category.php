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
        return $this->belongsTo(Product::class, 'category_id', 'category_id');
    }
    public function headphone()
    {
        return $this->belongsTo(Headphone::class, 'category_id', 'category_id');
    }
    public function laptop()
    {
        return $this->belongsTo(Laptop::class, 'category_id', 'category_id');
    }
    public function mouse()
    {
        return $this->belongsTo(Mouse::class, 'category_id', 'category_id');
    }

}