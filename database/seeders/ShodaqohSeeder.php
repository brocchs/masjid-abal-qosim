<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shodaqoh;
use Carbon\Carbon;

class ShodaqohSeeder extends Seeder
{
    public function run()
    {
        $shodaqohData = [
            [
                'nama_pemberi' => 'Ecin',
                'jumlah_shodaqoh' => 500000,
                'tanggal_shodaqoh' => Carbon::now()->subDays(28),
                'keterangan' => 'Donasi untuk kegiatan masjid',
                'user_id' => 1
            ],
            [
                'nama_pemberi' => 'Fauzi',
                'jumlah_shodaqoh' => 250000,
                'tanggal_shodaqoh' => Carbon::now()->subDays(22),
                'keterangan' => 'Donasi rutin bulanan',
                'user_id' => 1
            ],
            [
                'nama_pemberi' => 'Habib',
                'jumlah_shodaqoh' => 1000000,
                'tanggal_shodaqoh' => Carbon::now()->subDays(18),
                'keterangan' => 'Donasi untuk anak yatim',
                'user_id' => 1
            ],
            [
                'nama_pemberi' => 'Muafiq',
                'jumlah_shodaqoh' => 300000,
                'tanggal_shodaqoh' => Carbon::now()->subDays(12),
                'keterangan' => 'Donasi tambahan',
                'user_id' => 1
            ],
            [
                'nama_pemberi' => 'Nur Sholichah',
                'jumlah_shodaqoh' => 150000,
                'tanggal_shodaqoh' => Carbon::now()->subDays(8),
                'keterangan' => 'Donasi untuk fakir miskin',
                'user_id' => 1
            ],
            [
                'nama_pemberi' => 'Rois',
                'jumlah_shodaqoh' => 200000,
                'tanggal_shodaqoh' => Carbon::now()->subDays(5),
                'keterangan' => 'Donasi mingguan',
                'user_id' => 1
            ]
        ];

        foreach ($shodaqohData as $data) {
            Shodaqoh::create($data);
        }
    }
}