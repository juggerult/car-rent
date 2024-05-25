<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends BaseController
{
 
     public function indexMain()
     {
          $rents = $this->serviceGET->getOneRent(Auth::user()->id);

          return view('templates.user_header') .view('userFolder.private', compact('rents'));
     }

     public function main()
     {
          
          $cars = $this->serviceGET->getAllCars("1");

          return view('templates.user_header') .view('welcome', compact('cars'));
     }

     public function aboutIndex(){
          return view('templates.user_header') .view('about');
     }

     public function carPrivate($id)
     {
          
          $car = $this->serviceGET->getCarById($id);

          return view('templates.user_header') .view('userFolder.carPrivate', compact('car'));
     }

     public function getRentCar($id, Request $request)
     {

          $data = $this->getFormRentData($request);

          if($data['payment_method'] == 'card') {
               $data['price'] = $data['price'] * 0.9;
               $this->paingByCard($data['price']);
          }

          try{
               $this->servicePOST->startRentSession($data, $id);

               return redirect()->route('user.private');
          }catch(\Exception $e){
               return redirect()->back()->withErrors(['error' => "Ошибка аренды, попробуйте через несколько минут, $e"]);
          }
     }
     private function getFormRentData(Request $request)
     {
          $data = $request->validate([
               'start_date' => 'required|date',
               'end_date' => 'required|date|after:start_date',
               'payment_method' => 'required',
               'price' => 'required',
           ]);
          
          $data['isPledgeReturned'] = ($data['payment_method'] === 'cash') ? true : false;
          return $data;
     }
     private function paingByCard($price) 
     {
          if(Auth::user()->balance < $price) {
               return redirect()->route('donate')->withErrors(['error' => 'У вас недостаточно средст на балансе']);
          }

          Auth::user()->balance -= $price;
     }

     public function cancelRent($id)
     {
          $this->servicePOST->cancelRent($id);

          return back();
     }
}
