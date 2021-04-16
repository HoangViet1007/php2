
<?php $__env->startSection('main-conten'); ?>
<div class="page-header" style=" background-color: #FAFAFA;box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.1);">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Thêm mới hình ảnh cho sản phẩm : <?php echo e($product->name); ?> </h2>
    </div>
</div>

<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-10">
            <form action="./save-add-image?id=<?php echo e($product->id); ?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Tên hình ảnh : </label>
                            <input type="text" name="name" placeholder="Tên sản phẩm" class="form-control">
                            <?php if(isset($nameErr)): ?>
                            <span class="text-danger mt-1"><?php echo e($nameErr); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Hình ảnh : </label>
                            <input type="file" placeholder="Hình ảnh cho sản phẩm" name="image" class="form-control">
                            <?php if(isset($imageErr)): ?>
                            <span class="text-danger mt-1"><?php echo e($imageErr); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center align-items-center">
                    <input type="submit" value="Lưu" name="luu" class="btn btn-outline-danger mr-3">
                    <a href="./list-product" class="btn btn-outline-info">Hủy</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout_admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\demo2-php2\app\views/admin/image_product_gallery/add-image.blade.php ENDPATH**/ ?>