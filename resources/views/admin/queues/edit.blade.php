@extends('admin.layout.layout-base', ['title' => 'Dashboard'])
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container{
            height: 0 !important;
        }
        .selection{
            display: none;
        }
    </style>
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
                                    action="{{ route('queue-simple.update', [
                                        'queue_simple' => $queue['.id'],
                                    ]) }}">

                                    @csrf
                                    @method('put')

                                    <div class="row">
                                        <div class="col-md-12">
                                            @include('admin.input.input', ['name' => 'name', 'value' => old('name',$queue['name'])])
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            @include('admin.input.input_number', ['name' => 'max-limit', 'value' =>
                                            old(
                                                'max-limit',(Str::of($queue['max-limit'])->explode('/')->first()/1000000)
                                            )])
                                        </div>
                                    </div>

                                    @php
                                        $expoloded = Str::of($queue['target'])->explode('/');
                                        $target = $expoloded->count()>2?$queue['target']:$expoloded->first();
                                    @endphp


                                    <div class="row">
                                        <div class="col-md-12">
                                            @include('admin.input.input', ['name' => 'target', 'value' => old('target',
                                            $target )])
                                            <select
                                                class="select2-area js-example-basic-single w-100" data-placeholder="Select Ip">
                                                <option value="">Select Ip</option>
                                                @foreach ($useableIpAddressesGroups as $key => $useableIpAddresses)
                                                    <optgroup label="{{ $key }}">
                                                        @foreach ($useableIpAddresses as $address)
                                                            <option data-interface="{{ $address['interface'] }}"
                                                                @selected($address['ip'] == $ip)
                                                                value="{{ $address['ip'] }}">{{ $address['ip']." (".$address['interface'].')' }}
                                                            </option>
                                                        @endforeach
                                                    </optgroup>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                    <input type="hidden" name="arp_id" value="{{$arp['.id']??''}}">


                                    <div class="row">
                                        <div class="col-md-12">
                                            @include('admin.input.input', ['name' => 'interface', 'value' => old('interface', $arp['interface']??'')])
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            @include('admin.input.input', ['name' => 'mac-address', 'value' => old('mac-address', $arp['mac-address']??'')])
                                        </div>
                                    </div>



                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Update User</button>
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

        $('#target').on('focus', function(){
            $('.select2-area').select2('open');
        })

        $('.select2-area').on('select2:open',function(){
            $('.select2-container').removeClass('select2-container--above');
            $('.select2-container').addClass('select2-container--below');
        });


        $('.select2-area').on('change', function(e) {
            $('#interface').val($(this).find(':selected').data('interface'));
            $('#target').val($(this).val());
        })

        $(document).ready(function() {
            //$('.select2-area').trigger('change');
        });
    </script>
@endsection
