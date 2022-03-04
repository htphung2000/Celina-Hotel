@extends('master')
@section('content')
<div class="form-group row align-items-stretch pt-3">
    <div class="col-md-3 col-sm-6 text-center border-right border-warning">
        <div class="pb-3">
            <img src="{{Session::get('Customer_Avatar')}}" class="img logo rounded-circle" width="80px" height="80px">
        </div>
        <ul class="list-unstyled py-5">
            <li><a href="/personal" >Thông tin cá nhân</a></li>
            <hr class="bg-light">
            <li><a href="/history" >Lịch sử đặt phòng</a></li>
            <hr>
        </ul>
    </div>
    <div class="col-md-9 col-sm-6">
        <h3 class="text-warning text-center">Thông tin cá nhân</h3>
        <hr><hr>
        @if(Session::get('Message') != null)
        <div class="alert alert-warning" role="alert">
            {{Session::get('Message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> 
        <?php
            Session::put('Message', null);
        ?>
        @endif

        <div class="form-group row">
            <div class="col-md-4 text-md-right">Họ và tên :</div>
            <div class="col-md-6">{{Session::get('Customer_Name')}}</div>
        </div>
        <div class="form-group row">
            <div class="col-md-4 text-md-right">Ngày sinh :</div>
            <div class="col-md-6">{{Session::get('Customer_DoB')}}</div>
        </div>
        <div class="form-group row">
            <div class="col-md-4 text-md-right">Giới tính :</div>
            <div class="col-md-6">{{Session::get('Customer_Gender')}}</div>
        </div>
        <div class="form-group row">
            <div class="col-md-4 text-md-right">Số điện thoại :</div>
            <div class="col-md-6">{{Session::get('Customer_Phone')}}</div>
        </div>
        <div class="form-group row">
            <div class="col-md-4 text-md-right">Email :</div>
            <div class="col-md-6">{{Session::get('Customer_Mail')}}</div>
        </div>
        <div class="form-group row">
            <div class="col-md-4 text-md-right">Địa chỉ :</div>
            <div class="col-md-6">{{Session::get('Customer_Address')}}</div>
        </div>

        <div class="text-center">
            <a href="/personal/update" type="button" class="btn btn-warning text-center text-white border-white">Cập nhật</a>
        </div>
    </div>
</div>
@endsection