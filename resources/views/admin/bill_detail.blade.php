@extends('admin.layout')
@section('admin_contents')
<h3 class="text-warning text-center pb-1">Thông tin chi tiết đơn đặt phòng số {{$Bills->ID_Bill}}</h3>
<div class="form-group row py-1">
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

@if(Session::get('message') != null)
<div class="alert alert-warning" role="alert">
    {{Session::get('message')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <?php
            Session::put('message', null);
        ?>
    </button>
</div>
@endif

<div class="table-wrapper-scroll-y detail-scrollbar">
    <table class="table text-white">
        <thead class="bg-warning text-center">
            <tr>
                <th scope="col"></th>
                <th scope="col">Phòng</th>
                <th scope="col">Thông tin</th>
                <th scope="col">Số ngày</th>
                <th scope="col">Đơn giá</th>
                <th scope="col">Thành tiền</th>
                <th scope="col"></th>
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
                        <li>Ngày nhận phòng: &nbsp; {{$Item->Start_at}}<li>
                        <li>Ngày trả phòng: &nbsp; {{$Item->End_at}}</li>
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
                <th class="text-center">
                    @if($Item->Check_in == null)
                    <form method="POST" action="/admin/bill/check-in" class="py-5" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="POST" />
                        <input type="hidden" name="ID_Bill" value="{{$Bills->ID_Bill}}"/>
                        <input type="hidden" name="ID_Room" value="{{$Item->ID_Room}}"/>
                        <input type="hidden" name="Start_at" value="{{$Item->Start_at}}"/>
                        <button type="submit" class="btn btn-success text-white border-white">Nhận phòng</button>
                    </form>
                    @elseif($Item->Check_out == null)
                    <form method="POST" action="/admin/bill/check-out" class="py-5" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_method" value="POST" />
                        <input type="hidden" name="ID_Bill" value="{{$Bills->ID_Bill}}"/>
                        <input type="hidden" name="ID_Room" value="{{$Item->ID_Room}}"/>
                        <input type="hidden" name="Start_at" value="{{$Item->Start_at}}"/>
                        <button type="submit" class="btn btn-success text-white border-white">Trả phòng</button>
                    </form>
                    @endif
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<nav class="navbar navbar-expand-md text-right" style="background: none">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">Thời gian đặt: &nbsp; {{$Bills->created_at}}</li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <h5>Tổng tiền ({{$Items->count()}} phòng): &nbsp; <b class="text-primary" style="font-size: 30px;">{{ number_format($Bills->Total_price) }} đ</b> </h5>
        </li>
    </ul>
</nav>
@endsection