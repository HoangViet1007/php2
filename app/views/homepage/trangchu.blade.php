@extends('homepage.index')
@section('title','Trang chủ')
@section('conten')
<div class="container-fluid">
    <div class="row mt-4">
        @include('layout.category')
        @include('layout.slide')
    </div>
</div>
<!-- --------------------- hết header ----------------------------->
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-12">
            <marquee style="height: 40px; background-color: #F2F2F2; color: #CCA772; padding-top: 7px;">
                Chào mừng quý khách đến với shop của chúng tôi , chúc quý khách có một trải nghiệm thú vị tại shop ,
                Xin
                chân thành cảm ơn !
            </marquee>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <h4 style="text-transform: uppercase; margin-top: 30px;margin-bottom: 20px; font-size: 30px;">Sản phẩm mới về
        </h4>
    </div>
    <div class="row">
        <div class="sp-moi-ve owl-carousel owl-theme" style="height: 470px;">
            @foreach($spmv as $spmv)
            <div class="all-sp-moi-ve item" style="height: 440px;">
                <div class="image-spmv">
                    <img src="{{$spmv->image}}" alt="" width="100%" height="100%">
                </div>
                <div class="detail-spmv">
                    <div class="detail-spmv-price">
                        <span>{{$spmv->name}}</span> <br>
                        <span> <del style="font-size: 14px;color: gray;">{{number_format($spmv->price - (($spmv->price * $spmv->sale) / 100))}} đ</del> &ensp; {{number_format($spmv->price)}} <u>đ</u></span>
                    </div>

                    <div class="detail-spmv-but">
                        <a href="./chi-tiet-sp?id={{$spmv->id}}" class="btn btn-xem"><i class="fa fa-eye"
                                aria-hidden="true"></i> Xem chi tiết</a>
                        <button class="btn btn-xem" onclick="addCart(<?php echo $spmv['id'];?>)"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào
                            giỏ hàng</button>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

    <!-- --------------- sản phẩm áo -------------->
    <div class="row" style=" margin-top: 45px;margin-bottom: 20px;">
        <li class="nav-item">
            <a class="nav-link" href="#">
                <h4 style="text-transform: uppercase;font-size: 30px;margin-top: -10px;">ÁO NAM</h4>
            </a>
        </li>

        @foreach($shirt as $shirt)
        <li class="nav-item">
            <a class="nav-link" href="./product-cate?id={{$shirt->id}}">{{$shirt->name}}</a>
        </li>
        @endforeach
    </div>

    <div class="row">
        <div class="list-product">
            @foreach($shirtAo as $Ao)
            <div class="all-sp-moi-ve" style="height: 440px;">
                <div class="image-spmv">
                    <img src="{{$Ao->image}}" alt="" width="100%" height="100%">
                </div>
                <div class="detail-spmv">
                    <div class="detail-spmv-price">
                        <span>{{$Ao->name}}</span> <br>
                        <span><del style="font-size: 14px;color: gray;">{{number_format($Ao->price - (($Ao->price * $Ao->sale) / 100))}} đ</del> &ensp; {{number_format($Ao->price)}} <u>đ</u></span>
                    </div>

                    <div class="detail-spmv-but">
                        <a href="./chi-tiet-sp?id={{$Ao->id}}" class="btn btn-xem"><i class="fa fa-eye"
                                aria-hidden="true"></i> Xem chi tiết</a>
                                <button class="btn btn-xem" onclick="addCart(<?php echo $Ao['id'];?>)"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào
                            giỏ hàng</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>

    <!-- --------------- sản phẩm quần -------------->
    <div class="row" style=" margin-top: 45px;margin-bottom: 20px;">
        <li class="nav-item">
            <a class="nav-link" href="">
                <h4 style="text-transform: uppercase;font-size: 30px;margin-top: -10px;">QUẦN NAM</h4>
            </a>
        </li>

        @foreach($quan as $q)
        <li class="nav-item">
            <a class="nav-link" href="./product-cate?id={{$q->id}}">{{$q->name}}</a>
        </li>
        @endforeach
    </div>

    <div class="row">
        <div class="list-product">
            @foreach($quans as $qs)
            <div class="all-sp-moi-ve" style="height: 440px;">
                <div class="image-spmv">
                    <img src="{{$qs->image}}" alt="" width="100%" height="100%">
                </div>
                <div class="detail-spmv">
                    <div class="detail-spmv-price">
                        <span>{{$qs->name}}</span> <br>
                        <span><del style="font-size: 14px;color: gray;">{{number_format($qs->price - (($qs->price * $qs->sale) / 100))}} đ</del> &ensp;{{number_format($qs->price)}} <u>đ</u></span>
                    </div>

                    <div class="detail-spmv-but">
                        <a href="./chi-tiet-sp?id={{$qs->id}}" class="btn btn-xem"><i class="fa fa-eye"
                                aria-hidden="true"></i> Xem chi tiết</a>
                                <button class="btn btn-xem" onclick="addCart(<?php echo $qs['id'];?>)"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào
                            giỏ hàng</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>

     <!-- --------------- sản phẩm phụ kiện -------------->
     <div class="row" style=" margin-top: 45px;margin-bottom: 20px;">
        <li class="nav-item">
            <a class="nav-link" href="#">
                <h4 style="text-transform: uppercase;font-size: 30px;margin-top: -10px;">Phụ kiện</h4>
            </a>
        </li>

        @foreach($cate_pk as $cate_pk)
        <li class="nav-item">
            <a class="nav-link" href="./product-cate?id={{$cate_pk->id}}">{{$cate_pk->name}}</a>
        </li>
        @endforeach
    </div>

    <div class="row">
        <div class="list-product">
            @foreach($phuKien as $pk)
            <div class="all-sp-moi-ve" style="height: 440px;">
                <div class="image-spmv">
                    <img src="{{$pk->image}}" alt="" width="100%" height="100%">
                </div>
                <div class="detail-spmv">
                    <div class="detail-spmv-price">
                        <span>{{$pk->name}}</span> <br>
                        <span><del style="font-size: 14px;color: gray;">{{number_format($pk->price - (($pk->price * $pk->sale) / 100))}} đ</del> &ensp;{{number_format($pk->price)}} <u>đ</u></span>
                    </div>

                    <div class="detail-spmv-but">
                        <a href="./chi-tiet-sp?id={{$pk->id}}" class="btn btn-xem"><i class="fa fa-eye"
                                aria-hidden="true"></i> Xem chi tiết</a>
                                <button class="btn btn-xem" onclick="addCart(<?php echo $pk['id'];?>)"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào
                            giỏ hàng</button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>


</div>

@endsection