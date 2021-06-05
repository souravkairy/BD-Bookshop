@php
$seo = DB::table('seo')->first();
@endphp
@extends('BackEnd/MasterLayout/master')
@section('dashboard')
    <div id="wrapper">
        <div class="content-page">

            <div class="content">
                <div class="container-fluid">
                    <div class="page-title-box">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                {{-- <h4 class="page-title">Seo Setting</h4> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2">
                        </div>
                        <div class="col-lg-8">
                            <div class="card m-b-30">
                                <div class="card-body">
                                    <h4 class="mt-0 header-title">Seo Setting</h4>
                                    <form class="" action="#">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input value="{{$seo->title}}" type="text" name="title" class="form-control"  placeholder="Title"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Shared Title</label>
                                            <input value="{{$seo->share_title}}" type="text" class="form-control" name="share_title"  placeholder="Share Title"/>
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea value="{{$seo->description}}" name="description" id="" class="form-control" cols="30" rows="5"  placeholder="Description">{{$seo->description}}</textarea>
                                            {{-- <input type="text" name="description" class="form-control" required placeholder="Description"/> --}}
                                        </div>
                                        <div class="form-group">
                                            <label>Keyword(Use Comma between Keywords)</label>
                                            <input value="{{$seo->keyword}}" type="text" class="form-control" name="keyword"  placeholder="best book,fuction,poetry"/>
                                        </div>
                                        <div class="form-group">

                                            <button class="btn btn-success btn-lg btn-block waves-effect waves-light" type="submit">Submit</button>

                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div> <!-- end col -->
                        <div class="col-lg-2">
                        </div>

                    </div> <!-- end row -->


                </div>

            </div>


        </div>
    </div>
@endsection
