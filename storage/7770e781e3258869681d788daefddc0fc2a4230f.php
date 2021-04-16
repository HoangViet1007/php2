
<?php $__env->startSection('main-conten'); ?>
<div class="page-header" style=" background-color: #FAFAFA;box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.1);">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Thêm mới danh mục</h2>
    </div>
</div>

<div class="container">
     <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <form action="./save-add-category" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Tên danh mục</label>
                    <input type="text" placeholder="Tên danh mục" name="name" class="form-control">
                    <?php if(isset($nameErr)): ?>
                       <span class="text-danger mt-1"><?php echo e($nameErr); ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <input type="submit" value="Lưu" name="luu" class="btn btn-danger">
                    <a href="./list-category" class="btn btn-info">Hủy</a>
                </div>
            </form>
        </div>
     </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout_admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\demo2-php2\app\views/admin/category/add-category.blade.php ENDPATH**/ ?>