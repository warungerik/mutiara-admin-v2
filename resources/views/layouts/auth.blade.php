<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Autentikasi') - MUTIARA ADMIN V2 LARAVEL VERSION</title>

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
        body { font-family: 'Plus Jakarta Sans', system-ui, sans-serif; }
        ::selection { background-color: rgba(99, 102, 241, 0.25); color: inherit; }
        *:focus-visible { outline: 2px solid #6366f1; outline-offset: 2px; }
    </style>
</head>
<body class="min-h-screen bg-linear-to-br from-blue-50 via-slate-50 to-indigo-100/60 dark:from-slate-950 dark:via-slate-900 dark:to-indigo-950/40 text-slate-800 dark:text-slate-100 flex items-center justify-center p-4 sm:p-6 transition-colors duration-200">

    <div class="w-full @yield('card_width', 'max-w-md')" data-motion="fade-up">
        @hasSection('custom_card')
            @yield('content')
        @else
            <div class="text-center mb-6">
                <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center gap-3">
                    <div class="w-11 h-11 rounded-2xl bg-indigo-600 text-white font-bold text-lg flex items-center justify-center shadow-lg shadow-indigo-600/30">
                        MA
                    </div>
                    <div class="text-left leading-tight">
                        <span class="text-lg font-bold tracking-tight text-slate-900 dark:text-white block">MUTIARA ADMIN</span>
                        <span class="text-[10px] uppercase font-semibold text-indigo-600 dark:text-indigo-400 tracking-wider">V2 Laravel Version</span>
                    </div>
                </a>
            </div>

            <div class="bg-white dark:bg-slate-900 rounded-3xl border border-slate-200/80 dark:border-slate-800/80 p-6 sm:p-8 shadow-xl shadow-slate-900/5 dark:shadow-black/20">
                @yield('content')
            </div>
        @endif

        <div class="mt-6 text-center text-xs text-slate-500 dark:text-slate-400">
            <a href="{{ route('admin.dashboard') }}" class="hover:text-indigo-600 dark:hover:text-indigo-400 font-medium transition-colors">
                &larr; Kembali ke Dashboard
            </a>
        </div>
    </div>

    @stack('scripts')
</body>
</html>
