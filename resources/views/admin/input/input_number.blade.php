@php
$oldVal = old($name, isset($value) ? $value : '');
@endphp
<div
    class="input-group input-group-static my-3 d-flex flex-row my-2 align-items-end @error($name)  @enderror {{ strlen($oldVal) > 0 ? 'is-filled' : '' }}">
    <label class="">{{ Str::of($name)->headline() }}:</label>
    <input id="{{ $name }}" type="number"
        class="form-control w-auto ms-2 pb-0 " name="{{ $name }}"
        value="{{ $oldVal }}" {{ isset($required) && $required ? 'required' : '' }} autocomplete="" autofocus>
    @error($name)
    <small class="text-danger w-100" role="alert">
        <strong>{{ $message }}</strong>
    </small>
    @enderror
</div>
