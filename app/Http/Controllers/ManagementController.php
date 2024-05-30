<?php

namespace App\Http\Controllers;

use App\Models\RentSession;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class ManagementController extends BaseController
{
    public function index()
    {
        $users = $this->serviceGET->allUsers();
        $cars = $this->serviceGET->getAllCars(2);
        $rents = $this->serviceGET->getAllRents();
        $monthIncome = RentSession::whereBetween('date_start', [now()->startOfMonth(), now()->endOfMonth()])
                  ->sum('price');
        $weekIncome = RentSession::whereBetween('date_start', [now()->startOfWeek(), now()->endOfWeek()])
                  ->sum('price');
        $dayIncome = RentSession::whereDate('date_start', now()->toDateString())
                  ->sum('price');
  
        return view('templates.admin_header').view('managemetFolder.main', compact('users', 'cars', 'rents', 'monthIncome', 'weekIncome', 'dayIncome'));
    }

    public function usersIndex()
    {
        $users = $this->serviceGET->getAllUsers();

        return view('templates.admin_header').view('managemetFolder.users', compact('users'));
    }

    public function carsIndex()
    {

        $cars = $this->serviceGET->getAllCars(2);

        return view('templates.admin_header') .view('managemetFolder.allCar', compact('cars'));
    }
    public function rentSessionIndex()
    {
        $rentSessions = $this->serviceGET->getAllRents();

        return view('templates.admin_header') .view('managemetFolder.rents', compact('rentSessions'));
    }
    public function returnPledge($id)
    {
        $this->servicePOST->returnPledge($id);

        return redirect()->to(route('admin.sessions'))->withErrors(['error' => 'Изменения успешно сохранены']);
    }

    public function editUserIndex($id)
    {
        $user = User::find($id);

        return view('templates.admin_header') .view('managemetFolder.editUser', compact('user'));
    }
    private function getUserForm(Request $request)
    {
        return $request->validate([
            'first_name' => 'required',
            'last_name'=> 'required',
            'phone_number' => 'required',
            'email' => 'required|email',
            'balance' => 'required',
            'status' => 'required',
        ]);
    }
    public function saveEditUser(Request $request, $id)
    {
        $data = $this->getUserForm($request);

        if($this->checkAvailable($data)) {

            try{
                $this->servicePOST->updateUserManagement($id, $data);
                return redirect()->route('admin.users')->withErrors(['error' => 'Информация обновлена']);
            }catch(Exception $e) {
                return redirect()->route('admin.users')->withErrors(['error' => 'Ошибка базы, попробуйте позже']);
            }
        }
        return redirect()->route('admin.users')->withErrors(['error' => 'Ошибка базы, попробуйте позже']);
    }
    private function checkAvailable($data)
    {
        if (User::where('email', $data['email'])->first()) {
            return redirect()->back()->withErrors(['error' => 'Пользователь с такой почтой уже зарегистрирован']);
        } elseif (User::where('phone_number', $data['phone_number'])->first()) {
            return redirect()->back()->withErrors(['error' => 'Пользователь с таким номером телефона уже зарегистрирован']);
        }

        return true;
    }
    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->isActive = false;
        $user->save();

        return redirect()->back();
    }
    public function returnUser($id)
    {
        $user = User::find($id);
        $user->isActive = true;
        $user->save();

        return redirect()->back();
    }
    public function reviewsIndex()
    {
        $reviews = $this->serviceGET->getAllReview();

        return view('templates.admin_header') .view('managemetFolder.reviews', compact('reviews'));
    }
    public function deleteReview($id)
    {
        try{
            $this->servicePOST->deleteReview($id);

            return redirect()->back();
        }catch(Exception $e) {
            return redirect()->back();
        }
    }
}
