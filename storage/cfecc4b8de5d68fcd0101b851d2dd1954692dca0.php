
<?php $__env->startSection('title-main','Đăng kí tài khoản'); ?>
<?php $__env->startSection('conten-main'); ?>
<div class="content" style="margin-top: -80px; margin-bottom: -60px;">
    <div class="container">
        <div class="row">
            <div class="col-md-6 order-md-2">
                <img src="./public/image/register.jpg" alt="Image" class="img-fluid" width="100%"
                    style="margin-left: 30px;margin-top: 70px;">
            </div>
            <div class="col-md-6 contents">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="mb-4">
                        <h2 style="font-size: 30px;">Thêm mới tài khoản</h2>
                            <?php if(isset($_GET['msg'])) { ?>
                            <p style="color: #6699ff;">
                                <?php echo $_GET['msg'] ?>
                            </p>
                            <?php } else { ?>
                            <p class="mb-4">Vui lòng điền đầy đủ các trường có dấu <b style="color: red;">*</b></p>
                            <?php } ?>
                        </div>
                        <form action="./save-register" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group last mb-4">
                                        <label style="color: black;font-size: 15px;">Tên đăng nhập <b style="color: red;">*</b></label>
                                        <input type="text" class="form-control" id="id" name="id"
                                            style="font-size: 15px;">
                                        <?php if(isset($idErr)): ?>
                                        <span class="text-danger mt-1"><?php echo e($idErr); ?></span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group last mb-4">
                                        <label for="password" style="color: black;font-size: 15px;">Mật khẩu <b style="color: red;">*</b></label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            style="font-size: 15px;">
                                        <?php if(isset($passwordErr)): ?>
                                        <span class="text-danger mt-1"><?php echo e($passwordErr); ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group last mb-4">
                                        <label for="password" style="color: black;font-size: 15px;">Xác nhận mật khẩu <b style="color: red;">*</b></label>
                                        <input type="password" class="form-control" id="cf_password" name="cf_password"
                                            style="font-size: 15px;">
                                        <?php if(isset($cf_passwordErr)): ?>
                                        <span class="text-danger mt-1"><?php echo e($cf_passwordErr); ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group last mb-4">
                                        <label style="color: black;font-size: 15px;">Họ và tên <b style="color: red;">*</b></label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            style="font-size: 15px;">
                                        <?php if(isset($nameErr)): ?>
                                        <span class="text-danger mt-1"><?php echo e($nameErr); ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group last mb-4">
                                        <label style="color: black;font-size: 15px;">Địa chỉ <b style="color: red;">*</b></label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            style="font-size: 15px;">
                                        <?php if(isset($addressErr)): ?>
                                        <span class="text-danger mt-1"><?php echo e($addressErr); ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group last mb-4">
                                        <label style="color: black;font-size: 15px;">Số điện thoại <b style="color: red;">*</b></label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            style="font-size: 15px;">
                                        <?php if(isset($phoneErr)): ?>
                                        <span class="text-danger mt-1"><?php echo e($phoneErr); ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group last mb-4">
                                        <label style="color: black;font-size: 15px;">Email <b style="color: red;">*</b></label>
                                        <input type="text" class="form-control" id="email" name="email"
                                            style="font-size: 15px;">
                                        <?php if(isset($emailErr)): ?>
                                        <span class="text-danger mt-1"><?php echo e($emailErr); ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group last mb-4"
                                        style="border-radius: 0%; border-bottom: 1px solid #ccc;">
                                        <label for=" password" style="color: black;font-size: 15px;">Hình ảnh <b style="color: red;">*</b></label>
                                        <input type="file" class="form-control" id="image"
                                            style="opacity: 0;font-size: 15px;" name="image">
                                        <?php if(isset($imageErr)): ?>
                                        <span class="text-danger mt-1"><?php echo e($imageErr); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    
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

                            <input type="submit" value="ĐĂNG KÍ" class="btn text-white btn-block btn-primary"
                                style="background-color: #cca772; border: none;">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('homepage.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\demo2-php2\app\views/tai-khoan/register.blade.php ENDPATH**/ ?>