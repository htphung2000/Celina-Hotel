
<?php $__env->startSection('content'); ?>
<div class="form-group row align-items-stretch pt-3">
    <div class="col-md-3 col-sm-6 text-center border-right border-warning">
        <div class="pb-3">
            <img src="<?php echo e(Session::get('Customer_Avatar')); ?>" class="img logo rounded-circle" width="80px" height="80px">
        </div>
        <ul class="list-unstyled py-5">
            <li><a href="/personal" >Thông tin cá nhân</a></li>
            <hr class="bg-light" />
            <li><a href="/history" >Lịch sử đặt phòng</a></li>
            <hr />
        </ul>
    </div>
    <div class="col-md-9 col-sm-6">
        <h3 class="text-warning text-center">Thông tin cá nhân</h3>
        <hr />
        <?php if(Session::get('Message') != null): ?>
        <div class="alert alert-warning" role="alert">
            <?php echo e(Session::get('Message')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div> 
        <?php
            Session::put('Message', null);
        ?>
        <?php endif; ?>
        <form method="POST" action="/personal/update" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="_method" value="POST" />
            <div class="form-group row">
                <div class="col-md-4 col-form-label text-md-right">Họ và tên </div>
                <div class="col-md-6">
                    <input id="CTM_Name" type="text" class="form-control" name="CTM_Name" value="<?php echo e(Session::get('Customer_Name')); ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4 col-form-label text-md-right">Ngày sinh </div>
                <div class="col-md-6">
                    <input id="CTM_DoB" type="date" class="form-control" name="CTM_DoB" value="<?php echo e(Session::get('Customer_DoB')); ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4 col-form-label text-md-right">Giới tính </div>
                <select class="col-md-2 form-control ml-3" name="CTM_Gender">
                    <option value="Nam"  <?php if(Session::get('Customer_Gender') == "Nam"): ?> <?php echo e('selected="selected"'); ?> <?php endif; ?>>Nam</option>
                    <option value="Nữ" <?php if(Session::get('Customer_Gender') == "Nữ"): ?> <?php echo e('selected="selected"'); ?> <?php endif; ?>>Nữ</option>
                </select>
            </div>
            <div class="form-group row">
                <div class="col-md-4 col-form-label text-md-right">Số điện thoại </div>
                <div class="col-md-6">
                    <input id="CTM_Phone" type="text" class="form-control" name="CTM_Phone" value="<?php echo e(Session::get('Customer_Phone')); ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4 col-form-label text-md-right">Email </div>
                <div class="col-md-6">
                    <input id="CTM_Mail" type="text" class="form-control" name="CTM_Mail" value="<?php echo e(Session::get('Customer_Mail')); ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4 col-form-label text-md-right">Địa chỉ </div>
                <div class="col-md-6">
                    <input id="CTM_Address" type="text" class="form-control" name="CTM_Address" value="<?php echo e(Session::get('Customer_Address')); ?>" required>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-4 col-form-label text-md-right">Ảnh </div>
                <div class="col-md-6">
                    <input id="CTM_Avatar" type="file" class="form-control" name="CTM_Avatar" required>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-warning text-center text-white border-white">Cập nhật</button>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Celina\resources\views/update_personal_info.blade.php ENDPATH**/ ?>