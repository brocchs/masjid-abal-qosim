<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaBantuan extends Model
{
    use HasFactory;

    protected $table = 'penerima_bantuan';

    protected $fillable = [
        'nama',
        'nik',
        'alamat',
        'telepon',
        'jenis_bantuan',
        'kategori_penerima',
        'status_verifikasi',
        'keterangan',
        'foto_dokumen',
        'user_id'
    ];

    protected $casts = [
        'jenis_bantuan' => 'string',
        'status_verifikasi' => 'string'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function penyaluran()
    {
        return $this->hasMany(Penyaluran::class, 'penerima_id');
    }

    public function getTotalDiterimaAttribute()
    {
        return $this->penyaluran->sum('nominal');
    }
}