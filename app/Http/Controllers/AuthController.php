<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class AuthController extends BaseController
{
    use HasApiTokens;
    public function indexLogin()
    {
        if(Auth::check()) {
            return redirect(route('user.private'));
        }
        return view('templates.user_header') .view('userFolder.login_page');
    }

    public function indexRegister()
    {
        return view('templates.user_header') .view('userFolder.register_page');
    }

    private function formRequestData(Request $request)
    {
        return $request->validate([
            'first_name' => 'required',
            'last_name'=> 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]); 
    }
    private function loginRequestData(Request $request){
        return $request->only(['email', 'password']);
    }


    private function checkAvailable($data)
    {
        if (User::where('email', $data['email'])->first()) {
            return redirect()->route('registration')->withErrors(['error' => 'Пользователь с такой почтой уже зарегистрирован']);
        } elseif (User::where('phone_number', $data['phone_number'])->first()) {
            return redirect()->route('registration')->withErrors(['error' => 'Пользователь с таким номером телефона уже зарегистрирован']);
        }

        return true;
    }

    public function registration(Request $request)
    {
        $data = $this->formRequestData($request);

        $checkResult = $this->checkAvailable($data);
        
        if ($checkResult === true) {
            try {
                $this->servicePOST->registrationUser($data);    
                return redirect()->route('registration')->withErrors(['error' => 'Пользователь успешно зарегистрирован']);
            } catch (\Exception $e) {
                return redirect()->route('registration')->withErrors(['error' => $e->getMessage()]);
            }
        }
        
        return redirect()->route('.registration')->withErrors(['error' => 'Что то пошло не так, попробуйте позже']);
    }

    public function login(Request $request)
    {
        $requestData = $this->loginRequestData($request);
    
        if (Auth::attempt(['email' => $requestData['email'], 'password' => $requestData['password']])) {
            $user = Auth::user();
            
            if ($user->isActive != true) {
                Auth::logout();
                return redirect()->route('login')->withErrors(['error' => 'Пользователь заблокирован']);
            }
    
            $request->session()->regenerate();
            $token = $user instanceof User ? $user->createToken('auth-token')->plainTextToken : null;
            
            return $this->distributionRole($token);
        
        } else {
            return redirect()->route('login')->withErrors(['error' => 'Неверные данные']);
        }
    }

    private function distributionRole($token){
        switch(Auth::user()->status){
            case 'Пользователь':
                return redirect()->route('user.private')->with('token', $token);
            case 'Менеджер':
                return redirect()->route('admin.private')->with('token', $token);
            case 'Администратор':
               return redirect()->route('admin.private')->with('token', $token);
            default:
            return redirect()->route('login')->withErrors(['error' => 'Что то пошло не так, попробуйте позже']);
        }
    }

    public function logout(Request $request){
        $user = Auth::user();
        if ($user instanceof User) {
            $user->tokens()->delete();
        }

        Auth::logout();
        $request->session()->invalidate();

        return redirect()->route('main');
    }

}
