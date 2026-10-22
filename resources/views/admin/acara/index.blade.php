@extends('layouts.campus')

@section('title', 'Kelola acara')

@section('content')
    <section class="mb-9 flex flex-col justify-between gap-5 sm:flex-row sm:items-end">
        <div>
            <p class="text-sm font-bold uppercase tracking-[0.18em] text-indigo-600">Administrasi</p>
            <h1 class="mt-2 font-display text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">Kelola acara</h1>
            <p class="mt-3 leading-7 text-slate-600">Atur acara kampus dan pantau informasi jadwal serta kuota.</p>
        </div>
        <a href="{{ route('admin.acara.create') }}" class="inline-flex shrink-0 items-center justify-center rounded-xl bg-indigo-600 px-5 py-3 text-sm font-bold text-white shadow-lg shadow-indigo-200 transition hover:bg-indigo-700">+ Tambah acara</a>
    </section>

    @if (session('success'))
        <div role="status" class="mb-5 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-semibold text-emerald-800">{{ session('success') }}</div>
    @endif

    @if ($acaras->isEmpty())
        <div class="rounded-3xl border border-dashed border-slate-300 bg-white px-6 py-16 text-center">
            <span class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-indigo-50 text-2xl text-indigo-600">✦</span>
            <h2 class="mt-5 font-display text-xl font-bold text-slate-900">Belum ada acara</h2>
            <p class="mt-2 text-slate-600">Buat acara pertama untuk mulai menerima pemesanan tiket.</p>
            <a href="{{ route('admin.acara.create') }}" class="mt-6 inline-flex rounded-xl bg-indigo-600 px-5 py-3 text-sm font-bold text-white transition hover:bg-indigo-700">Buat acara</a>
        </div>
    @else
        <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($acaras as $acara)
                <article class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
                    <div class="bg-gradient-to-br from-indigo-600 to-violet-600 px-6 py-5 text-white">
                        <p class="text-xs font-bold uppercase tracking-[0.16em] text-indigo-100">{{ $acara->tanggal_mulai->format('d M Y · H:i') }}</p>
                        <h2 class="mt-2 font-display text-xl font-extrabold">{{ $acara->nama_acara }}</h2>
                    </div>
                    <div class="p-6">
                        <p class="text-sm text-slate-600">{{ $acara->lokasi }}</p>
                        <p class="mt-4 min-h-12 text-sm leading-6 text-slate-500">{{ $acara->deskripsi ?: 'Tidak ada deskripsi acara.' }}</p>
                        <div class="mt-4 flex items-center justify-between border-t border-slate-100 pt-4 text-sm">
                            <span class="font-bold text-slate-800">Rp{{ number_format((float) $acara->harga_tiket, 0, ',', '.') }}</span>
                            <span class="rounded-full bg-indigo-50 px-3 py-1.5 text-xs font-bold text-indigo-700">{{ $acara->kuota }} tiket</span>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    @endif
@endsection
