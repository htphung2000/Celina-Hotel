@extends('master')
@section('content')
<div class="container">
    <h3 class="text-center text-warning pb-2">Hóa đơn đặt phòng</h3>
    <hr class="bg-warning"/>
    <br>
    <div class="form-group row">
        <div class="col-md-5 col-sm-6">
            <h4 class="text-center">{{$Ctm->CTM_Name}}</h4>
        </div>
        <div class="col-md-7 col-sm-6">
            <ul class="list-unstyled">
                <li>Số điện thoại: &nbsp; {{$Ctm->CTM_Phone}}</li>
                <li>Email: &nbsp; {{$Ctm->CTM_Mail}}</li>
                <li>Địa chỉ: &nbsp; {{$Ctm->CTM_Address}}</li>
            </ul>
        </div>
    </div>
    <br>

    <table class="table text-white">
        <thead class="bg-warning text-center">
            <tr>
                <th scope="col"></th>
                <th scope="col">Phòng</th>
                <th scope="col">Thông tin</th>
                <th scope="col">Số ngày</th>
                <th scope="col">Đơn giá</th>
                <th scope="col">Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach($Items as $Item)
            <tr>
                <th class="text-center">{{$loop->index + 1}}</th>
                <th class="text-center">
                    <h5 class="text-warning">{{$Item->ID_Room % 1000}}</h5>
                </th>
                <th>
                    <ul class="list-unstyled">
                        <li><h5 class="text-warning">{{$Item->DPM_Name}}</h5></li>
                        <li>Loại phòng: &nbsp; {{$Item->Type_Name}}</li>
                        <li>Ngày nhận phòng: &nbsp; {{$Item->Start}}<li>
                        <li>Ngày trả phòng: &nbsp; {{$Item->End}}</li>
                    </ul>
                </th>
                <th class="text-center">
                    <h5 class="text-warning">{{$Days[$loop->index]}}</h5>
                </th>
                <th class="text-center">
                    <h5 class="text-warning">{{number_format($Item->Price)}} đ / ngày</h5>
                </th>
                <th class="text-center">
                    <h4 class="text-primary">{{number_format($Days[$loop->index] * $Item->Price)}} đ</h4>
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>

    <nav class="navbar navbar-expand-md text-right pb-md-4">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <h5>Tổng tiền ({{$Items->count()}} phòng): &nbsp; <b class="text-primary" style="font-size: 30px;">{{ number_format($Total_Price) }} đ</b> </h5>
                <a href="/bill" type="button" class="btn btn-lg btn-danger ml-auto mt-2">Đặt phòng</a>
            </li>
        </ul>
    </nav>
</div>
@endsection