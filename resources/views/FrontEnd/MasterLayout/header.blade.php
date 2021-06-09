@php
    $cat = DB::table('category')->get();
    $cart_details = Cart::content();
    $product = DB::table('product')->get();
    $site_setting = DB::table('site_setting_tabel')->first();

@endphp
@extends('FrontEnd.MasterLayout.master')
@section('header')
<!DOCTYPE html>
<html lang="en">
<head>
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    {!! JsonLd::generate() !!}
    <title>BD Book Shop</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{asset('public/frontEnd/img/ddd.png')}}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{asset('public/frontEnd/img/apple-touch-icon-57x57-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{asset('public/frontEnd/img/apple-touch-icon-72x72-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{asset('public/frontEnd/img/apple-touch-icon-114x114-precomposed.png')}}">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{asset('public/frontEnd/img/apple-touch-icon-144x144-precomposed.png')}}">

    <!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    {{-- <link href="{{asset('public/frontEnd/css/bootstrap.custom.min.css')}}" rel="stylesheet"> --}}
    <link href="{{asset('public/frontEnd/css/style.css')}}" rel="stylesheet">

	<!-- SPECIFIC CSS -->
    <link href="{{asset('public/frontEnd/css/home_1.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontEnd/css/listing.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontEnd/css/contact.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontEnd/css/faq.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontEnd/css/about.css')}}" rel="stylesheet">
   <link href="{{asset('public/frontEnd/css/product_page.css')}}" rel="stylesheet">
   <link href="{{asset('public/frontEnd/css/cart.css')}}" rel="stylesheet">
   <link href="{{asset('public/frontEnd/css/checkout.css')}}" rel="stylesheet">
   <link href="{{asset('public/frontEnd/css/account.css')}}" rel="stylesheet">
    <!-- YOUR CUSTOM CSS -->
    <link href="{{asset('public/frontEnd/css/custom.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" integrity="sha512-HWlJyU4ut5HkEj0QsK/IxBCY55n5ZpskyjVlAoV9Z7XQwwkqXoYdCIC93/htL3Gu5H3R4an/S0h2NXfbZk3g7w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>

	<div id="page">
	<header class="version_1">
		<div class="layer"></div>
		<div class="main_header">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-3 col-lg-3 d-lg-flex align-items-center">
						<div id="logo">
							<a href="{{url('/')}}"><img src="{{asset('public/frontEnd/img/logo.png')}}" alt=""></a>
						</div>
					</div>
					<nav class="col-xl-7 col-lg-7">
						<a class="open_close" href="javascript:void(0);">
							<div class="hamburger hamburger--spin">
								<div class="hamburger-box">
									<div class="hamburger-inner"></div>
								</div>
							</div>
						</a>
						<!-- Mobile menu button -->
						<div class="main-menu">
							<div id="header_menu">
								<a href="index.html"><img src="{{asset('public/frontEnd/img/logo.png')}}" alt=""></a>
								<a href="#" class="open_close" id="close_in"><i class="ti-close"></i></a>
							</div>
							<ul>
								{{-- <li>
									<a href="{{url('/')}}" class="show-submenu">Home</a>

								</li> --}}
								<li class="megamenu submenu">
									<a href="javascript:void(0);" class="show-submenu-mega">লেখক</a>
									<div class="menu-wrapper">
										<div class="row small-gutters">
                                            @foreach ($product as $row)
                                            <div class="col-lg-2">
												<ul>
                                                    <li><a href="{{url('search/'.$row->size)}}">{{$row->size}}</a></li>
                                                    {{-- <li>{{$row->size}}</li> --}}
												</ul>
											</div>
                                            @endforeach
										</div>
                                   @if ($product->count() > 42)
                                   <a class="text-right" href="{{url('all_author')}}">See More...</a>
                                   @else
                                   @endif
									</div>
									<!-- /menu-wrapper -->
								</li>
                                <li class="megamenu submenu">
									<a href="javascript:void(0);" class="show-submenu-mega">প্রকাশনী</a>
									<div class="menu-wrapper">
										<div class="row small-gutters">
                                            @foreach ($product as $row)
                                            <div class="col-lg-2">
												<ul>
                                                    <li><a href="{{url('search/'.$row->unit)}}">{{$row->unit}}</a></li>

												</ul>
											</div>
                                            @endforeach
										</div>
                                        @if ($product->count() > 42)
                                        <a class="text-right" href="{{url('all_publishers')}}">See More...</a>
                                        @else
                                        @endif
										<!-- /row -->
									</div>
									<!-- /menu-wrapper -->
								</li>
                                <li class="megamenu submenu">
									<a href="javascript:void(0);" class="show-submenu-mega">বিষয়</a>
									<div class="menu-wrapper">
										<div class="row small-gutters">
                                            @foreach ($product as $row)
                                            <div class="col-lg-2">
												<ul>
                                                    <li><a href="{{url('search/'.$row->subject)}}">{{$row->subject}}</a></li>
												</ul>
											</div>
                                            @endforeach
										</div>
                                        @if ($product->count() > 42)
                                        <a class="text-right" href="{{url('all_subjects')}}">See More...</a>
                                        @else
                                        @endif
										<!-- /row -->
									</div>
									<!-- /menu-wrapper -->
								</li>

                                <li class="megamenu submenu">
									<a href="javascript:void(0);" class="show-submenu-mega">Exam Central</a>
									<div class="menu-wrapper">
										<div class="row small-gutters">
                                            @foreach ($cat as $row)
                                            <div class="col-lg-2">
												<h3>{{$row->category_name}}</h3>
												<ul>

                                                    @php
                                                        $sub_cat = DB::table('sub_category')->where('category_id',$row->id)->limit('6')->get();
                                                    @endphp
                                                    @foreach ($sub_cat as $item)
                                                    <li><a href="{{url('products/'.$item->id. '/' .$item->sub_category_name)}}">{{$item->sub_category_name}}</a></li>
                                                    @endforeach

												</ul>
                                                @if ( $sub_cat->count() == 6)
                                                <a href="">See More..</a>
                                                @else
                                                @endif

											</div>
                                            @endforeach

{{--
											<div class="col-lg-2 d-xl-block d-lg-block d-md-none d-sm-none d-none f-right">
												<div class="banner_menu">
													<a href="#0">
														<img src="{{asset('public/frontEnd/img/banner_menu.jpg')}}" width="400" height="550" alt="" class="img-fluid lazy">
													</a>
												</div>
											</div> --}}
										</div>
										<!-- /row -->
									</div>
									<!-- /menu-wrapper -->
								</li>
								{{-- <li>
									<a href="{{url('/All-Brands')}}" class="show-submenu">Brands</a>
								 <ul>
										<li><a href="header-2.html">Aarong</a></li>
										<li><a href="header-3.html">Rong</a></li>
										<li><a href="header-4.html">Rich-Man</a></li>
										<li><a href="header-5.html">Cats-Eye</a></li>
										<li><a href="404.html">Bay</a></li>
										<li><a href="sign-in-modal.html">Anjans</a></li>
										<li><a href="contacts.html">Bell</a></li>
										<li><a href="about.html">Artisan</a></li>
										<li><a href="about-2.html">Bata</a></li>
									</ul>
								</li> --}}
                                <li><a href="{{url('/All-Brands')}}">Jobs</a></li>
								{{-- <li><a href="{{url('/About')}}">About Us</a></li>
								<li><a href="{{url('/Contact')}}">Contact Us</a></li> --}}

							</ul>
						</div>
						<!--/main-menu -->
					</nav>
					<div class="col-xl-2 col-lg-2 d-lg-flex align-items-center justify-content-end text-right">
						<a class="phone_top" href="tel://9438843343"><strong><span>Need Help?</span>{!!$site_setting->contact_number!!}</strong></a>
					</div>
				</div>
				<!-- /row -->
			</div>
		</div>
		<!-- /main_header -->

		<div class="main_nav Sticky">
			<div class="container">
				<div class="row small-gutters">
					<div class="col-xl-3 col-lg-3 col-md-3">
						<nav class="categories">
							<ul class="clearfix">
								<li><span>
										<a href="#">
											<span class="hamburger hamburger--spin">
												<span class="hamburger-box">
													<span class="hamburger-inner"></span>
												</span>
											</span>
											Categories
										</a>
									</span>
									<div id="menu">
                                        <ul>

                                        @foreach ($cat as $item)

											<li><span><a href="#0">{{$item->category_name}}</a></span>
                                            @php
                                                $sub_cat = DB::table('sub_category')->where('category_id',$item->id)->get();
                                            @endphp
                                            <ul>
                                            @foreach ($sub_cat as $item)
                                                <li><a href="{{url('products/'.$item->id. '/' .$item->sub_category_name)}}">{{$item->sub_category_name}}</a></li>
                                            @endforeach
                                            </ul>
											</li>
                                        @endforeach
                                    </ul>
									</div>
								</li>
							</ul>
						</nav>
					</div>
					<div class="col-xl-6 col-lg-7 col-md-6 d-none d-md-block">
						<div class="custom-search-input">
                            <form action="{{url('search-data-all')}}" method="POST">
                                @csrf
                                <input type="text" placeholder="Search over 10.000 products" name="search" class="typesearch">
                                <button type="submit"><i class="header-icon_search_custom"></i></button>
                            </form>
						</div>
					</div>
					<div class="col-xl-3 col-lg-2 col-md-3">
						<ul class="top_tools">
							<li>
								<div class="dropdown dropdown-cart">
									<a href="cart.html" class="cart_bt">

                                     <strong id="totalItemss">{{Cart::count()}}</strong>
                                    </a>
									<div class="dropdown-menu">
										<ul>
                                            @foreach ($cart_details as $row)
                                            <li>
												<a href="product-detail-1.html">
													<figure><img src="{{$row->options->image}}" data-src="{{$row->options->image}}" alt="" width="50" height="50" class="lazy"></figure>
													<strong><span>{{$row->name}}</span>{{$row->price}}</strong>
												</a>
												<a href="{{url('delete_product/'.$row->rowId)}}" class="action"><i class="ti-trash"></i></a>
											</li>
                                            @endforeach


										</ul>
										<div class="total_drop">
											<div class="clearfix"><strong>Sub-Total</strong><span>{{Cart::subtotal()}}</span></div>
											<a href="{{'cartPage'}}" class="btn_1 outline">View Cart</a>
                                            @if (Session::get('id'))
                                            <a href="{{'pToC'}}" class="btn_1">Checkout</a>
                                            @else
                                            <a href="{{'sign-in'}}" class="btn_1">Checkout</a>
                                            @endif

										</div>
									</div>
								</div>
								<!-- /dropdown-cart-->
							</li>
							<li>
								{{-- <a href="#0" class="wishlist"><span>Wishlist</span></a> --}}
							</li>
							<li>
								<div class="dropdown dropdown-access">
									<a href="account.html" class="access_link"><span>fhfhfhfgh</span></a>
									<div class="dropdown-menu">
                                        @if (Session::get('id'))
                                        <a href="{{url('log-out')}}" class="btn_1">Logout</a>
                                        @else
                                        <a href="{{url('sign-in')}}" class="btn_1">Sign In or Sign Up</a>
                                        @endif
                                        @php
                                            $ck = DB::table('order')->where('c_id',Session::get('id'))->count();
                                        @endphp

                                        @if (Session::get('id'))
                                        <ul>

                                        @if ($ck == true)
                                            <li>
                                                <a href="#sign-in-dialog" id="sign-in"><i class="ti-truck"></i>Track your Order</a>
                                            </li>
                                            <li>
                                                <a href="{{url('myProfile/'.Session::get('id'))}}"><i class="ti-package"></i>My Orders</a>
                                            </li>
                                            @else

                                            @endif

											{{-- <li>
												<a href="{{url('myProfile/'.Session::get('id'))}}"><i class="ti-user"></i>My Profile</a>
											</li> --}}

                                            <li>
												<a href="#"><i class="ti-help-alt"></i>{{ Session::get('name')}}</a>
											</li>
										</ul>
                                        @else

                                        @endif

									</div>
								</div>
								<!-- /dropdown-access-->
							</li>
							<li>
								<a href="javascript:void(0);" class="btn_search_mob"><span>Search</span></a>
							</li>
							<li>
								<a href="#menu" class="btn_cat_mob">
									<div class="hamburger hamburger--spin" id="hamburger">
										<div class="hamburger-box">
											<div class="hamburger-inner"></div>
										</div>
									</div>
									Categories
								</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<div class="search_mob_wp">
				<input type="text" class="form-control" placeholder="Search over 10.000 products">
				<input type="submit" class="btn_1 full-width" value="Search">
			</div>
			<!-- /search_mobile -->
		</div>

	</header>
    <div id="sign-in-dialog" class="zoom-anim-dialog mfp-hide">
		<div class="modal_header">
			<h3>Tarck Your Order</h3>
		</div>
		<form action="{{url('track_order')}}" method="POST">
            @csrf
			<div class="sign-in-wrapper">
				<div class="form-group">
					<label>Enter Your Tracking Code</label>
					<input type="text" class="form-control" name="t_code">
					<i class="ti-map"></i>
				</div>
				<div class="text-center">
					<input type="submit" value="Track" class="btn_1 full-width">
				</div>
			</div>
		</form>
		<!--form -->
	</div>


@endsection
