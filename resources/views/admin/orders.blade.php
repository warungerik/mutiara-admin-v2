@extends('layouts.admin')

@section('title', 'Transaksi & Pesanan')
@section('page_title', 'Transaksi & Pesanan')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4" data-motion="fade-up">
        <div>
            <h1 class="text-xl md:text-2xl font-bold tracking-tight text-slate-900 dark:text-white">Transaksi & Pesanan</h1>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Kelola data tagihan, status pembayaran, dan riwayat pesanan.</p>
        </div>
        <div class="flex items-center gap-2.5">
            <button type="button" class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl text-xs font-medium bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700/50 shadow-xs">
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                <span>Ekspor CSV</span>
            </button>
            <button type="button" onclick="showToast('Sinkronisasi mutasi otomatis berhasil dijalankan!', 'success')" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-semibold bg-indigo-600 hover:bg-indigo-700 text-white shadow-xs">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg>
                <span>Sinkronkan Mutasi</span>
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4" data-motion="stagger-container">
        @foreach($metrics as $metric)
            <div data-motion="stagger-item" class="p-5 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs">
                <span class="text-xs font-medium text-slate-500 dark:text-slate-400">{{ $metric['title'] }}</span>
                <div class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white mt-2">{{ $metric['value'] }}</div>
                <span class="inline-flex items-center text-[11px] font-semibold text-slate-500 dark:text-slate-400 mt-1">
                    {{ $metric['change'] }}
                </span>
            </div>
        @endforeach
    </div>

    <div data-motion="fade-up" class="rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs overflow-hidden">
        
        <div class="p-4 md:p-5 border-b border-slate-100 dark:border-slate-800 flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3">
            <div class="relative flex-1 max-w-md">
                <input id="order-search" type="text" placeholder="Cari invoice, pelanggan, produk..."
                    class="w-full pl-9 pr-4 py-2 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400 border border-slate-200 dark:border-slate-700 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 focus:outline-hidden transition-all">
                <svg class="absolute left-3 top-2.5 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>

            <div class="flex items-center gap-2">
                <select id="status-order-filter" aria-label="Filter Status Pesanan"
                    class="px-3 py-2 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-700 focus:outline-hidden focus:border-indigo-500">
                    <option value="">Semua Status</option>
                    <option value="Success">Success (Lunas)</option>
                    <option value="Pending">Pending (Menunggu)</option>
                    <option value="Failed">Failed (Gagal)</option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse" id="orders-table">
                <thead>
                    <tr class="border-b border-slate-200/60 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-800/30 text-[11px] font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                        <th class="py-3 px-4">Invoice ID</th>
                        <th class="py-3 px-4">Pelanggan</th>
                        <th class="py-3 px-4">Produk / Layanan</th>
                        <th class="py-3 px-4 text-right">Nominal</th>
                        <th class="py-3 px-4">Metode Bayar</th>
                        <th class="py-3 px-4 text-center">Status</th>
                        <th class="py-3 px-4">Waktu</th>
                        <th class="py-3 px-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800 text-xs">
                    @foreach($orders as $order)
                        <tr class="order-row hover:bg-slate-50/80 dark:hover:bg-slate-800/40 transition-colors" data-status="{{ $order['status'] }}">
                            <td class="py-3.5 px-4 font-mono font-semibold text-indigo-600 dark:text-indigo-400">
                                {{ $order['id'] }}
                            </td>
                            <td class="py-3.5 px-4">
                                <span class="font-medium text-slate-900 dark:text-white block">{{ $order['customer'] }}</span>
                                <span class="text-[11px] text-slate-400">{{ $order['email'] }}</span>
                            </td>
                            <td class="py-3.5 px-4 text-slate-700 dark:text-slate-300 font-medium">
                                {{ $order['product'] }}
                            </td>
                            <td class="py-3.5 px-4 text-right font-bold text-slate-900 dark:text-white">
                                {{ $order['amount'] }}
                            </td>
                            <td class="py-3.5 px-4 text-slate-600 dark:text-slate-400 text-[11px]">
                                {{ $order['payment_method'] }}
                            </td>
                            <td class="py-3.5 px-4 text-center">
                                @if($order['status'] === 'Success')
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 text-[11px] font-semibold rounded-full bg-emerald-50 text-emerald-600 dark:bg-emerald-950/50 dark:text-emerald-400">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Lunas
                                    </span>
                                @elseif($order['status'] === 'Pending')
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 text-[11px] font-semibold rounded-full bg-amber-50 text-amber-600 dark:bg-amber-950/50 dark:text-amber-400">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Menunggu
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 text-[11px] font-semibold rounded-full bg-rose-50 text-rose-600 dark:bg-rose-950/50 dark:text-rose-400">
                                        <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span> Gagal
                                    </span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-slate-500 dark:text-slate-400 text-[11px]">
                                {{ $order['date'] }}
                            </td>
                            <td class="py-3.5 px-4 text-right">
                                <button type="button" onclick="openInvoiceModal('{{ $order['id'] }}', '{{ $order['customer'] }}', '{{ $order['amount'] }}', '{{ $order['status'] }}')"
                                    class="px-2.5 py-1 text-xs font-semibold text-indigo-600 dark:text-indigo-400 hover:bg-indigo-50 dark:hover:bg-indigo-950/40 rounded-lg transition-colors">
                                    Detail
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between text-xs text-slate-500">
            <span>Menampilkan <strong>{{ count($orders) }}</strong> dari <strong>1.284</strong> transaksi</span>
            <div class="flex items-center gap-1">
                <button type="button" class="px-2.5 py-1 rounded-lg border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800">Sebelumnya</button>
                <button type="button" class="px-2.5 py-1 rounded-lg bg-indigo-600 text-white font-semibold">1</button>
                <button type="button" class="px-2.5 py-1 rounded-lg border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800">2</button>
                <button type="button" class="px-2.5 py-1 rounded-lg border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-800">Berikutnya</button>
            </div>
        </div>
    </div>

</div>

<div id="invoice-modal" class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-slate-900/50 backdrop-blur-xs hidden">
    <div class="w-full max-w-md bg-white dark:bg-slate-900 rounded-3xl border border-slate-200 dark:border-slate-800 p-6 shadow-2xl">
        <div class="flex items-center justify-between pb-4 border-b border-slate-100 dark:border-slate-800 mb-4">
            <h3 class="text-sm font-bold text-slate-900 dark:text-white">Detail Transaksi</h3>
            <button type="button" onclick="closeInvoiceModal()" class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
        </div>
        <div class="space-y-3 text-xs">
            <div class="flex justify-between py-1">
                <span class="text-slate-400">Nomor Invoice:</span>
                <span id="modal-invoice-id" class="font-mono font-bold text-indigo-600"></span>
            </div>
            <div class="flex justify-between py-1">
                <span class="text-slate-400">Nama Pelanggan:</span>
                <span id="modal-customer" class="font-semibold text-slate-800 dark:text-slate-200"></span>
            </div>
            <div class="flex justify-between py-1">
                <span class="text-slate-400">Total Tagihan:</span>
                <span id="modal-amount" class="font-bold text-slate-900 dark:text-white"></span>
            </div>
            <div class="flex justify-between py-1">
                <span class="text-slate-400">Status Pembayaran:</span>
                <span id="modal-status" class="font-semibold"></span>
            </div>
        </div>
        <div class="mt-6 pt-4 border-t border-slate-100 dark:border-slate-800 flex justify-end gap-2">
            <button type="button" onclick="closeInvoiceModal()" class="px-4 py-2 text-xs font-semibold rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300">Tutup</button>
            <button type="button" onclick="window.print()" class="px-4 py-2 text-xs font-semibold rounded-xl bg-indigo-600 text-white">Cetak Bukti</button>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function openInvoiceModal(id, customer, amount, status) {
        document.getElementById('modal-invoice-id').innerText = id;
        document.getElementById('modal-customer').innerText = customer;
        document.getElementById('modal-amount').innerText = amount;
        document.getElementById('modal-status').innerText = status === 'Success' ? 'Lunas' : (status === 'Pending' ? 'Menunggu' : 'Gagal');
        document.getElementById('invoice-modal').classList.remove('hidden');
    }
    function closeInvoiceModal() {
        document.getElementById('invoice-modal').classList.add('hidden');
    }

    const searchInput = document.getElementById('order-search');
    const statusFilter = document.getElementById('status-order-filter');
    const rows = document.querySelectorAll('.order-row');

    function filterOrders() {
        const query = searchInput.value.toLowerCase();
        const status = statusFilter.value;
        rows.forEach(row => {
            const text = row.innerText.toLowerCase();
            const rowStatus = row.getAttribute('data-status');
            const matchesQuery = text.includes(query);
            const matchesStatus = !status || rowStatus === status;
            row.style.display = matchesQuery && matchesStatus ? '' : 'none';
        });
    }

    searchInput.addEventListener('input', filterOrders);
    statusFilter.addEventListener('change', filterOrders);
</script>
@endpush
@endsection
