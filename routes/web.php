<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProdukController; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

// =============== PUBLIC ===============
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/tentang', fn () => view('tentang'))->name('tentang');
Route::get('/bantuan', fn () => view('bantuan'))->name('bantuan');

// HALAMAN LIST PRODUK  (HANYA SATU ROUTE /product)
Route::get('/product', function () {
    $products = Product::all();
    return view('product', compact('products'));
})->name('product');

Route::get('/produsen', fn () => view('produsen'))->name('produsen');
Route::get('/viewprodusen', fn () => view('viewprodusen'))->name('viewprodusen');

// DETAIL PRODUK DINAMIS
Route::get('/produk/{product}', [\App\Http\Controllers\ProductController::class, 'show'])
    ->name('detail.produk');

// UPDATE JUMLAH KERANJANG
Route::post('/cart/ajax-update', [CartController::class, 'ajaxUpdate'])
     ->name('cart.ajax-update');

// DELETE SEMUA ITEM KERANJANG
Route::delete('/cart/clear', [CartController::class, 'clear'])
    ->name('cart.clear');


// KERANJANG
Route::get('/keranjang', [CartController::class, 'index'])->name('cart.index');
Route::post('/keranjang/tambah/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/keranjang/{id}/favorite', [CartController::class, 'toggleFavorite'])->name('cart.favorite');
Route::delete('/keranjang/{id}', [CartController::class, 'remove'])->name('cart.remove');

// =============== AUTH ===============
Route::middleware(['auth', 'verified'])->group(function () {

    // DASHBOARD PELANGGAN
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    // DASHBOARD PRODUSEN (dengan pengecekan role)
    Route::get('/dashboard-produsen', function () {
        if (! in_array(Auth::user()->role, ['produsen', 'pelanggan_produsen'])) {
            abort(403, 'Anda tidak memiliki hak akses.');
        }
        return view('dashboard-produsen');
    })->name('dashboard.produsen');

    // PROFIL
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ALAMAT
    Route::post('/profile/address/store', [AddressController::class, 'store'])
        ->name('profile.address.store');
    Route::post('/profile/address/{address}/set-primary', [AddressController::class, 'setPrimary'])
        ->name('profile.address.setPrimary');
    Route::put('/profile/address/{address}/update', [AddressController::class, 'update'])
        ->name('profile.address.update');
    Route::delete('/profile/address/{address}/delete', [AddressController::class, 'destroy'])
        ->name('profile.address.delete');

});

// Hanya pelanggan / pelanggan_produsen yang boleh keranjang & checkout
Route::middleware(['auth', 'role:pelanggan,pelanggan_produsen'])->group(function () {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.page'); // optional
    // Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
});

// route auth (login, register, dll)
require __DIR__.'/auth.php';
