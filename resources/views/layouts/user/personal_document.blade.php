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
    </head>
    <body class="landing-page">
        <div class="page-wrapper">
            @include('layouts.user.header')
            <section class="cards-section text-center">
				 <div class="item item-green col-lg-4 col-6" id="left-bar">

                    <div class="leftbar-pending-document">
                        <ul>
                            @if (auth()->user()->role == config('setting.roles.admin_department'))
                                @php
                                    $currentDepartmentId = DB::table('department_users')->where([
                                        'position_id' => 1,
                                        'user_id' => Auth::user()->id,
                                        'is_active' => config('setting.department_user.active')])->first()->department_id;
                                    $pendingDocumentsQuantity = count(DB::table('documents')
                                        ->join('document_department', 'documents.id', '=', 'document_department.document_id')
                                        ->join('users', 'users.id', '=', 'documents.user_id')
                                        ->where([
                                            'documents.department_id' => $currentDepartmentId,
                                            'document_department.is_approved' => config('setting.department_user.no_approved')])
                                        ->select('documents.*', 'users.name', 'document_department.sending_date')->get()
                                    );
                                @endphp
                                <a href="{{route('document-department.index')}}">
                                    <li>
                                        <i class="icon-leftbar fa fa-download"></i>&nbsp;
                                        Văn bản đến đơn vị
                                        <span class="count-new-document">5</span>
                                    </li>
                                </a>
                                <a href="{{route('document-sent.index')}}">
                                    <li>
                                            <i class="icon-leftbar fa fa-upload"></i>&nbsp;
                                            Văn bản đi
                                    </li>
                                </a>
                                <a href="{{route('document-pending.index')}}">
                                    <li>
                                        <i class="icon-leftbar fa fa-download"></i>&nbsp;
                                        Văn bản đang chờ duyệt
                                        @if($pendingDocumentsQuantity > 0)
                                            <span class="count-new-document">
                                                {{$pendingDocumentsQuantity}}
                                            </span>
                                        @endif
                                    </li>
                                </a>
                            @else
                                @php
                                    $personalUnSeenDocumentsQuantity = count(
                                        DB::table('document_user')->where(
                                            ['user_id' => Auth::user()->id,
                                            'is_seen' => config('setting.document_user.is_unseen')])
                                        ->get());
                                @endphp
                                <a href="{{route('document-personal.index')}}">
                                    <li>
                                        <i class="icon-leftbar fa fa-download"></i>&nbsp;
                                        Văn bản đến cá nhân
                                        @if($personalUnSeenDocumentsQuantity > 0)
                                            <span class="count-new-document">
                                                {{$personalUnSeenDocumentsQuantity}}
                                            </span>
                                        @endif
                                    </li>
                                </a>
                            @endif
                        </ul>
                    </div>
                </div>
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
    </body>
</html>


