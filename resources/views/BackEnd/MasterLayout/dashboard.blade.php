@php
    $po = DB::table('order')->where('status',0)->count();
    $od = DB::table('order')->where('status',3)->count();
    $tb = DB::table('product')->where('status',1)->count();
    $tc = DB::table('customer')->where('status',1)->count();
    $tr = DB::table('order')->where('status',3)->sum('total');
    $pending_orders = DB::table('order')
                    ->join('customer','order.c_id','customer.id')
                    ->select('order.*','customer.name','customer.mb1')
                    ->orderBy('id', 'desc')
                    ->limit(10)
                    ->get();
    $id = Session::get('id');
    $role_permission = DB::table('admin_login')
                                ->where('id',$id)
                                ->first();

@endphp

@extends('BackEnd.MasterLayout.master')
@section('dashboard')
@if ($role_permission->dashboard == 1)
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">BDBOOKSHOP</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end page-title -->

            <div class="row">
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-heading p-4">
                            <div class="mini-stat-icon float-right">
                                <i class="mdi mdi-table-border bg-primary  text-white"></i>
                            </div>
                            <div>
                                <h5 class="font-16">New Orders</h5>
                            </div>
                            <h3 class="mt-4">{{$po}}</h3>
                            <div class="progress mt-4" style="height: 4px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">75%</span></p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-heading p-4">
                            <div class="mini-stat-icon float-right">
                                <i class="mdi mdi-contacts bg-secondary  text-white"></i>
                            </div>
                            <div>
                                <h5 class="font-16">Contact</h5>
                            </div>
                            <h3 class="mt-4">10</h3>
                            <div class="progress mt-4" style="height: 4px;">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-heading p-4">
                            <div class="mini-stat-icon float-right">
                                <i class="fas fa-people-carry bg-success text-white"></i>
                            </div>
                            <div>
                                <h5 class="font-16">Delivery Done</h5>
                            </div>
                            <h3 class="mt-4">{{$od}}</h3>
                            <div class="progress mt-4" style="height: 4px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">88%</span></p> --}}
                        </div>
                    </div>
                </div>


                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-heading p-4">
                            <div class="mini-stat-icon float-right">
                                <i class="mdi mdi-library-books bg-danger text-white"></i>
                            </div>
                            <div>
                                <h5 class="font-16">Total Books</h5>
                            </div>
                            <h3 class="mt-4">{{$tb}}</h3>
                            <div class="progress mt-4" style="height: 4px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">82%</span></p> --}}
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-heading p-4">
                            <div class="mini-stat-icon float-right">
                                <i class="mdi mdi-tag-text-outline bg-warning text-white"></i>
                            </div>
                            <div>
                                <h5 class="font-16">Total Customer</h5>
                            </div>
                            <h3 class="mt-4">{{$tc}}</h3>
                            <div class="progress mt-4" style="height: 4px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">68%</span></p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        <div class="card-heading p-4">
                            <div class="mini-stat-icon float-right">
                                <i class="far fa-money-bill-alt bg-warning text-white"></i>
                            </div>
                            <div>
                                <h5 class="font-16">Total Revenue</h5>
                            </div>
                            <h3 class="mt-4">{{$tr}}</h3>
                            <div class="progress mt-4" style="height: 4px;">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">68%</span></p> --}}
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        {{-- <div class="card-heading p-4">
                            <div class="mini-stat-icon float-right">
                                <i class="far fa-money-bill-alt bg-success text-white"></i>
                            </div>
                            <div>
                                <h5 class="font-16">Total Cost</h5>
                            </div>
                            <h3 class="mt-4">{{$tcost}}</h3>
                            <div class="progress mt-4" style="height: 4px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            {{-- <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">88%</span></p> --}}
                        {{-- </div> --}}
                    </div>
                </div>



                <div class="col-sm-6 col-xl-3">
                    <div class="card">
                        {{-- <div class="card-heading p-4">
                            <div class="mini-stat-icon float-right">
                                <i class="far fa-money-bill-alt bg-danger text-white"></i>
                            </div>
                            <div>
                                <h5 class="font-16">Profit</h5>
                            </div>
                            <h3 class="mt-4">86%</h3>
                            <div class="progress mt-4" style="height: 4px;">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 82%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">82%</span></p>
                        </div> --}}
                    </div>
                </div>

            </div>
            <!-- START ROW -->
            <div class="row">
                <div class="col-xl-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="mt-0 header-title mb-4">Last 10 Order's Status</h4>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Contact</th>
                                            <th scope="col">Order Date</th>
                                            <th scope="col">Status</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($pending_orders as $item)
                                        <tr>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->total}}</td>
                                            <td>{{$item->mb1}}</td>
                                            <td>{{$item->date}}</td>

                                            @if ($item->status == 0 )
                                            <td><span class="badge badge-warning">Pending</span></td>
                                            @elseif($item->status == 2)
                                            <td><span class="badge badge-primary">Delivery In Progress</span></td>
                                            @elseif($item->status == 3)
                                            <td><span class="badge badge-success">Delivery Done</span></td>
                                            @elseif($item->status == 4)
                                            <td><span class="badge badge-danger">Cancel</span></td>
                                            @endif
                                        </tr>
                                        @empty

                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!-- END ROW -->

        </div>
        <!-- container-fluid -->

    </div>
    <!-- content -->
@endif
@endsection
