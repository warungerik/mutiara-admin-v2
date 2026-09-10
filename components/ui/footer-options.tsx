import React, { useState } from "react";

export const MinimalAdminFooter: React.FC = () => {
  return (
    <footer className="w-full border-t border-slate-200 dark:border-slate-800 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md px-4 sm:px-6 py-3.5 text-xs text-slate-500 dark:text-slate-400">
      <div className="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-3">
        <div className="flex items-center gap-2.5">
          <span className="font-bold text-slate-800 dark:text-slate-200 tracking-tight">MUTIARA ADMIN</span>
          <span className="text-[11px] px-2 py-0.5 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 font-mono">v2.4.0</span>
          <span className="hidden sm:inline text-slate-300 dark:text-slate-700">•</span>
          <span className="text-[11px]">&copy; {new Date().getFullYear()} Hak Cipta Dilindungi</span>
        </div>

        <div className="flex items-center gap-5 text-[11px]">
          <div className="flex items-center gap-1.5 font-medium text-emerald-600 dark:text-emerald-400">
            <span className="relative flex h-2 w-2">
              <span className="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
              <span className="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
            </span>
            <span>Semua Sistem Normal</span>
          </div>

          <span className="text-slate-300 dark:text-slate-700">•</span>

          <nav className="flex items-center gap-3">
            <a href="#" className="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Dokumentasi</a>
            <a href="#" className="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Changelog</a>
            <a href="#" className="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Bantuan API</a>
          </nav>

          <div className="hidden lg:flex items-center gap-1 text-[10px] font-mono px-2 py-1 rounded-md bg-slate-100 dark:bg-slate-800 text-slate-400">
            <span>Cmd / Ctrl</span>
            <span>+</span>
            <span>K</span>
          </div>
        </div>
      </div>
    </footer>
  );
};

export const ModernSaasFooter: React.FC = () => {
  return (
    <footer className="w-full border-t border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-950 text-slate-600 dark:text-slate-400 text-xs">
      <div className="max-w-7xl mx-auto px-6 py-12 lg:py-16">
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 lg:gap-12 mb-12">
          
          <div className="lg:col-span-2 space-y-4">
            <div className="flex items-center gap-3">
              <div className="w-9 h-9 rounded-xl bg-indigo-600 text-white font-bold flex items-center justify-center shadow-md shadow-indigo-600/20 text-sm">
                MA
              </div>
              <div>
                <span className="font-bold text-base text-slate-900 dark:text-white block tracking-tight">MUTIARA ADMIN</span>
                <span className="text-[10px] uppercase font-semibold text-indigo-600 dark:text-indigo-400 tracking-wider">Enterprise Management</span>
              </div>
            </div>
            
            <p className="text-xs text-slate-500 dark:text-slate-400 leading-relaxed max-w-sm">
              Platform dashboard terintegrasi untuk pemantauan transaksi realtime, katalog inventaris, serta laporan analitik performa tinggi.
            </p>
          </div>

          <div>
            <h4 className="text-xs font-bold text-slate-900 dark:text-white uppercase tracking-wider mb-4">Navigasi Utama</h4>
            <ul className="space-y-2.5">
              <li><a href="#" className="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Dashboard Utama</a></li>
              <li><a href="#" className="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Analitik & Grafik</a></li>
              <li><a href="#" className="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Manajemen Transaksi</a></li>
              <li><a href="#" className="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Katalog Produk</a></li>
            </ul>
          </div>

          <div>
            <h4 className="text-xs font-bold text-slate-900 dark:text-white uppercase tracking-wider mb-4">Integrasi</h4>
            <ul className="space-y-2.5">
              <li><a href="#" className="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Payment Gateway</a></li>
              <li><a href="#" className="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Webhook Realtime</a></li>
              <li><a href="#" className="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">REST API Docs</a></li>
              <li><a href="#" className="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Audit Trail Logs</a></li>
            </ul>
          </div>

          <div>
            <h4 className="text-xs font-bold text-slate-900 dark:text-white uppercase tracking-wider mb-4">Keamanan</h4>
            <ul className="space-y-2.5">
              <li><a href="#" className="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Kebijakan Privasi</a></li>
              <li><a href="#" className="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Syarat Layanan</a></li>
              <li><a href="#" className="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Enkripsi Data</a></li>
              <li><a href="#" className="hover:text-indigo-600 dark:hover:text-indigo-400 transition-colors">Status Server</a></li>
            </ul>
          </div>
        </div>

        <div className="pt-8 border-t border-slate-200 dark:border-slate-800 flex flex-col sm:flex-row items-center justify-between gap-4 text-slate-400 text-[11px]">
          <div>
            &copy; {new Date().getFullYear()} MUTIARA ADMIN V2 Laravel Edition. Dikembangkan untuk efisiensi tim Anda.
          </div>
          <div className="flex items-center gap-4">
            <span className="hover:text-slate-600 dark:hover:text-slate-300 cursor-pointer">Status Operasional</span>
            <span>•</span>
            <span className="hover:text-slate-600 dark:hover:text-slate-300 cursor-pointer">Bantuan Darurat</span>
          </div>
        </div>
      </div>
    </footer>
  );
};

export const FloatingCommandFooter: React.FC = () => {
  const [isExpanded, setIsExpanded] = useState(false);

  return (
    <div className="fixed bottom-4 inset-x-0 z-40 px-4 flex justify-center pointer-events-none">
      <div className="pointer-events-auto w-full max-w-2xl bg-white/90 dark:bg-slate-900/90 backdrop-blur-xl border border-slate-200/80 dark:border-slate-800/80 rounded-2xl shadow-2xl p-2.5 text-xs transition-all duration-300">
        <div className="flex items-center justify-between gap-3 px-2">
          <div className="flex items-center gap-2.5">
            <div className="w-7 h-7 rounded-lg bg-indigo-600 text-white font-bold flex items-center justify-center text-xs shadow-xs">
              M2
            </div>
            <div>
              <span className="font-semibold text-slate-900 dark:text-white block leading-none">MUTIARA ADMIN</span>
              <span className="text-[10px] text-emerald-600 dark:text-emerald-400 font-medium">● Latency: 24ms</span>
            </div>
          </div>

          <div className="flex items-center gap-1.5">
            <button
              type="button"
              onClick={() => setIsExpanded(!isExpanded)}
              className="px-3 py-1.5 rounded-xl bg-slate-100 hover:bg-slate-200 dark:bg-slate-800 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-200 font-medium transition-colors flex items-center gap-1.5"
            >
              <span>{isExpanded ? "Tutup Info" : "Info Sistem"}</span>
              <svg className={`w-3.5 h-3.5 transition-transform ${isExpanded ? "rotate-180" : ""}`} fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M19 9l-7 7-7-7" />
              </svg>
            </button>

            <a
              href="#"
              className="px-3.5 py-1.5 rounded-xl bg-indigo-600 hover:bg-indigo-700 text-white font-semibold transition-colors shadow-xs"
            >
              Bantuan
            </a>
          </div>
        </div>

        {isExpanded && (
          <div className="mt-3 pt-3 border-t border-slate-100 dark:border-slate-800 px-2 grid grid-cols-3 gap-3 text-center animate-fadeIn">
            <div className="p-2 rounded-xl bg-slate-50 dark:bg-slate-800/60">
              <span className="text-[10px] text-slate-400 block">Database</span>
              <span className="font-bold text-slate-800 dark:text-slate-200">PostgreSQL</span>
            </div>
            <div className="p-2 rounded-xl bg-slate-50 dark:bg-slate-800/60">
              <span className="text-[10px] text-slate-400 block">Framework</span>
              <span className="font-bold text-indigo-600 dark:text-indigo-400">Laravel 12</span>
            </div>
            <div className="p-2 rounded-xl bg-slate-50 dark:bg-slate-800/60">
              <span className="text-[10px] text-slate-400 block">Status Node</span>
              <span className="font-bold text-emerald-600 dark:text-emerald-400">Active</span>
            </div>
          </div>
        )}
      </div>
    </div>
  );
};

export default function FooterShowcase() {
  const [activeTab, setActiveTab] = useState<"minimal" | "saas" | "floating">("minimal");

  return (
    <div className="min-h-screen bg-slate-100 dark:bg-slate-950 p-6 flex flex-col justify-between">
      <div className="max-w-4xl mx-auto w-full mb-10 text-center">
        <h1 className="text-2xl font-bold text-slate-900 dark:text-white mb-2">
          Pilihan Footer MUTIARA ADMIN V2 (React)
        </h1>
        <p className="text-xs text-slate-500 dark:text-slate-400 mb-6">
          Pilih salah satu varian di bawah ini untuk melihat pratinjau komponen:
        </p>

        <div className="inline-flex p-1 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm gap-1">
          <button
            onClick={() => setActiveTab("minimal")}
            className={`px-4 py-2 rounded-xl text-xs font-semibold transition-all ${
              activeTab === "minimal"
                ? "bg-indigo-600 text-white shadow-xs"
                : "text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800"
            }`}
          >
            1. Minimalist Bar
          </button>
          <button
            onClick={() => setActiveTab("saas")}
            className={`px-4 py-2 rounded-xl text-xs font-semibold transition-all ${
              activeTab === "saas"
                ? "bg-indigo-600 text-white shadow-xs"
                : "text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800"
            }`}
          >
            2. Modern SaaS Multi-Column
          </button>
          <button
            onClick={() => setActiveTab("floating")}
            className={`px-4 py-2 rounded-xl text-xs font-semibold transition-all ${
              activeTab === "floating"
                ? "bg-indigo-600 text-white shadow-xs"
                : "text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800"
            }`}
          >
            3. Floating Island Command
          </button>
        </div>
      </div>

      <div className="w-full">
        {activeTab === "minimal" && <MinimalAdminFooter />}
        {activeTab === "saas" && <ModernSaasFooter />}
        {activeTab === "floating" && <FloatingCommandFooter />}
      </div>
    </div>
  );
}
