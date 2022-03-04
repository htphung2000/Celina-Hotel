
<?php $__env->startSection('content'); ?>
<div class="container">
    <h3 class="text-center text-warning py-2">Đặt phòng</h3>
    <hr class="bg-warning"/>
</div>

<form method="post" action="/booking" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="POST" />
    <?php echo csrf_field(); ?>
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
                <li><input type="date" name="start" value="Check_in" class="form-control"></li>
            </ul>
        </div>
        <div class="col-md-2 col-sm-2">
            <ul class="list-unstyled">
                <li><label class="text-left">Ngày trả phòng</label></li>
                <li><input type="date" name="end" value="Check_out" class="form-control"></li>
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

<div class="container pt-3">
    <p class="text-center">Từ ngày <?php echo e($Start); ?> đến ngày <?php echo e($End); ?></p>
    <table class="table text-white p-2">
        <thead class="bg-warning text-center">
            <tr>
                <th scope="col">Chi nhánh</th>
                <th scope="col">Số phòng</th>
                <th scope="col">Tầng</th>
                <th scope="col">Loại phòng</th>
                <th scope="col">Giá</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
                <?php if($Count_Room == $Count_Bill): ?>
                <td class="text-center" colspan="6">Không tìm thấy phòng trống!</td>
                <?php else: ?>
                    <?php if($Count_Bill > 0): ?>
                        <?php $__currentLoopData = $Rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $Bills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Bill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($Bill->Room != $Room->ID_Room): ?>
                                <form method="POST" action="/booking/search" class="py-5" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="_method" value="POST" />
                                    <input type="hidden" name="Room_ID" value="<?php echo e($Room->ID_Room); ?>">
                                    <input type="hidden" name="start" value="<?php echo e($Start); ?>">
                                    <input type="hidden" name="end" value="<?php echo e($End); ?>">
                                    <tr>
                                        <td><?php echo e($Room->DPM_Name); ?></td>
                                        <td class="text-center"><?php echo e($Room->ID_Room % 1000); ?></td>
                                        <td class="text-center"><?php echo e((($Room->ID_Room % 1000) - ($Room->ID_Room % 100)) / 100); ?></td>
                                        <td><?php echo e($Room->Type_Name); ?></td>
                                        <td class="text-center"><?php echo e(number_format($Room->Price)); ?> VND / ngày</td>
                                        <td class="text-center">
                                            <button type="submit" name="add-to-cart" class="btn btn-danger">Thêm vào giỏ</button>
                                        </td>
                                    </tr>
                                </form>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <?php $__currentLoopData = $Rooms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Room): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <form method="POST" action="/booking/search" class="py-5" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="_method" value="POST" />
                            <input type="hidden" name="Room_ID" value="<?php echo e($Room->ID_Room); ?>">
                            <input type="hidden" name="start" value="<?php echo e($Start); ?>">
                            <input type="hidden" name="end" value="<?php echo e($End); ?>">
                            <tr>
                                <td><?php echo e($Room->DPM_Name); ?></td>
                                <td class="text-center"><?php echo e($Room->ID_Room % 1000); ?></td>
                                <td class="text-center"><?php echo e((($Room->ID_Room % 1000) - ($Room->ID_Room % 100)) / 100); ?></td>
                                <td><?php echo e($Room->Type_Name); ?></td>
                                <td class="text-center"><?php echo e($Room->Price); ?> VND / ngày</td>
                                <td class="text-center">
                                    <button type="submit" name="add-to-cart" class="btn btn-danger">Thêm vào giỏ</button>
                                </td>
                            </tr>
                        </form>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endif; ?>
        </tbody>
    </table>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Celina\resources\views/search.blade.php ENDPATH**/ ?>