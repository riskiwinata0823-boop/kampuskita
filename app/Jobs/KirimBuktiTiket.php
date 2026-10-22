<?php

namespace App\Jobs;

use App\Mail\BuktiTiketMail;
use App\Models\Pemesanan;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class KirimBuktiTiket implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;

    public function __construct(
        public int $pemesananId
    ) {}

    public function handle(): void
    {
        $pemesanan = Pemesanan::with(['user', 'acara'])
            ->findOrFail($this->pemesananId);

        Mail::to($pemesanan->user->email)
            ->send(new BuktiTiketMail($pemesanan));
    }
}