<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pemesanan extends Model
{
    protected $fillable = [
        'user_id',
        'acara_id',
        'kode_pemesanan',
        'jumlah_tiket',
        'total_harga',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'jumlah_tiket' => 'integer',
            'total_harga' => 'decimal:2',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function acara(): BelongsTo
    {
        return $this->belongsTo(Acara::class);
    }
}