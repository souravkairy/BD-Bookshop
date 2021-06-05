@php
    $category = DB::table('sub_category')
    ->where('category_id',6)
    ->limit(10)
    ->get();
@endphp
@extends('FrontEnd.MasterLayout.master')
@section('banner')
<ul id="banners_grid" class="clearfix">
    @foreach ($category as $row)
    <li>
        <a href="{{url('products/'.$row->id. '/' .$row->sub_category_name)}}" class="img_container">
            <img src="{{asset('public/frontEnd/img/ss.png')}}" data-src="{{asset('public/frontEnd/img/ss.png')}}" alt="" class="lazy">
            <div class="short_info opacity-mask" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                <p>{{$row->sub_category_name}}</p>
                <div><span class="btn_1">Shop Now</span></div>
            </div>
        </a>
    </li>
    @endforeach
</ul>
@endsection
