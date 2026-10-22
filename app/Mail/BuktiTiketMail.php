<?php

namespace App\Mail;

use App\Models\Pemesanan;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BuktiTiketMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public Pemesanan $pemesanan
    ) {}

    public function build()
    {
        return $this->subject('Bukti Pemesanan Tiket Kampus')
            ->view('emails.bukti-tiket');
    }
}