
<?php $__env->startSection('title-main','Tìm kiếm'); ?>
<?php $__env->startSection('conten-main'); ?>

<!-- --------------------- hết header ----------------------------->

<div class="container">
    <div class="row mt-4 mb-3 nav-ct">
        <li>
            <a href="./"><i class="fa fa-home" aria-hidden="true"></i> &ensp;Trang chủ</a>&ensp;|
        </li>
        <li>
            <a href="./product-cate?id=<?php echo e($cate->id); ?>">Tìm kiếm</a>&ensp;
        </li>
    </div>

    <div class="row">
        <div class="col-md-12">
            <h2 style="font-size: 30px;">Tìm kiếm</h2>
            <hp>Tìm thấy <?php echo e($search2); ?> sản phẩm !</p>
        </div>
    </div>

    <div class="row">
        <div class="list-product">
            <?php if(count($search) > 0): ?>
                <?php $__currentLoopData = $search; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="all-sp-moi-ve" style="height: 440px;">
                    <div class="image-spmv">
                        <img src="<?php echo e($sr->image); ?>" alt="" width="100%" height="100%">
                    </div>
                    <div class="detail-spmv">
                        <div class="detail-spmv-price">
                            <span><?php echo e($sr->name); ?></span> <br>
                            <span><del
                                    style="font-size: 14px;color: gray;"><?php echo e(number_format($sr->price - (($sr->price * $sr->sale) / 100))); ?>

                                    đ</del> &ensp; <?php echo e(number_format($sr->price)); ?> <u>đ</u></span>
                        </div>

                        <div class="detail-spmv-but">
                            <a href="./chi-tiet-sp?id=<?php echo e($sr->id); ?>" class="btn btn-xem"><i class="fa fa-eye"
                                    aria-hidden="true"></i> Xem chi tiết</a>
                            <a href="" class="btn btn-xem"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào
                                giỏ hàng</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             <?php else: ?>
             <p style="margin-left: 15px;">Không có sản phẩm nào !</p>
             <?php endif; ?>   
        </div>

    </div>







</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('homepage.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\demo2-php2\app\views/homepage/search.blade.php ENDPATH**/ ?>