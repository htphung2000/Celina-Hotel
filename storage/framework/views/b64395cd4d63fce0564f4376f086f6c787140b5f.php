
<?php $__env->startSection('content'); ?>
    <h3 class="text-center text-warning pb-3">Giỏ hàng</h3>

    <?php if(Session::get('Message')): ?>
        <hr class="bg-warning">
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

    <form method="POST" action="/cart" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <table class="table text-white">
            <thead class="bg-warning text-center">
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Phòng</th>
                    <th scope="col">Chi nhánh</th>
                    <th scope="col">Loại phòng</th>
                    <th scope="col">Ngày nhận</th>
                    <th scope="col">Ngày trả</th>
                    <th scope="col">Số ngày</th>
                    <th scope="col">Đơn giá</th>
                    <th scope="col">Thành tiền</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php if($Count_Items == 0): ?>
                <tr>
                    <th class="text-center" colspan="10">
                        <br>
                        <p>Giỏ hàng của bạn còn trống!</p>
                        <a href="/booking" class="btn btn-danger">Đặt phòng</a>  
                    </th>
                </tr>
                <?php else: ?>
                    <?php $__currentLoopData = $Items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $It): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th class="text-center"><?php echo e($loop->index + 1); ?></th>
                        <th class="text-center text-warning"><?php echo e($It->Room_ID % 1000); ?></th>
                        <th><?php echo e($It->DPM_Name); ?></th>
                        <th><?php echo e($It->Type_Name); ?></th>
                        <th class="text-center"><?php echo e($It->Start); ?></th>
                        <th class="text-center"><?php echo e($It->End); ?></th>
                        <th class="text-center"><?php echo e($Days[$loop->index]); ?></th>
                        <th class="text-center"><?php echo e(number_format($It->Price)); ?></th>
                        <th class="text-center text-primary"><?php echo e(number_format($Days[$loop->index] * $It->Price)); ?></th>
                        <th class="text-center">
                            <a href="/cart/<?php echo e($It->Item); ?>/delete" type="submit" class="btn btn-danger" onclick="return ConfirmDelete(this)">Xóa</a>
                        </th>
                    </tr>

                    <script type="text/javascript">
                        function ConfirmDelete() {
                            var x = confirm("Bạn có muốn xóa phòng này khỏi giỏ hàng không?");
                            if(x) return true;
                            else return false;
                        }
                    </script>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </tbody>
        </table>
        <?php if($Count_Items != 0): ?>
        <nav class="navbar navbar-expand-md text-right pb-md-4">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <h5>Tổng tiền (<?php echo e($Count_Items); ?> phòng): &nbsp; <b class="text-primary" style="font-size: 30px;"><?php echo e(number_format($Total_Price)); ?> đ</b> </h5>
                    <button type="submit" class="btn btn-danger ml-auto">Đặt phòng</button>
                </li>
            </ul>
        </nav>
        <?php endif; ?>
    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Celina\resources\views/cart.blade.php ENDPATH**/ ?>