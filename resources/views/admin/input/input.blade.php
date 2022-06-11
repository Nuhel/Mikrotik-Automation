@php
$oldVal = old($name, isset($value) ? $value : '');
@endphp
<div
    class="input-group input-group-static d-flex flex-row my-3 align-items-end @error($name)  @enderror {{ strlen($oldVal) > 0 ? 'is-filled' : '' }}">
    <label class="">{{ $label ?? Str::of($name)->headline() }}</label>
    <input id="{{ $name }}" type="text" class="form-control ms-2 w-auto pb-0 " name="{{ $name }}"
        value="{{ $oldVal }}" {{ isset($required) && $required ? 'required' : '' }} autocomplete="" autofocus>
    @error($name)
        <small class="text-danger w-100" role="alert">
            <strong>{{ $message }}</strong>
        </small>
    @enderror
</div>
