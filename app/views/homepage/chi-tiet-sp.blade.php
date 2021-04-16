@extends('homepage.main')
@section('title-main','Chi tiết sản phẩm')
@section('conten-main')

<!-- --------------------- hết header ----------------------------->

<div class="container">
    <div class="row mt-4 mb-5 nav-ct">
        <li>
            <a href="./"><i class="fa fa-home" aria-hidden="true"></i> &ensp;Trang chủ</a>&ensp;|
        </li>
        <li>
            <a href="./product-cate?id={{$cate->id}}">{{$cate->name}}</a>&ensp;|
        </li>
        <li>
            <a href="#">{{$sp->name}}</a>&ensp;|
        </li>
    </div>

    <div class="row">
        <div class="col-md-1">
            <li class="hehe">
                <img src="{{$sp->image}}" alt="" width="100%" width="70px" height="100px"
                    class="img_small[100] img-border" style="margin-bottom: 20px; cursor: pointer;" id="100"
                    onclick="changeImage('100')">
            </li>
            @foreach($images as $im)
            <li class="hehe">
                <img src="{{$im->image}}" alt="" width="70px" height="100px" class="img_small[{{$im->id}}] img-border"
                    style="margin-bottom: 20px; cursor: pointer;" id="{{$im->id}}" onclick="changeImage('{{$im->id}}')"
                    onblur="click('$im->id')" onclick="this.focus()">
            </li>
            @endforeach
        </div>

        <div class="col-md-6">
            <img src="{{$sp->image}}" alt="" width="100%" height="725px" id="mainImage">
        </div>
        <div class="col-md-5" style="padding: 0px 20px;">
            <div class="row">
                <div class="ctsp-detall">
                    <h2 style="color: black;">
                        Thông tin sản phẩm <span class="icon-open active"></span></h2>
                    <p>Tên sản phẩm : <span>{{$sp->name}}</span></p>
                    <p>Giá : <span>{{number_format($sp->price)}} <u>đ</u></span></p>
                    <p>Số lượt xem : {{$sp->number_of_views}} lượt xem </p>

                </div>
            </div>

            <div class="row">

            </div>

            <div class="row">
                <button class="btn btn-ct" onclick="addCart(<?php echo $sp['id'];?>)"><i class="fa fa-shopping-cart"
                        aria-hidden="true"></i> Thêm vào
                    giỏ hàng</button>
                <a href="" class="btn btn-ct" style="margin-left: 10px;"><i class="fa fa-shopping-cart"
                        aria-hidden="true"></i> Mua ngay</a>
            </div>

            <div class="row mt-4">
                <div class="product-description">
                    <div class="title-bl">
                        <h2 style="color: white;">
                            Chính sách từ Tony4men <span class="icon-open active"></span></h2>
                    </div>
                    <div class="description-content" style="display: block;">
                        <div class="description-productdetail">
                            <div class="description-productdetail">

                                <li style="margin:10px 0px;padding:0px;list-style:none;">&nbsp;►Đổi hàng&nbsp;trong
                                    vòng 3 ngày.</li>
                                <li style="margin:10px 0px;padding:0px;list-style:none;">&nbsp;►Giảm 10% trên tổng
                                    hóa đơn khi mua hàng ( tại cửa hàng ) vào tuần sinh nhật ( trước và sau ngày
                                    sinh nhật 3 ngày ).</li>
                                <li style="margin:10px 0px;padding:0px;list-style:none;">&nbsp;►Giao hàng nội thành
                                    Hà Nội chỉ từ 15.000đ trong vòng 24 giờ.</li>
                                <li style="margin:10px 0px;padding:0px;list-style:none;">&nbsp;►Tích điểm 3-10% giá
                                    trị đơn hàng cho mỗi lần mua và trừ tiền vào lần mua tiếp theo.</li>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="product-description">
                    <div class="title-bl">
                        <h2 style="color: white;">
                            Các cách bảo quản sản phẩm tốt <span class="icon-open active"></span></h2>
                    </div>
                    <div class="description-content" style="display: block;">
                        <div class="description-productdetail">
                            <div class="description-productdetail">

                                <li style="margin:10px 0px;padding:0px;list-style:none;">&nbsp;►Tránh ánh ánh nắng trực
                                    tiếp khi phơi.</li>
                                <li style="margin:10px 0px;padding:0px;list-style:none;">&nbsp;►Cần sửa dụng bột giặt có
                                    chất lượng , tránh sửa dụng hàng kém chất lượng &ensp; làm ảnh hướng đến áo.</li>
                                <li style="margin:10px 0px;padding:0px;list-style:none;">&nbsp;►Giặt máy thỏa mái không
                                    cần phải suy nghĩ.</li>
                                <li style="margin:10px 0px;padding:0px;list-style:none;">&nbsp;►Tích điểm 3-10% giá
                                    trị đơn hàng cho mỗi lần mua và trừ tiền vào lần mua tiếp theo.</li>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- -------------------- bình luận ----------------------- -->
    <h4 class="mt-5" style="text-transform: uppercase;;margin-bottom: 20px;">Bình luận</h4>
    <?php if(isset($_GET['msg'])) { ?>
    <p style="color: #6699ff;">
        <?php echo $_GET['msg'] ?>
    </p>
    <?php } ?>
    <div class="row">
        <div class="col-md-1" style="border-right: 5px solid #ccc;">
            @if(isset($_SESSION['admin']) && !empty($_SESSION['admin']))
            <img src="./{{$_SESSION['admin']['image']}}" alt="" width="100%" height="70px"
                style="border: 1px solid #cca772; ">
            @elseif(isset($_SESSION['khach_hang']) && !empty($_SESSION['khach_hang']))
            <img src="./{{$_SESSION['khach_hang']['image']}}" alt="" width="100%" height="70px"
                style="border: 1px solid #cca772; ">
            @else

            @endif
        </div>
        <div class="col-md-11">
            <form action="./add-comment?id_product={{$sp->id}}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea name="content" cols="120" rows="2"
                                style="width: 100%;height: 70px; border: 1px solid #cca772 ; border-radius: 0%;"
                                placeholder="Viết bình luận..." class="form-control" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" value="Bình luận" class="btn btn-outline-danger" name="luu"
                                style="background-color: #cca772; color: white; border: none; border-radius: 0%;">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <!-- ----------------- in bình luận -------------------->
    @foreach($comment as $com)
    <div class="row mb-3">
        <div class="col-md-1"></div>
        <div class="col-md-11">
            <div class="row">
                <div class="col-md-1" style="border-right: 5px solid #ccc;">
                    <div class="box-img">
                        <img src="./{{$com->image_user}}" alt="" width="60px" height="70px"
                            style="border: 1px solid #cca772;">
                    </div>
                </div>

                <div class="col-md-11">
                    <div class="box-detail" style="border: 1px solid #cca772; padding: 15px; font-style: italic;">
                        <div class="row">
                            <div class="col-md-10">
                                <p><span>{{$com->name_user}}</span> ,Việt Nam <br> <span>Day :
                                        {{$com->created_at}}</span> </p>
                            </div>

                            <div class="col-md-2">
                                <?php
                                            if (isset($_SESSION['khach_hang'])) {
                                                    if ($com->id_user == $_SESSION['khach_hang']['id']) { ?>
                                <a class="btn btn-block"
                                    style="background-color: #CCA772; border-radius: 0%; border: none; color: white; margin-top: -7px;"
                                    href="./delete-comment?id={{$com->id}}&id_product={{$com->id_product}}">Xóa</a>
                                <?php

                                            }
                                                } else if (isset($_SESSION['admin']))
                                                        if ($com->id_user == $_SESSION['admin']['id']) { ?>
                                <a class="btn btn-block"
                                    style="background-color: #CCA772; border-radius: 0%; border: none; color: white; margin-top: -7px;"
                                    href="./delete-comment?id={{$com->id}}&id_product={{$com->id_product}}">Xóa</a>

                                <?php } ?>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <p>{{$com->content}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach


    <!-- --------------- end in bình luận --------------- -->



    <!-- ----------------------------- end bình luận --------------------------- -->

    <div class="row mt-5"
        style="border-bottom: 2px solid #cccc;box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.2); padding-top: 20px;">
        <h4 style="text-transform: uppercase;;margin-bottom: 20px;">Sản phẩm liên quan</h4>
        <hr>
    </div>
    <div class="row mt-3">
        @if(count($spmv) > 0)
        <div class="sp-moi-ve" style="height: 470px;">
            @foreach($spmv as $spmv)
            <div class="all-sp-moi-ve" style="height: 440px;">
                <div class="image-spmv">
                    <img src="{{$spmv->image}}" alt="" width="100%" height="100%">
                </div>
                <div class="detail-spmv">
                    <div class="detail-spmv-price">
                        <span>{{$spmv->name}}</span> <br>
                        <span>{{number_format($spmv->price)}} <u>đ</u></span>
                    </div>

                    <div class="detail-spmv-but">
                        <a href="./chi-tiet-sp?id={{$spmv->id}}" class="btn btn-xem"><i class="fa fa-eye"
                                aria-hidden="true"></i> Xem chi tiết</a>
                        <button class="btn btn-xem" onclick="addCart(<?php echo $spmv['id'];?>)"><i
                                class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào
                            giỏ hàng</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <p style="margin-left: 480px; margin-top: 20px;">Không có sản phẩm liên quan nào !</p>
        @endif
    </div>
</div>
<script>
// hamf chuyeenr anh  
function changeImage(id) {
    var a = 0;
    let element = document.getElementById(id);
    let imagePath = element.getAttribute('src');
    document.getElementById('mainImage').setAttribute('src', imagePath);

    let list = document.getElementsByClassName('img-border');

    for (let i = 0; i < list.length; i++) {
        list[i].style.border = 'none';
        list[i].style.opacity = "1";
    }


    element.style.border = '2px solid #cca772';
    element.style.opacity = "0.8";
    element.style.padding = "5px";

}
</script>
@endsection