@extends('layouts.app')
@section('title', 'Klaim Barang')
@section('content')
@php
    $claims = [
        ['barang' => 'Kartu Mahasiswa', 'tanggal' => '22 Oktober 2026', 'status' => 'menunggu'],
        ['barang' => 'Payung Biru', 'tanggal' => '19 Oktober 2026', 'status' => 'disetujui'],
        ['barang' => 'Tas Hitam', 'tanggal' => '18 Oktober 2026', 'status' => 'ditolak'],
    ];
@endphp
<x-page-title title="Klaim Barang" subtitle="Pantau klaim kepemilikan yang kamu ajukan" />
<section class="panel mx-auto max-w-3xl">
    <div class="mb-4 flex items-center justify-between">
        <h2 class="text-lg">Klaim Saya</h2>
        <a href="{{ route('katalog', ['status' => 'ditemukan']) }}" class="btn-primary">Cari barang untuk diklaim</a>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm">
            <thead><tr class="border-b border-neutral-300 font-display italic"><th class="py-2">Barang</th><th>Tanggal klaim</th><th>Status</th><th></th></tr></thead>
            <tbody>
            @foreach ($claims as $c)
                <tr class="border-b border-neutral-200">
                    <td class="py-3 font-semibold">{{ $c['barang'] }}</td>
                    <td>{{ $c['tanggal'] }}</td>
                    <td><x-badge :type="$c['status']" /></td>
                    <td class="text-right text-xs">
                        @if ($c['status'] === 'disetujui') Hubungi admin untuk pengambilan barang @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection
