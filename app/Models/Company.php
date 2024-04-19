<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'rent_companies';
    protected $fillable = [
        'name',
        'balance',
        'owner_id',
        'isActive',
        'password',
    ];

    public function cars(){
        return $this->hasMany(Car::class);
    }
    public function owner(){
        return $this->belongsTo(User::class);
    }
    public function logo(){
        return $this->hasOne(LogoCompany::class);
    }
}
