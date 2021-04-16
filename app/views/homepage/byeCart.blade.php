@extends('homepage.main')
@section('title-main','Mua hàng thành công')
@section('conten-main')

<!-- --------------------- hết header ----------------------------->

<div class="container" style="margin-bottom: 40px;">
    <div class="row d-flex justify-content-center align-items-center mt-5">
        <div class="col-md-6">
            <div class="row d-flex justify-content-center align-items-center">
                <img src="./public/image/tx.png" alt="" width="70px">
            </div>
            <div class="row d-flex justify-content-center align-items-center mt-2">
                <h3>Đặt hàng thành công !</h3>
            </div>
        </div>
    </div>

    <div class="row d-flex justify-content-center align-items-center mt-3">
        <div class="col-md-7">
            <div class="table-order"
                style="width: 100%; border-radius: 0%; border: 2px solid #cca772;height: auto; padding:15px;box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.1);">
                <div class="row d-flex justify-content-center align-items-center text-center">
                    <div class="table-order">
                        <div class="form-group">
                            <h4>Chào :&ensp;<span>{{$orders->customer_name}}</span> !</h4>
                            <p>Chúc mừng bạn đã đặt hàng thành công từ shop The Men của chúng tôi </p>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-12">
                        <div class="row d-flex justify-content-center align-items-center" style="padding-left: 15px;">
                            <p style="font-weight: bold;">Thông tin hóa đơn</p>
                        </div>

                        <div class="row d-flex justify-content-center align-items-center"
                            style="padding-left: 15px; border-bottom: 2px solid #ccc; padding-bottom: 10px;">
                            <table>
                                <tr>
                                    <td width="250px">Mã hóa đơn : </td>
                                    <td style="font-weight: bold;">TM 0<span>{{$orders->id}}</span></td>
                                </tr>

                                <tr>
                                    <td width="250px">Dự kiến giao hàng : </td>
                                    <td style="font-weight: bold;">Từ 3-4 ngày</td>
                                </tr>

                                <tr>
                                    <td width="250px">tổng thanh toán : </td>
                                    <td style="font-weight: bold;"><span style="color: red;">{{number_format($orders->total_price)}} đ</span></td>
                                </tr>

                                <tr>
                                    <td width="250px">Tình trạng : </td>
                                    <td style="font-weight: bold;"><span style="color: red;">Chưa thanh toán</span></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="row mt-2 text-center" style="padding: 15px ;">
                    <p>Mọi thông tin của đơn hàng sẽ được gửi về email của bạn , Vui lòng kiểm tra email để biết thêm
                        thông tin chi tiết và xác nhận đơn hàng của mình . Cảm ơn bạn đã tin tưởng và mua hàng tại The
                        Men . <br> Xin chân thành cảm ơn !</p>

                </div>

                <div class="row d-flex justify-content-center align-items-center">
                    <a href="./" class="btn mr-2"
                        style="border-radius: 0%;border:2px solid #cca772 ;background-color: #cca772;color: white; ">Tiếp
                        tục mua hàng</a>
                    <a href="./" class="btn"
                        style="border-radius: 0%;border:2px solid #cca772 ; background-color: #cca772;color: white;">Chi
                        tiết đơn hàng</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection