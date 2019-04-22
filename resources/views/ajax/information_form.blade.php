@php
    $id = \App\Models\DepartmentUser::where('user_id', Auth::user()->id)->first();
    $department = \App\Models\Department::where('id', $id->department_id)->first();
    $position = \App\Models\Position::where('id', $id->position_id)->first();
@endphp
{!! Form::open(['method'=>'POST', 'route'=>['update.information']]) !!}
<h4>
    {!! Form::text('name',  Auth::user()->name, ['class' => 'form-control', 'placeholder' => "Nhập Tên Thành Viên", 'id' => 'name', 'required' => 'required', 'pattern' => config('setting.patter_fullname'),  'title' => 'Họ tên chỉ bao gồm chữ cái và phải tối thiểu 6 kí tự']) !!}
</h4>
<span> {{ $position->name }} - {{ $department->name }}</span>
<br/>
<br/>
<p>
    <i class="fa fa-birthday-cake icon-margin-right"></i>
    @php
        $phpdate = strtotime( Auth::user()->birth_date);
        $mysqldate = date( 'Y-m-d', $phpdate );
    @endphp
    {{ Form::date('birth_date', $mysqldate, ['class' => 'form-control css-profile-input', 'max' => \Carbon\Carbon::now()->subYear(19)->format('Y-m-d'), 'min' => \Carbon\Carbon::now()->subYear(100)->format('Y-m-d')]) }}
    <br />
    <i class="fa fa-venus-mars icon-margin-right"></i>
        {!! Form::select('gender' , [config('setting.gender.male') => 'Nam', config('setting.gender.female') => 'Nữ'], Auth::user()->gender, ['class' => 'form-control css-profile-input', 'id' => 'gender']) !!}
    <br />
    <i class="fa fa-map-marker icon-margin-right" style="width: 15px;"></i>
    {!! Form::text('address', Auth::user()->address, ['class' => 'form-control css-profile-input', 'placeholder' => "Nhập Địa Chỉ", 'id' => 'address', 'required' => 'required', 'pattern' => config('setting.patter_address'),  'title' => 'địa chỉ bao gồm chữ và số']) !!}
    <br />
    <i class="fa fa-phone icon-margin-right" style="width: 15px;"></i>
    {!! Form::text('phone', Auth::user()->phone, ['class' => 'form-control css-profile-input', 'placeholder' => "Nhập Số Điện Thoại", 'id' => 'phone', 'required' => 'required', 'pattern' => '[0][0-9]{9}',  'title' => 'số điện thoại chỉ gồm số và bắt đầu bằng số 0 , gồm 10 số.']) !!}
    <br />
</p>
<div class="button-profile">
    {!! Form::submit("Lưu Thay Đổi", ['class' => 'btn btn-primary']) !!}
</div>
{!! Form::close() !!}
