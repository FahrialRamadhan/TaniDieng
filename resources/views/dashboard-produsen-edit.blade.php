<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Edit Produk
        </h2>
    </x-slot>

    <div class="py-8 bg-[#0F5529] min-h-screen text-white mt-[-10px]">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-4">
                <a href="{{ route('dashboard.produsen') }}" class="text-sm text-white/80 hover:underline">
                    ← Kembali ke daftar produk
                </a>
            </div>

            <div class="bg-white/10 border border-white/20 rounded-xl p-6">
                <h3 class="text-lg font-semibold mb-4">Edit Produk</h3>

                <form action="{{ route('produsen.produk.update', $product) }}" method="POST"
                    enctype="multipart/form-data" class="grid grid-cols-1 gap-4 text-sm">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block mb-1">Nama Produk</label>
                        <input type="text" name="nama" value="{{ old('nama', $product->nama) }}"
                            class="w-full rounded-md bg-transparent border border-white/40 px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white">
                        @error('nama')
                            <p class="text-xs text-red-300 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-1">Harga (Rp)</label>
                        <input type="number" name="harga" value="{{ old('harga', $product->harga) }}"
                            class="w-full rounded-md bg-transparent border border-white/40 px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white">
                        @error('harga')
                            <p class="text-xs text-red-300 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-1">Nama Produsen</label>
                        <input type="text" name="produsen" value="{{ old('produsen', $product->produsen) }}"
                            class="w-full rounded-md bg-transparent border border-white/40 px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white">
                        @error('produsen')
                            <p class="text-xs text-red-300 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-1">Foto Produk (opsional)</label>
                        @if ($product->foto)
                            <img src="{{ asset('storage/' . $product->foto) }}"
                                class="h-20 w-20 object-cover rounded-md border border-white/30 mb-2">
                        @endif
                        <input type="file" name="foto"
                            class="w-full text-xs text-white file:text-white file:bg-emerald-700 file:border-0 file:px-3 file:py-1.5 file:rounded-md">
                        @error('foto')
                            <p class="text-xs text-red-300 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mt-2">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 rounded-md bg-emerald-600 hover:bg-emerald-700 text-sm font-semibold">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
