<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Dashboard Produsen
        </h2>
    </x-slot>

    <div class="py-8 bg-[#0F5529] min-h-screen text-white">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8 space-y-8">

            {{-- ALERT SUCCESS --}}
            @if (session('success'))
                <div class="bg-emerald-600/80 border border-emerald-300 text-sm px-4 py-2 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            {{-- FORM TAMBAH PRODUK --}}
            <div class="bg-white/10 border border-white/20 rounded-xl p-6">
                <h3 class="text-lg font-semibold mb-4">Tambah Produk Baru</h3>

                <form action="{{ route('produsen.produk.store') }}" method="POST" enctype="multipart/form-data"
                    class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                    @csrf

                    <div>
                        <label class="block mb-1">Nama Produk</label>
                        <input type="text" name="nama" value="{{ old('nama') }}"
                            class="w-full rounded-md bg-transparent border border-white/40 px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white">
                        @error('nama')
                            <p class="text-xs text-red-300 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-1">Harga (Rp)</label>
                        <input type="number" name="harga" value="{{ old('harga') }}"
                            class="w-full rounded-md bg-transparent border border-white/40 px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white">
                        @error('harga')
                            <p class="text-xs text-red-300 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-1">Nama Produsen</label>
                        <input type="text" name="produsen" value="{{ old('produsen', auth()->user()->name ?? '') }}"
                            class="w-full rounded-md bg-transparent border border-white/40 px-3 py-2 focus:outline-none focus:ring-1 focus:ring-white">
                        @error('produsen')
                            <p class="text-xs text-red-300 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-1">Foto Produk</label>
                        <input type="file" name="foto"
                            class="w-full text-xs text-white file:text-white file:bg-emerald-700 file:border-0 file:px-3 file:py-1.5 file:rounded-md">
                        @error('foto')
                            <p class="text-xs text-red-300 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2 mt-2">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 rounded-md bg-emerald-600 hover:bg-emerald-700 text-sm font-semibold">
                            Simpan Produk
                        </button>
                    </div>
                </form>
            </div>

            {{-- TABEL LIST PRODUK --}}
            <div class="bg-white/10 border border-white/20 rounded-xl p-6">
                <h3 class="text-lg font-semibold mb-4">Daftar Produk</h3>

                @if ($products->isEmpty())
                    <p class="text-sm text-white/80">Belum ada produk yang ditambahkan.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm">
                            <thead>
                                <tr class="border-b border-white/20 text-left">
                                    <th class="py-2 pr-4">Foto</th>
                                    <th class="py-2 pr-4">Nama</th>
                                    <th class="py-2 pr-4">Harga</th>
                                    <th class="py-2 pr-4">Produsen</th>
                                    <th class="py-2 pr-4">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/10">
                                @foreach ($products as $product)
                                    <tr>
                                        <td class="py-2 pr-4">
                                            @if ($product->foto)
                                                <img src="{{ asset('storage/' . $product->foto) }}"
                                                    class="h-12 w-12 object-cover rounded-md border border-white/30">
                                            @else
                                                <span class="text-xs text-white/60">No Image</span>
                                            @endif
                                        </td>
                                        <td class="py-2 pr-4">
                                            {{ $product->nama }}
                                        </td>
                                        <td class="py-2 pr-4">
                                            Rp {{ number_format($product->harga, 0, ',', '.') }}
                                        </td>
                                        <td class="py-2 pr-4">
                                            {{ $product->produsen }}
                                        </td>
                                        <td class="py-2 pr-4 flex items-center gap-2">
                                            <a href="{{ route('produsen.produk.edit', $product) }}"
                                                class="px-3 py-1 rounded-md bg-white/15 hover:bg-white/25 text-xs">
                                                Edit
                                            </a>

                                            <form action="{{ route('produsen.produk.destroy', $product) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="px-3 py-1 rounded-md bg-red-600/80 hover:bg-red-700 text-xs">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
