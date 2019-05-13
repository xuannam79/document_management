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
        {{ Html::style(asset('/templates/user/css/font-awesome.min.css')) }}
        {{ Html::style(asset('/templates/user/css/bootstrap.min.css')) }}
        {{ Html::style(asset('/templates/user/css/style.css')) }}
        {{ Html::style(asset('/templates/user/css/styles.css')) }}
        {{ Html::style(asset('/templates/user/css/datepicker.css')) }}
        {{ Html::script(asset('/templates/user/js/jquery-3.2.1.slim.min.js')) }}
        {{ Html::script(asset('/templates/user/js/popper.min.js')) }}
        {{ Html::style(asset('/css/all.css')) }}
        {{ Html::style(asset('templates/admin/vendor/fontawesome-free/css/all.min.css')) }}
        {{-- {{ Html::style(asset('/templates/user/css/bootstrap.css')) }} --}}
        {{ Html::style(asset('/templates/user/css/dataTables.bootstrap4.min.css')) }}
        {{ Html::style(asset('/templates/user/css/bootstrapselect.min.css')) }}
        {{ Html::style(asset('/templates/user/css/bootstrap-select-163.min.css')) }}
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
        {{ Html::script(asset('/js/all.js')) }}
        {{ Html::script(asset('/js/app.js')) }}
        {{ Html::style(asset('/templates/user/css/bootstrap-select.min.css')) }}
        {{ Html::script(asset('/templates/user/js/jquery.min.js')) }}
        {{ Html::script(asset('/templates/user/js/bootstrap-select-332.min.js')) }}
        {{ Html::script(asset('/templates/user/js/bootstrap-select.min.js')) }}
        {{ Html::script(asset('/templates/user/js/jquery.dataTables.min.js')) }}
        {{ Html::script(asset('/templates/user/js/dataTables.bootstrap4.min.js')) }}
        {{ Html::script(asset('/templates/user/datatable-js/vi.js')) }}
        {{ Html::script(asset('/templates/user/js/bootstrapdatepick.min.js')) }}
        {{ Html::script(asset('/templates/user/js/bootstrap-datepicker.js')) }}
    </body>
</html>
