@extends('layouts.user.master')
@section('title')
Tạo mới văn bản
@endsection
@section('content')
<div class="container">
    <div id="cards-wrapper" class="cards-wrapper row">
        <div class="create-doc">
            <form>
                <div class="form-group" style="width: 45%;float: left;margin-right: 5%;margin-left: 2%">
                    <label for="exampleInputEmail1">Số công văn</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập số công văn">
                </div>
                <div class="form-group" style="width: 45%;float:left">
                    <label for="exampleFormControlSelect1">Loại văn bản</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                      <option>1</option>
                      <option>5</option>
                    </select>
                </div>
                <div class="form-group" >
                    <label for="exampleInputEmail1">Ngày ban hành</label>
                    <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                        <input class="form-control" type="text" readonly />
                        <span style="background-color: #fff;width: 7%;" class="input-group-addon"><i class="fa fa-calendar" style="font-size: 20px;margin-top: 9px;"></i></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Trích yếu nội dung</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">File đính kèm</label>
                    <input type="file" class="form-control-file" multiple id="exampleFormControlFile1" style="width: 50%;margin-left: 33%;">
                </div>
                <div class="form-group" style="width: 35%;margin-left: 2%">
                    <input type="email" class="form-control live-search-box" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tìm kiếm đơn vị...">
                </div>
                <div class="col-lg-5 col-sm-5 col-xs-12 float-left">
                    <select name="from" id="multiselect" class="form-control" size="8" multiple="multiple">
                        <option value="3">Item 3</option>
                        <option value="3"> Vũ</option>                      
                        <option value="3"> vŨ</option>                      
                        <option value="3"> Vũ</option>                      
                    </select>
                </div>
            
                <div class="multiselect-controls col-lg-2 col-sm-2 col-xs-12 float-left">
                    <button type="button" id="multiselect_rightAll" class="btn btn-block"><i class="fa fa-forward"></i></button>
                    <button type="button" id="multiselect_rightSelected" class="btn btn-block"><i class="fa fa-chevron-right"></i></button>
                    <button type="button" id="multiselect_leftSelected" class="btn btn-block"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" id="multiselect_leftAll" class="btn btn-block"><i class="fa fa-backward"></i></button>
                </div>
            
                <div class="col-lg-5 col-sm-5 col-xs-12 float-left">
                    <select name="to" id="multiselect_to" class="form-control" size="8" multiple="multiple"></select>
                </div>
                <div class="clear"></div><br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
