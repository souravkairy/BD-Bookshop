{{-- @php
    echo "<pre>";
    print_r($trac_info);
    exit();
@endphp --}}

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">

    <title></title>

    <style type="text/css" media="screen">
         @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');

 body {
     background-color: #eeeeee;
     font-family: 'Open Sans', serif
 }

 .container {
     margin-top: 50px;
     margin-bottom: 50px
 }

 .card {
     position: relative;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     -webkit-box-orient: vertical;
     -webkit-box-direction: normal;
     -ms-flex-direction: column;
     flex-direction: column;
     min-width: 0;
     word-wrap: break-word;
     background-color: #fff;
     background-clip: border-box;
     border: 1px solid rgba(0, 0, 0, 0.1);
     border-radius: 0.10rem
 }

 .card-header:first-child {
     border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
 }

 .card-header {
     padding: 0.75rem 1.25rem;
     margin-bottom: 0;
     background-color: #fff;
     border-bottom: 1px solid rgba(0, 0, 0, 0.1)
 }

 .track {
     position: relative;
     background-color: #ddd;
     height: 7px;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     margin-bottom: 60px;
     margin-top: 50px
 }

 .track .step {
     -webkit-box-flex: 1;
     -ms-flex-positive: 1;
     flex-grow: 1;
     width: 25%;
     margin-top: -18px;
     text-align: center;
     position: relative
 }

 .track .step.active:before {
     background: #FF5722
 }

 .track .step::before {
     height: 7px;
     position: absolute;
     content: "";
     width: 100%;
     left: 0;
     top: 18px
 }

 .track .step.active .icon {
     background: #ee5435;
     color: #fff
 }

 .track .icon {
     display: inline-block;
     width: 40px;
     height: 40px;
     line-height: 40px;
     position: relative;
     border-radius: 100%;
     background: #ddd
 }

 .track .step.active .text {
     font-weight: 400;
     color: #000
 }

 .track .text {
     display: block;
     margin-top: 7px
 }

 .itemside {
     position: relative;
     display: -webkit-box;
     display: -ms-flexbox;
     display: flex;
     width: 100%
 }

 .itemside .aside {
     position: relative;
     -ms-flex-negative: 0;
     flex-shrink: 0
 }

 .img-sm {
     width: 80px;
     height: 80px;
     padding: 7px
 }

 ul.row,
 ul.row-sm {
     list-style: none;
     padding: 0
 }

 .itemside .info {
     padding-left: 15px;
     padding-right: 7px
 }

 .itemside .title {
     display: block;
     margin-bottom: 5px;
     color: #212529
 }

 p {
     margin-top: 0;
     margin-bottom: 1rem
 }

 .btn-warning {
     color: #ffffff;
     background-color: #ee5435;
     border-color: #ee5435;
     border-radius: 1px
 }

 .btn-warning:hover {
     color: #ffffff;
     background-color: #ff2b00;
     border-color: #ff2b00;
     border-radius: 1px
 }
    </style>
</head>
<body>
    <div class="container">
    <article class="card">
        <header class="card-header"> My Orders / Tracking </header>
        <div class="card-body">
            {{-- <h6>Order ID: {{$trac_info->stripe_order_id}}</h6> --}}
            <article class="card">
                <div class="card-body row">
<?php
$date = $trac_info->date;
$delivery_date = date('d-m-Y', strtotime($date. ' + 5 days'));
?>


                    <div class="col"> <strong>Estimated Delivery Date:</strong> <br>{{$delivery_date }}(within 5 working days after order)</div>
                    <div class="col"> <strong>Shipping BY:</strong> <br> Rasel , | <i class="fa fa-phone"></i> +8801797338420 </div>
                 {{--     @if ($trac_info->status == 0)
                      <div class="col"> <strong>Status:</strong> <br> Order Pending </div>
                     @elseif($trac_info->status == 1)
                      <div class="col"> <strong>Status:</strong> <br> Payment Accepted </div>
                     @elseif($trac_info->status == 2)
                      <div class="col"> <strong>Status:</strong> <br> Delivery Progress </div>
                     @elseif($trac_info->status == 3)
                      <div class="col"> <strong>Status:</strong> <br> Delivery Done </div>
                     @endif --}}




                    <div class="col"> <strong>Tracking #:</strong> <br> {{$trac_info->tracking_code}} </div>
                    <div class="col"> <strong>Total Amount:</strong> <br> {{$trac_info->total}} </div>
                </div>
            </article>
            <div class="track">
                @if ($trac_info->status == 0)
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>
                     <div class="step"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">Payment Accepted</span> </div>
                     <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Delivery Progress</span> </div>
                      <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Delivery Done</span></div>
                @elseif($trac_info->status == 1)
                    <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>
                     <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">Payment Accepted</span> </div>
                     <div class="step"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Delivery Progress</span> </div>
                      <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Delivery Done</span></div>
                @elseif($trac_info->status == 2)
                    <div class="step active "> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>
                     <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">Payment Accepted</span> </div>
                     <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Delivery Progress</span> </div>
                      <div class="step"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Delivery Done</span></div>
                @elseif($trac_info->status == 3)
                   <div class="step active"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order Pending</span> </div>
                     <div class="step active"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text">Payment Accepted</span> </div>
                     <div class="step active"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text">Delivery Progress</span> </div>
                      <div class="step active"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Delivery Done</span></div>

                @endif

            </div>
            <hr>
            <ul class="row">
                @foreach ($order_products as $row)
                    <li class="col-md-4">
                        <figure class="itemside mb-3">
                            {{-- <div class="aside"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1571751108/Ecommerce/laptop-dell-xps-15-computer-monitors-laptops.jpg" class="img-sm border"></div> --}}
                            <figcaption class="info align-self-center">
                                <p class="title">{{$row->product_name}} <br> Qty : {{$row->qty}}</p> <span class="text-muted">{{$row->single_price}} </span>
                            </figcaption>
                        </figure>
                    </li>
                @endforeach

            </ul>
            <hr>
            <a href="{{ url('/') }}" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
        </div>
    </article>
</div>
</body>
</html>
