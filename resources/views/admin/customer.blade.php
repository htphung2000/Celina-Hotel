@extends('admin.layout')
@section('admin_contents')
<h2 class="text-center text-warning pb-2">Danh sách khách hàng</h2>
<br>
<div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table text-white">
        <thead class="bg-warning text-center">
            <tr>
                <th scope="col">Mã</th>
                <th scope="col">Tài khoản</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Ngày sinh</th>
                <th scope="col">Thông tin</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Customers as $Ctm)
            <tr>
                <th scope="row" class="text-center text-warning">{{$Ctm->ID_Customer}}</th>
                <td>{{$Ctm->Username}}</a></td>
                <td>{{$Ctm->CTM_Name}}</a></td>
                <td class="text-center">{{$Ctm->CTM_DoB}}</td>
                <td class="text-center">
                    <a href="/admin/customer/{{$Ctm->ID_Customer}}" type="submit" class="btn btn-info">Chi tiết</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="pagination justify-content-end mt-3">
    {{ $Customers->links("pagination::bootstrap-4") }}
</div>
@endsection