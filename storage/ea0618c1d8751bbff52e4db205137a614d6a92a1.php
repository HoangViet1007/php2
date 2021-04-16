
<?php $__env->startSection('main-conten'); ?>
<div class="page-header" style=" background-color: #FAFAFA;box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.1);">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">chỉnh sửa vai trò</h2>
    </div>
</div>

<div class="container">
     <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <form action="./save-edit-vai-tro?id=<?php echo e($vaiTro->id); ?>" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Tên vai trò : </label>
                    <input type="text" placeholder="Tên vai trò" name="name" class="form-control" value="<?php echo e($vaiTro->name); ?>">
                    <?php if(isset($nameErr)): ?>
                       <span class="text-danger mt-1"><?php echo e($nameErr); ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <input type="submit" value="Lưu" name="luu" class="btn btn-danger">
                    <a href="./list-vai-tro" class="btn btn-info">Hủy</a>
                </div>
            </form>
        </div>
     </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout_admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\demo2-php2\app\views/admin/vai-tro/edit-vai-tro.blade.php ENDPATH**/ ?>