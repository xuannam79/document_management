@extends('layouts.user.master')
@section('title')
    Danh sách
@endsection
@section('content')
    <div class="container">
        <div id="cards-wrapper" class="cards-wrapper" style="margin-left: 30%;width: 70%;">
            <div class="css-profile">
                <div style="margin-bottom: 2%;margin-top: 2%;position: relative">
                    <div class="left-profile">
                        <img src="http://placehold.it/380x500" style="width: 100px" alt="" class="img-rounded img-responsive" />
                    </div>
                    <div class="right-profile">
                        <h4>{{ Auth::user()->name }}</h4>
                        <br/>
                        <p>
                            <i class="fa fa-envelope-open icon-margin-right"></i>{{ Auth::user()->email }}
                            <br />
                            <i class="fa fa-birthday-cake icon-margin-right"></i>{{ Auth::user()->birth_date }}
                            <br />
                            <i class="fa fa-genderless"></i> {{(Auth::user()->gender == config('setting.gender.male'))?"Nam":"Nu"}}
                            <br />
                            <i class="fa fa-address-card"></i>{{ Auth::user()->address }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
