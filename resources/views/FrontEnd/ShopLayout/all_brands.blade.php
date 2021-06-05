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
            <!-- /page_header -->
            {{-- <div class="search-input">
                <input type="text" placeholder="Search question or article...">
                <button type="submit"><i class="ti-search"></i></button>
            </div> --}}
            <!-- /search-input -->

            <div class="row">
                @foreach ($brand as $row)
                    <div class="col-lg-3 col-md-6">
                        <a class="box_topic" href="{{url('jobs_details/'.$row->id)}}">
                            <img style="width: 40%;border-radius: 50px;"
                                src="{{$row->brand_image}}" alt="">
                            <p class="mt-3">{{$row->brand_name}}</p>

                        </a>
                    </div>
                @endforeach
            </div>
            <!--/row-->
        </div>

        <!-- /bg_white -->
    </main>

@endsection
