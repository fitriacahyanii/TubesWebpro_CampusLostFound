@extends('layouts.app')
@section('title', $item['nama'])
@section('content')
<x-page-title title="Detail Barang" subtitle="Informasi lengkap laporan" />
<article class="panel mx-auto max-w-2xl">
    <div class="flex flex-wrap items-start justify-between gap-3">
        <h2 class="text-2xl">{{ $item['nama'] }}</h2>
        <x-badge :type="$item['tipe']" />
    </div>
    <div class="mt-4 flex h-48 items-center justify-center rounded-lg bg-field text-sm text-neutral-400">Foto barang (opsional)</div>
    <dl class="mt-5 grid gap-3 text-sm sm:grid-cols-2">
        <div><dt class="font-display font-bold italic">Kategori</dt><dd>{{ $item['kategori'] }}</dd></div>
        <div><dt class="font-display font-bold italic">Lokasi kejadian</dt><dd>{{ $item['lokasi'] }}</dd></div>
        <div><dt class="font-display font-bold italic">Tanggal</dt><dd>{{ $item['tanggal'] }}</dd></div>
        <div class="sm:col-span-2"><dt class="font-display font-bold italic">Deskripsi</dt><dd>{{ $item['deskripsi'] }}</dd></div>
    </dl>
    <div class="mt-6 flex flex-wrap gap-3">
        @if ($item['tipe'] === 'ditemukan')
            <a href="{{ session('demo_role') === 'mahasiswa' ? route('klaim.create', $item['id']) : route('login') }}" class="btn-primary">Ajukan klaim</a>
        @endif
        <a href="{{ route('katalog') }}" class="btn-muted">Kembali ke katalog</a>
    </div>
</article>
@endsection
