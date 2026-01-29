<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zakat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pembayar',
        'no_whatsapp',
        'jumlah_jiwa',
        'jenis_bayar',
        'jumlah_beras',
        'harga_per_jiwa',
        'total_bayar',
        'tanggal_bayar',
        'user_id'
    ];

    protected $casts = [
        'tanggal_bayar' => 'date',
        'harga_per_jiwa' => 'decimal:2',
        'total_bayar' => 'decimal:2',
        'jumlah_beras' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function muzakkis()
    {
        return $this->hasMany(Muzakki::class);
    }
}