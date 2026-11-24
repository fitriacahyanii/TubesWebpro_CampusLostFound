@extends('layouts.app')
@section('title', 'Ajukan Klaim')
@section('content')
<x-page-title title="Ajukan Klaim Barang" subtitle="Buktikan bahwa barang ini milikmu" />
<form method="POST" action="{{ route('klaim.store') }}" enctype="multipart/form-data" class="panel mx-auto max-w-xl space-y-4">
    @csrf
    <input type="hidden" name="item_id" value="{{ $item['id'] }}">
    <div class="rounded-lg bg-field p-4 text-sm">
        <p class="font-display text-base font-bold italic">{{ $item['nama'] }}</p>
        <p>{{ $item['kategori'] }} · {{ $item['lokasi'] }} · {{ $item['tanggal'] }}</p>
    </div>
    <div>
        <label for="bukti_teks" class="mb-1 block font-display text-sm font-bold">Ciri-ciri yang hanya diketahui pemilik</label>
        <textarea id="bukti_teks" name="bukti_teks" rows="4" required class="input" placeholder="Contoh: isi dompet, stiker, goresan, nomor seri"></textarea>
    </div>
    <div>
        <label for="bukti_foto" class="mb-1 block font-display text-sm font-bold">Foto bukti kepemilikan</label>
        <input id="bukti_foto" name="bukti_foto" type="file" accept="image/*" required class="input file:mr-3 file:rounded file:border file:border-neutral-400 file:bg-neutral-200 file:px-3 file:py-1 file:text-xs">
    </div>
    <div class="flex flex-wrap gap-3">
        <button class="btn-primary">Kirim klaim</button>
        <a href="{{ route('katalog.show', $item['id']) }}" class="btn-muted">Batal</a>
    </div>
</form>
@endsection
