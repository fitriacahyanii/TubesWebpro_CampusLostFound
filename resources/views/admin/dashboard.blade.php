@extends('layouts.app')
@section('title', 'Dashboard Admin')
@section('content')
@php
    $stats = [['Laporan menunggu', 4], ['Klaim menunggu', 2], ['Terverifikasi', 18], ['Dikembalikan', 7]];
    $pending = [
        ['id' => 7, 'nama' => 'Charger Labtop', 'tipe' => 'hilang', 'pelapor' => 'Budi (2210001)', 'ciri' => 'Ada stiker kuning di kabel'],
        ['id' => 8, 'nama' => 'Jaket Abu', 'tipe' => 'ditemukan', 'pelapor' => 'Sari (2210045)', 'ciri' => 'Label nama di kerah'],
    ];
    $claims = [
        ['id' => 1, 'barang' => 'Kartu Mahasiswa', 'pengklaim' => 'Dina (2210077)', 'bukti' => 'Menyebut foto di kartu dan tahun masuk 2022'],
    ];
@endphp
<x-page-title title="Dashboard Admin" subtitle="Verifikasi laporan, periksa klaim, dan konfirmasi pengembalian" />

<div class="mx-auto mb-6 grid max-w-5xl gap-4 sm:grid-cols-2 lg:grid-cols-4">
    @foreach ($stats as [$label, $n])
        <div class="rounded-2xl bg-white p-5"><p class="font-display text-3xl font-bold italic">{{ $n }}</p><p class="text-sm">{{ $label }}</p></div>
    @endforeach
</div>

<section class="panel mx-auto mb-6 max-w-5xl">
    <h2 class="mb-4 text-lg">Laporan menunggu verifikasi</h2>
    <div class="overflow-x-auto">
    <table class="w-full text-left text-sm">
        <thead><tr class="border-b border-neutral-300 font-display italic"><th class="py-2">Barang</th><th>Jenis</th><th>Pelapor</th><th>Ciri rahasia</th><th class="text-right">Aksi</th></tr></thead>
        <tbody>
        @foreach ($pending as $p)
            <tr class="border-b border-neutral-200 align-top">
                <td class="py-3 font-semibold">{{ $p['nama'] }}</td>
                <td><x-badge :type="$p['tipe']" /></td>
                <td>{{ $p['pelapor'] }}</td>
                <td>{{ $p['ciri'] }}</td>
                <td class="space-x-2 whitespace-nowrap text-right">
                    <button type="button" class="btn-ok">Verifikasi</button>
                    <button type="button" class="btn-danger">Tolak</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
</section>

<section class="panel mx-auto max-w-5xl">
    <h2 class="mb-4 text-lg">Klaim menunggu pemeriksaan</h2>
    <div class="overflow-x-auto">
    <table class="w-full text-left text-sm">
        <thead><tr class="border-b border-neutral-300 font-display italic"><th class="py-2">Barang</th><th>Pengklaim</th><th>Bukti klaim</th><th class="text-right">Aksi</th></tr></thead>
        <tbody>
        @foreach ($claims as $c)
            <tr class="border-b border-neutral-200 align-top">
                <td class="py-3 font-semibold">{{ $c['barang'] }}</td>
                <td>{{ $c['pengklaim'] }}</td>
                <td>{{ $c['bukti'] }}</td>
                <td class="space-x-2 whitespace-nowrap text-right">
                    <button type="button" class="btn-ok">Setujui</button>
                    <button type="button" class="btn-danger">Tolak</button>
                    <button type="button" class="btn-primary">Konfirmasi pengembalian</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
</section>
@endsection
