@props([
    'align' => 'right',
    'width' => '48',
])

@php
    // Alignment: kiri / kanan / atas
    switch ($align) {
        case 'left':
            $alignmentClasses = 'origin-top-left left-0';
            break;
        case 'top':
            $alignmentClasses = 'origin-top';
            break;
        case 'right':
        default:
            $alignmentClasses = 'origin-top-right right-0';
            break;
    }

    // Lebar dropdown
    switch ($width) {
        case '48':
            $widthClasses = 'w-48';
            break;
        default:
            $widthClasses = $width;
            break;
    }
@endphp

<div x-data="{ open: false }" class="relative">
    {{-- Trigger --}}
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    {{-- Overlay kecil kalau mau nutup saat klik di luar (opsional) --}}
    <div x-show="open"
         x-transition.opacity
         @click="open = false"
         class="fixed inset-0 z-40"></div>

    {{-- Panel dropdown (LIQUID GLASS) --}}
    <div x-show="open"
         x-transition
         class="absolute z-50 {{ $alignmentClasses }} mt-2 {{ $widthClasses }}">
        <div class="rounded-2xl
            bg-white/10 backdrop-blur-xl
            border border-white/25
            shadow-[0_18px_45px_rgba(0,0,0,.35)]
            p-3
            text-sm text-white space-y-1">
    {{ $content }}
</div>

    </div>
</div>
