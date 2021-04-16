@extends('homepage.main')
@section('title-main','Tìm kiếm')
@section('conten-main')

<!-- --------------------- hết header ----------------------------->

<div class="container">
    <div class="row mt-4 mb-3 nav-ct">
        <li>
            <a href="./"><i class="fa fa-home" aria-hidden="true"></i> &ensp;Trang chủ</a>&ensp;|
        </li>
        <li>
            <a href="./product-cate?id={{$cate->id}}">Tìm kiếm</a>&ensp;
        </li>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2 style="font-size: 30px;">Tìm kiếm</h2>
            <hp>Tìm thấy {{$search2}} sản phẩm !</p>
        </div>
    </div>

    <div class="row">
        <div class="list-product">
            @if(count($search) > 0)
                @foreach($search as $sr)
                <div class="all-sp-moi-ve" style="height: 440px;">
                    <div class="image-spmv">
                        <img src="{{$sr->image}}" alt="" width="100%" height="100%">
                    </div>
                    <div class="detail-spmv">
                        <div class="detail-spmv-price">
                            <span>{{$sr->name}}</span> <br>
                            <span><del
                                    style="font-size: 14px;color: gray;">{{number_format($sr->price - (($sr->price * $sr->sale) / 100))}}
                                    đ</del> &ensp; {{number_format($sr->price)}} <u>đ</u></span>
                        </div>

                        <div class="detail-spmv-but">
                            <a href="./chi-tiet-sp?id={{$sr->id}}" class="btn btn-xem"><i class="fa fa-eye"
                                    aria-hidden="true"></i> Xem chi tiết</a>
                            <a href="" class="btn btn-xem"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào
                                giỏ hàng</a>
                        </div>
                    </div>
                </div>
                @endforeach
             @else
             <p style="margin-left: 15px;">Không có sản phẩm nào !</p>
             @endif   
        </div>

    </div>







</div>
@endsection