<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdusenProductController extends Controller
{
    // LIST + FORM TAMBAH
    public function index()
    {
        // untuk sekarang: semua produk
        // nanti kalau sudah ada relasi user_id baru bisa difilter per produsen
        $products = Product::orderBy('created_at', 'desc')->get();

        return view('dashboard-produsen', compact('products'));
    }

    // SIMPAN PRODUK BARU
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama'     => ['required', 'string', 'max:255'],
            'harga'    => ['required', 'integer', 'min:0'],
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

    // FORM EDIT
    public function edit(Product $product)
    {
        return view('dashboard-produsen-edit', compact('product'));
    }

    // UPDATE PRODUK
    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'nama'     => ['required', 'string', 'max:255'],
            'harga'    => ['required', 'integer', 'min:0'],
            'produsen' => ['required', 'string', 'max:255'],
            'foto'     => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('foto')) {
            // hapus foto lama
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

    // HAPUS PRODUK
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
}
