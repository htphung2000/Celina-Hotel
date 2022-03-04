@extends('admin.layout')
@section('admin_contents')
    @foreach($Departments as $dpm)
    <form method="POST" action="/admin/department/{{$dpm->ID_Department}}/update" class="py-5" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="POST" />
        <h3 class="text-warning text-center pb-3 col-md-9">Chỉnh sửa chi nhánh</h3>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Mã chi nhánh</b></div>
            <div class="col-md-6 col-form-label text-md-left">{{$dpm->ID_Department}}</div>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Tên chi nhánh</b></div>
            <div class="col-md-6">
                <input id="DPM_Name" type="text" class="form-control" name="DPM_Name" value="{{$dpm->DPM_Name}}" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Số điện thoại</b></div>
            <div class="col-md-6">
                <input id="DPM_Phone" type="text" class="form-control" name="DPM_Phone" value="{{$dpm->DPM_Phone}}" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Địa chỉ</b></div>
            <div class="col-md-6">
                <input id="DPM_Address" type="text" class="form-control" name="DPM_Address" value="{{$dpm->DPM_Address}}" required>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-warning text-center text-white border-white">Cập nhật</button>
            </div>
        </div>
    </form>
    @endforeach
@endsection