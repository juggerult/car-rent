<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends BaseController
{
 
     public function indexMain(){
          return view('templates.user_header') .view('userFolder.private');
     }

     public function main(){
          
          $cars = $this->serviceGET->getAllCars();

          return view('templates.user_header') .view('welcome', compact('cars'));
     }
}
