@extends('admin.layout.layout-base',['title' => "Dashboard"])
@section('section')
@php
    $enableModuleAction = $moduleName??false;
    $keys = [];
    foreach($data as $values){
        $tempKeys = collect($values)->keys();
        if($tempKeys->count() > count($keys)){
            $keys =  $tempKeys;
        }
    }
    $keys = (collect($keys)->reject(function($value,$key){
        return $value == '.id';
    }));
@endphp
    <div>

        <div class="page-header align-items-start min-vh-100">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card  fadeIn3 fadeInBottom">

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-sm align-items-center">

                                        <thead>
                                            <tr>
                                                @foreach ($keys as $title)
                                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder {{$loop->first?'text-start ps-1':''}} {{($loop->last && !$enableModuleAction)?'text-end pe-1':''}} {{!(($loop->last && !$enableModuleAction) || $loop->first)?'text-center':''}}" >{{$title}}</th>
                                                @endforeach
                                                @if ($enableModuleAction)
                                                    <th class="text-uppercase text-secondary text-xs font-weight-bolder text-end pe-1">Action</th>
                                                @endif
                                                {{-- <th class="text-uppercase text-secondary text-xs font-weight-bolder text-left ps-1">Name</th> --}}

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($data as $row)
                                                <tr>
                                                    @foreach ($keys as $key)
                                                        <td class="text-secondary text-xs {{$loop->first?'text-start font-weight-bolder':''}} {{($loop->last && !$enableModuleAction)?'text-end':''}}  {{!(($loop->last && !$enableModuleAction) || $loop->first)?'text-center':''}} ">{{$row[$key]??""}}</td>
                                                    @endforeach
                                                    @if ($enableModuleAction)
                                                        <td>
                                                            @php
                                                                $routeName =  Str::of($moduleName)->kebab()->toString();
                                                                $paramName = Str::of($moduleName)->headline()->snake()->singular()->toString();
                                                            @endphp
                                                            <div class="d-flex gap-1 justify-content-center py-2">
                                                                <a class="btn btn-sm btn-warning mb-0" href="{{
                                                                    route(
                                                                        $routeName.'.edit',
                                                                        [$paramName => $row['.id'],]
                                                                    )}}">E</a>

                                                                <form action="{{route($routeName.'.destroy',[$paramName => $row['.id']])}}" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button class="btn btn-sm btn-danger mb-0">D</button>
                                                                    <input type="hidden" name="arp_id" value="{{$queue['arp']['.id']??''}}">
                                                                </form>
                                                            </div>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="{{$keys->count()}}">No Data</td>
                                                </tr>
                                            @endforelse



                                        </tbody>

                                    </table>
                                </div>
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
