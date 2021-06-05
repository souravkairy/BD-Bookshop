@php
    $division = DB::table('divisions')->get();
    $sub_total =str_replace( ',', '', Cart::subtotal() );
@endphp

@if (Session::get('division') == 6 && Session::get('shipping_city') == 47)
@php
    $charge = 50
@endphp
@else
@php
    $charge = 100
@endphp
@endif
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
		<h1>Sign In or Create an Account</h1>

	</div>
	<!-- /page_header -->
			<div class="row">

                <div class="col-lg-6 col-md-6">
                    <div class="step middle payments">
                        <form action="{{'confirm_order'}}" method="POST">
                            @csrf
                        <h3>1. Payment and Shipping</h3>
                            <ul>
                                @if ($charge == 50)
                                <li>
                                    <label class="container_radio">Cash on delivery<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
                                        <input type="radio" value="cash on delivery" name="p_type" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                @else
                                <li>
                                    <label class="container_radio">Bkash<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
                                        <input type="checkbox"  value="bkash" name="p_type" selected>
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                                <h5>Bkash Personal : XXXXX - XXXXXX</h5>
                                <div class="payment_info d-none d-sm-block"><figure><img src="img/cards_all.svg" alt=""></figure>
                                    <p>এই নাম্বারে টাকা পাঠিয়ে নিচে TXN ID বসান</p></div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="BKASH TXN ID" name="txnID" required>
                                </div>

                            </ul>
                            <div class="payment_info d-none d-sm-block"><figure><img src="img/cards_all.svg" alt=""></figure>	<p>আপনি কোন কুরিয়ারের মাধ্যমে ডেলিভেরী নিতে চাচ্ছেন?</p></div>
                            <h6 class="pb-2">Shipping Method</h6>

                        <ul>
                            <li>
                                <label class="container_radio">S.A Paribohon - 100 Taka<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
                                    <input type="radio" name="shipping_method" value="S.A Paribohon" >
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_radio">Sundarban Curier Service - 100Taka<a href="#0" class="info" data-toggle="modal" data-target="#payments_method"></a>
                                    <input type="radio" name="shipping_method" value="Sundarban Curier Service">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                                @endif
                        </ul>
                    </div>

                    <!-- /step -->

                </div>

				<div class="col-lg-6 col-md-6">
					<div class="step last">
						<h3>2. Order Summary</h3>
					<div class="box_general summary">
                        @php
                            $p_data = Cart::content();
                        @endphp
						<ul>
                            @foreach ($p_data as $row)
                                <li class="clearfix"><em>{{$row->qty}}x {{$row->name}}</em>  <span>{{$row->qty * $row->price}}</span></li>
                            @endforeach

						</ul>
						<ul>
							<li class="clearfix"><em><strong>Subtotal</strong></em>  <span>{{Cart::subtotal()}}</span></li>
							<li class="clearfix"><em><strong>Shipping</strong></em> <span>
                         {{$charge}}
                            </span></li>
						</ul>
						<div class="total clearfix">TOTAL <span>{{$sub_total + $charge}}</span></div>
						<div class="form-group">
								<label class="container_check">Register to the Newsletter.
								  <input type="checkbox" checked>
								  <span class="checkmark"></span>
								</label>
							</div>
                            <input type="hidden" name="sub_total" value="{{$sub_total + $charge}}">
                            <input type="hidden" name="shipping_name" value="{{Session::get('shipping_name')}}">
                            <input type="hidden" name="shipping_email" value="{{Session::get('shipping_email')}}">
                            <input type="hidden" name="shipping_m_num" value="{{Session::get('shipping_m_num')}}">
                            <input type="hidden" name="shipping_m_num2" value="{{Session::get('shipping_m_num2')}}">
                            <input type="hidden" name="division" value="{{Session::get('division')}}">
                            <input type="hidden" name="shipping_city" value="{{Session::get('shipping_city')}}">
                            <input type="hidden" name="shipping_p_code" value="{{Session::get('shipping_p_code')}}">
                            <input type="hidden" name="shipping_address" value="{{Session::get('shipping_address')}}">
                            <input type="hidden" name="shipping_charge" value="{{$charge}}">


                            <button type="submit" class="btn_1 full-width">Confirm Order</button>
						{{-- <a href="confirm.html" class="btn_1 full-width">Confirm Oreder</a> --}}
					</div>
					<!-- /box_general -->
					</div>
					<!-- /step -->
				</div>
            </form>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
        </script>

        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>


        <script type="text/javascript">
              $(document).ready(function() {
                 $('select[name="division"]').on('change', function(){
                     var category_id = $(this).val();
                     if(category_id) {
                         $.ajax({
                             url: "{{  url('get_division') }}/"+category_id,
                             type:"GET",
                             dataType:"json",
                             success:function(data) {
                                var d =$('select[name="shipping_city"]').empty();
                                   $.each(data, function(key, value){
                                       $('select[name="shipping_city"]').append('<option value="'+ value.id +'">' + value.bn_name + '</option>');
                                   });

                             },

                         });
                     } else {
                         alert('danger');
                     }

                 });
             });
        </script>










	</main>
@endsection
