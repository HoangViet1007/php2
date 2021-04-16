@extends('layout_admin.main')
@section('main-conten')
<div class="page-header" style=" background-color: #FAFAFA;box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.1);">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Chỉnh sửa user</h2>
    </div>
</div>

<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-10">
            <form action="./save-edit-user?id={{$user->id}}" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tên đăng nhập : </label>
                            <input type="text" name="id" placeholder="Tên đăng nhập" class="form-control" readonly
                                value="{{$user->id}}">
                            <!-- @if(isset($idErr))
                            <span class="text-danger mt-1">{{$idErr}}</span>
                            @endif -->
                        </div>

                        <div class="form-group">
                            <label for="">Mật khẩu : </label>
                            <input type="password" name="password" placeholder="Mật khẩu" class="form-control"
                                value="{{$user->password}}">
                            @if(isset($passwordErr))
                            <span class="text-danger mt-1">{{$passwordErr}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Nhập lại mật khẩu : </label>
                            <input type="password" name="cf_password" placeholder="Nhập lại mật khẩu"
                                class="form-control" value="{{$user->password}}">
                            @if(isset($cf_passwordErr))
                            <span class="text-danger mt-1">{{$cf_passwordErr}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Họ và tên : </label>
                            <input type="text" name="name" placeholder="Họ và tên" class="form-control"
                                value="{{$user->name}}">
                            @if(isset($nameErr))
                            <span class="text-danger mt-1">{{$nameErr}}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Địa chỉ : </label>
                            <input type="text" name="address" placeholder="Địa chỉ" class="form-control" value="{{$user->address}}">
                            @if(isset($addressErr))
                            <span class="text-danger mt-1">{{$addressErr}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Số điện thoại : </label>
                            <input type="text" name="phone" placeholder="Số điện thoại" class="form-control" value="{{$user->phone}}">
                            @if(isset($phoneErr))
                            <span class="text-danger mt-1">{{$phoneErr}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="">Hình ảnh : </label>
                            <input type="file" name="image" placeholder="Hình ảnh" class="form-control"
                                value="{{$user->iamge}}">
                            @if(isset($imageErr))
                            <span class="text-danger mt-1">{{$imageErr}}</span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="">Email : </label>
                            <input type="email" name="email" placeholder="Email" class="form-control"
                                value="{{$user->email}}">
                            @if(isset($emailErr))
                            <span class="text-danger mt-1">{{$emailErr}}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="">Vai trò : </label>
                                <select name="vai_tro" class="form-control">
                                    <option value="">Chọn vai trò</option>
                                    @foreach($vai_tro as $a)
                                    <option @if($a->id == $user->vai_tro) selected @endif
                                        value="{{$a->id}}">{{$a->name}}</option>
                                    @endforeach
                                </select>

                                @if(isset($vai_troErr))
                                <span class="text-danger mt-1">{{$vai_troErr}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row d-flex justify-content-center align-items-center">
                    <input type="submit" value="Lưu" name="luu" class="btn btn-outline-danger mr-3">
                    <a href="./list-user" class="btn btn-outline-info">Hủy</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection