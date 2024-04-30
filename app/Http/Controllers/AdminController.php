<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends BaseController
{
    
    public function index(){
        return view('templates.admin_header').view('managemetFolder.main');
    }

    public function usersIndex(){

        $users = $this->serviceGET->getAllUsers();

        return view('templates.admin_header').view('managemetFolder.users', compact('users'));
    }
    public function managersIndex(){
        
        $managers = $this->serviceGET->getAllManagers();

        return view('templates.admin_header') .view('managemetFolder.managers', compact('managers'));
    }
}
