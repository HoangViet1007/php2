
<?php $__env->startSection('title-main','Chi tiết sản phẩm'); ?>
<?php $__env->startSection('conten-main'); ?>

<!-- --------------------- hết header ----------------------------->

<div class="container">
    <div class="row mt-4 mb-5 nav-ct">
        <li>
            <a href="./"><i class="fa fa-home" aria-hidden="true"></i> &ensp;Trang chủ</a>&ensp;|
        </li>
        <li>
            <a href="./product-cate?id=<?php echo e($cate->id); ?>"><?php echo e($cate->name); ?></a>&ensp;|
        </li>
        <li>
            <a href="#"><?php echo e($sp->name); ?></a>&ensp;|
        </li>
    </div>

    <div class="row">
        <div class="col-md-1">
            <li class="hehe">
                <img src="<?php echo e($sp->image); ?>" alt="" width="100%" width="70px" height="100px"
                    class="img_small[100] img-border" style="margin-bottom: 20px; cursor: pointer;" id="100"
                    onclick="changeImage('100')">
            </li>
            <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $im): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="hehe">
                <img src="<?php echo e($im->image); ?>" alt="" width="70px" height="100px" class="img_small[<?php echo e($im->id); ?>] img-border"
                    style="margin-bottom: 20px; cursor: pointer;" id="<?php echo e($im->id); ?>" onclick="changeImage('<?php echo e($im->id); ?>')"
                    onblur="click('$im->id')" onclick="this.focus()">
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="col-md-6">
            <img src="<?php echo e($sp->image); ?>" alt="" width="100%" height="725px" id="mainImage">
        </div>
        <div class="col-md-5" style="padding: 0px 20px;">
            <div class="row">
                <div class="ctsp-detall">
                    <h2 style="color: black;">
                        Thông tin sản phẩm <span class="icon-open active"></span></h2>
                    <p>Tên sản phẩm : <span><?php echo e($sp->name); ?></span></p>
                    <p>Giá : <span><?php echo e(number_format($sp->price)); ?> <u>đ</u></span></p>
                    <p>Số lượt xem : <?php echo e($sp->number_of_views); ?> lượt xem </p>

                </div>
            </div>

            <div class="row">

            </div>

            <div class="row">
                <button class="btn btn-ct" onclick="addCart(<?php echo $sp['id'];?>)"><i class="fa fa-shopping-cart"
                        aria-hidden="true"></i> Thêm vào
                    giỏ hàng</button>
                <a href="" class="btn btn-ct" style="margin-left: 10px;"><i class="fa fa-shopping-cart"
                        aria-hidden="true"></i> Mua ngay</a>
            </div>

            <div class="row mt-4">
                <div class="product-description">
                    <div class="title-bl">
                        <h2 style="color: white;">
                            Chính sách từ Tony4men <span class="icon-open active"></span></h2>
                    </div>
                    <div class="description-content" style="display: block;">
                        <div class="description-productdetail">
                            <div class="description-productdetail">

                                <li style="margin:10px 0px;padding:0px;list-style:none;">&nbsp;►Đổi hàng&nbsp;trong
                                    vòng 3 ngày.</li>
                                <li style="margin:10px 0px;padding:0px;list-style:none;">&nbsp;►Giảm 10% trên tổng
                                    hóa đơn khi mua hàng ( tại cửa hàng ) vào tuần sinh nhật ( trước và sau ngày
                                    sinh nhật 3 ngày ).</li>
                                <li style="margin:10px 0px;padding:0px;list-style:none;">&nbsp;►Giao hàng nội thành
                                    Hà Nội chỉ từ 15.000đ trong vòng 24 giờ.</li>
                                <li style="margin:10px 0px;padding:0px;list-style:none;">&nbsp;►Tích điểm 3-10% giá
                                    trị đơn hàng cho mỗi lần mua và trừ tiền vào lần mua tiếp theo.</li>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="product-description">
                    <div class="title-bl">
                        <h2 style="color: white;">
                            Các cách bảo quản sản phẩm tốt <span class="icon-open active"></span></h2>
                    </div>
                    <div class="description-content" style="display: block;">
                        <div class="description-productdetail">
                            <div class="description-productdetail">

                                <li style="margin:10px 0px;padding:0px;list-style:none;">&nbsp;►Tránh ánh ánh nắng trực
                                    tiếp khi phơi.</li>
                                <li style="margin:10px 0px;padding:0px;list-style:none;">&nbsp;►Cần sửa dụng bột giặt có
                                    chất lượng , tránh sửa dụng hàng kém chất lượng &ensp; làm ảnh hướng đến áo.</li>
                                <li style="margin:10px 0px;padding:0px;list-style:none;">&nbsp;►Giặt máy thỏa mái không
                                    cần phải suy nghĩ.</li>
                                <li style="margin:10px 0px;padding:0px;list-style:none;">&nbsp;►Tích điểm 3-10% giá
                                    trị đơn hàng cho mỗi lần mua và trừ tiền vào lần mua tiếp theo.</li>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- -------------------- bình luận ----------------------- -->
    <h4 class="mt-5" style="text-transform: uppercase;;margin-bottom: 20px;">Bình luận</h4>
    <?php if(isset($_GET['msg'])) { ?>
    <p style="color: #6699ff;">
        <?php echo $_GET['msg'] ?>
    </p>
    <?php } ?>
    <div class="row">
        <div class="col-md-1" style="border-right: 5px solid #ccc;">
            <?php if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])): ?>
            <img src="./<?php echo e($_SESSION['admin']['image']); ?>" alt="" width="100%" height="70px"
                style="border: 1px solid #cca772; ">
            <?php elseif(isset($_SESSION['khach_hang']) && !empty($_SESSION['khach_hang'])): ?>
            <img src="./<?php echo e($_SESSION['khach_hang']['image']); ?>" alt="" width="100%" height="70px"
                style="border: 1px solid #cca772; ">
            <?php else: ?>

            <?php endif; ?>
        </div>
        <div class="col-md-11">
            <form action="./add-comment?id_product=<?php echo e($sp->id); ?>" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <textarea name="content" cols="120" rows="2"
                                style="width: 100%;height: 70px; border: 1px solid #cca772 ; border-radius: 0%;"
                                placeholder="Viết bình luận..." class="form-control" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="submit" value="Bình luận" class="btn btn-outline-danger" name="luu"
                                style="background-color: #cca772; color: white; border: none; border-radius: 0%;">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <hr>
    <!-- ----------------- in bình luận -------------------->
    <?php $__currentLoopData = $comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $com): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="row mb-3">
        <div class="col-md-1"></div>
        <div class="col-md-11">
            <div class="row">
                <div class="col-md-1" style="border-right: 5px solid #ccc;">
                    <div class="box-img">
                        <img src="./<?php echo e($com->image_user); ?>" alt="" width="60px" height="70px"
                            style="border: 1px solid #cca772;">
                    </div>
                </div>

                <div class="col-md-11">
                    <div class="box-detail" style="border: 1px solid #cca772; padding: 15px; font-style: italic;">
                        <div class="row">
                            <div class="col-md-10">
                                <p><span><?php echo e($com->name_user); ?></span> ,Việt Nam <br> <span>Day :
                                        <?php echo e($com->created_at); ?></span> </p>
                            </div>

                            <div class="col-md-2">
                                <?php
                                            if (isset($_SESSION['khach_hang'])) {
                                                    if ($com->id_user == $_SESSION['khach_hang']['id']) { ?>
                                <a class="btn btn-block"
                                    style="background-color: #CCA772; border-radius: 0%; border: none; color: white; margin-top: -7px;"
                                    href="./delete-comment?id=<?php echo e($com->id); ?>&id_product=<?php echo e($com->id_product); ?>">Xóa</a>
                                <?php

                                            }
                                                } else if (isset($_SESSION['admin']))
                                                        if ($com->id_user == $_SESSION['admin']['id']) { ?>
                                <a class="btn btn-block"
                                    style="background-color: #CCA772; border-radius: 0%; border: none; color: white; margin-top: -7px;"
                                    href="./delete-comment?id=<?php echo e($com->id); ?>&id_product=<?php echo e($com->id_product); ?>">Xóa</a>

                                <?php } ?>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <p><?php echo e($com->content); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


    <!-- --------------- end in bình luận --------------- -->



    <!-- ----------------------------- end bình luận --------------------------- -->

    <div class="row mt-5"
        style="border-bottom: 2px solid #cccc;box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.2); padding-top: 20px;">
        <h4 style="text-transform: uppercase;;margin-bottom: 20px;">Sản phẩm liên quan</h4>
        <hr>
    </div>
    <div class="row mt-3">
        <?php if(count($spmv) > 0): ?>
        <div class="sp-moi-ve" style="height: 470px;">
            <?php $__currentLoopData = $spmv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $spmv): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="all-sp-moi-ve" style="height: 440px;">
                <div class="image-spmv">
                    <img src="<?php echo e($spmv->image); ?>" alt="" width="100%" height="100%">
                </div>
                <div class="detail-spmv">
                    <div class="detail-spmv-price">
                        <span><?php echo e($spmv->name); ?></span> <br>
                        <span><?php echo e(number_format($spmv->price)); ?> <u>đ</u></span>
                    </div>

                    <div class="detail-spmv-but">
                        <a href="./chi-tiet-sp?id=<?php echo e($spmv->id); ?>" class="btn btn-xem"><i class="fa fa-eye"
                                aria-hidden="true"></i> Xem chi tiết</a>
                        <button class="btn btn-xem" onclick="addCart(<?php echo $spmv['id'];?>)"><i
                                class="fa fa-shopping-cart" aria-hidden="true"></i> Thêm vào
                            giỏ hàng</button>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <?php else: ?>
        <p style="margin-left: 480px; margin-top: 20px;">Không có sản phẩm liên quan nào !</p>
        <?php endif; ?>
    </div>
</div>
<script>
// hamf chuyeenr anh  
function changeImage(id) {
    var a = 0;
    let element = document.getElementById(id);
    let imagePath = element.getAttribute('src');
    document.getElementById('mainImage').setAttribute('src', imagePath);

    let list = document.getElementsByClassName('img-border');

    for (let i = 0; i < list.length; i++) {
        list[i].style.border = 'none';
        list[i].style.opacity = "1";
    }


    element.style.border = '2px solid #cca772';
    element.style.opacity = "0.8";
    element.style.padding = "5px";

}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('homepage.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\demo2-php2\app\views/homepage/chi-tiet-sp.blade.php ENDPATH**/ ?>