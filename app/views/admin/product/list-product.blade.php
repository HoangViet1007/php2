@extends('layout_admin.main')
@section('main-conten')
<div class="page-header" style=" background-color: #FAFAFA;box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.1);">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Danh sách sản phẩm</h2>
    </div>
</div>

<div class="container">
    <div class="mb-3 row d-flex justify-content-center align-items-center"
        style="width: 100%; height: 60px;background-color: #FAFAFA;box-shadow: 0px 5px 20px 0px rgb(0 0 0 / 10%);border: 1px solid #ccc;margin-left: 1px;">
        <div class="col-md-4 d-flex align-items-center" style="border: 1px solid #ccc;">
            <form action="./list-product?page=1" class="mt-2" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-2">
                        <label for="">
                            <input type="submit" class="btn" name="sx" style="background-color: #343a40;color:white; width: 100%;"
                                value="Lọc">
                        </label>
                    </div>
                    <div class="col-md-10">
                        <select name="id_category" id="" class="form-control" style="width: 255px;border-radius: 5px;">
                            <option value="">--Danh mục sản phẩm--</option>
                             @foreach($cates as $cate)
                             <option value="{{$cate->id_category}}">{{$cate->name_category}}</option>
                             @endforeach
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8 d-flex align-items-center" style="border: 1px solid #ccc;">
            <form action="./list-product?page=1" class="mt-2" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-5">
                        <input type="text" name="name" placeholder="Tên sản phẩm..." class="form-control" style="width:280px;border-radius: 5px; ">
                    </div>

                    <div class="col-md-5">
                        <input type="text" name="price" placeholder="Giá sản phẩm" class="form-control" style="width:280px;border-radius: 5px; ">
                    </div>

                    <div class="col-md-2">
                        <label for="">
                            <input type="submit" class="btn" name="tk" style="background-color: #343a40;color:white;"
                                value="Tìm Kiếm">
                        </label>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <p class="text-danger text-center">{{$errMsg}}</p>

    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-12">
            @if(count($products) > 0)
            <table class="table table-hover" style="border: 3px solid #FAFAFA;font-size: 13px; text-align: left;">
                <thead class="thead-dark" style="font-size: 13px;">
                    <th>TÊN</th>
                    <th>HÌNH ẢNH</th>
                    <th>GIÁ</th>
                    <th>GIẢM GIÁ</th>
                    <th>DANH MỤC</th>
                    <th>MÔ TẢ</th>
                    <th width="120">HÌNH ẢNH LQ</th>
                    <th width="130">
                        <a href="./add-product" class=" btn btn-info" style="width: 100px; text-align: center;"><i
                                class="fa fa-plus" aria-hidden="true"></i> Add</a>
                    </th>
                </thead>

                <tbody>
                    @foreach($products as $pro)
                    <tr>
                        <td>{{$pro->name}}</td>
                        <td>
                            <img src="{{$pro->image}}" alt="hinh ảnh" width="60px" height="60px">
                        </td>
                        <td>{{number_format($pro->price)}}<u>đ</u></td>
                        <td>{{$pro->sale}}%</td>
                        <td>{{$pro->name_cate}}</td>
                        <td width="250">{!!$pro->description!!}</td>
                        <td style="text-align: center;">
                            <a href="./add-image?id={{$pro->id}}" class="btn btn-warning mb-1"><i class="fa fa-plus"
                                    aria-hidden="true"></i> Add</a>
                            <a href="./list-image?id={{$pro->id}}" class="btn btn-dark"><i class="fa fa-list-ol"
                                    aria-hidden="true"></i> List</a>
                        </td>
                        <td>
                            <a href="./edit-product?id={{$pro->id}}" class="btn btn-danger mr-3"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="./delete-product?id={{$pro->id}}" class="btn btn-info"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không ?')"><i
                                    class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <p class="text-danger text-center">Không có sản phẩm nào cả !</p>
            @endif
        </div>
    </div>

    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-8">
            @if(isset($page2))
            <div class="pagination mt-3 d-flex justify-content-center">
                <a href="./list-product?<?php
                   if($prew < 1){
                       echo "page=$page2" ; 
                   }else{
                       echo $prew ; 
                   }
                ?>"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                @for($t = 1; $t <= $page2; $t++) <li onclick="lickbutton()"><a href="./list-product?page={{$t}}"
                        class="click[{{$t + 1}}]">{{$t}}</a></li>
                    @endfor
                    <a href="./list-product?<?php
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

<script>
function lickbutton() {

    let list = document.getElementsByClassName('click');
    for (let i = 0; i < list.length; i++) {
        list[i].style.backgroundColor = 'white';
        list[i].style.color = "black";
    }

    element.style.backgroundColor = '#cca772';
    element.style.color = "white";
}
</script>
@endsection