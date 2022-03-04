
<?php $__env->startSection('admin_contents'); ?>
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
            <?php $__currentLoopData = $Customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Ctm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th scope="row" class="text-center text-warning"><?php echo e($Ctm->ID_Customer); ?></th>
                <td><?php echo e($Ctm->Username); ?></a></td>
                <td><?php echo e($Ctm->CTM_Name); ?></a></td>
                <td class="text-center"><?php echo e($Ctm->CTM_DoB); ?></td>
                <td class="text-center">
                    <a href="/admin/customer/<?php echo e($Ctm->ID_Customer); ?>" type="submit" class="btn btn-info">Chi tiết</a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<div class="pagination justify-content-end mt-3">
    <?php echo e($Customers->links("pagination::bootstrap-4")); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Celina\resources\views/admin/customer.blade.php ENDPATH**/ ?>