@extends('master')
@section('content')
    <h3 class="text-center text-warning pb-3">Giỏ hàng</h3>

    @if(Session::get('Message'))
        <hr class="bg-warning">
        <div class="alert alert-warning" role="alert">
            {{Session::get('Message')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <?php
                    Session::put('Message', null);
                ?>
            </button>
        </div> 
    @endif

    <form method="POST" action="/cart" enctype="multipart/form-data">
        @csrf
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
                @if($Count_Items == 0)
                <tr>
                    <th class="text-center" colspan="10">
                        <br>
                        <p>Giỏ hàng của bạn còn trống!</p>
                        <a href="/booking" class="btn btn-danger">Đặt phòng</a>  
                    </th>
                </tr>
                @else
                    @foreach($Items as $It)
                    <tr>
                        <th class="text-center">{{$loop->index + 1}}</th>
                        <th class="text-center text-warning">{{$It->Room_ID % 1000}}</th>
                        <th>{{$It->DPM_Name}}</th>
                        <th>{{$It->Type_Name}}</th>
                        <th class="text-center">{{$It->Start}}</th>
                        <th class="text-center">{{$It->End}}</th>
                        <th class="text-center">{{$Days[$loop->index]}}</th>
                        <th class="text-center">{{number_format($It->Price)}}</th>
                        <th class="text-center text-primary">{{number_format($Days[$loop->index] * $It->Price)}}</th>
                        <th class="text-center">
                            <a href="/cart/{{$It->Item}}/delete" type="submit" class="btn btn-danger" onclick="return ConfirmDelete(this)">Xóa</a>
                        </th>
                    </tr>

                    <script type="text/javascript">
                        function ConfirmDelete() {
                            var x = confirm("Bạn có muốn xóa phòng này khỏi giỏ hàng không?");
                            if(x) return true;
                            else return false;
                        }
                    </script>
                    @endforeach
                @endif
            </tbody>
        </table>
        @if($Count_Items != 0)
        <nav class="navbar navbar-expand-md text-right pb-md-4">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <h5>Tổng tiền ({{$Count_Items}} phòng): &nbsp; <b class="text-primary" style="font-size: 30px;">{{number_format($Total_Price)}} đ</b> </h5>
                    <button type="submit" class="btn btn-danger ml-auto">Đặt phòng</button>
                </li>
            </ul>
        </nav>
        @endif
    </form>

@endsection