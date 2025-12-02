<x-app-layout>
    <x-slot name="header"></x-slot>

    @php
        $itemCount = count($cartItems);
    @endphp

    <style>
        [x-cloak] { display: none !important; }
        .glass-card {
            background-image:
                radial-gradient(1200px 400px at -200px -200px, rgba(255,255,255,.32), transparent 40%),
                linear-gradient(180deg, rgba(255,255,255,.12), rgba(255,255,255,.03));
        }
    </style>

    {{-- x-data untuk logika pilih semua --}}
    <div
        x-data="cartPage()"
        x-init="init(@json(array_keys($cartItems)))"
        class="min-h-screen bg-gradient-to-b from-[#0F7438] via-[#0E5F34] to-[#0A4A29] text-white"
    >
        <div class="max-w-6xl mx-auto px-4 py-10">

            {{-- JUDUL --}}
            <h1 class="text-2xl font-semibold mb-6">
                Keranjang
            </h1>

            <div class="grid lg:grid-cols-[2fr,1fr] gap-6 items-start">

                {{-- =========================
                     KOLOM KIRI: LIST KERANJANG
                   ========================== --}}
                <div class="space-y-3">

                    {{-- BAR PILIH SEMUA --}}
                    <div
                        class="glass-card backdrop-blur-md rounded-xl border border-white/20 
                               shadow-[0_16px_36px_rgba(0,0,0,.4)]">
                        <div class="flex items-center justify-between px-5 py-3 text-sm">
                            <div class="flex items-center gap-3">

                                {{-- checkbox utama --}}
                                <button type="button"
                                        class="h-[22px] w-[22px] rounded-md border border-white/55 bg-black/10 flex items-center justify-center"
                                        @click="toggleSelectAll()">
                                    <div x-show="isAllSelected()"
                                         class="h-[12px] w-[12px] rounded-[4px] bg-emerald-400/90"
                                         x-cloak>
                                    </div>
                                </button>

                                <span class="font-semibold text-white">
                                    Pilih Semua (<span x-text="allIds.length"></span>)
                                </span>
                            </div>

                            <template x-if="selected.length">
                                <button @click="hapusSemua()"
                                        class="text-emerald-200 text-sm font-semibold hover:text-emerald-100">
                                    Hapus
                                </button>
                            </template>
                        </div>
                    </div>

                    {{-- CARD DAFTAR ITEM --}}
                    <div
                        class="glass-card backdrop-blur-md rounded-xl border border-white/20 
                               shadow-[0_18px_40px_rgba(0,0,0,.45)]">

                        {{-- WRAPPER ISI KERANJANG (akan diganti via JS juga) --}}
                        <div id="cart-items-wrapper">
                            @if(!$itemCount)
                                <div class="px-5 py-4 text-sm text-white/85">
                                    Keranjang masih kosong.
                                </div>
                            @else
                                @foreach($cartItems as $id => $item)
                                    @php
                                        $product     = $item['product'] ?? null;
                                        $isDynamic   = $product instanceof \App\Models\Product;

                                        $nama        = $isDynamic ? $product->nama : ($item['name'] ?? 'Produk');
                                        $hargaBase   = $isDynamic ? $product->harga : ($item['price'] ?? 0);
                                        $qty         = $item['quantity'] ?? 1;
                                        $isFavorite  = $item['favorite'] ?? false;

                                        if ($isDynamic && !empty($product->foto)) {
                                            $fotoPath = asset('storage/'.$product->foto);
                                        } elseif (!empty($item['image'])) {
                                            $fotoPath = asset('storage/'.$item['image']);
                                        } else {
                                            $fotoPath = asset('img/kopi.png');
                                        }

                                        $produsen = $isDynamic && !empty($product->produsen)
                                                    ? $product->produsen
                                                    : ($item['produsen'] ?? 'Jono Kagama');

                                        $subTotal = $hargaBase * $qty;
                                    @endphp

                                    <div id="item-{{ $id }}" class="px-5 py-4 border-b border-white/15 last:border-b-0">
                                        <div class="flex items-center gap-4">

                                            {{-- checkbox item --}}
                                            <button type="button"
                                                    class="h-[20px] w-[20px] rounded-md border border-white/55 bg-black/15 flex items-center justify-center mt-1"
                                                    @click="toggleItem('{{ $id }}')">
                                                <div x-show="selected.includes('{{ $id }}')"
                                                     class="h-[11px] w-[11px] rounded-[3px] bg-emerald-400/90"
                                                     x-cloak>
                                                </div>
                                            </button>

                                            {{-- GAMBAR PRODUK --}}
                                            <img src="{{ $fotoPath }}"
                                                 alt="{{ $nama }}"
                                                 class="h-16 w-16 rounded-lg object-cover ring-1 ring-white/30">

                                            {{-- DETAIL + KONTROL --}}
                                            <div class="flex-1">
                                                <div class="flex justify-between gap-3">
                                                    <div>
                                                        <div class="font-semibold text-sm text-white">
                                                            {{ $nama }}
                                                        </div>
                                                        <p class="text-[11px] text-white/75 mt-0.5">
                                                            Produsen :
                                                            <span class="underline">
                                                                {{ $produsen }}
                                                            </span>
                                                        </p>
                                                    </div>

                                                    {{-- SUBTOTAL (di-update via JS) --}}
                                                    <div id="subtotal-{{ $id }}"
                                                         class="font-semibold text-sm text-emerald-200 whitespace-nowrap">
                                                        Rp {{ number_format($subTotal, 0, ',', '.') }}
                                                    </div>
                                                </div>

                                                <div class="mt-3 flex items-center justify-between">

                                                    {{-- IKON AKSI: FAVORITE & HAPUS --}}
                                                    <div class="flex items-center gap-3">
                                                        {{-- FAVORITE --}}
                                                        <form action="{{ route('cart.favorite', $id) }}"
                                                              method="POST"
                                                              class="inline">
                                                            @csrf
                                                            <button type="submit"
                                                                    class="h-7 w-7 flex items-center justify-center rounded-full border
                                                                           {{ $isFavorite
                                                                                ? 'bg-emerald-500/90 border-emerald-300 hover:bg-emerald-500'
                                                                                : 'bg-white/5 border-white/30 hover:bg-white/15' }}
                                                                           transition">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="h-4 w-4"
                                                                     viewBox="0 0 24 24"
                                                                     fill="{{ $isFavorite ? 'white' : 'none' }}"
                                                                     stroke="white"
                                                                     stroke-width="2"
                                                                     stroke-linecap="round"
                                                                     stroke-linejoin="round">
                                                                    <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78L12 21.23l8.84-8.84a5.5 5.5 0 0 0 0-7.78z"/>
                                                                </svg>
                                                            </button>
                                                        </form>

                                                        {{-- HAPUS ITEM --}}
                                                        <form action="{{ route('cart.remove', $id) }}"
                                                              method="POST"
                                                              class="inline"
                                                              onsubmit="return confirm('Hapus item ini dari keranjang?')">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                    class="h-7 w-7 flex items-center justify-center rounded-full
                                                                           border border-white/30 bg-white/5
                                                                           hover:bg-red-500/80 hover:border-red-400 transition">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                     class="h-4 w-4"
                                                                     viewBox="0 0 24 24"
                                                                     fill="none"
                                                                     stroke="white"
                                                                     stroke-width="2">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                          d="M4 7h16M10 11v6M14 11v6M5 7l1 12a2 2 0 002 2h8a2 2 0 002-2l1-12M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3" />
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </div>

                                                    {{-- KONTROL JUMLAH (AJAX) --}}
                                                    <div class="inline-flex items-center gap-2 text-sm"
                                                         x-data="itemQty('{{ $id }}', {{ $qty }}, {{ $hargaBase }})">

                                                        {{-- MINUS --}}
                                                        <button type="button"
                                                                @click="change('decrease')"
                                                                class="h-8 w-8 flex items-center justify-center rounded-full border border-white/55 bg-white/5 text-white hover:bg-white/15 transition">
                                                            -
                                                        </button>

                                                        {{-- JUMLAH --}}
                                                        <span class="min-w-[26px] text-center text-white"
                                                              x-text="qty"></span>

                                                        {{-- PLUS --}}
                                                        <button type="button"
                                                                @click="change('increase')"
                                                                class="h-8 w-8 flex items-center justify-center rounded-full border border-white/55 bg-white/5 text-white hover:bg-white/15 transition">
                                                            +
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div> {{-- /#cart-items-wrapper --}}
                    </div>
                </div>

                {{-- =========================
                     KOLOM KANAN: RINGKASAN BELANJA
                   ========================== --}}
                <div
                    class="glass-card backdrop-blur-md rounded-xl border border-white/20 
                           shadow-[0_18px_40px_rgba(0,0,0,.45)] p-5 text-sm">
                    <h2 class="font-semibold text-white mb-4">
                        Ringkasan belanja
                    </h2>

                    <div class="flex items-center justify-between mb-4">
                        <span class="text-white/85">Total</span>
                        <span id="totalBelanja" class="font-semibold text-emerald-200">
                            Rp {{ number_format($total, 0, ',', '.') }}
                        </span>
                    </div>

                    <div class="border-t border-white/20 pt-4 mt-4">
                        <button
                            class="w-full py-2.5 rounded-full bg-emerald-500/95 hover:bg-emerald-500
                                   text-white font-semibold text-sm tracking-wide
                                   shadow-[0_10px_30px_rgba(0,0,0,.45)]
                                   disabled:opacity-40 disabled:cursor-not-allowed transition"
                            :disabled="selected.length === 0">
                            Beli (<span x-text="selected.length"></span>)
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- Alpine helper --}}
    <script>
        function cartPage() {
            return {
                allIds: [],
                selected: [],
                init(ids) {
                    this.allIds = ids || [];
                    this.selected = [...this.allIds];
                },
                toggleSelectAll() {
                    if (this.isAllSelected()) {
                        this.selected = [];
                    } else {
                        this.selected = [...this.allIds];
                    }
                },
                toggleItem(id) {
                    if (this.selected.includes(id)) {
                        this.selected = this.selected.filter(x => x !== id);
                    } else {
                        this.selected.push(id);
                    }
                },
                isAllSelected() {
                    return this.allIds.length > 0 &&
                           this.selected.length === this.allIds.length;
                },

                // Hapus semua item keranjang (tanpa reload)
                hapusSemua() {
                    if (!confirm('Hapus semua item dari keranjang?')) return;

                    fetch('{{ route('cart.clear') }}', {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Accept': 'application/json'
                        }
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (!data.success) return;

                        // kosongkan state Alpine
                        this.allIds = [];
                        this.selected = [];

                        // ganti isi wrapper jadi pesan kosong
                        const wrap = document.getElementById('cart-items-wrapper');
                        if (wrap) {
                            wrap.innerHTML = `
                                <div class="px-5 py-4 text-sm text-white/85">
                                    Keranjang masih kosong.
                                </div>
                            `;
                        }

                        // update total jadi 0
                        const totalEl = document.getElementById('totalBelanja');
                        if (totalEl) totalEl.textContent = 'Rp 0';
                    })
                    .catch(err => console.error(err));
                }
            }
        }

        // qty per item (AJAX tanpa reload)
        function itemQty(id, initialQty, price) {
            return {
                id: id,
                qty: initialQty,
                price: price,
                change(direction) {
                    fetch('{{ route('cart.ajax-update') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            id: this.id,
                            direction: direction
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.error) return;

                        this.qty = data.qty;

                        // update subtotal item
                        const subEl = document.getElementById('subtotal-' + this.id);
                        if (subEl) {
                            subEl.textContent = 'Rp ' + new Intl.NumberFormat('id-ID').format(data.subtotal);
                        }

                        // update total belanja
                        const totalEl = document.getElementById('totalBelanja');
                        if (totalEl) {
                            totalEl.textContent = 'Rp ' + new Intl.NumberFormat('id-ID').format(data.total);
                        }
                    })
                    .catch(err => console.error(err));
                }
            }
        }
    </script>
</x-app-layout>
