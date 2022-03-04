@extends('admin.layout')
@section('admin_contents')
    @foreach($Employees as $Emp)
    <form method="POST" action="/admin/employee/{{$Emp->ID_Employee}}/update" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="POST" />
        <h3 class="text-warning text-center col-md-9">Chỉnh sửa thông tin nhân viên</h3>
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
                <input id="Fullname" type="text" class="form-control" name="Fullname" value="{{$Emp->Fullname}}" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Ngày sinh</b></div>
            <div class="col-md-6">
                <input id="DoB" type="date" class="form-control" name="DoB" value="{{$Emp->DoB}}" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Giới tính</b></div>
            <select class="col-md-3 form-control ml-3" name="Select_Gender">
                <option value="Nam"  @if($Emp->Gender == "Nam") {{'selected="selected"'}} @endif>Nam</option>
                <option value="Nữ" @if($Emp->Gender == "Nữ") {{'selected="selected"'}} @endif>Nữ</option>
            </select>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Số điện thoại</b></div>
            <div class="col-md-6">
                <input id="Phone" type="text" class="form-control" name="Phone" value="{{$Emp->Phone}}" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Email</b></div>
            <div class="col-md-6">
                <input id="Mail" type="text" class="form-control" name="Mail" value="{{$Emp->Mail}}" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Địa chỉ</b></div>
            <div class="col-md-6">
                <input id="Address" type="text" class="form-control" name="Address" value="{{$Emp->Address}}" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Chi nhánh</b></div>
            <select class="col-md-4 form-control ml-3" name="Select_Department">
                @foreach($Departments as $Dpm)
                <option value="{{$Dpm->ID_Department}}"  @if($Emp->ID_Dpm == $Dpm->ID_Department) {{'selected="selected"'}} @endif>{{$Dpm->DPM_Name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Chức vụ</b></div>
            <select class="col-md-4 form-control ml-3" name="Select_Position">
                @foreach($Salaries as $Sal)
                <option value="{{$Sal->ID_Position}}"  @if($Emp->Position_Emp == $Sal->ID_Position) {{'selected="selected"'}} @endif>{{$Sal->Position}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Ảnh</b></div>
            <div class="col-md-6">
                <input id="Avatar" type="file" class="form-control" name="Avatar" value="{{$Emp->Avatar}}">
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-9 text-center">
                <button type="submit" class="btn btn-warning text-center text-white border-white">Cập nhật</button>
            </div>
        </div>
    </form>
    @endforeach
@endsection