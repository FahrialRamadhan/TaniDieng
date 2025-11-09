<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" type="image/png" sizes="48x48" href="img/favicon.png" />
    @vite('resources/css/app.css')
    <title>TaniDieng</title>
</head>

<body>

    <!-- Tailwind via CDN (hapus jika kamu sudah pakai build Tailwind sendiri) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- HERO + NAV ala mockup -->
    <div class="relative min-h-screen text-white antialiased">

        <!-- Background image + blur + dark overlay -->
        <section class="relative min-h-screen overflow-hidden bg-black">
            <div class="absolute inset-0">
                <img src="img/pemandangan.png" alt="Dieng background"
                    class="h-full w-full object-cover object-center blur-[5px] scale-105" />
                <div class="absolute inset-0 bg-black/40"></div>
            </div>

            <!-- NAVBAR -->
            <header class="fixed inset-x-0 top-0 z-30">
                <nav class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4 lg:px-8">
                    <!-- Logo -->
                    <a href="#" class="flex items-center gap-[-2px]">
                        <img src="img/logo.png" alt="Logo" class="h-18 w-18 object-contain translate-y-[-1.5px]"
                            alt="logo" />
                        <span class="text-white font-semibold tracking-wide">TaniDieng</span>
                    </a>

                    <!-- Desktop menu -->
                    <div class="hidden md:flex items-center gap-8">
                        <a href="#"
                            class="relative text-sm font-medium text-white/90 hover:text-white after:absolute after:left-0 after:-bottom-1 after:h-[1.5px] after:w-0 after:bg-[#007115]
                                  after:transition-all after:duration-300 hover:after:w-full">
                            Beranda </a>

                        <a href="#"
                            class="relative text-sm font-medium text-white/90 hover:text-white after:absolute after:left-0 after:-bottom-1 after:h-[1.5px] after:w-0 after:bg-[#007115]
                                  after:transition-all after:duration-300 hover:after:w-full">
                            Tentang </a>

                        <a href="#"
                            class="relative text-sm font-medium text-white/90 hover:text-white after:absolute after:left-0 after:-bottom-1 after:h-[1.5px] after:w-0 after:bg-[#007115]
                                  after:transition-all after:duration-300 hover:after:w-full">
                            Lokasi </a>

                        <a href="#"
                            class="relative text-sm font-medium text-white/90 hover:text-white after:absolute after:left-0 after:-bottom-1 after:h-[1.5px] after:w-0 after:bg-[#007115]
                                  after:transition-all after:duration-300 hover:after:w-full">
                            Produk </a>

                        <a href="#"
                            class="relative text-sm font-medium text-white/90 hover:text-white after:absolute after:left-0 after:-bottom-1 after:h-[1.5px] after:w-0 after:bg-[#007115]
                                  after:transition-all after:duration-300 hover:after:w-full">
                            Kontak </a>
                    </div>

                    <!-- CTA -->
                    <div class="hidden md:flex">
                        @if (Auth::check())
                            <form action="{{ route('logout') }}" method="POST" class="flex items-center gap-3">
                                @csrf
                                <span class="rounded-full border border-white/70 px-5 py-2 text-sm font-semibold text-white/90 bg-transparent cursor-default">
                                    {{ Auth::user()->name }}
                                </span>
                                <button type="submit"
                                    class="rounded-full border border-white/70 px-5 py-2 text-sm font-semibold text-white/90 hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-white/40">
                                    Logout
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}"
                                class="rounded-full border border-white/70 px-5 py-2 text-sm font-semibold text-white/90 hover:bg-white/10 focus:outline-none focus:ring-2 focus:ring-white/40">
                                Daftar/Masuk
                            </a>
                        @endif
                    </div>


                    <!-- Mobile -->
                    <details class="md:hidden relative group ml-2 z-50">
                        <!-- Tombol hamburger -->
                        <summary
                            class="list-none cursor-pointer rounded-md p-2 text-white/90 hover:bg-white/10 z-50 relative">
                            <svg viewBox="0 0 24 24" class="h-6 w-6" fill="none" stroke="currentColor"
                                stroke-width="1.5">
                                <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" />
                            </svg>
                        </summary>

                        <!-- Menu dropdown -->
                        <div
                            class="absolute right-0 top-12 w-52 rounded-xl border border-white/10 bg-black/70 p-2 backdrop-blur z-40">
                            <a class="block rounded-lg px-3 py-2 text-sm text-white/90 hover:bg-white/10"
                                href="#">Beranda</a>
                            <a class="block rounded-lg px-3 py-2 text-sm text-white/90 hover:bg-white/10"
                                href="#">Tentang</a>
                            <a class="block rounded-lg px-3 py-2 text-sm text-white/90 hover:bg-white/10"
                                href="#">Lokasi</a>
                            <a class="block rounded-lg px-3 py-2 text-sm text-white/90 hover:bg-white/10"
                                href="#">Produk</a>
                            <a class="block rounded-lg px-3 py-2 text-sm text-white/90 hover:bg-white/10"
                                href="#">Kontak</a>
                            <a class="mt-1 block rounded-full border border-white/60 px-3 py-2 text-center text-sm font-semibold text-white/90 hover:bg-white/10"
                                href="#">
                                Daftar/Masuk
                            </a>
                        </div>

                        <!-- Overlay gelap (tidak menutupi tombol) -->
                        <div class="hidden group-open:block fixed inset-0 z-30 bg-black/40 backdrop-blur-sm"></div>
                    </details>
                </nav>
            </header>



            <!-- HERO TEXT -->
            <main class="relative z-10 flex flex-1 items-center justify-center text-center px-60 pt-60">
                <div>
                    <h1 class="text-4xl font-light leading-tight tracking-wide sm:text-6xl">
                        Selamat Datang,<br />
                        Di <span class="font-semibold">TaniDieng</span>
                    </h1>
                    <p class="mt-4 text-white/80 text-lg max-w-md mx-auto">
                        Platform pertanian modern untuk petani Dieng - berdaya, berinovasi, dan berkelanjutan.
                    </p>
                    <a href="#"
                        class="mt-8 inline-block rounded-full bg-white/10 border border-white/60 px-6 py-3 text-sm font-semibold text-white/90 hover:bg-white/20 backdrop-blur-sm transition">
                        Mulai Jelajahi
                    </a>
                </div>
            </main>

            <!-- Subtle vignette edges (opsional) -->
            <div class="pointer-events-none absolute inset-0 ring-1 ring-inset ring-black/10"></div>
        </section>
    </div>


</body>

</html>
