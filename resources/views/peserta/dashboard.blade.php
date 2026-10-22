@extends('layouts.campus')

@section('title', 'Dashboard peserta')

@section('content')
    <section class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-indigo-700 via-indigo-600 to-violet-600 px-7 py-10 text-white shadow-xl shadow-indigo-200 sm:px-12 sm:py-14">
        <div class="absolute -right-12 -top-16 h-64 w-64 rounded-full bg-white/10 blur-2xl"></div>
        <div class="relative max-w-2xl">
            <span class="rounded-full border border-white/20 bg-white/10 px-4 py-2 text-sm font-semibold text-indigo-100">RUANG PESERTA</span>
            <h1 class="mt-6 font-display text-3xl font-extrabold tracking-tight sm:text-5xl">Halo, {{ auth()->user()->name }} 👋</h1>
            <p class="mt-4 max-w-xl text-base leading-7 text-indigo-100 sm:text-lg">Siap membuat hari-hari kampus lebih berkesan? Temukan acara seru dan simpan tiketmu di satu tempat.</p>
            <a href="{{ route('peserta.acara') }}" class="mt-8 inline-flex items-center gap-2 rounded-2xl bg-white px-5 py-3 font-bold text-indigo-700 shadow-lg transition hover:-translate-y-0.5 hover:shadow-xl">Jelajahi acara <span aria-hidden="true">→</span></a>
        </div>
    </section>

    <section class="mt-10">
        <div class="mb-5">
            <p class="text-sm font-bold uppercase tracking-[0.18em] text-indigo-600">Mulai di sini</p>
            <h2 class="mt-1 font-display text-2xl font-extrabold text-slate-900">Semua jadi lebih mudah</h2>
        </div>
        <div class="grid gap-5 md:grid-cols-2">
            <a href="{{ route('peserta.acara') }}" class="group rounded-3xl border border-slate-200 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:border-indigo-200 hover:shadow-xl hover:shadow-indigo-100/70">
                <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-50 text-xl text-indigo-700">✦</span>
                <h3 class="mt-5 font-display text-xl font-bold text-slate-900">Cari acara kampus</h3>
                <p class="mt-2 leading-7 text-slate-600">Temukan kegiatan berikutnya dan pilih acara yang paling kamu suka.</p>
                <span class="mt-5 inline-block font-bold text-indigo-700 group-hover:translate-x-1 transition">Lihat acara →</span>
            </a>
            <a href="{{ route('peserta.pemesanan') }}" class="group rounded-3xl border border-slate-200 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:border-fuchsia-200 hover:shadow-xl hover:shadow-fuchsia-100/70">
                <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-fuchsia-50 text-xl text-fuchsia-700">▤</span>
                <h3 class="mt-5 font-display text-xl font-bold text-slate-900">Pemesanan saya</h3>
                <p class="mt-2 leading-7 text-slate-600">Cek kode pesanan, jumlah tiket, dan status pemesananmu.</p>
                <span class="mt-5 inline-block font-bold text-fuchsia-700 group-hover:translate-x-1 transition">Lihat pesanan →</span>
            </a>
        </div>
    </section>
@endsection
