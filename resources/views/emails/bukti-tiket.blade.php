<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Bukti Pemesanan Tiket</title>
</head>
<body>
    <h1>Bukti Pemesanan Tiket</h1>

    <p>Halo, {{ $pemesanan->user->name }}.</p>

    <p>Pemesanan tiket kamu berhasil dibuat.</p>

    <p>Kode pemesanan: <strong>{{ $pemesanan->kode_pemesanan }}</strong></p>
    <p>Acara: {{ $pemesanan->acara->nama_acara }}</p>
    <p>Jumlah tiket: {{ $pemesanan->jumlah_tiket }}</p>
    <p>Total harga: Rp{{ number_format((float) $pemesanan->total_harga, 0, ',', '.') }}</p>
    <p>Status: {{ $pemesanan->status }}</p>
</body>
</html>