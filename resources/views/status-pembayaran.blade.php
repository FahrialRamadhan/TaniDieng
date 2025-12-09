<x-app-layout>
    {{-- HEADER ATAS (SAMA DENGAN DASHBOARD) --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Status Pembayaran
        </h2>
    </x-slot>

    {{-- BACKGROUND + JARAK DARI NAVBAR --}}
    <div class="bg-[#0F5529] min-h-screen text-white mt-[-10px] pt-4 pb-10">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4">

            {{-- TOP SECTION: TEKS + TOMBOL KEMBALI (DI LUAR CARD) --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mt-2">
                <p class="text-sm text-white/80">
                    Berikut adalah daftar pesanan beserta status pembayarannya.
                </p>

                <a href="{{ route('dashboard.produsen') }}"
                    class="inline-flex items-center px-4 py-2 bg-white/20 hover:bg-white/30
                           border border-white/30 rounded-lg text-sm font-semibold
                           backdrop-blur-sm transition">
                    <span class="mr-2">←</span> Kembali ke Dashboard
                </a>
            </div>

            {{-- CARD STATUS PEMBAYARAN --}}
            <div class="bg-white/10 border border-white/20 rounded-2xl px-6 py-5 shadow-lg backdrop-blur-lg">
                <h3 class="text-lg font-semibold mb-4">Status Pembayaran</h3>

                {{-- TABEL STATUS --}}
                <div class="overflow-x-auto rounded-lg border border-white/10 bg-black/5">
                    <table class="min-w-full text-sm">
                        <thead>
                            <tr class="border-b border-white/15 bg-white/5 text-left text-xs uppercase tracking-wide">
                                <th class="py-2 px-4">ID Pesanan</th>
                                <th class="py-2 px-4">Nama Produk</th>
                                <th class="py-2 px-4">Total</th>
                                <th class="py-2 px-4">Status</th>
                                <th class="py-2 px-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-white/10">
                            <tr>
                                <td colspan="5" class="text-center py-6 text-white/70">
                                    Belum ada transaksi pembayaran.
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
