<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="icon" type="image/png" sizes="48x48" href="{{ asset('img/favicon.png') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Detail Produsen - TaniDieng</title>
</head>

<body class="bg-[#0F5529] text-white antialiased min-h-screen flex flex-col">

    {{-- NAVBAR SAMA PERSIS DENGAN HALAMAN LAIN --}}
    @include('layouts.navbar-guest')

    {{-- MAIN CONTENT --}}
    <main class="flex-1 pt-24 pb-16">
        <div class="max-w-6xl mx-auto px-6">

            {{-- JUDUL --}}
            <h1 class="text-3xl font-semibold mb-10">
                Detail Produsen
            </h1>

            {{-- CARD DETAIL PRODUSEN --}}
            <div
                class="rounded-2xl border border-white/20 bg-white/5 backdrop-blur-sm
                          shadow-[0_18px_55px_rgba(0,0,0,0.45)]
                          px-8 py-8 md:px-10 md:py-10
                          max-w-4xl mx-auto grid md:grid-cols-3 gap-8">

                {{-- Avatar / Icon --}}
                <div class="flex md:block justify-center">
                    <div
                        class="w-28 h-28 rounded-2xl bg-[#14633A]
                                flex items-center justify-center shadow-lg">
                        <i class="fa-solid fa-user text-4xl text-orange-300"></i>
                    </div>
                </div>

                {{-- Info utama --}}
                <div class="md:col-span-2 space-y-4">
                    <div>
                        <h2 class="text-2xl font-semibold">
                            {{ $produsen->name }}
                        </h2>
                        <p class="text-sm text-white/80 mt-1">
                            Bergabung sejak
                            {{ $produsen->created_at?->format('d M Y') ?? '-' }}
                        </p>
                    </div>

                    @php
                        $telp = $produsen->phone ?? ($produsen->no_hp ?? null);
                    @endphp

                    <div class="space-y-1 text-sm">
                        <p>
                            <span class="font-semibold">Email:</span>
                            <a href="mailto:{{ $produsen->email }}" class="underline hover:text-white">
                                {{ $produsen->email }}
                            </a>
                        </p>
                        <p>
                            <span class="font-semibold">No. Telepon:</span>
                            @if ($telp)
                                <a href="tel:{{ $telp }}" class="underline hover:text-white">
                                    {{ $telp }}
                                </a>
                            @else
                                -
                            @endif
                        </p>
                        <p>
                            <span class="font-semibold">Alamat:</span>
                            {{ $produsen->alamat ?? ($produsen->address ?? '-') }}
                        </p>
                    </div>

                    <div class="pt-4 flex flex-wrap gap-3">
                        <a href="mailto:{{ $produsen->email }}"
                            class="inline-flex items-center justify-center rounded-full
                                  border border-white/40 px-4 py-2 text-sm
                                  hover:bg-white/10 transition">
                            <i class="fa-solid fa-envelope mr-2 text-xs"></i>
                            Kirim Email
                        </a>

                        @if ($telp)
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $telp) }}" target="_blank"
                                class="inline-flex items-center justify-center rounded-full
                                      border border-white/40 px-4 py-2 text-sm
                                      hover:bg-white/10 transition">
                                <i class="fa-brands fa-whatsapp mr-2 text-xs"></i>
                                Hubungi via WhatsApp
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            {{-- LINK KEMBALI --}}
            <div class="max-w-4xl mx-auto mt-14">
                <a href="{{ route('produsen') }}" class="text-sm underline hover:text-white/80">
                    ← Kembali ke daftar produsen
                </a>
            </div>

        </div>
    </main>

    {{-- FOOTER SAMA DENGAN HALAMAN LAIN --}}
    @include('layouts.footer')

</body>

</html>
