<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DonateController extends BaseController
{
    public function donateIndex()
    {
        return view('templates.user_header') .view('userFolder.donate');
    }
    public function donate(Request $request)
    {
        $data = $this->getFormDonateDate($request);

        try{
            $user = User::find(Auth::user()->id);
            $user->balance += $data['amount'];
            $user->save();
        }catch(Exception $e) {
            return back()->withErrors(['error' => 'Пользователь с таким номером телефона уже зарегистрирован']);
        }

        return redirect()->to(route('user.private'));
    }
    private function getFormDonateDate(Request $request)
    {
        $data = $request->validate([
            'amount' => 'required',
       ]);

       return $data;
    }
}
