
<?php $__env->startSection('main-conten'); ?>
<div class="page-header" style=" background-color: #FAFAFA;box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.1);">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Danh sách thông tin khách sạn</h2>
    </div>
</div>

<div class="container">
    <p class="text-danger text-center"><?php echo e($errMsg); ?></p>
    <div class="row d-flex justify-content-center align-items-center">

        <div class="col-md-12">
            <table class="table table-hover" style="border: 3px solid #FAFAFA;font-size: 13px; text-align: left;">
                <thead class="thead-dark" style="font-size: 13px;">
                    <th>ID</th>
                    <th>TÊN KHÁCH SẠN</th>
                    <th>ĐỊA CHỈ</th>
                    <th>SỐ ĐIỆN THOẠI</th>
                    <th>EMAIL</th>
                    <th width="100">LOGO</th>
                    <th>
                        <a href="./add-web" class=" btn btn-info" style="width: 100px; text-align: center;"><i class="fa fa-plus" aria-hidden="true"></i> Add</a>
                    </th>
                </thead>

                <tbody>
                    <?php $__currentLoopData = $web; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                       <td><?php echo e($pro->id); ?></td>
                       <td><?php echo e($pro->name); ?></td>
                       <td><?php echo e($pro->address); ?></td>
                       <td><?php echo e($pro->phone); ?></td>
                       <td><?php echo e($pro->email); ?></td>
                       <td>
                           <img src="<?php echo e($pro->logo); ?>" alt="" width="100px" height="60px">
                       </td>
                        <td>
                            <a href="./edit-web?id=<?php echo e($pro->id); ?>" class="btn btn-danger mr-3"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="./delete-web?id=<?php echo e($pro->id); ?>" class="btn btn-info" onclick="return confirm('Bạn có chắc chắn muốn xóa thông tin khách sạn này ?')"><i class="fa fa-trash"
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
            <div class="pagination mt-3 d-flex justify-content-center">
                <a href="./list-web?<?php
                    if($prew < 1){
                        echo "page=$page2" ; 
                    }else{
                        echo "page=$prew" ; 
                    }
                ?>"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                <?php for($t = 1; $t <= $page2; $t++): ?>
                    <li><a href="./list-web?page=<?php echo e($t); ?>"><?php echo e($t); ?></a></li>
                <?php endfor; ?>
                    <!-- <li><a href="">1</a></li>
                    <li><a href="">2</a></li>
                    <li><a href="">3</a></li>
                    <li><a href="">4</a></li> -->
                    <a href="./list-web?<?php
                        if($next <= $page2){
                            echo "page=$next" ; 
                        }else{
                            echo "page=1" ; 
                        }
                    ?>"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout_admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\demo2-php2\app\views/admin/websetting/list-web.blade.php ENDPATH**/ ?>