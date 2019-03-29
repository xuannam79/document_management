<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Not found page</title>

    {{ Html::style(asset('/templates/admin/vendor/fontawesome-free/css/all.min.css')) }}
    {{ Html::style(asset('/templates/admin/css/sb-admin-2.min.css')) }}
    {{ Html::style(asset('/templates/admin/vendor/fontawesome-free/css/css.css')) }}
    {{ Html::style(asset('/templates/admin/vendor/datatables/dataTables.bootstrap4.min.css')) }}
    {{ Html::style(asset('/css/all.css')) }}

</head>

<body id="page-top">
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <div class="container-fluid">
                <!-- 404 Error Text -->
                    <div class="text-center">
                        <div class="error mx-auto" data-text="404">404</div>
                        <p class="lead text-gray-800 mb-5">Page Not Found</p>
                        <p class="text-gray-500 mb-0">It looks like you found a glitch in the matrix...</p>
                        <a href="{{ route('home-page') }}">&larr; Back to home</a>
                    </div>
                </div>
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
    {{ Html::script(asset('/js/all.js')) }}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.7/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.7/dist/js/bootstrap-select.min.js"></script>

</html>
