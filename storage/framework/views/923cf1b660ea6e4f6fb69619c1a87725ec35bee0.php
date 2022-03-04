
<?php $__env->startSection('admin_contents'); ?>
    <?php $__currentLoopData = $Departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dpm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <form method="POST" action="/admin/department/<?php echo e($dpm->ID_Department); ?>/update" class="py-5" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="_method" value="POST" />
        <h3 class="text-warning text-center pb-3 col-md-9">Chỉnh sửa chi nhánh</h3>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Mã chi nhánh</b></div>
            <div class="col-md-6 col-form-label text-md-left"><?php echo e($dpm->ID_Department); ?></div>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Tên chi nhánh</b></div>
            <div class="col-md-6">
                <input id="DPM_Name" type="text" class="form-control" name="DPM_Name" value="<?php echo e($dpm->DPM_Name); ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Số điện thoại</b></div>
            <div class="col-md-6">
                <input id="DPM_Phone" type="text" class="form-control" name="DPM_Phone" value="<?php echo e($dpm->DPM_Phone); ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Địa chỉ</b></div>
            <div class="col-md-6">
                <input id="DPM_Address" type="text" class="form-control" name="DPM_Address" value="<?php echo e($dpm->DPM_Address); ?>" required>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-warning text-center text-white border-white">Cập nhật</button>
            </div>
        </div>
    </form>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Celina\resources\views/admin/update_department.blade.php ENDPATH**/ ?>