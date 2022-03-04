<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

    <!-- Styles -->
    <link rel="shortcut icon" type="img/png" href="/sources/img/icon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <style>
        html, body {
            height: 100vh;
            width: 100vw;
        }
        body, a {
            color: #FFF;
        }
        a:hover {
            text-decoration: none;
            color: #ffc107;
        }
        li {
            list-style-type: none;
        }
        body {
            background: url('/sources/img/admin_login.jpg');
            background-size: cover;
            margin: 0px;
            padding: 0px;
            line-height: 30px;
            font-family: "UTM Androgyne";
            font-size: 20px;
            display: -ms-flexbox;
            display: -webkit-box;
            display: flex;
            -ms-flex-align: center;
            -ms-flex-pack: center;
            -webkit-box-align: center;
            align-items: center;
            -webkit-box-pack: center;
            justify-content: center;
        }  
    </style>

</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background: none;">
                <div class="card-header text-center text-warning" style="font-size: 34px;">Đăng nhập</div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(url('/admin')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="_method" value="POST" />
                        <?php
                            $message = Session::get('message');
                            if ($message){
                                echo 
                                    '<div class="text-center">
                                        <div class="text-danger text-center p-2 mb-4" style="background: #FFE4B5">
                                            <strong>' . $message . '</strong>
                                        </div>
                                    </div> ';
                                Session::put('message', null);
                            }
                        ?>
                        <div class="form-group row">
                            <label for="Email" class="col-md-3 col-form-label text-md-right">Email</label>

                            <div class="col-md-7">
                                <input id="Email" type="text" class="form-control" name="Email" value="" required autocomplete="Email" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Password" class="col-md-3 col-form-label text-md-right">Mật khẩu</label>

                            <div class="col-md-7">
                                <input id="Password" type="password" class="form-control" name="Password" required autocomplete="Password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"/>
                                    <label class="form-check-label" for="remember">Ghi nhớ tài khoản</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-warning text-white text-center border-white">Đăng nhập</button>
                                <a class="btn" href="">Quên mật khẩu?</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<?php /**PATH D:\xampp\htdocs\Celina\resources\views/Admin/login.blade.php ENDPATH**/ ?>