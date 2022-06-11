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
                                    action="{{ route('ip-pools.store') }}">

                                    @csrf

                                    <div class="row">

                                        <div class="col-md-6">
                                            @include('admin.input.input', ['name' => 'name'])
                                        </div>

                                        <div class="col-md-6">
                                            @include('admin.input.input', ['name' => 'comment'])
                                        </div>
                                        <div class="col-md-6">
                                            @include('admin.input.input', ['name' => 'start'])
                                        </div>
                                        <div class="col-md-6">
                                            @include('admin.input.input', ['name' => 'end'])
                                        </div>

                                        <input type="hidden" id="ranges" name="ranges">


                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="d-flex align-items-center">
                                                <label for="" class="ms-0 mb-0">Next Pool</label>
                                                <div class="w-100 flex-grow-1 border-bottom text-sm ">
                                                    <select name="next-pool" class="select2-area js-example-basic-single w-100"
                                                    data-placeholder="Select Next Pool">
                                                    <option value="">None</option>
                                                    <option value="PPPOE_POOL">PppoE Pool</option>
                                                    <option value="dhcp">Dhcp</option>
                                                    <option value="dhcp_pool1">Dhcp Pool 1</option>
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
    $('#start').on('keyup', function(){
        var splitted = $(this).val().split('/')[0].split('.');
        var network = "";
        splitted.forEach((element, index) => {
            if(index < 3){
                network += element+'.';
            }
        });

        $('#end').val(network+'254');
        $('#ranges').val($('#start').val()+'-'+$('#end').val())
    })
</script>
@endsection
