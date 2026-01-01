<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyaluran extends Model
{
    use HasFactory;

    protected $table = 'penyaluran';

    protected $fillable = [
        'penerima_id',
        'sumber_dana_type',
        'sumber_dana_id',
        'nominal',
        'tanggal_penyaluran',
        'keterangan',
        'bukti_penyerahan',
        'user_id'
    ];

    protected $casts = [
        'tanggal_penyaluran' => 'date',
        'nominal' => 'decimal:2'
    ];

    public function penerima()
    {
        return $this->belongsTo(PenerimaBantuan::class, 'penerima_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sumberDana()
    {
        return $this->morphTo();
    }
}