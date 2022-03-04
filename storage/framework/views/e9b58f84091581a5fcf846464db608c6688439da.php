<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e(config('app.name', 'Celina Hotel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://colorlib.com/etc/bootstrap-sidebar/sidebar-01/js/jquery.min.js"></script>
    <script src="https://colorlib.com/etc/bootstrap-sidebar/sidebar-01/js/main.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://kungfuphp.com/wp-content/litespeed/localres/ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Styles -->
    <link rel="shortcut icon" type="img/png" href="/sources/img/icon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <style>
        html, body{
            height: 100vh;
            width: 100vw;
        }
        body, a, h1, h2, h3, h4, h5, a, p {
            font-family: "UTM Androgyne";
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
            background: #000;
            background-size: cover;
            margin: 0px;
            padding: 0px;
        }  
        header {
            background: url('/sources/img/header_background.jpg'); 
            background-size: cover;
        }
        img {
            vertical-align: middle;
        }
        
    </style>

</head>
<body>
    <div>
        <?php echo $__env->make('header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <main class="px-md-5 mx-md-5 py-2">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
        <?php echo $__env->make('footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</body>
</html>

<?php /**PATH D:\xampp\htdocs\Celina\resources\views/master.blade.php ENDPATH**/ ?>