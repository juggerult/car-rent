<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------- -----------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/private', function () {
    return view('userFolder.private');
})->name('user.private');




Route::get('/login', [AuthController::class, 'indexLogin'])->name('user.login');
Route::get('/registration', [AuthController::class, 'indexRegister'])->name('user.registration');

Route::post('/registration', [AuthController::class, 'registration'])->name('api.user.registration');
Route::post('/login', [AuthController::class,'login'])->name('api.user.login');

