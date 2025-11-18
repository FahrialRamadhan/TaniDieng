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
@include('layouts.navbar')

<section class="bg-[#0F5529] min-h-screen px-6 pt-28 pb-16 flex justify-center pt-55">
  <div class="w-full max-w-5xl mx-auto">

    <div class="rounded-xl border border-white/25 bg-white/5 shadow-[0_18px_60px_rgba(0,0,0,.55)] px-10 py-10">

      <!-- Tombol Kembali -->
      <div onclick="window.history.back()"
     class="flex items-center gap-2 text-white/90 text-sm mb-6 cursor-pointer hover:text-white">
  <span class="inline-flex h-7 w-7 items-center justify-center rounded-full border border-white/40">←</span>
  <span>Kembali</span>
</div>


      <!-- FOTO + DETAIL DALAM 1 FLEX -->
      <div class="flex flex-col md:flex-row gap-10 items-start">

        <!-- FOTO PRODUK (KIRI) -->
        <div class="flex justify-center md:justify-start">
          <img
            src="img/kopi.png"
            alt="Kopi Arabika (1 Kg)"
            class="w-[260px] h-[260px] object-cover rounded-xl ring-[2px] ring-white/25 shadow-[0_15px_45px_rgba(0,0,0,.7)]" />
        </div>

        <!-- DETAIL PRODUK (KANAN FOTO: SEMUA DI SINI) -->
        <div class="flex-1 flex flex-col text-white">

          <!-- Nama + Harga -->
          <h1 class="text-3xl font-semibold leading-tight">Kopi Arabika (1 Kg)</h1>

          <div class="mt-3">
            <p class="text-[11px] uppercase tracking-[0.2em] text-white/70">Harga</p>
            <p class="text-2xl font-bold mt-1">Rp 50.000</p>
          </div>

          <div class="mt-4 h-px w-full bg-white/20"></div>

          <!-- Jumlah + Tombol -->
          <div class="mt-5 flex flex-col gap-5">

            <!-- Jumlah -->
            <div class="flex items-center gap-4">
              <span class="text-[10px] uppercase tracking-[0.15em] text-white/70">Jumlah</span>
              <div class="flex items-center rounded-full border border-white/40 overflow-hidden text-sm">
                <button class="px-3 py-1 hover:bg-white/10">-</button>
                <span class="px-5 py-1 border-x border-white/20">1</span>
                <button class="px-3 py-1 hover:bg-white/10">+</button>
              </div>
            </div>

            <!-- Tombol -->
            <div class="flex items-center gap-3">
              <button
                class="px-6 py-2 rounded-full border border-white/60 text-white text-sm hover:bg-white/10 transition">
                Tambah
              </button>
              <button
                class="px-8 py-2 rounded-full bg-[#02A851] text-white text-sm font-semibold hover:bg-[#04c966] transition">
                Beli
              </button>
            </div>
          </div>

          <div class="mt-6 h-px w-full bg-white/20"></div>

          <!-- Info produk (masih di kanan foto) -->
          <div class="mt-6 grid grid-cols-2 gap-y-4 gap-x-10 text-sm">
            <div>
              <p class="text-[10px] uppercase tracking-[0.15em] text-white/60">Produsen</p>
              <p class="underline mt-1 cursor-pointer hover:text-white">Jono Kagama</p>
            </div>
            <div>
              <p class="text-[10px] uppercase tracking-[0.15em] text-white/60">Merek</p>
              <p class="underline mt-1 cursor-pointer hover:text-white">Kopi Dieng</p>
            </div>
            <div>
              <p class="text-[10px] uppercase tracking-[0.15em] text-white/60">Berat</p>
              <p class="mt-1">1 Kg</p>
            </div>
            <div>
              <p class="text-[10px] uppercase tracking-[0.15em] text-white/60">Kategori</p>
              <p class="mt-1">Kopi</p>
            </div>
          </div>

        </div> 
      </div>   
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