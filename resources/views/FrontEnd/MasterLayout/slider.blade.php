@php
    $slider_data = DB::table('slider')->get();
@endphp
@extends('FrontEnd.MasterLayout.master')
@section('slider')
<main>
<div id="carousel-home">
    <div class="owl-carousel owl-theme">
        @foreach ($slider_data as $row)
        <div class="owl-slide cover" style="background-image: url({{asset($row->slider_image)}});">
            <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(255, 255, 255, 0.5)">
                <div class="container">
                    <div class="row justify-content-center justify-content-md-start">
                        <div class="col-lg-12 static">
                            <div class="slide-text text-center black">
                                <h2 class="owl-slide-animated owl-slide-title">{{$row->slider_heading}}</h2>
                                <p class="owl-slide-animated owl-slide-subtitle">
                                    {{$row->slider_sub_heading}}
                                </p>
                                <div class="owl-slide-animated owl-slide-cta"><a class="btn_1" href="{{$row->button_link}}" role="button">{{$row->button_text}}</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/owl-slide-->
        </div>
        @endforeach

    </div>
    <div id="icon_drag_mobile"></div>
</div>
@endsection
