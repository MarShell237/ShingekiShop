@php
    $label ??= null;
    $type ??= 'text';
    $name ??= '';
    $placeholder ??='';
    $value ??='';
@endphp

<div class="input-container">
    <label for="{{ $name }}">{{ $label }}</label>

    @if ($type == 'textarea')
        <textarea type="{{ $type }}" id="{{ $name }}" class="@error($name) is-invalidate @enderror" name="{{ $name }}" placeholder="{{ $placeholder }}">{{ old($name,$value) }}</textarea>
    @else
        <input type="{{ $type }}" id="{{ $name }}" class="@error($name) is-invalidate @enderror" name="{{ $name }}" placeholder="{{ $placeholder }}" value="{{ old($name,$value) }}">
    @endif

    @error($name)
        <small class="invalidate">{{ $message }}</small>
    @enderror

</div>

