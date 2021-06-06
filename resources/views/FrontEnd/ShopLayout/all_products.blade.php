@extends('FrontEnd.MasterLayout.master')
@section('topSellingProducts')
<main>
<div class="container margin_30">
    <div class="row">
        {{-- <aside class="col-lg-3" id="sidebar_fixed">
            <div class="filter_col">
                <div class="inner_bt"><a href="#" class="open_filters"><i class="ti-close"></i></a></div>
                <div class="filter_type version_2">
                    <h4><a href="#filter_1" data-toggle="collapse" class="opened">Categories</a></h4>
                    <div class="collapse show" id="filter_1">
                        <ul>
                            <li>
                                <label class="container_check">Men <small>12</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">Women <small>24</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">Running <small>23</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">Training <small>11</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        </ul>
                    </div>
                    <!-- /filter_type -->
                </div>
                <!-- /filter_type -->
                <div class="filter_type version_2">
                    <h4><a href="#filter_2" data-toggle="collapse" class="opened">Color</a></h4>
                    <div class="collapse show" id="filter_2">
                        <ul>
                            <li>
                                <label class="container_check">Blue <small>06</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">Red <small>12</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">Orange <small>17</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">Black <small>43</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /filter_type -->
                <div class="filter_type version_2">
                    <h4><a href="#filter_3" data-toggle="collapse" class="closed">Brands</a></h4>
                    <div class="collapse" id="filter_3">
                        <ul>
                            <li>
                                <label class="container_check">Adidas <small>11</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">Nike <small>08</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">Vans <small>05</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">Puma <small>18</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /filter_type -->
                <div class="filter_type version_2">
                    <h4><a href="#filter_4" data-toggle="collapse" class="closed">Price</a></h4>
                    <div class="collapse" id="filter_4">
                        <ul>
                            <li>
                                <label class="container_check">$0 — $50<small>11</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">$50 — $100<small>08</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">$100 — $150<small>05</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="container_check">$150 — $200<small>18</small>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /filter_type -->
                <div class="buttons">
                    <a href="#0" class="btn_1">Filter</a> <a href="#0" class="btn_1 gray">Reset</a>
                </div>
            </div>
        </aside> --}}
        <!-- /col -->
        <div class="col-lg-12">
            <div class="top_banner">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.3)">
                    <div class="container pl-lg-5">
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="#">Home</a></li>
                                <li><a href="#">Category</a></li>
                                <li>Search Books</li>
                            </ul>
                        </div>
                        <h1>Book Shelf</h1>
                    </div>
                </div>
                <img src="{{asset('public/frontEnd/img/ss.jpg')}}" class="img-fluid" alt="">
            </div>
            <!-- /top_banner -->
            <div id="stick_here"></div>
            <div class="toolbox elemento_stick add_bottom_30">
                <div class="container">
                    {{-- <ul class="clearfix">
                        <li>
                            <div class="sort_select">
                                <select name="sort" id="sort">
                                    <option value="popularity" selected="selected">Sort by popularity</option>
                                    <option value="rating">Sort by average rating</option>
                                    <option value="date">Sort by newness</option>
                                    <option value="price">Sort by price: low to high</option>
                                    <option value="price-desc">Sort by price: high to
                                </select>
                            </div>
                        </li>
                        <li>
                            <a href="#0"><i class="ti-view-grid"></i></a>
                            <a href="listing-row-1-sidebar-left.html"><i class="ti-view-list"></i></a>
                        </li>
                        <li>
                            <a href="#0" class="open_filters">
                                <i class="ti-filter"></i><span>Filters</span>
                            </a>
                        </li>
                    </ul> --}}
                </div>
            </div>
            <!-- /toolbox -->
           <div class="row small-gutters">
               @forelse ($fetchdata as $row)
                <div class="col-6 col-md-3">
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
                            <a href="product-detail-1.html">
                                <img class="img-fluid lazy" src="{{asset($row->image1)}}" data-src="{{asset($row->image1)}}" alt="">
                            </a>

                        </figure>
                        <a href="product-detail-1.html">
                            <h3>{{$row->p_name}}</h3>
                        </a>
                        <div class="price_box">
                            @if ($row->discount == true)
                            @if ($row->discount_type == 1)
                                <span class="new_price">৳ {{$prc = $row->s_price-((($row->s_price)*$row->discount)/100)}}</span>
                                <span class="old_price">৳ {{$row->s_price}}</span>
                            @else
                                <span class="new_price">৳ {{$prc = $row->s_price-$row->discount}}</span>
                                <span class="old_price">৳ {{$row->s_price}}</span>
                            @endif
                        @else
                         <span class="new_price">৳ {{$prc = $row->s_price}}</span>
                        @endif
                        </div>
                        <ul>
                            {{-- <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li> --}}
                            {{-- <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li> --}}
                            <li><a href="{{url('product_details/'.$row->id .'/' .$row->p_name)}}" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a></li>
                        </ul>
                    </div>
                    <!-- /grid_item -->
                </div>

                @empty
                <h2>No Book Found.....</h2>
                @endforelse

            </div>
            <!-- /row -->
            <div class="d-flex justify-content-center text-center">
                {{$fetchdata->links("pagination::bootstrap-4") }}
            </div>
        </div>
        <!-- /col -->
    </div>
    <!-- /row -->
</div>
</main>

@endsection
