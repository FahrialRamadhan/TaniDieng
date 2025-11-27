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
  @include('layouts.navbar-guest')
    <div class="absolute inset-0">
      <img src="img/pemandangan.png" alt="Dieng background"
           class="h-full w-full object-cover object-center" />
      <div class="absolute inset-0 bg-black/40"></div>
    </div>
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
@include('layouts.footer')

 <script>
      document.addEventListener('DOMContentLoaded', function () {

        // ====== TESTIMONI ======
        const testimonials = [
          { foto: "img/petani1.jpg", kata: "Aplikasi ini sangat membantu dalam penjualan komoditas.", nama: "Jono Kagano", pekerjaan: "Petani Kentang" },
          { foto: "img/petani3.jpg", kata: "Sekarang hasil panen saya bisa dijual langsung tanpa perantara.", nama: "Sari Lestari", pekerjaan: "Petani Sayur" },
          { foto: "img/petani2.jpg", kata: "TaniDieng membantu memperluas jangkauan pembeli kami.", nama: "Budi Santoso", pekerjaan: "Petani Wortel" },
        ];

        let index = 0;
        const foto       = document.getElementById("petaniFoto");
        const kata       = document.getElementById("petaniKata");
        const nama       = document.getElementById("petaniNama");
        const pekerjaan  = document.getElementById("petaniPekerjaan");
        const nextBtn    = document.getElementById("nextBtn");
        const prevBtn    = document.getElementById("prevBtn");

        function updateTestimonial() {
          if (!foto || !kata || !nama || !pekerjaan) return;
          foto.src              = testimonials[index].foto;
          kata.textContent      = testimonials[index].kata;
          nama.textContent      = testimonials[index].nama;
          pekerjaan.textContent = testimonials[index].pekerjaan;
        }

        if (nextBtn && prevBtn) {
          nextBtn.addEventListener("click", () => {
            index = (index + 1) % testimonials.length;
            updateTestimonial();
          });

          prevBtn.addEventListener("click", () => {
            index = (index - 1 + testimonials.length) % testimonials.length;
            updateTestimonial();
          });
        }

        // tampilkan data awal
        updateTestimonial();
      });
    </script>
</body>
</html>
