
<?php $__env->startSection('admin_contents'); ?>
<div class="row pt-3">
    <?php $__currentLoopData = $Employee; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-lg-4 py-2">
        <img src="<?php echo e($Emp->Avatar); ?>" class="img-thumbnail" height="200px" width="300px">
    </div>
    <div class="col-lg-8 py-2">
        <h4 class="text-warning"><?php echo e($Emp->Fullname); ?></h4>

        <?php $__currentLoopData = $Admin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($Ad->ID_Admin == $Emp->ID_Employee): ?>
        <span class="text-primary">Admin</span>
        <br>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <br>

        <div class="form-group row">
            <div class="col-md-3 text-right">Mã nhân viên: </div>
            <div class="col-md-9"><?php echo e($Emp->ID_Employee); ?></div>
            <div class="col-md-3 text-right">Ngày sinh: </div>
            <div class="col-md-9"><?php echo e($Emp->DoB); ?></div>
            <div class="col-md-3 text-right">Giới tính: </div>
            <div class="col-md-9"><?php echo e($Emp->Gender); ?></div>
            <div class="col-md-3 text-right">Số điện thoại: </div>
            <div class="col-md-9"><?php echo e($Emp->Phone); ?></div>
            <div class="col-md-3 text-right">Email: </div>
            <div class="col-md-9"><?php echo e($Emp->Mail); ?></div>
            <div class="col-md-3 text-right">Địa chỉ: </div>
            <div class="col-md-9"><?php echo e($Emp->Address); ?></div>
            <div class="col-md-3 text-right">Thuộc chi nhánh: </div>
            <div class="col-md-9"><?php echo e($Emp->DPM_Name); ?></div>
            <div class="col-md-3 text-right">Chức vụ: </div>
            <div class="col-md-9"><?php echo e($Emp->Position); ?></div>
            <div class="col-md-3 text-right">Mức lương cơ bản: </div>
            <div class="col-md-9"><?php echo e($Emp->Sal); ?></div>
            <div class="col-md-3 text-right">Phụ cấp: </div>
            <div class="col-md-9"><?php echo e($Emp->Allowance); ?> %</div>
        </div>
        <a href="/admin/employee/<?php echo e($Emp->ID_Employee); ?>/update"><button type="button" name="edit_employee" class="btn btn-primary active">Chỉnh sửa thông tin</button></a>&nbsp;
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Celina\resources\views/admin/info_employee.blade.php ENDPATH**/ ?>