<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 - MUTIARA ADMIN V2 LARAVEL VERSION</title>
    <script>
        if (localStorage.theme === 'dark' || (!localStorage.theme && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="h-full bg-slate-50 dark:bg-slate-950 text-slate-800 dark:text-slate-100 flex items-center justify-center p-4">
    <div class="max-w-sm text-center" data-motion="fade-up">
        <div class="w-16 h-16 rounded-2xl bg-indigo-50 dark:bg-indigo-950/60 text-indigo-600 dark:text-indigo-400 font-bold text-2xl flex items-center justify-center mx-auto mb-4 shadow-lg shadow-indigo-600/10">
            404
        </div>
        <h1 class="text-xl font-bold text-slate-900 dark:text-white">Halaman Tidak Ditemukan</h1>
        <p class="text-xs text-slate-500 dark:text-slate-400 mt-1.5">Halaman pada MUTIARA ADMIN V2 yang Anda tuju tidak ditemukan.</p>
        <div class="mt-5 flex items-center justify-center gap-2">
            <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 rounded-xl text-xs font-semibold bg-indigo-600 hover:bg-indigo-700 text-white shadow-xs">
                Dashboard
            </a>
            <button type="button" onclick="history.back()" class="px-4 py-2 rounded-xl text-xs font-medium bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-slate-700">
                Kembali
            </button>
        </div>
    </div>
</body>
</html>
