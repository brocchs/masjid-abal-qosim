<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Wakaf;
use Carbon\Carbon;

class WakafSeeder extends Seeder
{
    public function run()
    {
        $wakafData = [
            [
                'nama_pemberi' => 'Ahmad Suharto',
                'jumlah_wakaf' => 5000000,
                'tanggal_wakaf' => Carbon::now()->subDays(30),
                'jenis_wakaf' => 'Uang',
                'keterangan' => 'Wakaf untuk pembangunan masjid',
                'user_id' => 1
            ],
            [
                'nama_pemberi' => 'Siti Aminah',
                'jumlah_wakaf' => 2500000,
                'tanggal_wakaf' => Carbon::now()->subDays(25),
                'jenis_wakaf' => 'Uang',
                'keterangan' => 'Wakaf untuk operasional masjid',
                'user_id' => 1
            ],
            [
                'nama_pemberi' => 'Budi Santoso',
                'jumlah_wakaf' => 10000000,
                'tanggal_wakaf' => Carbon::now()->subDays(20),
                'jenis_wakaf' => 'Tanah',
                'keterangan' => 'Wakaf tanah untuk perluasan masjid',
                'user_id' => 1
            ],
            [
                'nama_pemberi' => 'Ahmad Suharto',
                'jumlah_wakaf' => 3000000,
                'tanggal_wakaf' => Carbon::now()->subDays(15),
                'jenis_wakaf' => 'Uang',
                'keterangan' => 'Wakaf tambahan untuk renovasi',
                'user_id' => 1
            ],
            [
                'nama_pemberi' => 'Fatimah Zahra',
                'jumlah_wakaf' => 1500000,
                'tanggal_wakaf' => Carbon::now()->subDays(10),
                'jenis_wakaf' => 'Uang',
                'keterangan' => 'Wakaf untuk kegiatan sosial',
                'user_id' => 1
            ]
        ];

        foreach ($wakafData as $data) {
            Wakaf::create($data);
        }
    }
}