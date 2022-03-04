
<?php $__env->startSection('admin_contents'); ?>
    <?php $__currentLoopData = $Salaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Sal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <form method="POST" action="/admin/position/<?php echo e($Sal->ID_Position); ?>/update" class="py-5" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="_method" value="POST" />
        <h3 class="text-warning text-center pb-3 col-md-9">Chỉnh sửa chức vụ</h3>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Chức vụ</b></div>
            <div class="col-md-6">
                <input id="Position" type="text" class="form-control" name="Position" value="<?php echo e($Sal->Position); ?>">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Lương</b></div>
            <div class="col-md-6">
                <input id="Sal" type="text" class="form-control" name="Sal" value="<?php echo e($Sal->Sal); ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Phụ cấp</b></div>
            <div class="col-md-6">
                <input id="Allowance" type="text" class="form-control" name="Allowance" value="<?php echo e($Sal->Allowance); ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"></div>
            <div class="col-md-6">
                <i class="fas fa-asterisk"></i>&nbsp; <i>Phụ cấp (đơn vị: %) được tính dựa trên lương.</i>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-9 text-center">
                <button type="submit" class="btn btn-warning text-center text-white border-white">Cập nhật</button>
            </div>
        </div>
    </form>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Celina\resources\views/admin/update_position.blade.php ENDPATH**/ ?>