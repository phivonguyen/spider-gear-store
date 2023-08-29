<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';

    protected $fillable = [
        'id',
        'name',
        'created_at',
        'updated_at'
    ];

    protected $cast = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function cpu()
    {
        return $this->hasMany(Cpu::class, 'brand_id', 'id');
    }

    public function gpu()
    {
        return $this->hasMany(Gpu::class, 'brand_id', 'id');
    }

    public function ram()
    {
        return $this->hasMany(Ram::class, 'brand_id', 'id');
    }

    public function laptop()
    {
        return $this->hasMany(Laptop::class, 'brand_id', 'id');
    }

    public function headphone()
    {
        return $this->hasMany(Headphone::class, 'brand_id', 'id');
    }

    public function mouse()
    {
        return $this->hasMany(Mouse::class, 'brand_id', 'id');
    }
}

