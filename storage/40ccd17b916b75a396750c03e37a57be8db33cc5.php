<div class="col-md-10">
    <div class="row">
        <div class="col-md-9">
        <!-- -------------- search -----------------------  -->
            <form action="./search" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <input type="text" placeholder="Bạn cần gi nào ..?" name="keyword" class="form-control"
                                style="height: 40px; border-radius: 0%; width: 580px;">

                        </div>
                        <div class="col-md-3">
                            <input type="submit" value="Tìm kiếm"
                                style="border:none ; background-color: #CCA772; width: 130px; text-align: center; color: white; height: 40px;margin-left: -20px;">
                        </div>
                    </div>
                </div>
            </form>
           <!-- -------------------end search ------------------  -->
        </div>

        <div class="col-md-3">
            <?php
                $number = 0 ; 
                if(isset($_SESSION['cart'])){
                    $cart = $_SESSION['cart'] ; 
                    foreach ($cart as $value) {
                        $number += (int)$value['number'] ; 
                    }
                }
            ?>
            <a href="./shopppcart" style="text-decoration: none;">
                <p style="font-size: 25px; color: #CCA772;">GIỎ HÀNG : <i class="fa fa-shopping-cart"
                        aria-hidden="true"></i>&ensp;(<span style="color: red;" id="pty"><?php echo $number ?></span>)</p>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <?php if(count($banners) > 0): ?>
                <div class="carousel-inner">
                    <?php $i = 0 ;  ?>
                        <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div 
                                <?php if($i == 0): ?>
                                    class="carousel-item active"
                                <?php else: ?>
                                    class="carousel-item"
                                <?php endif; ?> 
                            >
                            <?php $i++ ;  ?>
                                <img class="d-block w-100" src="<?php echo e($slide->image); ?>" width="100%" height="542px" alt="First slide">
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php else: ?>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="./public/image/banner2.jpg" alt="First slide">
                        </div>
                    
                    </div>
                <?php endif; ?>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
    </div>
</div><?php /**PATH D:\xampp\htdocs\php2\demo2-php2\app\views/layout/slide.blade.php ENDPATH**/ ?>