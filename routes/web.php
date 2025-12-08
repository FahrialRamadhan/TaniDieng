<?php

use App\Models\User;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProdusenProductController;
use App\Http\Controllers\ProdusenController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
// ==================== PUBLIC ====================

// BERANDA – PRODUK TERBARU
Route::get('/', function () {
    $latestProducts = Product::orderBy('created_at', 'desc')
        ->take(8)
        ->get();

    return view('home', compact('latestProducts'));
})->name('home');

Route::get('/tentang', fn() => view('tentang'))->name('tentang');
Route::get('/bantuan', fn() => view('bantuan'))->name('bantuan');

// HALAMAN LIST PRODUK
Route::get('/product', function () {
    $products = Product::orderBy('created_at', 'desc')->get();
    return view('product', compact('products'));
})->name('product');

Route::get('/produk/{product}', [ProductController::class, 'show'])
    ->name('detail.produk');

// ==================== PRODUSEN ====================
Route::get('/produsen', function () {
    $producers = User::whereIn('role', ['produsen', 'pelanggan_produsen'])
        ->orderBy('name')
        ->get();

    return view('produsen', compact('producers'));
})->name('produsen');

Route::get('/produsen/{id}', function ($id) {
    $produsen = User::findOrFail($id);
    return view('viewprodusen', compact('produsen'));
})->name('produsen.detail');

Route::get('/produsen/{user}', [ProdusenController::class, 'show'])
    ->name('produsen.show');


// ==================== KERANJANG (WAJIB LOGIN) ====================
// semua akses keranjang HARUS login, tapi tanpa middleware role

Route::middleware(['auth'])->group(function () {
    Route::get('/keranjang', [CartController::class, 'index'])->name('cart.index');
    Route::post('/keranjang/tambah/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/keranjang/{id}/favorite', [CartController::class, 'toggleFavorite'])->name('cart.favorite');
    Route::delete('/keranjang/{id}', [CartController::class, 'remove'])->name('cart.remove');

    Route::post('/cart/ajax-update', [CartController::class, 'ajaxUpdate'])->name('cart.ajax-update');
    Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

    // alias /cart (opsional)
    Route::get('/cart', [CartController::class, 'index'])->name('cart.page');
});


// ==================== AUTHENTICATED (SEMUA USER LOGIN) ====================

Route::middleware(['auth', 'verified'])->group(function () {

    // /home: tampilkan home lagi (bukan redirect, supaya tidak loop)
    Route::get('/home', function () {
        $latestProducts = Product::orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        return view('home', compact('latestProducts'));
    })->name('home.logged');  // nama beda dengan 'home' utama

    // DASHBOARD PRODUSEN + CRUD PRODUK
    // sementara TANPA middleware role, cek role-nya bisa di controller
    Route::get('/dashboard-produsen', [ProdusenProductController::class, 'index'])
        ->name('dashboard.produsen');

    Route::post('/dashboard-produsen/produk', [ProdusenProductController::class, 'store'])
        ->name('produsen.produk.store');

    Route::get('/dashboard-produsen/produk/{product}/edit', [ProdusenProductController::class, 'edit'])
        ->name('produsen.produk.edit');

    Route::put('/dashboard-produsen/produk/{product}', [ProdusenProductController::class, 'update'])
        ->name('produsen.produk.update');

    Route::delete('/dashboard-produsen/produk/{product}', [ProdusenProductController::class, 'destroy'])
        ->name('produsen.produk.destroy');

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

    Route::patch('/profile/password', [ProfileController::class, 'updatePassword'])
        ->name('profile.password.update');
});

// ==================== AUTH ROUTES (LOGIN, REGISTER, DLL) ====================
require __DIR__ . '/auth.php';
