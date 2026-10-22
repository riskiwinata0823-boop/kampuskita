@extends('layouts.campus')

@section('title', 'Dashboard admin')

@section('content')
    <section class="relative overflow-hidden rounded-[2rem] bg-gradient-to-br from-slate-900 via-indigo-950 to-indigo-800 px-7 py-10 text-white shadow-xl shadow-slate-300 sm:px-12 sm:py-14">
        <div class="absolute -right-12 -top-16 h-64 w-64 rounded-full bg-cyan-400/20 blur-3xl"></div>
        <div class="relative max-w-2xl">
            <span class="rounded-full border border-white/20 bg-white/10 px-4 py-2 text-sm font-semibold text-indigo-100">PANEL ADMINISTRATOR</span>
            <h1 class="mt-6 font-display text-3xl font-extrabold tracking-tight sm:text-5xl">Selamat datang, {{ auth()->user()->name }}</h1>
            <p class="mt-4 max-w-xl text-base leading-7 text-slate-300 sm:text-lg">Kelola acara kampus dan pengguna dengan lebih praktis dari satu dashboard.</p>
        </div>
    </section>

    <section class="mt-10">
        <p class="text-sm font-bold uppercase tracking-[0.18em] text-indigo-600">Kelola platform</p>
        <h2 class="mt-1 font-display text-2xl font-extrabold text-slate-900">Pintasan admin</h2>
        <div class="mt-5 grid gap-5 md:grid-cols-2">
            <a href="{{ route('admin.acara.index') }}" class="group rounded-3xl border border-slate-200 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:border-indigo-200 hover:shadow-xl hover:shadow-indigo-100/70">
                <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-50 text-xl text-indigo-700">✦</span>
                <h3 class="mt-5 font-display text-xl font-bold text-slate-900">Kelola acara</h3>
                <p class="mt-2 leading-7 text-slate-600">Buat acara baru, periksa jadwal, dan atur kuota tiket.</p>
                <span class="mt-5 inline-block font-bold text-indigo-700 transition group-hover:translate-x-1">Buka acara →</span>
            </a>
            <a href="{{ route('admin.users.index') }}" class="group rounded-3xl border border-slate-200 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:border-cyan-200 hover:shadow-xl hover:shadow-cyan-100/70">
                <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-cyan-50 text-xl text-cyan-700">♙</span>
                <h3 class="mt-5 font-display text-xl font-bold text-slate-900">Kelola pengguna</h3>
                <p class="mt-2 leading-7 text-slate-600">Lihat akun terdaftar dan atur peran pengguna dengan aman.</p>
                <span class="mt-5 inline-block font-bold text-cyan-700 transition group-hover:translate-x-1">Buka pengguna →</span>
            </a>
        </div>
    </section>
@endsection
