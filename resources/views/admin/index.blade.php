@extends('admin.layout.layout-base', ['title' => 'Dashboard'])
@section('section')
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-mosque opacity-10" aria-hidden="true"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Daily</p>
                            <img src="http://27.147.239.86/graphs/iface/ether1%20WAN/daily.gif" alt="">
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">
                                <a class="btn btn-sm btn-link text-success mb-0 p-0" href="">View All Active Mosque</a>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                            <i class="material-icons opacity-10">Weekly</i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Total Member</p>
                            <img src="http://27.147.239.86/graphs/iface/ether1%20WAN/weekly.gif" alt="">
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">
                                <a class="btn btn-sm btn-link  mb-0 p-0 text-success" href="">View All Members</a>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6 mb-xl-0 mb-4 mt-2">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-map-marked" aria-hidden="true"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Monthly</p>
                            <img src="http://27.147.239.86/graphs/iface/ether1%20WAN/monthly.gif" alt="">
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0"><span class="text-success text-sm font-weight-bolder">
                                <a class="btn btn-sm btn-link  mb-0 p-0 text-success" href="">View All Area</a>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6 mt-2">
                <div class="card">
                    <div class="card-header p-3 pt-2">
                        <div
                            class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                            <i class="fas fa-mosque opacity-5" aria-hidden="true"></i>
                        </div>
                        <div class="text-end pt-1">
                            <p class="text-sm mb-0 text-capitalize">Yearly</p>
                            <img src="http://27.147.239.86/graphs/iface/ether1%20WAN/yearly.gif" alt="">
                        </div>
                    </div>
                    <hr class="dark horizontal my-0">
                    <div class="card-footer p-3">
                        <p class="mb-0">
                            <span class="text-success text-sm font-weight-bolder">
                                <a class="btn btn-sm btn-link  mb-0 p-0 text-success" href="">View Pending Mosque</a>
                            </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
