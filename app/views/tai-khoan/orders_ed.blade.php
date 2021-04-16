@extends('homepage.account')
@section('title-account','Đơn hàng đã mua')
@section('title-cn','Đơn hàng đã mua')
@section('conten-account')
<div class="content" style="margin-top: -80px;margin-bottom: -100px;">
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <table class="table table-bordered" style="width:100%;font-size: 13px;">
                    <thead style="background-color: #cca772;color: white; text-align: center;">
                        <th>Mã hóa đơn</th>
                        <th>Tên</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>email</th>
                        <th>Tổng tiền</th>
                        <th>QL</th>
                    </thead>
                    <tbody>
                        @foreach($orders_ed as $a)
                        <tr>
                            <td>TM-{{$a->id}}</td>
                            <td>{{$a->customer_name}}</td>
                            <td>{{$a->customer_address}}</td>
                            <td>{{$a->customer_phone}}</td>
                            <td>{{$a->customer_email}}</td>
                            <td>{{number_format($a->total_price)}}đ</td>
                            <td>
                                <a href="">
                                    <i class="fa fa-share-square-o" aria-hidden="true" style="color: #cca772;"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-md-1">
                <img src="./public/image/cart.jpg" style="width: 80px; margin-left: -20px;" alt="">
            </div>
        </div>
    </div>
</div>

@endsection