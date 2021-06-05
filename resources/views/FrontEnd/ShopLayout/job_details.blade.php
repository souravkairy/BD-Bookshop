@php
$brand = DB::table('brand')->get();
@endphp
@extends('FrontEnd.MasterLayout.master')
@section('topSellingProducts')
    <main class="bg_gray">


        <div class="container margin_30">
            <div class="page_header">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="#">Jobs</a></li>
                    </ul>
                </div>
                <h1>Latest Jobs News </h1>
            </div>
            <div class="row">

                    <div class="col-lg-3 col-md-12">
                            <img style="width: 100%;" src="{{asset($f_data->brand_image)}}" alt="">

                    </div>
                    <div class="col-lg-9 col-md-12">

                        <h2 class="mt-3">{{$f_data->brand_name}}</h2>
                        <p class="mt-3">{{$f_data->brand_desc}}</p>
                </div>

            </div>
            <!--/row-->
        </div>

        <!-- /bg_white -->
    </main>

@endsection
