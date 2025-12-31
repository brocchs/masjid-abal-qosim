<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wakaf extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pemberi',
        'jumlah_wakaf',
        'tanggal_wakaf',
        'jenis_wakaf',
        'keterangan',
        'user_id'
    ];

    protected $casts = [
        'tanggal_wakaf' => 'date',
        'jumlah_wakaf' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}