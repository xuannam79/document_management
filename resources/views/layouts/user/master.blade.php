<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link rel="shortcut icon" href="favicon.ico" />
    {{ Html::style(asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css')) }}
    {{ Html::style(asset('/templates/user/css/bootstrap.min.css')) }}
    {{ Html::style(asset('/templates/user/css/style.css')) }}
    {{ Html::style(asset('/templates/user/css/styles.css')) }}
    {{ Html::style(asset('/templates/user/css/datepicker.css')) }}
    {{ Html::script(asset('/templates/user/js/jquery-3.2.1.slim.min.js')) }}
    {{ Html::script(asset('/templates/user/js/popper.min.js')) }}
    {{ Html::style(asset('/css/all.css')) }}
    {{ Html::script(asset('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css')) }}
    {{ Html::style(asset('https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css')) }}
    </head>
    <body class="landing-page">
        <div class="page-wrapper">
            @include('layouts.user.header')
            <section class="cards-section text-center">
                @include('layouts.user.sidebar')
                @yield('content')
            </section>
        </div>
        @include('layouts.user.footer')
    {{ Html::script(asset('/templates/user/js/jquery-3.3.1.min.js')) }}
    {{ Html::script(asset('/templates/user/js/bootstrap.min.js')) }}
    {{ Html::script(asset('/templates/user/js/stickyfill.min.js')) }}
    {{ Html::script(asset('/templates/user/js/main.js')) }}
    {{ Html::script(asset('/templates/user/js/myStyle.js')) }}
    {{ Html::script(asset('/templates/user/js/bootstrapdatepick.min.js')) }}
    {{ Html::script(asset('/templates/user/js/bootstrap-datepicker.js')) }}
    {{ Html::script(asset('/js/all.js')) }}
    {{ Html::script(asset('/js/app.js')) }}
    {{ Html::script(asset('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js')) }}
    {{ Html::script(asset('https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js')) }}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.7/dist/css/bootstrap-select.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.7/dist/js/bootstrap-select.min.js"></script>
    </body>
</html>


