<nav x-data="{ open: false, mainMenu: false }"
     class="fixed inset-x-0 top-0 z-30 bg-[#0A5F2B] text-white shadow-sm border-white/10">
    <div class="w-full px-4 sm:px-6 lg:px-10 pt-[2px] pb-[5.5px]">

        {{-- tambahkan "relative" di sini --}}
        <div class="relative flex items-center justify-between h-14">

            {{-- ============================= --}}
            {{-- KIRI: MENU DROPDOWN + SEARCH --}}
            {{-- ============================= --}}
            <div class="flex items-center gap-4 relative">

                {{-- TOMBOL MENU --}}
                <button type="button"
                        @click="mainMenu = ! mainMenu"
                        class="inline-flex items-center gap-2 text-sm text-white/90 hover:text-white rounded-md px-2 py-1 transition">
                    <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M4 6h16M4 12h16M4 18h16" stroke-linecap="round" />
                    </svg>
                    <span>Menu</span>
                </button>

                {{-- DROPDOWN MENU --}}
                <div x-cloak
                     x-show="mainMenu"
                     x-transition
                     @click.outside="mainMenu = false"
                     class="absolute left-0 top-9 mt-2 w-72 rounded-xl border border-white/25 bg-white/10
                            text-white/90 backdrop-blur-md shadow-lg z-50">

                    <div class="p-2 text-[13px] font-medium">
                        <a href="{{ route('home') }}" class="block rounded-lg px-4 py-2.5 text-[13px] font-medium hover:bg-white/10">Beranda</a>
                <a href="{{ route('tentang') }}" class="block rounded-lg px-4 py-2.5 text-[13px] font-medium hover:bg-white/10">Tentang</a>
                <a href="{{ route('product') }}" class="block rounded-lg px-4 py-2.5 text-[13px] font-medium hover:bg-white/10">Belanja</a>

                <!-- Submenu Produsen -->
                <details class="group/sub relative">
                  <summary class="list-none flex items-center justify-between rounded-lg px-4 py-2.5 text-[13px] font-medium hover:bg-white/10 cursor-pointer">
                    <span>Produsen</span>
                    <svg viewBox="0 0 24 24" class="h-4 w-4 transition-transform group-open/sub:rotate-180" fill="none" stroke="currentColor" stroke-width="1.5">
                      <path d="M6 9l6 6 6-6" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                  </summary>
                  <div class="mx-3 mb-2 rounded-lg border border-white/15 bg-white/5 p-1">
                    <a href="{{ route('produsen') }}" class="block rounded-md px-3 py-2 text-[13px] hover:bg-white/10">Daftar Produsen</a>
                  </div>
                </details>

                <a href="{{ route('bantuan') }}" class="block rounded-lg px-4 py-2.5 text-[13px] font-medium hover:bg-white/10">Bantuan</a>
                    </div>

                </div>

                {{-- ICON SEARCH --}}
                <button type="button"
                        class="inline-flex items-center text-white/90 hover:text-white"
                        aria-label="Cari">
                    <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5">
                        <circle cx="11" cy="11" r="7"></circle>
                        <path d="m20 20-3.5-3.5" stroke-linecap="round"></path>
                    </svg>
                </button>
            </div>

            {{-- ============================= --}}
            {{-- TENGAH: LOGO (SELALU DI TENGAH) --}}
            {{-- ============================= --}}
            <div class="absolute left-1/2 -translate-x-1/2 flex items-center justify-center pointer-events-none">
                <a href="{{ url('/') }}" class="flex items-center gap-2 pointer-events-auto">
                    <x-application-logo class="block h-7 w-auto fill-current text-white" />
                    <span class="font-semibold tracking-wide">TaniDieng</span>
                </a>
            </div>

            {{-- ============================= --}}
            {{-- KANAN: AUTO LOGIN / GUEST --}}
            {{-- ============================= --}}
            <div class="hidden sm:flex items-center gap-4">

                {{-- JIKA BELUM LOGIN --}}
                @guest
                    <a href="{{ route('login') }}"
                       class="inline-flex items-center rounded-full border border-white/70 px-5 py-1.5
                              text-sm font-medium hover:bg-white hover:text-[#0A5F2B] transition">
                        Daftar / Masuk
                    </a>
                @endguest

                {{-- JIKA SUDAH LOGIN --}}
                @auth
                    {{-- DROPDOWN USER --}}
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center gap-2 rounded-full px-4 py-1.5 
                                           text-sm font-medium text-white/90 hover:bg-white/10 transition">
                                
                                {{-- FOTO USER --}}
                                <img src="{{ Auth::user()->profile_photo
                                            ? asset('storage/' . Auth::user()->profile_photo)
                                            : asset('img/default-avatar.png') }}"
                                     class="h-7 w-7 rounded-full object-cover" />
                                
                                {{-- NAMA --}}
                                <span class="hidden md:inline">{{ Auth::user()->name }}</span>

                                <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill="currentColor" fill-rule="evenodd"
                                          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                          clip-rule="evenodd" />
                                </svg>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">Profil</x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault(); this.closest('form').submit();">
                                    Keluar
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>

                    {{-- ICON KERANJANG --}}
                    <a href="#" aria-label="Keranjang" class="text-white/90 hover:text-white">
                        <svg viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M3 6h18l-1.5 9h-13L4 6z" stroke-linejoin="round"></path>
                            <circle cx="9" cy="20" r="1"></circle>
                            <circle cx="17" cy="20" r="1"></circle>
                        </svg>
                    </a>
                @endauth

            </div>

            {{-- ============================= --}}
            {{-- HAMBURGER MOBILE --}}
            {{-- ============================= --}}
            <div class="flex items-center sm:hidden">
                <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-white/80 hover:bg-white/10 transition">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }"
                              class="inline-flex"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M4 6h16M4 12h16M4 18h16" />

                        <path :class="{'hidden': ! open, 'inline-flex': open }"
                              class="hidden"
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    {{-- ============================= --}}
    {{-- MOBILE MENU --}}
    {{-- ============================= --}}
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-[#0A5F2B] border-t border-white/20">

        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('home')">Beranda </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('tentang')">Tentang</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('product')">Belanja</x-responsive-nav-link>
        </div>

        {{-- AREA PROFIL MOBILE --}}
        @auth
            <div class="pt-4 pb-3 border-t border-white/20">
                <div class="px-4 flex items-center gap-3">
                    <img src="{{ Auth::user()->profile_photo
                                ? asset('storage/' . Auth::user()->profile_photo)
                                : asset('img/default-avatar.png') }}"
                         class="h-9 w-9 rounded-full object-cover border border-white/70" />

                    <div>
                        <div class="font-medium text-sm text-white">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-xs text-white/70">{{ Auth::user()->email }}</div>
                    </div>
                </div>

                <div class="mt-3 space-y-1 pb-3">
                    <x-responsive-nav-link :href="route('profile.edit')">Profil</x-responsive-nav-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                                               onclick="event.preventDefault(); this.closest('form').submit();">
                            Keluar
                        </x-responsive-nav-link>
                    </form>
                </div>

            </div>
        @endauth

        @guest
            <div class="p-3 border-t border-white/20">
                <a href="{{ route('login') }}"
                   class="block text-center rounded-lg bg-white text-[#0A5F2B] py-2 font-medium">
                    Daftar / Masuk
                </a>
            </div>
        @endguest
    </div>
</nav>
