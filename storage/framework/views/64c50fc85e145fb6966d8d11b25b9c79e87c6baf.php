
<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background: #000;">
                <div class="card-header text-center text-warning" style="font-size: 30px;">Đăng ký tài khoản</div>
                
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

                <div class="card-body">
                    <form method="POST" action="/register" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <div class="form-group row">
                            <label for="Username" class="col-md-3 col-form-label text-md-right">Tên đăng nhập</label>
                            <div class="col-md-9">
                                <input id="Username" type="text" class="form-control" name="Username" autocomplete="Username" autofocus>
                                <span id="username_error" class="text-warning"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Pass" class="col-md-3 col-form-label text-md-right">Mật khẩu</label>
                            <div class="col-md-9">
                                <input id="Pass" type="password" class="form-control" name="Pass" autocomplete="Pass" autofocus>
                                <span id="passwd_error" class="text-warning"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Password-confirm" class="col-md-3 col-form-label text-md-right">Nhập lại mật khẩu</label>
                            <div class="col-md-9">
                                <input id="Password-confirm" type="password" class="form-control" name="Password-confirm" >
                                <span id="repassword_error" class="text-warning"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="CTM_Name" class="col-md-3 col-form-label text-md-right">Họ và tên</label>
                            <div class="col-md-9">
                                <input id="CTM_Name" type="text" class="form-control" name="CTM_Name" autocomplete="CTM_Name" >
                                <span id="name_error" class="text-warning"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="CTM_DoB" class="col-md-3 col-form-label text-md-right">Ngày sinh</label>
                            <div class="col-md-9">
                                <input id="CTM_DoB" type="date" class="form-control" name="CTM_DoB" autocomplete="CTM_DoB" >
                                <span id="DoB_error" class="text-warning"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="CTM_Gender" class="col-md-3 col-form-label text-md-right">Giới tính</label>
                            <select class="col-md-2 form-control ml-3" name="CTM_Gender" required>
                                <option value="Nam" >Nam</option>
                                <option value="Nữ" >Nữ</option>
                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="CTM_Phone" class="col-md-3 col-form-label text-md-right">Số điện thoại</label>
                            <div class="col-md-9">
                                <input id="CTM_Phone" type="tel" class="form-control" name="CTM_Phone" autocomplete="CTM_Phone" >
                                <span id="phone_error" class="text-warning"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="CTM_Mail" class="col-md-3 col-form-label text-md-right">E-Mail</label>
                            <div class="col-md-9">
                                <input id="CTM_Mail" type="email" class="form-control" name="CTM_Mail" autocomplete="CTM_Mail">
                                <span id="email_error" class="text-warning"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="CTM_Address" class="col-md-3 col-form-label text-md-right">Địa chỉ</label>
                            <div class="col-md-9">
                                <input id="CTM_Address" type="text" class="form-control" name="CTM_Address" autocomplete="CTM_Address">
                                <span id="address_error" class="text-warning"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="CTM_Avatar" class="col-md-3 col-form-label text-md-right">Ảnh đại diện</label>
                            <div class="col-md-9">
                                <input id="CTM_Avatar" type="file" class="form-control" name="CTM_Avatar" autocomplete="CTM_Avatar">
                                <span id="avatar_error" class="text-warning"></span>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" name="register" onclick="return validate(this)" class="btn btn-warning text-center text-white border-white">Đăng ký</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function getValue(id) {
        return document.getElementById(id).value.trim();
    }
 
    function showError(key, mess) {
        document.getElementById(key + '_error').innerHTML = mess;
    }

    function validate() {
        var flap = true;
        var username = getValue('Username');
        var test_username = /^[a-z]+.*[(?=[a-z0-9])|\S+]*$/;
        if (username == '') {
            showError('username', 'Vui lòng nhập tên đăng nhập!');
            flap = false;
        }
        if (username.length > 30 || test_username.test(username) == false) {
            showError('username', 'Tên đăng nhập tối đa 30 kí tự và không bao gồm các kí tự đặc biệt.');
            flap = false;
        }
        
        var passwd = getValue('Pass');
        var test_pass = /^(?=.*[A-Z].*[A-Z])(?=.*[!@#$&*])(?=.*[0-9].*[0-9])(?=.*[a-z].*[a-z].*[a-z]).{8, 16}$/;
        var repassword = getValue('Password-confirm');
        if (passwd == '') {
            showError('passwd', 'Vui lòng nhập mật khẩu!');
            flap = false;
        }
        if (test_pass.test(passwd) == false) {
            showError('passwd', 'Mật khẩu tối thiểu 8 kí tự và tối đa 16 kí tự.');
            flap = false;
        }
        if (passwd != repassword) {
            showError('repassword', 'Mật khẩu không khớp!');
            flap = false;
        }
  
        var name = getValue('CTM_Name');
        var test_name = /^[a-zA-Z]{1, 30}$/;
        if (name == ''){
            showError('name', 'Vui lòng nhập họ và tên!');
            flap = false;
        }
        if(test_name.test(name) == false || name.length > 30){
            showError('name', 'Họ và tên tối đa 30 kí tự, không bao gồm chữ số và kí tự đặc biệt!');
            flap = false;
        }

        var DoB = getValue('CTM_DoB');
        if (DoB == ''){
            showError('DoB', 'Vui lòng chọn ngày sinh!');
            flap = false;
        }

        var phone = getValue('CTM_Phone');
        var test_phone = /^[0-9]{10}$/;
        if (phone == ''){
            showError('phone', 'Vui lòng nhập số điện thoại! ');
            flap = false;
        }
        if (test_phone.test(phone) == false){
            showError('phone', 'Số điện thoại gồm 10 chữ số!');
            flap = false;
        }
        
        var email = getValue('CTM_Mail');
        var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        if (mailformat.test(email) == false){
            showError('email', 'Vui lòng kiểm tra lại Email');
            flap = false;
        }

        var address = getValue('CTM_Address');
        if (address == ''){
            showError('address', 'Vui lòng nhập địa chỉ!');
            flap = false;
        }

        var avatar = getValue('CTM_Avatar');
        if (avatar == '' ){
            showError('avatar', 'Vui lòng chọn ảnh đại diện!');
            flap = false;
        }
        return flap;
    }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\Celina\resources\views/register.blade.php ENDPATH**/ ?>