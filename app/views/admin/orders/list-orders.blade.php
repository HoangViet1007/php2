@extends('layout_admin.main')
@section('main-conten')
<div class="page-header" style=" background-color: #FAFAFA;box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.1);">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Danh sách hóa đơn</h2>
    </div>
</div>

<div class="container">
    <p class="text-danger text-center">{{$errMsg}}</p>
    <div class="row d-flex justify-content-center align-items-center">

        <div class="col-md-12">
            <table class="table table-hover" style="border: 3px solid #FAFAFA;font-size: 13px; text-align: left;">
                <thead class="thead-dark" style="font-size: 11px;">
                    <th>MHĐ</th>
                    <th>TÊN NGƯỜI ĐẶT</th>
                    <th width="180px">ĐỊA CHỈ NGƯỜI ĐẶT</th>
                    <th style="text-align: center;">SĐT</th>
                    <th>EMAIL</th>
                    <th>T.TIỀN</th>
                    <th>NGÀY TẠO</th>
                    <th style="text-align: center;">QUẢN LÍ</th>
                </thead>

                <tbody>
                    @foreach($orders as $pro)
                    <tr>
                        <td>{{$pro->id}}</td>
                        <td>{{$pro->customer_name}}</td>
                        <td>{{$pro->customer_address}}</td>
                        <td>{{$pro->customer_phone}}</td>
                        <td>{{$pro->customer_email}}</td>
                        <td>{{number_format($pro->total_price)}}đ</td>
                        <td>{{$pro->created_at}}</td>
                        <td>
                            <a href="./orders-detail?id={{$pro->id}}" class="btn btn-info"><i class="fa fa-share-square-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-8">
            @if(isset($page2))
            <div class="pagination mt-3 d-flex justify-content-center">
                <a href="./list-orders?<?php
                   if($prew < 1){
                       echo "page=$page2" ; 
                   }else{
                       echo $prew ; 
                   }
                ?>"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                @for($t = 1; $t <= $page2; $t++) <li onclick="lickbutton()"><a href="./list-orders?page={{$t}}"
                        class="click[{{$t + 1}}]">{{$t}}</a></li>
                    @endfor
                    <a href="./list-orders?<?php
                        if($next <= $page2){
                            echo "page=$next" ; 
                        }else{
                            echo "page=1" ; 
                        }
                    ?>"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection