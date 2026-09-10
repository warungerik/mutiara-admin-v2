@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4" data-motion="fade-up">
        <div>
            <h1 class="text-xl md:text-2xl font-bold tracking-tight text-slate-900 dark:text-white">Dashboard</h1>
        </div>
        <div class="flex items-center gap-2.5">
            <button type="button" class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl text-xs font-medium bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700/50 shadow-xs">
                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
                <span>Unduh Laporan</span>
            </button>
            <a href="{{ route('admin.users.create') }}" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl text-xs font-semibold bg-indigo-600 hover:bg-indigo-700 text-white shadow-xs">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" /></svg>
                <span>Tambah Pengguna</span>
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        @foreach ($metrics as $metric)
            <div data-motion="stagger-item" class="p-5 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs hover:scale-[1.02] transition-transform duration-200">
                <div class="flex items-center justify-between">
                    <span class="text-xs font-medium text-slate-500 dark:text-slate-400">{{ $metric['title'] }}</span>
                    <div class="w-8 h-8 rounded-xl flex items-center justify-center 
                        {{ $metric['color'] === 'indigo' ? 'bg-indigo-50 text-indigo-600 dark:bg-indigo-950/50 dark:text-indigo-400' : '' }}
                        {{ $metric['color'] === 'emerald' ? 'bg-emerald-50 text-emerald-600 dark:bg-emerald-950/50 dark:text-emerald-400' : '' }}
                        {{ $metric['color'] === 'amber' ? 'bg-amber-50 text-amber-600 dark:bg-amber-950/50 dark:text-amber-400' : '' }}
                        {{ $metric['color'] === 'sky' ? 'bg-sky-50 text-sky-600 dark:bg-sky-950/50 dark:text-sky-400' : '' }}">
                        @if ($metric['icon'] === 'currency')
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        @elseif ($metric['icon'] === 'users')
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                        @elseif ($metric['icon'] === 'shopping-cart')
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" /></svg>
                        @else
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" /></svg>
                        @endif
                    </div>
                </div>
                
                <div class="mt-3">
                    <span class="text-xl md:text-2xl font-bold tracking-tight text-slate-900 dark:text-white">{{ $metric['value'] }}</span>
                </div>

                <div class="mt-2 flex items-center gap-1.5 text-xs">
                    @if ($metric['trend'] === 'up')
                        <span class="inline-flex items-center text-emerald-600 dark:text-emerald-400 font-semibold">
                            <svg class="w-3 h-3 mr-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" /></svg>
                            {{ $metric['change'] }}
                        </span>
                    @else
                        <span class="inline-flex items-center text-rose-600 dark:text-rose-400 font-semibold">
                            <svg class="w-3 h-3 mr-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" /></svg>
                            {{ $metric['change'] }}
                        </span>
                    @endif
                    <span class="text-slate-400">{{ $metric['period'] }}</span>
                </div>
            </div>
        @endforeach
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div data-motion="fade-up" class="lg:col-span-2 p-5 md:p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs">
            <div class="flex items-center justify-between pb-4 border-b border-slate-100 dark:border-slate-800">
                <h2 class="text-sm font-semibold text-slate-900 dark:text-white">Pendapatan Mingguan</h2>
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center gap-1.5 text-xs text-slate-600 dark:text-slate-300">
                        <span class="w-2.5 h-2.5 rounded-full bg-indigo-600"></span> Volume
                    </span>
                </div>
            </div>

            <div class="mt-6 h-56 flex items-end justify-between gap-2 md:gap-6 px-2">
                @foreach ($chartPoints as $point)
                    <div class="flex-1 flex flex-col items-center gap-2 h-full justify-end group">
                        <div class="opacity-0 group-hover:opacity-100 transition-opacity text-[10px] font-semibold py-0.5 px-1.5 rounded-md bg-slate-900 text-white dark:bg-white dark:text-slate-900 pointer-events-none mb-1">
                            {{ $point['val'] }}%
                        </div>
                        <div class="w-full max-w-[40px] bg-indigo-100 dark:bg-slate-800 rounded-t-xl group-hover:bg-indigo-600 dark:group-hover:bg-indigo-500 transition-all duration-300 relative overflow-hidden" style="height: {{ $point['height'] }}">
                            <div data-motion="chart-bar" data-height="{{ $point['height'] }}" class="absolute inset-x-0 bottom-0 bg-indigo-600 dark:bg-indigo-500 opacity-90 h-full rounded-t-xl"></div>
                        </div>
                        <span class="text-xs font-medium text-slate-500 dark:text-slate-400 group-hover:text-indigo-600 dark:group-hover:text-indigo-400">
                            {{ $point['day'] }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>

        <div data-motion="fade-up" class="p-5 md:p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs flex flex-col justify-between">
            <div>
                <div class="flex items-center justify-between">
                    <h2 class="text-sm font-semibold text-slate-900 dark:text-white">Target Bulanan</h2>
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-semibold bg-emerald-50 text-emerald-600 dark:bg-emerald-950/60 dark:text-emerald-400">On Track</span>
                </div>
                
                <div class="mt-6 text-center">
                    <div class="inline-flex items-center justify-center p-6 rounded-full bg-slate-50 dark:bg-slate-800/50 border border-slate-100 dark:border-slate-700/60">
                        <span class="text-3xl font-extrabold text-indigo-600 dark:text-indigo-400">78%</span>
                    </div>
                    <p class="text-xs font-medium text-slate-700 dark:text-slate-300 mt-3">Rp 142.850.000 / Rp 180.000.000</p>
                </div>
            </div>

            <div class="mt-6 pt-4 border-t border-slate-100 dark:border-slate-800 space-y-2 text-xs">
                <div class="flex justify-between text-slate-600 dark:text-slate-400">
                    <span>Sisa:</span>
                    <strong class="text-slate-900 dark:text-white">20 Hari</strong>
                </div>
                <div class="flex justify-between text-slate-600 dark:text-slate-400">
                    <span>Target Harian:</span>
                    <strong class="text-slate-900 dark:text-white">Rp 1.850.000</strong>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div data-motion="fade-up" class="lg:col-span-2 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs overflow-hidden">
            <div class="flex items-center justify-between p-5 border-b border-slate-100 dark:border-slate-800">
                <h2 class="text-sm font-semibold text-slate-900 dark:text-white">Pesanan Terbaru</h2>
                <a href="{{ route('admin.users.index') }}" class="text-xs font-semibold text-indigo-600 dark:text-indigo-400 hover:underline">
                    Semua
                </a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left text-xs">
                    <thead class="bg-slate-50/75 dark:bg-slate-800/50 text-slate-500 dark:text-slate-400 uppercase tracking-wider font-semibold border-b border-slate-100 dark:border-slate-800">
                        <tr>
                            <th scope="col" class="px-5 py-3">Invoice</th>
                            <th scope="col" class="px-5 py-3">Pelanggan</th>
                            <th scope="col" class="px-5 py-3 hidden md:table-cell">Layanan</th>
                            <th scope="col" class="px-5 py-3">Nominal</th>
                            <th scope="col" class="px-5 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-800 text-slate-700 dark:text-slate-300">
                        @foreach ($recentOrders as $order)
                            <tr class="hover:bg-slate-50/60 dark:hover:bg-slate-800/40 transition-colors">
                                <td class="px-5 py-3.5 font-medium text-slate-900 dark:text-white whitespace-nowrap">{{ $order['code'] }}</td>
                                <td class="px-5 py-3.5">
                                    <div class="font-medium text-slate-900 dark:text-slate-100">{{ $order['customer'] }}</div>
                                    <div class="text-[11px] text-slate-400">{{ $order['email'] }}</div>
                                </td>
                                <td class="px-5 py-3.5 hidden md:table-cell text-slate-600 dark:text-slate-400">{{ $order['item'] }}</td>
                                <td class="px-5 py-3.5 font-semibold text-slate-900 dark:text-white whitespace-nowrap">{{ $order['amount'] }}</td>
                                <td class="px-5 py-3.5 whitespace-nowrap">
                                    @if ($order['status'] === 'Success')
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[11px] font-medium bg-emerald-50 text-emerald-700 dark:bg-emerald-950/60 dark:text-emerald-400 border border-emerald-200/60 dark:border-emerald-800/40">Sukses</span>
                                    @elseif ($order['status'] === 'Pending')
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[11px] font-medium bg-amber-50 text-amber-700 dark:bg-amber-950/60 dark:text-amber-400 border border-amber-200/60 dark:border-amber-800/40">Menunggu</span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[11px] font-medium bg-rose-50 text-rose-700 dark:bg-rose-950/60 dark:text-rose-400 border border-rose-200/60 dark:border-rose-800/40">Gagal</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div data-motion="fade-up" class="p-5 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs">
            <div class="flex items-center justify-between pb-4 border-b border-slate-100 dark:border-slate-800">
                <h2 class="text-sm font-semibold text-slate-900 dark:text-white">Aktivitas</h2>
            </div>

            <div class="mt-4 space-y-4">
                @foreach ($activities as $act)
                    <div class="flex items-start gap-3">
                        <div class="w-2 h-2 mt-1.5 rounded-full bg-indigo-500 shrink-0"></div>
                        <div class="flex-1 min-w-0">
                            <p class="text-xs text-slate-800 dark:text-slate-200">
                                <strong class="font-semibold text-slate-900 dark:text-white">{{ $act['user'] }}</strong>
                                <span>{{ $act['action'] }}</span>
                            </p>
                            <div class="flex items-center gap-2 mt-1">
                                <span class="text-[10px] text-slate-400">{{ $act['time'] }}</span>
                                <span class="text-[10px] px-1.5 py-0.2 rounded bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 font-mono">{{ $act['badge'] }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection
