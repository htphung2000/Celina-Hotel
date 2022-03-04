
<?php $__env->startSection('content'); ?>
<div class="form-group row align-items-stretch pt-3">
    <div class="col-md-3 col-sm-6 text-center border-right border-warning">
        <div class="pb-3">
            <img src="<?php echo e(Session::get('Customer_Avatar')); ?>" class="img logo rounded-circle" width="80px" height="80px">
        </div>
        <ul class="list-unstyled py-5">
            <li><a href="/personal" >Thông tin cá nhân</a></li>
            <hr class="bg-light">
            <li><a href="/history" >Lịch sử đặt phòng</a></li>
            <hr>
        </ul>
    </div>
    <div class="col-md-9 col-sm-6">
        <h3 class="text-warning text-center">Thông tin chi tiết đơn đặt phòng số <?php echo e($Bills->ID_Bill); ?></h3>
        <br>
        <div class="form-group row">
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
        <br>

        <table class="table text-white">
            <thead class="bg-warning text-center">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Phòng</th>
                    <th scope="col">Thông tin</th>
                    <th scope="col">Số ngày</th>
                    <th scope="col">Đơn giá</th>
                    <th scope="col">Thành tiền</th>
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
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <nav class="navbar navbar-expand-md text-right pb-md-4">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">Thời gian đặt: &nbsp; <?php echo e($Bills->created_at); ?></li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <h5>Tổng tiền (<?php echo e($Items->count()); ?> phòng): &nbsp; <b class="text-primary" style="font-size: 30px;"><?php echo e(number_format($Bills->Total_price)); ?> đ</b> </h5>
                </li>
            </ul>
        </nav>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Celina\resources\views/bill_detail.blade.php ENDPATH**/ ?>