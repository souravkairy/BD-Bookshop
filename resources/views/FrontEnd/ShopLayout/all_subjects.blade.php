@php
$all_subjects = DB::table('product')->paginate(24);
@endphp
@extends('FrontEnd.MasterLayout.master')
@section('topSellingProducts')
    <main class="bg_gray">
        <div class="container margin_30">
            <div class="page_header">
                <div class="breadcrumbs">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="#">Subjects</a></li>
                    </ul>
                </div>
                <h1>All Subjects </h1>
            </div>
            <!-- /page_header -->
            {{-- <div class="search-input">
                <input type="text" placeholder="Search question or article...">
                <button type="submit"><i class="ti-search"></i></button>
            </div> --}}
            <!-- /search-input -->
            <div class="row">
                @foreach ($all_subjects as $row)
                    <div class="col-lg-3 col-md-6">
                        <a class="box_topic" href="{{url('search/'.$row->subject)}}">
                            <p>{{$row->subject}}</p>
                        </a>
                    </div>
                @endforeach

            </div>
            <div class="d-flex justify-content-center text-center">
                {{$all_subjects->links("pagination::bootstrap-4") }}
            </div>
            <!--/row-->
        </div>

        <!-- /bg_white -->
    </main>

@endsection
