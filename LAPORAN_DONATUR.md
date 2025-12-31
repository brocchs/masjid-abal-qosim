# Laporan Donatur - Donasi & Wakaf

## Fitur yang Ditambahkan

### 1. Model Wakaf
- **File**: `app/Models/Wakaf.php`
- **Fungsi**: Mengelola data wakaf dari donatur
- **Fields**:
  - `nama_pemberi`: Nama donatur
  - `jumlah_wakaf`: Jumlah wakaf (decimal)
  - `tanggal_wakaf`: Tanggal wakaf
  - `jenis_wakaf`: Jenis wakaf (Uang, Tanah, Bangunan, dll)
  - `keterangan`: Keterangan tambahan
  - `user_id`: ID user yang menginput

### 2. Migration Wakaf
- **File**: `database/migrations/2025_12_30_090000_create_wakafs_table.php`
- **Fungsi**: Membuat tabel `wakafs` di database

### 3. Controller Laporan Donatur
- **File**: `app/Http/Controllers/DonaturReportController.php`
- **Fungsi**: Mengelola laporan donatur untuk donasi dan wakaf
- **Methods**:
  - `index()`: Menampilkan daftar donatur dengan filter
  - `detail()`: Menampilkan detail transaksi per donatur

### 4. Views Laporan
- **File**: `resources/views/reports/donatur.blade.php`
  - Halaman utama laporan donatur
  - Filter berdasarkan tanggal dan jenis (donasi/wakaf/semua)
  - Statistik total donatur, jumlah donasi, dan transaksi
  - Tabel daftar donatur dengan total kontribusi

- **File**: `resources/views/reports/donatur-detail.blade.php`
  - Detail riwayat transaksi per donatur
  - Pisah antara riwayat donasi dan wakaf
  - Total per jenis transaksi

### 5. Routes
- **File**: `routes/web.php`
- **Routes yang ditambahkan**:
  - `GET /reports/donatur` - Halaman laporan donatur
  - `GET /reports/donatur/{nama}` - Detail donatur

### 6. Menu Sidebar
- **File**: `resources/views/layouts/app.blade.php`
- **Penambahan**: Menu "Laporan Donatur" di bawah menu "Donasi & Wakaf"

### 7. Seeders
- **File**: `database/seeders/ShodaqohSeeder.php` - Data sample donasi
- **File**: `database/seeders/WakafSeeder.php` - Data sample wakaf
- **File**: `database/seeders/DatabaseSeeder.php` - Updated untuk menjalankan seeder baru

## Cara Menggunakan

### 1. Jalankan Migration
```bash
php artisan migrate
```

### 2. Jalankan Seeder (Opsional)
```bash
php artisan db:seed --class=ShodaqohSeeder
php artisan db:seed --class=WakafSeeder
```

### 3. Akses Laporan
1. Login ke sistem admin
2. Buka menu "Donasi & Wakaf" di sidebar
3. Klik "Laporan Donatur"
4. Gunakan filter untuk menyaring data:
   - **Tanggal Mulai/Akhir**: Filter berdasarkan periode
   - **Jenis**: Pilih "Semua", "Donasi", atau "Wakaf"
5. Klik nama donatur untuk melihat detail transaksi

## Fitur Laporan

### Halaman Utama
- **Statistik Dashboard**:
  - Total Donatur
  - Total Donasi & Wakaf
  - Total Transaksi
- **Filter Data**:
  - Filter berdasarkan tanggal
  - Filter berdasarkan jenis (donasi/wakaf/semua)
- **Tabel Donatur**:
  - Nama donatur
  - Jenis kontribusi
  - Total donasi
  - Jumlah transaksi
  - Link detail

### Halaman Detail Donatur
- **Ringkasan**:
  - Total donasi dengan jumlah transaksi
  - Total wakaf dengan jumlah transaksi
- **Riwayat Transaksi**:
  - Tabel riwayat donasi (tanggal, jumlah, keterangan)
  - Tabel riwayat wakaf (tanggal, jenis, jumlah, keterangan)

## Teknologi yang Digunakan
- **Backend**: Laravel (Controller, Model, Migration)
- **Frontend**: Tailwind CSS (responsive design)
- **Database**: SQLite (sesuai dengan sistem yang ada)
- **Icons**: Font Awesome

## Keamanan
- Middleware `auth` untuk semua route laporan
- Validasi input pada filter
- Sanitasi data sebelum ditampilkan

Fitur ini terintegrasi dengan sistem yang sudah ada dan menggunakan desain yang konsisten dengan tema masjid (warna hijau).