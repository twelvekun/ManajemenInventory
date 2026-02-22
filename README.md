# Sistem Toko - Role-Based Access Control

Sistem manajemen toko dengan role-based access menggunakan Laravel, Tailwind CSS, dan Spatie Permission.

## Features

- 🔐 Authentication & Authorization
- 👥 Role-Based Access Control (Admin & User)
- 🎨 Modern UI dengan Tailwind CSS
- ⚡ Fast build dengan Vite
- 📊 Dashboard dengan permission-based content
- 🔒 Protected routes dan middleware

## Tech Stack

- Laravel 10
- Tailwind CSS 3
- Vite 5
- Spatie Laravel Permission
- MySQL

## Quick Start

```bash
# Install dependencies
composer install
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Setup database (configure .env first)
php artisan migrate
php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
php artisan migrate
php artisan db:seed --class=RolePermissionSeeder

# Run development servers
php artisan serve
npm run dev
```

## Default Login

**Admin:** admin@example.com / password  
**User:** user@example.com / password

## Roles & Permissions

### Admin (Pemilik Toko)
- ✅ Full access ke semua fitur
- ✅ CRUD Produk
- ✅ Kelola Penjualan
- ✅ Lihat & Buat Laporan
- ✅ Lihat Prediksi Penjualan
- ✅ Akses Overall Data

### User (Karyawan)
- ✅ CRUD Produk
- ✅ Kelola Penjualan
- ✅ Lihat & Buat Laporan
- ❌ Tidak bisa lihat Prediksi
- ❌ Tidak bisa akses Overall Data

## Documentation

Lihat [SETUP_INSTRUCTIONS.md](SETUP_INSTRUCTIONS.md) untuk dokumentasi lengkap.

## License

MIT License

