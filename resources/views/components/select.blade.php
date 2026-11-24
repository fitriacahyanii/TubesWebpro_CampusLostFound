@props(['label', 'name', 'options' => [], 'placeholder' => 'Pilih', 'selected' => null])
<div>
    <label for="{{ $name }}" class="mb-1 block font-display text-sm font-bold not-italic">{{ $label }}</label>
    <select id="{{ $name }}" name="{{ $name }}" {{ $attributes->merge(['class' => 'input']) }}>
        <option value="">{{ $placeholder }}</option>
        @foreach ($options as $value => $text)
            @php $v = is_int($value) ? $text : $value; @endphp
            <option value="{{ $v }}" @selected(old($name, $selected ?? request($name)) == $v)>{{ $text }}</option>
        @endforeach
    </select>
</div>
