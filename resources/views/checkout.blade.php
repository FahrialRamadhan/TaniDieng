<x-app-layout>
    <div class="min-h-screen bg-[#0F5529] py-10 px-4">
        <div class="max-w-6xl mx-auto">
            {{-- TITLE --}}
            <h1 class="text-2xl md:text-3xl font-semibold text-white mb-6">
                Checkout
            </h1>

            <form action="{{ route('checkout.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    {{-- ================= KIRI: ALAMAT + PRODUK + PENGIRIMAN + PEMBAYARAN ================= --}}
                    <div class="lg:col-span-2 space-y-6">

                        {{-- ALAMAT PENGIRIMAN (AUTO DARI ALAMAT UTAMA) --}}
                        <div class="bg-white/10 border border-white/20 rounded-2xl p-6 shadow-lg">
                            <div class="flex items-center justify-between mb-4">
                                <h2 class="text-lg font-semibold text-white">
                                    Alamat Pengiriman
                                </h2>

                                {{-- Link ke halaman profil (tab alamat) --}}
                                <a href="{{ route('profile.edit') }}#alamat"
                                    class="text-xs text-emerald-300 hover:underline">
                                    Ubah Alamat
                                </a>
                            </div>

                            {{-- ID alamat utama yang dipakai --}}
                            <input type="hidden" name="alamat_id" value="{{ $address->id }}">

                            <p class="text-sm font-semibold text-white mb-1">
                                {{ $address->recipient_name }}
                            </p>

                            <p class="text-sm text-white/80 leading-relaxed">
                                {{ $address->address }} <br>
                                {{ $address->subdistrict }}, {{ $address->city }} <br>
                                {{ $address->postal_code }} <br>
                                No. HP: {{ $address->phone }}
                            </p>

                            <div class="mt-3">
                                <span
                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-500/15 text-emerald-300 border border-emerald-400/40">
                                    Alamat Utama
                                </span>
                            </div>
                        </div>

                        {{-- PRODUK YANG DIBELI --}}
                        <div class="bg-white/10 border border-white/20 rounded-2xl p-6 shadow-lg">
                            <h2 class="text-lg font-semibold text-white mb-4">
                                Produk yang Dibeli
                            </h2>

                            <div class="space-y-4">
                                @foreach ($cartItems as $productId => $item)
                                    <div
                                        class="flex items-center gap-4 bg-white/5 border border-white/10 rounded-xl p-4">
                                        {{-- FOTO PRODUK --}}
                                        <img src="{{ asset('storage/' . $item['image']) }}"
                                            class="w-16 h-16 rounded-lg object-cover border border-white/20"
                                            alt="{{ $item['name'] }}">

                                        {{-- NAMA + PRODUSEN + QTY --}}
                                        <div class="flex-1">
                                            <h3 class="text-sm md:text-base font-semibold text-white">
                                                {{ $item['name'] }}
                                            </h3>
                                            <p class="text-xs text-white/70">
                                                Produsen: {{ $item['producer'] ?? '-' }}
                                            </p>
                                            <p class="text-xs text-white/70 mt-1">
                                                Qty: {{ $item['quantity'] }}
                                            </p>
                                        </div>

                                        {{-- TOTAL HARGA PER ITEM --}}
                                        <div class="text-right">
                                            <p class="text-sm md:text-base font-semibold text-emerald-300">
                                                Rp {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- PENGIRIMAN --}}
                        <div class="bg-white/10 border border-white/20 rounded-2xl p-6 shadow-lg">
                            <h2 class="text-lg font-semibold text-white mb-4">
                                Pengiriman
                            </h2>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm text-white/80 mb-1">Kurir Ekspedisi</label>
                                    <select name="ekspedisi"
                                        class="w-full bg-white/5 border border-white/40 text-white rounded-md px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-emerald-400"
                                        required>
                                        <option value="" class="bg-[#0F5529]">Pilih Kurir</option>
                                        <option value="JNE" class="bg-[#0F5529]">JNE</option>
                                        <option value="J&T" class="bg-[#0F5529]">J&amp;T Express</option>
                                        <option value="POS" class="bg-[#0F5529]">POS Indonesia</option>
                                        <option value="SICEPAT" class="bg-[#0F5529]">SiCepat</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-sm text-white/80 mb-1">Layanan</label>
                                    <select name="layanan"
                                        class="w-full bg-white/5 border border-white/40 text-white rounded-md px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-emerald-400"
                                        required>
                                        <option value="" class="bg-[#0F5529]">Pilih Layanan</option>
                                        <option value="Reguler" class="bg-[#0F5529]">Reguler (2–3 hari)</option>
                                        <option value="Express" class="bg-[#0F5529]">Express (1 hari)</option>
                                        <option value="Hemat" class="bg-[#0F5529]">Hemat (4–5 hari)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="mt-4">
                                <label class="block text-sm text-white/80 mb-1">
                                    Catatan untuk Penjual (opsional)
                                </label>
                                <textarea name="catatan" rows="2"
                                    class="w-full bg-white/5 border border-white/40 text-white rounded-md px-3 py-2 text-sm focus:outline-none focus:ring focus:ring-emerald-400"
                                    placeholder="Contoh: tolong bungkus rapi, kirim di jam kerja.">{{ old('catatan') }}</textarea>
                            </div>
                        </div>

                        {{-- METODE PEMBAYARAN --}}
                        <div class="bg-white/10 border border-white/20 rounded-2xl p-6 shadow-lg">
                            <h2 class="text-lg font-semibold text-white mb-4">
                                Metode Pembayaran
                            </h2>

                            <div class="space-y-3">
                                {{-- ONLINE PAYMENT (MIDTRANS SNAP) --}}
                                <label
                                    class="flex items-center justify-between bg-white/5 border border-white/15 rounded-xl px-4 py-3 cursor-pointer">
                                    <div class="flex items-center gap-3">
                                        <input type="radio" name="metode_bayar" value="online"
                                            class="accent-emerald-400" required>
                                        <div>
                                            <p class="text-sm font-semibold text-white">Bayar Online</p>
                                            <p class="text-xs text-white/70">
                                                Virtual Account, QRIS, GoPay, ShopeePay, E-Wallet, dsb.
                                            </p>
                                        </div>
                                    </div>
                                </label>

                                {{-- COD --}}
                                <label
                                    class="flex items-center justify-between bg-white/5 border border-white/15 rounded-xl px-4 py-3 cursor-pointer">
                                    <div class="flex items-center gap-3">
                                        <input type="radio" name="metode_bayar" value="cod"
                                            class="accent-emerald-400">
                                        <div>
                                            <p class="text-sm font-semibold text-white">COD (Bayar di Tempat)</p>
                                            <p class="text-xs text-white/70">*Jika tersedia di wilayahmu</p>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    {{-- ================= KANAN: RINGKASAN BELANJA ================= --}}
                    <div class="lg:col-span-1">
                        <div class="bg-white/10 border border-white/20 rounded-2xl p-6 shadow-lg sticky top-6">
                            <h2 class="text-lg font-semibold text-white mb-4">
                                Ringkasan Belanja
                            </h2>

                            <div class="space-y-2 text-sm text-white/80 mb-4">
                                <div class="flex justify-between">
                                    <span>Subtotal</span>
                                    <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span>Ongkos Kirim</span>
                                    <span>Rp {{ number_format($ongkir, 0, ',', '.') }}</span>
                                </div>
                                <div class="border-t border-white/20 my-3"></div>
                                <div class="flex justify-between text-base font-semibold text-white">
                                    <span>Total Pembayaran</span>
                                    <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                                </div>
                            </div>

                            <button type="submit"
                                class="w-full py-3 rounded-full bg-emerald-500 hover:bg-emerald-600 text-white font-semibold text-sm md:text-base transition shadow-md shadow-emerald-900/40">
                                Buat Pesanan
                            </button>

                            <button type="button" onclick="window.history.back()"
                                class="w-full mt-3 py-2 rounded-full border border-white/30 text-white text-sm hover:bg-white/10 transition">
                                Kembali ke Keranjang
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
