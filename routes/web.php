<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/home', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

require __DIR__.'/auth.php';

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

Route::get('/viewprodusen', function () {
    return view('viewprodusen');
})->name('viewprodusen');

Route::get('/viewproduk', function () {
    return view('viewproduk');
})->name('viewproduk');
