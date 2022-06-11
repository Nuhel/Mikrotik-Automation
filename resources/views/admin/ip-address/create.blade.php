@extends('admin.layout.layout-base', ['title' => 'Dashboard'])
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('section')
    <div>

        <div class="page-header align-items-start min-vh-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card  fadeIn3 fadeInBottom">

                            <div class="card-body">
                                <form role="form" class="text-start" method="POST"
                                    action="{{ route('ip-addresses.store') }}">

                                    @csrf

                                    <div class="row">
                                        <div class="col-md-6">
                                            @include('admin.input.input', ['name' => 'address'])
                                        </div>
                                        <div class="col-md-6">
                                            @include('admin.input.input', ['name' => 'network'])
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="d-flex align-items-center">
                                                <label for="" class="ms-0 mb-0">Interface</label>
                                                <div class="w-100 flex-grow-1 border-bottom text-sm ">
                                                    <select name="interface" class="select2-area js-example-basic-single w-100"
                                                    data-placeholder="Select Interface">
                                                    @foreach ($interfaces as $interface)
                                                        <option value="{{ $interface['name'] }}">
                                                            {{ $interface['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>





                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Add
                                            Ip Address</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection

@section('script')

<script>
    $('#address').on('keyup', function(){
        var splitted = $(this).val().split('/')[0].split('.');
        var network = "";
        splitted.forEach((element, index) => {
            if(index < 3){
                network += element+'.';
            }
        });
        $('#network').val(network+'0');
    })
</script>
@endsection
