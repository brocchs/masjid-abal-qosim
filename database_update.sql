-- ============================================
-- SQL QUERY UNTUK PERUBAHAN DATABASE
-- Masjid Abal Qosim - Update Database
-- ============================================

-- 1. DROP TABEL YANG DIHAPUS
-- ============================================
DROP TABLE IF EXISTS `zakat_maals`;
DROP TABLE IF EXISTS `shodaqohs`;

-- 2. TAMBAH KOLOM jenis_zakat PADA TABEL zakats
-- ============================================
ALTER TABLE `zakats` 
ADD COLUMN `jenis_zakat` ENUM('fitrah', 'maal', 'shodaqoh') NOT NULL DEFAULT 'fitrah' AFTER `nama_pembayar`;

-- 3. BUAT TABEL mustahiks BARU
-- ============================================
CREATE TABLE `mustahiks` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `kategori` enum('fakir','miskin','amil','mualaf','riqab','gharim','fisabilillah','ibnu_sabil') NOT NULL,
  `keterangan` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mustahiks_user_id_foreign` (`user_id`),
  CONSTRAINT `mustahiks_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================
-- CATATAN MIGRASI DATA (OPSIONAL)
-- ============================================
-- Jika ada data di tabel zakat_maals yang perlu dipindahkan:
-- INSERT INTO zakats (nama_pembayar, jenis_zakat, jumlah_jiwa, jenis_bayar, total_bayar, tanggal_bayar, keterangan, user_id, created_at, updated_at)
-- SELECT nama_pembayar, 'maal', 1, 'tunai', zakat_dibayar, tanggal_bayar, keterangan, user_id, created_at, updated_at
-- FROM zakat_maals;

-- Jika ada data di tabel shodaqohs yang perlu dipindahkan:
-- INSERT INTO zakats (nama_pembayar, jenis_zakat, jumlah_jiwa, jenis_bayar, total_bayar, tanggal_bayar, keterangan, user_id, created_at, updated_at)
-- SELECT nama_pemberi, 'shodaqoh', 1, 'tunai', jumlah_shodaqoh, tanggal_shodaqoh, keterangan, user_id, created_at, updated_at
-- FROM shodaqohs;
