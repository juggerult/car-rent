<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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
})->name('main');




Route::group([], function () { //Аунтефикация 
    Route::get('/login', [AuthController::class, 'indexLogin'])->name('login');
    Route::get('/registration', [AuthController::class, 'indexRegister'])->name('registration');

    Route::post('/registration', [AuthController::class, 'registration'])->name('post.registration');
    Route::post('/login', [AuthController::class,'login'])->name('post.login');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});




Route::prefix('user')->middleware(['auth'])->group(function () {
    Route::get('/main', [UserController::class,'indexMain'])->name('user.private');

});





Route::prefix('management')->middleware(['auth'])->group(function () {
    Route::get('/', [AdminController::class, 'index']);
});