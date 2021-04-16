
<?php $__env->startSection('main-conten'); ?>
<div class="page-header" style=" background-color: #FAFAFA;box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.1);">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Danh sách slide ảnh</h2>
    </div>
</div>

<div class="container">
    <p class="text-danger text-center"><?php echo e($errMsg); ?></p>
    <div class="row d-flex justify-content-center align-items-center">

        <div class="col-md-10">
            <table class="table table-hover" style="border: 3px solid #FAFAFA;">
                <thead class="thead-dark">
                    <th>TIÊU ĐỀ</th>
                    <th>HÌNH ẢNH</th>
                    <th>LINK</th>
                    <th>TRẠNG THÁI</th>
                    <th width="130">
                        <a href="./add-slide" class=" btn btn-info" style="width: 88px;text-align: center;"><i
                                class="fa fa-plus" aria-hidden="true"></i> Add</a>
                    </th>
                </thead>

                <tbody>
                    <?php $__currentLoopData = $slide; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($slide->title); ?></td>
                        <td>
                            <img src="<?php echo e($slide->image); ?>" alt="" width="200px">
                        </td>
                        <td><?php echo e($slide->link); ?></td>
                        <td>
                            <?php if($slide->active == 0): ?>
                            <a href="./active?id=<?php echo e($slide->id); ?>">Chưa hoạt động</a>
                            <?php elseif($slide->active == 1): ?>
                            <a href="./no-active?id=<?php echo e($slide->id); ?>">Hoạt động</a>
                            <?php else: ?>
                            No
                            <?php endif; ?>
                        </td>

                        <td>
                            <a href="./edit-slide?id=<?php echo e($slide->id); ?>" class="btn btn-danger"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="./delete-slide?id=<?php echo e($slide->id); ?>" class="btn btn-info" onclick="return confirm('Bạn có chắc chắn muốn xóa slide này không ?')"><i class="fa fa-trash"
                                    aria-hidden="true"></i></a>
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
                <a href="./list-slide?<?php
                   if($prew < 1){
                       echo "page=$page2" ; 
                   }else{
                       echo $prew ; 
                   }
                ?>"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                <?php for($t = 1; $t <= $page2; $t++): ?> <li onclick="lickbutton()"><a href="./list-slide?page=<?php echo e($t); ?>"
                        class="click[<?php echo e($t + 1); ?>]"><?php echo e($t); ?></a></li>
                    <?php endfor; ?>
                    <a href="./list-slide?<?php
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
<?php echo $__env->make('layout_admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\demo2-php2\app\views/admin/slide/list-slide.blade.php ENDPATH**/ ?>