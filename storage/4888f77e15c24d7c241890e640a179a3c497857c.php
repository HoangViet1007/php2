
<?php $__env->startSection('main-conten'); ?>
<div class="page-header" style=" background-color: #FAFAFA;box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.1);">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Thêm mới user</h2>
    </div>
</div>

<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-10">
            <form action="./save-add-user" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Tên đăng nhập : </label>
                            <input type="text" name="id" placeholder="Tên đăng nhập" class="form-control">
                            <?php if(isset($idErr)): ?>
                            <span class="text-danger mt-1"><?php echo e($idErr); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="">Mật khẩu : </label>
                            <input type="password" name="password" placeholder="Mật khẩu" class="form-control">
                            <?php if(isset($passwordErr)): ?>
                            <span class="text-danger mt-1"><?php echo e($passwordErr); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="">Nhập lại mật khẩu : </label>
                            <input type="password" name="cf_password" placeholder="Nhập lại mật khẩu"
                                class="form-control">
                            <?php if(isset($cf_passwordErr)): ?>
                            <span class="text-danger mt-1"><?php echo e($cf_passwordErr); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="">Họ và tên : </label>
                            <input type="text" name="name" placeholder="Họ và tên" class="form-control">
                            <?php if(isset($nameErr)): ?>
                            <span class="text-danger mt-1"><?php echo e($nameErr); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                         <div class="form-group">
                            <label for="">Địa chỉ : </label>
                            <input type="text" name="address" placeholder="Địa chỉ" class="form-control">
                            <?php if(isset($addressErr)): ?>
                            <span class="text-danger mt-1"><?php echo e($addressErr); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="">Số điện thoại : </label>
                            <input type="text" name="phone" placeholder="Số điện thoại" class="form-control">
                            <?php if(isset($phoneErr)): ?>
                            <span class="text-danger mt-1"><?php echo e($phoneErr); ?></span>
                            <?php endif; ?>
                        </div>
                       
                        <div class="form-group">
                            <label for="">Hình ảnh : </label>
                            <input type="file" name="image" placeholder="Hình ảnh" class="form-control">
                            <?php if(isset($imageErr)): ?>
                            <span class="text-danger mt-1"><?php echo e($imageErr); ?></span>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="">Email : </label>
                            <input type="text" name="email" placeholder="Email" class="form-control">
                            <?php if(isset($emailErr)): ?>
                            <span class="text-danger mt-1"><?php echo e($emailErr); ?></span>
                            <?php endif; ?>
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
                                    <?php $__currentLoopData = $vai_tro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($a->id); ?>"><?php echo e($a->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if(isset($vai_troErr)): ?>
                                <span class="text-danger mt-1"><?php echo e($vai_troErr); ?></span>
                                <?php endif; ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout_admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\demo2-php2\app\views/admin/user/add-user.blade.php ENDPATH**/ ?>