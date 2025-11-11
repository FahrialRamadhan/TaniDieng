<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="icon" type="image/png" sizes="48x48" href="img/favicon.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  @vite('resources/css/app.css')
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
<!-- SECTION: BACKGROUND + NAV + HERO -->
 <header class="fixed inset-x-0 top-0 z-30 bg-[#0A5F2B] text-white shadow-sm">
      <nav class="w-full flex items-center justify-between px-4 py-3 lg:px-6">
        <!-- Kiri: MENU + Search -->
        <div class="flex items-center gap-3 sm:gap-4">
          <!-- MENU -->
          <details class="relative group z-50">
            <summary class="relative z-50 list-none cursor-pointer select-none flex items-center gap-2 text-white/90 hover:text-white rounded-md px-2 py-1">
              <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5">
                <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" />
              </svg>
              <span class="text-sm">Menu</span>
            </summary>

            <!-- panel glassy -->
            <div class="absolute left-0 mt-3 w-72 rounded-xl border border-white/25 bg-white/10 text-white/90 backdrop-blur-md shadow-lg">
              <div class="p-2">
                <a href="{{ route('home') }}" class="block rounded-lg px-4 py-2.5 text-[13px] font-medium hover:bg-white/10">Beranda</a>
                <a href="{{ route('tentang') }}" class="block rounded-lg px-4 py-2.5 text-[13px] font-medium hover:bg-white/10">Tentang</a>
                <a href="{{ route('product') }}" class="block rounded-lg px-4 py-2.5 text-[13px] font-medium hover:bg-white/10">Belanja</a>

                <!-- Submenu Produsen -->
                <details class="group/sub relative">
                  <summary class="list-none flex items-center justify-between rounded-lg px-4 py-2.5 text-[13px] font-medium hover:bg-white/10 cursor-pointer">
                    <span>Produsen</span>
                    <svg viewBox="0 0 24 24" class="h-4 w-4 transition-transform group-open/sub:rotate-180" fill="none" stroke="currentColor" stroke-width="1.5">
                      <path d="M6 9l6 6 6-6" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                  </summary>
                  <div class="mx-3 mb-2 rounded-lg border border-white/15 bg-white/5 p-1">
                    <a href="{{ route('produsen') }}" class="block rounded-md px-3 py-2 text-[13px] hover:bg-white/10">Daftar Produsen</a>
                  </div>
                </details>

                <a href="{{ route('bantuan') }}" class="block rounded-lg px-4 py-2.5 text-[13px] font-medium hover:bg-white/10">Bantuan</a>
              </div>
              <div class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-white/10"></div>
            </div>

            <!-- Overlay visual -->
            <div class="hidden group-open:block fixed inset-0 z-40 pointer-events-none"></div>
          </details>

          <!-- Tombol Search -->
          <button id="searchBtn" type="button" aria-label="Cari"
                  class="flex items-center justify-center h-8 w-8 rounded-md text-white/90 hover:text-white focus:outline-none">
            <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5">
              <circle cx="11" cy="11" r="7"></circle>
              <path d="m20 20-3.5-3.5" stroke-linecap="round"></path>
            </svg>
          </button>

          <!-- Input Search -->
          <div id="searchWrap" class="search-wrap overflow-hidden">
            <form action="#" method="GET" class="flex">
              <input id="searchInput" name="q" type="text" placeholder="Cari produk atau informasi…"
                     class="w-full rounded-full px-4 py-2 text-sm bg-white text-[#0A5F2B] placeholder-black/50
                            border border-white/70 outline-none focus:ring-2 focus:ring-white/50" />
            </form>
          </div>
        </div>

        <!-- LOGO -->
        <a href="{{ route('home') }}" class="flex items-center ml-4">
          <img src="img/favicon.png" alt="Logo" class="h-10 w-10 object-contain translate-y-[-1px]" />
          <span class="font-semibold leading-none mr-4">TaniDieng</span>
        </a>

        <!-- CTA kanan -->
        <div class="flex items-center gap-4">
          <a href="{{ route('login') }}"
             class="rounded-full border border-white/70 px-4 py-1.5 text-xs sm:text-sm font-semibold text-white/90 hover:bg-white/10">
            Daftar / Masuk
          </a>
          <a href="#" aria-label="Keranjang" class="text-white/90 hover:text-white">
            <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5">
              <path d="M3 6h18l-1.5 9h-13L4 6z" stroke-linejoin="round"></path>
              <circle cx="9" cy="20" r="1"></circle>
              <circle cx="17" cy="20" r="1"></circle>
            </svg>
          </a>
        </div>
      </nav>
    </header>

<div>
    <img src="img/bennerproduct.png" alt="Gambar Produk" class="w-full h-64 object-cover mt-16"/>
</div>

<!-- SECTION: PRODUK + FILTER -->
<section class="bg-[#0F5529] text-white py-10">
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
          <!-- KARTU PRODUK (template) -->
          <article class="group flex flex-col rounded-xl border border-white/25 bg-white/5 overflow-hidden shadow-[0_8px_25px_rgba(0,0,0,.25)] hover:shadow-[0_10px_30px_rgba(0,0,0,.35)] transition">
            <div class="p-3">
              <img src="img/kopi.png" alt="Kopi" class="h-48 w-full object-cover rounded-lg ring-1 ring-white/10" />
            </div>
            <div class="px-4 pb-4 pt-1 flex flex-col gap-2 flex-1">
              <div class="flex items-baseline justify-between">
                <h3 class="font-semibold">Kopi <span class="text-white/70 text-sm">(1kg)</span></h3>
                <div class="text-sm font-semibold">Rp 50.000</div>
              </div>
              <p class="text-xs text-white/75 -mt-1">Produsen : <a class="underline hover:text-white" href="#">Jono Kagama</a></p>

              <div class="mt-3 space-y-2 mt-auto">
                <button class="w-full rounded-md border border-white/60 bg-[#2A7A3A]/60 hover:bg-[#2A7A3A] text-sm py-2 transition">
                  Beli Sekarang
                </button>
                <button class="w-full rounded-md border border-white/60 hover:bg-white/10 text-sm py-2 transition">
                  Keranjang
                </button>
              </div>
            </div>
          </article>
          <article class="group flex flex-col rounded-xl border border-white/25 bg-white/5 overflow-hidden shadow-[0_8px_25px_rgba(0,0,0,.25)]">
            <div class="p-3">
              <img src="img/kopi.png" alt="Kopi" class="h-48 w-full object-cover rounded-lg ring-1 ring-white/10" />
            </div>
            <div class="px-4 pb-4 pt-1 flex flex-col gap-2 flex-1">
              <div class="flex items-baseline justify-between">
                <h3 class="font-semibold">Kopi <span class="text-white/70 text-sm">(1kg)</span></h3>
                <div class="text-sm font-semibold">Rp 50.000</div>
              </div>
              <p class="text-xs text-white/75 -mt-1">Produsen : <a class="underline hover:text-white" href="#">Jono Kagama</a></p>
              <div class="mt-3 space-y-2 mt-auto">
                <button class="w-full rounded-md border border-white/60 bg-[#2A7A3A]/60 hover:bg-[#2A7A3A] text-sm py-2">Beli Sekarang</button>
                <button class="w-full rounded-md border border-white/60 hover:bg-white/10 text-sm py-2">Keranjang</button>
              </div>
            </div>
          </article>
          <article class="group flex flex-col rounded-xl border border-white/25 bg-white/5 overflow-hidden shadow-[0_8px_25px_rgba(0,0,0,.25)]">
            <div class="p-3">
              <img src="img/kopi.png" alt="Kopi" class="h-48 w-full object-cover rounded-lg ring-1 ring-white/10" />
            </div>
            <div class="px-4 pb-4 pt-1 flex flex-col gap-2 flex-1">
              <div class="flex items-baseline justify-between">
                <h3 class="font-semibold">Kopi <span class="text-white/70 text-sm">(1kg)</span></h3>
                <div class="text-sm font-semibold">Rp 50.000</div>
              </div>
              <p class="text-xs text-white/75 -mt-1">Produsen : <a class="underline hover:text-white" href="#">Jono Kagama</a></p>
              <div class="mt-3 space-y-2 mt-auto">
                <button class="w-full rounded-md border border-white/60 bg-[#2A7A3A]/60 hover:bg-[#2A7A3A] text-sm py-2">Beli Sekarang</button>
                <button class="w-full rounded-md border border-white/60 hover:bg-white/10 text-sm py-2">Keranjang</button>
              </div>
            </div>
          </article>
                 <article class="group flex flex-col rounded-xl border border-white/25 bg-white/5 overflow-hidden shadow-[0_8px_25px_rgba(0,0,0,.25)]">
            <div class="p-3">
              <img src="img/kopi.png" alt="Kopi" class="h-48 w-full object-cover rounded-lg ring-1 ring-white/10" />
            </div>
            <div class="px-4 pb-4 pt-1 flex flex-col gap-2 flex-1">
              <div class="flex items-baseline justify-between">
                <h3 class="font-semibold">Kopi <span class="text-white/70 text-sm">(1kg)</span></h3>
                <div class="text-sm font-semibold">Rp 50.000</div>
              </div>
              <p class="text-xs text-white/75 -mt-1">Produsen : <a class="underline hover:text-white" href="#">Jono Kagama</a></p>
              <div class="mt-3 space-y-2 mt-auto">
                <button class="w-full rounded-md border border-white/60 bg-[#2A7A3A]/60 hover:bg-[#2A7A3A] text-sm py-2">Beli Sekarang</button>
                <button class="w-full rounded-md border border-white/60 hover:bg-white/10 text-sm py-2">Keranjang</button>
              </div>
            </div>
          </article>
                 <article class="group flex flex-col rounded-xl border border-white/25 bg-white/5 overflow-hidden shadow-[0_8px_25px_rgba(0,0,0,.25)]">
            <div class="p-3">
              <img src="img/kopi.png" alt="Kopi" class="h-48 w-full object-cover rounded-lg ring-1 ring-white/10" />
            </div>
            <div class="px-4 pb-4 pt-1 flex flex-col gap-2 flex-1">
              <div class="flex items-baseline justify-between">
                <h3 class="font-semibold">Kopi <span class="text-white/70 text-sm">(1kg)</span></h3>
                <div class="text-sm font-semibold">Rp 50.000</div>
              </div>
              <p class="text-xs text-white/75 -mt-1">Produsen : <a class="underline hover:text-white" href="#">Jono Kagama</a></p>
              <div class="mt-3 space-y-2 mt-auto">
                <button class="w-full rounded-md border border-white/60 bg-[#2A7A3A]/60 hover:bg-[#2A7A3A] text-sm py-2">Beli Sekarang</button>
                <button class="w-full rounded-md border border-white/60 hover:bg-white/10 text-sm py-2">Keranjang</button>
              </div>
            </div>
          </article>
                 <article class="group flex flex-col rounded-xl border border-white/25 bg-white/5 overflow-hidden shadow-[0_8px_25px_rgba(0,0,0,.25)]">
            <div class="p-3">
              <img src="img/kopi.png" alt="Kopi" class="h-48 w-full object-cover rounded-lg ring-1 ring-white/10" />
            </div>
            <div class="px-4 pb-4 pt-1 flex flex-col gap-2 flex-1">
              <div class="flex items-baseline justify-between">
                <h3 class="font-semibold">Kopi <span class="text-white/70 text-sm">(1kg)</span></h3>
                <div class="text-sm font-semibold">Rp 50.000</div>
              </div>
              <p class="text-xs text-white/75 -mt-1">Produsen : <a class="underline hover:text-white" href="#">Jono Kagama</a></p>
              <div class="mt-3 space-y-2 mt-auto">
                <button class="w-full rounded-md border border-white/60 bg-[#2A7A3A]/60 hover:bg-[#2A7A3A] text-sm py-2">Beli Sekarang</button>
                <button class="w-full rounded-md border border-white/60 hover:bg-white/10 text-sm py-2">Keranjang</button>
              </div>
            </div>
          </article>
                 <article class="group flex flex-col rounded-xl border border-white/25 bg-white/5 overflow-hidden shadow-[0_8px_25px_rgba(0,0,0,.25)]">
            <div class="p-3">
              <img src="img/kopi.png" alt="Kopi" class="h-48 w-full object-cover rounded-lg ring-1 ring-white/10" />
            </div>
            <div class="px-4 pb-4 pt-1 flex flex-col gap-2 flex-1">
              <div class="flex items-baseline justify-between">
                <h3 class="font-semibold">Kopi <span class="text-white/70 text-sm">(1kg)</span></h3>
                <div class="text-sm font-semibold">Rp 50.000</div>
              </div>
              <p class="text-xs text-white/75 -mt-1">Produsen : <a class="underline hover:text-white" href="#">Jono Kagama</a></p>
              <div class="mt-3 space-y-2 mt-auto">
                <button class="w-full rounded-md border border-white/60 bg-[#2A7A3A]/60 hover:bg-[#2A7A3A] text-sm py-2">Beli Sekarang</button>
                <button class="w-full rounded-md border border-white/60 hover:bg-white/10 text-sm py-2">Keranjang</button>
              </div>
            </div>
          </article>
                 <article class="group flex flex-col rounded-xl border border-white/25 bg-white/5 overflow-hidden shadow-[0_8px_25px_rgba(0,0,0,.25)]">
            <div class="p-3">
              <img src="img/kopi.png" alt="Kopi" class="h-48 w-full object-cover rounded-lg ring-1 ring-white/10" />
            </div>
            <div class="px-4 pb-4 pt-1 flex flex-col gap-2 flex-1">
              <div class="flex items-baseline justify-between">
                <h3 class="font-semibold">Kopi <span class="text-white/70 text-sm">(1kg)</span></h3>
                <div class="text-sm font-semibold">Rp 50.000</div>
              </div>
              <p class="text-xs text-white/75 -mt-1">Produsen : <a class="underline hover:text-white" href="#">Jono Kagama</a></p>
              <div class="mt-3 space-y-2 mt-auto">
                <button class="w-full rounded-md border border-white/60 bg-[#2A7A3A]/60 hover:bg-[#2A7A3A] text-sm py-2">Beli Sekarang</button>
                <button class="w-full rounded-md border border-white/60 hover:bg-white/10 text-sm py-2">Keranjang</button>
              </div>
            </div>
          </article>
                 <article class="group flex flex-col rounded-xl border border-white/25 bg-white/5 overflow-hidden shadow-[0_8px_25px_rgba(0,0,0,.25)]">
            <div class="p-3">
              <img src="img/kopi.png" alt="Kopi" class="h-48 w-full object-cover rounded-lg ring-1 ring-white/10" />
            </div>
            <div class="px-4 pb-4 pt-1 flex flex-col gap-2 flex-1">
              <div class="flex items-baseline justify-between">
                <h3 class="font-semibold">Kopi <span class="text-white/70 text-sm">(1kg)</span></h3>
                <div class="text-sm font-semibold">Rp 50.000</div>
              </div>
              <p class="text-xs text-white/75 -mt-1">Produsen : <a class="underline hover:text-white" href="#">Jono Kagama</a></p>
              <div class="mt-3 space-y-2 mt-auto">
                <button class="w-full rounded-md border border-white/60 bg-[#2A7A3A]/60 hover:bg-[#2A7A3A] text-sm py-2">Beli Sekarang</button>
                <button class="w-full rounded-md border border-white/60 hover:bg-white/10 text-sm py-2">Keranjang</button>
              </div>
            </div>
          </article>
                 <article class="group flex flex-col rounded-xl border border-white/25 bg-white/5 overflow-hidden shadow-[0_8px_25px_rgba(0,0,0,.25)]">
            <div class="p-3">
              <img src="img/kopi.png" alt="Kopi" class="h-48 w-full object-cover rounded-lg ring-1 ring-white/10" />
            </div>
            <div class="px-4 pb-4 pt-1 flex flex-col gap-2 flex-1">
              <div class="flex items-baseline justify-between">
                <h3 class="font-semibold">Kopi <span class="text-white/70 text-sm">(1kg)</span></h3>
                <div class="text-sm font-semibold">Rp 50.000</div>
              </div>
              <p class="text-xs text-white/75 -mt-1">Produsen : <a class="underline hover:text-white" href="#">Jono Kagama</a></p>
              <div class="mt-3 space-y-2 mt-auto">
                <button class="w-full rounded-md border border-white/60 bg-[#2A7A3A]/60 hover:bg-[#2A7A3A] text-sm py-2">Beli Sekarang</button>
                <button class="w-full rounded-md border border-white/60 hover:bg-white/10 text-sm py-2">Keranjang</button>
              </div>
            </div>
          </article>
                 <article class="group flex flex-col rounded-xl border border-white/25 bg-white/5 overflow-hidden shadow-[0_8px_25px_rgba(0,0,0,.25)]">
            <div class="p-3">
              <img src="img/kopi.png" alt="Kopi" class="h-48 w-full object-cover rounded-lg ring-1 ring-white/10" />
            </div>
            <div class="px-4 pb-4 pt-1 flex flex-col gap-2 flex-1">
              <div class="flex items-baseline justify-between">
                <h3 class="font-semibold">Kopi <span class="text-white/70 text-sm">(1kg)</span></h3>
                <div class="text-sm font-semibold">Rp 50.000</div>
              </div>
              <p class="text-xs text-white/75 -mt-1">Produsen : <a class="underline hover:text-white" href="#">Jono Kagama</a></p>
              <div class="mt-3 space-y-2 mt-auto">
                <button class="w-full rounded-md border border-white/60 bg-[#2A7A3A]/60 hover:bg-[#2A7A3A] text-sm py-2">Beli Sekarang</button>
                <button class="w-full rounded-md border border-white/60 hover:bg-white/10 text-sm py-2">Keranjang</button>
              </div>
            </div>
          </article>
                 <article class="group flex flex-col rounded-xl border border-white/25 bg-white/5 overflow-hidden shadow-[0_8px_25px_rgba(0,0,0,.25)]">
            <div class="p-3">
              <img src="img/kopi.png" alt="Kopi" class="h-48 w-full object-cover rounded-lg ring-1 ring-white/10" />
            </div>
            <div class="px-4 pb-4 pt-1 flex flex-col gap-2 flex-1">
              <div class="flex items-baseline justify-between">
                <h3 class="font-semibold">Kopi <span class="text-white/70 text-sm">(1kg)</span></h3>
                <div class="text-sm font-semibold">Rp 50.000</div>
              </div>
              <p class="text-xs text-white/75 -mt-1">Produsen : <a class="underline hover:text-white" href="#">Jono Kagama</a></p>
              <div class="mt-3 space-y-2 mt-auto">
                <button class="w-full rounded-md border border-white/60 bg-[#2A7A3A]/60 hover:bg-[#2A7A3A] text-sm py-2">Beli Sekarang</button>
                <button class="w-full rounded-md border border-white/60 hover:bg-white/10 text-sm py-2">Keranjang</button>
              </div>
            </div>
          </article>

        </div>
      </main>
    </div>
  </div>
</section>

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