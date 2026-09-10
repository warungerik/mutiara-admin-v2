<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard') - MUTIARA ADMIN V2 LARAVEL VERSION</title>

    <script>
        if (localStorage.theme === 'dark' || (!localStorage.theme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body { font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif; }
        ::selection { background-color: rgba(99, 102, 241, 0.25); color: inherit; }
        *:focus-visible { outline: 2px solid #6366f1; outline-offset: 2px; }
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: rgba(156, 163, 175, 0.4); border-radius: 9999px; }
        ::-webkit-scrollbar-thumb:hover { background: rgba(99, 102, 241, 0.6); }
        .dark ::-webkit-scrollbar-thumb { background: rgba(75, 85, 99, 0.5); }
        .dark ::-webkit-scrollbar-thumb:hover { background: rgba(99, 102, 241, 0.6); }
    </style>
</head>
<body class="h-full bg-slate-50 dark:bg-slate-950 text-slate-800 dark:text-slate-100 antialiased transition-colors duration-200">

    <div class="min-h-full flex">
        @include('layouts.partials.sidebar')

        <div class="flex-1 flex flex-col min-w-0 lg:pl-64">
            @include('layouts.partials.topbar')

            <main class="flex-1 p-4 md:p-6 lg:p-8 max-w-7xl w-full mx-auto" data-motion="fade-up">
                @if (session('success'))
                    <div id="flash-banner" data-motion="fade-up" class="mb-6 p-4 rounded-2xl bg-emerald-50 dark:bg-emerald-950/50 border border-emerald-200 dark:border-emerald-800 flex items-center justify-between text-emerald-800 dark:text-emerald-300 text-sm shadow-xs">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-emerald-600 dark:text-emerald-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ session('success') }}</span>
                        </div>
                        <button type="button" onclick="document.getElementById('flash-banner').remove()" class="text-emerald-600 hover:text-emerald-800 dark:text-emerald-400 p-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                    </div>
                @endif

                @if (session('info'))
                    <div id="flash-info" data-motion="fade-up" class="mb-6 p-4 rounded-2xl bg-sky-50 dark:bg-sky-950/50 border border-sky-200 dark:border-sky-800 flex items-center justify-between text-sky-800 dark:text-sky-300 text-sm shadow-xs">
                        <div class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-sky-600 dark:text-sky-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ session('info') }}</span>
                        </div>
                        <button type="button" onclick="document.getElementById('flash-info').remove()" class="text-sky-600 hover:text-sky-800 dark:text-sky-400 p-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                        </button>
                    </div>
                @endif

                @yield('content')
            </main>

            @include('layouts.partials.footer')
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.getElementById('sidebar-container');
            const backdrop = document.getElementById('sidebar-backdrop');
            const openSidebarBtn = document.getElementById('open-sidebar-btn');
            const closeSidebarBtn = document.getElementById('close-sidebar-btn');
            const themeToggleBtn = document.getElementById('theme-toggle-btn');
            const notificationBtn = document.getElementById('notification-btn');
            const notificationDropdown = document.getElementById('notification-dropdown');
            const profileMenuBtn = document.getElementById('profile-menu-btn');
            const profileDropdown = document.getElementById('profile-dropdown');

            function openSidebar() {
                if (!sidebar || !backdrop) return;
                sidebar.classList.remove('-translate-x-full');
                backdrop.classList.remove('opacity-0', 'pointer-events-none');
                backdrop.classList.add('opacity-100');
                document.body.classList.add('overflow-hidden', 'lg:overflow-auto');
            }

            function closeSidebar() {
                if (!sidebar || !backdrop) return;
                sidebar.classList.add('-translate-x-full');
                backdrop.classList.remove('opacity-100');
                backdrop.classList.add('opacity-0', 'pointer-events-none');
                document.body.classList.remove('overflow-hidden', 'lg:overflow-auto');
            }

            if (openSidebarBtn) openSidebarBtn.addEventListener('click', openSidebar);
            if (closeSidebarBtn) closeSidebarBtn.addEventListener('click', closeSidebar);
            if (backdrop) backdrop.addEventListener('click', closeSidebar);

            function updateThemeIcons() {
                const isDark = document.documentElement.classList.contains('dark');
                const moon = document.getElementById('theme-moon-icon');
                const sun = document.getElementById('theme-sun-icon');
                if (moon && sun) {
                    moon.classList.toggle('hidden', isDark);
                    sun.classList.toggle('hidden', !isDark);
                }
            }

            if (themeToggleBtn) {
                themeToggleBtn.addEventListener('click', function() {
                    const isDark = document.documentElement.classList.contains('dark');
                    document.documentElement.classList.toggle('dark', !isDark);
                    localStorage.setItem('theme', isDark ? 'light' : 'dark');
                    updateThemeIcons();
                });
            }
            updateThemeIcons();

            function toggleDropdown(btn, menu) {
                if (!btn || !menu) return;
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    const isHidden = menu.classList.contains('hidden');
                    if (notificationDropdown) notificationDropdown.classList.add('hidden');
                    if (profileDropdown) profileDropdown.classList.add('hidden');
                    if (isHidden) {
                        menu.classList.remove('hidden');
                        if (window.motionAnimate) {
                            window.motionAnimate(menu, { opacity: [0, 1], y: [-8, 0], scale: [0.95, 1] }, { duration: 0.2, easing: [0.16, 1, 0.3, 1] });
                        }
                    }
                });
            }

            toggleDropdown(notificationBtn, notificationDropdown);
            toggleDropdown(profileMenuBtn, profileDropdown);

            document.addEventListener('click', function() {
                if (notificationDropdown) notificationDropdown.classList.add('hidden');
                if (profileDropdown) profileDropdown.classList.add('hidden');
            });

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeSidebar();
                    if (notificationDropdown) notificationDropdown.classList.add('hidden');
                    if (profileDropdown) profileDropdown.classList.add('hidden');
                }
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
