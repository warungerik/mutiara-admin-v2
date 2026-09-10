<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(): View
    {
        $metrics = [
            [
                'title' => 'Total Pendapatan',
                'value' => 'Rp 142.850.000',
                'change' => '+14.2%',
                'trend' => 'up',
                'period' => 'vs bulan lalu',
                'icon' => 'currency',
                'color' => 'indigo',
            ],
            [
                'title' => 'Pengguna Aktif',
                'value' => '2.845',
                'change' => '+8.1%',
                'trend' => 'up',
                'period' => 'vs bulan lalu',
                'icon' => 'users',
                'color' => 'emerald',
            ],
            [
                'title' => 'Pesanan Baru',
                'value' => '642',
                'change' => '-2.4%',
                'trend' => 'down',
                'period' => 'vs bulan lalu',
                'icon' => 'shopping-cart',
                'color' => 'amber',
            ],
            [
                'title' => 'Tingkat Konversi',
                'value' => '3.85%',
                'change' => '+1.6%',
                'trend' => 'up',
                'period' => 'vs bulan lalu',
                'icon' => 'trending-up',
                'color' => 'sky',
            ],
        ];

        $chartPoints = [
            ['day' => 'Sen', 'val' => 45, 'height' => '45%'],
            ['day' => 'Sel', 'val' => 70, 'height' => '70%'],
            ['day' => 'Rab', 'val' => 55, 'height' => '55%'],
            ['day' => 'Kam', 'val' => 90, 'height' => '90%'],
            ['day' => 'Jum', 'val' => 65, 'height' => '65%'],
            ['day' => 'Sab', 'val' => 85, 'height' => '85%'],
            ['day' => 'Min', 'val' => 100, 'height' => '100%'],
        ];

        $recentOrders = [
            [
                'code' => 'INV-2026-081',
                'customer' => 'Ahmad Fadhil',
                'email' => 'ahmad@example.com',
                'item' => 'Paket Cloud Pro (1 Tahun)',
                'amount' => 'Rp 1.450.000',
                'status' => 'Success',
                'date' => '10 Sep 2026',
            ],
            [
                'code' => 'INV-2026-080',
                'customer' => 'Siti Nurhaliza',
                'email' => 'siti.n@example.com',
                'item' => 'Template SaaS Starter Kit',
                'amount' => 'Rp 450.000',
                'status' => 'Pending',
                'date' => '10 Sep 2026',
            ],
            [
                'code' => 'INV-2026-079',
                'customer' => 'Budi Santoso',
                'email' => 'budi.s@example.com',
                'item' => 'Lisensi Multi-App Unlimited',
                'amount' => 'Rp 3.800.000',
                'status' => 'Success',
                'date' => '09 Sep 2026',
            ],
            [
                'code' => 'INV-2026-078',
                'customer' => 'Rina Wijaya',
                'email' => 'rina.w@example.com',
                'item' => 'Addon Domain Kustom',
                'amount' => 'Rp 150.000',
                'status' => 'Failed',
                'date' => '09 Sep 2026',
            ],
            [
                'code' => 'INV-2026-077',
                'customer' => 'Eko Prasetyo',
                'email' => 'eko.p@example.com',
                'item' => 'Langganan Tahunan Starter',
                'amount' => 'Rp 850.000',
                'status' => 'Success',
                'date' => '08 Sep 2026',
            ],
        ];

        $activities = [
            [
                'user' => 'Super Admin',
                'action' => 'memperbarui konfigurasi sistem pembayaran',
                'time' => '10m lalu',
                'badge' => 'System',
            ],
            [
                'user' => 'Ahmad Fadhil',
                'action' => 'menyelesaikan pembayaran invoice #INV-2026-081',
                'time' => '25m lalu',
                'badge' => 'Billing',
            ],
            [
                'user' => 'Budi Santoso',
                'action' => 'memperbarui profil pengguna',
                'time' => '1j lalu',
                'badge' => 'User',
            ],
            [
                'user' => 'Backup Otomatis',
                'action' => 'pencadangan data selesai (2.4 GB)',
                'time' => '3j lalu',
                'badge' => 'Cron',
            ],
        ];

        return view('admin.dashboard', compact('metrics', 'chartPoints', 'recentOrders', 'activities'));
    }

    public function users(Request $request): View
    {
        $users = [
            [
                'id' => 1,
                'name' => 'Alfi Pratama',
                'email' => 'alfi.pratama@example.com',
                'role' => 'Super Admin',
                'status' => 'Active',
                'created_at' => '12 Jan 2025',
                'avatar' => 'AP',
            ],
            [
                'id' => 2,
                'name' => 'Dewi Anggraini',
                'email' => 'dewi.a@example.com',
                'role' => 'Manager',
                'status' => 'Active',
                'created_at' => '04 Feb 2025',
                'avatar' => 'DA',
            ],
            [
                'id' => 3,
                'name' => 'Hendra Kusuma',
                'email' => 'hendra.k@example.com',
                'role' => 'Editor',
                'status' => 'Pending',
                'created_at' => '18 Mar 2025',
                'avatar' => 'HK',
            ],
            [
                'id' => 4,
                'name' => 'Maya Indah',
                'email' => 'maya.indah@example.com',
                'role' => 'User',
                'status' => 'Active',
                'created_at' => '22 Apr 2025',
                'avatar' => 'MI',
            ],
            [
                'id' => 5,
                'name' => 'Reza Pahlevi',
                'email' => 'reza.p@example.com',
                'role' => 'User',
                'status' => 'Inactive',
                'created_at' => '10 Mei 2025',
                'avatar' => 'RP',
            ],
            [
                'id' => 6,
                'name' => 'Citra Lestari',
                'email' => 'citra.l@example.com',
                'role' => 'Manager',
                'status' => 'Active',
                'created_at' => '01 Jun 2025',
                'avatar' => 'CL',
            ],
            [
                'id' => 7,
                'name' => 'Gerry Firmansyah',
                'email' => 'gerry.f@example.com',
                'role' => 'User',
                'status' => 'Pending',
                'created_at' => '15 Jul 2025',
                'avatar' => 'GF',
            ],
            [
                'id' => 8,
                'name' => 'Nadia Safitri',
                'email' => 'nadia.s@example.com',
                'role' => 'Editor',
                'status' => 'Active',
                'created_at' => '30 Agu 2025',
                'avatar' => 'NS',
            ],
        ];

        return view('admin.users.index', compact('users'));
    }

    public function createUser(): View
    {
        return view('admin.users.create');
    }

    public function storeUser(Request $request): RedirectResponse
    {
        return redirect()->route('admin.users.index')->with('success', 'Data pengguna berhasil disimpan.');
    }

    public function analytics(): View
    {
        $stats = [
            [
                'title' => 'Total Kunjungan',
                'value' => '184.920',
                'change' => '+18.4%',
                'trend' => 'up',
                'period' => 'vs 30 hari lalu',
                'color' => 'indigo',
            ],
            [
                'title' => 'Page Views',
                'value' => '542.100',
                'change' => '+12.1%',
                'trend' => 'up',
                'period' => 'vs 30 hari lalu',
                'color' => 'emerald',
            ],
            [
                'title' => 'Rasio Pantulan (Bounce)',
                'value' => '28.4%',
                'change' => '-3.2%',
                'trend' => 'down',
                'period' => 'vs 30 hari lalu',
                'color' => 'sky',
            ],
            [
                'title' => 'Durasi Sesi',
                'value' => '4m 38s',
                'change' => '+22.5%',
                'trend' => 'up',
                'period' => 'vs 30 hari lalu',
                'color' => 'amber',
            ],
        ];

        $trafficSources = [
            ['name' => 'Mesin Pencari (SEO)', 'percentage' => 46, 'visitors' => '85.063', 'color' => 'bg-indigo-600'],
            ['name' => 'Trafik Langsung (Direct)', 'percentage' => 28, 'visitors' => '51.777', 'color' => 'bg-emerald-500'],
            ['name' => 'Media Sosial', 'percentage' => 17, 'visitors' => '31.436', 'color' => 'bg-sky-500'],
            ['name' => 'Referral & Partner', 'percentage' => 9, 'visitors' => '16.644', 'color' => 'bg-amber-500'],
        ];

        $topPages = [
            ['path' => '/admin/dashboard', 'title' => 'Dashboard Overview', 'views' => '142.300', 'unique' => '89.400'],
            ['path' => '/admin/orders', 'title' => 'Manajemen Transaksi', 'views' => '98.500', 'unique' => '61.200'],
            ['path' => '/admin/products', 'title' => 'Katalog Produk & Lisensi', 'views' => '74.200', 'unique' => '45.100'],
            ['path' => '/admin/users', 'title' => 'Direktori Pengguna', 'views' => '56.900', 'unique' => '33.800'],
            ['path' => '/admin/components', 'title' => 'Dokumentasi UI Kit', 'views' => '41.200', 'unique' => '28.900'],
        ];

        return view('admin.analytics', compact('stats', 'trafficSources', 'topPages'));
    }

    public function orders(): View
    {
        $metrics = [
            ['title' => 'Total Transaksi', 'value' => '1.284', 'change' => '+8.5%', 'color' => 'indigo'],
            ['title' => 'Omzet Sukses', 'value' => 'Rp 284.500.000', 'change' => '+14.2%', 'color' => 'emerald'],
            ['title' => 'Menunggu Pembayaran', 'value' => '24', 'change' => 'Rp 12.400.000', 'color' => 'amber'],
            ['title' => 'Dibatalkan / Refund', 'value' => '6', 'change' => '-0.8%', 'color' => 'rose'],
        ];

        $orders = [
            [
                'id' => 'ORD-2026-108',
                'customer' => 'Ahmad Fadhil',
                'email' => 'ahmad@example.com',
                'product' => 'Paket Cloud Pro (1 Tahun)',
                'amount' => 'Rp 1.450.000',
                'payment_method' => 'BCA Virtual Account',
                'status' => 'Success',
                'date' => '10 Sep 2026, 11:42',
            ],
            [
                'id' => 'ORD-2026-107',
                'customer' => 'Siti Nurhaliza',
                'email' => 'siti.n@example.com',
                'product' => 'Mutiara Admin SaaS License',
                'amount' => 'Rp 750.000',
                'payment_method' => 'QRIS GoPay',
                'status' => 'Pending',
                'date' => '10 Sep 2026, 10:15',
            ],
            [
                'id' => 'ORD-2026-106',
                'customer' => 'Budi Santoso',
                'email' => 'budi.s@example.com',
                'product' => 'Lisensi Unlimited Multi-App',
                'amount' => 'Rp 3.800.000',
                'payment_method' => 'Mandiri VA',
                'status' => 'Success',
                'date' => '09 Sep 2026, 16:30',
            ],
            [
                'id' => 'ORD-2026-105',
                'customer' => 'Rina Wijaya',
                'email' => 'rina.w@example.com',
                'product' => 'Addon Domain Kustom SSL',
                'amount' => 'Rp 250.000',
                'payment_method' => 'Credit Card (Visa)',
                'status' => 'Failed',
                'date' => '09 Sep 2026, 14:08',
            ],
            [
                'id' => 'ORD-2026-104',
                'customer' => 'Eko Prasetyo',
                'email' => 'eko.p@example.com',
                'product' => 'Paket Hosting Starter',
                'amount' => 'Rp 850.000',
                'payment_method' => 'BNI Virtual Account',
                'status' => 'Success',
                'date' => '08 Sep 2026, 09:20',
            ],
            [
                'id' => 'ORD-2026-103',
                'customer' => 'Citra Lestari',
                'email' => 'citra.l@example.com',
                'product' => 'Mutiara Admin UI Kit Mobile',
                'amount' => 'Rp 450.000',
                'payment_method' => 'QRIS OVO',
                'status' => 'Success',
                'date' => '07 Sep 2026, 19:45',
            ],
            [
                'id' => 'ORD-2026-102',
                'customer' => 'Gerry Firmansyah',
                'email' => 'gerry.f@example.com',
                'product' => 'Priority Support 6 Bulan',
                'amount' => 'Rp 1.200.000',
                'payment_method' => 'BCA Virtual Account',
                'status' => 'Pending',
                'date' => '07 Sep 2026, 13:10',
            ],
            [
                'id' => 'ORD-2026-101',
                'customer' => 'Nadia Safitri',
                'email' => 'nadia.s@example.com',
                'product' => 'Template SaaS Starter Kit',
                'amount' => 'Rp 450.000',
                'payment_method' => 'ShopeePay',
                'status' => 'Success',
                'date' => '06 Sep 2026, 08:30',
            ],
        ];

        return view('admin.orders', compact('metrics', 'orders'));
    }

    public function products(): View
    {
        $metrics = [
            ['title' => 'Total Produk', 'value' => '36', 'sub' => 'Item terdaftar', 'color' => 'indigo'],
            ['title' => 'Kategori Aktif', 'value' => '6', 'sub' => 'Template, Cloud, Addon', 'color' => 'emerald'],
            ['title' => 'Stok Kritis', 'value' => '3', 'sub' => 'Di bawah 10 unit', 'color' => 'amber'],
            ['title' => 'Total Penjualan', 'value' => '4.820', 'sub' => 'Lisensi terjual', 'color' => 'sky'],
        ];

        $products = [
            [
                'id' => 1,
                'sku' => 'MUT-TMP-01',
                'name' => 'Mutiara Admin Laravel V2',
                'category' => 'Template Admin',
                'price' => 'Rp 750.000',
                'stock' => 120,
                'sales' => 842,
                'status' => 'Active',
            ],
            [
                'id' => 2,
                'sku' => 'MUT-CLD-PRO',
                'name' => 'Cloud Server NVMe Enterprise',
                'category' => 'Cloud Hosting',
                'price' => 'Rp 1.450.000',
                'stock' => 18,
                'sales' => 310,
                'status' => 'Active',
            ],
            [
                'id' => 3,
                'sku' => 'MUT-LIC-UNL',
                'name' => 'Lisensi Multi-App Unlimited',
                'category' => 'Lisensi Software',
                'price' => 'Rp 3.800.000',
                'stock' => 45,
                'sales' => 195,
                'status' => 'Active',
            ],
            [
                'id' => 4,
                'sku' => 'MUT-ADD-DOM',
                'name' => 'Addon Domain Kustom & Auto-SSL',
                'category' => 'Addon & Plugin',
                'price' => 'Rp 150.000',
                'stock' => 500,
                'sales' => 1420,
                'status' => 'Active',
            ],
            [
                'id' => 5,
                'sku' => 'MUT-HST-STR',
                'name' => 'Paket Hosting Lite SSD',
                'category' => 'Cloud Hosting',
                'price' => 'Rp 450.000',
                'stock' => 6,
                'sales' => 520,
                'status' => 'Low Stock',
            ],
            [
                'id' => 6,
                'sku' => 'MUT-SUP-PRI',
                'name' => 'Dedicated Priority Support (1 Tahun)',
                'category' => 'Layanan Khusus',
                'price' => 'Rp 2.400.000',
                'stock' => 12,
                'sales' => 88,
                'status' => 'Active',
            ],
            [
                'id' => 7,
                'sku' => 'MUT-DSG-FIG',
                'name' => 'UI/UX Kit Figma Source File',
                'category' => 'Design Asset',
                'price' => 'Rp 350.000',
                'stock' => 0,
                'sales' => 640,
                'status' => 'Out of Stock',
            ],
            [
                'id' => 8,
                'sku' => 'MUT-SEC-AUD',
                'name' => 'Security Hardening & SAST Audit',
                'category' => 'Layanan Khusus',
                'price' => 'Rp 5.000.000',
                'stock' => 4,
                'sales' => 28,
                'status' => 'Low Stock',
            ],
        ];

        return view('admin.products', compact('metrics', 'products'));
    }

    public function profile(): View
    {
        $user = [
            'name' => 'Alfi Pratama',
            'email' => 'admin@mutiara.io',
            'role' => 'Super Administrator',
            'phone' => '+62 812-3456-7890',
            'location' => 'Jakarta, Indonesia',
            'bio' => 'Pengelola utama ekosistem MUTIARA ADMIN V2. Memastikan performa, reliabilitas, dan kepatuhan sistem berjalan optimal.',
            'avatar_initials' => 'SA',
            'joined' => '10 Januari 2025',
        ];

        $sessions = [
            [
                'device' => 'Chrome di Windows 11',
                'ip' => '182.253.120.44',
                'location' => 'Jakarta, ID',
                'is_current' => true,
                'time' => 'Sedang aktif',
            ],
            [
                'device' => 'Safari di iPhone 15 Pro',
                'ip' => '114.122.38.19',
                'location' => 'Bandung, ID',
                'is_current' => false,
                'time' => '2 jam yang lalu',
            ],
        ];

        return view('admin.profile', compact('user', 'sessions'));
    }

    public function notifications(): View
    {
        $notifications = [
            [
                'id' => 1,
                'type' => 'order',
                'title' => 'Pembayaran Berhasil Diverifikasi',
                'message' => 'Invoice #ORD-2026-108 sebesar Rp 1.450.000 dari Ahmad Fadhil telah lunas via BCA Virtual Account.',
                'time' => '10 menit yang lalu',
                'is_read' => false,
                'icon' => 'check-circle',
                'color' => 'emerald',
            ],
            [
                'id' => 2,
                'type' => 'security',
                'title' => 'Upaya Login Baru Terdeteksi',
                'message' => 'Login dari perangkat baru (Chrome di Windows, IP: 182.253.120.44) berhasil diverifikasi dengan 2FA.',
                'time' => '45 menit yang lalu',
                'is_read' => false,
                'icon' => 'shield-check',
                'color' => 'indigo',
            ],
            [
                'id' => 3,
                'type' => 'system',
                'title' => 'Pencadangan Database Otomatis Selesai',
                'message' => 'Snapshot database harian berukuran 2.4 GB berhasil diunggah ke penyimpanan cloud aman.',
                'time' => '3 jam yang lalu',
                'is_read' => false,
                'icon' => 'server',
                'color' => 'sky',
            ],
            [
                'id' => 4,
                'type' => 'order',
                'title' => 'Pesanan Baru Menunggu Pembayaran',
                'message' => 'Invoice #ORD-2026-107 oleh Siti Nurhaliza menunggu verifikasi QRIS GoPay.',
                'time' => '5 jam yang lalu',
                'is_read' => true,
                'icon' => 'shopping-cart',
                'color' => 'amber',
            ],
            [
                'id' => 5,
                'type' => 'product',
                'title' => 'Peringatan Stok Kritis Produk',
                'message' => 'Item "Paket Hosting Lite SSD" tersisa 6 unit. Harap tinjau kuota inventaris server.',
                'time' => '1 hari yang lalu',
                'is_read' => true,
                'icon' => 'exclamation-circle',
                'color' => 'rose',
            ],
            [
                'id' => 6,
                'type' => 'user',
                'title' => 'Registrasi Pengguna Baru',
                'message' => 'Nadia Safitri telah membuat akun baru dan terdaftar sebagai role Editor.',
                'time' => '2 hari yang lalu',
                'is_read' => true,
                'icon' => 'user-plus',
                'color' => 'indigo',
            ],
        ];

        return view('admin.notifications', compact('notifications'));
    }

    public function settings(): View
    {
        return view('admin.settings');
    }

    public function components(): View
    {
        return view('admin.components');
    }
}
