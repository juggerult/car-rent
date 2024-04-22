<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentSession extends Model
{
    use HasFactory;
    protected $table = 'rent_session';
    protected $fillable = [
        'date_start',
        'date_end',
        'price',
        'car_id',
        'tenant_id',
        'payment_type',
        'isPledgeReturned',
        'isActive',
    ];

    public function car(){
        return $this->belongsTo(Car::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
