
<?php $__env->startSection('admin_contents'); ?>
<div class="row">
    <?php $__currentLoopData = $Customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Ctm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-lg-4">
        <img src="<?php echo e($Ctm->CTM_Avatar); ?>" class="img-thumbnail" width="300px">
    </div>
    <div class="col-lg-8">
        <h4 class="text-warning pb-2"><?php echo e($Ctm->CTM_Name); ?></h4>
        <div class="form-group row">
            <div class="col-md-3 text-right">Mã khách hàng: </div>
            <div class="col-md-9"><?php echo e($Ctm->ID_Customer); ?></div>
            <div class="col-md-3 text-right">Ngày sinh: </div>
            <div class="col-md-9"><?php echo e($Ctm->CTM_DoB); ?></div>
            <div class="col-md-3 text-right">Giới tính: </div>
            <div class="col-md-9"><?php echo e($Ctm->CTM_Gender); ?></div>
            <div class="col-md-3 text-right">Số điện thoại: </div>
            <div class="col-md-9"><?php echo e($Ctm->CTM_Phone); ?></div>
            <div class="col-md-3 text-right">Email: </div>
            <div class="col-md-9"><?php echo e($Ctm->CTM_Mail); ?></div>
            <div class="col-md-3 text-right">Địa chỉ: </div>
            <div class="col-md-9"><?php echo e($Ctm->CTM_Address); ?></div>

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
                            <?php if($Bills->count() == 0): ?>
                                <tr>
                                    <td class="text-center" colspan="4">Chưa có phòng nào được đặt!</td>
                                </tr>
                            <?php else: ?>
                                <?php $__currentLoopData = $Bills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Bill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td class="text-center"><?php echo e($Bill->ID_Bill); ?></td>
                                    <td><?php echo e($Bill->Status); ?></td>
                                    <td class="text-center"><?php echo e(number_format($Bill->Total_price)); ?> đ</td>
                                    <td class="text-center">
                                        <a href="/admin/bill/<?php echo e($Bill->ID_Bill); ?>" type="button" class="btn btn-info">Chi tiết</a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Celina\resources\views/admin/customer_info.blade.php ENDPATH**/ ?>