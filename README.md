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

Kelompok Tani Dieng adalah komunitas petani yang berfokus pada pengelolaan dan pemasaran hasil pertanian khas dataran tinggi Dieng, Jawa Tengah.
Melalui website TaniDieng, kami menghadirkan platform digital untuk mempermudah proses jual beli hasil tani secara langsung antara petani dan konsumen tanpa perantara.

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


# Struktur Proyek taniDieng
Proyek ini dibangun menggunakan **Laravel Framework**, yang secara umum terbagi menjadi dua lingkup utama: **Backend (Server-Side)** dan **Frontend (Client-Side)**.  
Berikut penjelasan struktur direktorinya:

---

## 🧩 Backend (Server-Side)

Bagian ini menangani **logika aplikasi**, **pengelolaan data**, serta **interaksi dengan database**.  
Semua proses yang terjadi di sisi server berada pada lingkup ini.

| Folder / File | Deskripsi |
|----------------|-----------|
| **app/** | Berisi logika utama aplikasi seperti *Models*, *Controllers*, *Middleware*, dan *Providers*. |
| **bootstrap/** | Menginisialisasi dan men-boot aplikasi Laravel. |
| **config/** | Menyimpan konfigurasi aplikasi (database, mail, cache, dsb). |
| **database/** | Berisi *migrations*, *seeders*, dan *factories* untuk pengelolaan struktur database. |
| **routes/** | Menentukan rute aplikasi (`web.php`, `api.php`) untuk menghubungkan URL dengan controller. |
| **storage/** | Tempat penyimpanan *logs*, *cache*, file sementara, dan *uploads*. |
| **tests/** | Berisi pengujian otomatis (unit & feature tests). |
| **.env / .env.example** | Menyimpan konfigurasi environment seperti koneksi database, API key, dsb. |
| **artisan** | Command Line Interface Laravel untuk menjalankan perintah (migrate, serve, cache, dsb). |
| **composer.json / composer.lock** | Mengatur dependensi PHP yang digunakan pada backend. |
| **phpunit.xml** | Konfigurasi untuk testing otomatis menggunakan PHPUnit. |

---

## 🎨 Frontend (Client-Side)

Bagian ini berhubungan dengan **tampilan antarmuka pengguna (UI)** dan file statis yang diakses browser.

| Folder / File | Deskripsi |
|----------------|-----------|
| **resources/** | Menyimpan file tampilan (*Blade templates*), CSS, JavaScript, serta aset mentah (Vue/React jika digunakan). |
| **public/** | Folder publik yang diakses langsung oleh browser. Berisi `index.php`, hasil build JS/CSS, dan aset gambar. |
| **vite.config.js** | Konfigurasi *Vite bundler* untuk mem-build file frontend (CSS, JS, dan framework frontend). |
| **package.json / package-lock.json** | Mengatur dependensi JavaScript untuk kebutuhan tampilan (mis. Tailwind, Vue, React). |

> 📝 **Catatan:**  
> Struktur ini mengikuti pola standar Laravel. Jika proyek menggunakan framework frontend tambahan (mis. Vue/React), maka sebagian logika tampilan juga akan dikelola melalui `resources/js/` dan dikompilasi oleh Vite.

---
