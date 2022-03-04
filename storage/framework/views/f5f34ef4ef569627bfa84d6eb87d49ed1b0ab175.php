
<?php $__env->startSection('content'); ?>
<div class="container">
    <h3 class="text-center text-warning py-2">Đặt phòng</h3>
    <hr class="bg-warning"/>
    <?php if(Session::get('Message')): ?>
        <div class="alert alert-warning" role="alert">
            <?php echo e(Session::get('Message')); ?>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <?php
                    Session::put('Message', null);
                ?>
            </button>
        </div> 
    <?php endif; ?>
</div>

<form method="post" action="/booking" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <input type="hidden" name="_method" value="POST" />
    <div class="form-group row offset-md-1 pl-md-5">
        <div class="col-md-3 col-sm-2">
            <ul class="list-unstyled">
                <li><label class="text-left">Chi nhánh</label></li>
                <li>
                    <select name="select-department" class="form-control">
                        <?php $__currentLoopData = $Departments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Dpm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($Dpm->DPM_Name); ?>"><?php echo e($Dpm->DPM_Name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </li>
            </ul>
        </div>
        <div class="col-md-2 col-sm-2">
            <ul class="list-unstyled">
                <li><label class="text-left">Ngày nhận phòng</label></li>
                <li><input type="date" name="start" id="start" value="Check-in" class="form-control"></li>
            </ul>
        </div>
        <div class="col-md-2 col-sm-2">
            <ul class="list-unstyled">
                <li><label class="text-left">Ngày trả phòng</label></li>
                <li><input type="date" name="end" id="end" value="Check-out" class="form-control"></li>
            </ul>
        </div>
        <div class="col-md-2 col-sm-2">
            <ul class="list-unstyled">
                <li><label class="text-left">Loại phòng</label></li>
                <li>
                    <select name="select-room-type" class="form-control">
                        <?php $__currentLoopData = $Types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Tp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($Tp->ID_Type); ?>"><?php echo e($Tp->Type_Name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </li>
            </ul>
        </div>
        <div class="col-md-2 col-sm-2">
            <ul class="list-unstyled">
                <li><label class="text-dark">.</label></li>
                <li><button type="submit" name="search" class="btn btn-warning border border-white text-white">Tìm kiếm</button></li>
            </ul>
        </div>
    </div>
</form>

<div class="container">
    <div class="form-group row">
        <?php $__currentLoopData = $Types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4 col-sm-6 py-3 text-center">
            <img src="<?php echo e($Type->Image); ?>" class="img" width="300px" height="200px">
        </div>
        <div class="col-md-5 col-sm-6 py-3">
            <ul class="list-unstyled">
                <li><h3 class="text-warning"><?php echo e($Type->Type_Name); ?></h3></li>
                <br>
                <li><?php echo e($Type->Describe); ?></li>
                <hr class="bg-light">
                <li><i class="fas fa-wifi"></i> &nbsp; <i class="fas fa-tv"></i> &nbsp; <i class="far fa-snowflake"></i> &nbsp; <i class="fas fa-phone"></i></li>
            </ul>
        </div>
        <div class="col-md-3 col-sm-6 py-3">
            <h3 class="text-center pt-5"><?php echo e(number_format($Type->Price)); ?>  <sup>đ</sup> / <sub>ngày</sub></h3>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Celina\resources\views/booking.blade.php ENDPATH**/ ?>