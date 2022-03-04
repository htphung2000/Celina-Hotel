@extends('master')
@section('content')
<div class="container"> 
    <div class="row"> 
        <div class="col-md-7"> 
            <div class="mg-gallery-container"> 
                <ul class="mg-gallery-thumb" id="mg-gallery-thumb"> 
                    <li><img class="img-fullwidth img-thumbnail" src="https://vnappmob.sgp1.digitaloceanspaces.com/soro/mekongrosehotel/1581561538-4A3ED515-C4B5-4848-A8EB-B1EBBDA504B0.jpg" alt=""></li> 
                </ul> 
            </div> 
        </div> 
        <div class="col-md-5 mg-room-fecilities"> 
            <h3 class="mg-sec-left-title text-warning">Thông tin phòng:</h3> 
            <div class="row"> 
                <div class="col-xs-6"> 
                    <ul class="">
                        <li><i class="fp-ht-food"></i>Diện tích: 20m<sup>2</sup></li>
                    </ul> 
                </div> 
            </div> 
            <br>
            <h3 class="text-warning">Giá phòng:</h3> 
            <h4 class="text-white">500 000 VND</h4>
        </div> 
    </div> 
<div class="row pt-md-3 mb-md-5"> 
    <div class="col-md-12 mg-saerch-room pb70"> 
        <div class="mg-book-now"> <div class="row"> 
            <div class="col-md-12"> 
                <div class="mg-bn-forms"> 
                    <form> 
                        <div class="row justify-content-center align-items-center"> 
                            <div class="col-md-3 col-xs-6"> 
                                <div class="input-group date mg-check-in"> 
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div> 
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ngày nhận phòng"> 
                                </div> 
                            </div> 
                            <div class="col-md-3 col-xs-6"> 
                                <div class="input-group date mg-check-out"> 
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ngày trả phòng"> 
                                </div> 
                            </div> 
                            <div class="col-md-2 col-xs-12"> 
                                <a href="" type="submit" class="btn btn-warning text-center text-white border-white">Đặt phòng</a> 
                            </div> 
                            <div class="col-md-4 col-xs-12"> 
                                <a href="" type="submit" class="btn btn-warning text-center text-white border-white">Thêm vào giỏ</a> 
                            </div> 
                        </form> 
                    </div> 
                </div> 
            </div>
        </div>
    </div> 
</div>
@endsection