<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = "cars";
    protected $fillable = [
        'name',
        'description',
        'type',
        'mark',
        'year',
        'gearbox',
        'engine',
        'color',
        'price',
        'isActive',
        'company_owner_id',
        'tenant_id',
    ];    

    public function user(){
        return $this->belongsTo(User::class);  
    }
    public function companyOwner(){
        return $this->belongsTo(Company::class);
    }
    public function images(){
        return $this->hasMany(CarImage::class);
    }
    public function logo(){
        return $this->hasOne(LogoCar::class);
    }
}
