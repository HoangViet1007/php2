@extends('homepage.main')
@section('title-main','Danh mục sản phẩm')
@section('conten-main')

<!-- --------------------- hết header ----------------------------->
<style>
    form{
        padding-top: 18px;
        margin-left: 43px;
    }
    .ip{
        border-radius: 0%;

    }
    .bu{
        width: 120px;
        height: 37px;
        background-color: #cca772;
        color: white;
        text-align: center;
        border: none ;
        transition: all 0.5s;

    }
    .bu:hover{
        transform: scale(1.03);
        transition: all 0.5s;
    }
</style>
<div class="container">
    <div class="row mt-4 mb-5 nav-ct">
        <li>
            <a href="./"><i class="fa fa-home" aria-hidden="true"></i> &ensp;Trang chủ</a>&ensp;|
        </li>
        <li>
            <a href="product-cate?id={{$id}}">{{$cate->name}}</a>&ensp;|
        </li>
    </div>

    <div class="row d-flex justify-content-center align-items-center">
        <h3>{{$cate->name}}</h3>
    </div>

   @include("layout.filter")

    <div class="row">
    @if(count($product) > 0)
        <div class="list-product">
            @foreach($product as $pk)
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
    @else
    <p style="margin-left: 440px; margin-top: 20px;">Không có sản phẩm thuộc danh mục này !</p>
    @endif
</div>

@endsection