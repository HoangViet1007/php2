
<?php $__env->startSection('main-conten'); ?>
<div class="page-header" style=" background-color: #FAFAFA;box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.1);">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Dashborad</h2>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card1 border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    user</div>
                            </a>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?php echo e($user); ?></div>
                        </div>
                        <div class="col-auto">
                            <i style="font-size: 40px;" class="fa fa-user text-gray-300" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- category s -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card1 border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Revenue </div>
                            </a>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?php echo e(number_format($tong_tien)); ?> đ</div>
                        </div>
                        <div class="col-auto">
                            <!-- <i class="fa fa-usd text-gray-300" style="font-size: 40px;" aria-hidden="true"></i> -->
                            <img src="./public/image/vnd2.png" alt="" width="40px">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- product -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card1 border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">product
                                </div>
                            </a>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-dark"><?php echo e($products); ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-shopping-cart text-gray-300" style="font-size: 40px;"
                                aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- comment -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card1 border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    new comment</div>
                            </a>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?php echo e($bl); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-comments text-gray-300" style="font-size: 40px;" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card1 border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    category</div>
                            </a>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?php echo e($categorys); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-calendar text-gray-300" style="font-size: 40px;" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card1 border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    slide image</div>
                            </a>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?php echo e($slides); ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-picture-o text-gray-300" style="font-size: 40px;" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card1 border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">position
                                </div>
                            </a>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-dark"><?php echo e($vaitro); ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-address-card text-gray-300" style="font-size: 40px;" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card1 border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Order</div>
                            </a>
                            <div class="h5 mb-0 font-weight-bold text-dark"><?php echo e($hd); ?></div>
                        </div>
                        <div class="col-auto">
                            <img src="./public/image/hd.png" alt="" width="50px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="chart-left"
                style="border: 1px solid #dedede; width: 100%; height: 400px;box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.2);">
                <!-- biểu đồ doanh thu  -->
                <canvas id="lineChart"></canvas>

            </div>
        </div>
        <div class="col-md-4">
            <div class="chart-right"
                style="border: 1px solid #dedede; width: 100%; height: 400px;box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.2); padding: 30px;">
                <!-- biểu đồ hình tròn  -->
                <p
                    style="color: gray; font-size: 18px; font-weight: bold; text-transform: uppercase; margin-left: 10px; text-align: center;">
                    Thống kê sản phẩm </p>
                <div id="piechart_3d" style=" height: 330px; margin-top: -20px;"></div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout_admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\demo2-php2\app\views/admin/dashboard/dashboard.blade.php ENDPATH**/ ?>