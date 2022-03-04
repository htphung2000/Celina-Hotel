@extends('admin.layout')
@section('admin_contents')
<h2 class="text-center text-warning pb-2">Danh sách chức vụ</h2>
<a href="/position/add" type="button" name="add_position" class="btn btn-primary active btn-lg mb-3">Thêm chức vụ</a>

<div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table text-white p-2">
        <thead class="bg-warning text-center">
            <tr>
                <th scope="col">Chức vụ</th>
                <th scope="col">Lương</th>
                <th scope="col">Phụ cấp</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Salaries as $Sal)
            <tr>
                <th scope="row" class="text-warning">{{$Sal->Position}}</th>
                <td class="text-center">{{$Sal->Sal}}</td>
                <td class="text-center">{{$Sal->Allowance}}</td>
                <td class="text-center">
                    <a href="/admin/position/{{$Sal->ID_Position}}/update">
                        <button type="submit" name="update_position" class="btn btn-success">Chỉnh sửa</button>
                    </a>
                    <a href="/admin/position/{{$Sal->ID_Position}}/delete">
                        <button type="submit" name="delete_position" class="btn btn-danger" onclick="return ConfirmDelete(this)">Xóa</button>
                    </a>
                </td>
            </tr>
            <script type="text/javascript">
                function ConfirmDelete(){
                    var x = confirm("Bạn có muốn xóa chức vụ này không? Nếu bạn chọn OK thì toàn bộ nhân viên ở chức vụ này sẽ bị xóa.");
                    if (x)
                        return true;
                    else
                        return false;
                }
            </script>
            @endforeach
        </tbody>
    </table>
</div>

<div class="pagination justify-content-end mt-3">
    {{ $Salaries->links("pagination::bootstrap-4") }}
</div>
@endsection