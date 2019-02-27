@extends('layouts.systemAdmin.master')
@section('title')
    Sửa phòng ban
@endsection
@section('content')
<div class="main-content-inner">
    <div class="row">
        <div class="col-lg-6 col-ml-12">
            <div class="row">
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <form>
                                <label for="exampleInputEmail1">Tên phòng ban</label>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" placeholder="Nhập tên phòng ban">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Sửa</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
