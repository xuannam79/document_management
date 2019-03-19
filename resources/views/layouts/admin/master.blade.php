<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    {{ Html::style(asset('/templates/admin/vendor/fontawesome-free/css/all.min.css')) }}
    {{ Html::style(asset('/templates/admin/css/sb-admin-2.min.css')) }}
    {{ Html::style(asset('/templates/admin/vendor/fontawesome-free/css/css.css')) }}
    {{ Html::style(asset('/templates/admin/vendor/datatables/dataTables.bootstrap4.min.css')) }}

</head>

<body id="page-top">
    <div id="wrapper">
        @include('layouts.admin.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('layouts.admin.header')
                <!-- Main Content -->
                    @yield('content')
                <!-- End of Main Content -->
            </div>
            @include('layouts.admin.footer')
        </div>
    </div>
</body>

    {{ Html::script(asset('/templates/admin/vendor/jquery/jquery.min.js')) }}
    {{ Html::script(asset('/templates/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')) }}
    {{ Html::script(asset('/templates/admin/vendor/jquery-easing/jquery.easing.min.js')) }}
    {{ Html::script(asset('/templates/admin/js/sb-admin-2.min.js')) }}
    {{ Html::script(asset('/templates/admin/vendor/datatables/jquery.dataTables.min.js')) }}
    {{ Html::script(asset('/templates/admin/vendor/datatables/dataTables.bootstrap4.min.js')) }}
    {{ Html::script(asset('/templates/admin/js/demo/datatables-demo.js')) }}

</html>
