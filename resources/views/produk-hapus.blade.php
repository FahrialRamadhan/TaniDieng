<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Hapus Produk
        </h2>
    </x-slot>

    <div class="bg-[#0F5529] min-h-screen text-white mt-[-10px] pt-4 pb-10">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 space-y-4">

            <!-- TOP SECTION: TEKS + TOMBOL KEMBALI -->
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mt-2">

                <p class="text-sm text-white/80">
                    Pilih produk yang ingin dihapus. Tindakan ini tidak dapat dibatalkan.
                </p>

                <a href="{{ route('dashboard.produsen') }}"
                    class="inline-flex items-center px-4 py-2 bg-white/20 hover:bg-white/30
                           border border-white/30 rounded-lg text-sm font-semibold 
                           backdrop-blur-sm transition">
                    <span class="mr-2">←</span> Kembali ke Dashboard
                </a>

            </div>
            <!-- END TOP SECTION -->

            <!-- CARD LIST PRODUK -->
            <div class="bg-white/10 border border-white/20 rounded-2xl p-6 shadow-lg">
                <h3 class="text-lg font-semibold mb-4">Daftar Produk</h3>

                <div class="overflow-x-auto rounded-lg border border-white/10 bg-black/5">
                    <table class="min-w-full text-sm">
                        <thead>
                            <tr class="border-b border-white/20 bg-white/5 text-left text-xs uppercase tracking-wide">
                                <th class="py-2 px-4">Foto</th>
                                <th class="py-2 px-4">Nama</th>
                                <th class="py-2 px-4">Harga</th>
                                <th class="py-2 px-4">Produsen</th>
                                <th class="py-2 px-4 text-center">Hapus</th>
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

                                    <td class="py-2 px-4 text-center">
                                        <form action="{{ route('produsen.produk.destroy', $product) }}" method="POST"
                                            onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="px-3 py-1 bg-red-600 hover:bg-red-700 rounded-md text-xs">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            </div>
            <!-- END CARD -->

        </div>
    </div>
</x-app-layout>
