<x-mail::layout>

{{-- Header --}}
<x-slot:header>
    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td class="content" align="center">
                <div style="padding: 20px 0;">
                    {{-- Logo --}}
                    <img src="{{ asset('https://i.imgur.com/IQ3Wfqq.png') }}" alt="TaniDieng Logo"
                         style="height: 100px; margin-bottom: 20px;">
                    <div style="font-size: 22px; font-weight: 600; color: #0F5529;">
                        {{ config('app.name') }}
                    </div>
                </div>
            </td>
        </tr>
    </table>
</x-slot:header>

{{-- Main Message Container --}}
<x-mail::panel>
    
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
# Halo!
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
<p style="color:#1b1b1b; font-size:14px; margin-top:10px;">
    {{ $line }}
</p>
@endforeach

{{-- Action Button --}}
@isset($actionText)
@php
    $color = 'success'; // hijau TaniDieng
@endphp

<div style="text-align:center; margin: 25px 0;">
    <x-mail::button :url="$actionUrl" color="success" style="background:#007115;">
        {{ $actionText }}
    </x-mail::button>
</div>
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
<p style="color:#444; font-size:14px; margin-top:10px;">
    {{ $line }}
</p>
@endforeach

{{-- Regards --}}
@if (! empty($salutation))
{{ $salutation }}
@else
Salam hangat,<br>
<strong>{{ config('app.name') }}</strong>
@endif

</x-mail::panel>


{{-- Subcopy (Text Link) --}}
@isset($actionText)
<x-slot:subcopy>
<div style="font-size: 12px; color:#555; margin-top:10px;">
    Jika tombol tidak bisa diklik, kamu bisa buka link ini secara manual:<br>
    <a href="{{ $actionUrl }}" style="color:#0F5529; word-break: break-all;">
        {{ $displayableActionUrl }}
    </a>
</div>
</x-slot:subcopy>
@endisset

{{-- Footer --}}
<x-slot:footer>
    <div style="text-align:center; font-size:12px; color:#888;">
        © {{ date('Y') }} {{ config('app.name') }}. Semua hak dilindungi.
    </div>
</x-slot:footer>

</x-mail::layout>
