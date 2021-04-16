@extends('layout_admin.main')
@section('main-conten')
<div class="page-header" style=" background-color: #FAFAFA;box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.1);">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Chi tiết bình luận</h2>
    </div>
</div>

<div class="container">
    <p class="text-danger text-center">{{$errMsg}}</p>
    <div class="row d-flex justify-content-center align-items-center">

        <div class="col-md-12">
            <table class="table table-hover" style="border: 3px solid #FAFAFA;font-size: 13px; text-align: left;">
                <thead class="thead-dark" style="font-size: 13px;">
                    <th>MÃ BÌNH LUẬN</th>
                    <th>MÃ NGƯỜI</th>
                    <th>TÊN NGƯỜI</th>
                    <th>HÌNH ẢNH</th>
                    <th width="250">NỘI DUNG</th>
                    <th>NGÀY</th>
                    <th class="text-center">
                        <a href="./add-product" class=" btn btn-info" style="width: 100px; text-align: center;"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                    </th>
                </thead>

                <tbody>
                    @foreach($comments as $pro)
                    <tr>
                        <td>{{$pro->id}}</td>
                        <td>{{$pro->id_user}}</td>
                        <td>{{$pro->name_user}}</td>
                        <td>
                            <img src="{{$pro->image_user}}" alt="hinh ảnh" width="60px" height="60px">
                        </td>
                        <td>{{$pro->content}}</td>
                        <td>{{$pro->created_at}}</td>
                        <td class="text-center">
                            <a href="./comment-delete-admin?id={{$pro->id}}" onclick="return confirm('Bạn có chắc chắn muốn xóa bình luận này không ?')" class="btn btn-danger" style="font-size: 12px;"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="12">
                            <a href="./list-comment" class="btn btn-info btn-sm">
                                Quay lại danh sách bính luận
                            </a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection