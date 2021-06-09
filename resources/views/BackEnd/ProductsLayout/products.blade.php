@php
    $category = DB::table('category')->get();
    // $brand = DB::table('brand')->get();

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
                                    <li class="breadcrumb-item"><a href="{{ url('Admin-Dashboard') }}">BDBOOKSHOP</a></li>
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
                                    <button type="button" class="btn btn-light waves-effect mb-3" data-toggle="modal"
                                        data-target=".bs-example-modal-lg">Add Products</button>
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
                                                    <a href="" class=""><i class="fab fa-nintendo-switch btn btn-success"></i></a>
                                                    <a href="" class=""><i class="fas fa-user-edit btn btn-warning"></i></a>
                                                    <a href="{{url('delete_products/'.$row->id)}}" class=""><i class="fas fa-trash-alt btn btn-danger"></i></a>
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
            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="myLargeModalLabel">Add Products</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <form class="" action="{{url('save_product_data')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Product Name</label>
                                                    <input name="p_name" type="text" class="form-control" required placeholder="Enter Product Name" required/>
                                                </div>
                                                <div class="form-group">
                                                    <label>Category</label>
                                                    <div>
                                                        <select id="" class="form-control" name="category_id" required>
                                                            <option label="Select Category"></option>
                                                            @foreach($category as $row)
                                                            <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Quantity</label>
                                                    <div>
                                                        <input name="qty" type="text" class="form-control" required placeholder="Quantity" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Cost Price</label>
                                                    <div>
                                                        <input name="c_price" type="text" class="form-control" required placeholder="Cost Price" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Discount Type</label>
                                                    <div>
                                                     <select name="discount_type" id="" class="form-control">
                                                         <option label="Type Of Discount"></option>
                                                         <option value="">No Discount</option>
                                                         <option value="1">% Discount</option>
                                                         <option value="2">Flat Discount</option>
                                                     </select>

                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Product Image</label>
                                                    <div>
                                                        <input type="file" name="image1" class="form-control" required>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Author</label>
                                                    <div>
                                                        <input name="size" type="text" class="form-control" required placeholder="Author" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Author Image</label>
                                                    <div>
                                                        <input type="file" name="image2" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Author Description</label>
                                                    <div>
                                                        <textarea name="color" required class="form-control" rows="4" placeholder="Textarea"></textarea>
                                                    </div>
                                                </div>



                                            </div>
                                            <div class="col-lg-6">
                                                {{-- <div class="form-group">
                                                    <label>Brand Name</label>
                                                    <div>
                                                        <select name="brand_id" class="form-control" required>
                                                            <option label="Select Brand"></option>
                                                            @foreach ($brand as $row)
                                                                <option value="{{$row->id}}">{{$row->brand_name}}</option>
                                                            @endforeach
                                                        </select>


                                                    </div>
                                                </div> --}}
                                                <div class="form-group">
                                                    <label>Sub-Catedgory</label>
                                                    <div>
                                                        <select class="form-control" name="sub_category_id">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>প্রকাশনী</label>
                                                    <div>
                                                        <input type="text" name="unit" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>বিষয় </label>
                                                    <div>
                                                        <input type="text" name="subject" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Selling Price</label>
                                                    <div>
                                                        <input name="s_price" type="text" class="form-control" required placeholder="Selling Price" required/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Discount Amount</label>
                                                    <div>
                                                        <input name="discount" type="text" class="form-control" placeholder="Amount-Percentage/Flat" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label>Textarea</label>
                                                    <div>
                                                        <textarea name="p_desc" required class="form-control" rows="6" placeholder="Textarea"></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Min check</label>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input value="1" name="topSelling" type="checkbox" class="custom-control-input"
                                                                        id="customCheck1" data-parsley-multiple="groups"
                                                                        data-parsley-mincheck="2">
                                                                    <label class="custom-control-label"
                                                                        for="customCheck1">Top Selling</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input value="1" name="hot" type="checkbox" class="custom-control-input"
                                                                        id="customCheck2" data-parsley-multiple="groups"
                                                                        data-parsley-mincheck="2">
                                                                    <label class="custom-control-label"
                                                                        for="customCheck2">সেরা বই</label>
                                                                </div>
                                                                {{-- <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        id="customCheck3" data-parsley-multiple="groups"
                                                                        data-parsley-mincheck="2">
                                                                    <label class="custom-control-label"
                                                                        for="customCheck3">This too</label>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input value="1" name="new" type="checkbox" class="custom-control-input"
                                                                        id="customCheck4" data-parsley-multiple="groups"
                                                                        data-parsley-mincheck="3">
                                                                    <label class="custom-control-label"
                                                                        for="customCheck4">নতুন প্রকাশিত</label>
                                                                </div>
                                                                {{-- <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        id="customCheck5" data-parsley-multiple="groups"
                                                                        data-parsley-mincheck="3">
                                                                    <label class="custom-control-label"
                                                                        for="customCheck5">New</label>
                                                                </div> --}}
                                                                {{-- <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox" class="custom-control-input"
                                                                        id="customCheck36" data-parsley-multiple="groups"
                                                                        data-parsley-mincheck="3">
                                                                    <label class="custom-control-label"
                                                                        for="customCheck36">This too</label>
                                                                </div> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group float-end">
                                                    <div>
                                                        <button type="submit" class="btn btn-light waves-effect btn-block">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                </div>
                                </form>

                            </div>
                        </div>



                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
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
