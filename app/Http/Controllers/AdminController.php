<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    
    public function index(){
        return  view('templates.admin_horizontal_header') .view('templates.admin_header').view('managemetFolder.main');
    }
}
