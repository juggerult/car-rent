<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DonateController;
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

Route::get("/", [UserController::class,"main"])->name("main");
Route::get('/about', [UserController::class, 'aboutIndex'])->name('about');
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




Route::prefix('user')->middleware(['auth', 'valid.rent.session'])->group(function () {
    Route::get('/main', [UserController::class,'indexMain'])->name('user.private');

    Route::put('/save/change/user', [UserController::class, 'saveChanges'])->name('save.changes');

    Route::get("/rent/car/{id}", [UserController::class, 'carPrivate'])->name('car.private');
    Route::post('/ger/rent/car/{id}', [UserController::class, 'getRentCar'])->name('get.rent');
    Route::post('/cancel/rent/{id}', [UserController::class, 'cancelRent'])->name('cancel.rent');

    Route::get('/donate', [DonateController::class, 'donateIndex'])->name('donate.index');
    Route::post('/donate', [DonateController::class, 'donate'])->name('donate.post');
});


Route::prefix('management')->middleware(['auth', 'management', 'valid.rent.session'])->group(function () {
    Route::get('/', [ManagementController::class, 'index'])->name('admin.private');
    Route::get('/users', [ManagementController::class, 'usersIndex'])->name('admin.users');
    Route::get('/cars', [ManagementController::class, 'carsIndex'])->name('admin.cars');

    Route::get('/rent-sessions', [ManagementController::class, 'rentSessionIndex'])->name('admin.sessions');
    Route::post('/return-pledge/{id}', [ManagementController::class, 'returnPledge'])->name('return.pledge');

    Route::delete('/delete/user/{id}', [ManagementController::class, 'deleteUser'])->name('delete.user');
    Route::post('/update/user/{id}', [ManagementController::class, 'returnUser'])->name('return.user');
});

Route::prefix('admin')->middleware(['auth', 'admin', 'valid.rent.session'])->group(function () {
    Route::get('/add-new-car', [AdminController::class, 'addNewCarIndex'])->name('add.new.car');
    Route::post('/add-new-car', [AdminController::class,'addNewCar'])->name('post.add.new.car');
    Route::get('/managers', [AdminController::class, 'managersIndex'])->name('admin.managers');

    Route::get('/edit/user/{id}', [ManagementController::class, 'editUserIndex'])->name('edit.user');
    Route::put('/edit/user/{id}', [ManagementController::class, 'saveEditUser'])->name('save.edit.user');

    Route::delete('/delete/car/{id}', [AdminController::class, 'deleteCar'])->name('delete.car');
    Route::post('/update/car/{id}', [AdminController::class, 'returnCar'])->name('return.car');
});