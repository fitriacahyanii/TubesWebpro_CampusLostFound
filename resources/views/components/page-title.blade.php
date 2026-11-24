@props(['title', 'subtitle' => null])
<div class="mb-6 text-center">
    <h1 class="text-2xl text-ink">{{ $title }}</h1>
    @if ($subtitle)<p class="text-xs font-semibold">{{ $subtitle }}</p>@endif
</div>
