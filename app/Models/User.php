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
    protected $fillable = [
        'first_name',
        'last_name',
        'status',
        'balance',
        'phone_number',
        'isActive',
        'email',
        'password',
    ];
    protected $hidden = [
        'password',
    ];

    public function cars(){
        return $this->hasMany(Car::class);
    }
    public function rentSession(){
        return $this->hasOne(RentSession::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
