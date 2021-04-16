
<?php $__env->startSection('main-conten'); ?>
<div class="page-header" style=" background-color: #FAFAFA;box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.1);">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Chỉnh sửa sản phẩm</h2>
    </div>
</div>

<div class="container">
    <div class="row d-flex justify-content-center align-items-center">
        <form action="./save-edit-product?id=<?php echo e($product->id); ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Tên sản phẩm : </label>
                        <input type="text" name="name" placeholder="Tên sản phẩm" class="form-control" value="<?php echo e($product->name); ?>">
                        <?php if(isset($nameErr)): ?>
                            <span class="text-danger mt-1"><?php echo e($nameErr); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="">Ảnh sản phẩm : </label>
                        <input type="file" name="image" placeholder="Ảnh sản phẩm" class="form-control" value="<?php echo e($product->image); ?>">
                        <?php if(isset($imageErr)): ?>
                            <span class="text-danger mt-1"><?php echo e($imageErr); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="">Giá sản phẩm : </label>
                        <input type="text" name="price" placeholder="Giá sản phẩm" class="form-control" value="<?php echo e($product->price); ?>">
                        <?php if(isset($priceErr)): ?>
                            <span class="text-danger mt-1"><?php echo e($priceErr); ?></span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Giảm giá : </label>
                        <input type="text" name="sale" placeholder="Giảm giá" class="form-control" value="<?php echo e($product->sale); ?>">
                        <?php if(isset($saleErr)): ?>
                            <span class="text-danger mt-1"><?php echo e($saleErr); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="">Số lượt xem : </label>
                        <input type="text" name="number_of_views" placeholder="Số lượt xem" class="form-control" value="<?php echo e($product->number_of_views); ?>">
                        <?php if(isset($number_of_viewsErr)): ?>
                            <span class="text-danger mt-1"><?php echo e($number_of_viewsErr); ?></span>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="">Danh mục sản phẩm : </label>
                        <select name="id_category" class="form-control">
                            <option value="">Chọn danh mục sản phẩm</option>
                             <?php $__currentLoopData = $cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option  <?php if($cate->id == $product->id_category): ?> selected <?php endif; ?>
                                 value="<?php echo e($cate->id); ?>"><?php echo e($cate->name); ?></option>
                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php if(isset($id_categoryErr)): ?>
                            <span class="text-danger mt-1"><?php echo e($id_categoryErr); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="row d-flex justify-content-center align-items-center">
                <div class="form-group">
                    <label for="">Mô tả : </label>
                    <textarea name="description" cols="80" rows="3" class="form-control" placeholder="Mô tả" id="full-featured-non-premium"><?php echo $product->description; ?></textarea>
                    <?php if(isset($descriptionErr)): ?>
                            <span class="text-danger mt-1"><?php echo e($descriptionErr); ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row d-flex justify-content-center align-items-center">
                <input type="submit" value="Lưu" name="luu" class="btn btn-outline-danger mr-3">
                <a href="./list-product" class="btn btn-outline-info">Hủy</a>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout_admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\demo2-php2\app\views/admin/product/edit-product.blade.php ENDPATH**/ ?>