<div class="form-check ps-0 @error($name) is-invalid @enderror">
    <input type="hidden" name="{{$name}}" value="0">
    <input name="{{$name}}" class="form-check-input" type="checkbox" value="1" id="{{$name}}" {{( isset($checked) && $checked)?"checked":''}}>
    <label class="custom-control-label" for="{{$name}}">{{Str::of($name)->headline()}} </label>


    @error($name)
    <small class="text-danger w-100" role="alert">
        <strong>{{ $message }}</strong>
    </small>
    @enderror

</div>
