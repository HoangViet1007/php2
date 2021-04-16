@extends('layout_admin.main')
@section('main-conten')
<div class="page-header" style=" background-color: #FAFAFA;box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.1);">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Danh sách hình ảnh của sản phẩm : {{$product->name}}</h2>
    </div>
</div>

<div class="container">
<p class="text-danger text-center">{{$errMsg}}</p>
    <div class="row d-flex justify-content-center align-items-center">

        <div class="col-md-8">
            <table class="table table-hover" style="border: 3px solid #FAFAFA;">
                <thead class="thead-dark">
                    <th>ID</th>
                    <th>TÊN SẢN PHẨM</th>
                    <th>TÊN HÌNH ẢNH</th>
                    <th>HÌNH ẢNH</th>
                    <th width="130">
                        <a href="./add-image?id={{$product->id}}" class=" btn btn-info" style="width: 88px;text-align: center;"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                    </th>
                </thead>

                <tbody>
                    @foreach($images as $pro)
                    <tr>
                        <td>{{$pro->id}}</td>
                        <td>{{$pro->name_product}}</td>
                        <td>{{$pro->name}}</td>
                        <td>
                           <img src="{{$pro->image}}" alt="" width="60px" height="60px">
                        </td>
                        <td>
                            <a href="./edit-image?id={{$pro->id}}&id_product={{$pro->id_product}}" class="btn btn-danger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="./delete-image?id={{$pro->id}}&id_product={{$pro->id_product}}" class="btn btn-info" onclick="return confirm('Bạn có chắc chắn muốn xóa hình ảnh này không ?')"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="12">
                            <a href="./list-product" class="btn btn-info btn-sm">
                                Quay lại danh sách sản phẩm 
                            </a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection