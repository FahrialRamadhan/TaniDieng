<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="icon" type="image/png" sizes="48x48" href="img/favicon.png" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
 @vite(['resources/css/app.css', 'resources/js/app.js'])

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

<!-- navbar -->
 @include('layouts.navbar-guest')

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
  @include('layouts.footer')

  <!-- kecil: toggle search -->
  <script>
    const btn = document.getElementById('searchBtn');
    const wrap = document.getElementById('searchWrap');
    btn?.addEventListener('click', () => wrap.classList.toggle('open'));
  </script>
</body>
</html>
