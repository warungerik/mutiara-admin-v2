@extends('layouts.admin')

@section('title', 'Analytics & Laporan')
@section('page_title', 'Analytics & Laporan')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4" data-motion="fade-up">
        <div>
            <h1 class="text-xl md:text-2xl font-bold tracking-tight text-slate-900 dark:text-white">Analytics & Laporan</h1>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Pantau performa trafik, retensi pengunjung, dan konversi real-time.</p>
        </div>
        <div class="flex items-center gap-2.5">
            <select aria-label="Rentang Waktu" class="px-3.5 py-2 rounded-xl text-xs font-medium bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 border border-slate-200 dark:border-slate-700 shadow-xs focus:outline-hidden focus:border-indigo-500">
                <option value="30d">30 Hari Terakhir</option>
                <option value="7d">7 Hari Terakhir</option>
                <option value="24h">24 Jam Terakhir</option>
                <option value="1y">Tahun Berjalan (2026)</option>
            </select>
            <button type="button" class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl text-xs font-semibold bg-indigo-600 hover:bg-indigo-700 text-white shadow-xs transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
                <span>Unduh Laporan</span>
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-5" data-motion="stagger-container">
        @foreach($stats as $stat)
            <div data-motion="stagger-item" class="p-5 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs transition-all hover:shadow-md">
                <div class="flex items-center justify-between mb-3">
                    <span class="text-xs font-medium text-slate-500 dark:text-slate-400">{{ $stat['title'] }}</span>
                    <span class="inline-flex items-center gap-1 text-[11px] font-semibold px-2 py-0.5 rounded-full {{ $stat['trend'] === 'up' ? 'bg-emerald-50 text-emerald-600 dark:bg-emerald-950/50 dark:text-emerald-400' : 'bg-rose-50 text-rose-600 dark:bg-rose-950/50 dark:text-rose-400' }}">
                        @if($stat['trend'] === 'up')
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" /></svg>
                        @else
                            <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" /></svg>
                        @endif
                        {{ $stat['change'] }}
                    </span>
                </div>
                <div class="text-2xl font-bold tracking-tight text-slate-900 dark:text-white">{{ $stat['value'] }}</div>
                <p class="text-[11px] text-slate-400 dark:text-slate-500 mt-1.5">{{ $stat['period'] }}</p>
            </div>
        @endforeach
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6" data-motion="fade-up">
        
        <div class="lg:col-span-2 p-5 md:p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-sm font-bold text-slate-900 dark:text-white">Tren Kunjungan Mingguan</h2>
                    <p class="text-xs text-slate-500 dark:text-slate-400">Total volume sesi pengunjung aktif per hari</p>
                </div>
                <div class="flex items-center gap-3 text-xs">
                    <span class="flex items-center gap-1.5 text-slate-600 dark:text-slate-300">
                        <span class="w-2.5 h-2.5 rounded-full bg-indigo-600"></span> Unik
                    </span>
                    <span class="flex items-center gap-1.5 text-slate-600 dark:text-slate-300">
                        <span class="w-2.5 h-2.5 rounded-full bg-slate-300 dark:bg-slate-700"></span> Total
                    </span>
                </div>
            </div>

            <div class="h-56 flex items-end justify-between gap-3 pt-6 border-b border-slate-100 dark:border-slate-800">
                @php
                    $chartData = [
                        ['day' => 'Sen', 'val' => 45, 'total' => 65],
                        ['day' => 'Sel', 'val' => 60, 'total' => 80],
                        ['day' => 'Rab', 'val' => 52, 'total' => 74],
                        ['day' => 'Kam', 'val' => 85, 'total' => 95],
                        ['day' => 'Jum', 'val' => 70, 'total' => 88],
                        ['day' => 'Sab', 'val' => 92, 'total' => 100],
                        ['day' => 'Min', 'val' => 65, 'total' => 82],
                    ];
                @endphp
                @foreach($chartData as $bar)
                    <div class="flex-1 flex flex-col items-center gap-2 group h-full justify-end">
                        <div class="w-full max-w-[36px] flex items-end gap-1 h-full">
                            <div class="w-1/2 bg-indigo-600 rounded-t-md transition-all duration-500 group-hover:bg-indigo-500" style="height: {{ $bar['val'] }}%;"></div>
                            <div class="w-1/2 bg-slate-200 dark:bg-slate-700 rounded-t-md transition-all duration-500 group-hover:bg-slate-300 dark:group-hover:bg-slate-600" style="height: {{ $bar['total'] }}%;"></div>
                        </div>
                        <span class="text-[11px] font-medium text-slate-500 dark:text-slate-400">{{ $bar['day'] }}</span>
                    </div>
                @endforeach
            </div>

            <div class="grid grid-cols-3 gap-4 pt-4 mt-2 text-center">
                <div>
                    <span class="text-[11px] text-slate-400 block">Puncak Trafik</span>
                    <span class="text-xs font-bold text-slate-800 dark:text-slate-200">Sabtu (92k Sesi)</span>
                </div>
                <div>
                    <span class="text-[11px] text-slate-400 block">Rata-rata Harian</span>
                    <span class="text-xs font-bold text-slate-800 dark:text-slate-200">26.417 / hari</span>
                </div>
                <div>
                    <span class="text-[11px] text-slate-400 block">Tingkat Retensi</span>
                    <span class="text-xs font-bold text-emerald-600 dark:text-emerald-400">68.2% Kembali</span>
                </div>
            </div>
        </div>

        <div class="p-5 md:p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs">
            <div class="mb-5">
                <h2 class="text-sm font-bold text-slate-900 dark:text-white">Sumber Trafik</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400">Distribusi asal pengunjung situs</p>
            </div>

            <div class="space-y-4">
                @foreach($trafficSources as $source)
                    <div>
                        <div class="flex items-center justify-between text-xs mb-1.5">
                            <span class="font-medium text-slate-700 dark:text-slate-300">{{ $source['name'] }}</span>
                            <span class="font-bold text-slate-900 dark:text-white">{{ $source['percentage'] }}% <span class="text-slate-400 font-normal">({{ $source['visitors'] }})</span></span>
                        </div>
                        <div class="w-full h-2 rounded-full bg-slate-100 dark:bg-slate-800 overflow-hidden">
                            <div class="h-full rounded-full {{ $source['color'] }}" style="width: {{ $source['percentage'] }}%;"></div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 pt-5 border-t border-slate-100 dark:border-slate-800">
                <h3 class="text-xs font-semibold text-slate-900 dark:text-white mb-3">Distribusi Perangkat</h3>
                <div class="grid grid-cols-3 gap-2 text-center">
                    <div class="p-2.5 rounded-xl bg-slate-50 dark:bg-slate-800/60">
                        <span class="text-[10px] text-slate-400 block">Desktop</span>
                        <span class="text-xs font-bold text-slate-800 dark:text-slate-200">62%</span>
                    </div>
                    <div class="p-2.5 rounded-xl bg-slate-50 dark:bg-slate-800/60">
                        <span class="text-[10px] text-slate-400 block">Mobile</span>
                        <span class="text-xs font-bold text-slate-800 dark:text-slate-200">33%</span>
                    </div>
                    <div class="p-2.5 rounded-xl bg-slate-50 dark:bg-slate-800/60">
                        <span class="text-[10px] text-slate-400 block">Tablet</span>
                        <span class="text-xs font-bold text-slate-800 dark:text-slate-200">5%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div data-motion="fade-up" class="rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs overflow-hidden">
        <div class="p-4 md:p-5 border-b border-slate-100 dark:border-slate-800 flex items-center justify-between">
            <div>
                <h2 class="text-sm font-bold text-slate-900 dark:text-white">Halaman Terpopuler</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400">Rincian performa tampilan halaman dan pengunjung unik</p>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-200/60 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-800/30 text-[11px] font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                        <th class="py-3 px-4">Halaman URL</th>
                        <th class="py-3 px-4">Judul Halaman</th>
                        <th class="py-3 px-4 text-right">Page Views</th>
                        <th class="py-3 px-4 text-right">Pengunjung Unik</th>
                        <th class="py-3 px-4 text-center">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-800 text-xs">
                    @foreach($topPages as $page)
                        <tr class="hover:bg-slate-50/80 dark:hover:bg-slate-800/40 transition-colors">
                            <td class="py-3 px-4 font-mono text-indigo-600 dark:text-indigo-400 font-medium">
                                {{ $page['path'] }}
                            </td>
                            <td class="py-3 px-4 text-slate-800 dark:text-slate-200 font-medium">
                                {{ $page['title'] }}
                            </td>
                            <td class="py-3 px-4 text-right font-semibold text-slate-900 dark:text-white">
                                {{ $page['views'] }}
                            </td>
                            <td class="py-3 px-4 text-right text-slate-600 dark:text-slate-400">
                                {{ $page['unique'] }}
                            </td>
                            <td class="py-3 px-4 text-center">
                                <span class="px-2 py-0.5 text-[10px] font-semibold rounded-full bg-emerald-50 text-emerald-600 dark:bg-emerald-950/50 dark:text-emerald-400">
                                    Stabil
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
