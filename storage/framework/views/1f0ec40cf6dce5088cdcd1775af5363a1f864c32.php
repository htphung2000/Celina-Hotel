
<?php $__env->startSection('admin_contents'); ?>
    <?php $__currentLoopData = $Employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <form method="POST" action="/admin/employee/<?php echo e($Emp->ID_Employee); ?>/update" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="_method" value="POST" />
        <h3 class="text-warning text-center col-md-9">Chỉnh sửa thông tin nhân viên</h3>
        <?php if(Session::get('message') != null): ?>
        <div class="form-group row">
            <div class="col-md-9 alert alert-warning" role="alert">
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
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Họ tên nhân viên</b></div>
            <div class="col-md-6">
                <input id="Fullname" type="text" class="form-control" name="Fullname" value="<?php echo e($Emp->Fullname); ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Ngày sinh</b></div>
            <div class="col-md-6">
                <input id="DoB" type="date" class="form-control" name="DoB" value="<?php echo e($Emp->DoB); ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Giới tính</b></div>
            <select class="col-md-3 form-control ml-3" name="Select_Gender">
                <option value="Nam"  <?php if($Emp->Gender == "Nam"): ?> <?php echo e('selected="selected"'); ?> <?php endif; ?>>Nam</option>
                <option value="Nữ" <?php if($Emp->Gender == "Nữ"): ?> <?php echo e('selected="selected"'); ?> <?php endif; ?>>Nữ</option>
            </select>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Số điện thoại</b></div>
            <div class="col-md-6">
                <input id="Phone" type="text" class="form-control" name="Phone" value="<?php echo e($Emp->Phone); ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Email</b></div>
            <div class="col-md-6">
                <input id="Mail" type="text" class="form-control" name="Mail" value="<?php echo e($Emp->Mail); ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Địa chỉ</b></div>
            <div class="col-md-6">
                <input id="Address" type="text" class="form-control" name="Address" value="<?php echo e($Emp->Address); ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Trình độ</b></div>
            <div class="col-md-6">
                <input id="Qualification" type="text" class="form-control" name="Qualification" value="<?php echo e($Emp->Qualification); ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Chi nhánh</b></div>
            <select class="col-md-4 form-control ml-3" name="Select_Department">
                <?php $__currentLoopData = $Departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Dpm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($Dpm->ID_Department); ?>"  <?php if($Emp->ID_Dpm == $Dpm->ID_Department): ?> <?php echo e('selected="selected"'); ?> <?php endif; ?>><?php echo e($Dpm->DPM_Name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Chức vụ</b></div>
            <select class="col-md-4 form-control ml-3" name="Select_Position">
                <?php $__currentLoopData = $Salaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Sal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($Sal->ID_Position); ?>"  <?php if($Emp->Position_Emp == $Sal->ID_Position): ?> <?php echo e('selected="selected"'); ?> <?php endif; ?>><?php echo e($Sal->Position); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Ảnh</b></div>
            <div class="col-md-6">
                <input id="Avatar" type="file" class="form-control" name="Avatar" value="<?php echo e($Emp->Avatar); ?>">
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
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Celina\resources\views/admin/update_employee.blade.php ENDPATH**/ ?>