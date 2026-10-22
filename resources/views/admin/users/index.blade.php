@extends('layouts.campus')

@section('title', 'Kelola pengguna')

@section('content')
    <section class="mb-9 flex flex-col justify-between gap-5 sm:flex-row sm:items-end">
        <div>
            <p class="text-sm font-bold uppercase tracking-[0.18em] text-indigo-600">Administrasi</p>
            <h1 class="mt-2 font-display text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">Kelola pengguna</h1>
            <p class="mt-3 leading-7 text-slate-600">Periksa akun yang terdaftar dan kelola akses admin dengan aman.</p>
        </div>
        <a href="{{ route('admin.dashboard') }}" class="inline-flex shrink-0 items-center justify-center rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm font-bold text-slate-700 shadow-sm transition hover:border-indigo-200 hover:text-indigo-700">← Dashboard</a>
    </section>

    @if (session('success'))
        <div role="status" class="mb-5 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-semibold text-emerald-800">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div role="alert" class="mb-5 rounded-2xl border border-rose-200 bg-rose-50 px-5 py-4 text-sm font-semibold text-rose-800">{{ session('error') }}</div>
    @endif
    @if ($errors->any())
        <div role="alert" class="mb-5 rounded-2xl border border-rose-200 bg-rose-50 px-5 py-4 text-sm text-rose-800">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <section class="overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">
        <div class="flex items-center justify-between gap-4 border-b border-slate-100 px-6 py-5">
            <div>
                <h2 class="font-display text-lg font-bold text-slate-900">Daftar akun</h2>
                <p class="mt-1 text-sm text-slate-500">{{ $users->count() }} pengguna terdaftar</p>
            </div>
            <span class="rounded-2xl bg-indigo-50 px-4 py-2 text-sm font-bold text-indigo-700">Pengguna</span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[680px] text-left text-sm">
                <thead class="bg-slate-50 text-xs uppercase tracking-wide text-slate-500">
                    <tr>
                        <th class="px-6 py-4 font-bold">Pengguna</th>
                        <th class="px-6 py-4 font-bold">Email</th>
                        <th class="px-6 py-4 font-bold">Peran</th>
                        <th class="px-6 py-4 font-bold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($users as $user)
                        <tr class="transition hover:bg-slate-50/80">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-gradient-to-br from-indigo-100 to-violet-100 font-bold text-indigo-700">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                                    <div>
                                        <p class="font-bold text-slate-900">{{ $user->name }}</p>
                                        <p class="text-xs text-slate-500">ID #{{ $user->id }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-slate-600">{{ $user->email }}</td>
                            <td class="px-6 py-4">
                                <span class="rounded-full px-3 py-1.5 text-xs font-bold {{ $user->role === 'admin' ? 'bg-violet-50 text-violet-700' : 'bg-slate-100 text-slate-600' }}">{{ ucfirst($user->role) }}</span>
                            </td>
                            <td class="px-6 py-4">
                                @if (auth()->id() !== $user->id)
                                    <form class="flex items-center gap-2" method="POST" action="{{ route('admin.users.update', $user) }}">
                                        @csrf
                                        @method('PUT')
                                        <label class="sr-only" for="role-{{ $user->id }}">Peran untuk {{ $user->name }}</label>
                                        <select class="rounded-xl border-slate-200 py-2 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500" id="role-{{ $user->id }}" name="role">
                                            <option value="peserta" @selected($user->role === 'peserta')>Peserta</option>
                                            <option value="admin" @selected($user->role === 'admin')>Admin</option>
                                        </select>
                                        <button class="rounded-xl bg-slate-900 px-3 py-2 text-xs font-bold text-white transition hover:bg-indigo-700" type="submit">Simpan</button>
                                    </form>
                                @else
                                    <span class="text-xs font-semibold text-slate-400">Akun Anda</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="px-6 py-12 text-center text-slate-500" colspan="4">Belum ada pengguna terdaftar.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
