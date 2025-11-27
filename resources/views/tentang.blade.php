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
  <title>Tentang</title>
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
<section class="relative min-h-[70vh] overflow-hidden">
  <!-- Gambar background -->
  <div class="absolute inset-0">
    <img src="img/Rectangle 1.png"
         alt="Tentang TaniDieng"
         class="w-full h-[600px] object-cover object-center mt-[64px]" />
  </div>
</section>

<section id="tentang" class="bg-[#0F5529] text-white py-20 -mt-[40px]">
  <div class="max-w-5xl mx-auto px-6">
    <!-- Judul -->
    <h2 class="text-4xl font-bold tracking-tight mb-4">Tani Dieng</h2>

    <!-- Paragraf -->
    <p class="text-[16px] leading-relaxed text-white/90 mb-3">
      Tani Dieng hadir untuk mengurangi pemborosan hasil pertanian sekaligus meningkatkan
      keuntungan serta nilai jual komoditas lokal. Melalui platform ini, kami berupaya
      menghadirkan cara baru dalam praktik penjualan dan distribusi hasil tani yang sebelumnya
      bersifat tradisional.
    </p>
    <p class="text-[16px] leading-relaxed text-white/90">
      Tujuan kami adalah memberikan ruang bagi para petani kecil di kawasan Dieng serta
      menjadi penghubung antara produsen lokal dan konsumen. Dengan demikian, Tani Dieng
      menawarkan kesempatan bagi setiap petani untuk memasarkan produknya melalui toko
      daring kami secara gratis dan berkelanjutan.
    </p>

    <!-- Kartu proses -->
    <div class="mt-10 rounded-xl border border-white/20 bg-white/5 p-6 shadow-[0_8px_30px_rgba(0,0,0,.25)]">
      <div class="grid grid-cols-3 items-center">
        <!-- Produsen -->
        <div class="flex flex-col items-center gap-2">
          <div class="h-24 w-24 rounded-lg bg-white/10 ring-1 ring-white/15 flex items-center justify-center">
            <img src="img/produsen.png" alt="Produsen" class="h-14 w-14 object-contain" />
          </div>
          <span class="text-sm">Produsen</span>
        </div>

        <!-- Panah + TaniDieng -->
        <div class="flex flex-col items-center gap-2">
          <div class="flex items-center gap-4">
            <svg class="h-6 w-6 opacity-70" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path d="M5 12h14M12 5l7 7-7 7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <div class="h-24 w-36 rounded-lg bg-[#0F5529] ring-1 ring-white/20 flex items-center justify-center">
              <img src="img/favicon.png" alt="TaniDieng" class="h-16 w-16 object-contain" />
            </div>
            <svg class="h-6 w-6 opacity-70" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path d="M5 12h14M12 5l7 7-7 7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </div>
          <span class="text-sm text-white/80">TaniDieng</span>
        </div>

        <!-- Pelanggan -->
        <div class="flex flex-col items-center gap-2">
          <div class="h-24 w-24 rounded-lg bg-white/10 ring-1 ring-white/15 flex items-center justify-center">
            <img src="img/pelanggan.png" alt="Pelanggan" class="h-25 w-25 object-contain ml-3" />
          </div>
          <span class="text-sm">Pelanggan</span>
        </div>
      </div>
    </div>

    <!-- Garis pemisah -->
    <div class="mt-30 h-px w-full bg-white/15"></div>
  </div>
</section>

<section id="produsen" class="bg-[#0F5529] text-white py-10">
  <div class="max-w-5xl mx-auto px-6">
    <!-- Heading -->
    <div class="mb-6">
      <h3 class="text-4xl font-bold tracking-tight">Apakah kamu produsen?</h3>
      <p class="text-2xl text-white/80 mt-2">Jual barangmu disini!</p>
    </div>

    <!-- Deskripsi -->
    <div class="space-y-3 text-[16px] leading-relaxed text-white/90">
      <p>
        Tani Dieng hadir untuk mengurangi pemborosan hasil pertanian sekaligus meningkatkan
        keuntungan serta nilai jual komoditas lokal. Melalui platform ini, kami menghadirkan
        cara baru dalam praktik penjualan dan distribusi hasil tani yang sebelumnya bersifat
        tradisional.
      </p>
      <p>
        Tujuan kami adalah memberikan ruang bagi para petani kecil di kawasan Dieng serta
        menjadi penghubung antara produsen lokal dan konsumen. Dengan demikian, Tani Dieng
        menawarkan kesempatan bagi setiap petani untuk memasarkan produknya melalui toko
        daring kami secara gratis dan berkelanjutan.
      </p>
    </div>

  <!-- Grid Keuntungan -->
<div class="mt-10 grid gap-8 sm:grid-cols-2 md:grid-cols-3">
  <!-- Card 1 -->
  <div class="h-full min-h-[200px] rounded-xl border border-white/25 bg-white/5 p-6 flex flex-col items-start justify-start text-left shadow-[0_8px_30px_rgba(0,0,0,.15)] transition-transform duration-300 hover:scale-[1.02]">
    <img src="img/keuntungan1.png" alt="Keuntungan 1" class="h-12 w-auto object-contain mb-4" />
    <p class="font-semibold text-[17px] leading-snug">Lebih banyak kontrol atas penjualan</p>
  </div>

  <!-- Card 2 -->
  <div class="h-full min-h-[200px] rounded-xl border border-white/25 bg-white/5 p-6 flex flex-col items-start justify-start text-left shadow-[0_8px_30px_rgba(0,0,0,.15)] transition-transform duration-300 hover:scale-[1.02]">
    <img src="img/keuntungan2.png" alt="Keuntungan 2" class="h-12 w-auto object-contain mb-4" />
    <p class="font-semibold text-[17px] leading-snug">Lebih banyak penyebaran produk</p>
  </div>

  <!-- Card 3 -->
  <div class="h-full min-h-[200px] rounded-xl border border-white/25 bg-white/5 p-6 flex flex-col items-start justify-start text-left shadow-[0_8px_30px_rgba(0,0,0,.15)] transition-transform duration-300 hover:scale-[1.02]">
    <img src="img/keuntungan3.png" alt="Keuntungan 3" class="h-12 w-auto object-contain mb-4" />
    <p class="font-semibold text-[17px] leading-snug">Lebih sedikit kerugian dan pemborosan</p>
  </div>

  <!-- Card 4 -->
  <div class="h-full min-h-[200px] rounded-xl border border-white/25 bg-white/5 p-6 flex flex-col items-start justify-start text-left shadow-[0_8px_30px_rgba(0,0,0,.15)] transition-transform duration-300 hover:scale-[1.02]">
    <img src="img/keuntungan4.png" alt="Keuntungan 4" class="h-12 w-auto object-contain mb-4" />
    <p class="font-semibold text-[17px] leading-snug">Tidak ada biaya pendaftaran</p>
  </div>

  <!-- Card 5 -->
  <div class="h-full min-h-[200px] rounded-xl border border-white/25 bg-white/5 p-6 flex flex-col items-start justify-start text-left shadow-[0_8px_30px_rgba(0,0,0,.15)] transition-transform duration-300 hover:scale-[1.02]">
    <img src="img/keuntungan5.png" alt="Keuntungan 5" class="h-12 w-auto object-contain mb-4" />
    <p class="font-semibold text-[17px] leading-snug">Interaksi/kerjasama dengan petani lain</p>
  </div>

  <!-- Card 6 -->
  <div class="h-full min-h-[200px] rounded-xl border border-white/25 bg-white/5 p-6 flex flex-col items-start justify-start text-left shadow-[0_8px_30px_rgba(0,0,0,.15)] transition-transform duration-300 hover:scale-[1.02]">
    <img src="img/keuntungan6.png" alt="Keuntungan 6" class="h-12 w-auto object-contain mb-4" />
    <p class="font-semibold text-[17px] leading-snug">Manajemen penjualan dan pesanan</p>
  </div>
</div>


    <!-- Garis Pemisah -->
    <div class="mt-20 h-px w-full bg-white/15"></div>
  </div>
</section>

<section id="pelanggan" class="bg-[#0F5529] text-white py-10">
  <div class="max-w-5xl mx-auto px-6">
    <!-- Heading -->
    <div class="mb-6">
      <h3 class="text-4xl font-bold tracking-tight">
        Apakah kamu <span class="text-white/90">pelanggan?</span>
      </h3>
      <p class="text-2xl text-white/80 mt-2">Beli kebutuhan disini!</p>
    </div>

    <!-- Deskripsi -->
    <div class="space-y-3 text-[16px] leading-relaxed text-white/90">
      <p>
        Tani Dieng hadir untuk mengurangi pemborosan hasil pertanian sekaligus meningkatkan
        keuntungan serta nilai jual komoditas lokal. Melalui platform ini, kami berupaya
        menghadirkan cara baru dalam praktik penjualan dan distribusi hasil tani yang sebelumnya
        bersifat tradisional.
      </p>
      <p>
        Tujuan kami adalah memberikan kemudahan bagi masyarakat untuk mendapatkan produk hasil
        pertanian langsung dari para petani di kawasan Dieng. Dengan demikian, kamu dapat membeli
        bahan pangan berkualitas tinggi dengan harga yang lebih terjangkau dan transparan, sambil
        membantu petani lokal berkembang melalui sistem perdagangan yang berkelanjutan.
      </p>
    </div>

    <!-- Grid Keuntungan -->
<div class="mt-10 grid gap-8 sm:grid-cols-2 md:grid-cols-3">
  <!-- Card 1 -->
  <div class="h-full min-h-[200px] rounded-xl border border-white/25 bg-white/5 p-6 flex flex-col items-start justify-start text-left shadow-[0_8px_30px_rgba(0,0,0,.15)] transition-transform duration-300 hover:scale-[1.03]">
    <img src="img/kebutuhan1.png" alt="Keuntungan 1" class="h-12 w-auto object-contain mb-4" />
    <p class="font-semibold text-[17px] leading-snug">Produk segar langsung dari petani</p>
  </div>

  <!-- Card 2 -->
  <div class="h-full min-h-[200px] rounded-xl border border-white/25 bg-white/5 p-6 flex flex-col items-start justify-start text-left shadow-[0_8px_30px_rgba(0,0,0,.15)] transition-transform duration-300 hover:scale-[1.03]">
    <img src="img/kebutuhan2.png" alt="Keuntungan 2" class="h-12 w-auto object-contain mb-4" />
    <p class="font-semibold text-[17px] leading-snug">Harga lebih terjangkau dan transparan</p>
  </div>

  <!-- Card 3 -->
  <div class="h-full min-h-[200px] rounded-xl border border-white/25 bg-white/5 p-6 flex flex-col items-start justify-start text-left shadow-[0_8px_30px_rgba(0,0,0,.15)] transition-transform duration-300 hover:scale-[1.03]">
    <img src="img/kebutuhan3.png" alt="Keuntungan 3" class="h-12 w-auto object-contain mb-4" />
    <p class="font-semibold text-[17px] leading-snug">Dukungan terhadap petani lokal</p>
  </div>

  <!-- Card 4 -->
  <div class="h-full min-h-[200px] rounded-xl border border-white/25 bg-white/5 p-6 flex flex-col items-start justify-start text-left shadow-[0_8px_30px_rgba(0,0,0,.15)] transition-transform duration-300 hover:scale-[1.03]">
    <img src="img/kebutuhan4.png" alt="Keuntungan 4" class="h-12 w-auto object-contain mb-4" />
    <p class="font-semibold text-[17px] leading-snug">Transaksi mudah dan cepat secara daring</p>
  </div>

  <!-- Card 5 -->
  <div class="h-full min-h-[200px] rounded-xl border border-white/25 bg-white/5 p-6 flex flex-col items-start justify-start text-left shadow-[0_8px_30px_rgba(0,0,0,.15)] transition-transform duration-300 hover:scale-[1.03]">
    <img src="img/kebutuhan5.png" alt="Keuntungan 5" class="h-12 w-auto object-contain mb-4" />
    <p class="font-semibold text-[17px] leading-snug">Jaminan kualitas produk pertanian</p>
  </div>

  <!-- Card 6 -->
  <div class="h-full min-h-[200px] rounded-xl border border-white/25 bg-white/5 p-6 flex flex-col items-start justify-start text-left shadow-[0_8px_30px_rgba(0,0,0,.15)] transition-transform duration-300 hover:scale-[1.03]">
    <img src="img/kebutuhan6.png" alt="Keuntungan 6" class="h-12 w-auto object-contain mb-4" />
    <p class="font-semibold text-[17px] leading-snug">Layanan pelanggan yang responsif</p>
  </div>
</div>
</section>

@include('layouts.footer')


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