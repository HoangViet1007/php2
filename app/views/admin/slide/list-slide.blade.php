@extends('layout_admin.main')
@section('main-conten')
<div class="page-header" style=" background-color: #FAFAFA;box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.1);">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Danh sách slide ảnh</h2>
    </div>
</div>

<div class="container">
    <p class="text-danger text-center">{{$errMsg}}</p>
    <div class="row d-flex justify-content-center align-items-center">

        <div class="col-md-10">
            <table class="table table-hover" style="border: 3px solid #FAFAFA;">
                <thead class="thead-dark">
                    <th>TIÊU ĐỀ</th>
                    <th>HÌNH ẢNH</th>
                    <th>LINK</th>
                    <th>TRẠNG THÁI</th>
                    <th width="130">
                        <a href="./add-slide" class=" btn btn-info" style="width: 88px;text-align: center;"><i
                                class="fa fa-plus" aria-hidden="true"></i> Add</a>
                    </th>
                </thead>

                <tbody>
                    @foreach($slide as $slide)
                    <tr>
                        <td>{{$slide->title}}</td>
                        <td>
                            <img src="{{$slide->image}}" alt="" width="200px">
                        </td>
                        <td>{{$slide->link}}</td>
                        <td>
                            @if($slide->active == 0)
                            <a href="./active?id={{$slide->id}}">Chưa hoạt động</a>
                            @elseif($slide->active == 1)
                            <a href="./no-active?id={{$slide->id}}">Hoạt động</a>
                            @else
                            No
                            @endif
                        </td>

                        <td>
                            <a href="./edit-slide?id={{$slide->id}}" class="btn btn-danger"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="./delete-slide?id={{$slide->id}}" class="btn btn-info" onclick="return confirm('Bạn có chắc chắn muốn xóa slide này không ?')"><i class="fa fa-trash"
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
            @if(isset($page2))
            <div class="pagination mt-3 d-flex justify-content-center">
                <a href="./list-slide?<?php
                   if($prew < 1){
                       echo "page=$page2" ; 
                   }else{
                       echo $prew ; 
                   }
                ?>"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                @for($t = 1; $t <= $page2; $t++) <li onclick="lickbutton()"><a href="./list-slide?page={{$t}}"
                        class="click[{{$t + 1}}]">{{$t}}</a></li>
                    @endfor
                    <a href="./list-slide?<?php
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