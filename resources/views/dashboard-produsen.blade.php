<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Dashboard Produsen
        </h2>
    </x-slot>

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>

    <div class="bg-[#0F5529] min-h-screen text-white mt-[-10px] pt-4 pb-10">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            @php
                $totalProducts = $products->count();
                $totalSales = $totalSales ?? 0;
                $totalSold = $totalOrders ?? 0;
            @endphp

            {{-- ================= TOP: OPERASIONAL + RINGKASAN PRODUK ================= --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">

                {{-- OPERASIONAL --}}
                <div class="lg:col-span-2 border border-white/20 bg-white/5 rounded-xl p-5">
                    <h3 class="text-lg font-semibold mb-4">Operasional</h3>

                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div class="border-t border-white/30 pt-3">
                            <p class="text-xs text-white/70 mb-1">Total Pemasukan</p>
                            <p class="text-xl font-semibold">Rp {{ number_format($totalSales, 0, ',', '.') }}</p>
                        </div>

                        <div class="border-t border-white/30 pt-3">
                            <p class="text-xs text-white/70 mb-1">Produk Terjual</p>
                            <p class="text-xl font-semibold">{{ $totalSold }}</p>
                        </div>
                    </div>
                </div>

                {{-- RINGKASAN PRODUK --}}
                <div class="border border-white/20 bg-white/5 rounded-xl p-5">
                    <h3 class="text-lg font-semibold mb-4">Ringkasan Produk</h3>

                    <div class="space-y-3 border-t border-white/30 pt-3 text-sm">
                        <div class="flex items-center gap-2">
                            <span class="w-6 h-6 flex items-center justify-center border rounded-full text-xs">📦</span>
                            <div>
                                <p class="text-xs text-white/70">Produk</p>
                                <p class="font-semibold">{{ $totalProducts }}</p>
                            </div>
                        </div>

                        <div class="flex items-center gap-2">
                            <span class="w-6 h-6 flex items-center justify-center border rounded-full text-xs">🔁</span>
                            <div>
                                <p class="text-xs text-white/70">Total Produk Terjual</p>
                                <p class="font-semibold">{{ $totalSold }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ALERT SUCCESS --}}
            @if (session('success'))
                <div class="bg-emerald-600/90 border border-emerald-300 text-sm px-4 py-2 rounded-md shadow-md">
                    {{ session('success') }}
                </div>
            @endif

            {{-- ================= KARTU AKSI ================= --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 text-sm">

                {{-- Tambah Produk --}}
                <a href="{{ route('produsen.produk.create') }}"
                    class="border border-white/20 bg-white/5 rounded-xl p-5 flex items-center justify-between
              w-full text-left hover:bg-white/10 transition">
                    <p class="text-base font-semibold">Tambah Produk</p>
                    <span class="w-10 h-10 border rounded-full flex items-center justify-center text-2xl">+</span>
                </a>

                {{-- Hapus Produk --}}
                <a href="{{ route('produsen.produk.hapus') }}"
                    class="border border-white/20 bg-white/5 rounded-xl p-5 flex items-center justify-between
              w-full text-left hover:bg-white/10 transition">
                    <p class="text-base font-semibold">Hapus Produk</p>
                    <span class="w-10 h-10 border rounded-full flex items-center justify-center text-2xl">–</span>
                </a>

                {{-- Edit Produk (scroll ke tabel) --}}
                <button type="button"
                    onclick="document.getElementById('section-daftar-produk').scrollIntoView({behavior:'smooth'});"
                    class="border border-white/20 bg-white/5 rounded-xl p-5 flex items-center justify-between
                   w-full text-left hover:bg-white/10 transition">
                    <p class="text-base font-semibold">Edit Produk</p>
                    <span class="w-10 h-10 border rounded-full flex items-center justify-center text-xl">✎</span>
                </button>

                {{-- 🔥 Status Pembayaran → BLADE BARU --}}
                <a href="{{ route('produsen.pembayaran.index') }}"
                    class="border border-white/20 bg-white/5 rounded-xl p-5 flex items-center justify-between
              w-full text-left hover:bg-white/10 transition">
                    <p class="text-base font-semibold">Status Pembayaran</p>
                    <span class="w-10 h-10 border rounded-full flex items-center justify-center text-xl">💳</span>
                </a>

            </div>



            {{-- ================= HANYA DAFTAR PRODUK (FULL WIDTH) ================= --}}
            <div id="section-daftar-produk" class="bg-white/10 border border-white/20 rounded-2xl p-6 shadow-lg">
                <h3 class="text-lg font-semibold mb-4">Daftar Produk</h3>

                <div class="overflow-x-auto rounded-lg border border-white/10 bg-black/5">
                    <table class="min-w-full text-sm">
                        <thead>
                            <tr class="border-b border-white/20 bg-white/5 text-left text-xs uppercase tracking-wide">
                                <th class="py-2 px-4">Foto</th>
                                <th class="py-2 px-4">Nama</th>
                                <th class="py-2 px-4">Harga</th>
                                <th class="py-2 px-4">Produsen</th>
                                <th class="py-2 px-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            @foreach ($products as $product)
                                <tr class="hover:bg-white/5 transition">
                                    <td class="py-2 px-4">
                                        @if ($product->foto)
                                            <img src="{{ asset('storage/' . $product->foto) }}"
                                                class="h-10 w-10 rounded-md object-cover">
                                        @else
                                            <span class="text-xs text-white/70">No Image</span>
                                        @endif
                                    </td>

                                    <td class="py-2 px-4">{{ $product->nama }}</td>

                                    <td class="py-2 px-4">
                                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                                    </td>

                                    <td class="py-2 px-4">{{ $product->produsen }}</td>

                                    <td class="py-2 px-4">
                                        <div class="flex justify-center gap-2">
                                            <a href="{{ route('produsen.produk.edit', $product) }}"
                                                class="px-3 py-1 bg-emerald-600 hover:bg-emerald-700 rounded-md text-xs">
                                                Ubah
                                            </a>

                                            <form action="{{ route('produsen.produk.destroy', $product) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="px-3 py-1 bg-red-600 hover:bg-red-700 rounded-md text-xs">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
