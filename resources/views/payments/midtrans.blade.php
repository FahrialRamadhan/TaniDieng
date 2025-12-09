<x-app-layout>
    <div class="min-h-screen bg-[#0F5529] flex items-center justify-center px-4">
        <div class="bg-white/10 border border-white/20 rounded-2xl px-8 py-10 max-w-md w-full text-center shadow-lg">
            <h1 class="text-lg md:text-xl font-semibold text-white mb-2">
                Pembayaran Pesanan {{ $orderId }}
            </h1>
            <p class="text-sm text-white/80 mb-6">
                Total yang harus dibayar:
                <span class="font-semibold">
                    Rp {{ number_format($total, 0, ',', '.') }}
                </span>
            </p>

            <button id="pay-button"
                class="w-full py-3 rounded-full bg-emerald-500 hover:bg-emerald-600 text-white font-semibold text-sm md:text-base transition">
                Bayar Sekarang
            </button>

            <p class="mt-4 text-xs text-white/70">
                Kamu akan diarahkan ke halaman pembayaran Midtrans.
            </p>
        </div>
    </div>

    {{-- SNAP JS (SANDBOX) --}}
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="Mid-client-KZfkbNSwfaS****">
        <!-- ganti dengan client key sandbox-mu 
        -->
    </script>

    <script>
        document.getElementById('pay-button').addEventListener('click', function() {
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    // pembayaran sukses
                    window.location.href = "{{ route('home.logged') }}?payment=success";
                },
                onPending: function(result) {
                    // masih pending
                    window.location.href = "{{ route('home.logged') }}?payment=pending";
                },
                onError: function(result) {
                    console.error(result);
                    alert('Transaksi gagal, silakan coba lagi.');
                },
                onClose: function() {
                    alert('Kamu menutup jendela pembayaran sebelum selesai.');
                }
            });
        });
    </script>
</x-app-layout>
