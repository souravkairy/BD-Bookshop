@extends('FrontEnd.MasterLayout.master')
@section('partners')
<div class="bg_gray">
    <div class="container margin_30">
        <div id="brands" class="owl-carousel owl-theme">
            <div class="item">
                <a href="#0"><img src="{{ asset('public/frontEnd/img/brands/placeholder_brands.png') }}"
                        data-src="{{ asset('public/frontEnd/img/brands/logo_1.png') }}" alt="" class="owl-lazy"></a>
            </div><!-- /item -->
            <div class="item">
                <a href="#0"><img src="{{ asset('public/frontEnd/img/brands/placeholder_brands.png') }}"
                        data-src="{{ asset('public/frontEnd/img/brands/logo_2.png') }}" alt="" class="owl-lazy"></a>
            </div><!-- /item -->
            <div class="item">
                <a href="#0"><img src="{{ asset('public/frontEnd/img/brands/placeholder_brands.png') }}"
                        data-src="{{ asset('public/frontEnd/img/brands/logo_3.png') }}" alt="" class="owl-lazy"></a>
            </div><!-- /item -->
            <div class="item">
                <a href="#0"><img src="{{ asset('public/frontEnd/img/brands/placeholder_brands.png') }}"
                        data-src="{{ asset('public/frontEnd/img/brands/logo_4.png') }}" alt="" class="owl-lazy"></a>
            </div><!-- /item -->
            <div class="item">
                <a href="#0"><img src="{{ asset('public/frontEnd/img/brands/placeholder_brands.png') }}"
                        data-src="{{ asset('public/frontEnd/img/brands/logo_5.png') }}" alt="" class="owl-lazy"></a>
            </div><!-- /item -->
            <div class="item">
                <a href="#0"><img src="{{ asset('public/frontEnd/img/brands/placeholder_brands.png') }}"
                        data-src="{{ asset('public/frontEnd/img/brands/logo_6.png') }}" alt="" class="owl-lazy"></a>
            </div><!-- /item -->
        </div><!-- /carousel -->
    </div><!-- /container -->
</div>


@endsection
