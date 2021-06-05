
@extends('FrontEnd.MasterLayout.master')
@section('topSellingProducts')

<main class="bg_gray">

	<div class="container margin_30">
		<div class="page_header">
			<div class="breadcrumbs">
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Category</a></li>
					<li>Page active</li>
				</ul>
		</div>
		<h1>Customer Info</h1>
	</div>
	<!-- /page_header -->
			<div class="row justify-content-center">
			<div class="col-xl-3 col-lg-6 col-md-8">
				<div class="box_account">
					<div class="form_container">
						<div class="row no-gutters">
                            <img  style="width:70%" class="m-auto" src="{{asset('public/frontEnd/img/user2.svg')}}" alt="">
                            <h2 class="m-auto">{{$order->name}}</h2>
                            <h6 class="m-auto">{{$order->email}}</h6>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-9 col-lg-6 col-md-8">
				<div class="box_account">
                    <table class="table table-striped cart-list">
                        <thead>
                            <tr>
                                <th style="width: 40%">
                                    Product
                                </th>
                                <th style="width: 7%">
                                    Price
                                </th>
                                <th style="width: 7%">
                                    Quatity
                                </th>
                                <th >
                                    Subtotal
                                </th>
                                <th>
                                    Date
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    T-Code
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderDetails as $orderDetails)

                            <tr>
                                <td>
                                {{-- <div class="thumb_cart">
                                    <img src="img/products/product_placeholder_square_small.jpg" data-src="img/products/shoes/1.jpg" class="lazy" alt="Image">
                                </div> --}}
                                    <span class="item_cart">{{$orderDetails->product_name}}</span>
                                </td>
                                <td>
                                    <strong>{{$orderDetails->single_price}}</strong>
                                </td>
                                <td>
                                    <strong>{{$orderDetails->qty}}</strong>
                                </td>
                                <td>
                                    <strong>{{$orderDetails->total_price}}</strong>
                                </td>
                                <td>
                                    <strong>{{$order->date}}</strong>
                                </td>
                                <td>@if ($order->status == 1)
                                    <button class="btn_1">Order Accepted</button>
                                    @elseif($order->status == 2)
                                    <button class="btn_1">Delivery In Progress</button>
                                    @elseif($order->status == 3)
                                    <button class="btn_1">Delivery Done</button>
                                    @elseif($order->status == 4)
                                    <button class="btn_1">Cancel</button>
                                    @elseif($order->status ==0)
                                    <button class="btn_1">Pending</button>
                                    @endif
                                    {{-- <strong>{{$order->status}}</strong> --}}
                                </td>
                                <td>
                                    <strong>{{$order->tracking_code}}</strong>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
				</div>
				<!-- /box_account -->
			</div>
		</div>
		<!-- /row -->
		</div>
		<!-- /container -->
	</main>
@endsection
