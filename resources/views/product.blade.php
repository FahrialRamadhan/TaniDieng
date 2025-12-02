<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="icon" type="image/png" sizes="48x48" href="img/favicon.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>Product</title>
  <style>
    details[open] > div { animation: dropdown-open 0.25s ease-out; }
    @keyframes dropdown-open { 0% {opacity:0;transform:translateY(-6px)} 100% {opacity:1;transform:translateY(0)} }
    .search-wrap{width:0;opacity:0;pointer-events:none;transition:width .28s ease,opacity .2s ease}
    .search-wrap.open{width:min(640px,55vw);opacity:1;pointer-events:auto}
    @media (max-width:640px){ .search-wrap.open{width:60vw} }
  </style>
</head>
<body>
@include('layouts.navbar-guest')
<div>
    <img src="img/bennerproduct.png" alt="Gambar Produk" class="w-full h-64 object-cover mt-16"/>
</div>

<!-- SECTION: PRODUK + FILTER -->
<section class="bg-[#0F5529] text-white py-10 ">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <h2 class="text-3xl font-semibold mb-6">Produk</h2>

    <div class="grid gap-8 lg:grid-cols-12">
      <!-- SIDEBAR FILTER (STICKY) -->
      <aside class="lg:col-span-3 lg:sticky lg:top-20 lg:z-10 self-start">
        <div class="rounded-xl border border-white/20 bg-white/5 p-4 shadow-[0_8px_25px_rgba(0,0,0,.25)]
                    lg:max-h-[calc(100vh-6rem)] lg:overflow-auto">
          <div class="flex items-center justify-between mb-3">
            <div class="font-semibold">Filter</div>
            <button id="resetFilters" type="button" class="text-xs px-2 py-1 rounded border border-white/30 hover:bg-white/10">
              Reset
            </button>
          </div>

          <!-- Search -->
          <label class="sr-only" for="q">Cari</label>
          <div class="relative">
            <input id="q" type="text" placeholder="Cari berdasarkan filter"
                   class="w-full rounded-md bg-white/10 border border-white/20 px-3 py-2 text-sm placeholder-white/60
                          focus:outline-none focus:ring-2 focus:ring-white/30" />
            <svg class="absolute right-3 top-2.5 h-4 w-4 text-white/70" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
              <circle cx="11" cy="11" r="7"></circle><path d="m20 20-3.5-3.5" stroke-linecap="round"></path>
            </svg>
          </div>

          <!-- Kategori -->
          <div class="mt-5">
            <div class="text-sm font-semibold mb-2">Kategori</div>
            <div class="space-y-2 text-sm">
              <label class="flex items-center gap-2">
                <input type="checkbox" class="accent-emerald-500/90 rounded-sm" /> Sayuran
              </label>
              <label class="flex items-center gap-2">
                <input type="checkbox" class="accent-emerald-500/90 rounded-sm" /> Buah
              </label>
              <label class="flex items-center gap-2">
                <input type="checkbox" class="accent-emerald-500/90 rounded-sm" /> Kacang
              </label>
              <label class="flex items-center gap-2">
                <input type="checkbox" class="accent-emerald-500/90 rounded-sm" /> Akar
              </label>
              <label class="flex items-center gap-2">
                <input type="checkbox" class="accent-emerald-500/90 rounded-sm" /> Umbi
              </label>
              <label class="flex items-center gap-2">
                <input type="checkbox" class="accent-emerald-500/90 rounded-sm" /> Herbal
              </label>
            </div>
          </div>

          <!-- Produsen -->
          <div class="mt-5">
            <div class="text-sm font-semibold mb-2">Produsen</div>
            <select class="w-full rounded-md bg-white/10 border border-white/20 px-3 py-2 text-sm focus:ring-2 focus:ring-white/30">
              <option value="">Semua produsen</option>
              <option>Jono Kagama</option>
              <option>Kopi Merapi</option>
              <option>Dieng Farm</option>
            </select>
          </div>

          <!-- Rentang harga -->
          <div class="mt-6">
            <div class="text-sm font-semibold mb-2">Rentang harga</div>
            <div class="flex items-center gap-3">
              <input id="minPrice" type="range" min="0" max="250000" step="5000" value="10000"
                     class="w-full accent-emerald-500" />
            </div>
            <div class="mt-2 text-xs text-white/80">
              Harga: <span id="minPriceText">Rp 10.000</span> — <span id="maxPriceText">Rp 250.000</span>
            </div>
            <div class="mt-3">
              <input id="maxPrice" type="range" min="0" max="250000" step="5000" value="250000"
                     class="w-full accent-emerald-500" />
            </div>
          </div>
        </div>
      </aside>

  <!-- GRID PRODUK -->
<main class="lg:col-span-9">
  <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
      @forelse ($products as $product)
          {{-- panggil component cardbarang dan kirim object produk --}}
          <x-cardbarang :product="$product" />
      @empty
          <p class="text-sm text-white/80 col-span-full">
              Belum ada produk yang ditampilkan.
          </p>
      @endforelse
  </div>
</main>



    </div>
  </div>
</section>
@include('layouts.footer')
<script>
 const minRange = document.getElementById('minPrice');
  const maxRange = document.getElementById('maxPrice');
  const minText  = document.getElementById('minPriceText');
  const maxText  = document.getElementById('maxPriceText');
  const resetBtn = document.getElementById('resetFilters');
  const rupiah = n => new Intl.NumberFormat('id-ID',{style:'currency',currency:'IDR',maximumFractionDigits:0}).format(n);

  function syncPrice() {
    if (!minRange || !maxRange) return;
    const a = Math.min(+minRange.value, +maxRange.value);
    const b = Math.max(+minRange.value, +maxRange.value);
    if (minText) minText.textContent = rupiah(a);
    if (maxText) maxText.textContent = rupiah(b);
  }
  minRange?.addEventListener('input', syncPrice);
  maxRange?.addEventListener('input', syncPrice);
  syncPrice();

  resetBtn?.addEventListener('click', () => {
    const q = document.getElementById('q');
    if (q) q.value = '';
    if (minRange) minRange.value = 10000;
    if (maxRange) maxRange.value = 250000;
    document.querySelectorAll('input[type="checkbox"]').forEach(cb => cb.checked = false);
    document.querySelector('select')?.selectedIndex = 0;
    syncPrice();
    // TODO: panggil ulang fungsi filter data jika ada
  });

    const btn = document.getElementById('searchBtn');
    const wrap = document.getElementById('searchWrap');
    const input = document.getElementById('searchInput');

    function openSearch(){ wrap.classList.add('open'); setTimeout(()=>input.focus(),60); }
    function closeSearch(){ wrap.classList.remove('open'); input.blur(); }
    btn.addEventListener('click', () => {
      wrap.classList.toggle('open');
      if (wrap.classList.contains('open')) setTimeout(()=>input.focus(),60);
    });
    document.addEventListener('keydown', e => { if (e.key==='Escape') closeSearch(); });
    document.addEventListener('click', e => {
      const isInside = wrap.contains(e.target) || btn.contains(e.target);
      if (!isInside) closeSearch();
    });
</script>
</body>
</html>