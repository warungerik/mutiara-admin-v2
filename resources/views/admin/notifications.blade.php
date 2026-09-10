@extends('layouts.admin')

@section('title', 'Pusat Notifikasi')
@section('page_title', 'Pusat Notifikasi')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4" data-motion="fade-up">
        <div>
            <div class="flex items-center gap-3">
                <h1 class="text-xl md:text-2xl font-bold tracking-tight text-slate-900 dark:text-white">Pusat Notifikasi</h1>
                <span id="unread-badge" class="px-2.5 py-0.5 rounded-full text-xs font-bold bg-indigo-50 text-indigo-600 dark:bg-indigo-950/60 dark:text-indigo-400 border border-indigo-200 dark:border-indigo-800/60">
                    <span id="unread-count">3</span> Belum Dibaca
                </span>
            </div>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Pemberitahuan aktivitas transaksi, keamanan akun, dan status sistem realtime.</p>
        </div>

        <div class="flex flex-wrap items-center gap-2">
            <button type="button" id="mark-all-read-btn" 
                class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl text-xs font-semibold bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 border border-slate-200 dark:border-slate-700 hover:bg-slate-50 dark:hover:bg-slate-700/60 shadow-xs transition-all cursor-pointer">
                <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                <span>Tandai Semua Dibaca</span>
            </button>
            <button type="button" id="clear-all-btn" 
                class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl text-xs font-semibold bg-rose-50 text-rose-600 dark:bg-rose-950/50 dark:text-rose-400 border border-rose-200 dark:border-rose-900/60 hover:bg-rose-100 dark:hover:bg-rose-900/60 shadow-xs transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                <span>Kosongkan</span>
            </button>
            <button type="button" id="preferences-btn" 
                class="inline-flex items-center gap-2 px-3.5 py-2 rounded-xl text-xs font-semibold bg-indigo-600 hover:bg-indigo-700 text-white shadow-xs transition-all cursor-pointer">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" /></svg>
                <span>Preferensi</span>
            </button>
        </div>
    </div>

    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-4" data-motion="fade-up">
        <div class="p-4 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-indigo-50 dark:bg-indigo-950/60 text-indigo-600 dark:text-indigo-400 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
            </div>
            <div>
                <span class="text-xs text-slate-500 dark:text-slate-400 font-medium block">Total Notifikasi</span>
                <span class="text-lg font-bold text-slate-900 dark:text-white" id="total-stat-count">{{ count($notifications) }}</span>
            </div>
        </div>

        <div class="p-4 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-amber-50 dark:bg-amber-950/60 text-amber-600 dark:text-amber-400 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            </div>
            <div>
                <span class="text-xs text-slate-500 dark:text-slate-400 font-medium block">Belum Dibaca</span>
                <span class="text-lg font-bold text-amber-600 dark:text-amber-400" id="unread-stat-count">3</span>
            </div>
        </div>

        <div class="p-4 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-emerald-50 dark:bg-emerald-950/60 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>
            </div>
            <div>
                <span class="text-xs text-slate-500 dark:text-slate-400 font-medium block">Transaksi & Produk</span>
                <span class="text-lg font-bold text-slate-900 dark:text-white">3</span>
            </div>
        </div>

        <div class="p-4 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-indigo-50 dark:bg-indigo-950/60 text-indigo-600 dark:text-indigo-400 flex items-center justify-center shrink-0">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
            </div>
            <div>
                <span class="text-xs text-slate-500 dark:text-slate-400 font-medium block">Keamanan & Sistem</span>
                <span class="text-lg font-bold text-slate-900 dark:text-white">3</span>
            </div>
        </div>
    </div>

    <div data-motion="fade-up" class="rounded-3xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-xs overflow-hidden">

        <div class="p-4 sm:p-5 border-b border-slate-100 dark:border-slate-800 flex flex-col md:flex-row md:items-center justify-between gap-4">
            
            <div class="flex items-center gap-1.5 overflow-x-auto no-scrollbar pb-1 md:pb-0">
                <button type="button" class="tab-btn px-3.5 py-1.5 rounded-xl text-xs font-semibold bg-indigo-600 text-white shadow-xs shrink-0 cursor-pointer transition-all" data-filter="all">
                    Semua
                </button>
                <button type="button" class="tab-btn px-3.5 py-1.5 rounded-xl text-xs font-medium text-slate-600 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white shrink-0 cursor-pointer transition-all" data-filter="unread">
                    Belum Dibaca
                </button>
                <button type="button" class="tab-btn px-3.5 py-1.5 rounded-xl text-xs font-medium text-slate-600 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white shrink-0 cursor-pointer transition-all" data-filter="order">
                    Transaksi
                </button>
                <button type="button" class="tab-btn px-3.5 py-1.5 rounded-xl text-xs font-medium text-slate-600 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white shrink-0 cursor-pointer transition-all" data-filter="security">
                    Keamanan
                </button>
                <button type="button" class="tab-btn px-3.5 py-1.5 rounded-xl text-xs font-medium text-slate-600 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white shrink-0 cursor-pointer transition-all" data-filter="system">
                    Sistem
                </button>
                <button type="button" class="tab-btn px-3.5 py-1.5 rounded-xl text-xs font-medium text-slate-600 hover:text-slate-900 dark:text-slate-400 dark:hover:text-white shrink-0 cursor-pointer transition-all" data-filter="product">
                    Produk
                </button>
            </div>

            <div class="relative w-full md:w-64">
                <input type="text" id="search-notif" placeholder="Cari pemberitahuan..." 
                    class="w-full pl-9 pr-4 py-2 text-xs rounded-xl bg-slate-50 dark:bg-slate-800/80 text-slate-900 dark:text-white placeholder-slate-400 border border-slate-200 dark:border-slate-700 focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 focus:outline-hidden transition-all">
                <svg class="absolute left-3 top-2.5 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>

        <div class="divide-y divide-slate-100 dark:divide-slate-800/60" id="notification-list">
            @foreach($notifications as $notif)
                <div class="notif-item p-4 sm:p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4 transition-all hover:bg-slate-50/60 dark:hover:bg-slate-800/30 {{ !$notif['is_read'] ? 'bg-indigo-50/40 dark:bg-indigo-950/20' : '' }}"
                    data-id="{{ $notif['id'] }}" data-type="{{ $notif['type'] }}" data-read="{{ $notif['is_read'] ? 'true' : 'false' }}">
                    
                    <div class="flex items-start gap-3.5 min-w-0">
                        <div class="w-10 h-10 rounded-2xl flex items-center justify-center shrink-0 shadow-xs
                            @if($notif['color'] === 'emerald') bg-emerald-50 text-emerald-600 dark:bg-emerald-950/60 dark:text-emerald-400 border border-emerald-200/60 dark:border-emerald-900/40
                            @elseif($notif['color'] === 'indigo') bg-indigo-50 text-indigo-600 dark:bg-indigo-950/60 dark:text-indigo-400 border border-indigo-200/60 dark:border-indigo-900/40
                            @elseif($notif['color'] === 'sky') bg-sky-50 text-sky-600 dark:bg-sky-950/60 dark:text-sky-400 border border-sky-200/60 dark:border-sky-900/40
                            @elseif($notif['color'] === 'amber') bg-amber-50 text-amber-600 dark:bg-amber-950/60 dark:text-amber-400 border border-amber-200/60 dark:border-amber-900/40
                            @else bg-rose-50 text-rose-600 dark:bg-rose-950/60 dark:text-rose-400 border border-rose-200/60 dark:border-rose-900/40
                            @endif">
                            @if($notif['type'] === 'order')
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" /></svg>
                            @elseif($notif['type'] === 'security')
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                            @elseif($notif['type'] === 'system')
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v4a2 2 0 01-2 2M5 12a2 2 0 00-2 2v4a2 2 0 002 2h14a2 2 0 002-2v-4a2 2 0 00-2-2m-2-4h.01M17 16h.01" /></svg>
                            @elseif($notif['type'] === 'product')
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" /></svg>
                            @else
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                            @endif
                        </div>

                        <div class="min-w-0 flex-1">
                            <div class="flex items-center gap-2 flex-wrap">
                                <h3 class="text-xs font-bold text-slate-900 dark:text-white notif-title">{{ $notif['title'] }}</h3>
                                @if(!$notif['is_read'])
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-semibold bg-indigo-100 text-indigo-700 dark:bg-indigo-950 dark:text-indigo-300 notif-status-badge">
                                        <span class="w-1.5 h-1.5 rounded-full bg-indigo-600 animate-pulse"></span>
                                        Baru
                                    </span>
                                @endif
                            </div>
                            <p class="text-xs text-slate-600 dark:text-slate-300 mt-1 leading-relaxed notif-message">{{ $notif['message'] }}</p>
                            <span class="text-[11px] text-slate-400 dark:text-slate-500 mt-1.5 block font-medium">{{ $notif['time'] }}</span>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 self-end sm:self-center shrink-0">
                        <button type="button" onclick="toggleReadState(this)" 
                            title="{{ !$notif['is_read'] ? 'Tandai Dibaca' : 'Tandai Belum Dibaca' }}" 
                            class="toggle-read-btn p-2 rounded-xl text-slate-400 hover:text-indigo-600 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors cursor-pointer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                        </button>
                        <button type="button" onclick="viewDetail('{{ $notif['title'] }}', '{{ $notif['message'] }}', '{{ $notif['time'] }}')" 
                            title="Tinjau Detail" 
                            class="px-3 py-1.5 rounded-xl text-xs font-semibold bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-200 hover:bg-slate-200 dark:hover:bg-slate-700 transition-all cursor-pointer">
                            Detail
                        </button>
                        <button type="button" onclick="deleteSingleNotif(this)" 
                            title="Hapus Notifikasi" 
                            class="p-2 rounded-xl text-slate-400 hover:text-rose-600 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors cursor-pointer">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" /></svg>
                        </button>
                    </div>

                </div>
            @endforeach
        </div>

        <div id="empty-state" class="hidden p-12 text-center">
            <div class="w-16 h-16 rounded-3xl bg-slate-100 dark:bg-slate-800 text-slate-400 flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" /></svg>
            </div>
            <h3 class="text-sm font-bold text-slate-900 dark:text-white mb-1">Tidak Ada Notifikasi Ditemukan</h3>
            <p class="text-xs text-slate-500 dark:text-slate-400 max-w-sm mx-auto">Tidak ada pemberitahuan yang sesuai dengan pencarian atau filter yang Anda pilih.</p>
        </div>
    </div>

</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const tabBtns = document.querySelectorAll('.tab-btn');
        const items = document.querySelectorAll('.notif-item');
        const searchInput = document.getElementById('search-notif');
        const emptyState = document.getElementById('empty-state');
        const markAllBtn = document.getElementById('mark-all-read-btn');
        const clearAllBtn = document.getElementById('clear-all-btn');
        const preferencesBtn = document.getElementById('preferences-btn');

        let activeFilter = 'all';

        function updateUnreadCount() {
            const unreadItems = document.querySelectorAll('.notif-item[data-read="false"]');
            const totalItems = document.querySelectorAll('.notif-item');
            const count = unreadItems.length;
            
            const unreadCountEl = document.getElementById('unread-count');
            const unreadStatCount = document.getElementById('unread-stat-count');
            const totalStatCount = document.getElementById('total-stat-count');
            const unreadBadge = document.getElementById('unread-badge');

            if (unreadCountEl) unreadCountEl.textContent = count;
            if (unreadStatCount) unreadStatCount.textContent = count;
            if (totalStatCount) totalStatCount.textContent = totalItems.length;

            if (count === 0 && unreadBadge) {
                unreadBadge.classList.add('hidden');
            } else if (unreadBadge) {
                unreadBadge.classList.remove('hidden');
            }
        }

        function filterNotifications() {
            const query = searchInput ? searchInput.value.toLowerCase().trim() : '';
            let visibleCount = 0;

            items.forEach(item => {
                const type = item.getAttribute('data-type');
                const isRead = item.getAttribute('data-read') === 'true';
                const title = item.querySelector('.notif-title')?.textContent.toLowerCase() || '';
                const message = item.querySelector('.notif-message')?.textContent.toLowerCase() || '';

                let matchesFilter = false;
                if (activeFilter === 'all') matchesFilter = true;
                else if (activeFilter === 'unread') matchesFilter = !isRead;
                else matchesFilter = (type === activeFilter);

                let matchesSearch = title.includes(query) || message.includes(query);

                if (matchesFilter && matchesSearch) {
                    item.style.display = 'flex';
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            if (emptyState) {
                emptyState.classList.toggle('hidden', visibleCount > 0);
            }
        }

        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                tabBtns.forEach(b => {
                    b.classList.remove('bg-indigo-600', 'text-white', 'shadow-xs', 'font-semibold');
                    b.classList.add('text-slate-600', 'dark:text-slate-400', 'font-medium');
                });
                btn.classList.add('bg-indigo-600', 'text-white', 'shadow-xs', 'font-semibold');
                btn.classList.remove('text-slate-600', 'dark:text-slate-400', 'font-medium');

                activeFilter = btn.getAttribute('data-filter');
                filterNotifications();
            });
        });

        if (searchInput) {
            searchInput.addEventListener('input', filterNotifications);
        }

        if (markAllBtn) {
            markAllBtn.addEventListener('click', () => {
                const unreadList = document.querySelectorAll('.notif-item[data-read="false"]');
                if (unreadList.length === 0) {
                    showToast('Semua notifikasi sudah dibaca.', 'info');
                    return;
                }
                unreadList.forEach(item => {
                    item.setAttribute('data-read', 'true');
                    item.classList.remove('bg-indigo-50/40', 'dark:bg-indigo-950/20');
                    const badge = item.querySelector('.notif-status-badge');
                    if (badge) badge.remove();
                });
                updateUnreadCount();
                showToast('Semua notifikasi telah ditandai dibaca.', 'success');
            });
        }

        if (clearAllBtn) {
            clearAllBtn.addEventListener('click', () => {
                showConfirm('Kosongkan Notifikasi?', 'Apakah Anda yakin ingin menghapus semua notifikasi?', 'Ya, Kosongkan', 'Batal')
                    .then(res => {
                        if (res.isConfirmed) {
                            items.forEach(item => item.remove());
                            updateUnreadCount();
                            filterNotifications();
                            showToast('Pusat notifikasi berhasil dikosongkan.', 'success');
                        }
                    });
            });
        }

        if (preferencesBtn) {
            preferencesBtn.addEventListener('click', () => {
                const isDark = document.documentElement.classList.contains('dark');
                Swal.fire({
                    title: 'Preferensi Notifikasi',
                    html: `
                        <div class="text-left space-y-4 text-xs mt-3">
                            <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 dark:bg-slate-800/80 border border-slate-200/80 dark:border-slate-700/60">
                                <div>
                                    <p class="font-semibold text-slate-800 dark:text-slate-200">Email Alerts</p>
                                    <p class="text-[11px] text-slate-500 dark:text-slate-400">Kirim ringkasan transaksi ke email admin</p>
                                </div>
                                <input type="checkbox" checked class="w-4 h-4 accent-indigo-600">
                            </div>
                            <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 dark:bg-slate-800/80 border border-slate-200/80 dark:border-slate-700/60">
                                <div>
                                    <p class="font-semibold text-slate-800 dark:text-slate-200">Peringatan Keamanan</p>
                                    <p class="text-[11px] text-slate-500 dark:text-slate-400">Notifikasi login perangkat baru & 2FA</p>
                                </div>
                                <input type="checkbox" checked class="w-4 h-4 accent-indigo-600">
                            </div>
                            <div class="flex items-center justify-between p-3 rounded-xl bg-slate-50 dark:bg-slate-800/80 border border-slate-200/80 dark:border-slate-700/60">
                                <div>
                                    <p class="font-semibold text-slate-800 dark:text-slate-200">System Webhook</p>
                                    <p class="text-[11px] text-slate-500 dark:text-slate-400">Kirim event realtime ke endpoint webhook</p>
                                </div>
                                <input type="checkbox" class="w-4 h-4 accent-indigo-600">
                            </div>
                        </div>
                    `,
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Simpan Preferensi',
                    cancelButtonText: 'Batal',
                    buttonsStyling: false,
                    background: isDark ? '#0f172a' : '#ffffff',
                    color: isDark ? '#f8fafc' : '#0f172a',
                    customClass: {
                        popup: 'rounded-3xl border border-slate-200/80 dark:border-slate-800 shadow-2xl p-6 max-w-md',
                        title: 'text-base font-bold text-slate-900 dark:text-white',
                        confirmButton: 'px-4 py-2.5 rounded-xl text-xs font-semibold bg-indigo-600 hover:bg-indigo-700 text-white transition-all cursor-pointer',
                        cancelButton: 'px-4 py-2.5 rounded-xl text-xs font-semibold bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 transition-all cursor-pointer ml-2',
                    }
                }).then(res => {
                    if (res.isConfirmed) {
                        showToast('Preferensi notifikasi berhasil disimpan.', 'success');
                    }
                });
            });
        }

        window.toggleReadState = function(btn) {
            const item = btn.closest('.notif-item');
            if (!item) return;
            const isRead = item.getAttribute('data-read') === 'true';
            
            if (isRead) {
                item.setAttribute('data-read', 'false');
                item.classList.add('bg-indigo-50/40', 'dark:bg-indigo-950/20');
                const titleContainer = item.querySelector('.notif-title').parentElement;
                if (titleContainer && !titleContainer.querySelector('.notif-status-badge')) {
                    const badge = document.createElement('span');
                    badge.className = 'inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-semibold bg-indigo-100 text-indigo-700 dark:bg-indigo-950 dark:text-indigo-300 notif-status-badge';
                    badge.innerHTML = '<span class="w-1.5 h-1.5 rounded-full bg-indigo-600 animate-pulse"></span> Baru';
                    titleContainer.appendChild(badge);
                }
                showToast('Ditandai sebagai belum dibaca.', 'info');
            } else {
                item.setAttribute('data-read', 'true');
                item.classList.remove('bg-indigo-50/40', 'dark:bg-indigo-950/20');
                const badge = item.querySelector('.notif-status-badge');
                if (badge) badge.remove();
                showToast('Ditandai sebagai dibaca.', 'success');
            }
            updateUnreadCount();
            filterNotifications();
        };

        window.viewDetail = function(title, message, time) {
            const isDark = document.documentElement.classList.contains('dark');
            Swal.fire({
                title: title,
                html: `
                    <div class="text-left mt-2">
                        <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed">${message}</p>
                        <span class="text-[11px] text-slate-400 dark:text-slate-500 mt-3 block font-semibold">Waktu: ${time}</span>
                    </div>
                `,
                icon: 'info',
                confirmButtonText: 'Tutup',
                buttonsStyling: false,
                background: isDark ? '#0f172a' : '#ffffff',
                color: isDark ? '#f8fafc' : '#0f172a',
                customClass: {
                    popup: 'rounded-3xl border border-slate-200/80 dark:border-slate-800 shadow-2xl p-6 max-w-md',
                    title: 'text-base font-bold text-slate-900 dark:text-white',
                    confirmButton: 'px-5 py-2.5 rounded-xl text-xs font-semibold bg-indigo-600 hover:bg-indigo-700 text-white transition-all cursor-pointer',
                }
            });
        };

        window.deleteSingleNotif = function(btn) {
            const item = btn.closest('.notif-item');
            if (!item) return;
            showConfirm('Hapus Notifikasi?', 'Notifikasi ini akan dihapus permanen.', 'Ya, Hapus', 'Batal', 'warning')
                .then(res => {
                    if (res.isConfirmed) {
                        item.remove();
                        updateUnreadCount();
                        filterNotifications();
                        showToast('Notifikasi berhasil dihapus.', 'success');
                    }
                });
        };
    });
</script>
@endpush
@endsection

