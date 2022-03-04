@extends('admin.layout')
@section('admin_contents')
<div class="row pt-3">
    @foreach ($Employee as $Emp)
    <div class="col-lg-4 py-2">
        <img src="{{$Emp->Avatar}}" class="img-thumbnail" height="200px" width="300px">
    </div>
    <div class="col-lg-8 py-2">
        <h4 class="text-warning">{{$Emp->Fullname}}</h4>

        @foreach($Admin as $Ad)
        @if($Ad->ID_Admin == $Emp->ID_Employee)
        <span class="text-primary">Admin</span>
        <br>
        @endif
        @endforeach
        <br>

        <div class="form-group row">
            <div class="col-md-3 text-right">Mã nhân viên: </div>
            <div class="col-md-9">{{$Emp->ID_Employee}}</div>
            <div class="col-md-3 text-right">Ngày sinh: </div>
            <div class="col-md-9">{{$Emp->DoB}}</div>
            <div class="col-md-3 text-right">Giới tính: </div>
            <div class="col-md-9">{{$Emp->Gender}}</div>
            <div class="col-md-3 text-right">Số điện thoại: </div>
            <div class="col-md-9">{{$Emp->Phone}}</div>
            <div class="col-md-3 text-right">Email: </div>
            <div class="col-md-9">{{$Emp->Mail}}</div>
            <div class="col-md-3 text-right">Địa chỉ: </div>
            <div class="col-md-9">{{$Emp->Address}}</div>
            <div class="col-md-3 text-right">Thuộc chi nhánh: </div>
            <div class="col-md-9">{{$Emp->DPM_Name}}</div>
            <div class="col-md-3 text-right">Chức vụ: </div>
            <div class="col-md-9">{{$Emp->Position}}</div>
            <div class="col-md-3 text-right">Mức lương cơ bản: </div>
            <div class="col-md-9">{{$Emp->Sal}}</div>
            <div class="col-md-3 text-right">Phụ cấp: </div>
            <div class="col-md-9">{{$Emp->Allowance}} %</div>
        </div>
        <a href="/admin/employee/{{$Emp->ID_Employee}}/update"><button type="button" name="edit_employee" class="btn btn-primary active">Chỉnh sửa thông tin</button></a>&nbsp;
    </div>
    @endforeach
</div>
@endsection