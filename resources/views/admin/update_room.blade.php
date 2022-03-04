@extends('admin.layout')
@section('admin_contents')
    @foreach($Room as $Rm)
    <form method="POST" action="/admin/room/{{$Rm->ID_Room}}/update" class="py-5" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="POST" />
        <h3 class="text-warning text-center pb-3 col-md-9">Chỉnh sửa phòng</h3>
        <div class="form-group row">
            <div class="col-md-3 col-form-label text-md-right"><b>Số phòng</b></div>
            <div class="col-md-6 col-form-label text-md-left">{{$Rm->ID_Room % 1000}}</div>
        </div>
        <div class="form-group row">
            <div class="col-md-3 col-form-label text-md-right"><b>Tên chi nhánh</b></div>
            <div class="col-md-6 col-form-label text-md-left">{{$Rm->DPM_Name}}</div>
        </div>
        <div class="form-group row">
            <div class="col-md-3 col-form-label text-md-right"><b>Loại phòng</b></div>
            <select class="col-md-4 form-control ml-3" name="Select_Type">
                @foreach($Type as $Tp)
                    <option value="{{$Tp->Type_Name}}" @if($Tp->Type_Name == $Rm->Type_Name) {{'selected="selected"'}} @endif>{{$Tp->Type_Name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-9 text-center">
                <button type="submit" class="btn btn-warning text-center text-white border-white">Cập nhật</button>
            </div>
        </div>
    </form>
    @endforeach
@endsection