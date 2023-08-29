<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    use HasFactory;

    protected $table = 'laptops';

    protected $fillable = [
        'id',
        'product_id',
        'brand_id',
        'model',
        'cpu_id',
        'gpu_id',
        'ram_id',
        'hard_drive_id',
        'screen',
        'speaker',
        'camera',
        'connectivity',
        'bluetooth_connection',
        'wifi_connection',
        'os',
        'battery',
        'color',
        'weight',
        'in_the_box',
        'created_at',
        'updated_at'
    ];

    protected $cast = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function cpu()
    {
        $this->belongsTo(Cpu::class, 'cpu_id', 'cpu_id');
    }

    public function gpu()
    {
        $this->belongsTo(Gpu::class, 'gpu_id', 'gpu_id');
    }

    public function ram()
    {
        $this->belongsTo(Ram::class, 'ram_id', 'ram_id');
    }

    public function harddrive()
    {
        $this->belongsTo(HardDrive::class, 'hard_drive_id', 'hard_drive_id');
    }
}
