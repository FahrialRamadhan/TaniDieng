<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <style>
        [x-cloak] { display: none !important; }
    </style>

    <div class="bg-[#0F5529] min-h-screen text-white">

        {{-- ================================
            HEADER BANNER FULL WIDTH
        ================================= --}}
        <div class="relative -mt-6 mb-24">

            {{-- BACKGROUND --}}
            <div class="w-full h-48 md:h-56 bg-cover bg-center blur-[2px]"
                 style="background-image: url('{{ asset('img/Rectangle 6730.png') }}')">
            </div>

            {{-- OVERLAY --}}
            <div class="absolute inset-0 bg-[#0F5529]/40"></div>

            {{-- AVATAR + NAME (CENTERED) --}}
            <div class="absolute bottom-0 left-[25rem] translate-y-1/2 
                        flex items-center gap-4">

                {{-- Avatar --}}
                <img src="{{ $user->profile_photo
                            ? asset('storage/' . $user->profile_photo)
                            : asset('img/default-avatar.png') }}"
                     class="h-24 w-24 md:h-28 md:w-28 rounded-full object-cover
                            border-4 border-[#0F5529] ring-2 ring-white/70 shadow-xl bg-[#0F5529]" />

                {{-- Name & Email --}}
                <div class="pb-3">
                    <div class="text-xl md:text-2xl font-semibold">{{ $user->name }}</div>
                    <div class="text-sm text-white/80">{{ $user->email }}</div>
                </div>
            </div>

        </div>

        {{-- ===============================================
            MAIN CONTENT (TABS + FORMS)
        =============================================== --}}
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pb-20"
             x-data="{ tab: 'biodata' }">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                {{-- ================= MENU KIRI ================= --}}
                <div class="md:col-span-1">
                    <div class="bg-white/5 backdrop-blur border border-white/20 rounded-lg p-6">
                        <div class="space-y-5 text-base">

                            <button @click="tab='biodata'"
                                class="block w-full text-left pb-1 border-b border-white/20 transition"
                                :class="tab==='biodata' ? 'text-orange-400 font-semibold' : 'text-white/80'">
                                Biodata diri
                            </button>

                            <button @click="tab='password'"
                                class="block w-full text-left pb-1 border-b border-white/20"
                                :class="tab==='password' ? 'text-orange-400 font-semibold' : 'text-white/80'">
                                Ubah kata sandi
                            </button>

                            <button @click="tab='alamat'"
                                class="block w-full text-left pb-1 border-b border-white/20"
                                :class="tab==='alamat' ? 'text-orange-400 font-semibold' : 'text-white/80'">
                                Daftar alamat
                            </button>

                            <button @click="tab='delete'"
                                class="block w-full text-left pb-1 border-b border-white/20"
                                :class="tab==='delete' ? 'text-orange-400 font-semibold' : 'text-white/80'">
                                Delete Account
                            </button>

                        </div>
                    </div>
                </div>

                {{-- ================= KONTEN KANAN ================= --}}
                <div class="md:col-span-2">
                    <div class="bg-white/5 backdrop-blur border border-white/20 rounded-lg p-8">

                        {{-- BIODATA --}}
                        <div x-show="tab === 'biodata'" x-cloak>
                            <div class="text-white">
                                @include('profile.partials.update-profile-information-form')
                            </div>
                        </div>

                        {{-- PASSWORD --}}
                        <div x-show="tab === 'password'" x-cloak>
                            <div class="text-white">
                                @include('profile.partials.update-password-form')
                            </div>
                        </div>

                        {{-- ALAMAT --}}
                        <div x-show="tab === 'alamat'" x-cloak>
                            <p class="text-white/80 text-sm">
                                Kamu bisa menambahkan form alamat di sini nanti.
                            </p>
                        </div>

                        {{-- DELETE --}}
                        <div x-show="tab === 'delete'" x-cloak>
                            <div class="text-white">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
