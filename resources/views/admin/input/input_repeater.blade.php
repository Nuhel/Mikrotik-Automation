<div class="input-group input-group-static my-3 d-flex flex-row my-2 align-items-end @error($error)  @enderror {{ strlen($value)>0?"is-filled":''}}">
    <label class="">{{Str::of($name)->headline()}}</label>
    <input id="{{$error}}" type="text" class="form-control w-auto ms-2 pb-0 @error($error)  @enderror" name="{{$name}}" value="{{ $value }}"  {{( isset($required) && $required)?"required":''}} autocomplete="" autofocus>
    @error($error)
    <small class="text-danger w-100" role="alert">
        <strong>{{ $message }}</strong>
    </small>
    @enderror
</div>
