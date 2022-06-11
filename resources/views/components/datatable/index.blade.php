@extends('admin.layout.layout-base',['title' => "Dashboard"])
@section('section')


<div>

    <div class="page-header align-items-start min-vh-100" >
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card  fadeIn3 fadeInBottom">

                <div class="card-body">
                    @include('components.datatable.base',['heading' => $heading])
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

</div>


@endsection




@section('css')
    @stack('inner-css')
@endsection


@section('script')
    @stack('inner-script')
@endsection
