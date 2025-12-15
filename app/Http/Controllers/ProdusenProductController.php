<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdusenProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX – DASHBOARD PRODUSEN (LIST PRODUK)
    |--------------------------------------------------------------------------
    */
    public function index()
    {
        // Untuk sekarang: semua produk
        // Nanti kalau sudah ada relasi user_id bisa difilter per produsen
        $products = Product::orderBy('created_at', 'desc')->get();

        return view('dashboard-produsen', compact('products'));
    }

    /*
    |--------------------------------------------------------------------------
    | CREATE – HALAMAN FORM TAMBAH PRODUK (KHUSUS)
    |--------------------------------------------------------------------------
    */
    public function create()
    {
        return view('produk-create');
    }

    /*
    |--------------------------------------------------------------------------
    | STORE – SIMPAN PRODUK BARU
    |--------------------------------------------------------------------------
    */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'     => ['required', 'string', 'max:255'],
            'harga'    => ['required', 'numeric', 'min:0'],
            'produsen' => ['required', 'string', 'max:255'],
            'foto'     => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('products', 'public');
        }

        Product::create($data);

        return redirect()
            ->route('dashboard.produsen')
            ->with('success', 'Produk berhasil ditambahkan.');
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT – FORM EDIT PRODUK
    |--------------------------------------------------------------------------
    */
    public function edit(Product $product)
    {
        return view('dashboard-produsen-edit', compact('product'));
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE – SIMPAN PERUBAHAN PRODUK
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'nama'     => ['required', 'string', 'max:255'],
            'harga'    => ['required', 'integer', 'min:0'],
            'produsen' => ['required', 'string', 'max:255'],
            'foto'     => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        // Jika ada foto baru di-upload
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($product->foto) {
                Storage::disk('public')->delete($product->foto);
            }

            $data['foto'] = $request->file('foto')->store('products', 'public');
        }

        $product->update($data);

        return redirect()
            ->route('dashboard.produsen')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    /*
    |--------------------------------------------------------------------------
    | DESTROY – HAPUS PRODUK
    |--------------------------------------------------------------------------
    */
    public function destroy(Product $product)
    {
        if ($product->foto) {
            Storage::disk('public')->delete($product->foto);
        }

        $product->delete();

        return redirect()
            ->route('dashboard.produsen')
            ->with('success', 'Produk berhasil dihapus.');
    }

    /*
    |--------------------------------------------------------------------------
    | HALAMAN KHUSUS HAPUS PRODUK (LIST UNTUK HAPUS)
    |--------------------------------------------------------------------------
    */
    public function hapusIndex()
    {
        $products = Product::orderBy('created_at', 'desc')->get();
        return view('produk-hapus', compact('products'));
    }

    //data pembayaran
    public function statusPembayaran()
    {
        // nanti isi dengan data orders / pembayaran
        // untuk sekarang bisa kosong dulu
        return view('status-pembayaran'); // nama blade baru
    }
}
