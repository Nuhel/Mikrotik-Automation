<div class="d-grid " style="grid-auto-columns:  1fr 1fr; grid-auto-flow: column;">
    <div class="my-2">
        <label class="mb-1 ps-2"><strong>County</strong></label>
        <div class="border-end mt-2">

            <select name="county" id=""
                class="select2-area border-0 h-100 d-block px-2  w-100 bg-transparent js-example-basic-single"
                wire:model='areaId'>
                <option value="">Select County</option>
                @foreach ($areas as $area)
                    <option value="{{ $area->id }}">{{ $area->name }}</option>
                @endforeach
            </select>
        </div>
        @error('county')
            <small class="text-danger w-100" role="alert">
                <strong>{{ $message }}</strong>
            </small>
        @enderror
    </div>
    <div class="my-2">
        <label class="mb-1 ps-3" for=""><strong>Borough</strong></label>
        <div class="ps-2 border-end mt-2">

            <select name="borough" id=""
                class="border-0 h-100 d-block px-2  w-100 bg-transparent js-example-basic-single" wire:model='boroughId'>
                <option value="">Select Borough</option>
                @foreach ($lboroughs ?? [] as $borough)
                    <option value="{{ $borough->id }}">{{ $borough->name }}
                    </option>
                @endforeach
            </select>
        </div>
        @error('borough')
            <small class="text-danger w-100" role="alert">
                <strong>{{ $message }}</strong>
            </small>
        @enderror
    </div>

</div>
