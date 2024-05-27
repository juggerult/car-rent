<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagementController extends BaseController
{
    public function index()
    {
        return view('templates.admin_header').view('managemetFolder.main');
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
}
