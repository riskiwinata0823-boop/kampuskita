 @extends('layouts.campus')

@section('title', 'Jelajahi acara')

@section('content')
    <section class="mb-9 flex flex-col justify-between gap-5 sm:flex-row sm:items-end">
        <div>
            <p class="text-sm font-bold uppercase tracking-[0.18em] text-indigo-600">Kalender kampus</p>
            <h1 class="mt-2 font-display text-3xl font-extrabold tracking-tight text-slate-900 sm:text-4xl">Temukan acara favoritmu</h1>
            <p class="mt-3 max-w-2xl leading-7 text-slate-600">Jelajahi kegiatan kampus, baca detail acara, dan pesan tiket sesuai kebutuhanmu.</p>
        </div>
        <a href="{{ route('peserta.pemesanan') }}" class="inline-flex shrink-0 items-center justify-center rounded-xl border border-slate-200 bg-white px-4 py-3 text-sm font-bold text-slate-700 shadow-sm transition hover:border-indigo-200 hover:text-indigo-700">
            Lihat pemesanan →
        </a>
    </section>

    @if (session('success'))
        <div role="status" class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-semibold text-emerald-800">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div role="alert" class="mb-6 rounded-2xl border border-rose-200 bg-rose-50 px-5 py-4 text-sm font-semibold text-rose-800">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div role="alert" class="mb-6 rounded-2xl border border-rose-200 bg-rose-50 px-5 py-4 text-sm text-rose-800">
            <p class="font-bold">Pemesanan belum dapat diproses:</p>
            <ul class="mt-2 list-inside list-disc space-y-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if ($acaras->isEmpty())
        <div class="rounded-3xl border border-dashed border-slate-300 bg-white px-6 py-16 text-center">
            <span class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-indigo-50 text-2xl text-indigo-600">✦</span>
            <h2 class="mt-5 font-display text-xl font-bold text-slate-900">Belum ada acara mendatang</h2>
            <p class="mt-2 text-slate-600">Silakan kunjungi kembali halaman ini nanti.</p>
        </div>
    @else
        <div class="mb-6 flex flex-wrap items-center justify-between gap-3">
            <p class="text-sm text-slate-600">
                Menampilkan <strong class="text-slate-900">{{ $acaras->count() }} acara</strong> mendatang
            </p>
            <span class="rounded-full bg-indigo-50 px-3 py-1.5 text-xs font-bold text-indigo-700">
                Pilih acara dan jumlah tiket
            </span>
        </div>

        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-3">
            @foreach ($acaras as $acara)
                <article class="flex flex-col overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition duration-200 hover:-translate-y-1 hover:shadow-xl hover:shadow-indigo-100/60">

                    {{-- Header acara --}}
                    <div class="relative flex min-h-40 items-end overflow-hidden bg-gradient-to-br from-indigo-600 via-violet-600 to-fuchsia-500 p-6">
                        <div class="absolute -right-6 -top-12 h-40 w-40 rounded-full border-[20px] border-white/10"></div>
                        <div class="absolute -bottom-12 -left-8 h-32 w-32 rounded-full border-[16px] border-white/10"></div>

                        <div class="relative">
                            <span class="rounded-full bg-white/20 px-3 py-1.5 text-xs font-bold uppercase tracking-wider text-white backdrop-blur">
                                Acara kampus
                            </span>
                            <p class="mt-4 font-display text-2xl font-extrabold text-white">
                                {{ $acara->tanggal_mulai->format('d M Y') }}
                            </p>
                            <p class="mt-1 text-sm font-medium text-indigo-100">
                                Mulai pukul {{ $acara->tanggal_mulai->format('H:i') }} WIB
                            </p>
                        </div>
                    </div>

                    {{-- Informasi acara --}}
                    <div class="flex flex-1 flex-col p-6">
                        <h2 class="font-display text-xl font-bold leading-snug text-slate-900">
                            {{ $acara->nama_acara }}
                        </h2>

                        <p class="mt-3 leading-6 text-slate-600">
                            {{ $acara->deskripsi ?: 'Bersiap untuk pengalaman menarik bersama komunitas kampus.' }}
                        </p>

                        <div class="mt-5 space-y-4 border-t border-slate-100 pt-5 text-sm">
                            <div class="flex items-start gap-3">
                                <span class="mt-0.5 text-lg text-indigo-600">◷</span>
                                <div>
                                    <p class="font-bold text-slate-800">Jadwal acara</p>
                                    <p class="mt-1 text-slate-600">
                                        {{ $acara->tanggal_mulai->format('d M Y, H:i') }} WIB
                                    </p>
                                    @if ($acara->tanggal_selesai)
                                        <p class="mt-1 text-slate-500">
                                            Sampai {{ $acara->tanggal_selesai->format('d M Y, H:i') }} WIB
                                        </p>
                                    @endif
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <span class="mt-0.5 text-lg text-indigo-600">⌖</span>
                                <div>
                                    <p class="font-bold text-slate-800">Lokasi</p>
                                    <p class="mt-1 text-slate-600">{{ $acara->lokasi }}</p>
                                </div>
                            </div>

                            <div class="flex items-start gap-3">
                                <span class="mt-0.5 text-lg text-indigo-600">Rp</span>
                                <div>
                                    <p class="font-bold text-slate-800">Harga per tiket</p>
                                    <p class="mt-1 font-display text-xl font-extrabold text-indigo-700">
                                        Rp{{ number_format((float) $acara->harga_tiket, 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-center justify-between gap-3 rounded-xl bg-slate-50 px-4 py-3">
                                <div>
                                    <p class="font-bold text-slate-800">Sisa kuota</p>
                                    <p class="mt-1 text-xs text-slate-500">Tiket yang tersedia</p>
                                </div>
                                <span class="rounded-full px-3 py-1.5 text-xs font-bold {{ $acara->kuota > 0 ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700' }}">
                                    {{ number_format($acara->kuota, 0, ',', '.') }} tiket
                                </span>
                            </div>
                        </div>

                        {{-- Form pemesanan --}}
                        @if ($acara->kuota > 0 && $acara->tanggal_mulai->isFuture())
                            <form
                                class="mt-5 border-t border-slate-100 pt-5"
                                method="POST"
                                action="{{ route('peserta.pesan', $acara) }}"
                                onsubmit="return confirm('Apakah kamu yakin ingin melanjutkan pemesanan tiket ini?')"
                            >
                                @csrf

                                <label class="mb-2 block text-sm font-bold text-slate-800" for="jumlah-tiket-{{ $acara->id }}">
                                    Jumlah tiket
                                </label>

                                <div class="flex items-center gap-3">
                                    <input
                                        class="w-full rounded-xl border-slate-200 text-sm shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                        id="jumlah-tiket-{{ $acara->id }}"
                                        type="number"
                                        name="jumlah_tiket"
                                        min="1"
                                        max="{{ min(10, $acara->kuota) }}"
                                        value="{{ old('jumlah_tiket', 1) }}"
                                        required
                                        oninput="hitungTotal{{ $acara->id }}()"
                                    >
                                    <span class="shrink-0 text-xs text-slate-500">Maks. 10 tiket</span>
                                </div>

                                <div class="mt-4 rounded-2xl border border-indigo-100 bg-indigo-50 p-4">
                                    <div class="flex items-center justify-between gap-3 text-sm">
                                        <span class="text-slate-600">Harga per tiket</span>
                                        <span class="font-semibold text-slate-800">
                                            Rp{{ number_format((float) $acara->harga_tiket, 0, ',', '.') }}
                                        </span>
                                    </div>

                                    <div class="mt-2 flex items-center justify-between gap-3">
                                        <span class="text-sm font-bold text-slate-700">Estimasi total</span>
                                        <span id="total-harga-{{ $acara->id }}" class="font-display text-xl font-extrabold text-indigo-700">
                                            Rp{{ number_format((float) $acara->harga_tiket, 0, ',', '.') }}
                                        </span>
                                    </div>
                                    <p class="mt-2 text-xs leading-5 text-slate-500">
                                        Total dihitung berdasarkan jumlah tiket. Pemesanan belum berarti pembayaran telah dikonfirmasi.
                                    </p>
                                </div>

                                <button
                                    class="mt-4 w-full rounded-xl bg-indigo-600 px-4 py-3.5 text-sm font-bold text-white shadow-lg shadow-indigo-200 transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                                    type="submit"
                                >
                                    Pesan tiket sekarang →
                                </button>

                                <script>
                                    function hitungTotal{{ $acara->id }}() {
                                        const input = document.getElementById('jumlah-tiket-{{ $acara->id }}');
                                        const output = document.getElementById('total-harga-{{ $acara->id }}');
                                        const harga = {{ (float) $acara->harga_tiket }};
                                        const maksimal = {{ min(10, $acara->kuota) }};

                                        let jumlah = parseInt(input.value, 10) || 1;
                                        jumlah = Math.max(1, Math.min(jumlah, maksimal));

                                        output.textContent = 'Rp' + (harga * jumlah).toLocaleString('id-ID');
                                    }

                                    document.addEventListener('DOMContentLoaded', hitungTotal{{ $acara->id }});
                                </script>
                            </form>
                        @elseif ($acara->tanggal_mulai->isPast())
                            <div class="mt-5 rounded-xl bg-slate-100 px-4 py-3 text-center text-sm font-semibold text-slate-500">
                                Acara telah dimulai atau selesai. Pemesanan ditutup.
                            </div>
                        @else
                            <div class="mt-5 rounded-xl bg-rose-50 px-4 py-3 text-center text-sm font-semibold text-rose-700">
                                Tiket acara ini sudah habis.
                            </div>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    @endif
@endsection