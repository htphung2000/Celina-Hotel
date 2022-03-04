
<?php $__env->startSection('admin_contents'); ?>
    <form method="POST" action="/admin/room/add" class="py-5 pl-5" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <h3 class="text-warning text-center pb-3 col-md-9">Thêm phòng</h3>

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
            <div class="col-md-2 col-form-label text-md-right"><b>Số phòng</b></div>
            <div class="col-md-6">
                <input id="ID_Room" type="text" class="form-control" name="ID_Room" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Chi nhánh</b></div>
            <select class="col-md-4 form-control ml-3" name="Select_Department">
                <?php $__currentLoopData = $Department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Dpm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($Dpm->DPM_Name); ?>"><?php echo e($Dpm->DPM_Name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Loại phòng</b></div>
            <select class="col-md-4 form-control ml-3" name="Select_Type">
                <?php $__currentLoopData = $Type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Tp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($Tp->Type_Name); ?>"><?php echo e($Tp->Type_Name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-warning text-center text-white border-white">Thêm</button>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Celina\resources\views/admin/add_room.blade.php ENDPATH**/ ?>