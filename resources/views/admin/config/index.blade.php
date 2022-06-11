@extends('admin.layout.layout-base',['title' => "Dashboard"])
@section('section')


<div>

    <div class="page-header align-items-start min-vh-100" >
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">

                <div class="card  fadeIn3 fadeInBottom mt-5">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                          <h6 class="text-white text-capitalize ps-3">Configure</h6>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm w-100">
                            <tbody>
                                <tr>
                                    <td>Makkah: </td>
                                    <td>{{$config['makkah']}}</td>
                                </tr>

                                <tr>
                                    <td>Madina: </td>
                                    <td>{{$config['madina']}}</td>
                                </tr>


                            </tbody>
                        </table>

                        <div>
                            <p class="text-center"><strong>About</strong></p>
                            <div class="mt-5">
                                {!! $config['about']??"" !!}
                            </div>
                        </div>
                        <a href="{{route('configs.edit')}}" class="btn btn-sm btn-success">Edit</a>
                    </div>
                  </div>

            </div>
          </div>
        </div>

      </div>

</div>


@endsection
