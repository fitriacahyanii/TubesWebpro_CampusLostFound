@props(['label', 'name', 'type' => 'text', 'placeholder' => '', 'required' => true])
<div>
    <label for="{{ $name }}" class="mb-1 block font-display text-sm font-bold not-italic">{{ $label }}</label>
    <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" placeholder="{{ $placeholder }}" value="{{ old($name) }}" @required($required) {{ $attributes->merge(['class' => 'input']) }}>
    @error($name)<p class="mt-1 text-xs font-semibold text-red-600">{{ $message }}</p>@enderror
</div>
