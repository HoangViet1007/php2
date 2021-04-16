
<?php $__env->startSection('title-main','Danh mục sản phẩm'); ?>
<?php $__env->startSection('conten-main'); ?>

<!-- --------------------- hết header ----------------------------->
<style>
    form{
        padding-top: 18px;
        margin-left: 43px;
    }
    .ip{
        border-radius: 0%;

    }
    .bu{
        width: 120px;
        height: 37px;
        background-color: #cca772;
        color: white;
        text-align: center;
        border: none ;
        transition: all 0.5s;

    }
    .bu:hover{
        transform: scale(1.03);
        transition: all 0.5s;
    }
</style>
<div class="container">
    <div class="row mt-4 mb-5 nav-ct">
        <li>
            <a href="./"><i class="fa fa-home" aria-hidden="true"></i> &ensp;Trang chủ</a>&ensp;|
        </li>
        <li>
            <a href="product-cate?id=<?php echo e($id); ?>"><?php echo e($cate->name); ?></a>&ensp;|
        </li>
    </div>

    <div class="row d-flex justify-content-center align-items-center">
        <h3><?php echo e($cate->name); ?></h3>
    </div>

   <?php echo $__env->make("layout.filter", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row">
    <?php if(count($product) > 0): ?>
        <div class="list-product">
            <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="all-sp-moi-ve" style="height: 440px;">
                <div class="image-spmv">
                    <img src="<?php echo e($pk->image); ?>" alt="" width="100%" height="100%">
                </div>
                <div class="detail-spmv">
                    <div class="detail-spmv-price">
                        <span><?php echo e($pk->name); ?></span> <br>
                        <span><del style="font-size: 14px;color: gray;"><?php echo e(number_format($pk->price - (($pk->price * $pk->sale) / 100))); ?> đ</del> &ensp;<?php echo e(number_format($pk->price)); ?> <u>đ</u></span>
                    </div>

                    <div class="detail-spmv-but">
                        <a href="./chi-tiet-sp?id=<?php echo e($pk->id); ?>" class="btn btn-xem"><i class="fa fa-eye"
                                aria-hidden="true"></i> Xem chi tiết</a>
                                <button class="btn btn-xem" onclick="addCart(<?php echo $pk['id'];?>)"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào
                            giỏ hàng</button>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <?php else: ?>
    <p style="margin-left: 440px; margin-top: 20px;">Không có sản phẩm thuộc danh mục này !</p>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('homepage.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\demo2-php2\app\views/homepage/product-cate.blade.php ENDPATH**/ ?>