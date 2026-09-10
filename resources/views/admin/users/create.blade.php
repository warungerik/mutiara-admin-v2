@extends('layouts.admin')

@section('title', 'Tambah Pengguna')
@section('page_title', 'Formulir')

@section('content')
<div class="max-w-5xl mx-auto space-y-6" data-motion="fade-up">

    <div class="flex items-center justify-between gap-4">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.users.index') }}" title="Kembali ke Daftar Pengguna"
                class="p-2.5 rounded-xl bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-slate-500 hover:text-indigo-600 hover:border-indigo-300 dark:hover:text-white dark:hover:border-indigo-800 transition-all shadow-xs cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
            </a>
            <div>
                <h1 class="text-xl md:text-2xl font-bold tracking-tight text-slate-900 dark:text-white">Tambah Pengguna Baru</h1>
                <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Lengkapi data di bawah untuk mendaftarkan akun pengguna baru ke sistem.</p>
            </div>
        </div>
    </div>

    <form id="create-user-form" action="{{ route('admin.users.store') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 items-start">

            <div class="lg:col-span-1 space-y-6 lg:sticky lg:top-20">
                <div data-motion="stagger-item" class="p-5 sm:p-6 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs space-y-4">
                    <h2 class="text-sm font-bold text-slate-900 dark:text-white">Foto Profil</h2>
                    
                    <div id="avatar-dropzone" class="border-2 border-dashed border-slate-300 dark:border-slate-700 hover:border-indigo-500 dark:hover:border-indigo-500 rounded-2xl p-6 text-center cursor-pointer transition-all bg-slate-50/50 dark:bg-slate-800/30">
                        <input type="file" id="avatar-input" name="avatar" accept="image/png,image/jpeg" class="hidden">
                        <div id="avatar-preview-wrapper" class="hidden mb-3">
                            <div id="avatar-preview-bg" class="w-24 h-24 rounded-2xl bg-cover bg-center mx-auto shadow-md" role="img" aria-label="Preview Avatar"></div>
                        </div>
                        <div id="avatar-placeholder">
                            <svg class="w-10 h-10 mx-auto text-slate-400 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" /></svg>
                            <p class="text-xs font-bold text-slate-700 dark:text-slate-200">Pilih Foto Profil</p>
                            <p class="text-[11px] text-slate-400 mt-1">PNG atau JPG, maks 2MB</p>
                        </div>
                    </div>
                </div>

                <div data-motion="stagger-item" class="p-5 rounded-3xl bg-slate-900 text-white dark:bg-slate-800 border border-slate-800 shadow-md space-y-3">
                    <h3 class="text-xs font-bold uppercase tracking-wider text-slate-400">Ringkasan Hak Akses</h3>
                    <div class="space-y-2 text-xs">
                        <div class="flex items-center justify-between">
                            <span class="text-slate-400">Role:</span>
                            <span id="summary-role" class="font-bold text-white">User</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-slate-400">Level Akses:</span>
                            <span id="summary-tier" class="font-bold text-white">Standar</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-slate-400">Status Akun:</span>
                            <span id="summary-status" class="font-bold text-emerald-400">Aktif</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 space-y-6">
                
                <div data-motion="stagger-item" class="p-5 sm:p-6 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs space-y-5">
                    <h2 class="text-sm font-bold text-slate-900 dark:text-white border-b border-slate-100 dark:border-slate-800 pb-3">Informasi Utama</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="name" class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">Nama Lengkap <span class="text-rose-500">*</span></label>
                            <input type="text" id="name" name="name" required placeholder="Masukkan nama lengkap"
                                class="w-full px-3.5 py-2.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400 border border-slate-200 dark:border-slate-700 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 focus:outline-hidden focus:ring-2 focus:ring-indigo-500/20 transition-all">
                        </div>

                        <div>
                            <label for="email" class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">Email Kantor <span class="text-rose-500">*</span></label>
                            <input type="email" id="email" name="email" required placeholder="nama@perusahaan.com"
                                class="w-full px-3.5 py-2.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400 border border-slate-200 dark:border-slate-700 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 focus:outline-hidden focus:ring-2 focus:ring-indigo-500/20 transition-all">
                        </div>

                        <div>
                            <label for="phone" class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">Nomor Telepon</label>
                            <input type="tel" id="phone" name="phone" placeholder="081234567890"
                                class="w-full px-3.5 py-2.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400 border border-slate-200 dark:border-slate-700 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 focus:outline-hidden focus:ring-2 focus:ring-indigo-500/20 transition-all">
                        </div>

                        <div>
                            <label for="join_date" class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">Tanggal Efektif</label>
                            <input type="date" id="join_date" name="join_date" value="{{ date('Y-m-d') }}"
                                class="w-full px-3.5 py-2.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-700 focus:border-indigo-500 focus:outline-hidden focus:ring-2 focus:ring-indigo-500/20 transition-all">
                        </div>
                    </div>
                </div>

                <div data-motion="stagger-item" class="p-5 sm:p-6 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs space-y-5">
                    <h2 class="text-sm font-bold text-slate-900 dark:text-white border-b border-slate-100 dark:border-slate-800 pb-3">Hak Akses & Role</h2>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="role" class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">Role Sistem <span class="text-rose-500">*</span></label>
                            <select id="role" name="role" required
                                class="w-full px-3.5 py-2.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-700 focus:border-indigo-500 focus:outline-hidden focus:ring-2 focus:ring-indigo-500/20 transition-all cursor-pointer">
                                <option value="User">User - Akses Terbatas</option>
                                <option value="Editor">Editor - Kelola Konten</option>
                                <option value="Manager">Manager - Kelola Divisi</option>
                                <option value="Super Admin">Super Admin - Akses Penuh</option>
                            </select>
                        </div>

                        <div>
                            <label for="department" class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">Departemen</label>
                            <select id="department" name="department"
                                class="w-full px-3.5 py-2.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-700 focus:border-indigo-500 focus:outline-hidden focus:ring-2 focus:ring-indigo-500/20 transition-all cursor-pointer">
                                <option value="IT">Divisi IT & Teknologi</option>
                                <option value="Finance">Divisi Keuangan</option>
                                <option value="Marketing">Divisi Pemasaran</option>
                                <option value="HR">Divisi SDM & Operasional</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-2.5">Level Keamanan Akses</label>
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <label class="tier-card flex items-center gap-3 p-3.5 rounded-2xl border-2 border-indigo-500 bg-indigo-50/50 dark:bg-indigo-950/30 cursor-pointer transition-all">
                                <input type="radio" name="security_tier" value="standard" checked class="w-4 h-4 text-indigo-600 focus:ring-indigo-500 cursor-pointer">
                                <div>
                                    <p class="text-xs font-bold text-slate-800 dark:text-slate-200">Standar</p>
                                    <p class="text-[10px] text-slate-500 dark:text-slate-400">Lihat & baca data</p>
                                </div>
                            </label>

                            <label class="tier-card flex items-center gap-3 p-3.5 rounded-2xl border-2 border-slate-200 dark:border-slate-700 cursor-pointer hover:border-indigo-300 dark:hover:border-indigo-800 transition-all">
                                <input type="radio" name="security_tier" value="advanced" class="w-4 h-4 text-indigo-600 focus:ring-indigo-500 cursor-pointer">
                                <div>
                                    <p class="text-xs font-bold text-slate-800 dark:text-slate-200">Lanjutan</p>
                                    <p class="text-[10px] text-slate-500 dark:text-slate-400">Edit & ekspor data</p>
                                </div>
                            </label>

                            <label class="tier-card flex items-center gap-3 p-3.5 rounded-2xl border-2 border-slate-200 dark:border-slate-700 cursor-pointer hover:border-indigo-300 dark:hover:border-indigo-800 transition-all">
                                <input type="radio" name="security_tier" value="full" class="w-4 h-4 text-indigo-600 focus:ring-indigo-500 cursor-pointer">
                                <div>
                                    <p class="text-xs font-bold text-slate-800 dark:text-slate-200">Penuh</p>
                                    <p class="text-[10px] text-slate-500 dark:text-slate-400">Kelola sistem penuh</p>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <div data-motion="stagger-item" class="p-5 sm:p-6 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs space-y-4">
                    <h2 class="text-sm font-bold text-slate-900 dark:text-white border-b border-slate-100 dark:border-slate-800 pb-3">Preferensi Akun</h2>

                    <div class="space-y-2">
                        <div class="flex items-center justify-between p-3 rounded-2xl hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <div>
                                <p class="text-xs font-bold text-slate-800 dark:text-slate-200">Aktifkan Akun Langsung</p>
                                <p class="text-[11px] text-slate-500 dark:text-slate-400">Pengguna dapat langsung login setelah dibuat.</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="is_active_toggle" name="is_active" checked class="sr-only peer">
                                <div class="w-11 h-6 bg-slate-200 peer-focus:outline-hidden rounded-full peer dark:bg-slate-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-slate-600 peer-checked:bg-indigo-600"></div>
                            </label>
                        </div>

                        <div class="flex items-center justify-between p-3 rounded-2xl hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <div>
                                <p class="text-xs font-bold text-slate-800 dark:text-slate-200">Kirim Email Undangan</p>
                                <p class="text-[11px] text-slate-500 dark:text-slate-400">Kirim tautan aktivasi otomatis ke email terdaftar.</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="send_welcome_email" checked class="sr-only peer">
                                <div class="w-11 h-6 bg-slate-200 peer-focus:outline-hidden rounded-full peer dark:bg-slate-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-slate-600 peer-checked:bg-indigo-600"></div>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-end gap-3 pt-2">
                    <a href="{{ route('admin.users.index') }}" class="px-5 py-3 sm:py-2.5 rounded-2xl sm:rounded-xl text-xs font-bold text-center text-slate-700 dark:text-slate-300 bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700 transition-all shadow-xs cursor-pointer">
                        Batalkan
                    </a>
                    <button type="submit" class="inline-flex items-center justify-center gap-2 px-6 py-3 sm:py-2.5 rounded-2xl sm:rounded-xl text-xs font-bold bg-indigo-600 hover:bg-indigo-700 text-white shadow-lg shadow-indigo-600/25 transition-all cursor-pointer">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                        <span>Simpan Pengguna</span>
                    </button>
                </div>
            </div>
        </div>

    </form>

</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const avatarDropzone = document.getElementById('avatar-dropzone');
        const avatarInput = document.getElementById('avatar-input');
        const previewWrapper = document.getElementById('avatar-preview-wrapper');
        const previewBg = document.getElementById('avatar-preview-bg');
        const placeholder = document.getElementById('avatar-placeholder');
        const roleSelect = document.getElementById('role');
        const summaryRole = document.getElementById('summary-role');
        const summaryTier = document.getElementById('summary-tier');
        const summaryStatus = document.getElementById('summary-status');
        const activeToggle = document.getElementById('is_active_toggle');
        const tierRadios = document.querySelectorAll('input[name="security_tier"]');
        const form = document.getElementById('create-user-form');

        if (avatarDropzone && avatarInput) {
            avatarDropzone.addEventListener('click', () => avatarInput.click());
            avatarInput.addEventListener('change', (e) => {
                const file = e.target.files[0];
                if (file) {
                    if (file.size > 2 * 1024 * 1024) {
                        showToast('Ukuran file maksimal 2MB.', 'error');
                        avatarInput.value = '';
                        return;
                    }
                    const reader = new FileReader();
                    reader.onload = (ev) => {
                        if (previewBg) previewBg.style.backgroundImage = 'url(' + ev.target.result + ')';
                        previewWrapper.classList.remove('hidden');
                        if (placeholder) placeholder.classList.add('hidden');
                        showToast('Foto profil berhasil dimuat.', 'success');
                    };
                    reader.readAsDataURL(file);
                }
            });
            ['dragover', 'dragenter'].forEach(evt => {
                avatarDropzone.addEventListener(evt, (e) => {
                    e.preventDefault();
                    avatarDropzone.classList.add('border-indigo-500', 'bg-indigo-50/50', 'dark:bg-indigo-950/20');
                });
            });
            ['dragleave', 'drop'].forEach(evt => {
                avatarDropzone.addEventListener(evt, (e) => {
                    e.preventDefault();
                    avatarDropzone.classList.remove('border-indigo-500', 'bg-indigo-50/50', 'dark:bg-indigo-950/20');
                });
            });
            avatarDropzone.addEventListener('drop', (e) => {
                const file = e.dataTransfer.files[0];
                if (file && avatarInput) {
                    avatarInput.files = e.dataTransfer.files;
                    avatarInput.dispatchEvent(new Event('change'));
                }
            });
        }

        if (roleSelect && summaryRole) {
            roleSelect.addEventListener('change', () => {
                summaryRole.textContent = roleSelect.value;
            });
        }

        tierRadios.forEach(radio => {
            radio.addEventListener('change', () => {
                document.querySelectorAll('.tier-card').forEach(card => {
                    card.classList.remove('border-indigo-500', 'bg-indigo-50/50', 'dark:bg-indigo-950/30');
                    card.classList.add('border-slate-200', 'dark:border-slate-700');
                });
                const activeCard = radio.closest('.tier-card');
                if (activeCard) {
                    activeCard.classList.add('border-indigo-500', 'bg-indigo-50/50', 'dark:bg-indigo-950/30');
                    activeCard.classList.remove('border-slate-200', 'dark:border-slate-700');
                }
                if (summaryTier) {
                    const label = radio.closest('.tier-card').querySelector('p').textContent;
                    summaryTier.textContent = label;
                }
            });
        });

        if (activeToggle && summaryStatus) {
            activeToggle.addEventListener('change', () => {
                const isActive = activeToggle.checked;
                summaryStatus.textContent = isActive ? 'Aktif' : 'Nonaktif';
                summaryStatus.classList.toggle('text-emerald-400', isActive);
                summaryStatus.classList.toggle('text-slate-400', !isActive);
            });
        }

        if (form) {
            form.addEventListener('submit', (e) => {
                e.preventDefault();
                const name = document.getElementById('name').value.trim();
                const email = document.getElementById('email').value.trim();
                if (!name || !email) {
                    showToast('Nama dan Email wajib diisi.', 'error');
                    return;
                }
                showConfirm('Simpan Pengguna?', `Buat akun baru untuk "${name}" dengan role ${roleSelect.value}?`, 'Ya, Simpan', 'Periksa Lagi', 'success')
                    .then(res => {
                        if (res.isConfirmed) {
                            showToast(`Pengguna "${name}" berhasil disimpan.`, 'success');
                            setTimeout(() => form.submit(), 800);
                        }
                    });
            });
        }
    });
</script>
@endpush
@endsection

