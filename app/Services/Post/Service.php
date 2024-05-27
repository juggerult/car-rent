<?php

namespace App\Services\Post;

use App\Models\Car;
use App\Models\CarImage;
use App\Models\LogoCar;
use App\Models\RentSession;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\Email;

class Service{

     public function registrationUser($data)
     {
          $user = User::create($data);
          $user->password = bcrypt($data["password"]);
          $user->save();
     }

     public function addNewCar($data)
     {
          try{
               $car = Car::create($data);
               return $car->id;
          }catch(\Exception $e){
               return $e->getMessage();
          }
     }
     public function addImagesCar($images, $carId)
     {
          if (is_array($images)) {
               if (isset($images['logo']) && $images['logo']) {
                   $newLogoName = uniqid() . '.' . $images['logo']->extension();
                   $images['logo']->move(public_path('images'), $newLogoName);
                   LogoCar::create(['path' => 'images/' . $newLogoName, 'car_id' => $carId]);
               }
       
               foreach ($images['images'] as $image) {
                   $newImagesName = uniqid() . '.' . $image->extension();
                   $image->move(public_path('images'), $newImagesName);
                   CarImage::create(['path' => 'images/' . $newImagesName, 'car_id' => $carId]);
               }
          }
     }
      
     public function startRentSession($data, $id)
     {
          RentSession::create([
               'date_start' => $data['start_date'],
               'date_end' => $data['end_date'],
               'price' => $data['price'],
               'car_id' => $id,
               'user_id' => Auth::user()->id,
               'payment_type' => $data['payment_method'],
               'isPledgeReturned' => $data['isPledgeReturned'],
               'isActive' => true,
          ]);

          $car = Car::find($id);
          $car->tenant_id = Auth::user()->id;
          $car->save();
     }

     public function cancelRent($id)
     {
          $rentSession = RentSession::find($id);
          $rentSession->isActive = false;

          $car = Car::find($rentSession->car_id);
          $car->tenant_id = null;

          $car->save();
          $rentSession->save();
     }

     public function updateUserInfo($data)
     {
          $user = User::find(Auth::user()->id);
          $user->first_name = $data['first_name'];
          $user->last_name = $data['last_name'];
          $user->email = $data['email'];
          $user->phone_number = $data['phone_number'];
          $user->save();
     }
     public function returnPledge($id)
     {
          $rent = RentSession::find($id);
          $rent->isPledgeReturned = true;

          $user = User::find($rent->user_id);
          $user->balance = $user->balance + $rent->car->price * 7;

          $rent->save();
          $user->save();
     }
     public function paidByCar($price)
     {
          $user = User::find(Auth::user()->id);
          if($user->balance < $price) {
               return false;
          }

          $user->balance = $user->balance - $price;
          $user->save();
     }
}