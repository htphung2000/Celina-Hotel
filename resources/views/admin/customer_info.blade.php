@extends('admin.layout')
@section('admin_contents')
<div class="row">
    @foreach ($Customers as $Ctm)
    <div class="col-lg-4">
        <img src="{{$Ctm->CTM_Avatar}}" class="img-thumbnail" width="300px">
    </div>
    <div class="col-lg-8">
        <h4 class="text-warning pb-2">{{$Ctm->CTM_Name}}</h4>
        <div class="form-group row">
            <div class="col-md-3 text-right">Mã khách hàng: </div>
            <div class="col-md-9">{{$Ctm->ID_Customer}}</div>
            <div class="col-md-3 text-right">Ngày sinh: </div>
            <div class="col-md-9">{{$Ctm->CTM_DoB}}</div>
            <div class="col-md-3 text-right">Giới tính: </div>
            <div class="col-md-9">{{$Ctm->CTM_Gender}}</div>
            <div class="col-md-3 text-right">Số điện thoại: </div>
            <div class="col-md-9">{{$Ctm->CTM_Phone}}</div>
            <div class="col-md-3 text-right">Email: </div>
            <div class="col-md-9">{{$Ctm->CTM_Mail}}</div>
            <div class="col-md-3 text-right">Địa chỉ: </div>
            <div class="col-md-9">{{$Ctm->CTM_Address}}</div>

            <div class="col-md-12 pt-2">
                <div class="table-wrapper-scroll-y customer-scrollbar">
                    <table class="table text-white">
                        <thead class="bg-warning text-center">
                            <tr>
                                <th scope="col">Mã đơn</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Tổng</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($Bills->count() == 0)
                                <tr>
                                    <td class="text-center" colspan="4">Chưa có phòng nào được đặt!</td>
                                </tr>
                            @else
                                @foreach ($Bills as $Bill)
                                <tr>
                                    <td class="text-center">{{$Bill->ID_Bill}}</td>
                                    <td>{{$Bill->Status}}</td>
                                    <td class="text-center">{{number_format($Bill->Total_price)}} đ</td>
                                    <td class="text-center">
                                        <a href="/admin/bill/{{$Bill->ID_Bill}}" type="button" class="btn btn-info">Chi tiết</a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection