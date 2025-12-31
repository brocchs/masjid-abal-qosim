<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shodaqoh extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pemberi',
        'jumlah_shodaqoh',
        'tanggal_shodaqoh',
        'keterangan',
        'user_id'
    ];

    protected $casts = [
        'tanggal_shodaqoh' => 'date',
        'jumlah_shodaqoh' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}