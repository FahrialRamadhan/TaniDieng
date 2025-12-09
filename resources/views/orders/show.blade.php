<x-app-layout>
    <div class="min-h-screen bg-[#0F5529] py-10 px-4">
        <div class="max-w-5xl mx-auto space-y-6">

            <h1 class="text-2xl font-semibold text-white">
                Detail Pesanan {{ $order->code }}
            </h1>

            {{-- Info utama --}}
            <div class="bg-white/10 border border-white/20 rounded-2xl p-6 shadow-lg text-sm text-white/90">
                <p><span class="font-semibold">Tanggal</span> : {{ $order->created_at->format('d M Y H:i') }}</p>
                <p><span class="font-semibold">Total</span> : Rp {{ number_format($order->total_amount, 0, ',', '.') }}
                </p>
                <p><span class="font-semibold">Metode Bayar</span> : {{ strtoupper($order->payment_method) }}</p>
                <p><span class="font-semibold">Status</span> : {{ $order->status_label }}</p>
            </div>

            {{-- Alamat --}}
            <div class="bg-white/10 border border-white/20 rounded-2xl p-6 shadow-lg text-sm text-white/90">
                <h2 class="text-lg font-semibold mb-3">Alamat Pengiriman</h2>
                <p class="font-semibold">{{ $order->address->recipient_name }}</p>
                <p>{{ $order->address->address }}</p>
                <p>{{ $order->address->subdistrict }}, {{ $order->address->city }}</p>
                <p>{{ $order->address->postal_code }}</p>
                <p>No. HP: {{ $order->address->phone }}</p>
            </div>

            {{-- Item --}}
            <div class="bg-white/10 border border-white/20 rounded-2xl p-6 shadow-lg text-sm text-white/90">
                <h2 class="text-lg font-semibold mb-3">Produk</h2>
                @foreach ($order->items as $item)
                    <div class="flex justify-between py-2 border-b border-white/10 last:border-0">
                        <div>
                            <p class="font-semibold">{{ $item->product_name }}</p>
                            <p class="text-xs text-white/70">Qty: {{ $item->quantity }}</p>
                        </div>
                        <div class="text-right">
                            <p>Rp {{ number_format($item->price, 0, ',', '.') }}</p>
                            <p class="text-xs text-white/70">
                                Subtotal: Rp {{ number_format($item->subtotal, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <a href="{{ route('orders.index') }}"
                class="inline-flex items-center px-4 py-2 rounded-full border border-white/40 text-white text-sm hover:bg-white/10">
                Kembali ke Riwayat Pesanan
            </a>
        </div>
    </div>
</x-app-layout>
