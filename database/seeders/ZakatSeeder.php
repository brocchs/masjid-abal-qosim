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
            ['nama_pembayar' => 'Ahmad Fauzi', 'jumlah_jiwa' => 4, 'harga_per_jiwa' => 35000, 'tanggal_bayar' => Carbon::now()->subDays(20)],
            ['nama_pembayar' => 'Siti Aminah', 'jumlah_jiwa' => 3, 'harga_per_jiwa' => 35000, 'tanggal_bayar' => Carbon::now()->subDays(19)],
            ['nama_pembayar' => 'Muhammad Rizki', 'jumlah_jiwa' => 5, 'harga_per_jiwa' => 35000, 'tanggal_bayar' => Carbon::now()->subDays(18)],
            ['nama_pembayar' => 'Fatimah Zahra', 'jumlah_jiwa' => 2, 'harga_per_jiwa' => 35000, 'tanggal_bayar' => Carbon::now()->subDays(17)],
            ['nama_pembayar' => 'Abdul Rahman', 'jumlah_jiwa' => 6, 'harga_per_jiwa' => 35000, 'tanggal_bayar' => Carbon::now()->subDays(16)],
            ['nama_pembayar' => 'Khadijah Binti Ali', 'jumlah_jiwa' => 3, 'harga_per_jiwa' => 35000, 'tanggal_bayar' => Carbon::now()->subDays(15)],
            ['nama_pembayar' => 'Umar Bin Khattab', 'jumlah_jiwa' => 4, 'harga_per_jiwa' => 35000, 'tanggal_bayar' => Carbon::now()->subDays(14)],
            ['nama_pembayar' => 'Aisyah Radhiyallahu', 'jumlah_jiwa' => 2, 'harga_per_jiwa' => 35000, 'tanggal_bayar' => Carbon::now()->subDays(13)],
            ['nama_pembayar' => 'Ali Bin Abi Thalib', 'jumlah_jiwa' => 5, 'harga_per_jiwa' => 35000, 'tanggal_bayar' => Carbon::now()->subDays(12)],
            ['nama_pembayar' => 'Zainab Binti Jahsy', 'jumlah_jiwa' => 3, 'harga_per_jiwa' => 35000, 'tanggal_bayar' => Carbon::now()->subDays(11)],
            ['nama_pembayar' => 'Hamzah Bin Abdul', 'jumlah_jiwa' => 4, 'harga_per_jiwa' => 35000, 'tanggal_bayar' => Carbon::now()->subDays(10)],
            ['nama_pembayar' => 'Ruqayyah Binti Rasul', 'jumlah_jiwa' => 2, 'harga_per_jiwa' => 35000, 'tanggal_bayar' => Carbon::now()->subDays(9)],
            ['nama_pembayar' => 'Khalid Bin Walid', 'jumlah_jiwa' => 7, 'harga_per_jiwa' => 35000, 'tanggal_bayar' => Carbon::now()->subDays(8)],
            ['nama_pembayar' => 'Ummu Salamah', 'jumlah_jiwa' => 3, 'harga_per_jiwa' => 35000, 'tanggal_bayar' => Carbon::now()->subDays(7)],
            ['nama_pembayar' => 'Saad Bin Abi Waqqas', 'jumlah_jiwa' => 5, 'harga_per_jiwa' => 35000, 'tanggal_bayar' => Carbon::now()->subDays(6)],
            ['nama_pembayar' => 'Hafshah Binti Umar', 'jumlah_jiwa' => 2, 'harga_per_jiwa' => 35000, 'tanggal_bayar' => Carbon::now()->subDays(5)],
            ['nama_pembayar' => 'Bilal Bin Rabah', 'jumlah_jiwa' => 4, 'harga_per_jiwa' => 35000, 'tanggal_bayar' => Carbon::now()->subDays(4)],
            ['nama_pembayar' => 'Ummu Kultsum', 'jumlah_jiwa' => 3, 'harga_per_jiwa' => 35000, 'tanggal_bayar' => Carbon::now()->subDays(3)],
            ['nama_pembayar' => 'Salman Al Farisi', 'jumlah_jiwa' => 6, 'harga_per_jiwa' => 35000, 'tanggal_bayar' => Carbon::now()->subDays(2)],
            ['nama_pembayar' => 'Maimunah Binti Harits', 'jumlah_jiwa' => 2, 'harga_per_jiwa' => 35000, 'tanggal_bayar' => Carbon::now()->subDay()],
        ];

        foreach ($zakats as $zakat) {
            $zakat['total_bayar'] = $zakat['jumlah_jiwa'] * $zakat['harga_per_jiwa'];
            $zakat['user_id'] = 1; // Admin user
            Zakat::create($zakat);
        }
    }
}