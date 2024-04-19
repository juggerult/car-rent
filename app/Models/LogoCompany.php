<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogoCompany extends Model
{
    use HasFactory;
    protected $table = 'companies_logo';
    protected $fillable = [
        'path',
        'company_id',
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }
}