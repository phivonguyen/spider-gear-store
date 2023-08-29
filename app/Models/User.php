<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'user';

    protected $fillable = [
        'id',
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'username',
        'password',
        'phone_num',
        'role_id',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function order()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public function address()
    {
        return $this->hasMany(Address::class, 'user_id', 'id');
    }

    public function blog()
    {
        return $this->hasMany(Blog::class, 'user_id', 'id');
    }

    public function blog_comments(){
        return $this->hasMany(BlogComments::class, 'user_id', 'id');
    }

    public function userupdate()
    {
        return $this->hasMany(UserUpdate::class, 'user_id', 'id');
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class, 'user_id', 'id');
    }
}
