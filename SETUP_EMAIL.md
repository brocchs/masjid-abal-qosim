# Panduan Setup Email untuk Fitur Lupa Password

## Konfigurasi Email di .env

File `.env` sudah dikonfigurasi untuk menggunakan Gmail SMTP. Anda perlu mengganti nilai berikut:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=your-email@gmail.com          # Ganti dengan email Gmail Anda
MAIL_PASSWORD=your-app-password             # Ganti dengan App Password Gmail
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="your-email@gmail.com"    # Ganti dengan email Gmail Anda
MAIL_FROM_NAME="Masjid Abal Qosim"
```

## Cara Mendapatkan App Password Gmail

1. **Login ke akun Gmail Anda**

2. **Aktifkan 2-Step Verification**
   - Buka: https://myaccount.google.com/security
   - Cari "2-Step Verification" dan aktifkan

3. **Generate App Password**
   - Buka: https://myaccount.google.com/apppasswords
   - Pilih "Select app" → Pilih "Mail"
   - Pilih "Select device" → Pilih "Other (Custom name)"
   - Ketik nama: "Masjid Abal Qosim"
   - Klik "Generate"
   - Copy password yang muncul (16 karakter tanpa spasi)
   - Paste ke `MAIL_PASSWORD` di file `.env`

4. **Update file .env**
   ```env
   MAIL_USERNAME=emailanda@gmail.com
   MAIL_PASSWORD=abcd efgh ijkl mnop  # Password 16 karakter dari Gmail
   MAIL_FROM_ADDRESS="emailanda@gmail.com"
   ```

5. **Clear cache Laravel**
   ```bash
   php artisan config:clear
   php artisan cache:clear
   ```

## Alternatif: Menggunakan Mailtrap (untuk Testing)

Jika ingin testing tanpa mengirim email sungguhan:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your-mailtrap-username
MAIL_PASSWORD=your-mailtrap-password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="noreply@masjidabalqosim.com"
MAIL_FROM_NAME="Masjid Abal Qosim"
```

Daftar di: https://mailtrap.io

## Testing Fitur Lupa Password

1. Buka halaman login
2. Klik "Lupa Password?"
3. Masukkan email yang terdaftar di database
4. Klik "Kirim Link Reset"
5. Cek email untuk link reset password
6. Klik link dan masukkan password baru

## Troubleshooting

### Error: "Failed to authenticate on SMTP server"
- Pastikan App Password sudah benar
- Pastikan 2-Step Verification sudah aktif
- Coba generate App Password baru

### Error: "Connection could not be established"
- Pastikan koneksi internet aktif
- Cek firewall tidak memblokir port 587
- Coba ganti `MAIL_PORT=465` dan `MAIL_ENCRYPTION=ssl`

### Email tidak masuk
- Cek folder Spam/Junk
- Pastikan email terdaftar di database users
- Cek log Laravel: `storage/logs/laravel.log`
