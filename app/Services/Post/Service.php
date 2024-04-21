<?php

namespace App\Services\Post;

use App\Models\User;

class Service{

     public function registrationUser($data){
          $user = User::create($data);
          $user->password = bcrypt($data["password"]);
          $user->save();
     }


     
}