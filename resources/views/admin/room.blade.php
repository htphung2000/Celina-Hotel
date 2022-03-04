@extends('admin.layout')
@section('admin_contents')
<h2 class="text-center text-warning pb-2">Danh sách phòng</h2>
<a href="/admin/room/add"><button type="button" name="add_room" class="btn btn-primary btn-lg active mb-3">Thêm phòng</button></a>

<div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table text-white p-2">
        <thead class="bg-warning text-center">
            <tr>
                <th scope="col">Số phòng</th>
                <th scope="col">Chi nhánh</th>
                <th scope="col">Loại phòng</th>
                <th scope="col">Giá</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Room as $Rm)
            <tr>
                <th scope="row" class="text-center text-warning">{{$Rm->ID_Room % 1000}}</th>
                <td>{{$Rm->DPM_Name}}</td>
                <td class="text-center">{{$Rm->Type_Name}}</td>
                <td class="text-center">{{$Rm->Price}}</td>
                <td class="text-center">
                    <a href="/admin/room/{{$Rm->ID_Room}}/update"><button type="button" name="edit_department" class="btn btn-success">Chỉnh sửa</button></a>&nbsp;
                    <a href="/admin/room/{{$Rm->ID_Room}}/delete"><button type="submit" class="btn btn-danger" onclick="return ConfirmDelete(this)">Xóa</button></a>
                </td>
                </td>
            </tr>

            <script type="text/javascript">
                function ConfirmDelete(){
                    var x = confirm("Bạn có muốn xóa phòng này không?");
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
    {{ $Room->links("pagination::bootstrap-4") }}
</div>
@endsection