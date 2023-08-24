<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'first_name',
        'middle_name',
        'last_name',
        'username',
        'password',
        'phone_num',
        'email',
        'dob',
        'role',
        'last_login',
        'updated_at',
        'created_at',
    ];

    public function order()
    {
        return $this->hasMany(Order::class, 'user_id', 'user_id');
    }

    public function address()
    {
        return $this->hasMany(Address::class, 'user_id', 'user_id');
    }

    public function userupdate()
    {
        return $this->hasMany(UserUpdate::class, 'user_id', 'user_id');
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class, 'user_id', 'user_id');
    }
    public function comment()
    {
        return $this->hasMany(Comment::class, 'user_id', 'user_id');
    }
}
