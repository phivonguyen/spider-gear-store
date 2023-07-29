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
        'user_create_date',
        'user_update_id',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'user_id', 'user_id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'user_id', 'user_id');
    }

    public function userupdate()
    {
        return $this->belongsTo(UserUpdate::class, 'user_id', 'user_id');
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'user_id', 'user_id');
    }



}