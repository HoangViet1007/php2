@extends('homepage.main')
@section('title-main','Giỏ hàng')
@section('conten-main')

<!-- --------------------- hết header ----------------------------->
<style>
.delete:hover {
    color: gray;
    background-color: #cca772;
    transition: all 0.5s;
    transform: scale(1.03);
}
</style>
<div class="container">
    <div class="row mt-4" style="border-bottom: 2px solid #ccc;box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.1);">
        @if(isset($products))
        <div class="col-md-12">
            <h2 style="font-size: 30px;">Giỏ hàng</h2>
            <?php
                $number = 0 ; 
                $price = 0 ; 
                if(isset($_SESSION['cart'])){
                    $cart = $_SESSION['cart'] ; 
                    foreach ($cart as $key => $value) {
                        $number += (int)$value['number'] ; 
                        $price += (int)$value['price'] * $value['number']  ; 
                    }
                }
            ?>
            <p>(Có <?php echo $number ?> sản phẩm trong giỏ !)</p>
        </div>

        <!-- <div class="col-md-3" style="margin-left: -7px;">
            <div class="row">
                <a href="" class="btn btn-outline-danger delete"
                    style="border: 2px solid #cca772; background-color: white; color: gray; border-radius: 0%;margin-left: 10px;transition: all 0.5s;width: 90px;">Xóa
                    &ensp;<i class="fa fa-shopping-cart" aria-hidden="true"></i></a>

                <a href="" class="btn btn-outline-danger delete"
                    style="border: 2px solid #cca772; background-color: white; color: gray; border-radius: 0%;margin-left: 10px;transition: all 0.5s;width: 100px;">Update
                    &ensp;<i class="fa fa-shopping-cart" aria-hidden="true"></i></a>
            </div>
        </div> -->
        @endif
    </div>

    <div class="row mt-2">
        @if(isset($errMsg))
        <p class="text-danger text-center ml-3">{{$errMsg}}</p>
        @endif
    </div>

    <div class="row">
        <div class="col-md-9">
            @if(isset($products))
            <form action="./updatecart" method="POST">
                <table class="table table-bordered">
                    <thead class="text-center" style="background-color: #cca772; color: white;">
                        <th>ID</th>
                        <th>TÊN SẢN PHẨM</th>
                        <th>HÌNH ẢNH</th>
                        <th>GIÁ CẢ</th>
                        <th width="100">SL</th>
                        <th>TỔNG TIỀN</th>
                        <th>QUẢN LÍ</th>
                    </thead>

                    <tbody>
                        @foreach($products as $pr)
                        <tr>
                            <td class="text-center">{{$pr['id']}}</td>
                            <td>{{$pr['name']}}</td>
                            <td class="text-center">
                                <img src="./{{$pr['image']}}" alt="" width="60px" height="60px">
                            </td>
                            <td class="text-center">{{number_format($pr['price'])}}đ</td>
                            <td class="text-center">
                                <input type="number" name="number[{{$pr['id']}}]" value="{{$pr['number']}}" min="1"
                                    class="form-control">
                            </td>
                            <td class="text-center">{{number_format($pr['price'] * $pr['number'])}} đ</td>
                            <td class="text-center">
                                <a href="./delete-shoppingcart?id={{$pr['id']}}" class="btn btn-outline-info"><i
                                        class="fa fa-times" aria-hidden="true"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr>
                            <td colspan="6">
                                Tổng tiền : <?php echo number_format($price) ?>đ
                            </td>
                            <td class="text-center">
                                <a href="./deletecart" class="btn btn-outline-info mr-2"
                                    onclick="return confirm('Bạn có chắc chắn muốn xóa giỏ hàng không ?')"><i
                                        class="fa fa-trash" aria-hidden="true"></i></a>
                                <button type="submit" class="btn btn-outline-info"><i class="fa fa-pencil"
                                        aria-hidden="true"></i></button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </form>
            @else
            <p>Không có sản phẩm nào trong giỏ hàng !</p>
            @endif
        </div>

        @if(isset($products))
        <div class="col-md-3">
            @if($number > 0)
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered" style="width:100%;">
                        <tr>
                            <td>Thành tiền :</td>
                            <td><?php echo number_format($price) ?>đ</td>
                        </tr>
                        <tr>
                            <td>Giảm giá :</td>
                            <td>0%</td>
                        </tr>
                        <tr style="text-align: center;font-size: 13px;">
                            <td colspan="2">Đã bao gồm cả thuế VAT</td>
                        </tr>
                        <tr onclick="showForm()"
                            style="background-color: #cca772; color: white;text-align: center;cursor: pointer; margin-top: 5px;">
                            <td colspan="2">Tiến hành thanh toán</td>
                        </tr>

                    </table>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <img src="./public/image/shopping.svg" alt="" width="100%">
                </div>
            </div>
        </div>
        @endif
    </div>

    <div class="row form-order" style="display: none;">
        <h2 style="font-size: 30px;">Form đặt hàng</h2>

    </div>
    @if(isset($_SESSION['khach_hang']))
    <div class="row form-order" style="display: none;">
        <div class="col-md-9">
            <form action="./order" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12" style="display: none;">
                        <div class="form-group">
                            <label for="">ID Khách hàng</label>
                            <input type="text" placeholder="ID" name="id"
                                value="<?php echo $_SESSION['khach_hang']['id'] ?>" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tên khách hàng <span style="color: red;">*</span></label>
                            <input type="text" placeholder="Họ và tên" name="customer_name" class="form-control"
                                value="{{$_SESSION['khach_hang']['name']}}" readonly>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Địa chỉ <span style="color: red;">*</span></label>
                            <input type="text" placeholder="Địa chỉ" name="customer_address" class="form-control"
                                value="{{$_SESSION['khach_hang']['address']}}" readonly>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Số điện thoại <span style="color: red;">*</span></label>
                            <input type="text" placeholder="Số điện thoại" name="customer_phone" class="form-control"
                                value="{{$_SESSION['khach_hang']['phone']}}" readonly>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Email <span style="color: red;">*</span></label>
                            <input type="text" placeholder="Email" name="customer_email" class="form-control"
                                value="{{$_SESSION['khach_hang']['email']}}" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Tổng tiền</label>
                            <input type="text" placeholder="Tổng tiền" name="total_price" value="<?php echo $price ?>"
                                class="form-control" readonly>
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-ct mr-2" style="margin-left: 10px;"><i
                            class="fa fa-shopping-cart" aria-hidden="true"></i> Mua ngay</button>
                    <a href="./" class="btn btn-ct">Hủy</a>
                </div>

            </form>
        </div>
    </div>
    @elseif(isset($_SESSION['admin']))
    <div class="row form-order" style="display: none;">
        <div class="col-md-9">
            <form action="./order" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group" style="display: none;">
                            <label for="">ID ADmin</label>
                            <input type="text" placeholder="ID" name="id" value="<?php echo $_SESSION['admin']['id'] ?>"
                                class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tên khách hàng <span style="color: red;">*</span></label>
                            <input type="text" placeholder="Họ và tên" name="customer_name" class="form-control"
                                value="{{$_SESSION['admin']['name']}}" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Địa chỉ <span style="color: red;">*</span></label>
                            <input type="text" placeholder="Địa chỉ" name="customer_address" class="form-control"
                                value="{{$_SESSION['admin']['address']}}" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Số điện thoại <span style="color: red;">*</span></label>
                            <input type="text" placeholder="Số điện thoại" name="customer_phone" class="form-control"
                                value="{{$_SESSION['admin']['phone']}}" readonly>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Email <span style="color: red;">*</span></label>
                            <input type="text" placeholder="Email" name="customer_email" class="form-control"
                                value="{{$_SESSION['admin']['email']}}" readonly>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Tổng tiền</label>
                            <input type="text" placeholder="Tổng tiền" name="total_price" value="<?php echo $price ?>"
                                class="form-control" readonly>
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-ct mr-2" style="margin-left: 10px;"><i
                            class="fa fa-shopping-cart" aria-hidden="true"></i> Mua ngay</button>
                    <a href="./" class="btn btn-ct">Hủy</a>
                </div>

            </form>
        </div>
    </div>
    @else
    <div class="row form-order" style="display: none;">
        <div class="col-md-9">
            <form action="./order" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12" style="display: none;">
                        <div class="form-group">
                            <label for="">ID Khách hàng</label>
                            <input type="text" placeholder="ID" name="id"
                                value="0" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tên khách hàng <span style="color: red;">*</span></label>
                            <input type="text" placeholder="Họ và tên" name="customer_name" class="form-control">
                            @if(isset($customer_nameErr))
                            <span class="text-danger mt-1">{{$customer_nameErr}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Địa chỉ <span style="color: red;">*</span></label>
                            <input type="text" placeholder="Địa chỉ" name="customer_address" class="form-control">
                            @if(isset($customer_addressErr))
                            <span class="text-danger mt-1">{{$customer_addressErr}}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Số điện thoại <span style="color: red;">*</span></label>
                            <input type="text" placeholder="Số điện thoại" name="customer_phone" class="form-control">
                            @if(isset($customer_phoneErr))
                            <span class="text-danger mt-1">{{$customer_phoneErr}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Email <span style="color: red;">*</span></label>
                            <input type="text" placeholder="Email" name="customer_email" class="form-control">
                            @if(isset($customer_emailErr))
                            <span class="text-danger mt-1">{{$customer_emailErr}}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Tổng tiền</label>
                            <input type="text" placeholder="Tổng tiền" name="total_price" value="<?php echo $price ?>"
                                class="form-control" readonly>
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-ct mr-2" style="margin-left: 10px;"><i
                            class="fa fa-shopping-cart" aria-hidden="true"></i> Mua ngay</button>
                    <a href="./" class="btn btn-ct">Hủy</a>
                </div>

            </form>
        </div>
    </div>
    @endif

</div>
<script>
function showForm() {
    $(".form-order").slideToggle();
}
</script>
@endsection