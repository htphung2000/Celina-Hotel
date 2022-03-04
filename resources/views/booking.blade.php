@extends('master')
@section('content')
<div class="container">
    <h3 class="text-center text-warning py-2">Đặt phòng</h3>
    <hr class="bg-warning"/>
    @if(Session::get('Message'))
        <div class="alert alert-warning" role="alert">
            {{Session::get('Message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <?php
                    Session::put('Message', null);
                ?>
            </button>
        </div> 
    @endif
</div>

<form method="post" action="/booking" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="_method" value="POST" />
    <div class="form-group row offset-md-1 pl-md-5">
        <div class="col-md-3 col-sm-2">
            <ul class="list-unstyled">
                <li><label class="text-left">Chi nhánh</label></li>
                <li>
                    <select name="select-department" class="form-control">
                        @foreach($Departments as $Dpm)
                        <option value="{{$Dpm->DPM_Name}}">{{$Dpm->DPM_Name}}</option>
                        @endforeach
                    </select>
                </li>
            </ul>
        </div>
        <div class="col-md-2 col-sm-2">
            <ul class="list-unstyled">
                <li><label class="text-left">Ngày nhận phòng</label></li>
                <li><input type="date" name="start" id="start" value="Check-in" class="form-control"></li>
            </ul>
        </div>
        <div class="col-md-2 col-sm-2">
            <ul class="list-unstyled">
                <li><label class="text-left">Ngày trả phòng</label></li>
                <li><input type="date" name="end" id="end" value="Check-out" class="form-control"></li>
            </ul>
        </div>
        <div class="col-md-2 col-sm-2">
            <ul class="list-unstyled">
                <li><label class="text-left">Loại phòng</label></li>
                <li>
                    <select name="select-room-type" class="form-control">
                        @foreach($Types as $Tp)
                        <option value="{{$Tp->ID_Type}}">{{$Tp->Type_Name}}</option>
                        @endforeach
                    </select>
                </li>
            </ul>
        </div>
        <div class="col-md-2 col-sm-2">
            <ul class="list-unstyled">
                <li><label class="text-dark">.</label></li>
                <li><button type="submit" name="search" class="btn btn-warning border border-white text-white">Tìm kiếm</button></li>
            </ul>
        </div>
    </div>
</form>

<div class="container">
    <div class="form-group row">
        @foreach($Types as $Type)
        <div class="col-md-4 col-sm-6 py-3 text-center">
            <img src="{{$Type->Image}}" class="img" width="300px" height="200px">
        </div>
        <div class="col-md-5 col-sm-6 py-3">
            <ul class="list-unstyled">
                <li><h3 class="text-warning">{{$Type->Type_Name}}</h3></li>
                <br>
                <li>{{$Type->Describe}}</li>
                <hr class="bg-light">
                <li><i class="fas fa-wifi"></i> &nbsp; <i class="fas fa-tv"></i> &nbsp; <i class="far fa-snowflake"></i> &nbsp; <i class="fas fa-phone"></i></li>
            </ul>
        </div>
        <div class="col-md-3 col-sm-6 py-3">
            <h3 class="text-center pt-5">{{number_format($Type->Price)}}  <sup>đ</sup> / <sub>ngày</sub></h3>
        </div>
        @endforeach
    </div>
</div>


@endsection