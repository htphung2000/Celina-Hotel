
<?php $__env->startSection('admin_contents'); ?>
<h3 class="text-warning text-center pb-1">Thông tin chi tiết đơn đặt phòng số <?php echo e($Bills->ID_Bill); ?></h3>
<div class="form-group row py-1">
    <div class="col-md-5 col-sm-6">
        <h4 class="text-center"><?php echo e($Ctm->CTM_Name); ?></h4>
    </div>
    <div class="col-md-7 col-sm-6">
        <ul class="list-unstyled">
            <li>Số điện thoại: &nbsp; <?php echo e($Ctm->CTM_Phone); ?></li>
            <li>Email: &nbsp; <?php echo e($Ctm->CTM_Mail); ?></li>
            <li>Địa chỉ: &nbsp; <?php echo e($Ctm->CTM_Address); ?></li>
        </ul>
    </div>
</div>

<?php if(Session::get('message') != null): ?>
<div class="alert alert-warning" role="alert">
    <?php echo e(Session::get('message')); ?>

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        <?php
            Session::put('message', null);
        ?>
    </button>
</div>
<?php endif; ?>

<div class="table-wrapper-scroll-y detail-scrollbar">
    <table class="table text-white">
        <thead class="bg-warning text-center">
            <tr>
                <th scope="col"></th>
                <th scope="col">Phòng</th>
                <th scope="col">Thông tin</th>
                <th scope="col">Số ngày</th>
                <th scope="col">Đơn giá</th>
                <th scope="col">Thành tiền</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $Items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <th class="text-center"><?php echo e($loop->index + 1); ?></th>
                <th class="text-center">
                    <h5 class="text-warning"><?php echo e($Item->ID_Room % 1000); ?></h5>
                </th>
                <th>
                    <ul class="list-unstyled">
                        <li><h5 class="text-warning"><?php echo e($Item->DPM_Name); ?></h5></li>
                        <li>Loại phòng: &nbsp; <?php echo e($Item->Type_Name); ?></li>
                        <li>Ngày nhận phòng: &nbsp; <?php echo e($Item->Start_at); ?><li>
                        <li>Ngày trả phòng: &nbsp; <?php echo e($Item->End_at); ?></li>
                    </ul>
                </th>
                <th class="text-center">
                    <h5 class="text-warning"><?php echo e($Days[$loop->index]); ?></h5>
                </th>
                <th class="text-center">
                    <h5 class="text-warning"><?php echo e(number_format($Item->Price)); ?> đ / ngày</h5>
                </th>
                <th class="text-center">
                    <h4 class="text-primary"><?php echo e(number_format($Days[$loop->index] * $Item->Price)); ?> đ</h4>
                </th>
                <th class="text-center">
                    <?php if($Item->Check_in == null): ?>
                    <form method="POST" action="/admin/bill/check-in" class="py-5" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="_method" value="POST" />
                        <input type="hidden" name="ID_Bill" value="<?php echo e($Bills->ID_Bill); ?>"/>
                        <input type="hidden" name="ID_Room" value="<?php echo e($Item->ID_Room); ?>"/>
                        <input type="hidden" name="Start_at" value="<?php echo e($Item->Start_at); ?>"/>
                        <button type="submit" class="btn btn-success text-white border-white">Nhận phòng</button>
                    </form>
                    <?php elseif($Item->Check_out == null): ?>
                    <form method="POST" action="/admin/bill/check-out" class="py-5" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="_method" value="POST" />
                        <input type="hidden" name="ID_Bill" value="<?php echo e($Bills->ID_Bill); ?>"/>
                        <input type="hidden" name="ID_Room" value="<?php echo e($Item->ID_Room); ?>"/>
                        <input type="hidden" name="Start_at" value="<?php echo e($Item->Start_at); ?>"/>
                        <button type="submit" class="btn btn-success text-white border-white">Trả phòng</button>
                    </form>
                    <?php endif; ?>
                </th>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>

<nav class="navbar navbar-expand-md text-right" style="background: none">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item">Thời gian đặt: &nbsp; <?php echo e($Bills->created_at); ?></li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <h5>Tổng tiền (<?php echo e($Items->count()); ?> phòng): &nbsp; <b class="text-primary" style="font-size: 30px;"><?php echo e(number_format($Bills->Total_price)); ?> đ</b> </h5>
        </li>
    </ul>
</nav>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Celina\resources\views/admin/bill_detail.blade.php ENDPATH**/ ?>