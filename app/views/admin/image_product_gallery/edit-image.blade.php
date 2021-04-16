@extends('layout_admin.main')
@section('main-conten')
<div class="page-header" style=" background-color: #FAFAFA;box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.1);">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Chỉnh sửa hình ảnh cho sản phẩm : {{$product->name}} </h2>
    </div>
</div>

<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-10">
            <form action="./save-edit-image?id={{$id}}&id_product={{$product->id}}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Tên hình ảnh : </label>
                            <input type="text" name="name" placeholder="Tên sản phẩm" class="form-control" value="{{$image->name}}">
                            @if(isset($nameErr))
                            <span class="text-danger mt-1">{{$nameErr}}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Hình ảnh : </label>
                            <input type="file" placeholder="Hình ảnh cho sản phẩm" name="image" class="form-control" value="{{$image->image}}">
                            @if(isset($imageErr))
                            <span class="text-danger mt-1">{{$imageErr}}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center align-items-center">
                    <input type="submit" value="Lưu" name="luu" class="btn btn-outline-danger mr-3">
                    <a href="./list-image?id={{$product->id}}" class="btn btn-outline-info">Hủy</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection