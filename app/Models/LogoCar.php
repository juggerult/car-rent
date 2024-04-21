<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogoCar extends Model
{
    use HasFactory;
    protected $table = 'car_logo';
    protected $fillable = [
        'path',
        'car_id'
    ];

    public function car(){
        return $this->belongsTo(Car::class);
    }
}
