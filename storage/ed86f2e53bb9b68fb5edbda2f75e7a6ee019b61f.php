
<?php $__env->startSection('main-conten'); ?>
<div class="page-header" style=" background-color: #FAFAFA;box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.1);">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Danh sách hóa đơn</h2>
    </div>
</div>

<div class="container">
    <p class="text-danger text-center"><?php echo e($errMsg); ?></p>
    <div class="row d-flex justify-content-center align-items-center">

        <div class="col-md-12">
            <table class="table table-hover" style="border: 3px solid #FAFAFA;font-size: 13px; text-align: left;">
                <thead class="thead-dark" style="font-size: 11px;">
                    <th>MHĐ</th>
                    <th>TÊN NGƯỜI ĐẶT</th>
                    <th width="180px">ĐỊA CHỈ NGƯỜI ĐẶT</th>
                    <th style="text-align: center;">SĐT</th>
                    <th>EMAIL</th>
                    <th>T.TIỀN</th>
                    <th>NGÀY TẠO</th>
                    <th style="text-align: center;">QUẢN LÍ</th>
                </thead>

                <tbody>
                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($pro->id); ?></td>
                        <td><?php echo e($pro->customer_name); ?></td>
                        <td><?php echo e($pro->customer_address); ?></td>
                        <td><?php echo e($pro->customer_phone); ?></td>
                        <td><?php echo e($pro->customer_email); ?></td>
                        <td><?php echo e(number_format($pro->total_price)); ?>đ</td>
                        <td><?php echo e($pro->created_at); ?></td>
                        <td>
                            <a href="./orders-detail?id=<?php echo e($pro->id); ?>" class="btn btn-info"><i class="fa fa-share-square-o" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-8">
            <?php if(isset($page2)): ?>
            <div class="pagination mt-3 d-flex justify-content-center">
                <a href="./list-orders?<?php
                   if($prew < 1){
                       echo "page=$page2" ; 
                   }else{
                       echo $prew ; 
                   }
                ?>"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                <?php for($t = 1; $t <= $page2; $t++): ?> <li onclick="lickbutton()"><a href="./list-orders?page=<?php echo e($t); ?>"
                        class="click[<?php echo e($t + 1); ?>]"><?php echo e($t); ?></a></li>
                    <?php endfor; ?>
                    <a href="./list-orders?<?php
                        if($next <= $page2){
                            echo "page=$next" ; 
                        }else{
                            echo "page=1" ; 
                        }
                    ?>"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout_admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\demo2-php2\app\views/admin/orders/list-orders.blade.php ENDPATH**/ ?>