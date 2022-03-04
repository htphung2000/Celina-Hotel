<header>
    <nav class="navbar navbar-expand-md text-center px-5 py-2">
        <ul class="navbar-nav ml-auto">
            @if(Session::get('Customer_ID'))
            <li class="nav-item">
                <a class="nav-link text-center" href="/cart">
                    <i class="fas fa-shopping-cart fa-lg"></i>
                </a>
            </li>
            &nbsp; &nbsp;
            <li class="dropdown py-2">
                <a href="#" class="dropdown-toggle text-center mr-5" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="{{Session::get('Customer_Avatar')}}" class="img logo rounded-circle" height="35px" width="35px"> &nbsp;
                    <span class="Username">{{Session::get('Customer_Name')}} </span>
                </a>
                <ul class="dropdown-menu" style="background: #000">
                    <li><a href="/personal" class="m-2">Thông tin cá nhân</a></li>
                    <li><a href="/history" class="m-2">Lịch sử đặt phòng</a></li>
                    <li><a href="/logout" class="m-2">Đăng xuất</a></li>
                </ul>
            </li>
            @else
            <li class="nav-item">
                <a href="/login" class="nav-link text-white mx-md-2">Đăng nhập</a>
            </li>
            <li class="nav-item">
                <a href="/register" class="nav-link text-white mx-md-2">Đăng ký</a>
            </li>
            @endif
        </ul>
    </nav>

    <!-- LOGO -->
    <div class="top-banner text-center p-4">
        <a href=""><img src="/sources/img/logo1.png" height="100px"/></a>
    </div>

    <marquee class="text-warning pt-3" style="font-size: 20px;">Chào mừng bạn đến với khách sạn Celina!</marquee>

    <!-- MENU BAR -->
    <nav class="navbar navbar-expand-md text-center text-white px-md-5 pt-md-1">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link text-center mx-2" href="/"><img src="/sources/img/home.png" height="20px"/></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center mx-2" href="/intro">GIỚI THIỆU</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center mx-2" href="/booking">ĐẶT PHÒNG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center mx-2" href="/contact">LIÊN HỆ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center mx-2" href="/help">TRỢ GIÚP</a>
                </li>
            </ul>
        </div>

        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <p class="mr-5">HOTLINE: &nbsp; 0292 444 888 </p>
                </li>
            </ul>
        </div>
    </nav>
</header>