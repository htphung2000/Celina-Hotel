<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Celina Hotel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://colorlib.com/etc/bootstrap-sidebar/sidebar-01/js/jquery.min.js"></script>
    <script src="https://colorlib.com/etc/bootstrap-sidebar/sidebar-01/js/main.js"></script>
    <script src="https://kungfuphp.com/wp-content/litespeed/localres/ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Morris -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

    <!-- Styles -->
    <link rel="shortcut icon" type="img/png" href="/sources/img/icon.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="https://colorlib.com/etc/bootstrap-sidebar/sidebar-01/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    
    <style>
        html, body{
            height: 100vh;
            width: 100vw;
            font-size: 100%;
            overflow: hidden;
        }
        body, h1, h2, h3, h4, h5, a, p {
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
        img {
            vertical-align: middle;
        }
        .my-custom-scrollbar {
            position: relative;
            height: 450px;
            overflow: auto !important;
        }
        .table-wrapper-scroll-y {
            display: block;
        }
        .my-custom-scrollbar::-webkit-scrollbar, .customer-scrollbar::-webkit-scrollbar, .detail-scrollbar::-webkit-scrollbar, .ctm-scrollbar::-webkit-scrollbar, .stt-scrollbar::-webkit-scrollbar {
            width: 5px;
        }
        .my-custom-scrollbar::-webkit-scrollbar-track, .customer-scrollbar::-webkit-scrollbar-track, .detail-scrollbar::-webkit-scrollbar-track, .ctm-scrollbar::-webkit-scrollbar-track, .stt-scrollbar::-webkit-scrollbar-track {
            background: #eee;
        }
        .my-custom-scrollbar::-webkit-scrollbar-thumb, .customer-scrollbar::-webkit-scrollbar-thumb, .detail-scrollbar::-webkit-scrollbar-thumb, .ctm-scrollbar::-webkit-scrollbar-thumb, .stt-scrollbar::-webkit-scrollbar-thumb {
            border-radius: 1rem;
            background-color: #00d2ff;
            background-image: linear-gradient(to top, #FFFF00 0%, #FF4500 100%);
        }

        .customer-scrollbar {
            position: relative;
            height: 300px;
            overflow: auto !important;
        }
        .detail-scrollbar {
            position: relative;
            height: 320px;
            overflow: auto !important;
        }
        .ctm-scrollbar {
            position: relative;
            height: 550px;
            overflow: auto !important;
        }
        .stt-scrollbar {
            position: relative;
            height: 650px;
            overflow: auto !important;
        }
    </style>

</head>
<body>
    @if (Session::get('id'))
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" style="background: #000" >
            <div class="p-3 pt-5">
                <a href="#" class="img logo rounded-circle img-thumbnail mb-4" style="background-image: url('{{Session::get('Avatar')}}');"></a>
                <ul class="list-unstyled components mb-4 table-wrapper-scroll-y my-custom-scrollbar">
                    <li>
                        <a href="#homeSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Thống kê doanh thu</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu2">
                            <li>
                                <a href="/admin/bill">Danh sách đơn đặt phòng</a>
                            </li>
                            <li>
                                <a href="/admin/statistics">Thống kê</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#homeSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Quản lý chi nhánh</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu3">
                            <li>
                                <a href="/admin/department">Danh sách các chi nhánh</a>
                            </li>
                            <li>
                                <a href="/admin/room-type">Danh sách các loại phòng</a>
                            </li>
                            <li>
                                <a href="/admin/room">Danh sách phòng</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#homeSubmenu4" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Quản lý nhân sự</a>
                        <ul class="collapse list-unstyled" id="homeSubmenu4">
                            <li>
                                <a href="/admin/position">Chức vụ</a>
                            </li>
                            <li>
                                <a href="/admin/employee">Danh sách nhân viên</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/admin/customer" >Danh sách khách hàng</a>
                    </li>
                </ul>

                <div class="footer">
                    <p>
                        Bản quyền &copy; 2000  <a href="/" target="_blank">Celina hotel</a> .</br>
                        Mọi quyền được bảo lưu.
                    </p>
                </div>
            </div>
        </nav>

        <!-- Page Content  --> 
        <div id="content" style="background: url('/sources/img/header_background.jpg'); background-size: cover;">
            <nav class="navbar navbar-expand-md text-center px-5 py-1 mb-3" style="background: none">
                <ul class="navbar-nav ml-auto mt-2">
                    <li class="dropdown border border-white py-1 px-3" style="border-radius: 30px; background: linear-gradient(to right, #00BFFF, #000)">
                        <a href="#" class="dropdown-toggle text-center" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <img src="{{Session::get('Avatar')}}" class="img logo rounded-circle" height="35px" width="35px"> &nbsp;
                            <span class="Username">{{Session::get('Name')}} </span>
                        </a>
                        <ul class="dropdown-menu mx-2 p-2" style="background: #000">
                            <li><a href="/admin/employee/{{Session::get('id')}}" class="px-2"><i class="fas fa-suitcase"></i>&nbsp; Trang cá nhân</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a href="/admin/logout" class="px-2"><i class="fas fa-key"></i>&nbsp; Đăng xuất</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>

            <div class="container">
                @yield('admin_contents')
            </div>
        </div>
    </div>
    @endif
</body>
</html>