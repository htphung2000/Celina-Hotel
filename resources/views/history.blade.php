@extends('master')
@section('content')
<div class="form-group row align-items-stretch pt-3">
    <div class="col-md-3 col-sm-6 text-center border-right border-warning">
        <div class="pb-3">
            <img src="{{Session::get('Customer_Avatar')}}" class="img logo rounded-circle" width="80px" height="80px">
        </div>
        <ul class="list-unstyled py-5">
            <li><a href="/personal" >Thông tin cá nhân</a></li>
            <hr class="bg-light">
            <li><a href="/history" >Lịch sử đặt phòng</a></li>
            <hr>
        </ul>
    </div>
    <div class="col-md-9 col-sm-6">
        @if(Session::get('Message') != null)
        <div class="alert alert-warning" role="alert">
            {{Session::get('Message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> 
        <?php
            Session::put('Message', null);
        ?>
        @endif
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="booked-tab" data-toggle="tab" href="#booked" role="tab" aria-controls="home" aria-selected="true">Đã đặt</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="profile" aria-selected="false">Hoàn thành</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="booked" role="tabpanel" aria-labelledby="booked-tab">
                <hr>
                @if($Bills->count() == 0)
                    <p class="text-center">Bạn chưa đặt phòng nào!</p>
                    <div class="text-center"><a href="/booking" class="btn btn-danger">Đặt phòng</a> </div>
                @else
                    @foreach($Bills as $Bill)
                        @if($Bill->Status == 'Đã đặt')
                        <div class="form-group row">
                            <div class="col-md-5">
                                <h4 class="text-warning">Đơn đặt phòng số {{$Bill->ID_Bill}}</h4>
                                <p>Trạng thái: &nbsp; {{$Bill->Status}}</p>
                            </div>
                            <div class="col-md-4">
                                <h4 class="text-warning text-center">{{number_format($Bill->Total_price)}} đ</h4>
                            </div>
                            <div class="col-md-3">
                                <a href="/bill/{{$Bill->ID_Bill}}" type="button" class="btn btn-info">Chi tiết</a>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div class="tab-pane" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                @foreach($Bills as $Bill)
                    @if($Bill->Status == 'Hoàn thành')
                    <div class="form-group row">
                        <div class="col-md-5">
                            <h4 class="text-warning">Đơn đặt phòng số {{$Bill->ID_Bill}}</h4>
                            <p>Trạng thái: &nbsp; {{$Bill->Status}}</p>
                        </div>
                        <div class="col-md-4">
                            <h4 class="text-warning text-center">{{number_format($Bill->Total_price)}} đ</h4>
                        </div>
                        <div class="col-md-3">
                            <a href="/bill/{{$Bill->ID_Bill}}" type="button" class="btn btn-info">Chi tiết</a>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection