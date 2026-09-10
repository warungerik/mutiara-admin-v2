<aside id="sidebar-container"
    class="fixed inset-y-0 left-0 z-50 flex flex-col w-64 bg-white dark:bg-slate-900 border-r border-slate-200 dark:border-slate-800 transition-transform duration-300 ease-in-out -translate-x-full lg:translate-x-0">
    
    <div class="flex items-center justify-between h-16 px-5 border-b border-slate-200 dark:border-slate-800">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
            <div class="flex items-center justify-center w-10 h-10 rounded-xl bg-indigo-600 text-white font-bold text-lg shadow-md shadow-indigo-500/20">
                MA
            </div>
            <div class="leading-tight">
                <span class="text-sm font-bold tracking-tight text-slate-900 dark:text-white block">MUTIARA ADMIN</span>
                <span class="text-[10px] uppercase font-semibold text-indigo-600 dark:text-indigo-400 tracking-wider">V2 Laravel Version</span>
            </div>
        </a>

        <button id="close-sidebar-btn" type="button" aria-label="Tutup"
            class="p-1.5 rounded-lg text-slate-500 hover:text-slate-700 hover:bg-slate-100 dark:text-slate-400 dark:hover:text-white dark:hover:bg-slate-800 lg:hidden">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <div class="flex-1 overflow-y-auto px-4 py-4 space-y-6">
        <div>
            <span class="px-3 text-xs font-semibold uppercase tracking-wider text-slate-400 dark:text-slate-500">Menu Utama</span>
            <div class="mt-2 space-y-1">
                <a href="{{ route('admin.dashboard') }}" data-motion="stagger-item"
                    class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs font-medium transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-50 text-indigo-600 dark:bg-indigo-950/50 dark:text-indigo-400 font-semibold' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800/60' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.analytics') }}" data-motion="stagger-item"
                    class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs font-medium transition-colors {{ request()->routeIs('admin.analytics') ? 'bg-indigo-50 text-indigo-600 dark:bg-indigo-950/50 dark:text-indigo-400 font-semibold' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800/60' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                    <span>Analytics & Laporan</span>
                </a>

                <a href="{{ route('admin.orders') }}" data-motion="stagger-item"
                    class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs font-medium transition-colors {{ request()->routeIs('admin.orders') ? 'bg-indigo-50 text-indigo-600 dark:bg-indigo-950/50 dark:text-indigo-400 font-semibold' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800/60' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span>Transaksi</span>
                </a>

                <a href="{{ route('admin.products') }}" data-motion="stagger-item"
                    class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs font-medium transition-colors {{ request()->routeIs('admin.products') ? 'bg-indigo-50 text-indigo-600 dark:bg-indigo-950/50 dark:text-indigo-400 font-semibold' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800/60' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <span>Katalog Produk</span>
                </a>
            </div>
        </div>

        <div>
            <span class="px-3 text-xs font-semibold uppercase tracking-wider text-slate-400 dark:text-slate-500">Manajemen</span>
            <div class="mt-2 space-y-1">
                <a href="{{ route('admin.users.index') }}" data-motion="stagger-item"
                    class="flex items-center justify-between px-3 py-2 rounded-xl text-xs font-medium transition-colors {{ request()->routeIs('admin.users.index') ? 'bg-indigo-50 text-indigo-600 dark:bg-indigo-950/50 dark:text-indigo-400 font-semibold' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800/60' }}">
                    <div class="flex items-center gap-3">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <span>Pengguna</span>
                    </div>
                    <span class="px-2 py-0.5 text-[10px] font-semibold rounded-full bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400">8</span>
                </a>

                <a href="{{ route('admin.users.create') }}" data-motion="stagger-item"
                    class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs font-medium transition-colors {{ request()->routeIs('admin.users.create') ? 'bg-indigo-50 text-indigo-600 dark:bg-indigo-950/50 dark:text-indigo-400 font-semibold' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800/60' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    <span>Formulir</span>
                </a>

                <a href="{{ route('admin.notifications') }}" data-motion="stagger-item"
                    class="flex items-center justify-between px-3 py-2 rounded-xl text-xs font-medium transition-colors {{ request()->routeIs('admin.notifications') ? 'bg-indigo-50 text-indigo-600 dark:bg-indigo-950/50 dark:text-indigo-400 font-semibold' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800/60' }}">
                    <div class="flex items-center gap-3">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <span>Notifikasi</span>
                    </div>
                    <span class="px-1.5 py-0.5 text-[10px] font-bold rounded-full bg-indigo-50 text-indigo-600 dark:bg-indigo-950/60 dark:text-indigo-400">3</span>
                </a>
            </div>
        </div>

        <div>
            <span class="px-3 text-xs font-semibold uppercase tracking-wider text-slate-400 dark:text-slate-500">Sistem & Tools</span>
            <div class="mt-2 space-y-1">
                <a href="{{ route('admin.profile') }}" data-motion="stagger-item"
                    class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs font-medium transition-colors {{ request()->routeIs('admin.profile') ? 'bg-indigo-50 text-indigo-600 dark:bg-indigo-950/50 dark:text-indigo-400 font-semibold' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800/60' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span>Profil Saya</span>
                </a>

                <a href="{{ route('admin.settings') }}" data-motion="stagger-item"
                    class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs font-medium transition-colors {{ request()->routeIs('admin.settings') ? 'bg-indigo-50 text-indigo-600 dark:bg-indigo-950/50 dark:text-indigo-400 font-semibold' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800/60' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span>Pengaturan</span>
                </a>

                <a href="{{ route('admin.components') }}" data-motion="stagger-item"
                    class="flex items-center gap-3 px-3 py-2 rounded-xl text-xs font-medium transition-colors {{ request()->routeIs('admin.components') ? 'bg-indigo-50 text-indigo-600 dark:bg-indigo-950/50 dark:text-indigo-400 font-semibold' : 'text-slate-700 hover:bg-slate-100 dark:text-slate-300 dark:hover:bg-slate-800/60' }}">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z" />
                    </svg>
                    <span>Komponen UI</span>
                </a>

                <div class="pt-2">
                    <span class="px-3 text-[10px] font-semibold uppercase tracking-wider text-slate-400 dark:text-slate-500 block mb-1">Halaman Lain</span>
                    <a href="{{ route('login') }}" target="_blank" data-motion="stagger-item"
                        class="flex items-center justify-between px-3 py-1.5 rounded-lg text-xs font-medium text-slate-600 hover:text-indigo-600 hover:bg-slate-50 dark:text-slate-400 dark:hover:text-indigo-400 dark:hover:bg-slate-800/40">
                        <span>Login</span>
                        <svg class="w-3.5 h-3.5 opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                    </a>
                    <a href="{{ route('register') }}" target="_blank" data-motion="stagger-item"
                        class="flex items-center justify-between px-3 py-1.5 rounded-lg text-xs font-medium text-slate-600 hover:text-indigo-600 hover:bg-slate-50 dark:text-slate-400 dark:hover:text-indigo-400 dark:hover:bg-slate-800/40">
                        <span>Register</span>
                        <svg class="w-3.5 h-3.5 opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" /></svg>
                    </a>
                    <a href="{{ url('/page-not-found') }}" data-motion="stagger-item"
                        class="flex items-center justify-between px-3 py-1.5 rounded-lg text-xs font-medium text-slate-600 hover:text-indigo-600 hover:bg-slate-50 dark:text-slate-400 dark:hover:text-indigo-400 dark:hover:bg-slate-800/40">
                        <span>404</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="p-3 border-t border-slate-200 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-900/50">
        <div class="flex items-center justify-between p-2 rounded-xl bg-white dark:bg-slate-800 border border-slate-200/80 dark:border-slate-700/80 shadow-xs">
            <div class="flex items-center gap-2.5 overflow-hidden">
                <div class="w-8 h-8 shrink-0 rounded-lg bg-indigo-100 dark:bg-indigo-900/60 text-indigo-700 dark:text-indigo-300 font-bold flex items-center justify-center text-xs">
                    SA
                </div>
                <div class="truncate">
                    <p class="text-xs font-semibold text-slate-900 dark:text-white truncate">Super Admin</p>
                    <p class="text-[11px] text-slate-500 dark:text-slate-400 truncate">admin@mutiara.io</p>
                </div>
            </div>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" title="Keluar" aria-label="Keluar"
                    class="p-1.5 rounded-lg text-slate-400 hover:text-rose-600 hover:bg-rose-50 dark:hover:bg-rose-950/50 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</aside>

<div id="sidebar-backdrop" class="fixed inset-0 z-40 bg-slate-900/50 backdrop-blur-xs transition-opacity duration-300 opacity-0 pointer-events-none lg:hidden"></div>
