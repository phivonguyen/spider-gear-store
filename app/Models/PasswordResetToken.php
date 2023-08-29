<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordResetToken extends Model
{
    use HasFactory;

    protected $table = 'password_reset_tokens';

    protected $fillable = [
        'id',
        'email',
        'guard',
        'token',
        'created_at',
        'updated_at'
    ];

    protected $cast = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
