@extends('homepage.account')
@section('title-account','Thông tin tài khoản')
@section('title-cn','Thông tin tài khoản')
@section('conten-account')
<div class="content" style="margin-top: -80px;margin-bottom: -160px; height: auto;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 order-md-2">
                <img src="./public/image/register.jpg" alt="Image" class="img-fluid" width="100%"
                    style="margin-top: 0px;">
            </div>
            <div class="col-md-6 contents">
                <div class="row justify-content-center">
                    <div class="col-md-12" style="padding-bottom: 40px;">
                        <table class="table">
                            <tr>
                                <td style="width: 120px;">Tên đăng nhập : </td>
                                <td>{{$user->name}}</td>
                            </tr>

                            <tr>
                                <td>Họ và tên : </td>
                                <td>{{$user->name}}</td>
                            </tr>

                            <tr>
                                <td>Địa chỉ : </td>
                                <td>{{$user->address}}</td>
                            </tr>

                            <tr>
                                <td>Số điện thoại : </td>
                                <td>{{$user->phone}}</td>
                            </tr>

                            <tr>
                                <td>Email : </td>
                                <td>{{$user->email}}</td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection