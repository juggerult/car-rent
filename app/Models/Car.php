<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = "cars";
    protected $fillable = [
        'description',
        'type',
        'mark',
        'year',
        'gearbox',
        'engine',
        'color',
        'price',
        'isActive',
        'tenant_id',
    ];    

    public function user(){
        return $this->belongsTo(User::class);  
    }
    public function images(){
        return $this->hasMany(CarImage::class);
    }
    public function logo(){
        return $this->hasOne(LogoCar::class);
    }
    public function rentSession(){
        return $this->hasOne(RentSession::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
