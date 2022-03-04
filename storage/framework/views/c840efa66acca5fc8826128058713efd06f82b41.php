
<?php $__env->startSection('admin_contents'); ?>
    <?php $__currentLoopData = $Types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <form method="POST" action="/admin/room-type/<?php echo e($Type->ID_Type); ?>/update" class="py-5" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="_method" value="POST" />
        <h3 class="text-warning text-center pb-3 col-md-10">Chỉnh sửa loại phòng</h3>
        <div class="form-group row">
            <div class="col-md-3 col-form-label text-md-right"><b>Tên loại phòng</b></div>
            <div class="col-md-6">
                <input id="Type_Name" type="text" class="form-control" name="Type_Name" value="<?php echo e($Type->Type_Name); ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3 col-form-label text-md-right"><b>Miêu tả</b></div>
            <div class="col-md-6">
                <textarea name="Describe" class="form-control" required><?php echo e($Type->Describe); ?></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3 col-form-label text-md-right"><b>Giá</b></div>
            <div class="col-md-6">
                <input id="Price" type="text" class="form-control" name="Price" value="<?php echo e($Type->Price); ?>" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3 col-form-label text-md-right"><b>Ảnh</b></div>
            <div class="col-md-6">
                <input id="Image" type="file" class="form-control" name="Image" value="<?php echo e($Type->Image); ?>" required>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-10 text-center">
                <button type="submit" class="btn btn-warning text-center text-white border-white">Cập nhật</button>
            </div>
        </div>
    </form>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Celina\resources\views/admin/update_type.blade.php ENDPATH**/ ?>