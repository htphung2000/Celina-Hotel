
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <?php $__currentLoopData = $Departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Dpm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-4 py-2">
            <img src="<?php echo e($Dpm->DPM_Img); ?>" class="img" height="200px" width="300px">
        </div>
        <div class="col-lg-8 py-2">
            <h4 class="text-warning"><?php echo e($Dpm->DPM_Name); ?></h4>
            <p></p>
            <p>
                Địa chỉ:  <?php echo e($Dpm->DPM_Address); ?></br>
                Số điện thoại:  <?php echo e($Dpm->DPM_Phone); ?></br>
                Đặt phòng: &nbsp; <b><i class="fas fa-angle-double-right"></i><a href="/department/<?php echo e($Dpm->ID_Department); ?>" class="text-primary"> tại đây!</a></b>
            </p>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Celina\resources\views//department.blade.php ENDPATH**/ ?>