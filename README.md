# Admin Masjid Abal Qosim - Sistem Keuangan

Sistem manajemen keuangan untuk Masjid Abal Qosim yang dibangun dengan Laravel dan Tailwind CSS.

## Author

**Moch. Alfarisyi**  
- Email: moch.alfarisyi@gmail.com
- GitHub: [@brocchs](https://github.com/brocchs)

---

## Fitur Utama

- ✅ **Manajemen Keuangan**
  - Cash Flow (Pemasukan & Pengeluaran)
  - Laporan keuangan bulanan
  - Dashboard dengan statistik real-time

- ✅ **Manajemen Zakat & Donasi**
  - Zakat Fitrah
  - Zakat Maal
  - Shodaqoh
  - Donasi Umum
  - Wakaf

- ✅ **Sistem Admin**
  - Master User dengan role-based access
  - Master Role management
  - Authentication & Authorization
  - Laporan donatur

- ✅ **UI/UX Modern**
  - Responsive design dengan Tailwind CSS
  - Loading animation yang cantik
  - Tema khusus masjid (hijau)
  - Font Awesome icons
  - Sidebar navigation

## Teknologi yang Digunakan

- **Backend**: Laravel 9
- **Frontend**: Tailwind CSS, Font Awesome
- **Database**: SQLite (development) / MySQL (production)
- **Authentication**: Laravel Sanctum
- **File Storage**: Laravel Storage

## Instalasi

1. Clone repository:
   ```bash
   git clone https://github.com/brocchs/masjid-abal-qosim.git
   cd masjid-abal-qosim
   ```

2. Install dependencies:
   ```bash
   composer install
   npm install
   ```

3. Setup environment:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Setup database:
   ```bash
   php artisan migrate:fresh --seed
   ```

5. Jalankan aplikasi:
   ```bash
   php artisan serve
   ```

6. Akses aplikasi di: `http://localhost:8000`

### Login Default
- **Email**: moch.alfarisyi@gmail.com
- **Password**: Broki123
- **Role**: Admin IT

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

Project ini dilindungi hak cipta. Jika Anda ingin menggunakan, memodifikasi, atau mendistribusikan kode ini, silakan hubungi author terlebih dahulu untuk meminta izin.

**Kontak untuk izin penggunaan:**
- Email: moch.alfarisyi@gmail.com
- GitHub: [@brocchs](https://github.com/brocchs)

---

**© 2025 Moch. Alfarisyi. All rights reserved.**