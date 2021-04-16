@extends('layout_admin.main')
@section('main-conten')
<div class="page-header" style=" background-color: #FAFAFA;box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.1);">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Danh sách thông tin khách sạn</h2>
    </div>
</div>

<div class="container">
    <p class="text-danger text-center">{{$errMsg}}</p>
    <div class="row d-flex justify-content-center align-items-center">

        <div class="col-md-12">
            <table class="table table-hover" style="border: 3px solid #FAFAFA;font-size: 13px; text-align: left;">
                <thead class="thead-dark" style="font-size: 13px;">
                    <th>ID</th>
                    <th>TÊN KHÁCH SẠN</th>
                    <th>ĐỊA CHỈ</th>
                    <th>SỐ ĐIỆN THOẠI</th>
                    <th>EMAIL</th>
                    <th width="100">LOGO</th>
                    <th>
                        <a href="./add-web" class=" btn btn-info" style="width: 100px; text-align: center;"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                    </th>
                </thead>

                <tbody>
                    @foreach($web as $pro)
                    <tr>
                       <td>{{$pro->id}}</td>
                       <td>{{$pro->name}}</td>
                       <td>{{$pro->address}}</td>
                       <td>{{$pro->phone}}</td>
                       <td>{{$pro->email}}</td>
                       <td>
                           <img src="{{$pro->logo}}" alt="" width="100px" height="60px">
                       </td>
                        <td>
                            <a href="./edit-web?id={{$pro->id}}" class="btn btn-danger mr-3"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="./delete-web?id={{$pro->id}}" class="btn btn-info" onclick="return confirm('Bạn có chắc chắn muốn xóa thông tin khách sạn này ?')"><i class="fa fa-trash"
                                    aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="pagination mt-3 d-flex justify-content-center">
                <a href="./list-web?<?php
                    if($prew < 1){
                        echo "page=$page2" ; 
                    }else{
                        echo "page=$prew" ; 
                    }
                ?>"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                @for($t = 1; $t <= $page2; $t++)
                    <li><a href="./list-web?page={{$t}}">{{$t}}</a></li>
                @endfor
                    <!-- <li><a href="">1</a></li>
                    <li><a href="">2</a></li>
                    <li><a href="">3</a></li>
                    <li><a href="">4</a></li> -->
                    <a href="./list-web?<?php
                        if($next <= $page2){
                            echo "page=$next" ; 
                        }else{
                            echo "page=1" ; 
                        }
                    ?>"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</div>
@endsection