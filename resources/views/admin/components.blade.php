@extends('layouts.admin')

@section('title', 'Komponen')
@section('page_title', 'Komponen')

@section('content')
<div class="space-y-6">

    <div data-motion="fade-up">
        <h1 class="text-xl md:text-2xl font-bold tracking-tight text-slate-900 dark:text-white">Komponen UI & Animasi</h1>
    </div>

    <div data-motion="stagger-item" class="p-5 md:p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs space-y-4">
        <h2 class="text-sm font-semibold text-slate-900 dark:text-white">Tombol</h2>
        <div class="flex flex-wrap gap-3 items-center">
            <button type="button" class="px-4 py-2 rounded-xl text-xs font-semibold bg-indigo-600 hover:bg-indigo-700 text-white shadow-xs">Primary</button>
            <button type="button" class="px-4 py-2 rounded-xl text-xs font-semibold bg-slate-100 hover:bg-slate-200 dark:bg-slate-800 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-200">Secondary</button>
            <button type="button" class="px-4 py-2 rounded-xl text-xs font-semibold border border-slate-300 dark:border-slate-700 text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800">Outline</button>
            <button type="button" class="px-4 py-2 rounded-xl text-xs font-semibold bg-emerald-600 hover:bg-emerald-700 text-white shadow-xs">Success</button>
            <button type="button" class="px-4 py-2 rounded-xl text-xs font-semibold bg-rose-600 hover:bg-rose-700 text-white shadow-xs">Danger</button>
            <button type="button" disabled class="px-4 py-2 rounded-xl text-xs font-semibold bg-indigo-500 text-white opacity-80 cursor-wait inline-flex items-center gap-2">
                <svg class="w-3.5 h-3.5 animate-spin" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path></svg>
                <span>Loading...</span>
            </button>
        </div>
    </div>

    <div data-motion="stagger-item" class="p-5 md:p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs space-y-4">
        <h2 class="text-sm font-semibold text-slate-900 dark:text-white">Status Badge</h2>
        <div class="flex flex-wrap gap-3 items-center">
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 dark:bg-emerald-950/60 dark:text-emerald-400 border border-emerald-200/60 dark:border-emerald-800/40">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span> Aktif
            </span>
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-amber-50 text-amber-700 dark:bg-amber-950/60 dark:text-amber-400 border border-amber-200/60 dark:border-amber-800/40">
                <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span> Menunggu
            </span>
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-rose-50 text-rose-700 dark:bg-rose-950/60 dark:text-rose-400 border border-rose-200/60 dark:border-rose-800/40">
                <span class="w-1.5 h-1.5 rounded-full bg-rose-500"></span> Ditolak
            </span>
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-700 dark:bg-slate-800 dark:text-slate-300">
                <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span> Draft
            </span>
        </div>
    </div>

    <div data-motion="stagger-item" class="p-5 md:p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs space-y-4">
        <h2 class="text-sm font-semibold text-slate-900 dark:text-white">SweetAlert2 Toast & Popup Interaktif</h2>
        <div class="flex flex-wrap gap-3">
            <button type="button" onclick="showToast('Data berhasil disimpan!', 'success')" class="px-4 py-2 rounded-xl text-xs font-semibold bg-emerald-600 hover:bg-emerald-700 text-white shadow-xs">
                Toast Sukses
            </button>
            <button type="button" onclick="showToast('Gagal memproses data!', 'error')" class="px-4 py-2 rounded-xl text-xs font-semibold bg-rose-600 hover:bg-rose-700 text-white shadow-xs">
                Toast Error
            </button>
            <button type="button" onclick="showToast('Pembaruan sistem dalam antrean.', 'info')" class="px-4 py-2 rounded-xl text-xs font-semibold bg-sky-600 hover:bg-sky-700 text-white shadow-xs">
                Toast Info
            </button>
            <button type="button" onclick="showConfirm('Hapus Data?', 'Data yang dihapus tidak dapat dipulihkan kembali.', 'Ya, Hapus Data').then(r => r.isConfirmed && showToast('Data berhasil dihapus.', 'success'))" class="px-4 py-2 rounded-xl text-xs font-semibold bg-slate-800 hover:bg-slate-700 dark:bg-slate-700 dark:hover:bg-slate-600 text-white">
                Buka Modal Konfirmasi
            </button>
            <button type="button" onclick="alert('Ini adalah notifikasi dialog SweetAlert2 berstandar tema!')" class="px-4 py-2 rounded-xl text-xs font-semibold bg-indigo-600 hover:bg-indigo-700 text-white shadow-xs">
                Popup Alert
            </button>
        </div>
    </div>

    <div data-motion="stagger-item" class="p-5 md:p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs space-y-4">
        <h2 class="text-sm font-semibold text-slate-900 dark:text-white">Skeleton Loader</h2>
        <div class="animate-pulse space-y-3 max-w-md">
            <div class="h-4 bg-slate-200 dark:bg-slate-800 rounded-md w-3/4"></div>
            <div class="h-3 bg-slate-200 dark:bg-slate-800 rounded-md w-1/2"></div>
            <div class="h-8 bg-slate-200 dark:bg-slate-800 rounded-xl w-full"></div>
        </div>
    </div>

</div>
@endsection
