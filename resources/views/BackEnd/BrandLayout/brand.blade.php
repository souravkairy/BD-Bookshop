@php
    $fetchBrandData = DB::table('brand')->get();
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
                            <h4 class="page-title">Jobs Table</h4>
                        </div>
                        <div class="col-sm-6">

                        </div>
                    </div> <!-- end row -->
                </div>
                <!-- end page-title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <button type="button" class="btn btn-light waves-effect mb-3" data-toggle="modal"
                                data-target=".bs-example-modal-lg">Add Job News</button>
                                <table id="datatable-buttons" class="table table-bordered table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Images</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($fetchBrandData as $row) {
                                             ?>
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td><img style="width: 10%;" src="{{$row->brand_image}}" alt=""></td>
                                        <td>{{$row->brand_name}}</td>
                                        <td>{{$row->brand_desc}}</td>
                                        <td>
                                            <span class="badge badge-success">Active</span>
                                        </td>
                                        <td>
                                            <a href="" class=""><i class="fab fa-nintendo-switch btn btn-success"></i></a>
                                            <a href="" class=""><i class="fas fa-user-edit btn btn-warning"></i></a>
                                            <a href="{{url('delete-brand/'.$row->id)}}" class=""><i class="fas fa-trash-alt btn btn-danger"></i></a>
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





        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Add Job News</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card m-b-30">
                        <div class="card-body">
                            {{-- <h4 class="mt-0 header-title">Add Category</h4>
                            <p class="sub-title">Please Provide a Unique Category Name</p> --}}
                            <form class="" action="{{url('save_brand')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label>Heading</label>
                                    <input type="text" class="form-control" name="brand_name" required placeholder="Name"/>
                                </div>
                                <div class="form-group">
                                    <label>News Image</label>
                                    <input type="file" class="form-control" name="brand_image" required/>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <div>
                                        <textarea required class="form-control summernote" name="brand_desc" rows="5"></textarea>
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
                        </form>

                    </div>
                </div>



            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
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
