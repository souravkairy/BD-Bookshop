@php
$all_publishers = DB::table('product')->paginate(24);
@endphp
@extends('FrontEnd.MasterLayout.master')
@section('topSellingProducts')
    <main class="bg_gray">
        <div class="container margin_30">
            <div class="page_header">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="#">Publishers</a></li>
                    </ul>
                </div>
                <h1>All Publishers </h1>
            </div>
            <!-- /page_header -->
            <div class="search-input">
                <form action="{{url('search-data-all')}}" method="POST">
                    @csrf
                    <input type="text" placeholder="Search over 10.000 products" name="search" class="typesearch">
                    <button type="submit"><i class="header-icon_search_custom"></i></button>
                </form>
            </div>
            <!-- /search-input -->
            <div class="row">
                @foreach ($all_publishers as $row)
                    <div class="col-lg-3 col-md-6">
                        <a class="box_topic" href="{{url('search/'.$row->unit)}}">
                            <p>{{$row->unit}}</p>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center text-center">
                {{$all_publishers->links("pagination::bootstrap-4") }}
            </div>
            <!--/row-->
        </div>

        <!-- /bg_white -->
    </main>

@endsection
