@extends('layouts.app')
@section('title', 'Katalog Barang')
@section('content')
<x-page-title title="Katalog Dan Pencarian" subtitle="Cari barang yang hilang atau ditemukan di lingkungan kampus" />

<form method="GET" action="{{ route('katalog') }}" class="panel mb-6">
    <h2 class="mb-4 text-xl">Cari Barang</h2>
    <div class="space-y-4">
        <x-field label="Nama Barang" name="nama" placeholder="contoh: Dompet hitam" :required="false" value="{{ request('nama') }}" />
        <div class="grid gap-4 md:grid-cols-3">
            <x-select label="Kategori Barang" name="kategori" placeholder="Pilih Kategori"
                :options="['Elektronik','Dokumen atau Kartu','Aksesoris','Barang Pribadi','Lainnya']" />
            <x-field label="Lokasi Kejadian" name="lokasi" placeholder="contoh : perpustakaan kampus" :required="false" value="{{ request('lokasi') }}" />
            <x-select label="Status Barang" name="status" placeholder="Destinasi Umum untuk katalog"
                :options="['hilang' => 'Barang Hilang', 'ditemukan' => 'Barang Ditemukan']" />
        </div>
        <div class="flex flex-wrap gap-3">
            <button class="btn-primary w-full sm:w-64">Cari Barang</button>
            <a href="{{ route('katalog') }}" class="btn-muted w-full sm:w-64">Reset Filter</a>
        </div>
    </div>
</form>

<section class="panel">
    <div class="mb-3 flex items-baseline justify-between">
        <h2 class="text-xl">Daftar Barang</h2>
        <span class="text-xs text-neutral-500">{{ $items->count() }} dari {{ $total }} barang</span>
    </div>
    <p class="mb-5 border-l-4 border-navy bg-blue-100 px-4 py-3 text-sm font-semibold">Katalog menampilkan laporan yang sudah terverifikasi atau sudah dikembalikan</p>

    @forelse ($items as $item)
        @if ($loop->first)<div class="grid gap-5 md:grid-cols-2">@endif
        <x-item-card :item="$item" />
        @if ($loop->last)</div>@endif
    @empty
        <p class="py-10 text-center text-sm">Tidak ada barang yang cocok. Ubah kata kunci atau reset filter.</p>
    @endforelse
</section>
@endsection
