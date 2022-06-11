@extends('admin.layout.layout-base',['title' => "Dashboard"])
@section('section')


<div>

    <div class="page-header align-items-start min-vh-100" >
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card  fadeIn3 fadeInBottom">

                <div class="card-body">
                  <form role="form" class="text-start" method="POST" action="{{ route('configs.store') }}">

                      @csrf



                      <div class="row">
                        <div class="col-md-12">
                            @include('admin.input.input',['name' => "makkah", 'value' => old('makkah', $config['makkah'])])
                        </div>

                        <div class="col-md-12">
                            @include('admin.input.input',['name' => "madina", 'value' => old('madina', $config['madina'])])
                        </div>

                        <div class="col">
                            <textarea name="about">{!!old('madina', $config['about']??"")!!}</textarea>
                        </div>
                      </div>

                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Update</button>
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
<script src="https://cdn.ckeditor.com/4.18.0/full/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'about' );
</script>
@endsection
