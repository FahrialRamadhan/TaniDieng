<x-app-layout>
    {{-- HEADER ATAS (SAMA DENGAN HALAMAN LAIN) --}}
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Tambah Produk
        </h2>
    </x-slot>

    <div class="min-h-screen bg-[#0F5529] text-white mt-[-10px] pt-4 pb-10">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4">

            {{-- TOP SECTION: TEKS + TOMBOL KEMBALI (DI LUAR CARD) --}}
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mt-2">
                <p class="text-sm text-white/80">
                    Isi formulir berikut untuk menambahkan produk baru ke katalog Anda.
                </p>

                <a href="{{ route('dashboard.produsen') }}"
                    class="inline-flex items-center px-4 py-2 bg-white/20 hover:bg-white/30
                           border border-white/30 rounded-lg text-sm font-semibold
                           backdrop-blur-sm transition">
                    <span class="mr-2">←</span> Kembali ke Dashboard
                </a>
            </div>

            {{-- CARD FORM TAMBAH PRODUK --}}
            <div class="w-full max-w-xl mx-auto bg-white/10 border border-white/20 rounded-2xl p-8 shadow-lg">

                <h2 class="text-xl font-semibold text-white mb-6 text-center">
                    Form Tambah Produk
                </h2>

                <form action="{{ route('produsen.produk.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-4">
                    @csrf

                    {{-- NAMA PRODUK --}}
                    <div>
                        <label class="text-sm text-white/80">Nama Produk</label>
                        <input type="text" name="nama"
                            class="w-full mt-1 bg-white/5 border border-white/40 text-white rounded-md px-3 py-2
                                      focus:outline-none focus:ring focus:ring-emerald-400"
                            required>
                    </div>

                    {{-- HARGA --}}
                    <div>
                        <label class="text-sm text-white/80">Harga (Rp)</label>
                        <input type="number" name="harga"
                            class="w-full mt-1 bg-white/5 border border-white/40 text-white rounded-md px-3 py-2
                                      focus:outline-none focus:ring focus:ring-emerald-400"
                            required>
                    </div>

                    {{-- PRODUSEN --}}
                    <div>
                        <label class="text-sm text-white/80">Nama Produsen</label>
                        <input type="text" name="produsen" value="{{ auth()->user()->name }}"
                            class="w-full mt-1 bg-white/5 border border-white/40 text-white rounded-md px-3 py-2
                                      focus:outline-none focus:ring focus:ring-emerald-400"
                            readonly>
                    </div>

                    {{-- FOTO --}}
                    <div>
                        <label class="text-sm text-white/80">Foto Produk</label>
                        <input type="file" name="foto"
                            class="w-full text-sm text-white mt-1
                                      file:bg-emerald-600 file:text-white file:border-0
                                      file:px-4 file:py-2 file:rounded-md">
                    </div>

                    {{-- BUTTON SUBMIT (BACK SUDAH DI LUAR CARD) --}}
                    <div class="flex justify-end pt-4">
                        <button type="submit"
                            class="px-4 py-2 bg-emerald-600 hover:bg-emerald-700
                                       rounded-md text-white font-semibold text-sm">
                            Simpan Produk
                        </button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</x-app-layout>
