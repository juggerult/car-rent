<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends BaseController
{
 
     public function indexMain(){
          return view('templates.user_header') .view('userFolder.private');
     }

     public function main(){
          
          $cars = $this->serviceGET->getAllCars("1");

          return view('templates.user_header') .view('welcome', compact('cars'));
     }

     public function carPrivate($id){
          
          $car = $this->serviceGET->getCarById($id);

          return view('templates.user_header') .view('userFolder.carPrivate', compact('car'));
     }
}
