
<?php $__env->startSection('title-account','Cập nhật tài khoản'); ?>
<?php $__env->startSection('title-cn','Cập nhật tài khoản'); ?>
<?php $__env->startSection('conten-account'); ?>
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
                            <?php if(isset($_GET['msg'])) { ?>
                            <p style="color: #6699ff;">
                                <?php echo $_GET['msg'] ?>
                            </p>
                            <?php } else { ?>
                            <p class="mb-4">Vui lòng điền đầy đủ các trường có dấu <b style="color: red;">*</b></p>
                            <?php } ?>
                        </div>
                        <form action="./save-edit-user-clien?id=<?php echo e($user->id); ?>" method="post"
                            enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group last mb-4">
                                        <span>Họ và tên <b style="color: red;">*</b></span>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="<?php echo e($user->name); ?>" style="font-size: 15px;">
                                        <?php if(isset($nameErr)): ?>
                                        <span class="text-danger mt-1"><?php echo e($nameErr); ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group last mb-4">
                                        <span>Hình ảnh <b style="color: red;">*</b></span>
                                        <input type="file" class="form-control" id="image" name="image"
                                            style="font-size: 15px;">
                                        <?php if(isset($imageErr)): ?>
                                        <span class="text-danger mt-1"><?php echo e($imageErr); ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group last mb-4">
                                         <span>Địa chỉ <b style="color: red;">*</b></span>
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="<?php echo e($user->address); ?>" style="font-size: 15px;">
                                        <?php if(isset($addressErr)): ?>
                                        <span class="text-danger mt-1"><?php echo e($addressErr); ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group last mb-4">
                                    <span>Địa chỉ <b style="color: red;">*</b></span>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            value="<?php echo e($user->phone); ?>" style="font-size: 15px;">
                                        <?php if(isset($phoneErr)): ?>
                                        <span class="text-danger mt-1"><?php echo e($phoneErr); ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group last mb-4">
                                    <span>Email <b style="color: red;">*</b></span>
                                        <input type="text" class="form-control" id="email" name="email"
                                            value="<?php echo e($user->email); ?>" style="font-size: 15px;">
                                        <?php if(isset($emailErr)): ?>
                                        <span class="text-danger mt-1"><?php echo e($emailErr); ?></span>
                                        <?php endif; ?>
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

                            <input type="submit" value="CẬP NHẬT" class="btn text-white btn-block btn-primary"
                                style="background-color: #cca772; border: none;">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('homepage.account', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\demo2-php2\app\views/tai-khoan/edit-user.blade.php ENDPATH**/ ?>