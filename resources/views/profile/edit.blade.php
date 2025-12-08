<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <div class="bg-[#0F5529] min-h-screen text-white">

        {{-- ================================ HEADER BANNER ================================ --}}
        <div class="relative -mt-6 mb-24">
            {{-- BACKGROUND --}}
            <div class="w-full h-48 md:h-56 bg-cover bg-center blur-[2px]"
                style="background-image: url('{{ asset('img/Rectangle 6730.png') }}')">
            </div>

            {{-- OVERLAY --}}
            <div class="absolute inset-0 bg-[#0F5529]/40"></div>

            {{-- AVATAR + NAME --}}
            <div class="absolute bottom-0 left-[25rem] translate-y-1/2 flex items-center gap-4">
                <img src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : asset('img/default-avatar.png') }}"
                    class="h-24 w-24 md:h-28 md:w-28 rounded-full object-cover
                            border-4 border-[#0F5529] ring-2 ring-white/70 shadow-xl bg-[#0F5529]" />

                <div class="pb-3">
                    <div class="text-xl md:text-2xl font-semibold">{{ $user->name }}</div>
                    <div class="text-sm text-white/80">{{ $user->email }}</div>
                </div>
            </div>
        </div>

        @php
            // Daftar alamat
            $addrList = isset($addresses) ? $addresses : $user->addresses;

            // Default tab
            $activeTab = 'biodata';

            // 1) Dari session (redirect sukses: profil / password / alamat / dst.)
            if (session('profile_tab')) {
                $activeTab = session('profile_tab');
            }

            // 2) Dari old('profile_tab') (kalau ada input lama)
            if (old('profile_tab')) {
                $activeTab = old('profile_tab');
            }

            // 3) KALAU ADA ERROR VALIDASI DI FORM PASSWORD → PAKSA ke tab "password"
            if ($errors->has('current_password') || $errors->has('password') || $errors->has('password_confirmation')) {
                $activeTab = 'password';
            }
        @endphp

        {{-- ============================== MAIN CONTENT ============================== --}}
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pb-20" x-data="{ tab: '{{ $activeTab }}' }">

            {{-- Notif sukses (liquid glass) --}}
            @if (session('success'))
                <div x-data="{ show: true }" x-show="show" x-transition.opacity.duration.500ms x-init="setTimeout(() => show = false, 3500)"
                    class="mb-6 px-6 py-3 rounded-lg bg-white/10 backdrop-blur-md
                           border border-white/20 text-white text-sm flex items-center justify-between
                           shadow-[0_8px_30px_rgba(0,0,0,0.25)]">
                    <span>{{ session('success') }}</span>
                    <button @click="show = false" class="text-white/70 hover:text-white px-2">&times;</button>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                {{-- ================= MENU KIRI ================= --}}
                <div class="md:col-span-1">
                    <div class="bg-white/5 backdrop-blur border border-white/20 rounded-lg p-6">
                        <div class="space-y-5 text-base">
                            <button @click="tab='biodata'"
                                class="block w-full text-left pb-1 border-b border-white/20 transition"
                                :class="tab === 'biodata' ? 'text-orange-400 font-semibold' : 'text-white/80'">
                                Biodata diri
                            </button>

                            <button @click="tab='password'" class="block w-full text-left pb-1 border-b border-white/20"
                                :class="tab === 'password' ? 'text-orange-400 font-semibold' : 'text-white/80'">
                                Ubah kata sandi
                            </button>

                            <button @click="tab='alamat'" class="block w-full text-left pb-1 border-b border-white/20"
                                :class="tab === 'alamat' ? 'text-orange-400 font-semibold' : 'text-white/80'">
                                Daftar alamat
                            </button>

                            <button @click="tab='delete'" class="block w-full text-left pb-1 border-b border-white/20"
                                :class="tab === 'delete' ? 'text-orange-400 font-semibold' : 'text-white/80'">
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

                        {{-- DAFTAR ALAMAT --}}
                        <div x-show="tab === 'alamat'" x-cloak>
                            <div class="flex justify-between items-center mb-4">
                                <h3 class="text-lg font-semibold">Daftar alamat</h3>
                                <button x-on:click="$dispatch('open-modal', 'add-address')"
                                    class="px-4 py-2 bg-white/10 border border-white/30 rounded-md text-sm hover:bg-white/20">
                                    Tambah alamat baru
                                </button>
                            </div>

                            {{-- Header kolom --}}
                            <div class="grid grid-cols-12 text-sm font-semibold mb-3 text-white/90">
                                <div class="col-span-3">Nama Penerima</div>
                                <div class="col-span-9">Alamat</div>
                            </div>

                            @forelse ($addrList as $address)
                                <div class="grid grid-cols-12 py-4 border-t border-white/10">
                                    {{-- NAMA PENERIMA + (SET) ALAMAT UTAMA --}}
                                    <div class="col-span-12 md:col-span-3 mb-2 md:mb-0">
                                        <div class="font-semibold">
                                            {{ $address->recipient_name }}
                                        </div>

                                        <div class="mt-2">
                                            @if ($address->is_primary)
                                                <span
                                                    class="inline-block text-xs px-3 py-1 bg-white/10 rounded-md border border-white/20">
                                                    Alamat Utama
                                                </span>
                                            @else
                                                <form method="post"
                                                    action="{{ route('profile.address.setPrimary', $address) }}">
                                                    @csrf
                                                    <button
                                                        class="text-xs px-3 py-1 bg-white/10 rounded-md border border-white/20 hover:bg-white/20">
                                                        Set Alamat Utama
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    </div>

                                    {{-- ALAMAT + TOMBOL EDIT DI KANAN --}}
                                    <div
                                        class="col-span-12 md:col-span-9 flex flex-col md:flex-row md:items-start md:justify-between gap-3">
                                        <div class="text-white/80 text-sm leading-snug">
                                            @if ($address->label)
                                                <span class="font-semibold">{{ $address->label }}</span> -
                                            @endif
                                            {{ $address->address }}<br>
                                            {{ $address->city }} {{ $address->subdistrict }}
                                            {{ $address->postal_code }}<br>
                                            No Telepon : {{ $address->phone }}
                                        </div>

                                        <div class="flex flex-col items-end md:ml-4 gap-2">
                                            {{-- Tombol Edit --}}
                                            <button x-data
                                                @click="$dispatch('open-modal', 'edit-address-{{ $address->id }}')"
                                                class="text-xs px-3 py-1 bg-white/10 border border-white/20 rounded-md hover:bg-white/20">
                                                Edit
                                            </button>

                                            {{-- Tombol Hapus --}}
                                            <button x-data
                                                @click="$dispatch('open-modal', 'delete-address-{{ $address->id }}')"
                                                class="text-xs px-3 py-1 bg-red-600/20 text-red-300 border border-red-400/40 rounded-md
                                                       hover:bg-red-600/30">
                                                Hapus
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            @empty
                                <p class="text-sm text-white/70 mt-4">Belum ada alamat tersimpan.</p>
                            @endforelse
                        </div>

                        {{-- DELETE ACCOUNT --}}
                        <div x-show="tab === 'delete'" x-cloak>
                            <div class="text-white">
                                @include('profile.partials.delete-user-form')
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

        {{-- ============================ MODAL TAMBAH ALAMAT ============================ --}}
        <x-modal name="add-address" focusable>
            <form method="post" action="{{ route('profile.address.store') }}">
                @csrf

                <h2 class="text-2xl font-semibold mb-2">Tambah alamat baru</h2>
                <p class="text-sm text-white/70 mb-8">
                    Lengkapi detail alamat untuk pengiriman barang.
                </p>

                <div class="space-y-6">
                    {{-- Label alamat --}}
                    <div class="flex items-center gap-6">
                        <div class="w-10 flex justify-center">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24">
                                <path d="M8 3h8l4 4v14H4V3h4z" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <div class="text-sm text-white/80 mb-1">
                                Label alamat (contoh: Kantor, Rumah)
                            </div>
                            <input type="text" name="label"
                                class="w-full bg-transparent border-b border-white/40 focus:border-white outline-none text-sm placeholder-white/50"
                                placeholder="Contoh: Rumah, Kantor">
                        </div>
                    </div>

                    {{-- Nama Penerima --}}
                    <div class="flex items-center gap-6">
                        <div class="w-10 flex justify-center">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24">
                                <path d="M12 12a4 4 0 1 0-4-4 4 4 0 0 0 4 4Zm0 2c-4 0-7 2-7 4v1h14v-1c0-2-3-4-7-4Z"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <div class="text-sm text-white/80 mb-1">Nama Penerima</div>
                            <input type="text" name="recipient_name"
                                class="w-full bg-transparent border-b border-white/40 focus:border-white outline-none text-sm placeholder-white/50"
                                required>
                        </div>
                    </div>

                    {{-- No telepon --}}
                    <div class="flex items-center gap-6">
                        <div class="w-10 flex justify-center">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24">
                                <path
                                    d="M4 5a2 2 0 0 1 2-2h1.3a1 1 0 0 1 .95.68l1.1 3.3a1 1 0 0 1-.27 1.03L8.2 9.6a9.5 9.5 0 0 0 6.2 6.2l1.6-1.83a1 1 0 0 1 1.03-.27l3.3 1.1a1 1 0 0 1 .68.95V19a2 2 0 0 1-2 2h-1C9.82 21 4 15.18 4 8V5Z"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <div class="text-sm text-white/80 mb-1">No telepon penerima</div>
                            <input type="text" name="phone"
                                class="w-full bg-transparent border-b border-white/40 focus:border-white outline-none text-sm placeholder-white/50"
                                placeholder="08xxxxxxxxxx" required>
                        </div>
                    </div>

                    {{-- Alamat --}}
                    <div class="flex items-center gap-6">
                        <div class="w-10 flex justify-center">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="1.5"
                                viewBox="0 0 24 24">
                                <path d="m4 11 8-7 8 7v9H4Z" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M10 20v-6h4v6" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <div class="text-sm text-white/80 mb-1">Alamat</div>
                            <input type="text" name="address"
                                class="w-full bg-transparent border-b border-white/40 focus:border-white outline-none text-sm placeholder-white/50"
                                placeholder="Nama jalan, nomor rumah, RT/RW" required>
                        </div>
                    </div>

                    {{-- Kota --}}
                    <div class="flex items-center gap-6">
                        <div class="w-10"></div>
                        <div class="flex-1">
                            <div class="text-sm text-white/80 mb-1">Kota</div>
                            <input type="text" name="city"
                                class="w-full bg-transparent border-b border-white/40 focus:border-white outline-none text-sm placeholder-white/50">
                        </div>
                    </div>

                    {{-- Kelurahan --}}
                    <div class="flex items-center gap-6">
                        <div class="w-10"></div>
                        <div class="flex-1">
                            <div class="text-sm text-white/80 mb-1">Kelurahan</div>
                            <input type="text" name="subdistrict"
                                class="w-full bg-transparent border-b border-white/40 focus:border-white outline-none text-sm placeholder-white/50">
                        </div>
                    </div>

                    {{-- Kode Pos --}}
                    <div class="flex items-center gap-6">
                        <div class="w-10"></div>
                        <div class="flex-1">
                            <div class="text-sm text-white/80 mb-1">Kode Pos</div>
                            <input type="text" name="postal_code"
                                class="w-full bg-transparent border-b border-white/40 focus:border-white outline-none text-sm placeholder-white/50">
                        </div>
                    </div>
                </div>

                <div class="mt-10 flex justify-end gap-4">
                    <button type="button" x-on:click="$dispatch('close')"
                        class="px-8 py-2 rounded bg-white/20 text-white text-sm hover:bg-white/30 border border-white/40">
                        Kembali
                    </button>

                    <button type="submit"
                        class="px-8 py-2 rounded bg-[#0F7C35] text-white text-sm hover:bg-[#0a5f2b] border border-white/40">
                        Simpan
                    </button>
                </div>
            </form>
        </x-modal>

        {{-- ============================ MODAL EDIT ALAMAT ============================ --}}
        @foreach ($addrList as $address)
            <x-modal name="edit-address-{{ $address->id }}" focusable>
                <form method="post" action="{{ route('profile.address.update', $address) }}">
                    @csrf
                    @method('PUT')

                    <h2 class="text-2xl font-semibold mb-2">Edit alamat</h2>

                    <div class="space-y-6">
                        <input type="text" name="label" value="{{ $address->label }}"
                            class="w-full bg-transparent border-b border-white/40 focus:border-white outline-none" />

                        <input type="text" name="recipient_name" value="{{ $address->recipient_name }}"
                            class="w-full bg-transparent border-b border-white/40 focus:border-white outline-none" />

                        <input type="text" name="phone" value="{{ $address->phone }}"
                            class="w-full bg-transparent border-b border-white/40 focus:border-white outline-none" />

                        <input type="text" name="address" value="{{ $address->address }}"
                            class="w-full bg-transparent border-b border-white/40 focus:border-white outline-none" />

                        <input type="text" name="city" value="{{ $address->city }}"
                            class="w-full bg-transparent border-b border-white/40 focus:border-white outline-none" />

                        <input type="text" name="subdistrict" value="{{ $address->subdistrict }}"
                            class="w-full bg-transparent border-b border-white/40 focus:border-white outline-none" />

                        <input type="text" name="postal_code" value="{{ $address->postal_code }}"
                            class="w-full bg-transparent border-b border-white/40 focus:border-white outline-none" />
                    </div>

                    <div class="flex justify-end mt-10 gap-4">
                        <button type="button" x-on:click="$dispatch('close')"
                            class="px-6 py-2 bg-white/20 rounded-md text-sm">
                            Batal
                        </button>

                        <button type="submit" class="px-6 py-2 bg-[#0F7C35] rounded-md text-sm">
                            Simpan perubahan
                        </button>
                    </div>
                </form>
            </x-modal>
        @endforeach

        {{-- ============================ MODAL HAPUS ALAMAT ============================ --}}
        @foreach ($addrList as $address)
            <x-modal name="delete-address-{{ $address->id }}" focusable>
                <form method="post" action="{{ route('profile.address.delete', $address) }}">
                    @csrf
                    @method('DELETE')

                    <h2 class="text-xl font-semibold mb-4">Hapus Alamat?</h2>

                    <p class="text-white/80 text-sm mb-6">
                        Apakah Anda yakin ingin menghapus alamat <b>{{ $address->label ?? '' }}</b>?
                        Tindakan ini tidak dapat dibatalkan.
                    </p>

                    <div class="flex justify-end gap-3 mt-6">
                        <button type="button" x-on:click="$dispatch('close')"
                            class="px-6 py-2 bg-white/20 border border-white/30 rounded-md text-sm hover:bg-white/30">
                            Batal
                        </button>

                        <button type="submit"
                            class="px-6 py-2 bg-red-600 border border-red-400/40 rounded-md text-sm hover:bg-red-700">
                            Hapus
                        </button>
                    </div>
                </form>
            </x-modal>
        @endforeach

    </div>
</x-app-layout>
