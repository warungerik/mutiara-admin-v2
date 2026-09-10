@extends('layouts.admin')

@section('title', 'Profil Saya')
@section('page_title', 'Profil Saya')

@section('content')
<div class="space-y-6">

    <div data-motion="fade-up" class="relative rounded-3xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs overflow-hidden">
        <div class="h-36 bg-linear-to-r from-indigo-600 via-indigo-700 to-slate-900 p-6 flex items-start justify-end">
            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-white/20 text-white backdrop-blur-md">
                Verified Account
            </span>
        </div>

        <div class="px-6 pb-6 pt-0 sm:flex sm:items-end sm:justify-between -mt-12 sm:-mt-14">
            <div class="sm:flex sm:items-center sm:gap-5">
                <div class="relative w-24 h-24 sm:w-28 sm:h-28 rounded-2xl bg-indigo-600 text-white text-3xl font-bold flex items-center justify-center border-4 border-white dark:border-slate-900 shadow-xl">
                    {{ $user['avatar_initials'] }}
                    <button type="button" title="Ganti Avatar" aria-label="Ganti Avatar" onclick="showToast('Pilih foto profil baru', 'info')" class="absolute -bottom-1 -right-1 p-2 rounded-xl bg-slate-900 text-white hover:bg-slate-800 shadow-md border-2 border-white dark:border-slate-900">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    </button>
                </div>
                <div class="mt-4 sm:mt-12">
                    <div class="flex items-center gap-2.5">
                        <h1 class="text-xl font-bold text-slate-900 dark:text-white">{{ $user['name'] }}</h1>
                        <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold bg-indigo-50 text-indigo-600 dark:bg-indigo-950/50 dark:text-indigo-400">
                            {{ $user['role'] }}
                        </span>
                    </div>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 flex items-center gap-3">
                        <span>{{ $user['email'] }}</span>
                        <span>•</span>
                        <span>Bergabung sejak {{ $user['joined'] }}</span>
                    </p>
                </div>
            </div>

            <div class="mt-4 sm:mt-0 flex gap-2">
                <a href="{{ route('admin.settings') }}" class="px-4 py-2 rounded-xl text-xs font-semibold bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 border border-slate-200 dark:border-slate-700 hover:bg-slate-50 shadow-xs">
                    Pengaturan
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6" data-motion="fade-up">
        
        <div class="lg:col-span-2 p-5 md:p-6 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs space-y-6">
            <div>
                <h2 class="text-sm font-bold text-slate-900 dark:text-white">Informasi Pribadi</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400">Perbarui identitas kontak dan profil publik Anda</p>
            </div>

            <form onsubmit="event.preventDefault(); showToast('Perubahan profil berhasil disimpan!', 'success');" class="space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="prof-name" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Nama Lengkap</label>
                        <input type="text" id="prof-name" value="{{ $user['name'] }}" required
                            class="w-full px-3.5 py-2.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white border border-slate-200 dark:border-slate-700 focus:border-indigo-500 focus:outline-hidden">
                    </div>
                    <div>
                        <label for="prof-email" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Alamat Email</label>
                        <input type="email" id="prof-email" value="{{ $user['email'] }}" required
                            class="w-full px-3.5 py-2.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white border border-slate-200 dark:border-slate-700 focus:border-indigo-500 focus:outline-hidden">
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="prof-phone" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Nomor Telepon / WhatsApp</label>
                        <input type="text" id="prof-phone" value="{{ $user['phone'] }}"
                            class="w-full px-3.5 py-2.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white border border-slate-200 dark:border-slate-700 focus:border-indigo-500 focus:outline-hidden">
                    </div>
                    <div>
                        <label for="prof-location" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Lokasi / Domisili</label>
                        <input type="text" id="prof-location" value="{{ $user['location'] }}"
                            class="w-full px-3.5 py-2.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white border border-slate-200 dark:border-slate-700 focus:border-indigo-500 focus:outline-hidden">
                    </div>
                </div>

                <div>
                    <label for="prof-bio" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Bio Singkat</label>
                    <textarea id="prof-bio" rows="3" class="w-full px-3.5 py-2.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white border border-slate-200 dark:border-slate-700 focus:border-indigo-500 focus:outline-hidden">{{ $user['bio'] }}</textarea>
                </div>

                <div class="pt-3 border-t border-slate-100 dark:border-slate-800 flex justify-end">
                    <button type="submit" class="px-4 py-2 text-xs font-semibold bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl shadow-xs transition-colors">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        <div class="space-y-6">
            
            <div class="p-5 md:p-6 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs">
                <h2 class="text-sm font-bold text-slate-900 dark:text-white mb-1">Ganti Kata Sandi</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400 mb-4">Pastikan sandi memiliki minimal 8 karakter acak</p>

                <form onsubmit="event.preventDefault(); showToast('Kata sandi berhasil diperbarui!', 'success');" class="space-y-3">
                    <div>
                        <label for="old-pass" class="block text-xs font-medium text-slate-600 dark:text-slate-300 mb-1">Sandi Lama</label>
                        <input type="password" id="old-pass" required placeholder="••••••••" class="w-full px-3.5 py-2 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 focus:outline-hidden focus:border-indigo-500">
                    </div>
                    <div>
                        <label for="new-pass" class="block text-xs font-medium text-slate-600 dark:text-slate-300 mb-1">Sandi Baru</label>
                        <input type="password" id="new-pass" required placeholder="••••••••" class="w-full px-3.5 py-2 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 focus:outline-hidden focus:border-indigo-500">
                    </div>
                    <button type="submit" class="w-full mt-2 py-2 px-3 text-xs font-semibold rounded-xl bg-slate-900 dark:bg-white text-white dark:text-slate-900 hover:opacity-90 transition-opacity">
                        Perbarui Sandi
                    </button>
                </form>
            </div>

            <div class="p-5 md:p-6 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-sm font-bold text-slate-900 dark:text-white">Sesi Login Aktif</h2>
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                </div>

                <div class="space-y-3 text-xs">
                    @foreach($sessions as $session)
                        <div class="p-3 rounded-2xl {{ $session['is_current'] ? 'bg-indigo-50/50 dark:bg-indigo-950/20 border border-indigo-100 dark:border-indigo-900/50' : 'bg-slate-50 dark:bg-slate-800/60' }}">
                            <div class="flex items-center justify-between mb-1">
                                <span class="font-semibold text-slate-900 dark:text-white">{{ $session['device'] }}</span>
                                @if($session['is_current'])
                                    <span class="text-[10px] font-bold text-indigo-600 dark:text-indigo-400">Saat ini</span>
                                @endif
                            </div>
                            <p class="text-[11px] text-slate-400 font-mono">{{ $session['ip'] }} • {{ $session['location'] }}</p>
                            <span class="text-[10px] text-slate-500 block mt-1">{{ $session['time'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
