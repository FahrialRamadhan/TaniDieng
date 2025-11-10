<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('home');
})->name('home');

//    Route::get('/login', function () {
//      return view('login');
//    })->name('login');

// Route Baru Pake controller
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

//    Route::get('/register', function () {
//      return view('register');
//    })->name('register');

// Route baru pakai controller
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');


Route::get('/forgetps', function () {
    return view('forgetps');
})->name('forgetps');

//logout bray
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/tentang', function () {
    return view('tentang');
})->name('tentang');

Route::get('/bantuan', function () {
    return view('bantuan');
})->name('bantuan');

Route::get('/product', function () {
    return view('product');
})->name('product');

Route::get('/produsen', function () {
    return view('produsen');
})->name('produsen');