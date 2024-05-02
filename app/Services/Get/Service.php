<?php

namespace App\Services\Get;

use App\Models\Car;
use App\Models\User;

class Service{


     public function getAllUsers(){
          return User::where('status', 'Пользователь')->get();
     }

     public function getAllManagers(){
          return User::where('status', 'Менеджер')->get();
     }

     public function getAllCars(){
          return Car::all();
     }
}