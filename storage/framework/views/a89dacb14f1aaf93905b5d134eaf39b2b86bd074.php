

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background: #000;">
                <div class="card-header text-center text-warning" style="font-size: 30px;">Đăng nhập</div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(url('/login')); ?>">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
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
                        <div class="form-group row">
                            <label for="Username" class="col-md-4 col-form-label text-md-right">Tên đăng nhập</label>
                            <div class="col-md-6">
                                <input id="Username" type="text" class="form-control" name="Username" value="" required autocomplete="Username" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Pass" class="col-md-4 col-form-label text-md-right">Mật khẩu</label>
                            <div class="col-md-6">
                                <input id="Pass" type="password" class="form-control" name="Pass" required autocomplete="Pass">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12 text-center">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"/>
                                    <label class="form-check-label" for="remember">Ghi nhớ tài khoản</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" name="login" class="btn btn-warning text-center text-white border-white">Đăng nhập </button>
                            </div>
                        </div>

                    </form>
                </div>

                <div class="text-center">Bạn chưa có tài khoản? <u><a href="/register">Đăng ký</a></u> ngay!</div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Celina\resources\views/login.blade.php ENDPATH**/ ?>