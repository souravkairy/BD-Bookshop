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
                        <div class="col-8">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <table class="table table-bordered table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th style="width: 50%">#</th>
                                                <th style="width: 50%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Code</td>
                                                <td>{{ $data->p_id }}</td>
                                            </tr>
                                            <tr>
                                                <td>Name</td>
                                                <td>{{ $data->p_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>color</td>
                                                <td>{{ $data->color }}</td>
                                            </tr>
                                            <tr>
                                                <td>qty</td>
                                                <td>{{ $data->qty }}</td>
                                            </tr>
                                            <tr>
                                                <td>Unit</td>
                                                <td>@if ( $data->unit ==1)
                                                    Per Piece
                                                    @else
                                                    Per Kg
                                                @endif</td>
                                            </tr>
                                            <tr>
                                                <td>Buying Price</td>
                                                <td>{{ $data->c_price }}</td>
                                            </tr>
                                            <tr>
                                                <td>Selling Price</td>
                                                <td>{{ $data->s_price }}</td>
                                            </tr>
                                            <tr>
                                                <td>Discount Type</td>
                                                <td>@if ($data->discount_type == 1)
                                                    Percentage
                                                    @elseif($data->discount_type == 2)
                                                    Flat
                                                    @else
                                                    No Discount
                                                @endif</td>
                                            </tr>
                                            <tr>
                                                <td>Discount Amount</td>
                                                <td>@if ($data->discount_type ==1)
                                                    {{ $data->discount }}%
                                                    @else
                                                    {{ $data->discount }} Taka
                                                    @endif
                                               </td>
                                            </tr>
                                            <tr>
                                                <td>Final Price(IHD)</td>
                                                <td>
                                                    @if ($data->discount == true)
                                                        @if ($data->discount_type == 1)
                                                            <span class="new_price">৳
                                                                {{ $data->s_price - ($data->s_price * $data->discount) / 100 }}</span>

                                                        @else
                                                            <span class="new_price">৳
                                                                {{ $data->s_price - $data->discount }}</span>
                                                            <span class="old_price">৳
                                                                {{ $data->s_price }}</span>
                                                        @endif
                                                    @else

                                                    @endif








                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-4">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <table id="datatable-buttons"
                                        class="table table-bordered table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <tbody>

                                            <tr>
                                                <td>
                                                    <a href="{{ url('stockDetails/' . $data->id) }}" class=""><i
                                                            class="fas fa-eye btn btn-primary"></i></a>
                                                    <a href="" class=""><i
                                                            class="fab fa-nintendo-switch btn btn-success"></i></a>
                                                    <a href="" class=""><i class="fas fa-user-edit btn btn-warning"></i></a>
                                                    <a href="" class=""><i class="fas fa-trash-alt btn btn-danger"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <span class="badge badge-success">Active</span>
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div> <!-- end row -->
                </div>

            </div>

        </div><!-- /.modal -->

        <footer class="footer">
            © 2019 - 2020 Stexo <span class="d-none d-sm-inline-block"> - Crafted with <i
                    class="mdi mdi-heart text-danger"></i> by Themesdesign</span>.
        </footer>

    </div>
    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->

    </div>
@endsection
