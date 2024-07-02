@php
    $label ??= null;
    $class ??= null;
    $name ??= '';
    $value??='';
@endphp

<div class="input-container">
    <label for="{{ $name }}">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="@error($name) is-invalidate @enderror">
        @foreach ($categories as $id => $categorie)
            <option value="{{ $id+1 }}" @selected($value == $id+1)>{{ $categorie->name }}</option>
        @endforeach
    </select>

    @error($name)
        <small class="invalidate">{{ $message }}</small>
    @enderror
</div>
