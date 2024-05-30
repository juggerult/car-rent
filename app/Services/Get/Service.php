<?php

namespace App\Services\Get;

use App\Models\Car;
use App\Models\RentSession;
use App\Models\Review;
use App\Models\User;

class Service{


     public function getAllUsers(){
          return User::where('status', 'Пользователь')->get();
     }
     public function allUsers()
     {
          return User::all();
     }
     public function getAllManagers(){
          return User::where('status', 'Менеджер')->get();
     }

     public function getAllCars($isActive){
          switch($isActive){
               case "0":
                    return Car::where('isActive', false)->get();
               case "1":
                    return Car::where('isActive', true)->get();
               case "2":
                    return Car::all();
          }
     }
     public function getAllReview()
     {
          return Review::all();
     }

     public function getCarById($id) {
          return Car::where('id', $id)->first();
     }

     public function getAllRents(){
          return RentSession::all();
     }

     public function getOneRent($id){
          return RentSession::where('user_id',$id)->get();
     }
     
}