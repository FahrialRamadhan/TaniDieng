@props(['produsen'])

@php
    $telp = $produsen->phone ?? ($produsen->no_hp ?? null);
@endphp

<div
    class="group cursor-pointer rounded-2xl border border-white/20 bg-white/5
           shadow-[0_10px_35px_rgba(0,0,0,.45)]
           p-6 flex flex-col gap-4
           transform transition-all duration-300
           hover:-translate-y-3 hover:scale-[1.02]
           hover:shadow-[0_24px_60px_rgba(0,0,0,.75)]
           hover:border-white/60">

    {{-- BARIS ATAS: ICON + NAMA --}}
    <div class="flex gap-4">
        <div
            class="min-w-[64px] h-[64px] rounded-xl bg-[#14633A]
                    flex items-center justify-center shadow-md">
            <i class="fa-solid fa-user text-3xl text-orange-300"></i>
        </div>

        <div class="flex-1">
            <h3 class="font-semibold text-xl text-white leading-tight">
                {{ $produsen->name }}
            </h3>
            <p class="text-xs text-white/70 mt-1">
                Bergabung sejak
                {{ optional($produsen->created_at)->format('d M Y') ?? '-' }}
            </p>
        </div>
    </div>

    {{-- INFO DETAIL --}}
    <div class="mt-5 space-y-3 text-sm text-white">
        <div>
            <div class="text-[11px] uppercase tracking-wide text-white/60">
                Email
            </div>
            <div class="break-words">
                {{ $produsen->email }}
            </div>
        </div>

        <div>
            <div class="text-[11px] uppercase tracking-wide text-white/60">
                No. Telepon
            </div>
            <div>
                {{ $telp ?? '-' }}
            </div>
        </div>

        <div>
            <div class="text-[11px] uppercase tracking-wide text-white/60">
                Alamat
            </div>
            <div>
                {{ $produsen->alamat ?? '-' }}
            </div>
        </div>
    </div>

    {{-- TOMBOL --}}
    <div class="mt-6 space-y-3">
        <a href="{{ route('produsen.show', $produsen->id) }}"
            class="block w-full text-center rounded-lg border border-white/40
                  py-2.5 text-sm text-white hover:bg-white/10 transition">
            Learn more
        </a>

        <a href="mailto:{{ $produsen->email }}"
            class="block w-full text-center rounded-lg border border-white/40
                  py-2.5 text-sm text-white hover:bg-white/10 transition">
            <i class="fa-solid fa-envelope text-xs mr-2"></i>
            Kirim Pesan
        </a>
    </div>
</div>
