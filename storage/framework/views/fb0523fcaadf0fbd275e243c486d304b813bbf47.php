
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
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="booked-tab" data-toggle="tab" href="#booked" role="tab" aria-controls="home" aria-selected="true">Đã đặt</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="completed-tab" data-toggle="tab" href="#completed" role="tab" aria-controls="profile" aria-selected="false">Hoàn thành</a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="booked" role="tabpanel" aria-labelledby="booked-tab">
                <hr>
                <?php if($Bills->count() == 0): ?>
                    <p class="text-center">Bạn chưa đặt phòng nào!</p>
                    <div class="text-center"><a href="/booking" class="btn btn-danger">Đặt phòng</a> </div>
                <?php else: ?>
                    <?php $__currentLoopData = $Bills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Bill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($Bill->Status == 'Đã đặt'): ?>
                        <div class="form-group row">
                            <div class="col-md-5">
                                <h4 class="text-warning">Đơn đặt phòng số <?php echo e($Bill->ID_Bill); ?></h4>
                                <p>Trạng thái: &nbsp; <?php echo e($Bill->Status); ?></p>
                            </div>
                            <div class="col-md-4">
                                <h4 class="text-warning text-center"><?php echo e(number_format($Bill->Total_price)); ?> đ</h4>
                            </div>
                            <div class="col-md-3">
                                <a href="/bill/<?php echo e($Bill->ID_Bill); ?>" type="button" class="btn btn-info">Chi tiết</a>
                            </div>
                        </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
            <div class="tab-pane" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                <?php $__currentLoopData = $Bills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Bill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($Bill->Status == 'Hoàn thành'): ?>
                    <div class="form-group row">
                        <div class="col-md-5">
                            <h4 class="text-warning">Đơn đặt phòng số <?php echo e($Bill->ID_Bill); ?></h4>
                            <p>Trạng thái: &nbsp; <?php echo e($Bill->Status); ?></p>
                        </div>
                        <div class="col-md-4">
                            <h4 class="text-warning text-center"><?php echo e(number_format($Bill->Total_price)); ?> đ</h4>
                        </div>
                        <div class="col-md-3">
                            <a href="/bill/<?php echo e($Bill->ID_Bill); ?>" type="button" class="btn btn-info">Chi tiết</a>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Celina\resources\views/history.blade.php ENDPATH**/ ?>