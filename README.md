# MUTIARA ADMIN — Dashboard Admin Web Laravel

[![License: MIT](https://img.shields.io/badge/License-MIT-blue.svg)](LICENSE)
[![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?logo=laravel)](https://laravel.com)
[![PHP](https://img.shields.io/badge/PHP-8.3+-777BB4?logo=php)](https://php.net)
[![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-4.x-38BDF8?logo=tailwindcss)](https://tailwindcss.com)
[![Vite](https://img.shields.io/badge/Vite-6.x%2F8.x-646CFF?logo=vite)](https://vitejs.dev)

Template dashboard admin web modern berbasis Laravel Blade, Tailwind CSS v4, dan SweetAlert2. Dirancang responsif untuk desktop dan perangkat seluler.

---

## Teknologi Utama

- **Laravel** (`laravel/framework`) — Framework Backend & Templating Blade.
- **Tailwind CSS v4** (`tailwindcss`, `@tailwindcss/vite`) — Framework CSS utility-first.
- **Vite** (`vite`, `laravel-vite-plugin`) — Asset bundler & HMR server.
- **Motion** (`motion`) — Micro-animation & transisi UI.
- **SweetAlert2** (`sweetalert2`) — Dialog konfirmasi dan notifikasi toast.

---

## Modul & Halaman

- **Dashboard Utama** (`/admin/dashboard`) — Ringkasan metrik, grafik performa, dan aktivitas terbaru.
- **Manajemen Pengguna** (`/admin/users`) — Table view, filter, detail modal, dan formulir tambah pengguna (`/admin/users/create`).
- **Pusat Notifikasi** (`/admin/notifications`) — Filter status, penanda dibaca, dan bulk action.
- **Laporan & Analitik** (`/admin/analytics`) — Grafik ringkasan operasional.
- **Katalog Produk** (`/admin/products`) — Pengelolaan stok dan status produk.
- **Daftar Pesanan** (`/admin/orders`) — Ringkasan transaksi dan status pengiriman.
- **Pengaturan Sistem** (`/admin/settings`) — Preferensi sistem dan keamanan.
- **Profil Akun** (`/admin/profile`) — Pengaturan akun pengguna.

---

## Struktur Direktori

```text
webadmin/
├── app/
│   └── Http/
│       └── Controllers/        # Logic Controller (Admin, User, Notification)
├── bootstrap/                  # Inisialisasi aplikasi Laravel
├── config/                     # Berkas konfigurasi Laravel
├── database/
│   ├── factories/              # Factory model
│   ├── migrations/             # Migrasi skema database
│   └── seeders/                # Seeder data awal
├── public/                     # Public root & aset statis
├── resources/
│   ├── css/
│   │   └── app.css             # Konfigurasi Tailwind v4 & custom styles
│   ├── js/
│   │   ├── app.js              # Interaktivitas UI & helper SweetAlert2
│   │   └── bootstrap.js        # Setup Axios / client HTTP
│   └── views/
│       ├── admin/              # Modul admin (dashboard, users, notifications, dll)
│       ├── auth/               # Halaman autentikasi (login, register)
│       ├── errors/             # Halaman error (404, 500)
│       └── layouts/            # Master layout Blade (admin, auth)
├── routes/
│   └── web.php                 # Web routes aplikasi
├── tests/                      # Suite pengujian unit & fitur (PHPUnit)
└── vite.config.js              # Konfigurasi Vite & Laravel plugin
```

---

## Panduan Penggunaan

### Prasyarat

- PHP >= 8.3
- Composer >= 2.x
- Node.js >= 18.x & npm

### 1. Clone Repositori & Install Dependensi

```bash
git clone https://github.com/warungerik/mutiara-admin-v2.git
cd mutiara-admin-v2
composer install
npm install
```

### 2. Konfigurasi Environment

```bash
cp .env.example .env
php artisan key:generate
```

### 3. Migrasi & Seed Database

```bash
php artisan migrate --seed
```

### 4. Jalankan Dev Server

Buka dua terminal terpisah:

```bash
# Terminal 1: Application Server
php artisan serve

# Terminal 2: Asset HMR Bundler
npm run dev
```

Akses aplikasi di `http://127.0.0.1:8000`.

### 5. Pengujian

```bash
php artisan test
```

---

## Lisensi

Proyek ini dirilis di bawah [MIT License](./LICENSE).

---

## Pengembang & Dukungan

Dikembangkan oleh [warungerik.com](https://warungerik.com).
