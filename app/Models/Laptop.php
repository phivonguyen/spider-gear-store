<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    use HasFactory;

    protected $table = 'laptop';

    protected $fillable = [
        'laptop_id',
        'product_id',
        'category_id',
        'laptop_brand',
        'laptop_model',
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
        'laptop_battery',
        'laptop_color',
        'laptop_weight',
        'laptop_itb',
        'laptop_create_date',
        'laptop_update_date'
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
