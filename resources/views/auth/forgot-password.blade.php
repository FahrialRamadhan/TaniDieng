<x-guest-layout>
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

            {{-- Card forgot password --}}
            <div class="pointer-events-none absolute inset-0 flex items-center justify-center p-6 md:p-10">
                <div
                    class="pointer-events-auto w-full max-w-2xl rounded-[26px] border border-white/15 bg-white/10 glass-gradient backdrop-blur-xl shadow-[0_10px_40px_rgba(0,0,0,.25)] text-white overflow-hidden">
                    <div class="absolute inset-px rounded-[24px] bg-gradient-to-br from-white/10 to-white/0"></div>

                    <div class="relative p-8 md:p-10">
                        {{-- Logo + judul --}}
                        <div class="flex items-center gap-3 mb-4 ml-[-20px]">
                            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-16 w-16 object-contain" />
                        </div>

                        <h1 class="text-2xl font-semibold">Lupa Password</h1>
                        <p class="mt-1 text-sm text-white/80 leading-snug">
                            Masukkan alamat email yang terdaftar. Kami akan mengirimkan link untuk mengatur ulang password.
                        </p>

                        {{-- ✅ NOTIF SUKSES: LIQUID GLASS DI ATAS KOLOM EMAIL --}}
                        @if (session('status'))
                            <div
                                class="mt-4 mb-4 flex items-center gap-3 rounded-xl border border-emerald-400/40 bg-emerald-500/15 px-4 py-3 text-sm text-emerald-50 backdrop-blur">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-200" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                          d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                                <span>{{ session('status') }}</span>
                            </div>
                        @endif

                        {{-- Error global (kalau ada) --}}
                        @if ($errors->any())
                            <div
                                class="mb-4 flex items-center gap-3 rounded-xl border border-red-500/30 bg-red-500/10 px-4 py-3 text-sm text-red-200 backdrop-blur">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-400" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                          d="M12 9v2m0 4h.01m-.01-6a9 9 0 110 12 9 9 0 010-12z" />
                                </svg>
                                <span>{{ $errors->first() }}</span>
                            </div>
                        @endif

                        {{-- FORM KIRIM LINK RESET PASSWORD --}}
                        <form method="POST" action="{{ route('password.email') }}" class="mt-6 space-y-5 max-w-2xl">
                            @csrf

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

                            {{-- Tombol kirim --}}
                            <button type="submit"
                                    class="w-full rounded-xl bg-[#007115] px-5 py-3 text-sm font-medium text-white shadow-[0_6px_18px_rgba(0,113,21,.45)] transition hover:brightness-110 active:translate-y-[1px]">
                                Kirim Link Reset Password
                            </button>

                            {{-- Kembali ke login --}}
                            <p class="text-center text-sm text-white/90">
                                Ingat password?
                                <a href="{{ route('login') }}"
                                   class="font-medium text-white underline decoration-white/40 underline-offset-4 hover:decoration-white">
                                    kembali ke halaman login
                                </a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-guest-layout>
