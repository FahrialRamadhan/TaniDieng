<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <link rel="icon" type="image/png" sizes="48x48" href="img/favicon.png" />
  <title>Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .glass-gradient {
      background-image:
        radial-gradient(1200px 400px at -200px -200px, rgba(255,255,255,.25), transparent 40%),
        linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,.02));
    }
  </style>
</head>
<body class="min-h-screen antialiased text-white">
  <div class="relative min-h-screen">
    <!-- BACKGROUND 2 KOLOM -->
    <div class="grid min-h-screen md:grid-cols-2">
      <!-- Kiri: warna hijau -->
      <div class="bg-[#0e5a37]"></div>

      <!-- Kanan: gambar petani -->
      <div class="relative">
        <img src="img/petani.png" alt="Petani di sawah"
             class="absolute inset-0 h-full w-full object-cover" />
        <div class="absolute inset-0 bg-gradient-to-l from-black/30 via-black/20 to-transparent"></div>
      </div>
    </div>

    <!-- CARD DI TENGAH -->
    <div class="pointer-events-none absolute inset-0 flex items-center justify-center p-6 md:p-10">
  <div
    class="pointer-events-auto w-full max-w-xl rounded-[26px] border border-white/15 bg-white/10 glass-gradient backdrop-blur-xl shadow-[0_10px_40px_rgba(0,0,0,.25)] text-white overflow-hidden">

    <div class="relative p-8 md:p-10">
      <!-- Tombol Kembali -->
      <button type="button"
              onclick="window.history.back()"
              class="flex items-center gap-2 text-sm text-white/90 hover:text-white mb-6">
        <span class="inline-flex h-7 w-7 items-center justify-center rounded-full border border-white/40">
          ←
        </span>
        <span>Kembali</span>
      </button>

      <!-- Logo + Judul -->
      <div class="flex items-center gap-3 mb-2">
        <img src="img/logo.png" alt="Logo"
             class="h-14 w-14 object-contain" />
      </div>

      <h1 class="text-2xl font-semibold mb-3">Buat Akun</h1>

      <!-- Pilihan role + icon info putih -->
      <div class="flex items-center gap-4 text-sm mb-5">
        <label class="flex items-center gap-2 cursor-pointer">
          <input type="radio" name="role" class="accent-white" checked>
          <span>Pelanggan</span>
        </label>

        <label class="flex items-center gap-2 cursor-pointer">
          <input type="radio" name="role" class="accent-white">
          <span>Produsen</span>
        </label>

        <!-- icon info putih saja -->
        <button type="button"
                class="flex h-6 w-6 items-center justify-center rounded border border-white/90 text-[11px]">
          i
        </button>
      </div>

      <!-- Foto profil -->
      <p class="text-sm mb-2">Tambahkan foto profil</p>

      <button type="button" class="flex items-center gap-3 mb-6">
        <div class="flex h-16 w-16 items-center justify-center rounded-full border-2 border-dashed border-white/60 bg-white/10">
          <span class="text-2xl">👤</span>
        </div>
        <span class="text-xs text-white/80">Klik untuk ubah</span>
      </button>

      <!-- Form Register -->
      <form action="{{ route('register.submit') }}" method="POST" class="space-y-4">
        @csrf

        <!-- Nama lengkap -->
        <div>
          <label class="mb-1 block text-sm text-white/90">Nama lengkap</label>
          <input type="text" required
                 placeholder="Nama lengkap"
                 class="w-full border border-white/40 bg-transparent px-4 py-2 rounded-md outline-none placeholder-white/60 focus:border-white" />
        </div>

        <!-- Alamat -->
        <div>
          <label class="mb-1 block text-sm text-white/90">Alamat</label>
          <input type="text"
                 placeholder="Alamat lengkap"
                 class="w-full border border-white/40 bg-transparent px-4 py-2 rounded-md outline-none placeholder-white/60 focus:border-white" />
        </div>

        <!-- Nomor telepon -->
        <div>
          <label class="mb-1 block text-sm text-white/90">Nomor telepon</label>
          <input type="tel"
                 placeholder="08xxxxxxxxxx"
                 class="w-full border border-white/40 bg-transparent px-4 py-2 rounded-md outline-none placeholder-white/60 focus:border-white" />
        </div>

        <!-- Email -->
        <div>
          <label class="mb-1 block text-sm text-white/90">Email</label>
          <input type="email" required
                 placeholder="email@gmail.com"
                 class="w-full border border-white/40 bg-transparent px-4 py-2 rounded-md outline-none placeholder-white/60 focus:border-white" />
        </div>

        <!-- Password + Konfirmasi, dengan icon mata seperti contoh -->
       <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
  <!-- Password -->
  <div>
    <label class="mb-1 block text-sm text-white/90">Password Baru</label>
    <div class="relative">
      <input id="password" type="password" required
             placeholder="Minimal 8 karakter"
             class="w-full border border-white/40 bg-transparent px-4 py-2 pr-14 rounded-md outline-none placeholder-white/60 focus:border-white" />
      <button type="button"
              class="toggle-eye absolute inset-y-0 right-3 my-auto flex h-7 w-9 items-center justify-center"
              data-target="password">
        <img src="img/blind.png" alt="Lihat password" class="h-4 eye-icon">
      </button>
    </div>
  </div>

  <!-- Konfirmasi -->
  <div>
    <label class="mb-1 block text-sm text-white/90">Konfirmasi</label>
    <div class="relative">
      <input id="password_confirmation" type="password" required
             placeholder="Ulangi password"
             class="w-full border border-white/40 bg-transparent px-4 py-2 pr-14 rounded-md outline-none placeholder-white/60 focus:border-white" />
      <button type="button"
              class="toggle-eye absolute inset-y-0 right-3 my-auto flex h-7 w-9 items-center justify-center"
              data-target="password_confirmation">
        <img src="img/blind.png" alt="Lihat password" class="h-4 eye-icon">
      </button>
    </div>
  </div>
</div>


        <!-- Tombol Masuk (sama seperti login: hijau penuh) -->
        <button type="submit"
                class="mt-2 w-full rounded-full bg-[#007115] py-3 text-sm font-medium text-white shadow-[0_10px_24px_rgba(0,113,21,.5)] hover:brightness-110 active:translate-y-[1px]">
          Daftar Sekarang
        </button>

        <p class="text-sm text-white/90 mt-2">
          Sudah punya akun?
          <a href="/login"
             class="font-medium underline underline-offset-4 decoration-white/40 hover:decoration-white">
            masuk di sini
          </a>
        </p>
      </form>
    </div>
  </div>
</div>

</div>
<script>
  document.querySelectorAll('.toggle-eye').forEach(function (btn) {
    btn.addEventListener('click', function () {
      const targetId = this.getAttribute('data-target');
      const input = document.getElementById(targetId);
      const icon  = this.querySelector('.eye-icon');

      if (!input) return;

      if (input.type === 'password') {
        input.type = 'text';
        icon.src = 'img/glass.png';   // mata ON
      } else {
        input.type = 'password';
        icon.src = 'img/blind.png';  // mata OFF
      }
    });
  });
</script>
  <style>
    @media (max-width: 767px) {
      /* Sembunyikan kolom kiri hijau di mobile biar fokus ke form */
      .grid > :first-child { display: none; }
    }
  </style>
</body>
</html>
