<div class="document-topBody">
    <div class="form-search-doc">
        @if($currentPage == "documentDepartment")
            @php
                $departmentId = App\Models\DepartmentUser::select('id')->where('user_id', Auth::user()->id)->first()->id;
                $departments = App\Models\Department::where('id', '!=', $departmentId)->pluck('name', 'id');
            @endphp
        @elseif($currentPage == "personalDocument")
            @php
                $departments = App\Models\Department::pluck('name', 'id');
            @endphp
        @endif
        {!! Form::open(['class'=>'form-inline form-search', 'route'=>'search-document']) !!}
            <div class="form-group mx-sm-3 mb-2">
                <div  class="input-group date">
                    {!! Form::text('date_start', '', ['data-date-format'=>'dd-mm-yyyy', 'class'=>'form-control date-area', 'readonly', 'id'=>'datepicker', 'placeholder'=>'Ngày bắt đầu...']) !!}
                    <span style="background-color: #fff;width: 2%;" class="input-group-addon"></span>
                </div>
                <div class="input-group date">
                    {!! Form::text('date_end', '', ['data-date-format'=>'dd-mm-yyyy', 'class'=>'form-control date-area', 'readonly', 'id'=>'datepicker2', 'placeholder'=>'Ngày kết thúc...']) !!}
                    <span style="background-color: #fff;width: 2%;" class="input-group-addon"></span>
                </div>
                @if($currentPage == "documentDepartment" || $currentPage == "personalDocument")
                {!! Form::select('department', $departments, '', ['class'=>'form-control', 'style'=>'min-width: 13em']) !!}
                @endif
                {!! Form::hidden('page', $currentPage) !!}
                {!! Form::text('search', '', ['class'=>'form-control input-search', 'placeholder'=>'Nhập trích yếu tìm kiếm...']) !!}
            </div>
            <button type="submit" class="btn btn-primary mb-2">Tìm kiếm</button>
        {!! Form::close() !!}
    </div>
</div>
