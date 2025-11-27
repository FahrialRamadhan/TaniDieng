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
  <title>Bantuan</title>
  <style>
    details[open] > div { animation: dropdown-open 0.25s ease-out; }
    @keyframes dropdown-open { 0% {opacity:0;transform:translateY(-6px)} 100% {opacity:1;transform:translateY(0)} }
    .search-wrap{width:0;opacity:0;pointer-events:none;transition:width .28s ease,opacity .2s ease}
    .search-wrap.open{width:min(640px,55vw);opacity:1;pointer-events:auto}
    @media (max-width:640px){ .search-wrap.open{width:60vw} }
    /* Animasi konten details saat dibuka */
  details[open] > .faq-body {
    animation: faq-open .25s ease-out;
  }
  @keyframes faq-open {
    0%   { opacity: 0; transform: translateY(-6px); }
    100% { opacity: 1; transform: translateY(0); }
  }
  /* Perluas area klik icon plus */
  .faq-plus {
    width: 28px; height: 28px; display: grid; place-items: center;
    border-radius: 6px;
  }
  summary::-webkit-details-marker { display: none; } /* sembunyikan marker default */
  </style>
</head>
<body class="text-white antialiased ">  
@include('layouts.navbar-guest')
<!-- SECTION: FAQ / Butuh Bantuan -->
<section id="bantuan" class="relative bg-[#0F5529] text-white min-h-screen pt-36 pb-20">
  <div class="max-w-4xl lg:max-w-5xl mx-auto px-6">
    <!-- Heading -->
    <div class="text-center">
      <h2 class="text-4xl md:text-5xl font-bold tracking-tight mb-2">Butuh Bantuan?</h2>
      <p class="text-white/80 text-[15px] md:text-[16px] max-w-2xl mx-auto">
        Kami selalu siap membantu Anda! Lihat pertanyaan umum kami berikut untuk menemukan jawaban
        atas hal-hal yang sering ditanyakan seputar penggunaan platform TaniDieng.
      </p>
      <a href="mailto:help@tanidieng.id"
         class="inline-block mt-5 rounded border border-white/50 px-5 py-2 text-sm hover:bg-white/10 transition-all duration-200">
        Kirim Pesan
      </a>
    </div>

    <!-- Subheading -->
    <div class="mt-30">
      <h3 class="text-lg font-semibold">Kami menjawab pertanyaan Anda!</h3>
    </div>

    <!-- FAQ List -->
    <div class="mt-5 divide-y divide-white/20 border-y border-white/20">

      <!-- 1 -->
      <details class="group">
        <summary class="flex items-center justify-between cursor-pointer py-4 md:py-5 text-[16px] font-medium select-none hover:text-white/90 transition">
          <span>Apa itu TaniDieng?</span>
          <span class="ml-4 grid h-6 w-6 place-items-center text-white/80 group-open:rotate-45 transition-transform">+</span>
        </summary>
        <div class="pb-5 text-white/80 text-[15px] leading-relaxed">
          TaniDieng adalah platform digital yang menghubungkan petani lokal dari kawasan Dieng dan sekitarnya
          dengan konsumen di berbagai daerah. Melalui sistem daring yang efisien dan transparan, TaniDieng membantu
          produsen menjual hasil pertanian mereka langsung tanpa perantara, sekaligus memberi kemudahan bagi pelanggan
          untuk membeli produk segar dengan harga terbaik.
        </div>
      </details>

      <!-- 2 -->
      <details class="group">
        <summary class="flex items-center justify-between cursor-pointer py-4 md:py-5 text-[16px] font-medium select-none hover:text-white/90 transition">
          <span>Siapa saja yang bisa berjualan di TaniDieng?</span>
          <span class="ml-4 grid h-6 w-6 place-items-center text-white/80 group-open:rotate-45 transition-transform">+</span>
        </summary>
        <div class="pb-5 text-white/80 text-[15px] leading-relaxed">
          Semua petani, pelaku UMKM, atau kelompok tani yang memiliki produk pertanian dapat bergabung sebagai produsen
          di TaniDieng. Proses pendaftaran mudah dan gratis — Anda hanya perlu mengisi data diri, data produk, dan
          melengkapi dokumen verifikasi sederhana agar bisa mulai menjual produk secara online.
        </div>
      </details>

      <!-- 3 -->
      <details class="group">
        <summary class="flex items-center justify-between cursor-pointer py-4 md:py-5 text-[16px] font-medium select-none hover:text-white/90 transition">
          <span>Siapa saja yang bisa membeli di Agrormarket?</span>
          <span class="ml-4 grid h-6 w-6 place-items-center text-white/80 group-open:rotate-45 transition-transform">+</span>
        </summary>
        <div class="pb-5 text-white/80 text-[15px] leading-relaxed">
          Siapa pun dapat membeli produk di TaniDieng — mulai dari konsumen rumah tangga, pelaku usaha kuliner,
          restoran, hingga hotel dan koperasi. Semua pelanggan dapat berbelanja dengan akun TaniDieng tanpa batasan wilayah.
        </div>
      </details>

      <!-- 4 -->
      <details class="group">
        <summary class="flex items-center justify-between cursor-pointer py-4 md:py-5 text-[16px] font-medium select-none hover:text-white/90 transition">
          <span>Setelah terdaftar sebagai produsen, dapatkah saya juga melakukan pembelian di platform?</span>
          <span class="ml-4 grid h-6 w-6 place-items-center text-white/80 group-open:rotate-45 transition-transform">+</span>
        </summary>
        <div class="pb-5 text-white/80 text-[15px] leading-relaxed">
          Tentu bisa. Akun produsen di TaniDieng memiliki dua fungsi utama — menjual dan membeli produk. Setelah login,
          Anda dapat berpindah peran dengan mudah untuk membeli kebutuhan pertanian atau menjual hasil panen Anda.
        </div>
      </details>

      <!-- 5 -->
      <details class="group">
        <summary class="flex items-center justify-between cursor-pointer py-4 md:py-5 text-[16px] font-medium select-none hover:text-white/90 transition">
          <span>Bagaimana produk dikirimkan?</span>
          <span class="ml-4 grid h-6 w-6 place-items-center text-white/80 group-open:rotate-45 transition-transform">+</span>
        </summary>
        <div class="pb-5 text-white/80 text-[15px] leading-relaxed">
          Produk dikirimkan menggunakan jasa pengiriman mitra yang telah bekerja sama dengan TaniDieng.
          Kami memastikan produk dikemas dengan aman agar kesegarannya tetap terjaga hingga sampai ke tangan konsumen.
          Estimasi biaya dan waktu pengiriman akan muncul saat Anda melakukan checkout.
        </div>
      </details>

      <!-- 6 -->
      <details class="group">
        <summary class="flex items-center justify-between cursor-pointer py-4 md:py-5 text-[16px] font-medium select-none hover:text-white/90 transition">
          <span>Bagaimana pesanan dibayar?</span>
          <span class="ml-4 grid h-6 w-6 place-items-center text-white/80 group-open:rotate-45 transition-transform">+</span>
        </summary>
        <div class="pb-5 text-white/80 text-[15px] leading-relaxed">
          Pembayaran pesanan dilakukan secara online melalui berbagai metode, seperti transfer bank, e-wallet,
          atau pembayaran melalui gerai retail mitra kami. Semua transaksi dijamin aman dan terverifikasi melalui sistem pembayaran TaniDieng.
        </div>
      </details>

      <!-- 7 -->
      <details class="group">
        <summary class="flex items-center justify-between cursor-pointer py-4 md:py-5 text-[16px] font-medium select-none hover:text-white/90 transition">
          <span>Metode pembayaran apa yang tersedia?</span>
          <span class="ml-4 grid h-6 w-6 place-items-center text-white/80 group-open:rotate-45 transition-transform">+</span>
        </summary>
        <div class="pb-5 text-white/80 text-[15px] leading-relaxed">
          Kami mendukung berbagai metode pembayaran digital, termasuk transfer antarbank, QRIS, GoPay, OVO, Dana,
          serta pembayaran tunai di gerai mitra tertentu. Pilihan metode akan tampil saat proses checkout berlangsung.
        </div>
      </details>

      <!-- 8 -->
      <details class="group">
        <summary class="flex items-center justify-between cursor-pointer py-4 md:py-5 text-[16px] font-medium select-none hover:text-white/90 transition">
          <span>Bisakah saya menerima pesanan di mana saja di Indonesia?</span>
          <span class="ml-4 grid h-6 w-6 place-items-center text-white/80 group-open:rotate-45 transition-transform">+</span>
        </summary>
        <div class="pb-5 text-white/80 text-[15px] leading-relaxed">
          Ya, TaniDieng menjangkau seluruh wilayah Indonesia. Namun, waktu pengiriman dapat berbeda tergantung lokasi dan
          mitra ekspedisi yang tersedia di daerah Anda. Kami terus memperluas jangkauan logistik agar semua pelanggan bisa menikmati produk segar dari Dieng.
        </div>
      </details>

      <!-- 9 -->
      <details class="group">
        <summary class="flex items-center justify-between cursor-pointer py-4 md:py-5 text-[16px] font-medium select-none hover:text-white/90 transition">
          <span>Bisakah saya mengambil pesanan langsung di lokasi produsen?</span>
          <span class="ml-4 grid h-6 w-6 place-items-center text-white/80 group-open:rotate-45 transition-transform">+</span>
        </summary>
        <div class="pb-5 text-white/80 text-[15px] leading-relaxed">
          Tentu saja! Anda dapat memilih opsi “Ambil di Lokasi” saat checkout jika produsen menyediakan fasilitas tersebut.
          Ini sangat berguna untuk pelanggan lokal yang ingin menekan biaya kirim dan memastikan produk diterima langsung dari sumbernya.
        </div>
      </details>

      <!-- 10 -->
      <details class="group">
        <summary class="flex items-center justify-between cursor-pointer py-4 md:py-5 text-[16px] font-medium select-none hover:text-white/90 transition">
          <span>Saya mengalami masalah dengan pesanan. Siapa yang harus saya hubungi?</span>
          <span class="ml-4 grid h-6 w-6 place-items-center text-white/80 group-open:rotate-45 transition-transform">+</span>
        </summary>
        <div class="pb-5 text-white/80 text-[15px] leading-relaxed">
          Jika Anda mengalami kendala seperti keterlambatan pengiriman atau perbedaan produk, Anda dapat menghubungi
          tim layanan pelanggan kami melalui email <a href="mailto:help@tanidieng.id" class="underline">help@tanidieng.id</a>
          atau fitur “Kirim Pesan” di halaman ini. Tim kami siap membantu menyelesaikan masalah dengan cepat dan profesional.
        </div>
      </details>

      <!-- 11 -->
      <details class="group">
        <summary class="flex items-center justify-between cursor-pointer py-4 md:py-5 text-[16px] font-medium select-none hover:text-white/90 transition">
          <span>Bagaimana penanganan pengembalian dana atau pesanan di platform?</span>
          <span class="ml-4 grid h-6 w-6 place-items-center text-white/80 group-open:rotate-45 transition-transform">+</span>
        </summary>
        <div class="pb-5 text-white/80 text-[15px] leading-relaxed">
          Proses pengembalian dana (refund) dilakukan apabila terjadi kesalahan dalam pengiriman, produk tidak sesuai deskripsi,
          atau dibatalkan sesuai kebijakan TaniDieng. Dana akan dikembalikan ke akun atau metode pembayaran Anda dalam waktu
          1-3 hari kerja setelah proses verifikasi selesai.
        </div>
      </details>

    </div>
  </div>
</section>

<!-- SECTION: KONTAK -->
<section id="kontak" class="bg-[#0F5529] text-white py-16">
  <div class="max-w-5xl mx-auto px-6">
    <div
      class="relative rounded-xl border border-white/25 bg-white/10 backdrop-blur-md
             shadow-[0_12px_50px_rgba(0,0,0,.35)]">
      <!-- ring halus di luar kartu -->
      <div class="pointer-events-none absolute inset-0 rounded-xl ring-1 ring-white/10"></div>

      <div class="p-6 md:p-8">
        <!-- Header -->
        <h3 class="text-xl font-semibold">Kontak</h3>
        <p class="mt-1 text-sm text-white/85">
          Kami siap melayani Anda pada hari kerja, dari pukul 9.00 pagi hingga 7.00 malam.
        </p>

        <!-- Grid info -->
        <dl class="mt-6 grid gap-6 text-[15px]">
          <!-- Contact -->
          <div class="grid grid-cols-12 items-start gap-2">
            <dt class="col-span-3 md:col-span-2 text-white/80">Contact</dt>
            <dd class="col-span-9 md:col-span-10">
              <a href="tel:08127831383173"
                 class="font-medium hover:underline">0812-7831-3831-73</a>
              <p class="mt-1 text-xs text-white/70">
                Biaya maksimum panggilan: sekitar Rp1.500 per menit dari jaringan tetap
                dan Rp2.000 per menit dari jaringan seluler (sudah termasuk pajak).
              </p>
            </dd>
          </div>

          <!-- Email -->
          <div class="grid grid-cols-12 items-start gap-2">
            <dt class="col-span-3 md:col-span-2 text-white/80">Email</dt>
            <dd class="col-span-9 md:col-span-10">
              <a href="mailto:tanidieng.project@gmail.com"
                 class="font-medium hover:underline">tanidieng.project@gmail.com</a>
            </dd>
          </div>

          <!-- Address -->
          <div class="grid grid-cols-12 items-start gap-2">
            <dt class="col-span-3 md:col-span-2 text-white/80">Alamat</dt>
            <dd class="col-span-9 md:col-span-10">
              <a href="https://maps.google.com/?q=Dieng%20Plateau" target="_blank" rel="noopener"
                 class="font-medium hover:underline">Dieng Plateau, Wonosobo, Jawa Tengah</a>
            </dd>
          </div>
        </dl>
      </div>
    </div>
  </div>
</section>


@include('layouts.footer')

<script>
  // Accordion: hanya satu details yang terbuka
  const faqs = document.querySelectorAll('#bantuan details');
  faqs.forEach(d => {
    d.addEventListener('toggle', () => {
      if (d.open) {
        faqs.forEach(other => { if (other !== d) other.open = false; });
      }
    });
  });

  // Search open/close (kalau kamu pakai)
  const btn = document.getElementById('searchBtn');
  const wrap = document.getElementById('searchWrap');
  const input = document.getElementById('searchInput');
  if (btn && wrap && input) {
    btn.addEventListener('click', () => {
      wrap.classList.toggle('open');
      if (wrap.classList.contains('open')) setTimeout(()=>input.focus(), 60);
    });
    document.addEventListener('click', e => {
      const isInside = wrap.contains(e.target) || btn.contains(e.target);
      if (!isInside) { wrap.classList.remove('open'); input.blur(); }
    });
    document.addEventListener('keydown', e => { if (e.key === 'Escape') { wrap.classList.remove('open'); input.blur(); }});
  }
</script>

</body>
</html>
