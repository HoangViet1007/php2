
<?php $__env->startSection('main-conten'); ?>
<div class="page-header" style=" background-color: #FAFAFA;box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.1);">
    <div class="container-fluid">
        <h2 class="h5 no-margin-bottom">Danh sách user</h2>
    </div>
</div>

<div class="container">
    <div class="mb-3 row d-flex justify-content-center align-items-center"
        style="width: 100%; height: 60px;background-color: #FAFAFA;box-shadow: 0px 5px 20px 0px rgb(0 0 0 / 10%);border: 1px solid #ccc;margin-left: 1px;">
        <div class="col-md-4 d-flex align-items-center" style="border: 1px solid #ccc;">
            <form action="./list-user?page=1" class="mt-2" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-2">
                        <label for="">
                            <input type="submit" class="btn" name="sx"
                                style="background-color: #343a40;color:white; width: 100%;" value="Lọc">
                        </label>
                    </div>
                    <div class="col-md-10">
                        <select name="vai_tro" id="" class="form-control" style="width: 255px;border-radius: 5px;">
                            <option value="">-- Lọc theo chức vụ --</option>
                            <?php $__currentLoopData = $vai_tro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($cate->id); ?>"><?php echo e($cate->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-8 d-flex align-items-center" style="border: 1px solid #ccc;">
            <form action="./list-user?page=1" class="mt-2" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-5">
                        <input type="text" name="id" placeholder="Tên đăng nhập..." class="form-control"
                            style="width:280px;border-radius: 5px; ">
                    </div>

                    <div class="col-md-5">
                        <input type="text" name="name" placeholder="Họ và tên..." class="form-control"
                            style="width:280px;border-radius: 5px; ">
                    </div>

                    <div class="col-md-2">
                        <label for="">
                            <input type="submit" class="btn" name="tk" style="background-color: #343a40;color:white;"
                                value="Tìm Kiếm">
                        </label>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <p class="text-danger text-center"><?php echo e($errMsg); ?></p>
    <div class="row d-flex justify-content-center align-items-center">

        <div class="col-md-12">
        <?php if(count($users) > 0): ?>
            <table class="table table-hover" style="border: 3px solid #FAFAFA;font-size: 13px; text-align: left;">
                <thead class="thead-dark" style="font-size: 13px;">
                    <th>ID</th>
                    <th>HỌ VÀ TÊN</th>
                    <th>HÌNH ẢNH</th>
                    <th width="150px">EMAIL</th>
                    <th>ĐỊA CHỈ</th>
                    <th>SĐT</th>
                    <th>VAI TRÒ</th>
                    <th>
                        <a href="./add-user" class=" btn btn-info" style="width: 100px; text-align: center;"><i
                                class="fa fa-plus" aria-hidden="true"></i> Add</a>
                    </th>
                </thead>

                <tbody>
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($pro->id); ?></td>
                        <td><?php echo e($pro->name); ?></td>
                        <td>
                            <img src="<?php echo e($pro->image); ?>" alt="" width="60px" height="60px">
                        </td>
                        <td><?php echo e($pro->email); ?></td>
                        <td><?php echo e($pro->address); ?></td>
                        <td><?php echo e($pro->phone); ?></td>
                        <td><?php echo e($pro->name_vt); ?></td>
                        <td>
                            <a href="./edit-user?id=<?php echo e($pro->id); ?>" class="btn btn-danger mr-3"><i
                                    class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                            <a href="./delete-user?id=<?php echo e($pro->id); ?>" class="btn btn-info"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa user này không ?')"><i
                                    class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <?php else: ?>
            <p class="text-danger text-center">Không có người nào thỏa mãn yêu cầu !</p>
            <?php endif; ?>
        </div>
    </div>

    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-8">
            <?php if(isset($page2)): ?>
            <div class="pagination mt-3 d-flex justify-content-center">
                <a href="./list-user?<?php
                   if($prew < 1){
                       echo "page=$page2" ; 
                   }else{
                       echo $prew ; 
                   }
                ?>"><i class="fa fa-chevron-left" aria-hidden="true"></i></a>
                <?php for($t = 1; $t <= $page2; $t++): ?> <li onclick="lickbutton()"><a href="./list-user?page=<?php echo e($t); ?>"
                        class="click[<?php echo e($t + 1); ?>]"><?php echo e($t); ?></a></li>
                    <?php endfor; ?>
                    <a href="./list-user?<?php
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
<?php echo $__env->make('layout_admin.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\php2\demo2-php2\app\views/admin/user/list-user.blade.php ENDPATH**/ ?>