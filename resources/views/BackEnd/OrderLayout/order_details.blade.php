@php
    $customer = DB::table('customer')->where('id',$orderData->c_id)->first();
    $division = DB::table('divisions')->where('id',$shippingData->division)->first();
    $city = DB::table('districts')->where('id',$shippingData->shipping_city)->first();
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
                                 <h6 class="page-title">All Details</h6>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <h6 class="page-title">Order Details</h6>
                                    <table class="table table-bordered table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th style="width: 40%">#</th>
                                                <th style="width: 60%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Customer</td>
                                                <td>{{ $customer->name }}</td>
                                            </tr>
                                            {{-- <tr>
                                                <td>Quantity</td>
                                                <td>{{ $orderData->total }} P</td>
                                            </tr> --}}
                                            <tr>
                                                <td>Total Amount</td>
                                                <td>{{ $orderData->total }}</td>
                                            </tr>
                                            <tr>
                                                <td>Payment Method</td>
                                                <td>{{ $orderData->payment_method }}</td>
                                            </tr>
                                            <tr>
                                                <td>TXN Id</td>
                                                <td>{{ $orderData->txnID }}</td>
                                            </tr>
                                            <tr>
                                                <td>Shipping Method</td>
                                                <td>{{ $orderData->shipping_method }}</td>
                                            </tr>
                                            <tr>
                                                <td>Order Date</td>
                                                <td>{{ $orderData->date }}</td>
                                            </tr>
                                            <tr>
                                                <td>Order Tracking Code</td>
                                                <td>{{ $orderData->tracking_code }}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <div class="col-6">

                            <div class="card m-b-30">
                                <div class="card-body">
                                    <h6 class="page-title">Shipping Details</h6>
                                    <table class="table table-bordered table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th style="width: 30%">#</th>
                                                <th style="width: 70%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Name</td>
                                                <td>{{ $shippingData->shipping_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Division</td>
                                                <td>{{ $division->bn_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>City</td>
                                                <td>{{ $city->bn_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Address</td>
                                                <td>{{ $shippingData->shipping_address }}</td>
                                            </tr>
                                            <tr>
                                                <td>Post Code</td>
                                                <td>{{ $shippingData->shipping_p_code }}</td>
                                            </tr>
                                            <tr>
                                                <td>Email</td>
                                                <td>{{ $shippingData->shipping_email }}</td>
                                            </tr>
                                            <tr>
                                                <td>Mobile Number 1</td>
                                                <td>{{ $shippingData->shipping_m_num }}</td>
                                            </tr>
                                            <tr>
                                                <td>Mobile Number 2</td>
                                                <td>{{ $shippingData->shipping_m_num2 }}</td>
                                            </tr>


                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div> <!-- end col -->
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <h6 class="page-title">Order Details</h6>
                                    <table class="table table-bordered table-bordered dt-responsive nowrap"
                                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th style="width: 7%">product Id</th>
                                                <th style="width: 40%">Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orderDetails as $row)
                                            <tr>
                                                <td>{{$row->p_id}}</td>
                                                <td>{{$row->p_name}}</td>
                                                <td>{{$row->s_price}}</td>
                                                <td>{{$row->qty}} P</td>

                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    @if ($orderData->status == 0)
                                    <form action="{{url('accept_payment')}}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{$orderData->id}}" name="id">
                                    <button type="submit" class="btn btn-success btn-lg btn-block waves-effect waves-light">Accept Payment</button>
                                    </form>
                                    @elseif($orderData->status == 1)
                                    <form action="{{url('progress_order')}}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{$orderData->id}}" name="id">
                                    <button type="submit" class="btn btn-success btn-lg btn-block waves-effect waves-light">Progress Order</button>
                                    </form>
                                    @elseif($orderData->status == 2)

                                    <form action="{{url('done_delivery')}}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{$orderData->id}}" name="id">
                                    <button type="submit" class="btn btn-success btn-lg btn-block waves-effect waves-light">Done Delivery</button>
                                    </form>
                                    @elseif($orderData->status == 3)

                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    @if ($orderData->status == 3 || $orderData->status == 4)

                                    @else
                                    <form action="{{url('order_cancel')}}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{$orderData->id}}" name="id">
                                    <button type="submit" class="btn btn-danger btn-lg btn-block waves-effect waves-light">Cancel Order</button>
                                </form>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
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
