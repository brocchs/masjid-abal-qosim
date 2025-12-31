<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Zakat;
use Carbon\Carbon;

class ZakatSeeder extends Seeder
{
    public function run()
    {
        $zakats = [
            [
                'nama_pembayar' => 'Ahmad Suryadi',
                'jumlah_jiwa' => 4,
                'harga_per_jiwa' => 50000,
                'total_bayar' => 200000,
                'tanggal_bayar' => Carbon::now()->subDays(5),
            ],
            [
                'nama_pembayar' => 'Siti Nurhaliza',
                'jumlah_jiwa' => 3,
                'harga_per_jiwa' => 50000,
                'total_bayar' => 150000,
                'tanggal_bayar' => Carbon::now()->subDays(8),
            ],
            [
                'nama_pembayar' => 'Budi Santoso',
                'jumlah_jiwa' => 5,
                'harga_per_jiwa' => 50000,
                'total_bayar' => 250000,
                'tanggal_bayar' => Carbon::now()->subDays(3),
            ],
            [
                'nama_pembayar' => 'Fatimah Zahra',
                'jumlah_jiwa' => 2,
                'harga_per_jiwa' => 50000,
                'total_bayar' => 100000,
                'tanggal_bayar' => Carbon::now()->subDays(10),
            ],
            [
                'nama_pembayar' => 'Muhammad Rizki',
                'jumlah_jiwa' => 6,
                'harga_per_jiwa' => 50000,
                'total_bayar' => 300000,
                'tanggal_bayar' => Carbon::now()->subDays(7),
            ],
            [
                'nama_pembayar' => 'Dewi Sartika',
                'jumlah_jiwa' => 3,
                'harga_per_jiwa' => 50000,
                'total_bayar' => 150000,
                'tanggal_bayar' => Carbon::now()->subDays(12),
            ],
            [
                'nama_pembayar' => 'Hasan Basri',
                'jumlah_jiwa' => 4,
                'harga_per_jiwa' => 50000,
                'total_bayar' => 200000,
                'tanggal_bayar' => Carbon::now()->subDays(6),
            ],
            [
                'nama_pembayar' => 'Khadijah Aisyah',
                'jumlah_jiwa' => 2,
                'harga_per_jiwa' => 50000,
                'total_bayar' => 100000,
                'tanggal_bayar' => Carbon::now()->subDays(9),
            ],
            [
                'nama_pembayar' => 'Ali Rahman',
                'jumlah_jiwa' => 3,
                'harga_per_jiwa' => 50000,
                'total_bayar' => 150000,
                'tanggal_bayar' => Carbon::now()->subDays(4),
            ],
            [
                'nama_pembayar' => 'Maryam Sari',
                'jumlah_jiwa' => 5,
                'harga_per_jiwa' => 50000,
                'total_bayar' => 250000,
                'tanggal_bayar' => Carbon::now()->subDays(11),
            ],
            [
                'nama_pembayar' => 'Usman Hakim',
                'jumlah_jiwa' => 4,
                'harga_per_jiwa' => 50000,
                'total_bayar' => 200000,
                'tanggal_bayar' => Carbon::now()->subDays(2),
            ],
            [
                'nama_pembayar' => 'Zainab Putri',
                'jumlah_jiwa' => 2,
                'harga_per_jiwa' => 50000,
                'total_bayar' => 100000,
                'tanggal_bayar' => Carbon::now()->subDays(14),
            ],
            [
                'nama_pembayar' => 'Ibrahim Malik',
                'jumlah_jiwa' => 6,
                'harga_per_jiwa' => 50000,
                'total_bayar' => 300000,
                'tanggal_bayar' => Carbon::now()->subDays(1),
            ],
            [
                'nama_pembayar' => 'Aminah Wati',
                'jumlah_jiwa' => 3,
                'harga_per_jiwa' => 50000,
                'total_bayar' => 150000,
                'tanggal_bayar' => Carbon::now()->subDays(13),
            ],
            [
                'nama_pembayar' => 'Yusuf Hidayat',
                'jumlah_jiwa' => 4,
                'harga_per_jiwa' => 50000,
                'total_bayar' => 200000,
                'tanggal_bayar' => Carbon::now()->subDays(16),
            ],
            [
                'nama_pembayar' => 'Ruqayyah Indah',
                'jumlah_jiwa' => 2,
                'harga_per_jiwa' => 50000,
                'total_bayar' => 100000,
                'tanggal_bayar' => Carbon::now()->subDays(18),
            ],
            [
                'nama_pembayar' => 'Khalid Fauzi',
                'jumlah_jiwa' => 5,
                'harga_per_jiwa' => 50000,
                'total_bayar' => 250000,
                'tanggal_bayar' => Carbon::now()->subDays(15),
            ],
            [
                'nama_pembayar' => 'Hafsah Lestari',
                'jumlah_jiwa' => 3,
                'harga_per_jiwa' => 50000,
                'total_bayar' => 150000,
                'tanggal_bayar' => Carbon::now()->subDays(20),
            ],
            [
                'nama_pembayar' => 'Salman Wijaya',
                'jumlah_jiwa' => 4,
                'harga_per_jiwa' => 50000,
                'total_bayar' => 200000,
                'tanggal_bayar' => Carbon::now()->subDays(17),
            ],
            [
                'nama_pembayar' => 'Ummu Salamah',
                'jumlah_jiwa' => 2,
                'harga_per_jiwa' => 50000,
                'total_bayar' => 100000,
                'tanggal_bayar' => Carbon::now()->subDays(19),
            ],
            [
                'nama_pembayar' => 'Hamzah Pratama',
                'jumlah_jiwa' => 6,
                'harga_per_jiwa' => 50000,
                'total_bayar' => 300000,
                'tanggal_bayar' => Carbon::now()->subDays(21),
            ],
        ];

        foreach ($zakats as $zakat) {
            Zakat::create($zakat);
        }
    }
}