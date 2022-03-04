@extends('admin.layout')
@section('admin_contents')
    <form method="POST" action="/admin/room/add" class="py-5 pl-5" enctype="multipart/form-data">
        @csrf
        <h3 class="text-warning text-center pb-3 col-md-9">Thêm phòng</h3>

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
            <div class="col-md-2 col-form-label text-md-right"><b>Số phòng</b></div>
            <div class="col-md-6">
                <input id="ID_Room" type="text" class="form-control" name="ID_Room" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Chi nhánh</b></div>
            <select class="col-md-4 form-control ml-3" name="Select_Department">
                @foreach($Department as $Dpm)
                    <option value="{{$Dpm->DPM_Name}}">{{$Dpm->DPM_Name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Loại phòng</b></div>
            <select class="col-md-4 form-control ml-3" name="Select_Type">
                @foreach($Type as $Tp)
                    <option value="{{$Tp->Type_Name}}">{{$Tp->Type_Name}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-warning text-center text-white border-white">Thêm</button>
            </div>
        </div>
    </form>
@endsection