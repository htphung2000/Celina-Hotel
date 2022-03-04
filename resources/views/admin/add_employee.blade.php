@extends('admin.layout')
@section('admin_contents')
<form method="POST" action="/employee/add" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="POST" />
    <h3 class="text-warning text-center pb-1 col-md-9">Thêm nhân viên</h3>

    @if(Session::get('message') != null)
    <div class="form-group row">
        <div class="col-md-9 alert alert-warning" role="alert">
            {{Session::get('message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <?php
                    Session::put('message', null);
                ?>
            </button>
        </div>
    </div>
    @endif

    <div class="form-group row">
        <div class="col-md-2 col-form-label text-md-right"><b>Họ tên nhân viên</b></div>
        <div class="col-md-6">
            <input id="Fullname" type="text" class="form-control" name="Fullname" >
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2 col-form-label text-md-right"><b>Ngày sinh</b></div>
        <div class="col-md-6">
            <input id="DoB" type="date" class="form-control" name="DoB" >
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2 col-form-label text-md-right"><b>Giới tính</b></div>
        <select class="col-md-3 form-control ml-3" name="Select_Gender">
            <option value="Nam" >Nam</option>
            <option value="Nữ" >Nữ</option>
        </select>
    </div>
    <div class="form-group row">
        <div class="col-md-2 col-form-label text-md-right"><b>Số điện thoại</b></div>
        <div class="col-md-6">
            <input id="Phone" type="text" class="form-control" name="Phone" >
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2 col-form-label text-md-right"><b>Email</b></div>
        <div class="col-md-6">
            <input id="Mail" type="text" class="form-control" name="Mail" >
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2 col-form-label text-md-right"><b>Địa chỉ</b></div>
        <div class="col-md-6">
            <input id="Address" type="text" class="form-control" name="Address" >
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2 col-form-label text-md-right"><b>Chi nhánh</b></div>
        <select class="col-md-4 form-control ml-3" name="Select_Department">
            @foreach($Departments as $Dpm)
            <option value="{{$Dpm->ID_Department}}">{{$Dpm->DPM_Name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group row">
        <div class="col-md-2 col-form-label text-md-right"><b>Chức vụ</b></div>
        <select class="col-md-4 form-control ml-3" name="Select_Position">
            @foreach($Salaries as $Sal)
            <option value="{{$Sal->ID_Position}}" >{{$Sal->Position}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group row">
        <div class="col-md-2 col-form-label text-md-right"><b>Ảnh</b></div>
        <div class="col-md-6">
            <input id="Avatar" type="file" class="form-control" name="Avatar" >
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-9 text-center">
            <button type="submit" class="btn btn-warning text-center text-white border-white">Thêm</button>
        </div>
    </div>
</form>

@endsection