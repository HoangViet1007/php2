@extends('homepage.account')
@section('title-account','Đổi mật khẩu')
@section('title-cn','Đổi mật khẩu')
@section('conten-account')
<div class="content" style="margin-top: -80px;margin-bottom: -60px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 order-md-2">
                <img src="./public/image/register.jpg" alt="Image" class="img-fluid" width="100%"
                    style="margin-left: 30px;margin-top: 70px;">
            </div>
            <div class="col-md-6 contents">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="mb-4" style="margin-left: -15px;">
                            <?php if(isset($_GET['msg'])) { ?>
                            <p style="color: #6699ff;">
                                <?php echo $_GET['msg'] ?>
                            </p>
                            <?php } else { ?>
                            <p class="mb-4">Vui lòng điền đầy đủ các trường có dấu <b style="color: red;">*</b></p>
                            <?php } ?>
                        </div>
                        <form action="./save-edit-password?id={{$id}}" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group last mb-4">
                                        <label for="password" style="color: black;font-size: 15px;">Mật khẩu cũ <b style="color: red;">*</b></label>
                                        <input type="password" class="form-control" id="old_password" name="old_password"
                                            style="font-size: 15px;">
                                        @if(isset($old_passwordErr))
                                        <span class="text-danger mt-1">{{$old_passwordErr}}</span>
                                        @endif
                                    </div>

                                    <div class="form-group last mb-4">
                                        <label for="password" style="color: black;font-size: 15px;">Mật khẩu mới <b style="color: red;">*</b></label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            style="font-size: 15px;">
                                        @if(isset($passwordErr))
                                        <span class="text-danger mt-1">{{$passwordErr}}</span>
                                        @endif
                                    </div>

                                    <div class="form-group last mb-4">
                                        <label style="color: black;font-size: 15px;">Xác nhận mật khẩu mới <b style="color: red;">*</b></label>
                                        <input type="password" class="form-control" id="cf_password" name="cf_password"
                                            style="font-size: 15px;">
                                        @if(isset($cf_passwordErr))
                                        <span class="text-danger mt-1">{{$cf_passwordErr}}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex mb-5 align-items-center">
                                <label class="control control--checkbox mb-0"><span class="caption">Remember
                                        me</span>
                                    <input type="checkbox" checked="checked" />
                                    <div class="control__indicator"></div>
                                </label>
                                <span class="ml-auto"><a href="./" class="forgot-pass">Back to home ?</a></span>
                            </div>

                            <input type="submit" value="ĐỔI MẬT KHẨU" class="btn text-white btn-block btn-primary"
                                style="background-color: #cca772; border: none;">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection