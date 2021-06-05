@php
    $category = DB::table('category')->get();
    $brand = DB::table('brand')->get();

    $productData = DB::table('product')
                        ->join('category','product.category_id','category.id')
                        ->join('sub_category','product.sub_cat_id','sub_category.id')
                        // ->join('brand','product.brand_id','brand.id')
                        ->select('product.*','category.category_name','sub_category.sub_category_name')
                        ->get();

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
                                <h4 class="page-title">Products Table</h4>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-right">
                                    <li class="breadcrumb-item"><a href="{{ url('Admin-Dashboard') }}">Allaia</a></li>
                                    <li class="breadcrumb-item"><a href="{{ url('all_products') }}">Products</a></li>
                                </ol>
                            </div>
                        </div> <!-- end row -->
                    </div>
                    <!-- end page-title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-30">
                                <div class="card-body">

                                    <table id="datatable-buttons"
                                        class="table table-bordered table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th style="width: 7%">Name</th>
                                                <th>Category</th>
                                                {{-- <th>Brand</th> --}}
                                                <th>Price</th>
                                                <th>Stock</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($productData as $row)
                                            <tr>
                                                <td>{{$row->p_id}}</td>
                                                <td>{{$row->p_name}}</td>
                                                <td>{{$row->category_name}}</td>
                                                {{-- <td>{{$row->brand_name}}</td> --}}
                                                <td>{{$row->s_price}}</td>
                                                <td>{{$row->qty}} P</td>
                                                <td>
                                                    <span class="badge badge-success">Active</span>
                                                </td>
                                                <td>
                                                    <a href="{{url('stockDetails/'.$row->id)}}" class=""><i class="fas fa-eye btn btn-primary"></i></a>
                                                    {{-- <a href="" class=""><i class="fab fa-nintendo-switch btn btn-success"></i></a> --}}
                                                    {{-- <a href="" class=""><i class="fas fa-user-edit btn btn-warning"></i></a>
                                                    <a href="" class=""><i class="fas fa-trash-alt btn btn-danger"></i></a> --}}
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

        </div><!-- /.modal -->

        <footer class="footer">
            © 2019 - 2020 Stexo <span class="d-none d-sm-inline-block"> - Crafted with <i
                    class="mdi mdi-heart text-danger"></i> by Themesdesign</span>.
        </footer>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>


<script type="text/javascript">
	  $(document).ready(function() {
         $('select[name="category_id"]').on('change', function(){
             var category_id = $(this).val();
             if(category_id) {
                 $.ajax({
                     url: "{{  url('get_sub_cat') }}/"+category_id,
                     type:"GET",
                     dataType:"json",
                     success:function(data) {
                        var d =$('select[name="sub_category_id"]').empty();
                           $.each(data, function(key, value){
                               $('select[name="sub_category_id"]').append('<option value="'+ value.id +'">' + value.sub_category_name + '</option>');
                           });

                     },

                 });
             } else {
                 alert('danger');
             }

         });
     });
</script>

    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

    </div>
@endsection
