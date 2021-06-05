@php
$sub_total =str_replace( ',', '', Cart::subtotal() );
@endphp
@extends('FrontEnd.MasterLayout.master')
@section('topSellingProducts')

<main class="bg_gray">
    <div class="container margin_30">
    <div class="page_header">
        <div class="breadcrumbs">
            <ul>
                <li><a href="#">Home</a></li>
                <li><a href="#">Category</a></li>
                <li>Page active</li>
            </ul>
        </div>
        <h1>Cart page</h1>
    </div>
    <!-- /page_header -->
    <table class="table table-striped cart-list">
                        <thead>
                            <tr>
                                <th style="width: 10%">
                                    Product
                                </th>
                                <th>
                                    code
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    Quantity
                                </th>
                                <th>
                                    Subtotal
                                </th>
                                <th style="width: 18%;">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartData as $row)
                            <tr>
                                <td>
                                    <div class="thumb_cart">
                                        <img src="{{$row->options->image}}" data-src="{{$row->options->image}}" class="lazy" alt="Image" width="60%">
                                    </div>
                                    {{-- <span class="item_cart">Armor Air x Fear</span> --}}
                                </td>
                                <td>
                                    <strong>{{$row->options->code}}</strong>
                                </td>
                                <td>
                                    <strong>{{$row->name}}</strong>
                                </td>
                                <td>
                                    <strong>{{$row->price}}</strong>
                                </td>
                                <td>
                                    <div class="numbers-row">
                                        <input type="text" value="{{$row->qty}}" id="quantity_1" class="qty2" name="quantity_1">
                                    <div class="inc button_inc">+</div><div class="dec button_inc">-</div></div>
                                </td>
                                <td>
                                    <strong>{{$row->qty * $row->price}}</strong>
                                </td>
                                <td class="options">

                                    <a type="button" class="btn_1 gray" href="{{url('delete_product/'.$row->rowId)}}">Update</a>
                                    <a type="button" class="btn_1 gray" href="{{url('delete_product/'.$row->rowId)}}"><i class="ti-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>

                    <div class="row add_top_30 flex-sm-row-reverse cart_actions">
                    <div class="col-sm-4 text-right">
                        {{-- <button type="button" class="btn_1 gray">Update Cart</button> --}}
                    </div>
                    {{-- <div class="col-sm-8">
                        <div class="apply-coupon">
                            <div class="form-group form-inline">
                                <input type="text" name="coupon-code" value="" placeholder="Promo code" class="form-control">
                                <button type="submit" class="btn_1 outline">Apply Coupon</button>
                            </div>
                        </div>
                    </div> --}}
                </div>
                <!-- /cart_actions -->

    </div>
    <!-- /container -->

    <div class="box_cart">
        <div class="container">
        <div class="row justify-content-end">
            <div class="col-xl-4 col-lg-4 col-md-6">
        <ul>
            <li>
                <span>Gross total</span> {{$sub_total}}
            </li>
            <li>
                <span>vat/Tax</span> 0
            </li>
            <li>
                <span>Total</span> {{ $subTotal = $sub_total + 0}}
            </li>
        </ul>
            @php
                Session::put('sub_total',$subTotal)
            @endphp
            <a class="btn_1 full-width cart" href="{{url('pToC')}}">Proceed to Checkout</a>

                </div>
            </div>
        </div>
    </div>
    <!-- /box_cart -->

</main>

@endsection
