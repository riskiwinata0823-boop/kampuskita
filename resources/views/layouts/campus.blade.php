<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'KampusKita') · KampusKita</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-slate-50 font-sans text-slate-800 antialiased">
    <header class="sticky top-0 z-20 border-b border-slate-200/80 bg-white/90 backdrop-blur">
        <nav class="mx-auto flex max-w-7xl flex-wrap items-center justify-between gap-4 px-5 py-4 sm:px-8">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <span class="flex h-10 w-10 items-center justify-center rounded-2xl bg-indigo-600 text-lg font-extrabold text-white shadow-lg shadow-indigo-200">K</span>
                <span class="font-display text-lg font-extrabold tracking-tight text-slate-900">Kampus<span class="text-indigo-600">Kita</span></span>
            </a>

            <div class="flex flex-wrap items-center gap-2 text-sm font-semibold">
                @if (auth()->user()->role === 'admin')
                    <a class="rounded-xl px-3 py-2 text-slate-600 transition hover:bg-indigo-50 hover:text-indigo-700" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    <a class="rounded-xl px-3 py-2 text-slate-600 transition hover:bg-indigo-50 hover:text-indigo-700" href="{{ route('admin.acara.index') }}">Acara</a>
                    <a class="rounded-xl px-3 py-2 text-slate-600 transition hover:bg-indigo-50 hover:text-indigo-700" href="{{ route('admin.users.index') }}">Pengguna</a>
                @else
                    <a class="rounded-xl px-3 py-2 text-slate-600 transition hover:bg-indigo-50 hover:text-indigo-700" href="{{ route('peserta.dashboard') }}">Dashboard</a>
                    <a class="rounded-xl px-3 py-2 text-slate-600 transition hover:bg-indigo-50 hover:text-indigo-700" href="{{ route('peserta.acara') }}">Jelajahi acara</a>
                    <a class="rounded-xl px-3 py-2 text-slate-600 transition hover:bg-indigo-50 hover:text-indigo-700" href="{{ route('peserta.pemesanan') }}">Pemesanan saya</a>
                @endif

                <a class="ml-1 rounded-xl border border-slate-200 px-3 py-2 text-slate-600 transition hover:border-indigo-200 hover:text-indigo-700" href="{{ route('profile.edit') }}">{{ auth()->user()->name }}</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="rounded-xl bg-slate-900 px-4 py-2 font-bold text-white transition hover:bg-indigo-700" type="submit">Keluar</button>
                </form>
            </div>
        </nav>
    </header>

    <main class="mx-auto max-w-7xl px-5 py-10 sm:px-8 sm:py-14">
        @yield('content')
    </main>

    <footer class="border-t border-slate-200 bg-white">
        <div class="mx-auto flex max-w-7xl flex-col gap-1 px-5 py-6 text-sm text-slate-500 sm:flex-row sm:items-center sm:justify-between sm:px-8">
            <span class="font-semibold text-slate-700">KampusKita</span>
            <span>Temukan acara, ciptakan cerita baru.</span>
        </div>
    </footer>
</body>
</html>
