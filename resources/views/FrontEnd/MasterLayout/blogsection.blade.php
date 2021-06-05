@php
    $data = DB::table('blog')->get();
@endphp
@extends('FrontEnd.MasterLayout.master')
@section('blogsection')
<div class="container margin_60_35">
    <div class="main_title">
        <h2>Latest News</h2>
        <span>Blog</span>
        <p>Cum doctus civibus efficiantur in imperdiet deterruisset</p>
    </div>
    <div class="row">
@foreach ($data as $row)

@endforeach
        <div class="col-lg-6">
            <a class="box_news" href="blog.html">
                <figure>
                    <img src="{{ asset($row->image) }}"
                        alt="" width="400" height="266"
                        class="lazy">
                    <figcaption><strong>28</strong>Dec</figcaption>
                </figure>
                {{-- <ul>
                    <li>by Mark Twain</li>
                    <li>20.11.2017</li>
                </ul> --}}
                <h4>{{$row->name}}</h4>
                <p> {!!  substr(strip_tags($row->desc), 0, 100) !!}</p>
            </a>
        </div>

    </div>
    <!-- /row -->
</div>

</main>
@endsection
