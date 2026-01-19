<p align="center">
  <a href="https://postimg.cc/WtWg3KHG" target="_blank">
    <img src="https://i.postimg.cc/02xft1GB/download-3.png" 
         alt="Logo Tani Dieng" 
         width="200" 
         height="200">
  </a>
</p>
<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

<p align="center">
  Website jual beli hasil pertanian <strong>Kelompok Tani Dieng</strong> berbasis Laravel Framework.  
  <br><strong>Status:</strong> 🚧 <em>Masih dalam tahap pengembangan (On Progress)</em> — <strong>2025</strong>
</p>

# Requirements
1) PHP ≥ 8.2 (disarankan 8.2–8.3; 8.4 juga oke untuk Laravel 12)
2) Composer ≥ 2.6
3) Node.js ≥ 18 & npm ≥ 9
4) MySQL/MariaDB (Laragon/XAMPP)
5) Git

# Instalation
### Clone & masuk folder
```bash
git clone https://github.com/FahrialRamadhan/TaniDieng.git.git
cd <nama-folder-repo>
```
### Install dependency
```bash
composer install
npm install
```

### Buat file .env
```bash
cp .env.example .env
php artisan key:generate
```
### Create Database
Masuk ke MySQL
```bash
mysql -u root -p
```
Lalu buat database untuk proyek ini:
```bash
CREATE DATABASE tani_dieng;
```
Migrasi & (opsional) seeding
```bash
php artisan migrate
```

### Jalankan server & Vite
Di terminal 1:
```bash
php artisan serve
```

Di terminal 2:
```bash
npm run dev
```


> 📝 **Catatan:**  
> Struktur ini mengikuti pola standar Laravel. Jika proyek menggunakan framework frontend tambahan (mis. Vue/React), maka sebagian logika tampilan juga akan dikelola melalui `resources/js/` dan dikompilasi oleh Vite.

---
