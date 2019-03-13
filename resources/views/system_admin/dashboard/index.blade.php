@extends('layouts.system_admin.master')
@section('title')
    Trang chủ
@endsection
@section('content')
<div class="main-content-inner">
    <div class="sales-report-area mt-5 mb-5"></div>
    <div class="row">
        <div class="col-xl-9 col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="header-title mb-0">Overview</h4>
                        <select class="custome-select border-0 pr-3">
                            <option selected>Last 24 Hours</option>
                            <option value="0">01 July 2018</option>
                        </select>
                    </div>
                    <div id="verview-shart"></div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-4 coin-distribution">
            <div class="card h-full">
                <div class="card-body">
                    <h4 class="header-title mb-0">Coin Distribution</h4>
                    <div id="coin_distribution"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
