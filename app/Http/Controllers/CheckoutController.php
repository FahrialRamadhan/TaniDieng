<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Config as MidtransConfig;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    // =======================
    // HALAMAN CHECKOUT
    // =======================
    public function index(Request $request)
    {
        // 1. Ambil alamat utama
        $address = Address::where('user_id', Auth::id())
            ->where('is_primary', 1)
            ->first();

        if (! $address) {
            return redirect()->route('profile.edit')
                ->with('warning', 'Silakan tambahkan alamat dan set sebagai alamat utama terlebih dahulu.');
        }

        // 2. Ambil keranjang dari session
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('warning', 'Keranjang belanja kamu masih kosong.');
        }

        $cartItems = collect($cart);

        $subtotal = $cartItems->sum(function ($item) {
            // sesuaikan jika key kamu beda: 'qty' / 'harga' dll
            return $item['quantity'] * $item['price'];
        });

        $ongkir = 10000; // sementara fixed
        $total  = $subtotal + $ongkir;

        return view('checkout', [
            'address'   => $address,
            'cartItems' => $cartItems,
            'subtotal'  => $subtotal,
            'ongkir'    => $ongkir,
            'total'     => $total,
        ]);
    }

    // =======================
    // PROSES CHECKOUT
    // =======================
    public function store(Request $request)
    {
        $data = $request->validate([
            'alamat_id'    => 'required|exists:addresses,id',
            'ekspedisi'    => 'required|string',
            'layanan'      => 'required|string',
            'metode_bayar' => 'required|string',   // 'online' atau 'cod'
            'catatan'      => 'nullable|string',
        ]);

        // 1. Ambil cart lagi dari session
        $cart = session('cart', []);
        if (empty($cart)) {
            return redirect()->route('cart.index')
                ->with('warning', 'Keranjang belanja kamu masih kosong.');
        }

        $cartItems = collect($cart);
        $subtotal  = $cartItems->sum(fn($item) => $item['quantity'] * $item['price']);
        $ongkir    = 10000;
        $total     = $subtotal + $ongkir;

        $address = Address::findOrFail($data['alamat_id']);
        $user    = Auth::user();

        // 2. Kalau metode COD → langsung selesai, tanpa Midtrans
        if ($data['metode_bayar'] === 'cod') {
            // TODO: nanti kalau sudah ada tabel orders, simpan di sini

            // bersihkan keranjang
            session()->forget('cart');

            return redirect()
                ->route('dashboard')
                ->with('success', 'Pesanan COD berhasil dibuat. Silakan tunggu konfirmasi.');
        }

        // 3. Kalau ONLINE → kirim ke Midtrans Snap
        // HARD-CODE dulu supaya tidak tergantung .env
        MidtransConfig::$serverKey    = config('midtrans.server_key');
        MidtransConfig::$isProduction = config('midtrans.is_production');
        MidtransConfig::$isSanitized  = true; // tetap sama
        MidtransConfig::$is3ds        = true; // tetap sama


        // bikin order id unik (belum disimpan ke DB, nanti bisa disimpan)
        $orderId = 'TANIDIENG-' . time() . '-' . $user->id;

        // susun item_details dari cart
        $itemDetails = $cartItems->map(function ($item, $productId) {
            return [
                'id'       => (string) $productId,
                'price'    => (int) $item['price'],
                'quantity' => (int) $item['quantity'],
                'name'     => substr($item['name'], 0, 50),
            ];
        })->values()->all();

        // tambahkan ongkir sebagai item
        $itemDetails[] = [
            'id'       => 'ONGKIR',
            'price'    => (int) $ongkir,
            'quantity' => 1,
            'name'     => 'Ongkos Kirim',
        ];

        $params = [
            'transaction_details' => [
                'order_id'     => $orderId,
                'gross_amount' => (int) $total,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email'      => $user->email,
                'phone'      => $address->phone,
                'shipping_address' => [
                    'first_name'  => $address->recipient_name,
                    'address'     => $address->address,
                    'city'        => $address->city,
                    'postal_code' => $address->postal_code,
                    'phone'       => $address->phone,
                ],
            ],
            'item_details' => $itemDetails,
        ];

        // dapatkan snap token
        $snapToken = Snap::getSnapToken($params);

        return view('payments.midtrans', [
            'snapToken' => $snapToken,
            'total'     => $total,
            'orderId'   => $orderId,
        ]);
    }
}
