
<?php $__env->startSection('title-account','Đơn hàng đã mua'); ?>
<?php $__env->startSection('title-cn','Đơn hàng đã mua'); ?>
<?php $__env->startSection('conten-account'); ?>
<div class="content" style="margin-top: -80px;margin-bottom: -100px;">
    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <table class="table table-bordered" style="width:100%;font-size: 13px;">
                    <thead style="background-color: #cca772;color: white; text-align: center;">
                        <th>Mã hóa đơn</th>
                        <th>Tên</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>email</th>
                        <th>Tổng tiền</th>
                        <th>QL</th>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $orders_ed; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>TM-<?php echo e($a->id); ?></td>
                            <td><?php echo e($a->customer_name); ?></td>
                            <td><?php echo e($a->customer_address); ?></td>
                            <td><?php echo e($a->customer_phone); ?></td>
                            <td><?php echo e($a->customer_email); ?></td>
                            <td><?php echo e(number_format($a->total_price)); ?>đ</td>
                            <td>
                                <a href="">
                                    <i class="fa fa-share-square-o" aria-hidden="true" style="color: #cca772;"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

            <div class="col-md-1">
                <img src="./public/image/cart.jpg" style="width: 80px; margin-left: -20px;" alt="">
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('homepage.account', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\demo2-php2\app\views/tai-khoan/orders_ed.blade.php ENDPATH**/ ?>