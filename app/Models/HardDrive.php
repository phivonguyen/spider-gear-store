<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HardDrive extends Model
{
    use HasFactory;

    protected $table = 'harddrive';

    protected $fillable = [
        'hard_drive_id',
        'hard_drive_type',
        'hard_drive_capacity'
    ];
}
