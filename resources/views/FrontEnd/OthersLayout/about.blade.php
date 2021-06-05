@extends('FrontEnd.MasterLayout.master')
@section('topSellingProducts')

<main class="bg_gray">
    <div class="top_banner general">
        <div class="opacity-mask d-flex align-items-md-center" data-opacity-mask="rgba(0, 0, 0, 0.1)">
            <div class="container">
                <div class="row justify-content-end">
                    <div class="col-lg-8 col-md-6 text-right">
                        <h1>Dolor docendi fuisset ad<br>movet mucius diceret et qui</h1>
                    </div>
                </div>
            </div>
        </div>
        <img src="{{asset('public/frontEnd/img/top_about.jpg')}}" class="img-fluid" alt="">
    </div>
    <!--/top_banner-->

    <div class="bg_white">
    <div class="container margin_90_0">
        <div class="row justify-content-between align-items-center flex-lg-row-reverse content_general_row">
            <div class="col-lg-5 text-center">
                <figure><img src="{{asset('public/frontEnd/img/about_placeholder.jpg')}}" data-src="{{asset('public/frontEnd/img/about_1.svg')}}" alt="" class="img-fluid lazy" width="350" height="268"></figure>
            </div>
            <div class="col-lg-6">
                <h2>Per quot choro cetero eu</h2>
                <p class="lead">Eu qui mundi lucilius petentium, mea amet libris prodesset in.</p>
                <p>His dolor docendi fuisset ad, movet mucius diceret et qui. Esse ferri integre sit id. Nec iusto eleifend definitionem ne, persius argumentum sed ut. Ut mel dicta latine. Ut dicta tempor omittantur pro, ne mea magna idque. Nulla ancillae et his, ei vim lorem accusam.</p>
            </div>
        </div>
        <!--/row-->
        <div class="row justify-content-between align-items-center content_general_row">
            <div class="col-lg-5 text-left">
                <figure><img src="{{asset('public/frontEnd/img/about_placeholder.jpg')}}" data-src="{{asset('public/frontEnd/img/about_3.svg')}}" alt="" class="img-fluid lazy" width="350" height="268"></figure>
            </div>
            <div class="col-lg-6">
                <h2>Per quot choro cetero eu</h2>
                <p class="lead">Eu qui mundi lucilius petentium, mea amet libris prodesset in.</p>
                <p>His dolor docendi fuisset ad, movet mucius diceret et qui. Esse ferri integre sit id. Nec iusto eleifend definitionem ne, persius argumentum sed ut. Ut mel dicta latine. Ut dicta tempor omittantur pro, ne mea magna idque. Nulla ancillae et his, ei vim lorem accusam.</p>
            </div>
        </div>
        <!--/row-->
        <div class="row justify-content-between align-items-center flex-lg-row-reverse content_general_row">
            <div class="col-lg-5 text-center">
                <figure><img src="{{asset('public/frontEnd/img/about_placeholder.jpg')}}" data-src="{{asset('public/frontEnd/img/about_2.svg')}}" alt="" class="img-fluid lazy" width="350" height="316"></figure>
            </div>
            <div class="col-lg-6">
                <h2>Per quot choro cetero eu</h2>
                <p class="lead">Eu qui mundi lucilius petentium, mea amet libris prodesset in.</p>
                <p>His dolor docendi fuisset ad, movet mucius diceret et qui. Esse ferri integre sit id. Nec iusto eleifend definitionem ne, persius argumentum sed ut. Ut mel dicta latine.</p>
                <ul class="list_ok">
                    <li>At pro tale omnes iuvaret</li>
                    <li>Persius argumentum sed ut tempor omittantur pro</li>
                    <li>His dolor docendi fuisset ad, movet mucius</li>
                </ul>
            </div>
        </div>
        <!--/row-->
    </div>
    <!--/container-->

    </div>
    <!--/bg_white-->
    <div id="carousel-home">
        <div class="owl-carousel owl-theme">
            <div class="owl-slide cover" style="background-image: url({{asset('public/frontEnd/img/testimonial_1.jpg')}});">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                    <div class="container">
                        <div class="row justify-content-center justify-content-md-start">
                            <div class="col-lg-6 static">
                                <div class="slide-text white">
                                    <h2 class="owl-slide-animated owl-slide-title">"Awesome Experience"</h2>
                                    <p class="owl-slide-animated owl-slide-subtitle">
                                        <em>His dolor docendi fuisset ad, movet mucius diceret et qui. Esse ferri integre sit id. Nec iusto eleifend definitionem ne, persius argumentum sed ut.</em>
                                    </p>
                                    <div class="owl-slide-animated owl-slide-cta"><small>Susan - Photographer</small></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/owl-slide-->
            <div class="owl-slide cover" style="background-image: url({{asset('public/frontEnd/img/testimonial_2.jpg')}});">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
                    <div class="container">
                        <div class="row justify-content-center justify-content-md-start">
                            <div class="col-lg-6 static">
                                <div class="slide-text white">
                                    <h2 class="owl-slide-animated owl-slide-title">"Great Support"</h2>
                                    <p class="owl-slide-animated owl-slide-subtitle">
                                        <em>His dolor docendi fuisset ad, movet mucius diceret et qui. Esse ferri integre sit id. Nec iusto eleifend definitionem ne.</em>
                                    </p>
                                    <div class="owl-slide-animated owl-slide-cta">Mary - Doctor</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/owl-slide-->
            <div class="owl-slide cover" style="background-image: url({{asset('public/frontEnd/img/testimonial_3.jpg')}});">
                <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(255, 255, 255, 0.5)">
                    <div class="container">
                        <div class="row justify-content-center justify-content-md-start">
                            <div class="col-lg-12 static">
                                <div class="slide-text text-center black">
                                    <h2 class="owl-slide-animated owl-slide-title">"Satisfied"</h2>
                                    <p class="owl-slide-animated owl-slide-subtitle">
                                        <em>His dolor docendi fuisset ad, movet mucius diceret et qui. Esse ferri integre sit id.</em>
                                    </p>
                                    <div class="owl-slide-animated owl-slide-cta">Katrin - Student</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/owl-slide-->
            </div>
        </div>
        <div id="icon_drag_mobile"></div>
    </div>
    <!--/carousel-->
</main>

@endsection
