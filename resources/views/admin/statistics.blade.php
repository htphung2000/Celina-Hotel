@extends('admin.layout')
@section('admin_contents')
    <h2 class="text-center text-warning pb-2">Thống kê</h2>
    <div class="container form-group row m-0">
        <div class="col-md-3 col-sm-3">
            <div class="card text-white bg-warning mb-3" >
                <div class="card-header text-center">Số lượng chi nhánh</div>
                <div class="card-body">
                    <h5 class="card-title text-center">{{$Departments->count()}}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header text-center">Số lượng khách hàng</div>
                <div class="card-body">
                    <h5 class="card-title text-center">{{$Customers->count()}}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-header text-center">Số đơn dã đặt</div>
                <div class="card-body">
                    <h5 class="card-title text-center">{{$Booked->count()}}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header text-center">Số đơn dã hoàn thành</div>
                <div class="card-body">
                    <h5 class="card-title text-center">{{$Completed->count()}}</h5>
                </div>
            </div>
        </div>
    </div>

    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="monthly-tab" data-toggle="tab" href="#monthly" role="tab" aria-controls="month" aria-selected="true">Doanh thu các tháng trong năm {{$Current_Year}}</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="yearly-tab" data-toggle="tab" href="#yearly" role="tab" aria-controls="year" aria-selected="false">Doanh thu các năm</a>
        </li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
            <div id="monthly_chart" style="height: 400px;"></div>
        </div>
        <div class="tab-pane" id="yearly" role="tabpanel" aria-labelledby="yearly-tab">
            <div id="yearly_chart" style="height: 400px;"></div>
        </div>

        <script type="text/javascript">
                Morris.Line({
                    lineColors: ['#ffc107'],
                    pointFillColor: ['#ffffff'],
                    behaveLikeLine: true,
                    element: 'monthly_chart',
                    data: [
                        @foreach($Months as $Month)
                        { month: '{{$Month->Year}}-{{$Month->Month}}', sales: {{$Month->Sales}} },
                        @endforeach
                    ],
                    xkey: ['month'],
                    ykeys: ['sales'],
                    labels: ['Doanh thu']
                });

                Morris.Line({
                    lineColors: ['#ffc107'],
                    pointFillColor: ['#ffffff'],
                    behaveLikeLine: true,
                    element: 'yearly_chart',
                    data: [
                        @foreach($Years as $Year)
                        { year: '{{$Year->Yr}}', sales: {{$Year->Sale}} },
                        @endforeach
                    ],
                    xkey: ['year'],
                    ykeys: ['sales'],
                    labels: ['Doanh thu']
                });
        </script>
    </div>
@endsection