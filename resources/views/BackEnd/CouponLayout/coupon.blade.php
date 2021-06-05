@php
$coupon = DB::table('coupon')->get();
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
                                <h4 class="page-title">Coupon Table</h4>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{ url('Admin-Dashboard') }}">Allaia</a></li>
                                    <li class="breadcrumb-item"><a href="{{ url('coupon') }}">Coupon Table</a></li>

                                </ol>
                            </div>
                        </div> <!-- end row -->
                    </div>
                    <!-- end page-title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <button class="btn btn-light waves-effect mb-3" data-toggle="modal"
                                        data-target=".bs-example-modal-center">Add-Coupon </button>
                                    <table id="datatable-buttons"
                                        class="table table-bordered table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Coupon Type</th>
                                                <th>Coupon Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($coupon as $row)
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    <td>{{$row->c_name}}</td>
                                                    <td>
                                                        @php
                                                            if ($row->c_type == 1) {
                                                                echo "Percentage";
                                                            }else {
                                                                echo "Flat";
                                                            }
                                                        @endphp
                                                    </td>
                                                    <td>{{$row->c_ammount}}</td>
                                                    <td>
                                                        <span class="badge badge-success">Active</span>
                                                    </td>
                                                    <td>
                                                        <a href="#" class=""><i class="fab fa-nintendo-switch btn btn-success"></i></a>
                                                        <a href="#" class=""><i class="fas fa-user-edit btn btn-warning"></i></a>
                                                        <a href="#" class=""><i class="fas fa-trash-alt btn btn-danger"></i></a>
                                                    </td>
                                                </tr>
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
            <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0">Add Coupon</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            {{-- <h4 class="mt-0 header-title">Add Category</h4>
                                        <p class="sub-title">Please Provide a Unique Category Name</p> --}}
                                            <form class="" action="{{ url('save_coupon') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Coupon Name</label>
                                                    <input type="text" name="c_name" class="form-control" required
                                                        placeholder="Coupon Name" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Coupon Type</label>
                                                    <select class="form-control" required name="c_type" id="">
                                                        <option label="Select Type"></option>
                                                        <option value="1">Percentage</option>
                                                        <option value="2">Flat</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Amount</label>
                                                    <input name="c_ammount" type="text" class="form-control" required
                                                        placeholder="Amount" />
                                                </div>
                                                <div class="form-group">
                                                    <div>
                                                        <button type="submit"
                                                            class="btn btn-primary waves-effect waves-light">
                                                            Submit
                                                        </button>
                                                        {{-- <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                                        Cancel
                                                    </button> --}}
                                                    </div>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div> <!-- end col -->


                            </div> <!-- end row -->
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- content -->

        </div>
        <!-- ============================================================== -->
        <!-- End Right content here -->
        <!-- ============================================================== -->

    </div>
@endsection
