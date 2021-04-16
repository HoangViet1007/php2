@extends('layout_admin.main')
@section('main-conten')
<div class="page-header" style=" background-color: #FAFAFA;box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.1);">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Thêm mới thông tin khách sạn</h2>
    </div>
</div>

<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-10">
            <form action="./save-add-web" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tên khách sạn : </label>
                            <input type="text" name="name" placeholder="Tên khách sạn" class="form-control">
                            @if(isset($nameErr))
                            <span class="text-danger mt-1">{{$nameErr}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Địa chỉ : </label>
                            <input type="text" name="address" placeholder="Địa chỉ khách sạn" class="form-control">
                            @if(isset($addressErr))
                            <span class="text-danger mt-1">{{$addressErr}}</span>
                            @endif
                        </div>

                      
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Số điện thoại : </label>
                            <input type="text" name="phone" placeholder="Số điện thoại" class="form-control">
                            @if(isset($phoneErr))
                            <span class="text-danger mt-1">{{$phoneErr}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Email : </label>
                            <input type="text" name="email" placeholder="Email" class="form-control">
                            @if(isset($emailErr))
                            <span class="text-danger mt-1">{{$emailErr}}</span>
                            @endif
                        </div>

                    </div>
                </div>

                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Logo : </label>
                            <input type="file" name="logo" placeholder="Logo khách sạn" class="form-control">
                            @if(isset($logoErr))
                            <span class="text-danger mt-1">{{$logoErr}}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center align-items-center">
                    <input type="submit" value="Lưu" name="luu" class="btn btn-outline-danger mr-3">
                    <a href="./list-web" class="btn btn-outline-info">Hủy</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection