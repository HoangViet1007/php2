
<?php $__env->startSection('title','Trang chủ'); ?>
<?php $__env->startSection('conten'); ?>
<div class="container-fluid">
    <div class="row mt-4">
        <?php echo $__env->make('layout.category', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('layout.slide', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<!-- --------------------- hết header ----------------------------->
<div class="container-fluid">
    <div class="row mt-3">
        <div class="col-md-12">
            <marquee style="height: 40px; background-color: #F2F2F2; color: #CCA772; padding-top: 7px;">
                Chào mừng quý khách đến với shop của chúng tôi , chúc quý khách có một trải nghiệm thú vị tại shop ,
                Xin
                chân thành cảm ơn !
            </marquee>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <h4 style="text-transform: uppercase; margin-top: 30px;margin-bottom: 20px; font-size: 30px;">Sản phẩm mới về
        </h4>
    </div>
    <div class="row">
        <div class="sp-moi-ve owl-carousel owl-theme" style="height: 470px;">
            <?php $__currentLoopData = $spmv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spmv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="all-sp-moi-ve item" style="height: 440px;">
                <div class="image-spmv">
                    <img src="<?php echo e($spmv->image); ?>" alt="" width="100%" height="100%">
                </div>
                <div class="detail-spmv">
                    <div class="detail-spmv-price">
                        <span><?php echo e($spmv->name); ?></span> <br>
                        <span> <del style="font-size: 14px;color: gray;"><?php echo e(number_format($spmv->price - (($spmv->price * $spmv->sale) / 100))); ?> đ</del> &ensp; <?php echo e(number_format($spmv->price)); ?> <u>đ</u></span>
                    </div>

                    <div class="detail-spmv-but">
                        <a href="./chi-tiet-sp?id=<?php echo e($spmv->id); ?>" class="btn btn-xem"><i class="fa fa-eye"
                                aria-hidden="true"></i> Xem chi tiết</a>
                        <button class="btn btn-xem" onclick="addCart(<?php echo $spmv['id'];?>)"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào
                            giỏ hàng</button>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </div>
    </div>

    <!-- --------------- sản phẩm áo -------------->
    <div class="row" style=" margin-top: 45px;margin-bottom: 20px;">
        <li class="nav-item">
            <a class="nav-link" href="#">
                <h4 style="text-transform: uppercase;font-size: 30px;margin-top: -10px;">ÁO NAM</h4>
            </a>
        </li>

        <?php $__currentLoopData = $shirt; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $shirt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="nav-item">
            <a class="nav-link" href="./product-cate?id=<?php echo e($shirt->id); ?>"><?php echo e($shirt->name); ?></a>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="row">
        <div class="list-product">
            <?php $__currentLoopData = $shirtAo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Ao): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="all-sp-moi-ve" style="height: 440px;">
                <div class="image-spmv">
                    <img src="<?php echo e($Ao->image); ?>" alt="" width="100%" height="100%">
                </div>
                <div class="detail-spmv">
                    <div class="detail-spmv-price">
                        <span><?php echo e($Ao->name); ?></span> <br>
                        <span><del style="font-size: 14px;color: gray;"><?php echo e(number_format($Ao->price - (($Ao->price * $Ao->sale) / 100))); ?> đ</del> &ensp; <?php echo e(number_format($Ao->price)); ?> <u>đ</u></span>
                    </div>

                    <div class="detail-spmv-but">
                        <a href="./chi-tiet-sp?id=<?php echo e($Ao->id); ?>" class="btn btn-xem"><i class="fa fa-eye"
                                aria-hidden="true"></i> Xem chi tiết</a>
                                <button class="btn btn-xem" onclick="addCart(<?php echo $Ao['id'];?>)"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào
                            giỏ hàng</button>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>

    <!-- --------------- sản phẩm quần -------------->
    <div class="row" style=" margin-top: 45px;margin-bottom: 20px;">
        <li class="nav-item">
            <a class="nav-link" href="">
                <h4 style="text-transform: uppercase;font-size: 30px;margin-top: -10px;">QUẦN NAM</h4>
            </a>
        </li>

        <?php $__currentLoopData = $quan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="nav-item">
            <a class="nav-link" href="./product-cate?id=<?php echo e($q->id); ?>"><?php echo e($q->name); ?></a>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="row">
        <div class="list-product">
            <?php $__currentLoopData = $quans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="all-sp-moi-ve" style="height: 440px;">
                <div class="image-spmv">
                    <img src="<?php echo e($qs->image); ?>" alt="" width="100%" height="100%">
                </div>
                <div class="detail-spmv">
                    <div class="detail-spmv-price">
                        <span><?php echo e($qs->name); ?></span> <br>
                        <span><del style="font-size: 14px;color: gray;"><?php echo e(number_format($qs->price - (($qs->price * $qs->sale) / 100))); ?> đ</del> &ensp;<?php echo e(number_format($qs->price)); ?> <u>đ</u></span>
                    </div>

                    <div class="detail-spmv-but">
                        <a href="./chi-tiet-sp?id=<?php echo e($qs->id); ?>" class="btn btn-xem"><i class="fa fa-eye"
                                aria-hidden="true"></i> Xem chi tiết</a>
                                <button class="btn btn-xem" onclick="addCart(<?php echo $qs['id'];?>)"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào
                            giỏ hàng</button>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

    </div>

     <!-- --------------- sản phẩm phụ kiện -------------->
     <div class="row" style=" margin-top: 45px;margin-bottom: 20px;">
        <li class="nav-item">
            <a class="nav-link" href="#">
                <h4 style="text-transform: uppercase;font-size: 30px;margin-top: -10px;">Phụ kiện</h4>
            </a>
        </li>

        <?php $__currentLoopData = $cate_pk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate_pk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="nav-item">
            <a class="nav-link" href="./product-cate?id=<?php echo e($cate_pk->id); ?>"><?php echo e($cate_pk->name); ?></a>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <div class="row">
        <div class="list-product">
            <?php $__currentLoopData = $phuKien; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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


</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('homepage.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\demo2-php2\app\views/homepage/trangchu.blade.php ENDPATH**/ ?>