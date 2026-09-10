<header class="sticky top-0 z-30 flex items-center justify-between h-16 px-4 md:px-6 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md border-b border-slate-200 dark:border-slate-800">
    <div class="flex items-center gap-3 md:gap-4">
        <button id="open-sidebar-btn" type="button" aria-label="Buka Menu"
            class="p-2 -ml-2 rounded-xl text-slate-600 hover:text-slate-900 hover:bg-slate-100 dark:text-slate-300 dark:hover:text-white dark:hover:bg-slate-800 lg:hidden">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>

        <div class="hidden sm:flex items-center gap-2 text-xs font-medium text-slate-500 dark:text-slate-400">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Admin</a>
            <span>/</span>
            <span class="text-slate-900 dark:text-slate-200 font-semibold">@yield('page_title', 'Overview')</span>
        </div>
    </div>

    <div class="flex items-center gap-2 md:gap-3">
        <div class="relative hidden md:block w-64">
            <input type="text" placeholder="Cari..." aria-label="Cari"
                class="w-full pl-9 pr-4 py-1.5 text-xs rounded-xl bg-slate-100 dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400 border border-transparent focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 focus:outline-hidden transition-all">
            <svg class="absolute left-3 top-2.5 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
        </div>

        <button id="theme-toggle-btn" type="button" aria-label="Ganti Tema"
            class="p-2 rounded-xl text-slate-500 hover:text-slate-900 hover:bg-slate-100 dark:text-slate-400 dark:hover:text-white dark:hover:bg-slate-800 transition-colors">
            <svg id="theme-moon-icon" class="w-5 h-5 hidden dark:hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
            </svg>
            <svg id="theme-sun-icon" class="w-5 h-5 hidden dark:block" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
        </button>

        <div class="relative">
            <button id="notification-btn" type="button" aria-label="Notifikasi"
                class="relative p-2 rounded-xl text-slate-500 hover:text-slate-900 hover:bg-slate-100 dark:text-slate-400 dark:hover:text-white dark:hover:bg-slate-800 transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                </svg>
                <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-indigo-600"></span>
            </button>

            <div id="notification-dropdown"
                class="hidden absolute right-0 mt-2 w-80 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-xl py-1 z-50">
                <div class="flex items-center justify-between px-4 py-2.5 border-b border-slate-100 dark:border-slate-800">
                    <span class="text-xs font-semibold text-slate-900 dark:text-white">Notifikasi</span>
                    <span class="text-[10px] font-semibold text-indigo-600 dark:text-indigo-400">3 Baru</span>
                </div>
                <div class="divide-y divide-slate-100 dark:divide-slate-800">
                    <div class="p-3 hover:bg-slate-50 dark:hover:bg-slate-800/50">
                        <p class="text-xs font-medium text-slate-800 dark:text-slate-200">Pesanan #ORD-2026-108</p>
                        <p class="text-[11px] text-slate-400">Ahmad Fadhil membayar Rp 1.450.000</p>
                        <span class="text-[10px] text-slate-400 mt-1 block">10m lalu</span>
                    </div>
                    <div class="p-3 hover:bg-slate-50 dark:hover:bg-slate-800/50">
                        <p class="text-xs font-medium text-slate-800 dark:text-slate-200">Backup Selesai</p>
                        <p class="text-[11px] text-slate-400">Database otomatis tersimpan ke Cloud</p>
                        <span class="text-[10px] text-slate-400 mt-1 block">3j lalu</span>
                    </div>
                </div>
                <div class="border-t border-slate-100 dark:border-slate-800 p-1 text-center">
                    <a href="{{ route('admin.notifications') }}" class="block py-1.5 text-xs font-semibold text-indigo-600 dark:text-indigo-400 hover:bg-slate-50 dark:hover:bg-slate-800/50 rounded-xl transition-colors">
                        Lihat Semua Notifikasi &rarr;
                    </a>
                </div>
            </div>
        </div>

        <div class="w-px h-6 bg-slate-200 dark:bg-slate-800 hidden sm:block"></div>

        <div class="relative">
            <button id="profile-menu-btn" type="button" aria-label="Profil"
                class="flex items-center gap-2.5 p-1 rounded-xl hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors">
                <div class="w-8 h-8 rounded-lg bg-indigo-600 text-white font-bold text-xs flex items-center justify-center">
                    SA
                </div>
                <div class="hidden sm:block text-left">
                    <span class="text-xs font-semibold text-slate-800 dark:text-slate-200 block leading-tight">Super Admin</span>
                    <span class="text-[10px] text-slate-400 block">admin@mutiara.io</span>
                </div>
            </button>

            <div id="profile-dropdown"
                class="hidden absolute right-0 mt-2 w-48 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-xl py-1.5 z-50">
                <a href="{{ route('admin.profile') }}" class="flex items-center gap-2 px-4 py-2 text-xs font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800">
                    <span>Profil Saya</span>
                </a>
                <a href="{{ route('admin.settings') }}" class="flex items-center gap-2 px-4 py-2 text-xs font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800">
                    <span>Pengaturan</span>
                </a>
                <a href="{{ route('admin.components') }}" class="flex items-center gap-2 px-4 py-2 text-xs font-medium text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800">
                    <span>Komponen UI</span>
                </a>
                <div class="border-t border-slate-100 dark:border-slate-800 my-1"></div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-xs font-medium text-rose-600 dark:text-rose-400 hover:bg-rose-50 dark:hover:bg-rose-950/40">
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>
