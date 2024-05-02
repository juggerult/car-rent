<?php

namespace App\Services\Post;

use App\Models\Car;
use App\Models\CarImage;
use App\Models\LogoCar;
use App\Models\User;

class Service{

     public function registrationUser($data){
          $user = User::create($data);
          $user->password = bcrypt($data["password"]);
          $user->save();
     }

     public function addNewCar($data){
          try{
               $car = Car::create($data);
               return $car->id;
          }catch(\Exception $e){
               return $e->getMessage();
          }
     }
     public function addImagesCar($images, $carId){
          if (is_array($images)) {
              if($images['logo'] != null){
                  $newLogoName = uniqid() . '.' .$images['logo']->extension();
                  $images['logo']->move(public_path('images'), $newLogoName);
                  LogoCar::create(['path' => 'images/' . $newLogoName, 'car_id' => $carId]);
              }
      
              foreach($images['images'] as $image){
                  $newImagesName = uniqid() .'.' .$image->extension();
                  $image->move(public_path('images'), $newImagesName);
                  CarImage::create(['path' => 'images/' . $newImagesName, 'car_id' => $carId]);
              }
          }
      }
      
     
}