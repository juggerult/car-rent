<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   
    public function indexLogin(){
        //if(Auth::check()){
            //return redirect()->to(route('private'));
        //}
        
        return view('userFolder.login_page');
    }
    public function indexRegister(){
        return view('userFolder.register_page');
    }




    private function formRequestData(Request $request){
        $data = $request->validate([
            'first_name' => 'required',
            'last_name'=> 'required',
            'phone_number' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
        ]); 

        return $data;
    }
    private function chechAvailable($data){

    }

    public function registration(Request $request){
        $data = $this->formRequestData($request);

        if($this->chechAvailable($data)){
            
        }
    }
}
