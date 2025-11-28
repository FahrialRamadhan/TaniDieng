@props(['active' => false])

@php
    $classes = $active
        ? 'block w-full px-4 py-2 text-sm text-white rounded-lg bg-white/20'
        : 'block w-full px-4 py-2 text-sm text-white rounded-lg hover:bg-white/10 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
