@extends('layouts.user.master')
@section('title')
    Danh Sách Tài Sản Của {{ $departments }}
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-ml-12">
                @include('common.errors')
                <div class="card-header py-3" style="margin-bottom: 5px;">
                    <h6 class="m-0 font-weight-bold text-primary">Danh Sách Tài Sản</h6>
                </div>
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>Tên tài sản</th>
                        <th>Ảnh</th>
                        <th>Số lượng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($infrastructure as $value)
                        <tr>
                            <td>{{ $value->name }}</td>
                            <td><img src="/upload/images/{{ $value->picture }}" class="img-preview2"></td>
                            <td style="text-align: center">{{ $value->amount }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
