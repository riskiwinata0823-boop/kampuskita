<?php

namespace App\Http\Controllers;

use App\Models\Acara;
use App\Models\Pemesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use App\Jobs\KirimBuktiTiket;

class PemesananController extends Controller
{
    public function index()
    {
        $acaras = Acara::where('tanggal_mulai', '>=', now())
            ->orderBy('tanggal_mulai')
            ->get();

        return view('peserta.acara', compact('acaras'));
    }

    public function pesan(Request $request, Acara $acara)
    {
        $data = $request->validate([
            'jumlah_tiket' => ['required', 'integer', 'min:1', 'max:10'],
        ]);

        $pemesanan = DB::transaction(function () use ($data, $acara, $request) {
            $acaraTerkunci = Acara::whereKey($acara->id)
                ->lockForUpdate()
                ->firstOrFail();

            if ($acaraTerkunci->tanggal_mulai < now()) {
                throw ValidationException::withMessages([
                    'acara' => 'Acara ini sudah dimulai.',
                ]);
            }

            if ($acaraTerkunci->kuota < $data['jumlah_tiket']) {
                throw ValidationException::withMessages([
                    'jumlah_tiket' => 'Kuota tiket tidak mencukupi.',
                ]);
            }

            $total = (float) $acaraTerkunci->harga_tiket
                * $data['jumlah_tiket'];

            $pemesanan = Pemesanan::create([
                'user_id' => $request->user()->id,
                'acara_id' => $acaraTerkunci->id,
                'kode_pemesanan' => 'TKT-' . Str::upper(Str::random(12)),
                'jumlah_tiket' => $data['jumlah_tiket'],
                'total_harga' => $total,
                'status' => 'menunggu',
            ]);

            $acaraTerkunci->decrement(
                'kuota',
                $data['jumlah_tiket']
            );

            return $pemesanan;
        }, 3);

        KirimBuktiTiket::dispatch($pemesanan->id)->afterCommit();

        return redirect()
            ->route('peserta.pemesanan')
            ->with('success', 'Pemesanan berhasil dibuat. Kode: '
                . $pemesanan->kode_pemesanan);
    }

    public function pemesananSaya(Request $request)
    {
        $pemesanans = Pemesanan::with('acara')
            ->where('user_id', $request->user()->id)
            ->latest()
            ->get();

        return view('peserta.pemesanan', compact('pemesanans'));
    }
}