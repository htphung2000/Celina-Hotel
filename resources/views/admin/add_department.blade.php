@extends('admin.layout')
@section('admin_contents')
    <form method="POST" action="/admin/department/add" class="py-5 pl-5" enctype="multipart/form-data">
        @csrf
        <h3 class="text-warning text-center pb-3 col-md-9">Thêm chi nhánh</h3>
        @if(Session::get('message'))
        <div class="text-danger text-center p-2 mb-4 col-md-9" style="background: #FFE4B5;">
            <strong>{{Session::get('message')}}</strong>
        </div>
        @endif
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Tên chi nhánh</b></div>
            <div class="col-md-6">
                <input id="DPM_Name" type="text" class="form-control" name="DPM_Name" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Số điện thoại</b></div>
            <div class="col-md-6">
                <input id="DPM_Phone" type="text" class="form-control" name="DPM_Phone" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Địa chỉ</b></div>
            <div class="col-md-6">
                <input id="DPM_Address" type="text" class="form-control" name="DPM_Address" required>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-warning text-center text-white border-white">Thêm</button>
            </div>
        </div>
    </form>
@endsection