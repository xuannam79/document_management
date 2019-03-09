<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="/layouts/systemAdmin/images/icon/favicon.ico">
    <link rel="stylesheet" href="/layouts/systemAdmin/css/bootstrap.min.css">
    <link rel="stylesheet" href="/layouts/systemAdmin/css/font-awesome.min.css">
    <link rel="stylesheet" href="/layouts/systemAdmin/css/themify-icons.css">
    <link rel="stylesheet" href="/layouts/systemAdmin/css/metisMenu.css">
    <link rel="stylesheet" href="/layouts/systemAdmin/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/layouts/systemAdmin/css/slicknav.min.css">
    <link rel="stylesheet" href="/layouts/systemAdmin/css/export.css" type="text/css" media="all" />

    {{-- data table --}}
    <link rel="stylesheet" href="/layouts/systemAdmin/css/jquery.dataTables.css" type="text/css"/>
    <link rel="stylesheet" href="/layouts/systemAdmin/css/dataTables.bootstrap4.min.css" type="text/css"/>
    <link rel="stylesheet" href="/layouts/systemAdmin/css/responsive.bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="/layouts/systemAdmin/css/responsive.jqueryui.min.css" type="text/css"/>

    <link rel="stylesheet" href="/layouts/systemAdmin/css/typography.css">
    <link rel="stylesheet" href="/layouts/systemAdmin/css/default-css.css">
    <link rel="stylesheet" href="/layouts/systemAdmin/css/styles.css">
    <link rel="stylesheet" href="/layouts/systemAdmin/css/responsive.css">
    <script src="/layouts/systemAdmin/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <div class="page-container">

    @include('layouts.systemAdmin.leftbar')

    <div class="main-content">
        <div class="header-area">
            <div class="row align-items-center">
                <div class="col-md-6 col-sm-8 clearfix">
                    <div class="nav-btn pull-left">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="search-box pull-left">
                        <form action="#">
                            <input type="text" name="search" placeholder="Search..." required>
                            <i class="ti-search"></i>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 col-sm-4 clearfix">
                    <ul class="notification-area pull-right">
                        <li id="full-view"><i class="ti-fullscreen"></i></li>
                        <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                        <li class="dropdown">
                            <i class="ti-bell dropdown-toggle" data-toggle="dropdown">
                                <span>2</span>
                            </i>
                            <div class="dropdown-menu bell-notify-box notify-box">
                                <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>
                                <div class="nofity-list">
                                    <a href="#" class="notify-item">
                                        <div class="notify-thumb"><i class="ti-key btn-danger"></i></div>
                                        <div class="notify-text">
                                            <p>You have Changed Your Password</p>
                                            <span>Just Now</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown">
                            <i class="fa fa-envelope-o dropdown-toggle" data-toggle="dropdown"><span>3</span></i>
                            <div class="dropdown-menu notify-box nt-enveloper-box">
                                <span class="notify-title">You have 3 new notifications <a href="#">view all</a></span>
                                <div class="nofity-list">
                                    <a href="#" class="notify-item">
                                        <div class="notify-thumb">
                                            <img src="/layouts/systemAdmin/images/author/author-img3.jpg" alt="image">
                                        </div>
                                        <div class="notify-text">
                                            <p>Aglae Mayer</p>
                                            <span class="msg">Hey I am waiting for you...</span>
                                            <span>3:15 PM</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </li>
                        <li class="settings-btn">
                            <i class="ti-settings"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-title-area">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="breadcrumbs-area clearfix">
                        <h4 class="page-title pull-left">@yield('title')</h4>
                        <ul class="breadcrumbs pull-left">
                            <li><a href="/">Trang chủ</a></li>
                            <li><span>@yield('title')</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 clearfix">
                    <div class="user-profile pull-right">
                        <img class="avatar user-thumb" src="/layouts/systemAdmin/images/author/avatar.png" alt="avatar">
                        <h4 class="user-name dropdown-toggle" data-toggle="dropdown">Xuân Nam <i class="fa fa-angle-down"></i></h4>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Message</a>
                            <a class="dropdown-item" href="#">Settings</a>
                            <a class="dropdown-item" href="#">Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
