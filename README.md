# Admin Masjid Abal Qosim - Sistem Keuangan

Sistem manajemen keuangan untuk Masjid Abal Qosim yang dibangun dengan Laravel dan Bootstrap.

## Fitur Utama

- ✅ **Manajemen Transaksi Keuangan**
  - Pencatatan pemasukan (credit) dan pengeluaran (debit)
  - Upload invoice/bukti transaksi (PDF, JPG, JPEG, PNG)
  - Edit dan hapus transaksi
  - Detail transaksi lengkap

- ✅ **Dashboard Keuangan**
  - Ringkasan total pemasukan
  - Ringkasan total pengeluaran
  - Saldo keuangan real-time
  - Daftar transaksi dengan pagination

- ✅ **Interface Admin**
  - Tema khusus masjid dengan warna hijau
  - Responsive design dengan Bootstrap 5
  - Icon Font Awesome
  - Sidebar navigasi

## Teknologi yang Digunakan

- **Backend**: Laravel 9
- **Frontend**: Bootstrap 5, Font Awesome
- **Database**: SQLite (mudah untuk development)
- **File Storage**: Laravel Storage dengan symbolic link

## Instalasi

1. Clone atau download project ini
2. Masuk ke direktori project:
   ```bash
   cd masjid-admin
   ```

3. Install dependencies:
   ```bash
   composer install
   ```

4. Copy file environment:
   ```bash
   copy .env.example .env
   ```

5. Generate application key:
   ```bash
   php artisan key:generate
   ```

6. Jalankan migration:
   ```bash
   php artisan migrate
   ```

7. Buat symbolic link untuk storage:
   ```bash
   php artisan storage:link
   ```

8. (Opsional) Seed data sample:
   ```bash
   php artisan db:seed --class=TransactionSeeder
   ```

9. Jalankan development server:
   ```bash
   php artisan serve
   ```

10. Buka browser dan akses: `http://localhost:8000`

## Struktur Database

### Tabel `transactions`
- `id` - Primary key
- `type` - Jenis transaksi (debit/credit)
- `amount` - Jumlah uang (decimal 15,2)
- `description` - Deskripsi transaksi
- `invoice_file` - Path file invoice (nullable)
- `transaction_date` - Tanggal transaksi
- `created_at` - Waktu dibuat
- `updated_at` - Waktu diupdate

## Penggunaan

### Menambah Transaksi
1. Klik tombol "Tambah Transaksi" di dashboard
2. Pilih jenis transaksi (Pemasukan/Pengeluaran)
3. Masukkan jumlah dan deskripsi
4. Pilih tanggal transaksi
5. Upload invoice jika ada
6. Klik "Simpan Transaksi"

### Mengelola Transaksi
- **Lihat Detail**: Klik icon mata (👁️) pada daftar transaksi
- **Edit**: Klik icon edit (✏️) untuk mengubah data
- **Hapus**: Klik icon trash (🗑️) untuk menghapus (dengan konfirmasi)

### Upload Invoice
- Format yang didukung: PDF, JPG, JPEG, PNG
- Maksimal ukuran file: 2MB
- File akan disimpan di `storage/app/public/invoices/`

## Kustomisasi

### Mengubah Tema Warna
Edit file `resources/views/layouts/app.blade.php` pada bagian CSS:
```css
.sidebar {
    background: linear-gradient(135deg, #2c5530, #4a7c59); /* Ubah warna sidebar */
}
.btn-success {
    background-color: #2c5530; /* Ubah warna tombol */
}
```

### Menambah Menu Sidebar
Edit file `resources/views/layouts/app.blade.php` pada bagian sidebar navigation.

## Keamanan

- Validasi input pada semua form
- File upload dengan validasi tipe dan ukuran
- CSRF protection pada semua form
- Sanitasi data sebelum disimpan ke database

## Kontribusi

Project ini dibuat untuk keperluan manajemen keuangan Masjid Abal Qosim. Silakan lakukan modifikasi sesuai kebutuhan.

## Lisensi

Open source - silakan digunakan dan dimodifikasi sesuai kebutuhan.