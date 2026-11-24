@props(['item'])
<article class="flex flex-col rounded-lg border border-neutral-700 bg-white p-5">
    <h3 class="text-lg">{{ $item['nama'] }}</h3>
    <x-badge :type="$item['tipe']" class="mt-1 w-fit" />
    <dl class="mt-3 space-y-1 text-sm">
        <div class="flex gap-2"><dt class="font-display font-bold italic">Kategori:</dt><dd>{{ $item['kategori'] }}</dd></div>
        <div class="flex gap-2"><dt class="font-display font-bold italic">Lokasi:</dt><dd>{{ $item['lokasi'] }}</dd></div>
        <div class="flex gap-2"><dt class="font-display font-bold italic">Tanggal:</dt><dd>{{ $item['tanggal'] }}</dd></div>
    </dl>
    <a href="{{ route('katalog.show', $item['id']) }}" class="btn-primary mt-4 w-fit">Lihat detail</a>
</article>
