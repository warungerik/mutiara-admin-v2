@extends('layouts.auth')

@section('title', 'Lupa Sandi')

@section('content')
<div>
    <div class="mb-6 text-center" data-motion="stagger-item">
        <h1 class="text-xl font-bold text-slate-900 dark:text-white">Lupa Sandi</h1>
        <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">Masukkan email Anda untuk reset sandi.</p>
    </div>

    @if (session('status'))
        <div data-motion="fade-up" class="mb-4 p-3 rounded-xl bg-emerald-50 dark:bg-emerald-950/50 border border-emerald-200 dark:border-emerald-800 text-xs text-emerald-700 dark:text-emerald-300">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('password.email') }}" method="POST" class="space-y-4">
        @csrf

        <div data-motion="stagger-item">
            <label for="forgot-email" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1.5">Email</label>
            <input type="email" id="forgot-email" name="email" required placeholder="nama@email.com"
                class="w-full px-3.5 py-2.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white border border-slate-200 dark:border-slate-700 focus:outline-hidden focus:border-indigo-500 transition-all">
        </div>

        <button data-motion="stagger-item" type="submit" class="w-full py-2.5 px-4 rounded-xl text-xs font-semibold bg-indigo-600 hover:bg-indigo-700 text-white shadow-xs">
            Kirim Link
        </button>
    </form>

    <div class="mt-5 pt-4 text-center border-t border-slate-100 dark:border-slate-800 text-xs text-slate-500 dark:text-slate-400">
        Ingat sandi?
        <a href="{{ route('login') }}" class="text-indigo-600 dark:text-indigo-400 font-semibold hover:underline">Masuk</a>
    </div>
</div>
@endsection
