@php
$admin_role = DB::table('admin_login')->get();
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
                                <h4 class="page-title">Admin List</h4>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{ url('Admin-Dashboard') }}">BDBOOKSHOP</a></li>
                                    <li class="breadcrumb-item"><a href="{{ url('coupon') }}">Admin List</a></li>

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
                                        data-target=".bs-example-modal-center">Add-Admin</button>
                                    <table id="datatable-buttons"
                                        class="table table-bordered table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Role Name</th>
                                                <th>Acesses</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($admin_role as $row)
                                                <tr>
                                                    <td>{{$i}}</td>
                                                    @if ($row->site_setting)
                                                    <td>Super-Admin</td>
                                                    @else
                                                    <td>Admin</td>
                                                    @endif
                                                    <td>
                                                        @if ($row->dashboard == 1)
                                                        <span class="badge badge-secondary">Dashboard</span>
                                                        @endif
                                                        @if ($row->product_section == 1)
                                                        <span class="badge badge-secondary">Product Section</span>
                                                        @endif
                                                        @if ($row->job_section == 1)
                                                        <span class="badge badge-secondary">Job Section</span>
                                                        @endif
                                                        @if ($row->order_section == 1)
                                                        <span class="badge badge-secondary">Order Section</span>
                                                        @endif
                                                        @if ($row->site_setting == 1)
                                                        <span class="badge badge-secondary">Site Setting</span>
                                                        @endif
                                                        @if ($row->contact_section == 1)
                                                        <span class="badge badge-secondary">Contact Section</span>
                                                        @endif
                                                        @if ($row->blog_section == 1)
                                                        <span class="badge badge-secondary">Blog Section</span>
                                                        @endif
                                                        @if ($row->stock_section == 1)
                                                        <span class="badge badge-secondary">Stock Section</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{url('delete_admin_role/'.$row->id)}}" class=""><i class="fas fa-trash-alt btn btn-danger"></i></a>
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
                                            <form class="" action="{{ url('save_admin_role_data') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" name="email" class="form-control" required
                                                        placeholder="Email" />
                                                </div>
                                                <div class="form-group">
                                                    <label>User Name</label>
                                                    <input type="text" name="user_name" class="form-control" required
                                                        placeholder="User Name"/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input type="password" name="password" class="form-control" required
                                                        placeholder="Password"/>
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input value="1" name="dashboard" type="checkbox" class="custom-control-input"
                                                                        id="customCheck1" data-parsley-multiple="groups"
                                                                        data-parsley-mincheck="2">
                                                                    <label class="custom-control-label"
                                                                        for="customCheck1">Dashboard-Page</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input value="1" name="product_section" type="checkbox" class="custom-control-input"
                                                                        id="customCheck2" data-parsley-multiple="groups"
                                                                        data-parsley-mincheck="2">
                                                                    <label class="custom-control-label"
                                                                        for="customCheck2">Product-Section</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input value="1" type="checkbox" class="custom-control-input"
                                                                        id="customCheck3" data-parsley-multiple="groups"
                                                                        data-parsley-mincheck="2" name="job_section">
                                                                    <label class="custom-control-label"
                                                                        for="customCheck3">Job-Section</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input value="1" type="checkbox" class="custom-control-input"
                                                                        id="customCheck4" data-parsley-multiple="groups"
                                                                        data-parsley-mincheck="2" name="order_section">
                                                                    <label class="custom-control-label"
                                                                        for="customCheck4">Order-Section</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input value="1" name="site_setting" type="checkbox" class="custom-control-input"
                                                                        id="customCheck5" data-parsley-multiple="groups"
                                                                        data-parsley-mincheck="3">
                                                                    <label class="custom-control-label"
                                                                        for="customCheck5">Site-Setting</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input value="1" type="checkbox" class="custom-control-input"
                                                                        id="customCheck6" data-parsley-multiple="groups"
                                                                        data-parsley-mincheck="3" name="contact_section">
                                                                    <label class="custom-control-label"
                                                                        for="customCheck6">Contact-Section</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input value="1" type="checkbox" class="custom-control-input"
                                                                        id="customCheck36" data-parsley-multiple="groups"
                                                                        data-parsley-mincheck="3" name="blog_section">
                                                                    <label class="custom-control-label"
                                                                        for="customCheck36">Blog Section</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input value="1" type="checkbox" class="custom-control-input"
                                                                        id="customCheck37" data-parsley-multiple="groups"
                                                                        data-parsley-mincheck="3" name="stock_section">
                                                                    <label class="custom-control-label"
                                                                        for="customCheck37">Stock Section</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div>
                                                        <button type="submit"
                                                            class="btn btn-primary waves-effect waves-light">
                                                            Submit
                                                        </button>
                                                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                                        Cancel
                                                    </button>
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
