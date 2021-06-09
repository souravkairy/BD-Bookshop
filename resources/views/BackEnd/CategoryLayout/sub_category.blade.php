@php
    $fetchCategory = DB::table('category')->get();
    $fetchSubcategory = DB::table('sub_category')
                            ->join('category','sub_category.category_id','category.id')
                            ->select('sub_category.*','category.category_name')
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
                            <h4 class="page-title">Sub Category Table</h4>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-right">
                                <li class="breadcrumb-item"><a href="{{url('Admin-Dashboard')}}">BDBOOKSHOP</a></li>
                                <li class="breadcrumb-item"><a href="{{url('category')}}">Sub-Category</a></li>

                            </ol>
                        </div>
                    </div> <!-- end row -->
                </div>
                <!-- end page-title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <button class="btn btn-light waves-effect mb-3" data-toggle="modal" data-target=".bs-example-modal-center">Add Sub-Categorry </button>
                                <table id="datatable-buttons" class="table table-bordered table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Category Name</th>
                                        <th>Sub-Category-Name</th>
                                        <th>Sub-desc</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($fetchSubcategory as $row) {
                                            ?>
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$row->category_name}}</td>
                                        <td>{{$row->sub_category_name}}</td>
                                        <td>{{$row->sub_category_desc}}</td>
                                        <td>
                                            <span class="badge badge-success">Active</span>
                                        </td>
                                        <td>
                                            <a href="" class=""><i class="fab fa-nintendo-switch btn btn-success"></i></a>
                                            <a href="" class=""><i class="fas fa-user-edit btn btn-warning"></i></a>
                                            <a href="{{url('dlt_sub_cat/'.$row->id)}}" class=""><i class="fas fa-trash-alt btn btn-danger"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++; } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div>
            <!-- container-fluid -->

        </div>
        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mt-0">Add Sub-Category</h5>
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
                                        <form class="" action="{{url('save_sub_cat_data')}}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>Sub Category Name</label>
                                                <input type="text" name="sub_category_name" class="form-control" required placeholder="Sub Category Name"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Category Name</label>
                                                <select class="form-control" required name="category_id" id="">
                                                    <option value="">Selcet Category</option>
                                                    <?php foreach ($fetchCategory as $row) {
                                                        ?>
                                                    <option value="{{$row->id}}">{{$row->category_name}}</option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <div>
                                                    <textarea name="sub_category_desc" required class="form-control" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
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

        <footer class="footer">
            © 2019 - 2020 Stexo <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign</span>.
        </footer>

    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

</div>
@endsection
