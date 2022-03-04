
<?php $__env->startSection('admin_contents'); ?>
    <?php $__currentLoopData = $Room; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Rm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <form method="POST" action="/admin/room/<?php echo e($Rm->ID_Room); ?>/update" class="py-5" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="_method" value="POST" />
        <h3 class="text-warning text-center pb-3 col-md-9">Chỉnh sửa phòng</h3>
        <div class="form-group row">
            <div class="col-md-3 col-form-label text-md-right"><b>Số phòng</b></div>
            <div class="col-md-6 col-form-label text-md-left"><?php echo e($Rm->ID_Room % 1000); ?></div>
        </div>
        <div class="form-group row">
            <div class="col-md-3 col-form-label text-md-right"><b>Tên chi nhánh</b></div>
            <div class="col-md-6 col-form-label text-md-left"><?php echo e($Rm->DPM_Name); ?></div>
        </div>
        <div class="form-group row">
            <div class="col-md-3 col-form-label text-md-right"><b>Loại phòng</b></div>
            <select class="col-md-4 form-control ml-3" name="Select_Type">
                <?php $__currentLoopData = $Type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Tp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($Tp->Type_Name); ?>" <?php if($Tp->Type_Name == $Rm->Type_Name): ?> <?php echo e('selected="selected"'); ?> <?php endif; ?>><?php echo e($Tp->Type_Name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-9 text-center">
                <button type="submit" class="btn btn-warning text-center text-white border-white">Cập nhật</button>
            </div>
        </div>
    </form>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Celina\resources\views/admin/update_room.blade.php ENDPATH**/ ?>