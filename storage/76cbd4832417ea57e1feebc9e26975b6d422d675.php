
<?php $__env->startSection('main-conten'); ?>
<div class="page-header" style=" background-color: #FAFAFA;box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.1);">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Danh sách bình luận</h2>
    </div>
</div>

<div class="container">
    <p class="text-danger text-center"><?php echo e($errMsg); ?></p>
    <div class="row d-flex justify-content-center align-items-center">

        <div class="col-md-12">
            <table class="table table-hover" style="border: 3px solid #FAFAFA;font-size: 13px; text-align: left;">
                <thead class="thead-dark" style="font-size: 13px;">
                    <th>MÃ SẢN PHẨM</th>
                    <th>TÊN SẢN PHẨM</th>
                    <th>HÌNH ẢNH</th>
                    <th>SỐ BÌNH LUẬN</th>
                    <th>BÌNH LUẬN MỚI NHẤT</th>
                    <th>BÌNH LUẬN CŨ NHẤT</th>
                    <th width="150">
                        QUẢN LÍ
                    </th>
                </thead>

                <tbody>
                    <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                    <td><?php echo e($pro->id_product); ?></td>
                        <td><?php echo e($pro->name_product); ?></td>
                        <td>
                            <img src="<?php echo e($pro->image_product); ?>" alt="hinh ảnh" width="60px" height="60px">
                        </td>
                        <td><?php echo e($pro->sbl); ?></td>
                        <td><?php echo e($pro->max); ?></td>
                        <td><?php echo e($pro->min); ?></td>
                        <td>
                            <a href="./comment-detail?id=<?php echo e($pro->id_product); ?>" class="btn btn-danger mr-3" style="font-size: 12px;"><i class="fa fa-eye" aria-hidden="true"></i>&ensp;Xem chi tiết</a>
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
                <a href="./list-comment?<?php
                   if($prew < 1){
                       echo "page=$page2" ; 
                   }else{
                       echo $prew ; 
                   }
                ?>"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                <?php for($t = 1; $t <= $page2; $t++): ?> <li onclick="lickbutton()"><a href="./list-comment?page=<?php echo e($t); ?>"
                        class="click[<?php echo e($t + 1); ?>]"><?php echo e($t); ?></a></li>
                    <?php endfor; ?>
                    <a href="./list-comment?<?php
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
<?php echo $__env->make('layout_admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\demo2-php2\app\views/admin/comment/list-comment.blade.php ENDPATH**/ ?>