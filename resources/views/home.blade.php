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
  <title>TaniDieng</title>
  <style>
    details[open] > div { animation: dropdown-open 0.25s ease-out; }
    @keyframes dropdown-open { 0% {opacity:0;transform:translateY(-6px)} 100% {opacity:1;transform:translateY(0)} }

    .search-wrap{width:0;opacity:0;pointer-events:none;transition:width .28s ease,opacity .2s ease}
    .search-wrap.open{width:min(640px,55vw);opacity:1;pointer-events:auto}
    @media (max-width:640px){ .search-wrap.open{width:60vw} }
  </style>
</head>
<body class="text-white antialiased">

  <!-- SECTION: BACKGROUND + NAV + HERO -->
  <section class="relative min-h-screen overflow-hidden bg-black">
    <!-- Bg image + overlay -->
    <div class="absolute inset-0">
      <img src="img/pemandangan.png" alt="Dieng background"
           class="h-full w-full object-cover object-center" />
      <div class="absolute inset-0 bg-black/40"></div>
    </div>

    <!-- NAVBAR (fixed) -->
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
        <a href="/" class="flex items-center">
          <img src="img/favicon.png" alt="Logo" class="h-10 w-10 object-contain translate-y-[-1px]" />
          <span class="font-semibold leading-none">TaniDieng</span>
        </a>

        <!-- CTA kanan -->
        <div class="flex items-center gap-4">
          <a href="{{ route('login') }}"
             class="rounded-full border border-white/70 px-4 py-1.5 text-xs sm:text-sm font-semibold text-white/90 hover:bg-white/10">
            Daftar / Masuk
          </a>
          <a href="{{ route('login') }}" aria-label="Keranjang" class="text-white/90 hover:text-white">
            <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5">
              <path d="M3 6h18l-1.5 9h-13L4 6z" stroke-linejoin="round"></path>
              <circle cx="9" cy="20" r="1"></circle>
              <circle cx="17" cy="20" r="1"></circle>
            </svg>
          </a>
        </div>
      </nav>
    </header>

    <!-- HERO TEXT -->
    <main class="relative z-10 flex flex-col items-center justify-center text-center min-h-screen px-6 pt-24">
      <div>
        <h1 class="text-4xl font-light leading-tight tracking-wide sm:text-6xl">
          Selamat Datang,<br />
          Di <span class="font-semibold">TaniDieng</span>
        </h1>
        <p class="mt-4 text-white/80 text-lg max-w-md mx-auto">
          Platform pertanian modern untuk petani Dieng - berdaya, berinovasi, dan berkelanjutan.
        </p>
        <a href="#pilih-peran"
           class="mt-8 inline-block rounded-full bg-white/10 border border-white/60 px-6 py-3 text-sm font-semibold text-white/90 hover:bg-white/20 backdrop-blur-sm transition">
          Mulai Jelajahi
        </a>
      </div>
    </main>

    <!-- Vignette halus -->
    <div class="pointer-events-none absolute inset-0 ring-1 ring-inset ring-black/10"></div>
  </section>

  <!-- SECTION: TENTANG (HIJAU PENUH) -->
  <section class="relative bg-[#0A5F2B] text-white py-14 px-8">
  <!-- Garis Atas -->
  <div class="absolute top-0 left-0 w-full h-[1px] bg-white/30"></div>

  <div class="max-w-4xl mx-auto text-center">
    <p class="text-white/90 text-base leading-relaxed">
      AgriMarket merupakan platform perangkat lunak teknologi yang dibuat untuk
      memudahkan pemasaran dan distribusi hasil pertanian dengan efisien, transparan, dan
      berkelanjutan. Platform ini bertujuan untuk membantu petani lokal dengan menyediakan
      koneksi langsung antara mereka dan pembeli dalam komunitas lokal, seperti konsumen
      akhir, pedagang pasar, dan UKM makanan.
    </p>
  </div>

  <!-- Garis Bawah -->
  <div class="absolute bottom-0 left-0 w-full h-[1px] bg-white/30"></div>
</section>


<!-- SECTION: PILIH PERAN -->
<section id="pilih-peran" class="bg-[#0F5529] text-white py-24">
  <div class="max-w-7xl mx-auto px-6 md:px-8">
    <div class="flex flex-col md:flex-row items-center justify-center gap-16">
      
      <!-- Card Pelanggan -->
      <a href="/pelanggan"
         class="group flex w-[22rem] md:w-[35rem] lg:w-[35rem] h-40 overflow-hidden rounded-xl border border-white/25 bg-white/10 hover:bg-white/20 transition-all duration-300 shadow-md hover:shadow-lg">
        <img src="img/image 26.png" alt="Pelanggan"
             class="w-1/2 h-full object-cover" />
        <div class="flex items-center justify-center w-1/2">
          <span class="text-xl font-semibold group-hover:text-white">Pelanggan</span>
        </div>
      </a>

      <!-- Card Produsen -->
      <a href="/produsen"
         class="group flex w-[22rem] md:w-[35rem] lg:w-[35rem] h-40 overflow-hidden rounded-xl border border-white/25 bg-white/10 hover:bg-white/20 transition-all duration-300 shadow-md hover:shadow-lg">
        <img src="img/image 27.png" alt="Produsen"
             class="w-1/2 h-full object-cover" />
        <div class="flex items-center justify-center w-1/2">
          <span class="text-xl font-semibold group-hover:text-white">Produsen</span>
        </div>
      </a>

    </div>
  </div>
</section>





<section id="kategori" class="bg-[#0F5529] text-white py-20">
  <h2 class="text-3xl font-semibold mb-6 px-6 max-w-7xl mx-auto">Kategori</h2>

  <div class="max-w-7xl mx-auto px-6 md:px-8">
    <div class="rounded-xl border border-white/30 bg-white/5 backdrop-blur-sm p-8 md:p-10">
      <ul class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-7 place-items-center gap-10 md:gap-12">
        <!-- item -->
        <li class="flex flex-col items-center">
          <img src="img/sayur.png" alt="Sayur" class="h-20 w-auto mb-3" />
          <span class="text-sm">Sayur</span>
        </li>
        <li class="flex flex-col items-center">
          <img src="img/buah.png" alt="Sayur" class="h-20 w-auto mb-3" />
          <span class="text-sm">Buah</span>
        </li>
        <li class="flex flex-col items-center">
          <img src="img/kacang.png" alt="Sayur" class="h-20 w-auto mb-3" />
          <span class="text-sm">Kacang</span>
        </li>
        <li class="flex flex-col items-center">
          <img src="img/akar.png" alt="Sayur" class="h-20 w-auto mb-3" />
          <span class="text-sm">Akar</span>
        </li>
        <li class="flex flex-col items-center">
          <img src="img/umbi.png" alt="Sayur" class="h-20 w-auto mb-3" />
          <span class="text-sm">Umbi</span>
        </li>
        <li class="flex flex-col items-center">
          <img src="img/herbal.png" alt="Sayur" class="h-20 w-auto mb-3" />
          <span class="text-sm">Herbal</span>
        </li>
        <li class="flex flex-col items-center">
          <img src="img/sereal.png" alt="Sayur" class="h-20 w-auto mb-3" />
          <span class="text-sm">Sereal</span>
        </li>
      </ul>
    </div>
  </div>
</section>

<section id="baru" class="bg-[#0F5529] text-white py-16">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-3xl font-semibold mb-8">Baru-baru ditambahkan</h2>

    <!-- Grid dengan gap antar card -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8 justify-items-center">
      
      <!-- Card 1 -->
      <article class="w-[19rem] rounded-xl border border-white/20 bg-white/5 shadow-lg overflow-hidden flex flex-col hover:scale-[1.02] transition-transform">
        <div class="px-5 pt-5">
          <img src="img/gula.jpg" alt="Gula"
               class="h-48 w-full object-cover rounded-lg ring-1 ring-white/10" />
        </div>
        <div class="p-6 flex flex-col flex-1">
          <div class="flex items-baseline justify-between">
            <h3 class="font-semibold text-lg">Gula <span class="text-white/70 text-sm">(1kg)</span></h3>
            <div class="text-sm font-semibold">Rp 100.000</div>
          </div>
          <p class="text-sm text-white/80 mt-1">Produksi : 
            <a href="#" class="underline hover:text-white">Jono Kagama</a>
          </p>
          <div class="mt-auto space-y-2 pt-4">
            <a href="#" class="block w-full rounded-md border border-white/40 bg-[#2A7A3A]/60 hover:bg-[#2A7A3A] text-center text-sm py-2">Beli Sekarang</a>
            <a href="#" class="block w-full rounded-md border border-white/40 hover:bg-white/10 text-center text-sm py-2">Keranjang</a>
          </div>
        </div>
      </article>

      <!-- Card 2 -->
      <article class="w-[19rem] rounded-xl border border-white/20 bg-white/5 shadow-lg overflow-hidden flex flex-col hover:scale-[1.02] transition-transform">
        <div class="px-5 pt-5">
          <img src="img/kentangfx.png" alt="Kentang"
               class="h-48 w-full object-cover rounded-lg ring-1 ring-white/10" />
        </div>
        <div class="p-6 flex flex-col flex-1">
          <div class="flex items-baseline justify-between">
            <h3 class="font-semibold text-lg">Kentang <span class="text-white/70 text-sm">(1kg)</span></h3>
            <div class="text-sm font-semibold">Rp 20.000</div>
          </div>
          <p class="text-sm text-white/80 mt-1">Produksi : 
            <a href="#" class="underline hover:text-white">Jono Kagama</a>
          </p>
          <div class="mt-auto space-y-2 pt-4">
            <a href="#" class="block w-full rounded-md border border-white/40 bg-[#2A7A3A]/60 hover:bg-[#2A7A3A] text-center text-sm py-2">Beli Sekarang</a>
            <a href="#" class="block w-full rounded-md border border-white/40 hover:bg-white/10 text-center text-sm py-2">Keranjang</a>
          </div>
        </div>
      </article>

      <!-- Card 3 -->
      <article class="w-[19rem] rounded-xl border border-white/20 bg-white/5 shadow-lg overflow-hidden flex flex-col hover:scale-[1.02] transition-transform">
        <div class="px-5 pt-5">
          <img src="img/kopi.png" alt="Kopi"
               class="h-48 w-full object-cover rounded-lg ring-1 ring-white/10" />
        </div>
        <div class="p-6 flex flex-col flex-1">
          <div class="flex items-baseline justify-between">
            <h3 class="font-semibold text-lg">Kopi <span class="text-white/70 text-sm">(1kg)</span></h3>
            <div class="text-sm font-semibold">Rp 50.000</div>
          </div>
          <p class="text-sm text-white/80 mt-1">Produksi : 
            <a href="#" class="underline hover:text-white">Jono Kagama</a>
          </p>
          <div class="mt-auto space-y-2 pt-4">
            <a href="#" class="block w-full rounded-md border border-white/40 bg-[#2A7A3A]/60 hover:bg-[#2A7A3A] text-center text-sm py-2">Beli Sekarang</a>
            <a href="#" class="block w-full rounded-md border border-white/40 hover:bg-white/10 text-center text-sm py-2">Keranjang</a>
          </div>
        </div>
      </article>

      <!-- Card 4 -->
      <article class="w-[19rem] rounded-xl border border-white/20 bg-white/5 shadow-lg overflow-hidden flex flex-col hover:scale-[1.02] transition-transform">
        <div class="px-5 pt-5">
          <img src="img/gula.jpg" alt="Gula"
               class="h-48 w-full object-cover rounded-lg ring-1 ring-white/10" />
        </div>
        <div class="p-6 flex flex-col flex-1">
          <div class="flex items-baseline justify-between">
            <h3 class="font-semibold text-lg">Gula <span class="text-white/70 text-sm">(1kg)</span></h3>
            <div class="text-sm font-semibold">Rp 100.000</div>
          </div>
          <p class="text-sm text-white/80 mt-1">Produksi : 
            <a href="#" class="underline hover:text-white">Jono Kagama</a>
          </p>
          <div class="mt-auto space-y-2 pt-4">
            <a href="#" class="block w-full rounded-md border border-white/40 bg-[#2A7A3A]/60 hover:bg-[#2A7A3A] text-center text-sm py-2">Beli Sekarang</a>
            <a href="#" class="block w-full rounded-md border border-white/40 hover:bg-white/10 text-center text-sm py-2">Keranjang</a>
          </div>
        </div>
      </article>
    </div>
  </div>
</section>

<section id="petani" class="bg-[#0F5529] text-white py-20">
  <h2 class="text-3xl font-semibold mb-6 px-6 max-w-7xl mx-auto">
    Deretan Petani<br />
    yang terbantu <span class="font-bold">TaniDieng</span>
  </h2>

  <div class="max-w-7xl mx-auto px-8">
    <!-- Container Card -->
    <div
      class="relative rounded-lg border border-white/25 bg-white/5 backdrop-blur-sm grid md:grid-cols-2 divide-x divide-white/25 w-full h-[450px] overflow-hidden"
    >
      <!-- Kiri -->
      <div class="flex items-center justify-center text-center p-12">
        <h3 class="text-3xl font-semibold leading-snug">
          Deretan Petani<br />
          yang terbantu <span class="font-bold">TaniDieng</span>
        </h3>
      </div>

      <!-- Kanan (Testimonial Section) -->
      <div class="relative flex flex-col items-center justify-center text-center p-12">
        <!-- Tombol kiri -->
        <button
          id="prevBtn"
          class="absolute left-6 text-white hover:text-gray-300 text-3xl focus:outline-none"
        >
          &#10094;
        </button>

        <!-- Konten Testimonial -->
        <div id="testimonialContainer" class="transition-all duration-300">
          <img
            id="petaniFoto"
            src="img/petani/jono.png"
            alt="Jono Kagano"
            class="h-32 w-32 rounded-full object-cover mb-4 mx-auto"
          />
          <p id="petaniKata" class="text-sm text-white/80 mb-4 max-w-md mx-auto">
            Aplikasi ini sangat membantu dalam penjualan komoditas.
          </p>
          <h4 id="petaniNama" class="font-semibold text-lg">Jono Kagano</h4>
          <p id="petaniPekerjaan" class="text-xs text-white/70">Petani Kentang</p>
        </div>

        <!-- Tombol kanan -->
        <button
          id="nextBtn"
          class="absolute right-6 text-white hover:text-gray-300 text-3xl focus:outline-none"
        >
          &#10095;
        </button>
      </div>
    </div>
  </div>
</section>

<section id="dampak" class="bg-[#0F5529] text-white py-20">
  <div class="max-w-7xl mx-auto px-8 grid md:grid-cols-2 items-center gap-16">
    <!-- Kiri: Judul + deskripsi -->
    <div>
      <h2 class="text-3xl font-semibold mb-4">Dampak</h2>
      <p class="text-white/85 leading-relaxed max-w-xl">
        Era Tani telah muncul sebagai pelopor yang berperan penting dalam lanskap inovasi pertanian di Indonesia.
        Melalui penerapan teknologi dan kolaborasi, Era Tani berkomitmen untuk meningkatkan produktivitas,
        keberlanjutan, serta kesejahteraan petani. Inisiatif ini fokus pada pembangunan ekosistem pertanian
        yang tangguh, inklusif, dan berdaya saing untuk generasi mendatang.
      </p>
    </div>

    <!-- Kanan: Statistik -->
    <div class="grid sm:grid-cols-2 gap-x-16 gap-y-10">
      <div class="space-y-8">
        <div class="flex items-center gap-4">
          <span class="inline-grid grid-cols-2 w-9 h-9 rounded overflow-hidden ring-1 ring-white/30">
            <span class="bg-white"></span><span class="bg-green-600"></span>
          </span>
          <div>
            <div class="text-sm font-semibold">30%</div>
            <div class="text-[13px] text-white/80">Petani adalah perempuan</div>
          </div>
        </div>

        <div class="flex items-center gap-4">
          <span class="inline-grid grid-cols-2 w-9 h-9 rounded overflow-hidden ring-1 ring-white/30">
            <span class="bg-white"></span><span class="bg-green-600"></span>
          </span>
          <div>
            <div class="text-sm font-semibold">65%</div>
            <div class="text-[13px] text-white/80">Petani adalah pemuda</div>
          </div>
        </div>

        <div class="flex items-center gap-4">
          <span class="inline-grid grid-cols-2 w-9 h-9 rounded overflow-hidden ring-1 ring-white/30">
            <span class="bg-black"></span><span class="bg-white"></span>
          </span>
          <div>
            <div class="text-sm font-semibold">40%</div>
            <div class="text-[13px] text-white/80">Wilayah memiliki koneksi stabil</div>
          </div>
        </div>
      </div>

      <div class="space-y-8">
        <div class="flex items-center gap-4">
          <span class="inline-grid grid-cols-2 w-9 h-9 rounded overflow-hidden ring-1 ring-white/30">
            <span class="bg-white"></span><span class="bg-green-600"></span>
          </span>
          <div>
            <div class="text-sm font-semibold">30%</div>
            <div class="text-[13px] text-white/80">Petani adalah perempuan</div>
          </div>
        </div>

        <div class="flex items-center gap-4">
          <span class="inline-grid grid-cols-2 w-9 h-9 rounded overflow-hidden ring-1 ring-white/30">
            <span class="bg-white"></span><span class="bg-green-600"></span>
          </span>
          <div>
            <div class="text-sm font-semibold">65%</div>
            <div class="text-[13px] text-white/80">Petani adalah pemuda</div>
          </div>
        </div>

        <div class="flex items-center gap-4">
          <span class="inline-grid grid-cols-2 w-9 h-9 rounded overflow-hidden ring-1 ring-white/30">
            <span class="bg-black"></span><span class="bg-white"></span>
          </span>
          <div>
            <div class="text-sm font-semibold">40%</div>
            <div class="text-[13px] text-white/80">Wilayah memiliki koneksi stabil</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="lokasi" class="bg-[#0F5529] text-white py-20">
  <div class="max-w-7xl mx-auto px-8">
    <h2 class="text-3xl font-semibold mb-8">Lokasi Distribusi</h2>

    <div class="relative rounded-lg overflow-hidden">
      <!-- Peta -->
      <img src="img/indonesia.png"
           alt="Peta Indonesia"
           class="w-full h-auto select-none pointer-events-none" />

      <!-- Label teks -->
      <div class="absolute left-[38%] top-[94.1%] text-lg md:text-xl font-semibold">
        Dieng,<span class="font-normal">Indonesia</span>
      </div>

      <!-- Garis penanda -->
      <span class="absolute left-[34%] top-[84%] h-[80px] w-[3px] bg-white rotate-[-25deg] origin-top"></span>
    </div>
  </div>
</section>



<!-- Footer -->
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
    </div> <!-- ← PENTING: tutup kolom kiri -->

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
    // Data testimoni
    const testimonials = [
      {
        foto: "img/petani1.jpg",
        kata: "Aplikasi ini sangat membantu dalam penjualan komoditas.",
        nama: "Jono Kagano",
        pekerjaan: "Petani Kentang",
      },
      {
        foto: "img/petani3.jpg",
        kata: "Sekarang hasil panen saya bisa dijual langsung tanpa perantara.",
        nama: "Sari Lestari",
        pekerjaan: "Petani Sayur",
      },
      {
        foto: "img/petani2.jpg",
        kata: "TaniDieng membantu memperluas jangkauan pembeli kami.",
        nama: "Budi Santoso",
        pekerjaan: "Petani Wortel",
      },
    ];

    let index = 0;
    const foto = document.getElementById("petaniFoto");
    const kata = document.getElementById("petaniKata");
    const nama = document.getElementById("petaniNama");
    const pekerjaan = document.getElementById("petaniPekerjaan");

    document.getElementById("nextBtn").addEventListener("click", () => {
      index = (index + 1) % testimonials.length;
      updateTestimonial();
    });

    document.getElementById("prevBtn").addEventListener("click", () => {
      index = (index - 1 + testimonials.length) % testimonials.length;
      updateTestimonial();
    });

    function updateTestimonial() {
      foto.src = testimonials[index].foto;
      kata.textContent = testimonials[index].kata;
      nama.textContent = testimonials[index].nama;
      pekerjaan.textContent = testimonials[index].pekerjaan;
    }
  </script>
</body>
</html>
