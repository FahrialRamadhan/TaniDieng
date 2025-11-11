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
  <title>Daftar Produsen</title>
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
    <img src="img/bennerprodusen.png" alt="Gambar Produk" class="w-full h-64 object-cover mt-16"/>
</div>

<section id="produk" class="bg-[#0F5529] min-h-screen py-10">
  <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
    <h2 class="text-white text-2xl font-semibold mb-6">Produk</h2>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
      <!-- Sidebar Filter -->
      <aside class="lg:col-span-3">
        <div class="rounded-xl border border-white/20 bg-white/5 backdrop-blur p-4 text-white sticky top-6">
          <div class="flex items-center justify-between mb-3">
            <div class="flex items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 4h18M6 8h12M9 12h6m-4 4h2m-8 4h12"/>
              </svg>
              <span class="text-sm font-medium">Filter</span>
            </div>
          </div>

          <label class="block text-xs mb-1 opacity-80">Cari berdasarkan filter</label>
          <input type="text" placeholder="Ketik kata kunci..."
                 class="mb-3 w-full rounded-lg border border-white/20 bg-white/10 px-3 py-2 text-sm placeholder-white/60 focus:outline-none focus:ring-1 focus:ring-white/40">
          
          <label class="block text-xs mb-1 opacity-80">Nama</label>
          <select class="mb-3 w-full rounded-lg border border-white/20 bg-white/10 px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-white/40">
            <option>Semua</option>
            <option>Jono Kagama</option>
          </select>

          <label class="block text-xs mb-1 opacity-80">Nama samar</label>
          <input type="text" placeholder="Mis. Jono"
                 class="w-full rounded-lg border border-white/20 bg-white/10 px-3 py-2 text-sm placeholder-white/60 focus:outline-none focus:ring-1 focus:ring-white/40">
        </div>
      </aside>

      <!-- Grid Kartu -->
      <div class="lg:col-span-9">
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">
          <!-- KARTU (duplikasi sesuai kebutuhan) -->
          <article class="rounded-xl border border-white/20 bg-white/5 text-white p-4">
            <div class="flex items-start justify-between">
              <div class="h-20 w-20 rounded-lg bg-white/10 grid place-items-center">
                <!-- Avatar sederhana -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36" class="h-14 w-14">
                  <circle cx="18" cy="12" r="7" fill="#F7C59F"/>
                  <rect x="6" y="22" width="24" height="10" rx="3" fill="#D2691E"/>
                </svg>
              </div>
              <button class="p-1 rounded hover:bg-white/10" aria-label="Menu lainnya">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M10 3a2 2 0 110 4 2 2 0 010-4zm0 5a2 2 0 110 4 2 2 0 010-4zm0 5a2 2 0 110 4 2 2 0 010-4z"/></svg>
              </button>
            </div>

            <div class="mt-3 space-y-1 text-sm">
              <p class="font-semibold">Jono Kagama</p>
              <p class="text-white/80">email : <span class="underline">jono@examplemail.com</span></p>
              <p class="text-white/80">Tlp : <a href="tel:+6281233345678" class="underline">+62 812-3334-5678</a></p>
            </div>

            <div class="mt-4 space-y-2">
              <!-- Learn more = pindah ke page lain -->
              <a href="{{ route('viewprodusen') }}"
                 class="block w-full rounded-md border border-white/25 bg-white/10 px-3 py-2 text-center text-sm hover:bg-white/20 transition">
                Learn more
              </a>

              <a href="https://wa.me/6281233345678"
                 class="block w-full rounded-md border border-white/25 bg-white/10 px-3 py-2 text-center text-sm hover:bg-white/20 transition">
                Kirim Pesan
              </a>
            </div>
          </article>
          <article class="rounded-xl border border-white/20 bg-white/5 text-white p-4">
            <div class="flex items-start justify-between">
              <div class="h-20 w-20 rounded-lg bg-white/10 grid place-items-center">
                <!-- Avatar sederhana -->
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 36 36" class="h-14 w-14">
                  <circle cx="18" cy="12" r="7" fill="#F7C59F"/>
                  <rect x="6" y="22" width="24" height="10" rx="3" fill="#D2691E"/>
                </svg>
              </div>
              <button class="p-1 rounded hover:bg-white/10" aria-label="Menu lainnya">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M10 3a2 2 0 110 4 2 2 0 010-4zm0 5a2 2 0 110 4 2 2 0 010-4zm0 5a2 2 0 110 4 2 2 0 010-4z"/></svg>
              </button>
            </div>

            <div class="mt-3 space-y-1 text-sm">
              <p class="font-semibold">Jono Kagama</p>
              <p class="text-white/80">email : <span class="underline">jono@examplemail.com</span></p>
              <p class="text-white/80">Tlp : <a href="tel:+6281233345678" class="underline">+62 812-3334-5678</a></p>
            </div>

            <div class="mt-4 space-y-2">
              <!-- Learn more = pindah ke page lain -->
              <a href="{{ route('viewprodusen') }}"
                 class="block w-full rounded-md border border-white/25 bg-white/10 px-3 py-2 text-center text-sm hover:bg-white/20 transition">
                Learn more
              </a>

              <a href="https://wa.me/6281233345678"
                 class="block w-full rounded-md border border-white/25 bg-white/10 px-3 py-2 text-center text-sm hover:bg-white/20 transition">
                Kirim Pesan
              </a>
            </div>
          </article>
      </div>
    </div>
  </div>
</section>



<script>
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