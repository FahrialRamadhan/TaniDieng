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
    <title>Daftar Produsen</title>
    <style>
        details[open]>div {
            animation: dropdown-open 0.25s ease-out;
        }

        @keyframes dropdown-open {
            0% {
                opacity: 0;
                transform: translateY(-6px)
            }

            100% {
                opacity: 1;
                transform: translateY(0)
            }
        }

        .search-wrap {
            width: 0;
            opacity: 0;
            pointer-events: none;
            transition: width .28s ease, opacity .2s ease
        }

        .search-wrap.open {
            width: min(640px, 55vw);
            opacity: 1;
            pointer-events: auto
        }

        @media (max-width:640px) {
            .search-wrap.open {
                width: 60vw
            }
        }
    </style>
</head>

<body>
    @include('layouts.navbar-guest')
    <div>
        <img src="img/bennerprodusen.png" alt="Gambar Produk" class="w-full h-64 object-cover mt-16" />
    </div>

    <section id="produk" class="bg-[#0F5529] min-h-screen py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <h2 class="text-white text-2xl font-semibold mb-6">Produsen</h2>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                <!-- Sidebar Filter -->
                <aside class="lg:col-span-3">
                    <div class="rounded-xl border border-white/20 bg-white/5 backdrop-blur p-4 text-white sticky top-6">
                        <div class="flex items-center justify-between mb-3">
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                        d="M3 4h18M6 8h12M9 12h6m-4 4h2m-8 4h12" />
                                </svg>
                                <span class="text-sm font-medium">Filter</span>
                            </div>
                        </div>

                        <label class="block text-xs mb-1 opacity-80">Cari berdasarkan filter</label>
                        <input type="text" placeholder="Ketik kata kunci..."
                            class="mb-3 w-full rounded-lg border border-white/20 bg-white/10 px-3 py-2 text-sm placeholder-white/60 focus:outline-none focus:ring-1 focus:ring-white/40">

                        <label class="block text-xs mb-1 opacity-80">Nama</label>
                        <select
                            class="mb-3 w-full rounded-lg border border-white/20 bg-white/10 px-3 py-2 text-sm focus:outline-none focus:ring-1 focus:ring-white/40">
                            <option>Semua</option>
                            <option>Jono Kagama</option>
                        </select>

                        <label class="block text-xs mb-1 opacity-80">Nama samar</label>
                        <input type="text" placeholder="Mis. Jono"
                            class="w-full rounded-lg border border-white/20 bg-white/10 px-3 py-2 text-sm placeholder-white/60 focus:outline-none focus:ring-1 focus:ring-white/40">
                    </div>
                </aside>

                <!-- Grid Kartu -->
                <div class="lg:col-span-9">
                    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 gap-6">

                        @forelse ($producers as $produsen)
                            {{-- kirim data produsen ke component --}}
                            @include('components.cardprodusen', ['produsen' => $produsen])
                        @empty
                            <p class="text-white/80 col-span-full text-sm">
                                Belum ada produsen yang terdaftar.
                            </p>
                        @endforelse

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

        function openSearch() {
            wrap.classList.add('open');
            setTimeout(() => input.focus(), 60);
        }

        function closeSearch() {
            wrap.classList.remove('open');
            input.blur();
        }
        btn.addEventListener('click', () => {
            wrap.classList.toggle('open');
            if (wrap.classList.contains('open')) setTimeout(() => input.focus(), 60);
        });
        document.addEventListener('keydown', e => {
            if (e.key === 'Escape') closeSearch();
        });
        document.addEventListener('click', e => {
            const isInside = wrap.contains(e.target) || btn.contains(e.target);
            if (!isInside) closeSearch();
        });
    </script>
</body>

</html>
