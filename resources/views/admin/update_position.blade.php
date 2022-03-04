@extends('admin.layout')
@section('admin_contents')
    @foreach($Salaries as $Sal)
    <form method="POST" action="/admin/position/{{$Sal->ID_Position}}/update" class="py-5" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="_method" value="POST" />
        <h3 class="text-warning text-center pb-3 col-md-9">Chỉnh sửa chức vụ</h3>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Chức vụ</b></div>
            <div class="col-md-6">
                <input id="Position" type="text" class="form-control" name="Position" value="{{$Sal->Position}}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Lương</b></div>
            <div class="col-md-6">
                <input id="Sal" type="text" class="form-control" name="Sal" value="{{$Sal->Sal}}" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"><b>Phụ cấp</b></div>
            <div class="col-md-6">
                <input id="Allowance" type="text" class="form-control" name="Allowance" value="{{$Sal->Allowance}}" required>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-2 col-form-label text-md-right"></div>
            <div class="col-md-6">
                <i class="fas fa-asterisk"></i>&nbsp; <i>Phụ cấp (đơn vị: %) được tính dựa trên lương.</i>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-9 text-center">
                <button type="submit" class="btn btn-warning text-center text-white border-white">Cập nhật</button>
            </div>
        </div>
    </form>
    @endforeach
@endsection