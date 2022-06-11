<div class="d-grid " style="grid-auto-columns:  1fr 1fr; grid-auto-flow: column;">
    <div class="border-end ">
        <select name="county" id="" class="select2-area border-0 h-100 d-block px-2  w-100 bg-transparent js-example-basic-single" wire:model='areaId'>
            <option value="">Select County</option>
            @foreach ($areas as $area)
                <option value="{{ $area->id }}">{{ $area->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="border-end ">
        <select name="borough" id="" class="border-0 h-100 d-block px-2  w-100 bg-transparent js-example-basic-single" wire:model='boroughId'>
            <option value="" >Select Borough</option>
            @foreach ($lboroughs ?? [] as $borough)
                <option value="{{ $borough->id }}" >{{ $borough->name }}
                </option>
            @endforeach
        </select>
    </div>
</div>
