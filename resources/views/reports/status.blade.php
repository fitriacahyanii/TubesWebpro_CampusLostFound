@extends('layouts.app')
@section('title', 'Status Laporan')
@section('content')
@php
    $reports = [
        ['nama' => 'Dompet Hitam', 'tipe' => 'hilang', 'tanggal' => '22 Oktober 2026', 'status' => 'terverifikasi'],
        ['nama' => 'Charger Labtop', 'tipe' => 'hilang', 'tanggal' => '23 Oktober 2026', 'status' => 'menunggu'],
        ['nama' => 'Jaket Abu', 'tipe' => 'ditemukan', 'tanggal' => '20 Oktober 2026', 'status' => 'ditolak', 'alasan' => 'Foto dan deskripsi kurang jelas.'],
        ['nama' => 'Botol Minum Hijau', 'tipe' => 'ditemukan', 'tanggal' => '15 Oktober 2026', 'status' => 'dikembalikan'],
    ];
@endphp
<x-page-title title="Status Laporan" subtitle="Pantau laporan dan klaim milikmu" />
<section class="panel mx-auto max-w-3xl">
    <h2 class="mb-4 text-lg">Laporan Saya</h2>
    <ul class="divide-y divide-neutral-200">
        @foreach ($reports as $r)
            <li class="flex flex-wrap items-center justify-between gap-3 py-4">
                <div>
                    <p class="font-semibold">{{ $r['nama'] }}</p>
                    <p class="text-xs">{{ $r['tanggal'] }}</p>
                    @isset($r['alasan'])<p class="mt-1 text-xs text-red-700">Alasan penolakan: {{ $r['alasan'] }}</p>@endisset
                </div>
                <div class="flex items-center gap-2">
                    <x-badge :type="$r['tipe']" />
                    <x-badge :type="$r['status']" />
                </div>
            </li>
        @endforeach
    </ul>
</section>
@endsection
