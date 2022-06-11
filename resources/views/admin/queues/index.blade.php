@extends('admin.layout.layout-base',['title' => "Dashboard"])
@section('section')
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
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder text-left ps-1">Name</th>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder" style="width: 100px">Target</th>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder">Limit</th>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder">Mac</th>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder">Status</th>
                                                <th class="text-uppercase text-secondary text-xs font-weight-bolder">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($queues as $queue)
                                                <tr>
                                                    <td class="text-secondary text-xs font-weight-bolder">{{$queue['name']}} </td>
                                                    <td class="text-secondary text-xs ">{{Str::of($queue['target'])->limit(16)}}</td>
                                                    <td class="text-secondary text-xs">{{$queue['max-limit']}} Mbps</td>
                                                    <td class="text-secondary text-xs">
                                                        {!!
                                                            $queue['arp']== null?'<span class="badge bg-gradient-primary">Mac Not Assigned</span>':
                                                            ($queue['arp']['mac-address']??'<span class="badge bg-gradient-primary">Mac Not Assigned</span>')
                                                        !!}</td>
                                                    <td class="text-secondary text-xs">
                                                        <div class="d-flex justify-content-center">
                                                            @if ($queue['arp']== null)
                                                                <span class="badge bg-gradient-primary">Deactivated</span>
                                                            @else
                                                                @if ($queue['arp']['disabled']=="true")
                                                                    <a href="{{route('change-status',[
                                                                        'id' => $queue['arp']['.id'],
                                                                        'status' => 'enable',
                                                                    ])}}" class="btn btn-sm btn-success m-1 text-xs">Enable</a>
                                                                @else
                                                                <a href="{{route('change-status',[
                                                                    'id' => $queue['arp']['.id'],
                                                                    'status' => 'disable',
                                                                ])}}" class="btn btn-sm btn-danger m-1 text-xs">Disable</a>
                                                                @endif
                                                            @endif
                                                        </div>
                                                    </td>

                                                    <td>
                                                        <div class="d-flex gap-1 justify-content-center">
                                                            <a class="btn btn-sm btn-warning" href="{{route('queue-simple.edit',[
                                                                'queue_simple' => $queue['.id'],
                                                            ])}}">E</a>

                                                            <form action="{{route('queue-simple.destroy',['queue_simple' => $queue['.id']])}}" method="post">
                                                                @csrf
                                                                @method('delete')
                                                                <button class="btn btn-sm btn-danger">D</button>
                                                                <input type="hidden" name="arp_id" value="{{$queue['arp']['.id']??''}}">
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="5">No Data</td>
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
