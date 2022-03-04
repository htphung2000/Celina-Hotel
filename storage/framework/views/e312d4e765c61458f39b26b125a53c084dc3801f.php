
<?php $__env->startSection('admin_contents'); ?>
<h2 class="text-center text-warning pb-2">Danh sách loại phòng</h2>
<a href="/room-type/add" type="button" name="add_type" class="btn btn-primary btn-lg active mb-3">Thêm loại phòng</a>

<?php if(Session::get('message') != null): ?>
    <div class="form-group row">
        <div class="col-md-12 alert alert-warning" role="alert">
            <?php echo e(Session::get('message')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <?php
                    Session::put('message', null);
                ?>
            </button>
        </div>
    </div>
<?php endif; ?>

<div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table text-white p-2">
        <thead class="bg-warning text-center">
            <tr>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Loại phòng</th>
                <th scope="col" width="400px">Miêu tả</th>
                <th scope="col">Giá</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $Types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td class="text-center">
                    <img src="<?php echo e($Type->Image); ?>" width="150px" height="100px">
                </td>
                <td><?php echo e($Type->Type_Name); ?></td>
                <td><?php echo e($Type->Describe); ?></td>
                <td class="text-center"><?php echo e(number_format($Type->Price)); ?></td>
                <td class="text-center">
                    <a href="/admin/room-type/<?php echo e($Type->ID_Type); ?>/update"><button type="button" name="edit_type" class="btn btn-success">Chỉnh sửa</button></a>&nbsp;
                    <a href="/admin/room-type/<?php echo e($Type->ID_Type); ?>/delete"><button type="submit" class="btn btn-danger" onclick="return ConfirmDelete(this)">Xóa</button></a>
                </td>
            </tr>

            <script type="text/javascript">
                function ConfirmDelete(){
                    var x = confirm("Bạn có muốn xóa loại phòng này không? Nếu bạn chọn OK thì toàn bộ phòng thuộc loại phòng này sẽ bị xóa.");
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
    <?php echo e($Types->links("pagination::bootstrap-4")); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Celina\resources\views/admin/type.blade.php ENDPATH**/ ?>