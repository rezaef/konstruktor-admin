@extends('layouts.admin')

@section('title', 'Rekapitulasi Keuangan')

@section('content')
<div class="px-6 py-6 space-y-6">

    <div>
        <h1 class="text-2xl font-semibold text-slate-800">
            Rekapitulasi Keuangan
        </h1>
        <p class="text-sm text-slate-500">
            Input dan kelola data keuangan terintegrasi dengan Google Spreadsheet.
        </p>
    </div>

    {{-- Banner integrasi Spreadsheet --}}
    <div class="bg-sky-50 border border-sky-100 rounded-2xl p-4 flex items-start gap-4">
        <div class="flex-1">
            <h2 class="font-semibold text-sky-900">
                Sinkronisasi Otomatis dengan Google Spreadsheet
            </h2>
            <p class="text-sm text-sky-700 mt-1">
                Sistem akan otomatis mendeteksi sheet berdasarkan project yang dipilih dan menempatkan data di baris kosong berikutnya.
            </p>
            <ul class="mt-2 text-xs text-sky-700 list-disc list-inside space-y-1">
                <li>Auto-detect baris kosong</li>
                <li>Mapping project ke sheet</li>
                <li>Format sesuai struktur sheet</li>
                <li>Sorted by date</li>
            </ul>
        </div>
        <div class="flex flex-col gap-2">
            <button class="px-4 py-2 rounded-xl text-sm font-medium bg-orange-500 text-white">
                Mapping Project
            </button>
            <button class="px-4 py-2 rounded-xl text-sm font-medium border border-slate-300 text-slate-700 bg-white">
                Kelola Spreadsheet
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Form Input Rekapitulasi --}}
        <div class="lg:col-span-2 bg-white rounded-2xl shadow-sm border border-slate-100 p-6 space-y-4">
            <h3 class="font-semibold text-slate-800 mb-2">Form Input Rekapitulasi</h3>

            <form method="POST" action="#">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm font-medium text-slate-700">Tanggal *</label>
                        <input type="date" name="tanggal" class="mt-1 w-full rounded-xl border-slate-200">
                    </div>

                    <div>
                        <label class="text-sm font-medium text-slate-700">Pilih Spreadsheet *</label>
                        <input type="text" name="spreadsheet" class="mt-1 w-full rounded-xl border-slate-200" placeholder="Pilih dari daftar...">
                    </div>

                    <div>
                        <label class="text-sm font-medium text-slate-700">Nama Proyek *</label>
                        <input type="text" name="project" class="mt-1 w-full rounded-xl border-slate-200">
                    </div>

                    <div>
                        <label class="text-sm font-medium text-slate-700">Tipe Transaksi *</label>
                        <div class="mt-1 inline-flex rounded-xl bg-slate-100 p-1 gap-1">
                            <button type="button" class="flex-1 px-3 py-1.5 text-xs rounded-lg bg-emerald-500 text-white">
                                Pemasukan
                            </button>
                            <button type="button" class="flex-1 px-3 py-1.5 text-xs rounded-lg text-slate-600">
                                Pengeluaran
                            </button>
                            <button type="button" class="flex-1 px-3 py-1.5 text-xs rounded-lg text-slate-600">
                                Pelunasan
                            </button>
                        </div>
                    </div>

                    <div>
                        <label class="text-sm font-medium text-slate-700">Jumlah (Rp) *</label>
                        <input type="number" name="jumlah" class="mt-1 w-full rounded-xl border-slate-200" placeholder="5000000">
                    </div>

                    <div>
                        <label class="text-sm font-medium text-slate-700">Pengirim / Penerima *</label>
                        <input type="text" name="penerima" class="mt-1 w-full rounded-xl border-slate-200" placeholder="Nama perusahaan atau individu">
                    </div>
                </div>

                <div class="mt-4">
                    <label class="text-sm font-medium text-slate-700">Keterangan</label>
                    <textarea name="keterangan" rows="3" class="mt-1 w-full rounded-xl border-slate-200" placeholder="Deskripsi detail transaksi..."></textarea>
                </div>

                <div class="mt-6">
                    <button type="submit" class="w-full md:w-auto px-5 py-2.5 rounded-xl bg-orange-500 text-white text-sm font-medium">
                        Simpan ke Spreadsheet
                    </button>
                </div>
            </form>
        </div>

        {{-- Sidebar Spreadsheet & Mapping Project (dummy dulu) --}}
        <div class="space-y-4">
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-4">
                <h3 class="text-sm font-semibold text-slate-800 mb-2">Spreadsheet Terkonfigurasi</h3>
                <div class="space-y-3 text-xs">
                    <div class="border rounded-xl p-3">
                        <div class="font-semibold text-slate-800">HDA Interior - Main Spreadsheet</div>
                        <div class="text-slate-500">cashflow/</div>
                        <button class="mt-2 text-[11px] text-sky-600 underline">Buka Spreadsheet</button>
                    </div>
                    <div class="border rounded-xl p-3">
                        <div class="font-semibold text-slate-800">Cashflow 2025</div>
                        <div class="text-slate-500">cashflow/</div>
                        <button class="mt-2 text-[11px] text-sky-600 underline">Buka Spreadsheet</button>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-4">
                <h3 class="text-sm font-semibold text-slate-800 mb-2">Mapping Project → Sheet</h3>
                <p class="text-xs text-slate-500 mb-2">Dummy dulu, nanti diisi dari database projects.</p>
            </div>
        </div>
    </div>

    {{-- Tabel Entri Terakhir --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-4">
        <h3 class="text-sm font-semibold text-slate-800 mb-3">Entri Terakhir</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full text-xs">
                <thead class="bg-slate-50 text-slate-500">
                    <tr>
                        <th class="px-3 py-2 text-left">Tanggal</th>
                        <th class="px-3 py-2 text-left">Proyek</th>
                        <th class="px-3 py-2 text-left">Tipe</th>
                        <th class="px-3 py-2 text-right">Jumlah</th>
                        <th class="px-3 py-2 text-left">Penerima / Pengirim</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse ($cashflows as $row)
                        <tr>
                            <td class="px-3 py-2">{{ $row->tanggal?->format('d/m/Y') }}</td>
                            <td class="px-3 py-2">{{ $row->project_id ?? '-' }}</td>
                            <td class="px-3 py-2">
                                {{-- nanti bisa pakai field tipe_transaksi --}}
                                <span class="text-emerald-600 font-medium">Pemasukan</span>
                            </td>
                            <td class="px-3 py-2 text-right">
                                Rp {{ number_format($row->harga_total ?? 0, 0, ',', '.') }}
                            </td>
                            <td class="px-3 py-2">-</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-3 py-4 text-center text-slate-400">
                                Belum ada data cashflow.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
