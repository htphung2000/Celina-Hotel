
<?php $__env->startSection('admin_contents'); ?>
<form method="POST" action="/employee/add" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="_method" value="POST" />
    <h3 class="text-warning text-center pb-1 col-md-9">Thêm nhân viên</h3>

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
            <input id="Fullname" type="text" class="form-control" name="Fullname" >
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2 col-form-label text-md-right"><b>Ngày sinh</b></div>
        <div class="col-md-6">
            <input id="DoB" type="date" class="form-control" name="DoB" >
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2 col-form-label text-md-right"><b>Giới tính</b></div>
        <select class="col-md-3 form-control ml-3" name="Select_Gender">
            <option value="Nam" >Nam</option>
            <option value="Nữ" >Nữ</option>
        </select>
    </div>
    <div class="form-group row">
        <div class="col-md-2 col-form-label text-md-right"><b>Số điện thoại</b></div>
        <div class="col-md-6">
            <input id="Phone" type="text" class="form-control" name="Phone" >
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2 col-form-label text-md-right"><b>Email</b></div>
        <div class="col-md-6">
            <input id="Mail" type="text" class="form-control" name="Mail" >
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2 col-form-label text-md-right"><b>Địa chỉ</b></div>
        <div class="col-md-6">
            <input id="Address" type="text" class="form-control" name="Address" >
        </div>
    </div>
    <div class="form-group row">
        <div class="col-md-2 col-form-label text-md-right"><b>Chi nhánh</b></div>
        <select class="col-md-4 form-control ml-3" name="Select_Department">
            <?php $__currentLoopData = $Departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Dpm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($Dpm->ID_Department); ?>"><?php echo e($Dpm->DPM_Name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="form-group row">
        <div class="col-md-2 col-form-label text-md-right"><b>Chức vụ</b></div>
        <select class="col-md-4 form-control ml-3" name="Select_Position">
            <?php $__currentLoopData = $Salaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Sal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($Sal->ID_Position); ?>" ><?php echo e($Sal->Position); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    </div>
    <div class="form-group row">
        <div class="col-md-2 col-form-label text-md-right"><b>Ảnh</b></div>
        <div class="col-md-6">
            <input id="Avatar" type="file" class="form-control" name="Avatar" >
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-9 text-center">
            <button type="submit" class="btn btn-warning text-center text-white border-white">Thêm</button>
        </div>
    </div>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Celina\resources\views/admin/add_employee.blade.php ENDPATH**/ ?>