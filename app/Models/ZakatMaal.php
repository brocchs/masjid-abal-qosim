<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZakatMaal extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pembayar',
        'jumlah_harta',
        'zakat_dibayar',
        'tanggal_bayar',
        'keterangan',
        'user_id'
    ];

    protected $casts = [
        'tanggal_bayar' => 'date',
        'jumlah_harta' => 'decimal:2',
        'zakat_dibayar' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}