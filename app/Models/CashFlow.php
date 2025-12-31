<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashFlow extends Model
{
    use HasFactory;

    protected $table = 'cash_flows';

    protected $fillable = [
        'type',
        'amount',
        'description',
        'invoice_file',
        'transaction_date',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $casts = [
        'transaction_date' => 'date',
        'amount' => 'decimal:2'
    ];
}