<x-guest-layout>
    {{-- style khusus halaman auth --}}
    <style>
        .glass-gradient {
            background-image:
                radial-gradient(1200px 400px at -200px -200px, rgba(255,255,255,.25), transparent 40%),
                linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,.02));
        }

        @media (max-width: 767px) {
            .auth-grid > :first-child { display: none; }
        }
    </style>

    <div class="min-h-screen antialiased text-white">
        <div class="relative grid min-h-screen md:grid-cols-2 auth-grid">

            {{-- Kiri: warna hijau --}}
            <div class="bg-[#0e5a37]"></div>

            {{-- Kanan: gambar petani --}}
            <div class="relative">
                <img src="{{ asset('img/petani.png') }}" alt="Petani di sawah"
                     class="absolute inset-0 h-full w-full object-cover" />
                <div class="absolute inset-0 bg-gradient-to-l from-black/30 via-black/20 to-transparent"></div>
            </div>

            {{-- Card register --}}
            <div class="pointer-events-none absolute inset-0 flex items-center justify-center p-6 md:p-10">
                <div
                    class="pointer-events-auto w-full max-w-2xl rounded-[26px] border border-white/15 bg-white/10 glass-gradient backdrop-blur-xl shadow-[0_10px_40px_rgba(0,0,0,.25)] text-white overflow-hidden">
                    <div class="absolute inset-px rounded-[24px] bg-gradient-to-br from-white/10 to-white/0"></div>

                    <div class="relative p-8 md:p-10">
                        {{-- Logo + judul --}}
                        <div class="flex items-center gap-3 mb-4 ml-[-20px]">
                            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-16 w-16 object-contain" />
                        </div>

                        <h1 class="text-2xl font-semibold">Buat Akun</h1>
                        <p class="mt-1 text-sm text-white/80 leading-snug">
                            Daftar sebagai Sobat Agripreneur untuk mulai berbelanja dan berjualan produk tani.
                        </p>


                        {{-- FORM REGISTER BREEZE + DESAINMU --}}
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="mt-6 space-y-5 max-w-2xl">
                            @csrf
                           <div class="mt-4">
        <label class="block text-sm font-medium text-white/90">
            Foto Profil (opsional)
        </label>

        <input type="file"
               name="profile_photo"
               accept="image/*"
               class="mt-2 block w-full text-sm text-white/80
                      file:mr-4 file:rounded-lg file:border-0
                      file:bg-[#007115] file:px-4 file:py-2
                      file:text-sm file:font-medium file:text-white
                      hover:file:brightness-110" />

        <x-input-error :messages="$errors->get('profile_photo')" class="mt-2" />
    </div>

    {{-- Role / Peran --}}
<div class="mt-4">
    <label class="block text-sm font-medium text-white/90">
        Daftar sebagai
    </label>

    <div class="mt-2 grid grid-cols-1 md:grid-cols-3 gap-3 text-sm">
        {{-- Pelanggan --}}
        <label class="flex items-center gap-2 rounded-xl border border-white/20 bg-white/5 px-3 py-2 cursor-pointer hover:bg-white/10">
            <input type="radio"
                   name="role"
                   value="pelanggan"
                   class="text-[#007115] focus:ring-[#007115]"
                   {{ old('role', 'pelanggan') === 'pelanggan' ? 'checked' : '' }}>
            <span>Pelanggan</span>
        </label>

        {{-- Produsen --}}
        <label class="flex items-center gap-2 rounded-xl border border-white/20 bg-white/5 px-3 py-2 cursor-pointer hover:bg-white/10">
            <input type="radio"
                   name="role"
                   value="produsen"
                   class="text-[#007115] focus:ring-[#007115]"
                   {{ old('role') === 'produsen' ? 'checked' : '' }}>
            <span>Produsen</span>
        </label>
    </div>

    <x-input-error :messages="$errors->get('role')" class="mt-2" />
</div>
                            {{-- Nama --}}
                            <div>
                                <label for="name" class="mb-1 block text-sm text-white/90">Nama Lengkap</label>
                                <input id="name"
                                       name="name"
                                       type="text"
                                       required
                                       autofocus
                                       value="{{ old('name') }}"
                                       placeholder="Nama lengkap kamu"
                                       class="w-full rounded-xl border border-white/15 bg-white/10 px-5 py-2.5 text-sm text-white placeholder-white/60 outline-none focus:border-white/30 focus:bg-white/15" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            {{-- Email --}}
                            <div>
                                <label for="email" class="mb-1 block text-sm text-white/90">Alamat Email</label>
                                <input id="email"
                                       name="email"
                                       type="email"
                                       required
                                       autocomplete="email"
                                       value="{{ old('email') }}"
                                       placeholder="tanijawa@gmail.com"
                                       class="w-full rounded-xl border border-white/15 bg-white/10 px-5 py-2.5 text-sm text-white placeholder-white/60 outline-none focus:border-white/30 focus:bg-white/15" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            {{-- Password --}}
                            <div>
                                <label for="password" class="mb-1 block text-sm text-white/90">Password</label>
                                <input id="password"
                                       name="password"
                                       type="password"
                                       required
                                       autocomplete="new-password"
                                       placeholder="Minimal 8 karakter"
                                       class="w-full rounded-xl border border-white/15 bg-white/10 px-5 py-2.5 text-sm text-white placeholder-white/60 outline-none focus:border-white/30 focus:bg-white/15" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>

                            {{-- Konfirmasi Password --}}
                            <div>
                                <label for="password_confirmation" class="mb-1 block text-sm text-white/90">
                                    Konfirmasi Password
                                </label>
                                <input id="password_confirmation"
                                       name="password_confirmation"
                                       type="password"
                                       required
                                       autocomplete="new-password"
                                       placeholder="Ulangi password"
                                       class="w-full rounded-xl border border-white/15 bg-white/10 px-5 py-2.5 text-sm text-white placeholder-white/60 outline-none focus:border-white/30 focus:bg-white/15" />
                            </div>

                            {{-- Tombol daftar --}}
                            <button type="submit"
                                    class="w-full rounded-xl bg-[#007115] px-5 py-3 text-sm font-medium text-white shadow-[0_6px_18px_rgba(0,113,21,.45)] transition hover:brightness-110 active:translate-y-[1px]">
                                Daftar
                            </button>

                            {{-- Link ke login --}}
                            <p class="text-center text-sm text-white/90">
                                Sudah punya akun?
                                <a href="{{ route('login') }}"
                                   class="font-medium text-white underline decoration-white/40 underline-offset-4 hover:decoration-white">
                                    klik untuk masuk
                                </a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-guest-layout>
