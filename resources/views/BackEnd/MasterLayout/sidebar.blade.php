@php
        $pending_orders = DB::table('order')
                    ->where('status',0)
                    ->limit(4)
                    ->get();
        $Allpending_orders = DB::table('order')
                    ->where('status',0)
                    ->get();
        $id = Session::get('id');
        $role_permission = DB::table('admin_login')
                                ->where('id',$id)
                                ->first();

@endphp

@extends('BackEnd.MasterLayout.master')
@section('sidebar')
    <body>
        <div id="wrapper">
            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="{{ url('Admin-Dashboard') }}" class="logo">
                        <span class="logo-light">
                            <a href="#"><img src="{{asset('public/frontEnd/img/logo.png')}}"></a>
                        </span>
                        {{-- <span class="logo-sm">
                            <a href="#"><img src="{{asset('public/frontEnd/img/ddd.png')}}"></a>
                        </span> --}}
                    </a>
                </div>

                <nav class="navbar-custom">
                    <ul class="navbar-right list-inline float-right mb-0">

                        <!-- full screen -->
                        {{-- <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                            <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                                <i class="mdi mdi-arrow-expand-all noti-icon"></i>
                            </a>
                        </li> --}}

                        <!-- notification -->
                        <li class="dropdown notification-list list-inline-item">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect" href="{{url('/')}}"
                                role="button">
                                <i class="mdi mdi-home noti-icon"></i>
                            </a>
                        </li>
                        @if ($role_permission->order_section == 1)
                            <li class="dropdown notification-list list-inline-item">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                                    role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="mdi mdi-bell-outline noti-icon"></i>
                                    <span class="badge badge-pill badge-danger noti-icon-badge">{{$Allpending_orders->count()}}</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-lg px-1">
                                    <!-- item-->
                                    <h6 class="dropdown-item-text">
                                        New Order
                                    </h6>
                                    <div class="slimscroll notification-item-list">
                                            @forelse ($pending_orders as $item)
                                            <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                                <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                                <p class="notify-details"><b>Order ID: {{$item->tracking_code}}</b><span class="text-muted">{{$item->total}} ৳</span></p>
                                            </a>
                                            @empty
                                                <h3>No New Order</h3>
                                            @endforelse
                                    </div>
                                    <!-- All-->
                                    <a href="{{url('pending_order')}}" class="dropdown-item text-center notify-all text-primary">
                                        View all <i class="fi-arrow-right"></i>
                                    </a>
                                </div>
                            </li>
                        @endif


                        <li class="dropdown notification-list list-inline-item">
                            <div class="dropdown notification-list nav-pro-img">
                                <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#"
                                    role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="{{ asset('public/BackEnd/assets/images/users/user-4.jpg') }}" alt="user"
                                        class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="{{url('log_out')}}"><i class="mdi mdi-power text-danger"></i>
                                        Logout</a>
                                </div>
                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">

                        </li>
                        <li class="d-none d-md-inline-block">

                        </li>
                    </ul>

                </nav>
            </div>
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">
                    <div id="sidebar-menu">
                        <ul class="metismenu" id="side-menu">
                            @if ($role_permission->dashboard == 1)
                            <li>
                                <a href="{{url('Admin-Dashboard')}}" class="waves-effect">
                                    <i class="icon-accelerator"></i><span> Dashboard </span>
                                </a>
                            </li>
                            @endif
                            @if ($role_permission->product_section == 1)
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="icon-mail-open"></i><span>
                                        Product Section <span class="float-right menu-arrow"><i
                                                class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="{{url('category')}}">Category</a></li>
                                    <li><a href="{{url('sub_category')}}">Sub-Category</a></li>
                                    {{-- <li><a href="{{url('add_product')}}">Add Products</a></li> --}}
                                    <li><a href="{{url('all_products')}}">All Products</a></li>
                                    {{-- <li><a href="{{url('all_coupon')}}">Coupon</a></li> --}}

                                </ul>
                            </li>
                            @endif
                            @if ($role_permission->job_section == 1)
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-address-book"></i><span>
                                        Job Section <span class="float-right menu-arrow"><i
                                                class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="{{url('jobs')}}">Jobs</a></li>
                                </ul>
                            </li>
                            @endif
                            @if ($role_permission->order_section == 1)
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="icon-paper-sheet"></i><span>
                                        Order Section<span class="float-right menu-arrow"><i
                                                class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="{{url('pending_order')}}">Pending Orders</a></li>
                                    <li><a href="{{url('confirm_order')}}">Confirmed Orders</a></li>
                                    <li><a href="{{url('processing_order')}}">Processing Orders</a></li>
                                    <li><a href="{{url('delivery_done')}}">Delivery Done</a></li>
                                    {{-- <li><a href="{{url('cancel_order')}}">Cancel Order</a></li> --}}
                                </ul>
                            </li>
                            @endif
                            @if ($role_permission->site_setting == 1)
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="icon-pencil-ruler"></i>
                                    <span>Site Setting <span class="float-right menu-arrow"><i
                                                class="mdi mdi-chevron-right"></i></span> </span> </a>
                                <ul class="submenu">
                                    <li><a href="{{URL('site_setting')}}">Site Setting</a></li>
                                    <li><a href="{{url('seo')}}">Seo</a></li>
                                    <li><a href="#">NewsLetter</a></li>
                                    <li><a href="{{url('admin_role')}}">Admin Role</a></li>
                                </ul>
                            </li>
                            @endif
                            @if ($role_permission->contact_section == 1)
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="icon-coffee"></i> <span>
                                        Contact Message <span class="float-right menu-arrow"><i
                                                class="mdi mdi-chevron-right"></i></span></span> </a>
                                <ul class="submenu">
                                    <li><a href="icons-material.html">Messages</a></li>

                                </ul>
                            </li>
                            @endif
                            @if ($role_permission->blog_section == 1)
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="icon-pencil"></i><span> Blog
                                        Section <span class="float-right menu-arrow"><i
                                                class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="{{url('blog')}}"> Blogs</a></li>

                                </ul>
                            </li>
                            @endif
                            @if ($role_permission->stock_section == 1)
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="icon-share"></i><span>Stock Management<span class="float-right menu-arrow"><i
                                                class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="{{url('stock_product_list')}}">Products List</a></li>
                                    <li>
                                        <a href="javascript:void(0);">Menu 2 <span class="float-right menu-arrow"><i
                                                    class="mdi mdi-chevron-right"></i></span></a>
                                        <ul class="submenu">
                                            <li><a href="javascript:void(0);">Menu 2.1</a></li>
                                            <li><a href="javascript:void(0);">Menu 2.1</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            @endif


                        </ul>

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
        @endsection
