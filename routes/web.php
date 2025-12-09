<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProdusenController;
use App\Http\Controllers\ProdusenProductController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

// Beranda – Produk terbaru
Route::get('/', function () {
    $latestProducts = Product::orderBy('created_at', 'desc')
        ->take(8)
        ->get();

    return view('home', compact('latestProducts'));
})->name('home');

Route::get('/tentang', fn() => view('tentang'))->name('tentang');
Route::get('/bantuan', fn() => view('bantuan'))->name('bantuan');

// Halaman list produk
Route::get('/product', function () {
    $products = Product::orderBy('created_at', 'desc')->get();

    return view('product', compact('products'));
})->name('product');

// Detail produk
Route::get('/produk/{product}', [ProductController::class, 'show'])
    ->name('detail.produk');


/*
|--------------------------------------------------------------------------
| PRODUSEN (PUBLIK)
|--------------------------------------------------------------------------
*/

// List produsen
Route::get('/produsen', function () {
    $producers = User::whereIn('role', ['produsen', 'pelanggan_produsen'])
        ->orderBy('name')
        ->get();

    return view('produsen', compact('producers'));
})->name('produsen');

// Detail produsen (view statis lama)
Route::get('/produsen/{id}', function ($id) {
    $produsen = User::findOrFail($id);

    return view('viewprodusen', compact('produsen'));
})->name('produsen.detail');

// Detail produsen (via controller)
Route::get('/produsen/{user}', [ProdusenController::class, 'show'])
    ->name('produsen.show');


/*
|--------------------------------------------------------------------------
| KERANJANG (AUTH WAJIB, TANPA ROLE)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/keranjang', [CartController::class, 'index'])
        ->name('cart.index');

    Route::post('/keranjang/tambah/{product}', [CartController::class, 'add'])
        ->name('cart.add');

    Route::post('/keranjang/{id}/favorite', [CartController::class, 'toggleFavorite'])
        ->name('cart.favorite');

    Route::delete('/keranjang/{id}', [CartController::class, 'remove'])
        ->name('cart.remove');

    Route::post('/cart/ajax-update', [CartController::class, 'ajaxUpdate'])
        ->name('cart.ajax-update');

    Route::delete('/cart/clear', [CartController::class, 'clear'])
        ->name('cart.clear');

    // Alias /cart
    Route::get('/cart', [CartController::class, 'index'])
        ->name('cart.page');
});


/*
|--------------------------------------------------------------------------
| AUTHENTICATED (SEMUA USER LOGIN & VERIFIED)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    // /home versi user login (beda nama route agar tidak loop)
    Route::get('/home', function () {
        $latestProducts = Product::orderBy('created_at', 'desc')
            ->take(4)
            ->get();

        return view('home', compact('latestProducts'));
    })->name('home.logged');

    /*
    |----------------------------------------------------------------------
    | DASHBOARD PRODUSEN + CRUD PRODUK
    |   - index  : /dashboard-produsen
    |   - create : /dashboard-produsen/produk/create
    |   - store  : /dashboard-produsen/produk
    |   - hapus  : /dashboard-produsen/produk/hapus (halaman khusus)
    |   - edit   : /dashboard-produsen/produk/{product}/edit
    |   - update : /dashboard-produsen/produk/{product}
    |   - destroy: /dashboard-produsen/produk/{product}
    |----------------------------------------------------------------------
    */

    Route::get('/dashboard-produsen', [ProdusenProductController::class, 'index'])
        ->name('dashboard.produsen');

    // Halaman form tambah (blade baru)
    Route::get('/dashboard-produsen/produk/create', [ProdusenProductController::class, 'create'])
        ->name('produsen.produk.create');

    // Simpan produk baru
    Route::post('/dashboard-produsen/produk', [ProdusenProductController::class, 'store'])
        ->name('produsen.produk.store');

    // Halaman khusus hapus (blade baru)
    Route::get('/dashboard-produsen/produk/hapus', [ProdusenProductController::class, 'hapusIndex'])
        ->name('produsen.produk.hapus');

    // Edit / Update / Delete
    Route::get('/dashboard-produsen/produk/{product}/edit', [ProdusenProductController::class, 'edit'])
        ->name('produsen.produk.edit');

    Route::put('/dashboard-produsen/produk/{product}', [ProdusenProductController::class, 'update'])
        ->name('produsen.produk.update');

    Route::delete('/dashboard-produsen/produk/{product}', [ProdusenProductController::class, 'destroy'])
        ->name('produsen.produk.destroy');

    Route::get('/dashboard-produsen/pembayaran', [ProdusenProductController::class, 'statusPembayaran'])
        ->name('produsen.pembayaran.index');

    // Halaman checkout
    Route::get('/checkout', [\App\Http\Controllers\CheckoutController::class, 'index'])
        ->name('checkout.index');

    // Proses checkout (submit)
    Route::post('/checkout', [\App\Http\Controllers\CheckoutController::class, 'store'])
        ->name('checkout.store');



    /*
    |--------------------------------------------------------------------------
    | PROFIL & ALAMAT
    |--------------------------------------------------------------------------
    */

    // Profil
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

    // Alamat
    Route::post('/profile/address/store', [AddressController::class, 'store'])
        ->name('profile.address.store');

    Route::post('/profile/address/{address}/set-primary', [AddressController::class, 'setPrimary'])
        ->name('profile.address.setPrimary');

    Route::put('/profile/address/{address}/update', [AddressController::class, 'update'])
        ->name('profile.address.update');

    Route::delete('/profile/address/{address}/delete', [AddressController::class, 'destroy'])
        ->name('profile.address.delete');

    // Update password
    Route::patch('/profile/password', [ProfileController::class, 'updatePassword'])
        ->name('profile.password.update');
});


/*
|--------------------------------------------------------------------------
| AUTH ROUTES (LOGIN, REGISTER, DLL)
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
