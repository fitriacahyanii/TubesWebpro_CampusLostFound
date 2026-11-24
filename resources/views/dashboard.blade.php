@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
@php
    $modules = [
        ['Laporan Barang', 'Pembuatan dan pengelolaan laporan barang', 'laporan.create'],
        ['Klaim Barang', 'Pengajuan dan pengelolaan klaim barang', 'klaim.index'],
        ['Katalog Barang', 'Cari dan lihat detail barang', 'katalog'],
        ['Status Laporan', 'Pantau laporan dan klaim milikmu', 'status.index'],
    ];
@endphp
<div class="mb-6 text-center">
    <h1 class="text-3xl">Selamat Datang, {{ session('demo_name', 'Mahasiswa') }}</h1>
    <p class="text-xs font-semibold">Dashboard Pengguna</p>
    <p class="text-sm font-semibold">Silakan pilih fitur yang ingin digunakan.</p>
</div>
<section class="panel mx-auto max-w-4xl">
    <h2 class="mb-4 text-2xl">Modul Sistem</h2>
    <div class="grid gap-4 sm:grid-cols-2">
        @foreach ($modules as [$title, $desc, $route])
            <a href="{{ route($route) }}" class="rounded-lg border border-neutral-700 p-4 transition hover:border-brand hover:bg-blue-50 focus-visible:outline-2 focus-visible:outline-brand">
                <h3 class="text-lg">{{ $title }}</h3>
                <p class="mt-2 text-sm">{{ $desc }}</p>
            </a>
        @endforeach
    </div>
</section>
@endsection
