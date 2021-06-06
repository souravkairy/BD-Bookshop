@php
    $productData = DB::table('product')
    ->where('topSelling',1)
    ->limit(8)
    ->get();
@endphp
@extends('FrontEnd.MasterLayout.master')
@section('topSellingProducts')

<div class="container margin_60_35">
    <div class="main_title">
        <h2>বেস্টসেলার বইসমূহ</h2>
        <span>Products</span>
        {{-- <p>Cum doctus civibus efficiantur in imperdiet deterruisset</p> --}}
    </div>
    <div class="row small-gutters">
        @foreach ($productData as $row)
        <div class="col-6 col-md-4 col-xl-3">
            <div class="grid_item">
                <figure>
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
                    <a href="{{url('product_details/'.$row->id .'/' .$row->p_name)}}">
                        <img class="img-fluid lazy" src="{{$row->image1}}" data-src="{{$row->image1}}" alt="">
                        <img class="img-fluid lazy" src="{{$row->image1}}" data-src="{{$row->image1}}" alt="">
                    </a>
                    {{-- <div data-countdown="2019/05/15" class="countdown"></div> --}}
                </figure>
                <div class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i></div>
                <a href="{{url('product_details/'.$row->id .'/' .$row->p_name)}}">
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
                    {{-- <span class="new_price">৳ {{$row->s_price}}</span>
                    <span class="old_price">৳ 5000</span> --}}
                </div>
                <ul>
                    {{-- <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to favorites"><i class="ti-heart"></i><span>Add to favorites</span></a></li> --}}
                    {{-- <li><a href="#0" class="tooltip-1" data-toggle="tooltip" data-placement="left" title="Add to compare"><i class="ti-control-shuffle"></i><span>Add to compare</span></a></li> --}}
                    {{-- <li><a href="javascript:;" class="tooltip-1 addtocart" data-id="{{$row->id}}" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a> --}}

                        <li><a href="{{url('product_details/'.$row->id .'/' .$row->p_name)}}" class="tooltip-1 addtocart" data-toggle="tooltip" data-placement="left" title="Add to cart"><i class="ti-shopping-cart"></i><span>Add to cart</span></a>
                    </li>
                </ul>
            </div>
            <!-- /grid_item -->
        </div>
        @endforeach
    </div>



    <!-- /row -->
</div>


@endsection
