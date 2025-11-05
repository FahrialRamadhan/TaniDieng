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
  <div class="relative grid min-h-screen md:grid-cols-2">

    <!-- Kiri: warna hijau -->
    <div class="bg-[#0e5a37]"></div>

    <!-- Kanan: gambar petani -->
    <div class="relative">
      <img src="img/petani.png" alt="Petani di sawah"
           class="absolute inset-0 h-full w-full object-cover" />
      <div class="absolute inset-0 bg-gradient-to-l from-black/30 via-black/20 to-transparent"></div>
    </div>

    <!-- Card (lebar tipis, sama seperti login) -->
    <div class="pointer-events-none absolute inset-0 flex items-center justify-center p-6 md:p-10">
      <div
        class="pointer-events-auto w-full max-w-2xl rounded-[26px] border border-white/15 bg-white/10 glass-gradient backdrop-blur-xl shadow-[0_10px_40px_rgba(0,0,0,.25)] text-white overflow-hidden">
        <div class="absolute inset-px rounded-[24px] bg-gradient-to-br from-white/10 to-white/0"></div>

        <div class="relative p-8 md:p-10">
          <!-- Header -->
          <div class="flex items-center gap-3 mb-4 ml-[-20px]">
            <img src="img/logo.png" alt="Logo" class="h-50 w-50 object-contain" />
          </div>

          <h1 class="text-2xl font-semibold">Daftar</h1>
          <p class="mt-1 text-sm text-white/80 leading-snug">
            Buat akun baru untuk mulai berbelanja & menjual produk tani.
          </p>

          <!-- Form Register -->
          <form action="#" method="POST" class="mt-6 space-y-5 max-w-2xl">
            <!-- Nama -->
            <div>
              <label for="name" class="mb-1 block text-sm text-white/90">Nama Lengkap</label>
              <input id="name" name="name" type="text" required autocomplete="name"
                     placeholder="Agus Santoso"
                     class="w-full rounded-xl border border-white/15 bg-white/10 px-5 py-2.5 text-sm text-white placeholder-white/60 outline-none focus:border-white/30 focus:bg-white/15" />
            </div>

            <!-- Email -->
            <div>
              <label for="email" class="mb-1 block text-sm text-white/90">Alamat Email</label>
              <input id="email" name="email" type="email" required autocomplete="email"
                     placeholder="tanijawa@gmail.com"
                     class="w-full rounded-xl border border-white/15 bg-white/10 px-5 py-2.5 text-sm text-white placeholder-white/60 outline-none focus:border-white/30 focus:bg-white/15" />
            </div>

            <!-- Password -->
            <div>
              <label for="password" class="mb-1 block text-sm text-white/90">Password</label>
              <input id="password" name="password" type="password" required autocomplete="new-password"
                     placeholder="Minimal 8 karakter"
                     class="w-full rounded-xl border border-white/15 bg-white/10 px-5 py-2.5 text-sm text-white placeholder-white/60 outline-none focus:border-white/30 focus:bg-white/15" />
            </div>

            <!-- Konfirmasi Password -->
            <div>
              <label for="password_confirmation" class="mb-1 block text-sm text-white/90">Konfirmasi Password</label>
              <input id="password_confirmation" name="password_confirmation" type="password" required autocomplete="new-password"
                     placeholder="Ulangi password"
                     class="w-full rounded-xl border border-white/15 bg-white/10 px-5 py-2.5 text-sm text-white placeholder-white/60 outline-none focus:border-white/30 focus:bg-white/15" />
            </div>

            <!-- Tombol -->
            <button type="submit"
                    class="w-full rounded-xl bg-[#007115] px-5 py-3 text-sm font-medium text-white shadow-[0_6px_18px_rgba(0,113,21,.45)] transition hover:brightness-110 active:translate-y-[1px]">
              Daftar
            </button>

            <p class="text-center text-sm text-white/90">
              Sudah punya akun?
              <a href="/login"
                 class="font-medium text-white underline decoration-white/40 underline-offset-4 hover:decoration-white">
                 masuk di sini
              </a>
            </p>
          </form>
        </div>
      </div>
    </div>

  </div>

  <style>
    @media (max-width: 767px) {
      .grid > :first-child { display: none; }
    }
  </style>
</body>
</html>
