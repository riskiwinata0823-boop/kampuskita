<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="Temukan dan pesan tiket acara kampus favoritmu dengan mudah.">
    <title>KampusKita · Cerita seru dimulai di kampus</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-white font-sans text-slate-800 antialiased">
    <header class="absolute inset-x-0 top-0 z-10">
        <nav class="mx-auto flex max-w-7xl items-center justify-between px-5 py-6 sm:px-8">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <span class="flex h-10 w-10 items-center justify-center rounded-2xl bg-white/15 text-lg font-extrabold text-white ring-1 ring-white/25 backdrop-blur">K</span>
                <span class="font-display text-lg font-extrabold tracking-tight text-white">KampusKita</span>
            </a>
            <div class="flex items-center gap-3">
                @auth
                    <a href="{{ route('dashboard') }}" class="rounded-xl bg-white px-5 py-2.5 text-sm font-bold text-indigo-700 shadow-lg transition hover:-translate-y-0.5">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="rounded-xl px-4 py-2.5 text-sm font-bold text-white/90 transition hover:bg-white/10 hover:text-white">Masuk</a>
                    <a href="{{ route('register') }}" class="rounded-xl bg-white px-5 py-2.5 text-sm font-bold text-indigo-700 shadow-lg transition hover:-translate-y-0.5">Daftar gratis</a>
                @endauth
            </div>
        </nav>
    </header>

    <main>
        <section class="relative isolate overflow-hidden bg-slate-950">
            <div class="absolute inset-0 -z-10 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-fuchsia-500/40 via-indigo-900 to-slate-950"></div>
            <div class="absolute -right-24 top-28 -z-10 h-80 w-80 rounded-full bg-cyan-400/20 blur-3xl"></div>
            <div class="mx-auto grid min-h-[680px] max-w-7xl items-center gap-12 px-5 pb-20 pt-32 sm:px-8 lg:grid-cols-[1.1fr_0.9fr]">
                <div class="max-w-2xl">
                    <span class="inline-flex items-center gap-2 rounded-full border border-white/15 bg-white/10 px-4 py-2 text-sm font-semibold text-indigo-100 backdrop-blur">
                        <span class="h-2 w-2 rounded-full bg-emerald-400"></span>
                        Pusat acara dan komunitas kampus
                    </span>
                    <h1 class="mt-7 font-display text-5xl font-extrabold leading-[1.08] tracking-tight text-white sm:text-6xl lg:text-7xl">
                        Cerita seru dimulai <span class="bg-gradient-to-r from-cyan-300 to-fuchsia-300 bg-clip-text text-transparent">di kampus.</span>
                    </h1>
                    <p class="mt-6 max-w-xl text-lg leading-8 text-slate-300">
                        Temukan acara favoritmu, amankan tiket dalam beberapa langkah, dan jadikan hari-hari kuliah lebih berkesan.
                    </p>
                    <div class="mt-9 flex flex-wrap gap-3">
                        @auth
                            <a href="{{ route('dashboard') }}" class="rounded-2xl bg-white px-6 py-3.5 font-bold text-indigo-700 shadow-xl shadow-indigo-950/30 transition hover:-translate-y-1">Buka dashboard <span aria-hidden="true">→</span></a>
                        @else
                            <a href="{{ route('register') }}" class="rounded-2xl bg-white px-6 py-3.5 font-bold text-indigo-700 shadow-xl shadow-indigo-950/30 transition hover:-translate-y-1">Mulai jelajahi <span aria-hidden="true">→</span></a>
                            <a href="{{ route('login') }}" class="rounded-2xl border border-white/20 bg-white/5 px-6 py-3.5 font-bold text-white transition hover:bg-white/10">Saya sudah punya akun</a>
                        @endauth
                    </div>
                    <div class="mt-12 flex flex-wrap gap-x-8 gap-y-3 text-sm font-medium text-slate-300">
                        <span class="flex items-center gap-2"><span class="text-emerald-300">✓</span> Pesan tiket dengan mudah</span>
                        <span class="flex items-center gap-2"><span class="text-emerald-300">✓</span> Bukti tiket dikirim lewat email</span>
                    </div>
                </div>

                <div class="relative mx-auto w-full max-w-md">
                    <div class="absolute -inset-5 rounded-[2.5rem] bg-gradient-to-br from-cyan-400/30 to-fuchsia-500/30 blur-2xl"></div>
                    <div class="relative rotate-1 rounded-[2rem] border border-white/15 bg-white/10 p-4 shadow-2xl backdrop-blur-xl">
                        <div class="overflow-hidden rounded-[1.5rem] bg-white">
                            <div class="flex h-56 items-end bg-gradient-to-br from-indigo-500 via-violet-500 to-fuchsia-400 p-6">
                                <div>
                                    <span class="rounded-full bg-white/20 px-3 py-1.5 text-xs font-bold uppercase tracking-[0.18em] text-white">Segera hadir</span>
                                    <p class="mt-4 font-display text-3xl font-extrabold text-white">Momen terbaik<br>ada di sini.</p>
                                </div>
                            </div>
                            <div class="p-6">
                                <div class="flex items-start justify-between gap-4">
                                    <div>
                                        <p class="text-sm font-semibold text-indigo-600">PENGALAMAN KAMPUS</p>
                                        <h2 class="mt-1 font-display text-xl font-bold text-slate-900">Satu tempat, banyak cerita</h2>
                                    </div>
                                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-2xl bg-indigo-50 text-xl">✦</span>
                                </div>
                                <div class="mt-6 flex items-center justify-between border-t border-slate-100 pt-5 text-sm">
                                    <span class="text-slate-500">Acara berikutnya menantimu</span>
                                    <span class="font-bold text-indigo-700">Jelajahi →</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="absolute -bottom-6 -left-8 rounded-2xl border border-white/60 bg-white px-4 py-3 shadow-xl">
                        <p class="text-xs font-semibold uppercase tracking-wide text-slate-400">Rencanakan</p>
                        <p class="mt-1 font-bold text-slate-800">Petualangan berikutnya ✨</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="mx-auto max-w-7xl px-5 py-20 sm:px-8">
            <div class="mx-auto max-w-2xl text-center">
                <p class="text-sm font-bold uppercase tracking-[0.2em] text-indigo-600">Mudah dari awal</p>
                <h2 class="mt-3 font-display text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">Semua yang kamu butuhkan untuk ikut seru-seruan</h2>
            </div>
            <div class="mt-12 grid gap-5 md:grid-cols-3">
                <article class="rounded-3xl border border-slate-200 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-indigo-100/60">
                    <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-50 text-xl">⌕</span>
                    <h3 class="mt-5 font-display text-lg font-bold text-slate-900">Temukan acara</h3>
                    <p class="mt-2 leading-7 text-slate-600">Lihat acara kampus mendatang, lengkap dengan jadwal, lokasi, dan informasi tiket.</p>
                </article>
                <article class="rounded-3xl border border-slate-200 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-indigo-100/60">
                    <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-fuchsia-50 text-xl">♧</span>
                    <h3 class="mt-5 font-display text-lg font-bold text-slate-900">Pesan tanpa ribet</h3>
                    <p class="mt-2 leading-7 text-slate-600">Pilih jumlah tiket dan amankan tempatmu dengan proses pemesanan yang praktis.</p>
                </article>
                <article class="rounded-3xl border border-slate-200 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-xl hover:shadow-indigo-100/60">
                    <span class="flex h-12 w-12 items-center justify-center rounded-2xl bg-cyan-50 text-xl">♡</span>
                    <h3 class="mt-5 font-display text-lg font-bold text-slate-900">Nikmati momennya</h3>
                    <p class="mt-2 leading-7 text-slate-600">Cek riwayat pesananmu dan dapatkan bukti tiket langsung melalui email.</p>
                </article>
            </div>
        </section>
    </main>

    <footer class="border-t border-slate-200 bg-slate-50">
        <div class="mx-auto flex max-w-7xl flex-col gap-2 px-5 py-7 text-sm text-slate-500 sm:flex-row sm:items-center sm:justify-between sm:px-8">
            <span class="font-display font-extrabold text-slate-800">KampusKita</span>
            <span>Temukan acara, ciptakan cerita baru.</span>
        </div>
    </footer>
</body>
</html>
