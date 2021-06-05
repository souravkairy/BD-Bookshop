@php
    $accepted_order = DB::table('order')
                    ->join('customer','order.c_id','customer.id')
                    ->select('order.*','customer.name')
                    ->where('order.status',3)
                    ->get();
    $i = 1;
@endphp
@extends('BackEnd/MasterLayout/master')
@section('dashboard')
<div id="wrapper">
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">
                <div class="page-title-box">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <h4 class="page-title">Order List (Delivery Done)</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="{{url('Admin-Dashboard')}}">Allaia</a></li>
                                <li class="breadcrumb-item"><a href="{{url('pending_order')}}">Pending order list</a></li>

                            </ol>
                        </div>
                    </div> <!-- end row -->
                </div>
                <!-- end page-title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <table id="datatable-buttons" class="table table-bordered table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Customer Name</th>
                                        <th>Payment Method</th>
                                        <th>Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($accepted_order as $row)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{$row->name}}</td>
                                            <td>{{$row->payment_method}}</td>
                                            <td>{{$row->total}}</td>
                                            <td>
                                                @if ($row->status == 1)
                                                <span class="badge badge-primary">Order Accepted</span>
                                                @elseif($row->status == 2)
                                                <span class="badge badge-warning">Delivery In Progress</span>
                                                @elseif($row->status == 3)
                                                <span class="badge badge-success">Delivery Done</span>
                                                @elseif($row->status == 4)
                                                <span class="badge badge-danger">Cancel</span>
                                                @elseif($row->status ==0)
                                                <span class="badge badge-secondary">Pending</span>
                                                @endif

                                            </td>
                                            <td>
                                                <a href="{{url('orderDetails/'.$row->id)}}" class=""><i class="fas fa-eye btn btn-primary"></i></a>
                                                {{-- <a href="" class=""><i
                                                        class="fab fa-nintendo-switch btn btn-success"></i></a> --}}
                                                {{-- <a href="" class=""><i class="fas fa-user-edit btn btn-warning"></i></a>
                                                <a href="" class=""><i class="fas fa-trash-alt btn btn-danger"></i></a> --}}
                                            </td>
                                        </tr>
                                        @php
                                            $i++;
                                        @endphp
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div>
            <!-- container-fluid -->

        </div>


        <footer class="footer">
            © 2019 - 2020 Stexo <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign</span>.
        </footer>

    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

</div>
@endsection
