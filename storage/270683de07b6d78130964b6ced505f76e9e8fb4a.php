
<?php $__env->startSection('title-account','Thông tin tài khoản'); ?>
<?php $__env->startSection('title-cn','Thông tin tài khoản'); ?>
<?php $__env->startSection('conten-account'); ?>
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
                                <td><?php echo e($user->name); ?></td>
                            </tr>

                            <tr>
                                <td>Họ và tên : </td>
                                <td><?php echo e($user->name); ?></td>
                            </tr>

                            <tr>
                                <td>Địa chỉ : </td>
                                <td><?php echo e($user->address); ?></td>
                            </tr>

                            <tr>
                                <td>Số điện thoại : </td>
                                <td><?php echo e($user->phone); ?></td>
                            </tr>

                            <tr>
                                <td>Email : </td>
                                <td><?php echo e($user->email); ?></td>
                            </tr>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('homepage.account', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\demo2-php2\app\views/tai-khoan/account-user.blade.php ENDPATH**/ ?>