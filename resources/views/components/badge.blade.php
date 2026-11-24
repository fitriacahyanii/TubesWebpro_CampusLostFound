@props(['type' => 'menunggu'])
@php
    $map = [
        'ditemukan'    => ['Barang Ditemukan', 'bg-green-100 text-green-800'],
        'hilang'       => ['Barang Hilang', 'bg-amber-100 text-amber-800'],
        'menunggu'     => ['Menunggu', 'bg-yellow-100 text-yellow-800'],
        'terverifikasi'=> ['Terverifikasi', 'bg-green-100 text-green-800'],
        'disetujui'    => ['Disetujui', 'bg-green-100 text-green-800'],
        'ditolak'      => ['Ditolak', 'bg-red-100 text-red-800'],
        'dikembalikan' => ['Dikembalikan', 'bg-blue-100 text-blue-800'],
    ];
    [$text, $cls] = $map[$type] ?? [ucfirst($type), 'bg-neutral-100 text-neutral-700'];
@endphp
<span {{ $attributes->merge(['class' => "inline-block rounded-full px-3 py-0.5 text-xs font-bold $cls"]) }}>{{ $text }}</span>
