<header class="header text-center">
    <div class="container container-head">
        <div class="tagline">
            <p>Phân hiệu Trường Đại Học Nội Vụ Hà Nội tại tỉnh Quảng Nam</p>
        </div>
        <div class="branding">
            <h1 class="logo">
                <span aria-hidden="true" class="fa fa-file-text head-icon"></span>
                <span class="text-highlight">Hệ thống lưu trữ tài liệu</span>
            </h1>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse position-relative" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item cool-link">
                    <a class="nav-link" href="/">Trang chủ </a>
                </li>
                @php
                    $idDepartment = \App\Models\DepartmentUser::where('user_id', Auth::user()->id)->first();
                    $document_approval = \App\Models\Document::where(['department_id' => $idDepartment->department_id,'is_approved' =>  config('setting.approval.no_approved')])
                    ->get();
                    $countDocument = $document_approval->count();
                    $checkDocument = false;
                    if (auth()->user()->role == config('setting.roles.admin_department')){
                        if ($countDocument > 0){
                            $checkDocument = true;
                        }
                        else {
                            $checkDocument = false;
                        }
                    }
                @endphp
                <li class="nav-item cool-link dropdown {{ ($checkDocument == true)?"css-form-approval":"" }}">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Văn bản
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @if (auth()->user()->role == config('setting.roles.admin_department'))
                            <a class="dropdown-item" href="{{route('document.create')}}">Tạo mới văn bản</a>
                            <a class="dropdown-item" href="{{route('document-department.index')}}">Văn bản đến đơn vị</a>
                            <a class="dropdown-item {{ ($checkDocument == true)?"css-form-approval":"" }}" href="{{route('document-pending.index')}}">Văn bản đang chờ duyệt
                                @if($countDocument > 0)
                                    <span class="badge-pill badge-danger">{{ $countDocument }}</span>
                                @endif
                            </a>
                            <a class="dropdown-item" href="{{route('document-sent.index')}}">Văn bản đã gửi</a>
                        @else
                            <a class="dropdown-item" href="{{route('document-personal.index')}}">Văn bản đến cá nhân</a>
                        @endif
                    </div>
                </li>
                @if (auth()->user()->role == config('setting.roles.admin_department'))
                    <li class="nav-item cool-link dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Ủy quyền
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('delegacy.create') }}">Thêm ủy quyền</a>
                            <a class="dropdown-item" href="{{ route('delegacy.index') }}">Danh sách ủy quyền</a>
                        </div>
                    </li>
                    <li class="nav-item cool-link dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Đơn vị liên kết
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('collaboration-unit.index') }}">Danh sách đơn vị liên kết</a>
                            <a class="dropdown-item" href="{{ route('collaboration-unit.create') }}">Tạo mới đơn vị liên kết</a>
                            <a class="dropdown-item" href="{{ route('collaboration-unit-archived') }}">Đơn vị liên kết đã xóa</a>
                        </div>
                    </li>
                @endif
                <li class="nav-item cool-link">
                    <a class="nav-link" href="{{ route('schedule-admin.index') }}">Lịch tuần trường</a>
                </li>
                <li class="nav-item cool-link">
                    <a class="nav-link" href="{{ route('timetable.index') }}">Thời khóa biểu</a>
                </li>
                @php
                    $idDepartment = \App\Models\DepartmentUser::where('user_id', Auth::user()->id)->first();
                    $form = \App\Models\Form::where(['department_id' => $idDepartment->department_id, 'approved_by' =>  config('setting.approval.no_approved'), 'is_active' => config('setting.active.is_active')])
                    ->get();
                    $count = $form->count();
                    $checkForm = false;
                    if (auth()->user()->role == config('setting.roles.admin_department')){
                            if ($count > 0){
                                $checkForm = true;
                            }
                            else {
                                $checkForm = false;
                            }
                    }
                @endphp
                <li class="nav-item cool-link dropdown">
                    <a class="nav-link dropdown-toggle {{ ($checkForm == true)?"css-form-approval":"" }}" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Biểu mẫu
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @if (auth()->user()->role == config('setting.roles.user'))
                            <a class="dropdown-item" href="{{route('users-forms.index')}}">Danh sách biểu mẫu</a>
                        @elseif (auth()->user()->role == config('setting.roles.admin_department'))
                            <a class="dropdown-item" href="{{ route('forms.index') }}">Danh sách biểu mẫu</a>
                            <a class="dropdown-item" href="{{ route('forms.create') }}">Thêm biểu mẫu</a>
                            <a class="dropdown-item" href="{{ route('forms.archive') }}">Danh sách biểu mẫu đã bị xóa</a>
                            <a class="dropdown-item {{ ($checkForm == true)?"css-form-approval":"" }}" href="{{ route('forms.approval') }}">DS biểu mẫu chờ phê duyệt
                                @if($count > 0)
                                    <span class="badge-pill badge-danger">{{ $count }}</span>
                                @endif
                            </a>
                        @endif
                    </div>
                </li>
                <li class="nav-item cool-link">
                    @if (auth()->user()->role == config('setting.roles.user'))
                    <a class="nav-link" href="{{ route('infrastructure-user.index') }}">Tài sản</a>
                    @else
                    <a class="nav-link" href="{{ route('infrastructure.index') }}">Tài sản</a>
                    @endif
                </li>
            </ul>
            <ul class="navbar-nav position-login">
                @if(Auth::check())
                <li class="nav-item cool-link dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user"></i> {{Auth::user()->name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('profile') }}">Thông tin cá nhân</a>
                        <a class="dropdown-item" href="{{ route('login.create') }}">Đăng xuất</a>
                    </div>
                </li>
                @endif
            </ul>
        </div>
    </nav>
</header>
