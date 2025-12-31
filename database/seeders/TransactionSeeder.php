<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use Carbon\Carbon;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        $transactions = [
            [
                'type' => 'credit',
                'amount' => 5000000,
                'description' => 'Donasi pembangunan masjid dari Bapak Ahmad',
                'transaction_date' => Carbon::now()->subDays(10),
            ],
            [
                'type' => 'credit',
                'amount' => 2500000,
                'description' => 'Infaq Jumat dari jamaah',
                'transaction_date' => Carbon::now()->subDays(7),
            ],
            [
                'type' => 'debit',
                'amount' => 1200000,
                'description' => 'Pembelian karpet masjid',
                'transaction_date' => Carbon::now()->subDays(5),
            ],
            [
                'type' => 'credit',
                'amount' => 800000,
                'description' => 'Zakat fitrah',
                'transaction_date' => Carbon::now()->subDays(3),
            ],
            [
                'type' => 'debit',
                'amount' => 350000,
                'description' => 'Bayar listrik masjid bulan ini',
                'transaction_date' => Carbon::now()->subDays(2),
            ],
            [
                'type' => 'credit',
                'amount' => 1500000,
                'description' => 'Donasi dari pengajian ibu-ibu',
                'transaction_date' => Carbon::now()->subDay(),
            ],
            [
                'type' => 'credit',
                'amount' => 750000,
                'description' => 'Kotak amal Jumat',
                'transaction_date' => Carbon::now()->subDays(14),
            ],
            [
                'type' => 'debit',
                'amount' => 500000,
                'description' => 'Pembelian sound system',
                'transaction_date' => Carbon::now()->subDays(12),
            ],
            [
                'type' => 'credit',
                'amount' => 3000000,
                'description' => 'Donasi dari Ibu Siti untuk renovasi',
                'transaction_date' => Carbon::now()->subDays(15),
            ],
            [
                'type' => 'debit',
                'amount' => 200000,
                'description' => 'Bayar air PDAM',
                'transaction_date' => Carbon::now()->subDays(8),
            ],
            [
                'type' => 'credit',
                'amount' => 1200000,
                'description' => 'Infaq tarawih Ramadan',
                'transaction_date' => Carbon::now()->subDays(20),
            ],
            [
                'type' => 'debit',
                'amount' => 800000,
                'description' => 'Pembelian Al-Quran untuk perpustakaan',
                'transaction_date' => Carbon::now()->subDays(18),
            ],
            [
                'type' => 'credit',
                'amount' => 600000,
                'description' => 'Donasi dari takjil bersama',
                'transaction_date' => Carbon::now()->subDays(16),
            ],
            [
                'type' => 'debit',
                'amount' => 150000,
                'description' => 'Pembelian sabun dan tissue',
                'transaction_date' => Carbon::now()->subDays(13),
            ],
            [
                'type' => 'credit',
                'amount' => 2200000,
                'description' => 'Zakat mal dari jamaah',
                'transaction_date' => Carbon::now()->subDays(11),
            ],
            [
                'type' => 'debit',
                'amount' => 450000,
                'description' => 'Service AC masjid',
                'transaction_date' => Carbon::now()->subDays(6),
            ],
        ];

        foreach ($transactions as $transaction) {
            Transaction::create($transaction);
        }
    }
}