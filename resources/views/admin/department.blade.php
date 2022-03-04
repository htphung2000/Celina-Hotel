@extends('admin.layout')
@section('admin_contents')
<h2 class="text-center text-warning">Danh sách chi nhánh</h2>
<br>
<a href="/admin/department/add"><button type="button" name="add_department" class="btn btn-primary btn-lg active mb-3">Thêm chi nhánh</button></a>
<table class="table text-white p-2">
    <thead class="bg-warning text-center">
        <tr>
            <th scope="col">Mã CN</th>
            <th scope="col">Tên chi nhánh</th>
            <th scope="col">Số điện thoại</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Departments as $Dpm)
        <tr>
            <th scope="row" class="text-center text-warning">{{$Dpm->ID_Department}}</th>
            <td>{{$Dpm->DPM_Name}}</a></td>
            <td class="text-center">{{$Dpm->DPM_Phone}}</td>
            <td>{{$Dpm->DPM_Address}}</td>
            <td class="text-center">
                <a href="/admin/department/{{$Dpm->ID_Department}}/update"><button type="button" name="edit_department" class="btn btn-success">Chỉnh sửa</button></a>&nbsp;
                <a href="/admin/department/{{$Dpm->ID_Department}}/delete"><button type="submit" class="btn btn-danger" onclick="return ConfirmDelete(this)">Xóa</button></a>
            </td>
        </tr>

        <script type="text/javascript">
            function ConfirmDelete(){
                var x = confirm("Bạn có muốn xóa chi nhánh này không? Nếu bạn chọn OK thì toàn bộ nhân viên và phòng ở chi nhánh này sẽ bị xóa.");
                if (x)
                    return true;
                else
                    return false;
            }
        </script>
        @endforeach
    </tbody>
</table>
@endsection