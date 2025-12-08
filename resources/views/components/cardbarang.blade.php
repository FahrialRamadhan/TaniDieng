@props(['product' => null])

@php
    // pastikan ini benar-benar object Product, bukan string kosong
    $isDynamic = $product instanceof \App\Models\Product;
@endphp

<div @if ($isDynamic) @if (auth()->check())
            {{-- Kalau sudah login: klik card langsung ke detail produk --}}
            onclick="window.location.href='{{ route('detail.produk', $product) }}'"
        @else
            {{-- Kalau belum login: klik card diarahkan ke login --}}
            onclick="window.location.href='{{ route('login') }}'" @endif
    @endif
    class="group cursor-pointer block rounded-xl border border-white/25 bg-white/5 overflow-hidden 
           shadow-[0_8px_25px_rgba(0,0,0,.25)] 
           transition-all duration-300 
           hover:shadow-[0_15px_35px_rgba(0,0,0,.45)]
           hover:-translate-y-2 hover:scale-[1.03]">

    <article class="flex flex-col">
        <div class="p-3">
            <img src="{{ $isDynamic && $product->foto ? asset('storage/' . $product->foto) : asset('img/kopi.png') }}"
                alt="{{ $isDynamic ? $product->nama : 'Kopi' }}"
                class="h-48 w-full object-cover rounded-lg ring-1 ring-white/10" />
        </div>

        <div class="px-4 pb-4 pt-1 flex flex-col gap-2 flex-1">
            <div class="flex items-baseline justify-between">
                <h3 class="font-semibold">
                    {{ $isDynamic ? $product->nama : 'Kopi' }}
                    <span class="text-white/70 text-sm">(1kg)</span>
                </h3>
                <div class="text-sm font-semibold">
                    Rp {{ $isDynamic ? number_format($product->harga, 0, ',', '.') : '50.000' }}
                </div>
            </div>

            {{-- Produsen (kolom string biasa) --}}
            <p class="text-xs text-white/75 -mt-1">
                Produsen :
                <span class="underline group-hover:text-white">
                    {{ $isDynamic && !empty($product->produsen) ? $product->produsen : 'Jono Kagama' }}
                </span>
            </p>

            <div class="mt-3 space-y-2 mt-auto">

                {{-- BELI SEKARANG --}}
                @if ($isDynamic)
                    <a href="{{ auth()->check() ? route('detail.produk', $product) : route('login') }}"
                        onclick="event.stopPropagation();"
                        class="w-full block text-center rounded-md border border-white/60 bg-[#2A7A3A]/60 hover:bg-[#2A7A3A] text-sm py-2 transition">
                        Beli Sekarang
                    </a>
                @else
                    <a href="{{ route('login') }}" onclick="event.stopPropagation();"
                        class="w-full block text-center rounded-md border border-white/60 bg-[#2A7A3A]/60 hover:bg-[#2A7A3A] text-sm py-2 transition">
                        Beli Sekarang
                    </a>
                @endif

                {{-- KERANJANG --}}
                @if ($isDynamic && auth()->check())
                    <form action="{{ route('cart.add', $product->id) }}" method="POST" class="mt-2"
                        onclick="event.stopPropagation();">
                        @csrf
                        <input type="hidden" name="quantity" value="1">
                        <button type="submit"
                            class="w-full rounded-md border border-white/60 hover:bg-white/10 text-sm py-2 transition">
                            Keranjang
                        </button>
                    </form>
                @elseif ($isDynamic)
                    <a href="{{ route('login') }}" onclick="event.stopPropagation();"
                        class="w-full block text-center rounded-md border border-white/60 hover:bg-white/10 text-sm py-2 transition">
                        Keranjang
                    </a>
                @else
                    <a href="{{ route('login') }}" onclick="event.stopPropagation();"
                        class="w-full block text-center rounded-md border border-white/60 hover:bg-white/10 text-sm py-2 transition">
                        Keranjang
                    </a>
                @endif

            </div>
        </div>
    </article>
</div>
