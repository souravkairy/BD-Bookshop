@php
    $sub_cat = $product_details->sub_cat_id;
    $fetchSimilardata = DB::table('product')->where('sub_cat_id',$sub_cat)->limit(4)->get();
@endphp


@extends('FrontEnd.MasterLayout.master')
@section('topSellingProducts')

<main>
    <div class="container margin_30">
        {{-- <div class="countdown_inner">-20% This offer ends in <div data-countdown="2019/05/15" class="countdown"></div>
        </div> --}}
        <form action="{{url('addcart')}}" method="POST">
            @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="all">
                    <div class="slider">
                        <div class="owl-carousel owl-theme main">
                            <div style="background-image: url({{asset($product_details->image1)}});" class="item-box"></div>
                            {{-- <div style="background-image: url(img/products/shoes/2.jpg);" class="item-box"></div>
                            <div style="background-image: url(img/products/shoes/3.jpg);" class="item-box"></div>
                            <div style="background-image: url(img/products/shoes/4.jpg);" class="item-box"></div>
                            <div style="background-image: url(img/products/shoes/5.jpg);" class="item-box"></div>
                            <div style="background-image: url(img/products/shoes/6.jpg);" class="item-box"></div> --}}
                        </div>
                        <div class="left nonl"><i class="ti-angle-left"></i></div>
                        <div class="right"><i class="ti-angle-right"></i></div>
                    </div>
                    <div class="slider-two">
                        <div class="owl-carousel owl-theme thumbs">
                            <div style="background-image: url({{asset($product_details->image1)}});" class="item active"></div>
                            {{-- <div style="background-image: url(img/products/shoes/2.jpg);" class="item"></div>
                            <div style="background-image: url(img/products/shoes/3.jpg);" class="item"></div>
                            <div style="background-image: url(img/products/shoes/4.jpg);" class="item"></div>
                            <div style="background-image: url(img/products/shoes/5.jpg);" class="item"></div>
                            <div style="background-image: url(img/products/shoes/6.jpg);" class="item"></div> --}}
                        </div>
                        <div class="left-t nonl-t"></div>
                        <div class="right-t"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Product Details</a></li>

                    </ul>
                </div>
                <!-- /page_header -->

                <div class="prod_info">
                    <h1>{{$product_details->p_name}}</h1>
                    <span class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i><em>4 reviews</em></span>
                    <p><small>{{$product_details->p_id}}</small><br>{{$product_details->p_desc}}</p>
                    <div class="prod_options">
                        {{-- <div class="row">
                            <label class="col-xl-5 col-lg-5  col-md-6 col-6 pt-0"><strong>Color</strong></label>
                            <div class="col-xl-4 col-lg-5 col-md-6 col-6 colors">
                                <ul>
                                    <li><a href="#0" class="color color_1 active"></a></li>
                                    <li><a href="#0" class="color color_2"></a></li>
                                    <li><a href="#0" class="color color_3"></a></li>
                                    <li><a href="#0" class="color color_4"></a></li>
                                </ul>
                            </div>
                        </div> --}}

                        <div class="row">
                            <label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong>Stock</strong></label>
                            <div class="col-xl-4 col-lg-5 col-md-6 col-6">

                                 <h3 class="m-auto">Available({{$product_details->qty}})</h3>

                            </div>
                        </div>
                        {{-- <div class="row">
                            <label class="col-xl-5 col-lg-5 col-md-6 col-6"><strong>Size</strong> - Size Guide <a href="#0" data-toggle="modal" data-target="#size-modal"><i class="ti-help-alt"></i></a></label>
                            <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                <div class="custom-select-form">
                                    <select class="wide" name="size" required>
                                        <option value="S">Small (S)</option>
                                        <option value="M">M</option>
                                        <option value="L" selected>L</option>
                                        <option value="XL">XL</option>
                                    </select>
                                </div>
                            </div>
                        </div> --}}

                        <div class="row">
                            <label class="col-xl-5 col-lg-5  col-md-6 col-6"><strong>Quantity</strong></label>
                            <div class="col-xl-4 col-lg-5 col-md-6 col-6">
                                <div class="numbers-row">
                                    <input type="text" value="1"  id="quantity_1" class="qty2" name="qty" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="price_main">

                            @if ($product_details->discount == true)
                                @if ($product_details->discount_type == 1)
                                        <span class="new_price">৳ {{$product_details->s_price-((($product_details->s_price)*$product_details->discount)/100)}}</span>
                                        <span class="old_price">৳ {{$product_details->s_price}}</span>
                                @else
                                        <span class="new_price">৳ {{$product_details->s_price-$product_details->discount}}</span>
                                        <span class="old_price">৳ {{$product_details->s_price}}</span>
                                @endif
                            @else
                             <span class="new_price">৳ {{$product_details->s_price}}</span>
                            @endif
                            @if ($product_details->discount == true)
                                @if ($product_details->discount_type == 1)
                                         <span class="percentage">-{{$product_details->discount}} %</span>
                                @else
                                         <span class="percentage">-{{$product_details->discount}} ৳</span>
                                @endif
                            @else
                            @endif

                            <span class="old_price"></span></div>

                        </div>
                        <div class="col-lg-4 col-md-6">

                            <input type="hidden" name="p_id" value="{{$product_details->id}}">
                            <div class="btn_add_to_cart"><button type="submit" class="btn_1">Add to Cart</button></div>
                        </form>
                        </div>
                    </div>
                </div>
                <!-- /prod_info -->
                <div class="product_actions">
                    <ul>
                        <li>
                            <a href="#"><i class="ti-heart"></i><span>Add to Wishlist</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="ti-control-shuffle"></i><span>Add to Compare</span></a>
                        </li>
                    </ul>
                </div>
                <!-- /product_actions -->
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->

    <div class="tabs_product">
        <div class="container">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a id="tab-A" href="#pane-A" class="nav-link active" data-toggle="tab" role="tab">Summary</a>
                </li>
                <li class="nav-item">
                    <a id="tab-B" href="#pane-B" class="nav-link" data-toggle="tab" role="tab">Author</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /tabs_product -->
    <div class="tab_content_wrapper">
        <div class="container">
            <div class="tab-content" role="tablist">
                <div id="pane-A" class="card tab-pane fade active show" role="tabpanel" aria-labelledby="tab-A">
                    <div class="card-header" role="tab" id="heading-A">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapse-A" aria-expanded="false" aria-controls="collapse-A">
                                Summary
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-A" class="collapse" role="tabpanel" aria-labelledby="heading-A">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-lg-8">
                                    <h3>Details</h3>
                                    <p>{{$product_details->p_desc}}</p>
                                </div>
                                <div class="col-lg-4">
                                    {{-- <h3>Specifications</h3>
                                    <div class="table-responsive">
                                        <table class="table table-sm table-striped">
                                            <tbody>
                                                <tr>
                                                    <td><strong>Color</strong></td>
                                                    <td>Blue, Purple</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Size</strong></td>
                                                    <td>150x100x100</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Weight</strong></td>
                                                    <td>0.6kg</td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Manifacturer</strong></td>
                                                    <td>Manifacturer</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> --}}
                                    <!-- /table-responsive -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /TAB A -->
                <div id="pane-B" class="card tab-pane fade" role="tabpanel" aria-labelledby="tab-B">
                    <div class="card-header" role="tab" id="heading-B">
                        <h5 class="mb-0">
                            <a class="collapsed" data-toggle="collapse" href="#collapse-B" aria-expanded="false" aria-controls="collapse-B">
                                Author
                            </a>
                        </h5>
                    </div>
                    <div id="collapse-B" class="collapse" role="tabpanel" aria-labelledby="heading-B">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col-lg-3">
                                    <img style="width: 70%;" src="{{asset($product_details->image2)}}" alt="">
                                </div>
                                <div class="col-lg-9">
                                    <h3>Details</h3>
                                    <p>{{$product_details->color}}</p>
                                </div>

                            </div>

                            {{-- <p class="text-right"><a href="leave-review.html" class="btn_1">Leave a review</a></p> --}}
                        </div>
                        <!-- /card-body -->
                    </div>
                </div>
                <!-- /tab B -->
            </div>
            <!-- /tab-content -->
        </div>
        <!-- /container -->
    </div>
    <!-- /tab_content_wrapper -->

    <div class="container margin_60_35">
        <div class="main_title">
            <h2>Related</h2>
            <span>Products</span>
            <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
        </div>
        <div class="owl-carousel owl-theme products_carousel">
            @foreach ($fetchSimilardata as $row)
            <div class="item">
                <div class="grid_item">
                    @if ($row->discount == true)
                    @if ($row->discount_type == 1)
                        <span class="ribbon off">{{$row->discount}} %</span>
                    @else
                        <span class="ribbon off">{{$row->discount}} ৳</span>
                    @endif

                @elseif($row->hot == 1)
                <span class="ribbon hot">Hot</span>
                @elseif($row->new == 1)
                <span class="ribbon new">New</span>
                @endif
                    <figure>
                        <a href="{{url('product_details/'.$row->id .'/' .$row->p_name)}}">
                            <img class="owl-lazy" src="{{asset($row->image1)}}" data-src="{{asset($row->image1)}}" alt="">
                        </a>
                    </figure>
                    <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                    <a href="{{url('product_details/'.$row->id .'/' .$row->p_name)}}">
                        <h3>{{$row->p_name}}</h3>
                    </a>
                    <div class="price_box">
                        @if ($row->discount == true)
                        @if ($row->discount_type == 1)
                            <span class="new_price">৳ {{$row->s_price-((($row->s_price)*$row->discount)/100)}}</span>
                            <span class="old_price">৳ {{$row->s_price}}</span>
                        @else
                            <span class="new_price">৳ {{$row->s_price-$row->discount}}</span>
                            <span class="old_price">৳ {{$row->s_price}}</span>
                        @endif
                    @else
                     <span class="new_price">৳ {{$row->s_price}}</span>
                    @endif
                    </div>
                    <ul>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li>
                        <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li>
                        <li><a href="javascript:;" class="tooltip-1 addtocart" data-id="{{ $row->id }}" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a>
                        </li>
                    </ul>
                </div>
                <!-- /grid_item -->
            </div>
            @endforeach



        </div>
        <!-- /products_carousel -->
    </div>
    <!-- /container -->

    <div class="feat">
        <div class="container">
            <ul>
                <li>
                    <div class="box">
                        <i class="ti-gift"></i>
                        <div class="justify-content-center">
                            <h3>Free Shipping</h3>
                            <p>For all oders over $99</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="box">
                        <i class="ti-wallet"></i>
                        <div class="justify-content-center">
                            <h3>Secure Payment</h3>
                            <p>100% secure payment</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="box">
                        <i class="ti-headphone-alt"></i>
                        <div class="justify-content-center">
                            <h3>24/7 Support</h3>
                            <p>Online top support</p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!--/feat-->

</main>

@endsection
