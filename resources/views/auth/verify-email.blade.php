<x-guest-layout>
    {{-- style khusus halaman verifikasi --}}
    <style>
        .glass-gradient {
            background-image:
                radial-gradient(1200px 400px at -200px -200px, rgba(255,255,255,.25), transparent 40%),
                linear-gradient(180deg, rgba(255,255,255,.06), rgba(255,255,255,.02));
        }

        @media (max-width: 767px) {
            .verify-grid > :first-child { display: none; }
        }
    </style>

    <div class="min-h-screen antialiased text-white">
        <div class="relative grid min-h-screen md:grid-cols-2 verify-grid">

            {{-- Kiri: warna hijau --}}
            <div class="bg-[#0e5a37]"></div>

            {{-- Kanan: gambar petani --}}
            <div class="relative">
                <img src="{{ asset('img/petani.png') }}" alt="Petani di sawah"
                     class="absolute inset-0 h-full w-full object-cover" />
                <div class="absolute inset-0 bg-gradient-to-l from-black/30 via-black/20 to-transparent"></div>
            </div>

            {{-- Card verifikasi --}}
            <div class="pointer-events-none absolute inset-0 flex items-center justify-center p-6 md:p-10">
                <div
                    class="pointer-events-auto w-full max-w-2xl rounded-[26px] border border-white/15 bg-white/10 glass-gradient backdrop-blur-xl shadow-[0_10px_40px_rgba(0,0,0,.25)] text-white overflow-hidden">
                    <div class="absolute inset-px rounded-[24px] bg-gradient-to-br from-white/10 to-white/0"></div>

                    <div class="relative p-8 md:p-10 space-y-6">
                        {{-- Logo --}}
                        <div class="flex items-center gap-3 mb-2 ml-[-20px]">
                            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-16 w-16 object-contain" />
                        </div>

                        {{-- Judul & deskripsi --}}
                        <div>
                            <h1 class="text-2xl font-semibold">Verifikasi Email</h1>
                            <p class="mt-1 text-sm text-white/80 leading-relaxed">
                                Terima kasih telah mendaftar di TaniDieng.<br>
                                Sebelum mulai menggunakan akun, silakan cek email kamu dan klik tautan verifikasi
                                yang sudah kami kirimkan. Jika belum menerima email, kamu bisa mengirim ulang
                                tautan verifikasi melalui tombol di bawah ini.
                            </p>
                        </div>

                        {{-- Notif status: link verifikasi sudah dikirim --}}
                        @if (session('status') == 'verification-link-sent')
                            <div
                                class="mt-2 flex items-center gap-3 rounded-xl border border-emerald-400/40 bg-emerald-500/15
                                       px-4 py-3 text-sm text-emerald-50 backdrop-blur-lg shadow-[0_0_20px_rgba(16,185,129,0.15)]">
                                <svg xmlns="http://www.w3.org/2000/svg"
                                     class="h-5 w-5 text-emerald-200"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                          d="M4.5 12.75l6 6 9-13.5" />
                                </svg>
                                <span class="font-medium">
                                    Tautan verifikasi baru telah dikirim ke alamat email yang kamu gunakan saat registrasi.
                                </span>
                            </div>
                        @endif

                        {{-- Tombol aksi --}}
                        <div class="pt-2 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <button type="submit"
                                        class="w-full md:w-auto rounded-xl bg-[#007115] px-6 py-3 text-sm font-medium
                                               text-white shadow-[0_6px_18px_rgba(0,113,21,.45)]
                                               transition hover:brightness-110 active:translate-y-[1px]">
                                    Kirim Ulang Email Verifikasi
                                </button>
                            </form>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit"
                                        class="text-sm text-white/80 underline underline-offset-4 hover:text-white">
                                    Keluar
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-guest-layout>
