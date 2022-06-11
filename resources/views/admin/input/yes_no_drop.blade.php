<div class="input-group input-group-static ps-0 d-flex flex-row my-3 align-items-end">
    <label class="custom-control-label mb-0" for="{{ $name }}">{{ $label??Str::of($name)->headline() }}</label>
    <select class="form-control pt-0 w-auto ms-2 pb-0" name="{{ $name }}" id="{{ $name }}">
        <option value="0" @selected($value == '0')>No</option>
        <option value="1" @selected($value == '1')>Yes</option>

    </select>

    @error($name)
    <small class="text-danger w-100" role="alert">
        <strong>{{ $message }}</strong>
    </small>
    @enderror

</div>
