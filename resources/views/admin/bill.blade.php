@extends('admin.layout')
@section('admin_contents')
<div>
    <h2 class="text-center text-warning pb-2">Danh sách đơn đặt phòng</h2>
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="booked-tab" data-toggle="tab" href="#booked" role="tab" aria-controls="home" aria-selected="true">Đã đặt</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="profile" aria-selected="false">Hoàn thành</a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active table-wrapper-scroll-y ctm-scrollbar" id="booked" role="tabpanel" aria-labelledby="booked-tab">
            <table class="table text-white">
                <thead class="bg-warning text-center">
                    <tr>
                        <th scope="col">Mã đơn</th>
                        <th scope="col">Mã khách hàng</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Tổng</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Bills as $Bill)
                        @if($Bill->Status == 'Đã đặt')
                        <tr>
                            <td class="text-center">{{$Bill->ID_Bill}}</td>
                            <td class="text-center">{{$Bill->Customer}}</td>
                            <td>{{$Bill->Status}}</td>
                            <td class="text-center">{{number_format($Bill->Total_price)}} đ</td>
                            <td class="text-center">
                                <a href="/admin/bill/{{$Bill->ID_Bill}}" type="button" class="btn btn-info">Chi tiết</a>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="tab-pane table-wrapper-scroll-y ctm-scrollbar" id="completed" role="tabpanel" aria-labelledby="completed-tab">
            <table class="table text-white">
                <thead class="bg-warning text-center">
                    <tr>
                        <th scope="col">Mã đơn</th>
                        <th scope="col">Mã khách hàng</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Tổng</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Bills as $Bill)
                        @if($Bill->Status == 'Hoàn thành')
                        <tr>
                            <td class="text-center">{{$Bill->ID_Bill}}</td>
                            <td class="text-center">{{$Bill->Customer}}</td>
                            <td>{{$Bill->Status}}</td>
                            <td class="text-center">{{number_format($Bill->Total_price)}} đ</td>
                            <td class="text-center">
                                <a href="/admin/bill/{{$Bill->ID_Bill}}" type="button" class="btn btn-info">Chi tiết</a>
                            </td>
                        </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

