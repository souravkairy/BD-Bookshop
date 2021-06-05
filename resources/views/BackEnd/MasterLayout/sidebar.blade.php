@extends('BackEnd.MasterLayout.master')
@section('sidebar')

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="{{ url('Admin-Dashboard') }}" class="logo">
                        <span class="logo-light">
                            Bd Book Shop
                        </span>
                        <span class="logo-sm">
                            All
                        </span>
                    </a>
                </div>

                <nav class="navbar-custom">
                    <ul class="navbar-right list-inline float-right mb-0">

                        <!-- language-->
                        {{-- <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                                role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="{{ asset('public/BackEnd/assets/images/flags/us_flag.jpg') }}" class="mr-2"
                                    height="12" alt="" /> English <span class="mdi mdi-chevron-down"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated language-switch">
                                <a class="dropdown-item" href="#"><img
                                        src="{{ asset('public/BackEnd/assets/images/flags/french_flag.jpg') }}" alt=""
                                        height="16" /><span> French </span></a>
                                <a class="dropdown-item" href="#"><img
                                        src="{{ asset('public/BackEnd/assets/images/flags/spain_flag.jpg') }}" alt=""
                                        height="16" /><span> Spanish </span></a>
                                <a class="dropdown-item" href="#"><img
                                        src="{{ asset('public/BackEnd/assets/images/flags/russia_flag.jpg') }}" alt=""
                                        height="16" /><span> Russian </span></a>
                                <a class="dropdown-item" href="#"><img
                                        src="{{ asset('public/BackEnd/assets/images/flags/germany_flag.jpg') }}" alt=""
                                        height="16" /><span> German </span></a>
                                <a class="dropdown-item" href="#"><img
                                        src="{{ asset('public/BackEnd/assets/images/flags/italy_flag.jpg') }}" alt=""
                                        height="16" /><span> Italian </span></a>
                            </div>
                        </li> --}}

                        <!-- full screen -->
                        <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                            <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                                <i class="mdi mdi-arrow-expand-all noti-icon"></i>
                            </a>
                        </li>

                        <!-- notification -->
                        <li class="dropdown notification-list list-inline-item">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                                role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="mdi mdi-bell-outline noti-icon"></i>
                                <span class="badge badge-pill badge-danger noti-icon-badge">3</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-lg px-1">
                                <!-- item-->
                                <h6 class="dropdown-item-text">
                                    Notifications
                                </h6>
                                <div class="slimscroll notification-item-list">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                        <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                        <p class="notify-details"><b>Your order is placed</b><span class="text-muted">Dummy
                                                text of the printing and typesetting industry.</span></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-danger"><i class="mdi mdi-message-text-outline"></i>
                                        </div>
                                        <p class="notify-details"><b>New Message received</b><span class="text-muted">You
                                                have 87 unread messages</span></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-info"><i class="mdi mdi-filter-outline"></i></div>
                                        <p class="notify-details"><b>Your item is shipped</b><span class="text-muted">It is
                                                a long established fact that a reader will</span></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-success"><i class="mdi mdi-message-text-outline"></i>
                                        </div>
                                        <p class="notify-details"><b>New Message received</b><span class="text-muted">You
                                                have 87 unread messages</span></p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-warning"><i class="mdi mdi-cart-outline"></i></div>
                                        <p class="notify-details"><b>Your order is placed</b><span class="text-muted">Dummy
                                                text of the printing and typesetting industry.</span></p>
                                    </a>

                                </div>
                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center notify-all text-primary">
                                    View all <i class="fi-arrow-right"></i>
                                </a>
                            </div>
                        </li>

                        <li class="dropdown notification-list list-inline-item">
                            <div class="dropdown notification-list nav-pro-img">
                                <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#"
                                    role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="{{ asset('public/BackEnd/assets/images/users/user-4.jpg') }}" alt="user"
                                        class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    {{-- <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle"></i> Profile</a>
                                    <a class="dropdown-item" href="#"><i class="mdi mdi-wallet"></i> Wallet</a>
                                    <a class="dropdown-item d-block" href="#"><span
                                            class="badge badge-success float-right">11</span><i
                                            class="mdi mdi-settings"></i> Settings</a>
                                    <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline"></i> Lock
                                        screen</a> --}}
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="{{url('log_out')}}"><i class="mdi mdi-power text-danger"></i>
                                        Logout</a>
                                </div>
                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-effect">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>
                        <li class="d-none d-md-inline-block">
                            {{-- <form role="search" class="app-search">
                                <div class="form-group mb-0">
                                    <input type="text" class="form-control" placeholder="Search..">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </form> --}}
                        </li>
                    </ul>

                </nav>

            </div>
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">Menu</li>
                            <li>
                                <a href="{{url('Admin-Dashboard')}}" class="waves-effect">
                                    <i class="icon-accelerator"></i><span> Dashboard </span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="icon-mail-open"></i><span>
                                        Product Section <span class="float-right menu-arrow"><i
                                                class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="{{url('category')}}">Category</a></li>
                                    <li><a href="{{url('sub_category')}}">Sub-Category</a></li>
                                    {{-- <li><a href="{{url('add_product')}}">Add Products</a></li> --}}
                                    <li><a href="{{url('all_products')}}">All Products</a></li>
                                    <li><a href="{{url('all_coupon')}}">Coupon</a></li>

                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-address-book"></i><span>
                                        Job Section <span class="float-right menu-arrow"><i
                                                class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="{{url('jobs')}}">Jobs</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="icon-paper-sheet"></i><span>
                                        Order Section<span class="float-right menu-arrow"><i
                                                class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="{{url('pending_order')}}">Pending Orders</a></li>
                                    <li><a href="{{url('confirm_order')}}">Confirmed Orders</a></li>
                                    <li><a href="{{url('processing_order')}}">Processing Orders</a></li>
                                    <li><a href="{{url('delivery_done')}}">Delivery Done</a></li>
                                    <li><a href="{{url('cancel_order')}}">Cancel Order</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="icon-pencil-ruler"></i>
                                    <span>Site Setting <span class="float-right menu-arrow"><i
                                                class="mdi mdi-chevron-right"></i></span> </span> </a>
                                <ul class="submenu">
                                    <li><a href="ui-alerts.html">Site Setting</a></li>
                                    <li><a href="{{url('seo')}}">Seo</a></li>
                                    <li><a href="ui-buttons.html">NewsLetter</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="icon-coffee"></i> <span>
                                        Contact Message <span class="float-right menu-arrow"><i
                                                class="mdi mdi-chevron-right"></i></span></span> </a>
                                <ul class="submenu">
                                    <li><a href="icons-material.html">Messages</a></li>

                                </ul>
                            </li>

                            <li>
                                <a href="javascript:void(0);" class="waves-effect"><i class="icon-pencil"></i><span> Blog
                                        Section <span class="float-right menu-arrow"><i
                                                class="mdi mdi-chevron-right"></i></span> </span></a>
                                <ul class="submenu">
                                    <li><a href="{{url('blog')}}"> Blogs</a></li>

                                </ul>
                            </li>

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

                        </ul>

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
        @endsection
