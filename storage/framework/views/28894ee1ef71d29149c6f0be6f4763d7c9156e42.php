
<?php $__env->startSection('admin_contents'); ?>
    <form method="POST" action="/room-type/add" class="py-5 pl-5" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <h3 class="text-warning text-center pb-3 col-md-9">Thêm loại phòng</h3>

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
            <div class="col-md-3 col-form-label text-md-right"><b>Tên loại phòng</b></div>
            <div class="col-md-6">
                <input id="Type_Name" type="text" class="form-control" name="Type_Name" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3 col-form-label text-md-right"><b>Miêu tả</b></div>
            <div class="col-md-6">
                <textarea name="Describe" class="form-control" required></textarea>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3 col-form-label text-md-right"><b>Giá</b></div>
            <div class="col-md-6">
                <input id="Price" type="text" class="form-control" name="Price" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3 col-form-label text-md-right"><b>Ảnh</b></div>
            <div class="col-md-6">
                <input id="Image" type="file" class="form-control" name="Image" required>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-9 text-center">
                <button type="submit" class="btn btn-warning text-center text-white border-white">Thêm</button>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Celina\resources\views/admin/add_type.blade.php ENDPATH**/ ?>