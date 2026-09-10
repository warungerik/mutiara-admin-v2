@extends('layouts.admin')

@section('title', 'Pengaturan')
@section('page_title', 'Pengaturan')

@section('content')
<div class="max-w-5xl mx-auto space-y-6" data-motion="fade-up">

    <div>
        <h1 class="text-xl md:text-2xl font-bold tracking-tight text-slate-900 dark:text-white">Pengaturan</h1>
    </div>

    <div class="border-b border-slate-200 dark:border-slate-800">
        <nav class="flex space-x-6 overflow-x-auto text-xs font-medium" aria-label="Tabs">
            <button type="button" onclick="switchTab('general')" id="tab-btn-general"
                class="tab-btn py-3 px-1 border-b-2 border-indigo-600 text-indigo-600 dark:text-indigo-400 font-semibold whitespace-nowrap">
                Profil
            </button>
            <button type="button" onclick="switchTab('security')" id="tab-btn-security"
                class="tab-btn py-3 px-1 border-b-2 border-transparent text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-200 whitespace-nowrap">
                Keamanan
            </button>
            <button type="button" onclick="switchTab('notifications')" id="tab-btn-notifications"
                class="tab-btn py-3 px-1 border-b-2 border-transparent text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-200 whitespace-nowrap">
                Notifikasi
            </button>
            <button type="button" onclick="switchTab('system')" id="tab-btn-system"
                class="tab-btn py-3 px-1 border-b-2 border-transparent text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-200 whitespace-nowrap">
                Sistem
            </button>
        </nav>
    </div>

    <div id="tab-content-general" class="tab-pane space-y-6">
        <div class="p-5 md:p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs space-y-5">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 rounded-2xl bg-indigo-600 text-white font-bold text-xl flex items-center justify-center shadow-md">
                    SA
                </div>
                <div>
                    <h2 class="text-sm font-semibold text-slate-900 dark:text-white">Foto Profil</h2>
                    <p class="text-xs text-slate-400 mt-0.5">PNG atau JPG, maks. 2MB.</p>
                    <div class="flex items-center gap-2 mt-2">
                        <button type="button" class="px-3 py-1.5 rounded-lg text-xs font-medium bg-slate-100 hover:bg-slate-200 dark:bg-slate-800 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300">
                            Ganti
                        </button>
                        <button type="button" class="px-3 py-1.5 rounded-lg text-xs font-medium text-rose-600 hover:bg-rose-50 dark:hover:bg-rose-950/50">
                            Hapus
                        </button>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-4 border-t border-slate-100 dark:border-slate-800">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Nama</label>
                    <input type="text" value="Super Admin" class="w-full px-3.5 py-2 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white border border-slate-200 dark:border-slate-700 focus:outline-hidden focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Email</label>
                    <input type="email" value="admin@mutiara.io" class="w-full px-3.5 py-2 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white border border-slate-200 dark:border-slate-700 focus:outline-hidden focus:border-indigo-500">
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Bio</label>
                    <textarea rows="3" class="w-full px-3.5 py-2 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white border border-slate-200 dark:border-slate-700 focus:outline-hidden focus:border-indigo-500">Administrator MUTIARA ADMIN V2.</textarea>
                </div>
            </div>
            
            <div class="flex justify-end pt-3">
                <button type="button" onclick="showToast('Profil berhasil disimpan.', 'success')" class="px-4 py-2 rounded-xl text-xs font-semibold bg-indigo-600 hover:bg-indigo-700 text-white shadow-xs">
                    Simpan
                </button>
            </div>
        </div>
    </div>

    <div id="tab-content-security" class="tab-pane hidden space-y-6">
        <div class="p-5 md:p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs space-y-4">
            <h2 class="text-sm font-semibold text-slate-900 dark:text-white">Ubah Sandi</h2>
            <div class="space-y-3 max-w-md">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1">Sandi Saat Ini</label>
                    <input type="password" placeholder="••••••••" class="w-full px-3.5 py-2 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white border border-slate-200 dark:border-slate-700 focus:outline-hidden focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1">Sandi Baru</label>
                    <input type="password" placeholder="Minimal 8 karakter" class="w-full px-3.5 py-2 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white border border-slate-200 dark:border-slate-700 focus:outline-hidden focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1">Ulangi Sandi Baru</label>
                    <input type="password" class="w-full px-3.5 py-2 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white border border-slate-200 dark:border-slate-700 focus:outline-hidden focus:border-indigo-500">
                </div>
                <button type="button" onclick="showToast('Sandi berhasil diperbarui.', 'success')" class="px-4 py-2 rounded-xl text-xs font-semibold bg-indigo-600 hover:bg-indigo-700 text-white shadow-xs">
                    Perbarui Sandi
                </button>
            </div>
        </div>
    </div>

    <div id="tab-content-notifications" class="tab-pane hidden space-y-6">
        <div class="p-5 md:p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs space-y-4">
            <h2 class="text-sm font-semibold text-slate-900 dark:text-white">Email Notifikasi</h2>
            <div class="space-y-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-xs font-semibold text-slate-800 dark:text-slate-200">Email Transaksi</p>
                        <p class="text-[11px] text-slate-400">Kirim notifikasi untuk setiap order baru.</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" checked class="sr-only peer">
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-hidden rounded-full peer dark:bg-slate-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-slate-600 peer-checked:bg-indigo-600"></div>
                    </label>
                </div>
                <div class="flex items-center justify-between pt-3 border-t border-slate-100 dark:border-slate-800">
                    <div>
                        <p class="text-xs font-semibold text-slate-800 dark:text-slate-200">Laporan Mingguan</p>
                        <p class="text-[11px] text-slate-400">Ringkasan mingguan setiap Senin.</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" checked class="sr-only peer">
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-hidden rounded-full peer dark:bg-slate-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-slate-600 peer-checked:bg-indigo-600"></div>
                    </label>
                </div>
            </div>
        </div>
    </div>

    <div id="tab-content-system" class="tab-pane hidden space-y-6">
        <div class="p-5 md:p-6 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs space-y-4">
            <h2 class="text-sm font-semibold text-slate-900 dark:text-white">Lokalisasi</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1">Zona Waktu</label>
                    <select class="w-full px-3.5 py-2 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-700 focus:outline-hidden focus:border-indigo-500">
                        <option value="Asia/Jakarta">Asia/Jakarta (WIB)</option>
                        <option value="Asia/Makassar">Asia/Makassar (WITA)</option>
                        <option value="Asia/Jayapura">Asia/Jayapura (WIT)</option>
                        <option value="UTC">UTC</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1">Mata Uang</label>
                    <select class="w-full px-3.5 py-2 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-700 focus:outline-hidden focus:border-indigo-500">
                        <option value="IDR">IDR (Rp)</option>
                        <option value="USD">USD ($)</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@push('scripts')
<script>
    function switchTab(tabId) {
        document.querySelectorAll('.tab-pane').forEach(pane => pane.classList.add('hidden'));
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.classList.remove('border-indigo-600', 'text-indigo-600', 'dark:text-indigo-400', 'font-semibold');
            btn.classList.add('border-transparent', 'text-slate-500', 'dark:text-slate-400');
        });

        const activePane = document.getElementById('tab-content-' + tabId);
        const activeBtn = document.getElementById('tab-btn-' + tabId);
        if (activePane) {
            activePane.classList.remove('hidden');
            if (window.motionAnimate) {
                window.motionAnimate(activePane, { opacity: [0, 1], y: [10, 0] }, { duration: 0.25, easing: [0.16, 1, 0.3, 1] });
            }
        }
        if (activeBtn) {
            activeBtn.classList.add('border-indigo-600', 'text-indigo-600', 'dark:text-indigo-400', 'font-semibold');
            activeBtn.classList.remove('border-transparent', 'text-slate-500', 'dark:text-slate-400');
        }
    }
</script>
@endpush
