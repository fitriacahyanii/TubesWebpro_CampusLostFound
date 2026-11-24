@extends('layouts.app')
@section('title', 'Laporan Barang')
@section('content')
<x-page-title title="Laporan Barang" subtitle="Laporkan barang yang hilang atau ditemukan di lingkungan kampus" />

<form method="POST" action="{{ route('laporan.store') }}" enctype="multipart/form-data" class="panel mx-auto max-w-xl space-y-4">
    @csrf
    <h2 class="text-lg">Formulir Laporan Barang</h2>
    <x-select label="Jenis Laporan" name="jenis" placeholder="Pilih jenis laporan" :options="['hilang' => 'Barang Hilang', 'ditemukan' => 'Barang Ditemukan']" required />
    <x-field label="Nama Barang" name="nama" placeholder="contoh: Dompet hitam" />
    <x-select label="Kategori Barang" name="kategori" placeholder="Pilih Kategori" :options="['Elektronik','Dokumen atau Kartu','Aksesoris','Barang Pribadi','Lainnya']" required />
    <x-field label="Tanggal Kejadian" name="tanggal" type="date" max="{{ now()->toDateString() }}" />
    <x-field label="Lokasi Kejadian" name="lokasi" placeholder="contoh : perpustakaan kampus" />
    <div>
        <label for="deskripsi" class="mb-1 block font-display text-sm font-bold">Deskripsi Barang</label>
        <textarea id="deskripsi" name="deskripsi" rows="3" class="input" placeholder="Deskripsi umum untuk katalog">{{ old('deskripsi') }}</textarea>
    </div>
    <div>
        <label for="foto" class="mb-1 block font-display text-sm font-bold">Foto Barang (Opsional)</label>
        <input id="foto" name="foto" type="file" accept="image/*" class="input file:mr-3 file:rounded file:border file:border-neutral-400 file:bg-neutral-200 file:px-3 file:py-1 file:text-xs">
    </div>
    <div>
        <label for="ciri_rahasia" class="mb-1 block font-display text-sm font-bold">Ciri Rahasia (Hanya Untuk Admin)</label>
        <input id="ciri_rahasia" name="ciri_rahasia" class="input" placeholder="Contoh: isi dompet/tanda khusus" value="{{ old('ciri_rahasia') }}">
        <p class="mt-1 text-xs">Tidak ditampilkan di katalog. Dipakai admin untuk mencocokkan bukti klaim.</p>
    </div>
    <button class="btn-primary w-full sm:w-64">Kirim Laporan</button>
</form>

<section class="panel mx-auto mt-6 max-w-xl">
    <h2 class="text-lg">Daftar Laporan Saya</h2>
    @if (session('demo_role') === 'mahasiswa')
        <p class="mt-1 text-sm">Pantau semua laporanmu di <a href="{{ route('status.index') }}" class="font-bold underline">Status Laporan</a>.</p>
    @else
        <p class="mt-1 text-sm text-neutral-500">Mau melihat laporan milikmu? <a href="{{ route('login') }}" class="font-bold text-ink underline">Login sekarang</a></p>
    @endif
</section>
@endsection
