<?php

use Illuminate\Support\Facades\Route;
use  Inertia\Inertia;
use App\http\Controllers\CustomerController;
use App\http\Controllers\ProjectController;
use App\Http\Controllers\Auth\LoginRegisterController;

Route::get('/', function () {
    return Inertia::render('welcome');
});

/*
Route::get('customers',[Customercontroller::class,'index']);
Route::get('/customers/create',[CustomerController::class,'create']);
Route::post('/customers',[CustomerController::class,'store']);
Route::get('/customers/{customer}/edit',[CustomerController::class,'edit']);
Route::put('/customers/{customer}',[CustomerController::class,'update']);
Route::get('customers/{customer}',[CustomerController::class,'show']);
Route::delete('/customers/{customer}',[CustomerController::class,'destroy']);
*/

Route::resource('/customers', CustomerController::class);
Route::resource('/projects', ProjectController::class);

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});
