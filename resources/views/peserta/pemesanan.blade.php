@extends('layouts.campus')

@section('title', 'Pemesanan saya')

@section('content')
    <section class="mb-9 flex flex-col justify-between gap-5 sm:flex-row sm:items-end">
        <div>
            <p class="text-sm font-bold uppercase tracking-[0.18em] text-indigo-600">Tiketmu</p>
            <h1 class="mt-2 font-display text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">Pemesanan saya</h1>
            <p class="mt-3 leading-7 text-slate-600">Semua tiket dan status pemesananmu, tersusun rapi di sini.</p>
        </div>
        <a href="{{ route('peserta.acara') }}" class="inline-flex shrink-0 items-center justify-center rounded-xl bg-indigo-600 px-4 py-3 text-sm font-bold text-white shadow-lg shadow-indigo-200 transition hover:bg-indigo-700">Cari acara →</a>
    </section>

    @if (session('success'))
        <div role="status" class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-semibold text-emerald-800">{{ session('success') }}</div>
    @endif

    @if ($pemesanans->isEmpty())
        <div class="rounded-3xl border border-dashed border-slate-300 bg-white px-6 py-16 text-center">
            <span class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-indigo-50 text-2xl text-indigo-600">▤</span>
            <h2 class="mt-5 font-display text-xl font-bold text-slate-900">Belum ada pemesanan</h2>
            <p class="mt-2 text-slate-600">Tiket acaramu akan muncul di sini setelah kamu memesan.</p>
            <a class="mt-6 inline-flex rounded-xl bg-indigo-600 px-5 py-3 text-sm font-bold text-white transition hover:bg-indigo-700" href="{{ route('peserta.acara') }}">Jelajahi acara</a>
        </div>
    @else
        <div class="grid gap-5 lg:grid-cols-2">
            @foreach ($pemesanans as $pemesanan)
                <article class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
                    <div class="flex items-start justify-between gap-4 bg-gradient-to-r from-indigo-50 to-violet-50 px-6 py-5">
                        <div>
                            <p class="text-xs font-bold uppercase tracking-[0.16em] text-indigo-600">Kode pemesanan</p>
                            <p class="mt-1 font-display text-lg font-extrabold tracking-wide text-slate-900">{{ $pemesanan->kode_pemesanan }}</p>
                        </div>
                        <span class="rounded-full bg-white px-3 py-1.5 text-xs font-bold capitalize text-indigo-700 shadow-sm">{{ $pemesanan->status }}</span>
                    </div>
                    <div class="p-6">
                        <h2 class="font-display text-xl font-bold text-slate-900">{{ $pemesanan->acara->nama_acara }}</h2>
                        <p class="mt-2 text-sm text-slate-500">{{ $pemesanan->acara->tanggal_mulai->format('d M Y · H:i') }} · {{ $pemesanan->acara->lokasi }}</p>
                        <div class="mt-5 grid grid-cols-2 gap-4 border-t border-slate-100 pt-5">
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">Jumlah tiket</p>
                                <p class="mt-1 font-bold text-slate-800">{{ $pemesanan->jumlah_tiket }} tiket</p>
                            </div>
                            <div>
                                <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">Total</p>
                                <p class="mt-1 font-bold text-slate-800">Rp{{ number_format((float) $pemesanan->total_harga, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    @endif
@endsection
