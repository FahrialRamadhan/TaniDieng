<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="icon" type="image/png" sizes="48x48" href="img/favicon.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  @vite('resources/css/app.css')
  <title>View</title>
  <style>
    details[open] > div { animation: dropdown-open .25s ease-out; }
    @keyframes dropdown-open { 0%{opacity:0;transform:translateY(-6px)} 100%{opacity:1;transform:translateY(0)} }
    .search-wrap{width:0;opacity:0;pointer-events:none;transition:width .28s ease,opacity .2s ease}
    .search-wrap.open{width:min(640px,55vw);opacity:1;pointer-events:auto}
    @media (max-width:640px){ .search-wrap.open{width:60vw} }
  </style>
</head>
<body class="min-h-screen flex flex-col bg-[#0F5529] text-white">

  <!-- HEADER (fixed) -->
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

  <!-- spacer agar konten tidak tertutup header fixed -->
  <div class="h-14 lg:h-16"></div>

  <!-- MAIN -->
  <main class="flex-1">
    <!-- DETAIL PRODUSEN -->
    <section class="text-white py-10">
      <div class="mx-auto max-w-[1160px] px-4">
        <!-- panel glassy -->
        <div class="relative rounded-xl border border-white/30 bg-[#155C36]/40 backdrop-blur-[2px] shadow-[0_10px_40px_rgba(0,0,0,.35)]">
          <!-- ring luar halus -->
          <div class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-inset ring-white/10"></div>

          <!-- tombol kembali -->
          <div class="px-6 pt-5">
            <a href="javascript:history.back()" class="inline-flex items-center gap-2 text-white/85 hover:text-white text-sm">
              <svg viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M15 18l-6-6 6-6"/>
              </svg>
              Kembali
            </a>
          </div>

          <!-- isi -->
          <div class="px-6 pb-8">
            <div class="mt-4 grid grid-cols-1 md:grid-cols-12 gap-8">
              <!-- avatar/kartu kiri -->
              <div class="md:col-span-4">
                <div class="mx-auto w-full max-w-[360px] rounded-xl bg-white/5 ring-1 ring-white/10 p-2">
                  <img src="img/avatar-producer.png" alt="Jono Kagano"
                       class="h-64 w-full object-cover rounded-lg" />
                </div>
              </div>

              <!-- informasi kanan -->
              <div class="md:col-span-8">
                <h1 class="text-[32px] leading-tight font-semibold">Jono Kagano</h1>

                <div class="mt-5 grid grid-cols-1 md:grid-cols-2 gap-10 text-sm">
                  <!-- kolom kiri -->
                  <div class="space-y-4">
                    <div>
                      <div class="text-white/70 text-[12px]">Produsen</div>
                      <div class="font-semibold">Jono Kagano</div>
                    </div>

                    <div>
                      <div class="text-white/70 text-[12px]">Lokasi Produksi</div>
                      <div class="font-semibold">-</div>
                    </div>

                    <div>
                      <div class="text-white/70 text-[12px]">Kontak</div>
                      <div class="font-semibold">
                        <a href="mailto:jono.kagano@gmail.com" class="underline hover:text-white">Jono.Kagano@gmail.com</a>
                      </div>
                      <div class="font-semibold">
                        <a href="tel:+628946234823784" class="underline hover:text-white">08946234823784</a>
                      </div>
                    </div>
                  </div>

                  <!-- kolom kanan -->
                  <div class="space-y-4">
                    <div>
                      <div class="text-white/70 text-[12px]">Bahasa</div>
                      <div class="font-semibold">Indonesia</div>
                    </div>

                    <div>
                      <div class="text-white/70 text-[12px]">Sertifikat</div>
                      <div class="font-semibold">-</div>
                    </div>
                  </div>
                </div>

                <!-- garis pemisah panjang tipis -->
                <div class="mt-6 h-px bg-white/15 w-full md:w-[88%]"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <!-- FOOTER -->
  <footer class="bg-[#042F16] text-white py-12">
    <div class="max-w-7xl mx-auto px-8 grid grid-cols-1 md:grid-cols-5 gap-8 md:gap-14">
      
      <!-- Kolom 1: Logo dan Hak Cipta -->
      <div class="md:col-span-2">
        <div class="flex items-center gap-2 mb-4">
          <img src="img/favicon.png" alt="Logo" class="h-10 w-10 object-contain">
          <span class="text-lg font-semibold">TaniDieng</span>
        </div>

        <p class="text-xs text-white/80 mb-6 leading-relaxed">
          Copyright © 2025 TaniDieng.<br>All rights reserved.
        </p>

        <!-- Ikon Sosial Media -->
        <div class="flex items-center gap-4">
          <a href="#" class="h-10 w-10 flex items-center justify-center rounded-full border border-white/30 text-white hover:bg-white/20 hover:scale-110 transition-all duration-300" aria-label="Instagram">
            <i class="fab fa-instagram text-lg"></i>
          </a>
          <a href="#" class="h-10 w-10 flex items-center justify-center rounded-full border border-white/30 text-white hover:bg-white/20 hover:scale-110 transition-all duration-300" aria-label="Dribbble">
            <i class="fab fa-dribbble text-lg"></i>
          </a>
          <a href="#" class="h-10 w-10 flex items-center justify-center rounded-full border border-white/30 text-white hover:bg-white/20 hover:scale-110 transition-all duration-300" aria-label="X (Twitter)">
            <i class="fab fa-x-twitter text-lg"></i>
          </a>
          <a href="#" class="h-10 w-10 flex items-center justify-center rounded-full border border-white/30 text-white hover:bg-white/20 hover:scale-110 transition-all duration-300" aria-label="YouTube">
            <i class="fab fa-youtube text-lg"></i>
          </a>
        </div>
      </div>

      <!-- Kolom 2 -->
      <div>
        <h3 class="font-semibold mb-3 text-sm">Company</h3>
        <ul class="space-y-2 text-white/80 text-xs">
          <li><a href="#" class="hover:text-white">Profil</a></li>
          <li><a href="#" class="hover:text-white">Kontak</a></li>
          <li><a href="#" class="hover:text-white">Harga</a></li>
          <li><a href="#" class="hover:text-white">Belanja</a></li>
          <li><a href="#" class="hover:text-white">Testimoni</a></li>
        </ul>
      </div>

      <!-- Kolom 3 -->
      <div>
        <h3 class="font-semibold mb-3 text-sm">Support</h3>
        <ul class="space-y-2 text-white/80 text-xs">
          <li><a href="#" class="hover:text-white">Support Petani</a></li>
          <li><a href="#" class="hover:text-white">Aturan</a></li>
          <li><a href="#" class="hover:text-white">Garansi</a></li>
          <li><a href="#" class="hover:text-white">Status</a></li>
          <li><a href="#" class="hover:text-white">Waktu</a></li>
        </ul>
      </div>

      <!-- Kolom 4 -->
      <div>
        <h3 class="font-semibold mb-3 text-sm">Company</h3>
        <ul class="space-y-2 text-white/80 text-xs">
          <li><a href="#" class="hover:text-white">Profil</a></li>
          <li><a href="#" class="hover:text-white">Kontak</a></li>
          <li><a href="#" class="hover:text-white">Harga</a></li>
          <li><a href="#" class="hover:text-white">Belanja</a></li>
          <li><a href="#" class="hover:text-white">Testimoni</a></li>
        </ul>
      </div>

    </div>
  </footer>

  <!-- kecil: toggle search -->
  <script>
    const btn = document.getElementById('searchBtn');
    const wrap = document.getElementById('searchWrap');
    btn?.addEventListener('click', () => wrap.classList.toggle('open'));
  </script>
</body>
</html>
