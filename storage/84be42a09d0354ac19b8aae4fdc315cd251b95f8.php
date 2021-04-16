<div class="col-md-2">
    <div id="menu_lh">
        <ul style="display: block;">
            <div class="tt-sp">
                <h4>DANH MỤC SẢN PHẨM</h4>
            </div>
            <?php $__currentLoopData = $cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cates): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <a href="./product-cate?id=<?php echo e($cates->id); ?>"><?php echo e($cates->name); ?></a>
            </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
</div><?php /**PATH D:\xampp\htdocs\php2\demo2-php2\app\views/layout/category.blade.php ENDPATH**/ ?>