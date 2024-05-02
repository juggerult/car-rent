<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ManagementController;
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

Route::fallback(function () {
    return view('fallback');
})->name('fallback');



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






Route::prefix('management')->middleware(['auth', 'management'])->group(function () {
    Route::get('/', [ManagementController::class, 'index'])->name('admin.private');
    Route::get('/users', [ManagementController::class, 'usersIndex'])->name('admin.users');
    Route::get('/cars', [ManagementController::class, 'carsIndex'])->name('admin.cars');

});

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {

    Route::get('/add-new-car', [AdminController::class, 'addNewCarIndex'])->name('add.new.car');
    Route::post('/add-new-car', [AdminController::class,'addNewCar'])->name('post.add.new.car');
    Route::get('/managers', [AdminController::class, 'managersIndex'])->name('admin.managers');

});