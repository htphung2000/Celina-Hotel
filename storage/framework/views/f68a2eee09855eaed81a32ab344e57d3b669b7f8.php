
<?php $__env->startSection('admin_contents'); ?>
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
            <?php $__currentLoopData = $Salaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Sal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row" class="text-warning"><?php echo e($Sal->Position); ?></th>
                <td class="text-center"><?php echo e($Sal->Sal); ?></td>
                <td class="text-center"><?php echo e($Sal->Allowance); ?></td>
                <td class="text-center">
                    <a href="/admin/position/<?php echo e($Sal->ID_Position); ?>/update">
                        <button type="submit" name="update_position" class="btn btn-success">Chỉnh sửa</button>
                    </a>
                    <a href="/admin/position/<?php echo e($Sal->ID_Position); ?>/delete">
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
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<div class="pagination justify-content-end mt-3">
    <?php echo e($Salaries->links("pagination::bootstrap-4")); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Celina\resources\views/admin/position.blade.php ENDPATH**/ ?>