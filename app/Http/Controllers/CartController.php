<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    // TAMPILKAN HALAMAN KERANJANG
    public function index()
    {
        $cart  = session('cart', []);

        $total = collect($cart)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        return view('cart', [
            'cartItems' => $cart,
            'total'     => $total,
        ]);
    }

    // TAMBAH PRODUK KE KERANJANG
    public function add(Request $request, Product $product)
    {
        $qty  = max(1, (int) $request->input('quantity', 1));
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $qty;
        } else {
            $cart[$product->id] = [
                'name'      => $product->nama,
                'price'     => $product->harga,
                'image'     => $product->foto ?? null,
                'quantity'  => $qty,
                'favorite'  => false,          // <- default belum favorit
                'produsen'  => $product->produsen ?? null,
                'product'   => $product,       // opsional kalau kamu mau simpan modelnya
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Produk ditambahkan ke keranjang.');
    }

    // ======= NEW: toggle favorite =======
    public function toggleFavorite($id)
    {
        $cart = session('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['favorite'] = !($cart[$id]['favorite'] ?? false);
            session(['cart' => $cart]);
        }

        return back();
    }

    // ======= NEW: hapus item dari keranjang =======
    public function remove($id)
    {
        $cart = session('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session(['cart' => $cart]);
        }

        return back()->with('success', 'Produk dihapus dari keranjang.');
    }

    public function ajaxUpdate(Request $request)
{
    $id        = $request->id;
    $direction = $request->direction;

    $cart = session()->get('cart', []);

    if (!isset($cart[$id])) {
        return response()->json(['error' => 'Item not found'], 404);
    }

    $qty = $cart[$id]['quantity'];

    if ($direction === 'increase') {
        $qty++;
    } elseif ($direction === 'decrease' && $qty > 1) {
        $qty--;
    }

    $cart[$id]['quantity'] = $qty;
    session()->put('cart', $cart);

    // Hitung ulang subtotal dan total
    $harga = $cart[$id]['price'] ?? 0;
    $subtotal = $harga * $qty;

    $total = collect($cart)->sum(fn($i) => $i['quantity'] * $i['price']);

    return response()->json([
        'qty'      => $qty,
        'subtotal' => $subtotal,
        'total'    => $total,
    ]);
}

public function clear()
{
    session()->forget('cart'); // hapus cart
    return response()->json(['success' => true]);
}


}
