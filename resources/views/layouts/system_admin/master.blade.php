<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="/layouts/system_admin/images/icon/favicon.ico">
    <link rel="stylesheet" href="/layouts/system_admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="/layouts/system_admin/css/font-awesome.min.css">
    <link rel="stylesheet" href="/layouts/system_admin/css/themify-icons.css">
    <link rel="stylesheet" href="/layouts/system_admin/css/metisMenu.css">
    <link rel="stylesheet" href="/layouts/system_admin/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/layouts/system_admin/css/slicknav.min.css">
    <link rel="stylesheet" href="/layouts/system_admin/css/export.css" type="text/css" media="all" />

    <link rel="stylesheet" href="/layouts/system_admin/css/jquery.dataTables.css" type="text/css"/>
    <link rel="stylesheet" href="/layouts/system_admin/css/dataTables.bootstrap4.min.css" type="text/css"/>
    <link rel="stylesheet" href="/layouts/system_admin/css/responsive.bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="/layouts/system_admin/css/responsive.jqueryui.min.css" type="text/css"/>

    <link rel="stylesheet" href="/layouts/system_admin/css/typography.css">
    <link rel="stylesheet" href="/layouts/system_admin/css/default-css.css">
    <link rel="stylesheet" href="/layouts/system_admin/css/styles.css">
    <link rel="stylesheet" href="/layouts/system_admin/css/responsive.css">

</head>

<body>
<div id="preloader">
    <div class="loader"></div>
</div>
<div class="page-container">
    @include('layouts.system_admin.leftbar')

    <div class="main-content">
        @include('layouts.system_admin.header')
        @yield('content')
    </div>
    @include('layouts.system_admin.footer')
</div>
<script src="/layouts/system_admin/js/vendor/modernizr-2.8.3.min.js"></script>
<script src="/layouts/system_admin/js/vendor/jquery-2.2.4.min.js"></script>
<script src="/layouts/system_admin/js/popper.min.js"></script>
<script src="/layouts/system_admin/js/bootstrap.min.js"></script>
<script src="/layouts/system_admin/js/owl.carousel.min.js"></script>
<script src="/layouts/system_admin/js/metisMenu.min.js"></script>
<script src="/layouts/system_admin/js/jquery.slimscroll.min.js"></script>
<script src="/layouts/system_admin/js/jquery.slicknav.min.js"></script>
<script src="/layouts/system_admin/js/Chart.min.js"></script>
<script src="/layouts/system_admin/js/zingcharts.min.js"></script>
<script src="/layouts/system_admin/js/hightcharts.js"></script>
<script src="/layouts/system_admin/js/adminjs.js"></script>
<script src="/layouts/system_admin/js/line-chart.js"></script>
<script src="/layouts/system_admin/js/pie-chart.js"></script>
<script src="/layouts/system_admin/js/jquery.dataTables.js"></script>
<script src="/layouts/system_admin/js/jquery.dataTables.min.js"></script>
<script src="/layouts/system_admin/js/dataTables.bootstrap4.min.js"></script>
<script src="/layouts/system_admin/js/dataTables.responsive.min.js"></script>
<script src="/layouts/system_admin/js/responsive.bootstrap.min.js"></script>
<script src="/layouts/system_admin/js/plugins.js"></script>
<script src="/layouts/system_admin/js/scripts.js"></script>
<script src="/layouts/system_admin/js/validate.js"></script>

</body>

</html>
