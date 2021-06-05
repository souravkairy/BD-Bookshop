@php
    $division = DB::table('divisions')->get();
@endphp
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
					<div class="step first">
						<h3>1. Shipping address</h3>
					<ul class="nav nav-tabs" id="tab_checkout" role="tablist">
					  <li class="nav-item">
						<a class="nav-link active" id="home-tab" data-toggle="tab" href="#tab_1" role="tab" aria-controls="tab_1" aria-selected="true">Shipping Information</a>
					  </li>
					</ul>
                    <form action="{{'make_payment'}}" method="POST">
                        @csrf
					<div class="tab-content checkout">
						<div class="tab-pane fade show active" id="tab_1" role="tabpanel" aria-labelledby="tab_1">
                            <div class="form-group">
								<input type="text" class="form-control" placeholder="Name" name="shipping_name" required>
							</div>
							<div class="form-group">
								<input type="email" class="form-control" placeholder="Email" name="shipping_email" required>
							</div>

							<hr>

                            <div class="row no-gutters">
								<div class="col-6 form-group pr-1">
									<input type="text" class="form-control" placeholder="Mobile Number(1)" name="shipping_m_num" required>
								</div>
								<div class="col-6 form-group pl-1">
									<input type="text" class="form-control" placeholder="Mobile Number(2)" name="shipping_m_num2">
								</div>
							</div>
							<!-- /row -->
                            <div class="row no-gutters">
								<div class="col-md-12 form-group">
									<div class="custom-select-form">
										<select class="wide add_bottom_15" name="division" id="country" required>
                                            <option value="">Select Division</option>
                                            @foreach ($division as $row)
                                                <option value="{{$row->id}}">{{$row->bn_name}}</option>
                                            @endforeach
										</select>
									</div>
								</div>
							</div>
							<div class="row no-gutters">
								<div class="col-6 form-group pr-1">
                                    <select class="form-control" name="shipping_city"></select>

								</div>
								<div class="col-6 form-group pl-1">
									<input type="text" class="form-control" placeholder="Postal code" name="shipping_p_code" required>
								</div>
							</div>
                            <div class="form-group">
                                <textarea id="" cols="30" rows="3"class="form-control" required name="shipping_address" placeholder="Full Address"></textarea>
							</div>

						</div>
					</div>
					</div>
					<!-- /step -->
				</div>


				<div class="col-lg-6 col-md-6">
					<div class="step last">
						<h3>3. Order Summary</h3>
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
							<li class="clearfix"><em><strong>Tax/Vat</strong></em> <span>0</span></li>

						</ul>
						<div class="total clearfix">TOTAL <span>{{$sub_total}}</span></div>
						<div class="form-group">
								<label class="container_check">Register to the Newsletter.
								  <input type="checkbox" checked>
								  <span class="checkmark"></span>
								</label>
							</div>
                            <input type="hidden" name="sub_total" value="{{$sub_total}}">

                            <button type="submit" class="btn_1 full-width">Make Payment</button>
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
