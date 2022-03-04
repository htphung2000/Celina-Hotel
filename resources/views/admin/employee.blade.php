@extends('admin.layout')
@section('admin_contents')
<h2 class="text-center text-warning pb-2">Danh sách nhân viên</h2>
<a href="/employee/add" type="button" name="add_employee" class="btn btn-primary btn-lg active mb-3">Thêm nhân viên</a>
<div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table text-white p-2">
        <thead class="bg-warning text-center">
            <tr>
                <th scope="col">Mã NV</th>
                <th scope="col">Họ tên</th>
                <th scope="col">Chi nhánh</th>
                <th scope="col">Chức vụ</th>
                <th scope="col">Lương</th>
                <th scope="col">Admin</th>
                <th scope="col">Thông tin</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Employees as $Emp)
            <tr>
                <th scope="row" class="text-center text-warning">{{$Emp->ID_Employee}}</th>
                <td>{{$Emp->Fullname}}</a></td>
                <td class="text-center">{{$Emp->DPM_Name}}</td>
                <td>{{$Emp->Position}}</td>
                <td class="text-center">{{number_format($Emp->Sal + $Emp->Sal * $Emp->Allowance / 100)}}</td>
                <td class="text-center">
                <?php
                    $flap = 1;
                    ?>
                        @foreach($Admin as $Ad)
                            @if($Ad->ID_Admin == $Emp->ID_Employee)
                                <a href="/admin/{{$Ad->ID_Admin}}/delete"><i class="fas fa-check"></i></a>
                                <?php
                                    $flap = 0;
                                ?>
                                @break
                            @endif
                        @endforeach

                        @if($flap == 1)
                            <a href="/admin/{{$Emp->ID_Employee}}/add"><i class="fas fa-times"></i></a>
                        @endif
                    <?php
                ?>
                </td>
                <td class="text-center">
                    <a href="/admin/employee/{{$Emp->ID_Employee}}" type="button" name="info_employee" class="btn btn-info">Chi tiết</a>
                </td>
                <td class="text-center">
                    <a href="/admin/employee/{{$Emp->ID_Employee}}/delete">
                        <button type="submit" name="delete_employee" class="btn btn-danger" onclick="return ConfirmDelete(this)">Xóa</button>
                    </a>
                </td>
            </tr>

            <script type="text/javascript">
                function ConfirmDelete(){
                    var x = confirm("Bạn có muốn xóa nhân viên này không?");
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
    {{ $Employees->appends(['sort' => 'ID_Employee'])->links("pagination::bootstrap-4") }}
</div>
@endsection