<x-app-layout>
    <div class="min-h-screen bg-[#0F5529] py-10 px-4">
        <div class="max-w-5xl mx-auto">
            <h1 class="text-2xl font-semibold text-white mb-6">
                Riwayat Pesanan
            </h1>

            <div class="bg-white/10 border border-white/20 rounded-2xl p-6 shadow-lg">
                @if ($orders->isEmpty())
                    <p class="text-sm text-white/80">Kamu belum punya pesanan.</p>
                @else
                    <table class="w-full text-sm text-left text-white/90">
                        <thead class="border-b border-white/20 text-xs uppercase text-white/60">
                            <tr>
                                <th class="py-2">Kode</th>
                                <th class="py-2">Tanggal</th>
                                <th class="py-2">Total</th>
                                <th class="py-2">Metode</th>
                                <th class="py-2">Status</th>
                                <th class="py-2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                <tr class="border-b border-white/10">
                                    <td class="py-2">{{ $order->code }}</td>
                                    <td class="py-2">{{ $order->created_at->format('d M Y H:i') }}</td>
                                    <td class="py-2">Rp {{ number_format($order->total_amount, 0, ',', '.') }}</td>
                                    <td class="py-2">{{ strtoupper($order->payment_method) }}</td>
                                    <td class="py-2">
                                        {{ $order->status_label }}
                                    </td>
                                    <td class="py-2 text-right">
                                        <a href="{{ route('orders.show', $order) }}"
                                            class="text-xs text-emerald-300 hover:underline">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $orders->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
