<footer class="mt-auto border-t border-slate-200 dark:border-slate-800 bg-white/70 dark:bg-slate-900/70 backdrop-blur-md text-slate-500 dark:text-slate-400 text-xs transition-colors">
    <div class="px-4 md:px-6 py-8 md:py-10">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8 mb-8">
            <div class="lg:col-span-2 space-y-3">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-xl bg-indigo-600 text-white font-bold flex items-center justify-center shadow-md shadow-indigo-600/20 text-xs">
                        MA
                    </div>
                    <div>
                        <span class="font-bold text-sm text-slate-900 dark:text-white block leading-tight">MUTIARA ADMIN V2</span>
                        <span class="text-[10px] uppercase font-semibold text-indigo-600 dark:text-indigo-400 tracking-wider">Laravel Edition</span>
                    </div>
                </div>
                <p class="text-xs text-slate-500 dark:text-slate-400 leading-relaxed max-w-sm">
                    Platform kendali data terintegrasi untuk pemantauan transaksi realtime, katalog inventaris, dan analitik performa tinggi.
                </p>
            </div>

            <div>
                <h4 class="text-xs font-bold text-slate-900 dark:text-white uppercase tracking-wider mb-3">Navigasi</h4>
                <ul class="space-y-2 text-[11px]">
                    <li><a href="{{ route('admin.dashboard') }}" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Dashboard Utama</a></li>
                    <li><a href="{{ route('admin.analytics') }}" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Analitik & Grafik</a></li>
                    <li><a href="{{ route('admin.orders') }}" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Transaksi</a></li>
                    <li><a href="{{ route('admin.products') }}" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Katalog Produk</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-xs font-bold text-slate-900 dark:text-white uppercase tracking-wider mb-3">Integrasi</h4>
                <ul class="space-y-2 text-[11px]">
                    <li><a href="#" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Payment Gateway</a></li>
                    <li><a href="#" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Mutasi Bank</a></li>
                    <li><a href="#" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Webhook Realtime</a></li>
                    <li><a href="#" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">REST API Docs</a></li>
                </ul>
            </div>

            <div>
                <h4 class="text-xs font-bold text-slate-900 dark:text-white uppercase tracking-wider mb-3">Sistem</h4>
                <ul class="space-y-2 text-[11px]">
                    <li><a href="{{ route('admin.settings') }}" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Pengaturan Sistem</a></li>
                    <li><a href="{{ route('admin.notifications') }}" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Pusat Notifikasi</a></li>
                    <li><a href="{{ route('admin.profile') }}" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Profil Akun</a></li>
                    <li><a href="#" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Status Server</a></li>
                </ul>
            </div>
        </div>

        <div class="pt-5 border-t border-slate-200/80 dark:border-slate-800 text-[11px] text-slate-400 flex flex-col sm:flex-row items-center justify-between gap-2">
            <div>
                &copy; {{ date('Y') }} <strong class="text-slate-700 dark:text-slate-300">MUTIARA ADMIN V2</strong> LARAVEL VERSION. Hak Cipta Dilindungi.
            </div>
            <div>
                Created by <a href="https://warungerik.com" target="_blank" rel="noopener noreferrer" class="font-semibold text-indigo-600 dark:text-indigo-400 hover:underline">warungerik.com</a>
            </div>
        </div>
    </div>
</footer>
