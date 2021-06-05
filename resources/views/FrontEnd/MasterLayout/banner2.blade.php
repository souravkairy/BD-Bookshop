@extends('FrontEnd.MasterLayout.master')
@section('banner2')
<div class="featured lazy" data-bg="url({{asset('public/frontEnd/img/sss.jpg')}})">
    <div class="opacity-mask d-flex align-items-center" data-opacity-mask="rgba(0, 0, 0, 0.5)">
        <div class="container margin_60">
            <div class="row justify-content-center justify-content-md-start">
                <div class="col-lg-6 wow" data-wow-offset="150">
                    <h3>Armor<br>Air Color 720</h3>
                    <p>Lightweight cushioning and durable support with a Phylon midsole</p>
                    <div class="feat_text_block">
                        <div class="price_box">
                            <span class="new_price">$90.00</span>
                            <span class="old_price">$170.00</span>
                        </div>
                        <a class="btn_1" href="listing-grid-1-full.html" role="button">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
