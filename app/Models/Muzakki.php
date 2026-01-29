<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muzakki extends Model
{
    use HasFactory;

    protected $fillable = ['zakat_id', 'nama', 'hubungan_keluarga'];

    public function zakat()
    {
        return $this->belongsTo(Zakat::class);
    }
}
