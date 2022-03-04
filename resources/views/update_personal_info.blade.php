@extends('master')
@section('content')
<div class="form-group row align-items-stretch pt-3">
    <div class="col-md-3 col-sm-6 text-center border-right border-warning">
        <div class="pb-3">
            <img src="{{Session::get('Customer_Avatar')}}" class="img logo rounded-circle" width="80px" height="80px">
        </div>
        <ul class="list-unstyled py-5">
            <li><a href="/personal" >Thông tin cá nhân</a></li>
            <hr class="bg-light" />
            <li><a href="/history" >Lịch sử đặt phòng</a></li>
            <hr />
        </ul>
    </div>
    <div class="col-md-9 col-sm-6">
        <h3 class="text-warning text-center">Thông tin cá nhân</h3>
        <hr />
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
        <form method="POST" action="/personal/update" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="POST" />
            <div class="form-group row">
                <div class="col-md-4 col-form-label text-md-right">Họ và tên </div>
                <div class="col-md-6">
                    <input id="CTM_Name" type="text" class="form-control" name="CTM_Name" value="{{Session::get('Customer_Name')}}" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4 col-form-label text-md-right">Ngày sinh </div>
                <div class="col-md-6">
                    <input id="CTM_DoB" type="date" class="form-control" name="CTM_DoB" value="{{Session::get('Customer_DoB')}}" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4 col-form-label text-md-right">Giới tính </div>
                <select class="col-md-2 form-control ml-3" name="CTM_Gender">
                    <option value="Nam"  @if(Session::get('Customer_Gender') == "Nam") {{'selected="selected"'}} @endif>Nam</option>
                    <option value="Nữ" @if(Session::get('Customer_Gender') == "Nữ") {{'selected="selected"'}} @endif>Nữ</option>
                </select>
            </div>
            <div class="form-group row">
                <div class="col-md-4 col-form-label text-md-right">Số điện thoại </div>
                <div class="col-md-6">
                    <input id="CTM_Phone" type="text" class="form-control" name="CTM_Phone" value="{{Session::get('Customer_Phone')}}" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4 col-form-label text-md-right">Email </div>
                <div class="col-md-6">
                    <input id="CTM_Mail" type="text" class="form-control" name="CTM_Mail" value="{{Session::get('Customer_Mail')}}">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4 col-form-label text-md-right">Địa chỉ </div>
                <div class="col-md-6">
                    <input id="CTM_Address" type="text" class="form-control" name="CTM_Address" value="{{Session::get('Customer_Address')}}" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4 col-form-label text-md-right">Ảnh </div>
                <div class="col-md-6">
                    <input id="CTM_Avatar" type="file" class="form-control" name="CTM_Avatar" required>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-warning text-center text-white border-white">Cập nhật</button>
            </div>
        </form>
    </div>
</div>
@endsection