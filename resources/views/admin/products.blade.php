@extends('layouts.admin')

@section('title', 'Katalog Produk')
@section('page_title', 'Katalog Produk')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4" data-motion="fade-up">
        <div>
            <h1 class="text-xl md:text-2xl font-bold tracking-tight text-slate-900 dark:text-white">Katalog Produk & Lisensi</h1>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Kelola daftar item digital, harga, alokasi inventaris, dan status ketersediaan.</p>
        </div>
        <div class="flex items-center gap-2.5">
            <button type="button" onclick="showToast('Formulir tambah produk siap diisi!', 'info')" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-semibold bg-indigo-600 hover:bg-indigo-700 text-white shadow-xs transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                <span>Tambah Produk</span>
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4" data-motion="stagger-container">
        @foreach($metrics as $metric)
            <div data-motion="stagger-item" class="p-5 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs">
                <span class="text-xs font-medium text-slate-500 dark:text-slate-400">{{ $metric['title'] }}</span>
                <div class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white mt-1.5">{{ $metric['value'] }}</div>
                <p class="text-[11px] text-slate-400 dark:text-slate-500 mt-1">{{ $metric['sub'] }}</p>
            </div>
        @endforeach
    </div>

    <div data-motion="fade-up" class="rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs overflow-hidden">
        
        <div class="p-4 md:p-5 border-b border-slate-100 dark:border-slate-800 flex flex-col sm:flex-row items-stretch sm:items-center justify-between gap-3">
            <div class="relative flex-1 max-w-md">
                <input id="product-search" type="text" placeholder="Cari SKU, nama produk, kategori..."
                    class="w-full pl-9 pr-4 py-2 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400 border border-slate-200 dark:border-slate-700 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 focus:outline-hidden transition-all">
                <svg class="absolute left-3 top-2.5 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>

            <div class="flex items-center gap-2">
                <select id="category-filter" aria-label="Filter Kategori"
                    class="px-3 py-2 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-700 focus:outline-hidden focus:border-indigo-500">
                    <option value="">Semua Kategori</option>
                    <option value="Template Admin">Template Admin</option>
                    <option value="Cloud Hosting">Cloud Hosting</option>
                    <option value="Lisensi Software">Lisensi Software</option>
                    <option value="Addon & Plugin">Addon & Plugin</option>
                    <option value="Layanan Khusus">Layanan Khusus</option>
                    <option value="Design Asset">Design Asset</option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse" id="products-table">
                <thead>
                    <tr class="border-b border-slate-200/60 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-800/30 text-[11px] font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                        <th class="py-3 px-4">Item & SKU</th>
                        <th class="py-3 px-4">Kategori</th>
                        <th class="py-3 px-4 text-right">Harga</th>
                        <th class="py-3 px-4 text-center">Stok</th>
                        <th class="py-3 px-4 text-center">Terjual</th>
                        <th class="py-3 px-4 text-center">Status</th>
                        <th class="py-3 px-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800 text-xs">
                    @foreach($products as $product)
                        <tr class="product-row hover:bg-slate-50/80 dark:hover:bg-slate-800/40 transition-colors" data-category="{{ $product['category'] }}">
                            <td class="py-3.5 px-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-xl bg-indigo-50 dark:bg-indigo-950/60 text-indigo-600 dark:text-indigo-400 flex items-center justify-center font-bold text-xs shrink-0">
                                        {{ substr($product['name'], 0, 2) }}
                                    </div>
                                    <div>
                                        <span class="font-semibold text-slate-900 dark:text-white block">{{ $product['name'] }}</span>
                                        <span class="font-mono text-[11px] text-slate-400">{{ $product['sku'] }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="py-3.5 px-4 text-slate-600 dark:text-slate-300">
                                <span class="px-2.5 py-1 rounded-lg text-[11px] font-medium bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400">
                                    {{ $product['category'] }}
                                </span>
                            </td>
                            <td class="py-3.5 px-4 text-right font-bold text-slate-900 dark:text-white">
                                {{ $product['price'] }}
                            </td>
                            <td class="py-3.5 px-4 text-center">
                                @if($product['stock'] > 10)
                                    <span class="font-semibold text-slate-700 dark:text-slate-300">{{ $product['stock'] }} unit</span>
                                @elseif($product['stock'] > 0)
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-amber-50 text-amber-600 dark:bg-amber-950/50 dark:text-amber-400">
                                        {{ $product['stock'] }} unit
                                    </span>
                                @else
                                    <span class="px-2 py-0.5 rounded-full text-[10px] font-bold bg-rose-50 text-rose-600 dark:bg-rose-950/50 dark:text-rose-400">
                                        Habis
                                    </span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-center text-slate-600 dark:text-slate-400">
                                {{ $product['sales'] }}
                            </td>
                            <td class="py-3.5 px-4 text-center">
                                @if($product['status'] === 'Active')
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 text-[11px] font-semibold rounded-full bg-emerald-50 text-emerald-600 dark:bg-emerald-950/50 dark:text-emerald-400">
                                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Aktif
                                    </span>
                                @elseif($product['status'] === 'Low Stock')
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 text-[11px] font-semibold rounded-full bg-amber-50 text-amber-600 dark:bg-amber-950/50 dark:text-amber-400">
                                        <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Menipis
                                    </span>
                                @else
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 text-[11px] font-semibold rounded-full bg-slate-100 text-slate-500 dark:bg-slate-800 dark:text-slate-400">
                                        <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Kosong
                                    </span>
                                @endif
                            </td>
                            <td class="py-3.5 px-4 text-right">
                                <div class="flex items-center justify-end gap-1">
                                    <button type="button" title="Edit" aria-label="Edit Produk" class="p-1.5 text-slate-400 hover:text-indigo-600 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" /></svg>
                                    </button>
                                    <button type="button" title="Hapus" aria-label="Hapus Produk" class="p-1.5 text-slate-400 hover:text-rose-600 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-slate-100 dark:border-slate-800 flex items-center justify-between text-xs text-slate-500">
            <span>Menampilkan <strong>{{ count($products) }}</strong> produk</span>
            <span class="text-[11px] text-slate-400">Pembaruan katalog tersinkron otomatis</span>
        </div>
    </div>

</div>

@push('scripts')
<script>
    const prodSearch = document.getElementById('product-search');
    const catFilter = document.getElementById('category-filter');
    const prodRows = document.querySelectorAll('.product-row');

    function filterProducts() {
        const query = prodSearch.value.toLowerCase();
        const category = catFilter.value;
        prodRows.forEach(row => {
            const text = row.innerText.toLowerCase();
            const rowCat = row.getAttribute('data-category');
            const matchesQuery = text.includes(query);
            const matchesCat = !category || rowCat === category;
            row.style.display = matchesQuery && matchesCat ? '' : 'none';
        });
    }

    prodSearch.addEventListener('input', filterProducts);
    catFilter.addEventListener('change', filterProducts);
</script>
@endpush
@endsection
