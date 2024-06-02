<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
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
               
               if(!$this->paingByCard($data['price'])) { 
                    return redirect()->route('donate.index')->withErrors(['error' => 'У вас недостаточно средст на балансе']);
               }
          }

          try{
               $this->servicePOST->startRentSession($data, $id);

               return redirect()->route('user.private');
          }catch(Exception $e){
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
     private function getFormUserData(Request $request)
     {
          $data = $request->validate([
               'first_name' => 'required',
               'last_name' => 'required',
               'email' => 'required',
               'phone_number' => 'required',
          ]);

          return $data;
     }
     private function paingByCard($price) 
     {
          try{
               return $this->servicePOST->paidByCar($price);
          }catch(Exception $e) { 
               return false;
          }
     }

     public function cancelRent($id)
     {
          $this->servicePOST->cancelRent($id);

          return back();
     }
     public function saveChanges(Request $request)
     {
          $data = $this->getFormUserData($request);
          
          if (!$this->checkAvailableData($data)) {
               return redirect()->route('user.private')->withErrors(['error' => 'Пользователь с такой почтой или номером телефона уже зарегистрирован']);
          }

          try{
               $this->servicePOST->updateUserInfo($data);
          }catch(Exception $e) {
               return redirect()->back()->withErrors(['error' => "Технические проблемы, попробуйте позже $e"]);
          }

          return redirect()->back()->withErrors(['error' => 'Изменения успешно сохранены']);
     }
     private function checkAvailableData($data)
     {
          if (User::where('email', $data['email'])->first() && Auth::user()->email != $data['email']) {
               return false;
          } elseif (User::where('phone_number', $data['phone_number'])->first() && Auth::user()->phone_number != $data['phone_number']) {
               return false;
          }
   
          return true;
     }
     public function senReview(Request $request, $id)
     {
          $data = $request->validate([
               'rating' => 'required',
               'text' => 'required',
          ]);

          try{
               $this->servicePOST->sendReview($data, $id);

               return redirect()->back();
          }catch(Exception $e) {
               return redirect()->to(route('fallback'));
          }
     }
}
