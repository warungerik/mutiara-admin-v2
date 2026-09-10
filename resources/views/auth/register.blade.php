@extends('layouts.auth')

@section('title', 'Daftar')
@section('card_width', 'max-w-4xl')
@section('custom_card', true)

@section('content')
<div class="overflow-hidden rounded-3xl flex flex-col md:flex-row bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800/80 shadow-2xl">
    <div class="hidden md:block w-1/2 relative overflow-hidden border-r border-slate-100 dark:border-slate-800 min-h-[640px]">
        <div class="absolute inset-0 bg-linear-to-br from-blue-50 to-indigo-100 dark:from-slate-950 dark:to-indigo-950/40">
            <canvas id="dot-map-canvas-reg" class="absolute inset-0 w-full h-full"></canvas>

            <div class="absolute inset-0 flex flex-col items-center justify-center p-8 z-10 text-center">
                <div class="mb-5">
                    <div class="h-14 w-14 rounded-2xl bg-linear-to-br from-blue-600 to-indigo-600 flex items-center justify-center shadow-xl shadow-blue-500/20 text-white">
                        <svg class="h-7 w-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                    </div>
                </div>
                <h2 class="text-3xl font-bold mb-2 text-transparent bg-clip-text bg-linear-to-r from-blue-600 to-indigo-600 dark:from-blue-400 dark:to-indigo-400">
                    MUTIARA ADMIN V2
                </h2>
                <p class="text-xs text-slate-600 dark:text-slate-300 max-w-xs leading-relaxed">
                    Daftar akun baru untuk mulai mengelola infrastruktur data, pantau analitik bisnis, dan kendalikan inventaris Anda.
                </p>
            </div>
        </div>
    </div>

    <div class="w-full md:w-1/2 p-8 md:p-10 flex flex-col justify-center bg-white dark:bg-slate-900">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 dark:text-white">Daftar</h1>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 mb-6">Buat akun administrator MUTIARA ADMIN</p>

            <div class="mb-5">
                <button type="button" onclick="showToast('Pendaftaran Google terhubung di mode produksi.', 'info')"
                    class="w-full flex items-center justify-center gap-2.5 bg-slate-50 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 rounded-xl p-2.5 hover:bg-slate-100 dark:hover:bg-slate-700/60 transition-all text-xs font-semibold text-slate-700 dark:text-slate-200 shadow-xs">
                    <svg class="h-4 w-4" viewBox="0 0 24 24">
                        <path fill="#EA4335" d="M12 5c1.6 0 3 .6 4.2 1.6l3.2-3.1C17.5 1.7 15 1 12 1 7.7 1 4 3.5 2.2 7.1l3.7 2.8C6.9 7.3 9.2 5 12 5z" />
                        <path fill="#4285F4" d="M22.6 12.3c0-.8-.1-1.5-.2-2.3H12v4.3h6c-.3 1.4-1 2.5-2.2 3.3l3.6 2.8c2.1-1.9 3.2-4.7 3.2-8.1z" />
                        <path fill="#FBBC05" d="M5.9 14.1c-.2-.7-.4-1.4-.4-2.1s.1-1.4.4-2.1L2.2 7.1C1.4 8.6 1 10.2 1 12s.4 3.4 1.2 4.9l3.7-2.8z" />
                        <path fill="#34A853" d="M12 23c3 0 5.5-1 7.3-2.7l-3.6-2.8c-1 .7-2.2 1.1-3.7 1.1-2.8 0-5.2-1.9-6-4.5L2.2 16.9C4 20.5 7.7 23 12 23z" />
                    </svg>
                    <span>Daftar dengan Google</span>
                </button>
            </div>

            <div class="relative my-5">
                <div class="absolute inset-0 flex items-center">
                    <div class="w-full border-t border-slate-100 dark:border-slate-800"></div>
                </div>
                <div class="relative flex justify-center text-[11px] uppercase tracking-wider text-slate-400">
                    <span class="px-2 bg-white dark:bg-slate-900">atau</span>
                </div>
            </div>

            <form action="{{ route('register.post') }}" method="POST" class="space-y-3.5">
                @csrf

                <div>
                    <label for="reg-name" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1">Nama Lengkap <span class="text-indigo-600">*</span></label>
                    <input type="text" id="reg-name" name="name" required placeholder="Nama lengkap"
                        class="w-full px-3.5 py-2.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white border border-slate-200 dark:border-slate-700 focus:outline-hidden focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 transition-all">
                </div>

                <div>
                    <label for="reg-email" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1">Email <span class="text-indigo-600">*</span></label>
                    <input type="email" id="reg-email" name="email" required placeholder="nama@email.com"
                        class="w-full px-3.5 py-2.5 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white border border-slate-200 dark:border-slate-700 focus:outline-hidden focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 transition-all">
                </div>

                <div>
                    <label for="reg-password" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1">Sandi <span class="text-indigo-600">*</span></label>
                    <div class="relative">
                        <input type="password" id="reg-password" name="password" required placeholder="Minimal 8 karakter"
                            class="w-full px-3.5 py-2.5 pr-10 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white border border-slate-200 dark:border-slate-700 focus:outline-hidden focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 transition-all">
                        <button type="button" onclick="togglePasswordVisibility('reg-password', this)" aria-label="Tampilkan sandi" class="absolute right-3 top-2.5 text-slate-400 hover:text-slate-600 dark:hover:text-slate-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                        </button>
                    </div>
                </div>

                <div>
                    <label for="reg-password-confirm" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1">Ulangi Sandi <span class="text-indigo-600">*</span></label>
                    <div class="relative">
                        <input type="password" id="reg-password-confirm" name="password_confirmation" required placeholder="Ulangi sandi"
                            class="w-full px-3.5 py-2.5 pr-10 text-xs rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white border border-slate-200 dark:border-slate-700 focus:outline-hidden focus:border-indigo-500 focus:bg-white dark:focus:bg-slate-900 transition-all">
                        <button type="button" onclick="togglePasswordVisibility('reg-password-confirm', this)" aria-label="Tampilkan sandi" class="absolute right-3 top-2.5 text-slate-400 hover:text-slate-600 dark:hover:text-slate-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
                        </button>
                    </div>
                </div>

                <div class="flex items-start pt-1">
                    <input type="checkbox" id="terms" name="terms" required class="mt-0.5 rounded-sm border-slate-300 dark:border-slate-700 text-indigo-600 focus:ring-indigo-500">
                    <label for="terms" class="ml-2 text-xs text-slate-600 dark:text-slate-400 leading-tight">
                        Saya menyetujui syarat & ketentuan sistem.
                    </label>
                </div>

                <button type="submit" class="w-full py-2.5 px-4 rounded-xl text-xs font-semibold bg-linear-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white shadow-md shadow-indigo-500/20 flex items-center justify-center gap-2 transition-all mt-2">
                    <span>Daftar</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                </button>
            </form>

            <div class="mt-5 pt-4 text-center border-t border-slate-100 dark:border-slate-800 text-xs text-slate-500 dark:text-slate-400">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-indigo-600 dark:text-indigo-400 font-semibold hover:underline">Masuk</a>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function togglePasswordVisibility(id, btn) {
        const input = document.getElementById(id);
        if (!input) return;
        const isPassword = input.type === 'password';
        input.type = isPassword ? 'text' : 'password';
        if (btn) {
            btn.setAttribute('aria-label', isPassword ? 'Sembunyikan sandi' : 'Tampilkan sandi');
            btn.innerHTML = isPassword
                ? '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l18 18" /></svg>'
                : '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>';
        }
    }

    document.addEventListener('DOMContentLoaded', () => {
        const canvas = document.getElementById('dot-map-canvas-reg');
        if (!canvas) return;
        const ctx = canvas.getContext('2d');
        if (!ctx) return;

        let width = canvas.width = canvas.parentElement.offsetWidth;
        let height = canvas.height = canvas.parentElement.offsetHeight;

        const routes = [
            { start: { x: width * 0.18, y: height * 0.42, delay: 0 }, end: { x: width * 0.44, y: height * 0.28, delay: 2 }, color: '#2563eb' },
            { start: { x: width * 0.44, y: height * 0.28, delay: 2 }, end: { x: width * 0.62, y: height * 0.38, delay: 4 }, color: '#2563eb' },
            { start: { x: width * 0.12, y: height * 0.22, delay: 1 }, end: { x: width * 0.32, y: height * 0.58, delay: 3 }, color: '#2563eb' },
            { start: { x: width * 0.68, y: height * 0.26, delay: 0.5 }, end: { x: width * 0.46, y: height * 0.58, delay: 2.5 }, color: '#2563eb' }
        ];

        const dots = [];
        const gap = 12;
        const dotRadius = 1.2;

        for (let x = 0; x < width; x += gap) {
            for (let y = 0; y < height; y += gap) {
                const inMap =
                    (x < width * 0.25 && x > width * 0.05 && y < height * 0.4 && y > height * 0.1) ||
                    (x < width * 0.25 && x > width * 0.15 && y < height * 0.8 && y > height * 0.4) ||
                    (x < width * 0.45 && x > width * 0.3 && y < height * 0.35 && y > height * 0.15) ||
                    (x < width * 0.5 && x > width * 0.35 && y < height * 0.65 && y > height * 0.35) ||
                    (x < width * 0.7 && x > width * 0.45 && y < height * 0.5 && y > height * 0.1) ||
                    (x < width * 0.85 && x > width * 0.65 && y < height * 0.85 && y > height * 0.6);

                if (inMap && Math.random() > 0.28) {
                    dots.push({ x, y, radius: dotRadius, opacity: Math.random() * 0.5 + 0.25 });
                }
            }
        }

        let startTime = Date.now();

        function render() {
            ctx.clearRect(0, 0, width, height);

            dots.forEach(d => {
                ctx.beginPath();
                ctx.arc(d.x, d.y, d.radius, 0, Math.PI * 2);
                ctx.fillStyle = `rgba(37, 99, 235, ${d.opacity})`;
                ctx.fill();
            });

            const elapsed = (Date.now() - startTime) / 1000;
            routes.forEach(r => {
                const dt = elapsed - r.start.delay;
                if (dt <= 0) return;
                const progress = Math.min(dt / 3, 1);

                const cx = r.start.x + (r.end.x - r.start.x) * progress;
                const cy = r.start.y + (r.end.y - r.start.y) * progress;

                ctx.beginPath();
                ctx.moveTo(r.start.x, r.start.y);
                ctx.lineTo(cx, cy);
                ctx.strokeStyle = r.color;
                ctx.lineWidth = 1.5;
                ctx.stroke();

                ctx.beginPath();
                ctx.arc(r.start.x, r.start.y, 3, 0, Math.PI * 2);
                ctx.fillStyle = r.color;
                ctx.fill();

                ctx.beginPath();
                ctx.arc(cx, cy, 3, 0, Math.PI * 2);
                ctx.fillStyle = '#3b82f6';
                ctx.fill();

                ctx.beginPath();
                ctx.arc(cx, cy, 6, 0, Math.PI * 2);
                ctx.fillStyle = 'rgba(59, 130, 246, 0.4)';
                ctx.fill();
            });

            if (elapsed > 15) startTime = Date.now();
            requestAnimationFrame(render);
        }

        render();

        window.addEventListener('resize', () => {
            if (!canvas.parentElement) return;
            width = canvas.width = canvas.parentElement.offsetWidth;
            height = canvas.height = canvas.parentElement.offsetHeight;
        });
    });
</script>
@endpush
