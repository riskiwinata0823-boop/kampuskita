@extends('layouts.campus')

@section('title', 'Tambah acara')

@section('content')
    <section class="mx-auto max-w-3xl">
        <a href="{{ route('admin.acara.index') }}" class="text-sm font-bold text-indigo-700 transition hover:text-indigo-900">← Kembali ke acara</a>
        <div class="mt-5 rounded-3xl border border-slate-200 bg-white p-6 shadow-sm sm:p-9">
            <p class="text-sm font-bold uppercase tracking-[0.18em] text-indigo-600">Acara baru</p>
            <h1 class="mt-2 font-display text-3xl font-extrabold tracking-tight text-slate-900">Buat acara kampus</h1>
            <p class="mt-3 leading-7 text-slate-600">Lengkapi informasi berikut agar peserta dapat menemukan acara ini.</p>

            @if ($errors->any())
                <div role="alert" class="mt-6 rounded-2xl border border-rose-200 bg-rose-50 px-5 py-4 text-sm text-rose-800">
                    <p class="font-bold">Periksa kembali isian berikut:</p>
                    <ul class="mt-2 list-inside list-disc space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="mt-8 space-y-5" method="POST" action="{{ route('admin.acara.store') }}">
                @csrf
                <div>
                    <label class="mb-2 block text-sm font-bold text-slate-700" for="nama_acara">Nama acara</label>
                    <input class="w-full rounded-xl border-slate-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="nama_acara" name="nama_acara" value="{{ old('nama_acara') }}" maxlength="255" required>
                    @error('nama_acara')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="mb-2 block text-sm font-bold text-slate-700" for="deskripsi">Deskripsi</label>
                    <textarea class="w-full rounded-xl border-slate-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="mb-2 block text-sm font-bold text-slate-700" for="lokasi">Lokasi</label>
                    <input class="w-full rounded-xl border-slate-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" maxlength="255" required>
                    @error('lokasi')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
                </div>
                <div class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <label class="mb-2 block text-sm font-bold text-slate-700" for="tanggal_mulai">Tanggal dan waktu mulai</label>
                        <input class="w-full rounded-xl border-slate-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="tanggal_mulai" type="datetime-local" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>
                        @error('tanggal_mulai')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-bold text-slate-700" for="tanggal_selesai">Tanggal dan waktu selesai <span class="font-normal text-slate-400">(opsional)</span></label>
                        <input class="w-full rounded-xl border-slate-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="tanggal_selesai" type="datetime-local" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}">
                        @error('tanggal_selesai')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div class="grid gap-5 sm:grid-cols-2">
                    <div>
                        <label class="mb-2 block text-sm font-bold text-slate-700" for="harga_tiket">Harga tiket (Rp)</label>
                        <input class="w-full rounded-xl border-slate-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="harga_tiket" type="number" name="harga_tiket" value="{{ old('harga_tiket', 0) }}" min="0" step="0.01" required>
                        @error('harga_tiket')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-bold text-slate-700" for="kuota">Kuota tiket</label>
                        <input class="w-full rounded-xl border-slate-200 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="kuota" type="number" name="kuota" value="{{ old('kuota') }}" min="1" required>
                        @error('kuota')<p class="mt-1 text-sm text-rose-600">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div class="flex flex-col-reverse gap-3 border-t border-slate-100 pt-6 sm:flex-row sm:justify-end">
                    <a href="{{ route('admin.acara.index') }}" class="rounded-xl border border-slate-200 px-5 py-3 text-center text-sm font-bold text-slate-600 transition hover:bg-slate-50">Batal</a>
                    <button class="rounded-xl bg-indigo-600 px-6 py-3 text-sm font-bold text-white shadow-lg shadow-indigo-200 transition hover:bg-indigo-700" type="submit">Simpan acara</button>
                </div>
            </form>
        </div>
    </section>
@endsection
