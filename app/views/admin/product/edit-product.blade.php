@extends('layout_admin.main')
@section('main-conten')
<div class="page-header" style=" background-color: #FAFAFA;box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.1);">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Chỉnh sửa sản phẩm</h2>
    </div>
</div>

<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
        <form action="./save-edit-product?id={{$product->id}}" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tên sản phẩm : </label>
                        <input type="text" name="name" placeholder="Tên sản phẩm" class="form-control" value="{{$product->name}}">
                        @if(isset($nameErr))
                            <span class="text-danger mt-1">{{$nameErr}}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="">Ảnh sản phẩm : </label>
                        <input type="file" name="image" placeholder="Ảnh sản phẩm" class="form-control" value="{{$product->image}}">
                        @if(isset($imageErr))
                            <span class="text-danger mt-1">{{$imageErr}}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="">Giá sản phẩm : </label>
                        <input type="text" name="price" placeholder="Giá sản phẩm" class="form-control" value="{{$product->price}}">
                        @if(isset($priceErr))
                            <span class="text-danger mt-1">{{$priceErr}}</span>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Giảm giá : </label>
                        <input type="text" name="sale" placeholder="Giảm giá" class="form-control" value="{{$product->sale}}">
                        @if(isset($saleErr))
                            <span class="text-danger mt-1">{{$saleErr}}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="">Số lượt xem : </label>
                        <input type="text" name="number_of_views" placeholder="Số lượt xem" class="form-control" value="{{$product->number_of_views	}}">
                        @if(isset($number_of_viewsErr))
                            <span class="text-danger mt-1">{{$number_of_viewsErr}}</span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="">Danh mục sản phẩm : </label>
                        <select name="id_category" class="form-control">
                            <option value="">Chọn danh mục sản phẩm</option>
                             @foreach($cates as $cate)
                                <option  @if($cate->id == $product->id_category) selected @endif
                                 value="{{$cate->id}}">{{$cate->name}}</option>
                             @endforeach
                        </select>
                        @if(isset($id_categoryErr))
                            <span class="text-danger mt-1">{{$id_categoryErr}}</span>
                        @endif
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-center align-items-center">
                <div class="form-group">
                    <label for="">Mô tả : </label>
                    <textarea name="description" cols="80" rows="3" class="form-control" placeholder="Mô tả" id="full-featured-non-premium">{!!$product->description!!}</textarea>
                    @if(isset($descriptionErr))
                            <span class="text-danger mt-1">{{$descriptionErr}}</span>
                    @endif
                </div>
            </div>

            <div class="row d-flex justify-content-center align-items-center">
                <input type="submit" value="Lưu" name="luu" class="btn btn-outline-danger mr-3">
                <a href="./list-product" class="btn btn-outline-info">Hủy</a>
            </div>
        </form>
    </div>
</div>
@endsection