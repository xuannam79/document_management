<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link rel="shortcut icon" type="image/png" href="/layouts/system_admin/images/icon/favicon.ico">

    {{ Html::style(asset('/layouts/system_admin/css/bootstrap.min.css')) }}
    {{ Html::style(asset('/layouts/system_admin/css/font-awesome.min.css')) }}
    {{ Html::style(asset('/layouts/system_admin/css/themify-icons.css')) }}
    {{ Html::style(asset('/layouts/system_admin/css/metisMenu.css')) }}
    {{ Html::style(asset('/layouts/system_admin/css/owl.carousel.min.css')) }}
    {{ Html::style(asset('/layouts/system_admin/css/slicknav.min.css')) }}
    {{ Html::style(asset('/layouts/system_admin/css/export.css')) }}

    {{ Html::style(asset('/layouts/system_admin/css/jquery.dataTables.css')) }}
    {{ Html::style(asset('/layouts/system_admin/css/dataTables.bootstrap4.min.css')) }}
    {{ Html::style(asset('/layouts/system_admin/css/responsive.bootstrap.min.css')) }}
    {{ Html::style(asset('/layouts/system_admin/css/responsive.jqueryui.min.css')) }}

    {{ Html::style(asset('/layouts/system_admin/css/typography.css')) }}
    {{ Html::style(asset('/layouts/system_admin/css/default-css.css')) }}
    {{ Html::style(asset('/layouts/system_admin/css/styles.css')) }}
    {{ Html::style(asset('/layouts/system_admin/css/responsive.css')) }}
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
    {{ Html::script(asset('/layouts/system_admin/js/vendor/modernizr-2.8.3.min.js')) }}
    {{ Html::script(asset('/layouts/system_admin/js/vendor/jquery-2.2.4.min.js')) }}
    {{ Html::script(asset('/layouts/system_admin/js/popper.min.js')) }}
    {{ Html::script(asset('/layouts/system_admin/js/bootstrap.min.js')) }}
    {{ Html::script(asset('/layouts/system_admin/js/owl.carousel.min.js')) }}
    {{ Html::script(asset('/layouts/system_admin/js/metisMenu.min.js')) }}
    {{ Html::script(asset('/layouts/system_admin/js/jquery.slimscroll.min.js')) }}
    {{ Html::script(asset('/layouts/system_admin/js/jquery.slicknav.min.js')) }}
    {{ Html::script(asset('/layouts/system_admin/js/Chart.min.js')) }}
    {{ Html::script(asset('/layouts/system_admin/js/zingcharts.min.js')) }}
    {{ Html::script(asset('/layouts/system_admin/js/hightcharts.js')) }}
    {{ Html::script(asset('/layouts/system_admin/js/adminjs.js')) }}
    {{ Html::script(asset('/layouts/system_admin/js/line-chart.js')) }}
    {{ Html::script(asset('/layouts/system_admin/js/pie-chart.js')) }}
    {{ Html::script(asset('/layouts/system_admin/js/jquery.dataTables.js')) }}
    {{ Html::script(asset('/layouts/system_admin/js/jquery.dataTables.min.js')) }}
    {{ Html::script(asset('/layouts/system_admin/js/dataTables.bootstrap4.min.js')) }}
    {{ Html::script(asset('/layouts/system_admin/js/dataTables.responsive.min.js')) }}
    {{ Html::script(asset('/layouts/system_admin/js/responsive.bootstrap.min.js')) }}
    {{ Html::script(asset('/layouts/system_admin/js/plugins.js')) }}
    {{ Html::script(asset('/layouts/system_admin/js/scripts.js')) }}
    {{ Html::script(asset('/layouts/system_admin/js/validate.js')) }}
</body>

</html>
