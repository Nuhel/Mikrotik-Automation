<div class="">

    <div class="row">


        <div class="col-md-6">
            <div class="input-group input-group-static  d-flex flex-row my-3 align-items-end @error('county') is-invalid @enderror">
                <label for="county" class="ms-0">County</label>
                <select class="form-control select2-area js-example-basic-single w-auto" id="county" name="county" wire:model='areaId' data-placeholder="Search County">
                    @foreach ($areas as $area)
                        <option value="{{ $area->id }}">{{ $area->name }}</option>
                    @endforeach
                </select>
                @error('county')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="col-md-6">
            <div class="input-group input-group-static  d-flex flex-row my-3 align-items-end @error('borough') is-invalid @enderror">
                <label for="borough" class="ms-0">Borough</label>
                <select class="form-control js-example-basic-single w-auto" id="borough" name="borough" data-placeholder="Search Borough">
                    @foreach ($boroughs ?? [] as $borough)
                        <option value="{{ $borough->id }}" {{ $boroughId == $borough->id ? 'selected' : '' }}>
                            {{ $borough->name }}</option>
                    @endforeach
                </select>
                @error('borough')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>







    </div>



</div>
