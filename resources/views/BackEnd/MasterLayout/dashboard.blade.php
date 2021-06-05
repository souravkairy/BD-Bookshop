@php
    $po = DB::table('order')->where('status',0)->count();
    $od = DB::table('order')->where('status',3)->count();
    $tb = DB::table('product')->where('status',1)->count();
    $tc = DB::table('customer')->where('status',1)->count();
    $tr = DB::table('order')->where('status',3)->sum('total');
@endphp

@extends('BackEnd.MasterLayout.master')
@section('dashboard')
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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Stexo</a></li>
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
                            <h4 class="mt-0 header-title mb-4">Active Deals</h4>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Contact</th>
                                            <th scope="col">Location</th>
                                            <th scope="col" colspan="2">Date</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Philip Smead</td>
                                            <td><span class="badge badge-success">Delivered</span></td>
                                            <td>$9,420,000</td>
                                            <td>
                                                <div>
                                                    <img src="{{asset('public/BackEnd/assets/images/users/user-2.jpg')}}" alt="" class="thumb-md rounded-circle mr-2"> Philip Smead
                                                </div>
                                            </td>
                                            <td>Houston, TX 77074</td>
                                            <td>15/1/2018</td>

                                            <td>
                                                <div>
                                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Brent Shipley</td>
                                            <td><span class="badge badge-warning">Pending</span></td>
                                            <td>$3,120,000</td>
                                            <td>
                                                <div>
                                                    <img src="{{asset('public/BackEnd/assets/images/users/user-3.jpg')}}" alt="" class="thumb-md rounded-circle mr-2"> Brent Shipley
                                                </div>
                                            </td>
                                            <td>Oakland, CA 94612</td>
                                            <td>16/1/2019</td>

                                            <td>
                                                <div>
                                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Robert Sitton</td>
                                            <td><span class="badge badge-success">Delivered</span></td>
                                            <td>$6,360,000</td>
                                            <td>
                                                <div>
                                                    <img src="{{asset('public/BackEnd/assets/images/users/user-4.jpg')}}" alt="" class="thumb-md rounded-circle mr-2"> Robert Sitton
                                                </div>
                                            </td>
                                            <td>Hebron, ME 04238</td>
                                            <td>17/1/2019</td>

                                            <td>
                                                <div>
                                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alberto Jackson</td>
                                            <td><span class="badge badge-danger">Cancel</span></td>
                                            <td>$5,200,000</td>
                                            <td>
                                                <div>
                                                    <img src="{{asset('public/BackEnd/assets/images/users/user-5.jpg')}}" alt="" class="thumb-md rounded-circle mr-2"> Alberto Jackson
                                                </div>
                                            </td>
                                            <td>Salinas, CA 93901</td>
                                            <td>18/1/2019</td>

                                            <td>
                                                <div>
                                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>David Sanchez</td>
                                            <td><span class="badge badge-success">Delivered</span></td>
                                            <td>$7,250,000</td>
                                            <td>
                                                <div>
                                                    <img src="{{asset('public/BackEnd/assets/images/users/user-6.jpg')}}" alt="" class="thumb-md rounded-circle mr-2"> David Sanchez
                                                </div>
                                            </td>
                                            <td>Cincinnati, OH 45202</td>
                                            <td>19/1/2019</td>

                                            <td>
                                                <div>
                                                    <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                                </div>
                                            </td>
                                        </tr>
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


@endsection
