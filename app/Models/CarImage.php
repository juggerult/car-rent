<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarImage extends Model
{
    use HasFactory;
    protected $table = 'car_images';
    protected $fillable = [
        'path',
        'car_id',
    ];

    public function car(){
        return $this->belongsTo(Car::class);
    }
}
