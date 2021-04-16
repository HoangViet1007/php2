@extends('layout_admin.main')
@section('main-conten')
<div class="page-header" style=" background-color: #FAFAFA;box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.1);">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Chi tiết hóa đơn : TM0<span>{{$id}}</span></h2>
    </div>
</div>

<div class="container">
    <p class="text-danger text-center">{{$errMsg}}</p>
    <div class="row d-flex justify-content-center align-items-center">

        <div class="col-md-8">
            <table class="table table-hover" style="border: 3px solid #FAFAFA;font-size: 13px; text-align: left;">
                <thead class="thead-dark" style="font-size: 11px;">
                    <th>IDSP</th>
                    <th>TÊN SẢN PHẨM</th>
                    <th>HÌNH ẢNH</th>
                    <th>SỐ LƯỢNG</th>
                    <th>MÃ HÓA ĐƠN</th>
                    <!-- <th>QUẢN LÍ</th> -->
                </thead>

                <tbody>
                    @foreach($ordersDetail as $pro)
                    <tr>
                        <td>{{$pro->id_product}}</td>
                        <td>{{$pro->name_product}}</td>
                        <td>
                            <img src="./{{$pro->image_product}}" width="50px" alt="">
                        </td>
                        <td>{{$pro->quantity}}</td>
                        <td>{{$pro->id_orders}}</td>
                        <!-- <td>
                            <a href="./delete-detail?id={{$pro->id}}" class="btn btn-info"><i
                                    class="fa fa-share-square-o" aria-hidden="true"></i></a>
                        </td> -->
                    </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="12">
                            <a href="./list-orders" class="btn btn-info btn-sm">
                                Quay lại danh sách hóa đơn
                            </a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection