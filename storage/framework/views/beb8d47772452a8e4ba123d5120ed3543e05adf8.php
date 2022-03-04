
<?php $__env->startSection('admin_contents'); ?>
    <form method="POST" action="/position/add" class="py-5 pl-5" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <h3 class="text-warning text-center pb-3 col-md-9">Thêm chức vụ</h3>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Tên chức vụ</b></div>
            <div class="col-md-6">
                <input id="Position" type="text" class="form-control" name="Position" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Lương</b></div>
            <div class="col-md-6">
                <input id="Sal" type="text" class="form-control" name="Sal" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Trợ cấp</b></div>
            <div class="col-md-6">
                <input id="Allowance" type="text" class="form-control" name="Allowance" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"></div>
            <div class="col-md-6">
                <i class="fas fa-asterisk"></i> &nbsp; <i>Trợ cấp (đơn vị: %) được tính dựa trên lương.</i>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" name="add_position" class="btn btn-warning text-center text-white border-white">Thêm</button>
            </div>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Celina\resources\views/admin/add_position.blade.php ENDPATH**/ ?>