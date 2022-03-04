@extends('master')
@section('content')
<div class="container">
    <h3 class="text-center text-warning py-2">Đặt phòng</h3>
    <hr class="bg-warning"/>
</div>

<form method="post" action="/booking" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="POST" />
    @csrf
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
                <li><input type="date" name="start" value="Check_in" class="form-control"></li>
            </ul>
        </div>
        <div class="col-md-2 col-sm-2">
            <ul class="list-unstyled">
                <li><label class="text-left">Ngày trả phòng</label></li>
                <li><input type="date" name="end" value="Check_out" class="form-control"></li>
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

<div class="container pt-3">
    <p class="text-center">Từ ngày {{$Start}} đến ngày {{$End}}</p>
    <table class="table text-white p-2">
        <thead class="bg-warning text-center">
            <tr>
                <th scope="col">Chi nhánh</th>
                <th scope="col">Số phòng</th>
                <th scope="col">Tầng</th>
                <th scope="col">Loại phòng</th>
                <th scope="col">Giá</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
                @if($Count_Room == $Count_Bill)
                <td class="text-center" colspan="6">Không tìm thấy phòng trống!</td>
                @else
                    @if($Count_Bill > 0)
                        @foreach($Rooms as $Room)
                            @foreach($Bills as $Bill)
                                @if($Bill->Room != $Room->ID_Room)
                                <form method="POST" action="/booking/search" class="py-5" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="_method" value="POST" />
                                    <input type="hidden" name="Room_ID" value="{{$Room->ID_Room}}">
                                    <input type="hidden" name="start" value="{{$Start}}">
                                    <input type="hidden" name="end" value="{{$End}}">
                                    <tr>
                                        <td>{{$Room->DPM_Name}}</td>
                                        <td class="text-center">{{$Room->ID_Room % 1000}}</td>
                                        <td class="text-center">{{ (($Room->ID_Room % 1000) - ($Room->ID_Room % 100)) / 100}}</td>
                                        <td>{{$Room->Type_Name}}</td>
                                        <td class="text-center">{{number_format($Room->Price)}} VND / ngày</td>
                                        <td class="text-center">
                                            <button type="submit" name="add-to-cart" class="btn btn-danger">Thêm vào giỏ</button>
                                        </td>
                                    </tr>
                                </form>
                                @endif
                            @endforeach
                        @endforeach
                    @else
                        @foreach($Rooms as $Room)
                        <form method="POST" action="/booking/search" class="py-5" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="_method" value="POST" />
                            <input type="hidden" name="Room_ID" value="{{$Room->ID_Room}}">
                            <input type="hidden" name="start" value="{{$Start}}">
                            <input type="hidden" name="end" value="{{$End}}">
                            <tr>
                                <td>{{$Room->DPM_Name}}</td>
                                <td class="text-center">{{$Room->ID_Room % 1000}}</td>
                                <td class="text-center">{{ (($Room->ID_Room % 1000) - ($Room->ID_Room % 100)) / 100}}</td>
                                <td>{{$Room->Type_Name}}</td>
                                <td class="text-center">{{$Room->Price}} VND / ngày</td>
                                <td class="text-center">
                                    <button type="submit" name="add-to-cart" class="btn btn-danger">Thêm vào giỏ</button>
                                </td>
                            </tr>
                        </form>
                        @endforeach
                    @endif
                @endif
        </tbody>
    </table>
</div>


@endsection