<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v6.0">
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="./public/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="./public/css/custom.css">
    <!-- Favicon-->

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

    <!-- ---- link tynimce ------ -->
    <script src="https://cdn.tiny.cloud/1/eh2f8jo1q8ypxkz794o9hf1otfkf8ftcygtd3lk4w47hzfrd/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>


    <!---------- js ------------------>

    <style>
    .header {
        width: 100%;
        height: 70px;
        background-color: #2D3035;
        display: flex;
    }

    .header-left {
        background-color: #2D3035;
    }

    .header-right li {
        margin: 0 20px;
        list-style: none;
    }

    .menu-right {
        display: flex;
        margin-left: 170px;
        margin-top: 15px;
    }

    .menu-right li a {
        text-decoration: none;
    }

    .list-unstyled li a {
        font-size: 13px;
    }

    /* ----------- css phaan trang ----------------  */
    
    .pagination {
        display: inline-block;
    }

    .pagination a {
        color: black;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
        transition: .3s;
        border: 1px solid #ddd;
        margin: 0 4px;
        box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.1);
    }


   
    

    </style>
</head>

<body>

    <div class="all">
        <div class="header">
            <div class="header-left" style="width: 280.4px; border-right: 1px solid gray;">
                <img src="./public/image/logo_the_men.png" alt=""
                    style="z-index: 99;width: 200px; height: 60px;margin-left: 30px;">
            </div>
            <div class="header-right" style="display: flex;">
                <ul style="display: flex; margin-left: -30px; margin-top: 15px;">
                    <li style="margin-top: 5px;">
                        <a href="./" style="color: gray; text-decoration: none;"><i class="fa fa-home"
                                aria-hidden="true"></i>&ensp; Trang chủ</a>
                    </li>
                    <li>
                        <form action="">
                            <input type="text" placeholder="   Bạn cần gi nào... ?"
                                style="border: 1px solid #BB414D; height: 38px; border-radius: 5px;  outline-color: none;">
                            <button class="btn btn-outline-danger" style="height: 40px; margin-top: -2px;">Tìm
                                kiếm</button>
                        </form>
                    </li>
                </ul>

                <ul class="menu-right">
                    <li style="margin-top: 5px;"><a href=""><i class="fa fa-envelope-o" aria-hidden="true"
                                style="color: gray;"></i></a></li>
                    <li style="margin-top: 5px;"><a href=""><i class="fa fa-facebook-official" aria-hidden="true"
                                style="color: gray;"></i></a></li>
                    <li style="margin-top: 5px;"><a href=""><i class="fa fa-twitter-square" aria-hidden="true"
                                style="color: gray;"></i></a></li>
                    <li><a href="./logout" class="btn btn-outline-danger"> Đăng
                            xuất</a></li>

                </ul>

            </div>
        </div>
    </div>
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        <nav id="sidebar">
            <!-- Sidebar Header-->
            <div class="sidebar-header d-flex align-items-center">
                <?php if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])): ?>
                <div class="avatar">
                    <img src="./<?php echo e($_SESSION['admin']['image']); ?>" alt=""
                        style="width: 50px;height: 50px;border-radius: 50%;">
                </div>
                <div class="title">
                    <h5 style="font-size: 12px;">
                        <?php echo e($_SESSION['admin']['name']); ?>

                    </h5>
                    <p><i class="fa fa-circle" aria-hidden="true" style="color: #33ff00;"></i>&ensp;Online</p>
                </div>
                <?php endif; ?>
            </div>
            <ul class="list-unstyled">
                <li>
                    <a href="./dashboard" aria-expanded="false">
                        <i style="font-size: 16px;" class="fa fa-tachometer" aria-hidden="true"></i>Dashboard
                    </a>
                </li>

                <li>
                    <a href="#exampledropdownDropdown6" aria-expanded="false" data-toggle="collapse"> <i
                            class="fa fa-hospital-o" aria-hidden="true" style="font-size: 20px;"></i>
                        Quản lí website setting
                    </a>
                    <ul id="exampledropdownDropdown6" class="collapse list-unstyled ">
                        <li><a href="./add-web"><i class="fa fa-genderless" aria-hidden="true"></i>Thêm thông tin
                            </a></li>
                        <li><a href="./list-web?page=1"><i class="fa fa-genderless" aria-hidden="true"></i>Danh sách thông
                                tin</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#exampledropdownDropdown1" aria-expanded="false" data-toggle="collapse"><i
                            class="fa fa-calendar" aria-hidden="true"></i>Quản lí danh mục
                    </a>
                    <ul id="exampledropdownDropdown1" class="collapse list-unstyled ">
                        <li><a href="./add-category"><i class="fa fa-genderless" aria-hidden="true"></i>Thêm danh
                                mục</a></li>
                        <li><a href="./list-category?page=1"><i class="fa fa-genderless" aria-hidden="true"></i>Danh sách danh
                                mục</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#exampledropdownDropdown3" aria-expanded="false" data-toggle="collapse"> <i
                            class="fa fa-product-hunt" aria-hidden="true"></i>
                        Quản lí sản phẩm
                    </a>
                    <ul id="exampledropdownDropdown3" class="collapse list-unstyled ">
                        <li><a href="./add-product"><i class="fa fa-genderless" aria-hidden="true"></i>Thêm sản phẩm</a>
                        </li>
                        <li><a href="./list-product?page=1"><i class="fa fa-genderless" aria-hidden="true"></i>Danh sách sản
                                phẩm</a></li>
                    </ul>
                </li>
                <!-- 
                <li>
                    <a href="#exampledropdownDropdown8" aria-expanded="false" data-toggle="collapse"> <i class="fa fa-file-image-o" aria-hidden="true"></i>
                        Quản lí hình ảnh sản phẩm
                    </a>
                    <ul id="exampledropdownDropdown8" class="collapse list-unstyled ">
                        <li><a href="./add-product"><i class="fa fa-genderless" aria-hidden="true"></i>Thêm mới hình ảnh</a>
                        </li>
                        <li><a href="./list-product"><i class="fa fa-genderless" aria-hidden="true"></i>Danh sách hình ảnh
                                </a></li>
                    </ul>
                </li> -->


                <li>
                    <a href="#exampledropdownDropdown2" aria-expanded="false" data-toggle="collapse"><i
                            class="fa fa-user" aria-hidden="true" style="font-size:23px;"></i>Quản lí user</a>
                    <ul id="exampledropdownDropdown2" class="collapse list-unstyled ">
                        <li><a href="./add-user"><i class="fa fa-genderless" aria-hidden="true"></i>Thêm mới user</a>
                        </li>
                        <li><a href="./list-user?page=1"><i class="fa fa-genderless" aria-hidden="true"></i>Danh sách user</a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#exampledropdownDropdown4" aria-expanded="false" data-toggle="collapse"><i
                            class="fa fa-address-card" aria-hidden="true"></i>Quản lí vai trò</a>
                    <ul id="exampledropdownDropdown4" class="collapse list-unstyled ">
                        <li><a href="./add-vai-tro"><i class="fa fa-genderless" aria-hidden="true"></i>Thêm mới vai
                                trò</a></li>
                        <li><a href="./list-vai-tro?page=1"><i class="fa fa-genderless" aria-hidden="true"></i>Danh sách vai
                                trò</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#exampledropdownDropdown5" aria-expanded="false" data-toggle="collapse"><i
                            class="fa fa-picture-o" aria-hidden="true"></i>Quản lí slide</a>
                    <ul id="exampledropdownDropdown5" class="collapse list-unstyled ">
                        <li><a href="./add-slide"><i class="fa fa-genderless" aria-hidden="true"></i>Thêm mới slide</a>
                        </li>
                        <li><a href="./list-slide?page=1"><i class="fa fa-genderless" aria-hidden="true"></i>Danh sách
                                silde</a></li>
                    </ul>

                <li>

                <li>
                    <a href="#exampledropdownDropdown7" aria-expanded="false" data-toggle="collapse"><i
                            class="fa fa-commenting" aria-hidden="true"></i>Quản lí comment</a>
                    <ul id="exampledropdownDropdown7" class="collapse list-unstyled ">

                        <li><a href="./list-comment?page=1"><i class="fa fa-genderless" aria-hidden="true"></i>Danh sách
                                comment</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#exampledropdownDropdown9" aria-expanded="false" data-toggle="collapse"><i
                            class="fa fa-first-order" aria-hidden="true"></i>Quản lí hóa đơn</a>
                    <ul id="exampledropdownDropdown9" class="collapse list-unstyled ">

                        <li><a href="./list-orders?page=1"><i class="fa fa-genderless" aria-hidden="true"></i>Danh sách
                                hóa đơn</a></li>
                    </ul>
                </li>





        </nav>
        <!-- Sidebar Navigation end-->
        <div class="page-content" style="background-color: white;">

            <!-- bắt đầu đục lỗ ở đây  -->
            <?php echo $__env->yieldContent('main-conten'); ?>
        </div>
    </div>
    </div>
</body>
<!-- <script src="./public/theme/hoa.js"></script> -->
<script>
var useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
tinymce.init({

    selector: 'textarea#full-featured-non-premium',
    plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
    imagetools_cors_hosts: ['picsum.photos'],
    menubar: 'file edit view insert format tools table help',
    toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
    toolbar_sticky: true,
    autosave_ask_before_unload: true,
    autosave_interval: '30s',
    autosave_prefix: '{path}{query}-{id}-',
    autosave_restore_when_empty: false,
    autosave_retention: '2m',
    image_advtab: true,
    link_list: [{
            title: 'My page 1',
            value: 'https://www.tiny.cloud'
        },
        {
            title: 'My page 2',
            value: 'http://www.moxiecode.com'
        }
    ],
    image_list: [{
            title: 'My page 1',
            value: 'https://www.tiny.cloud'
        },
        {
            title: 'My page 2',
            value: 'http://www.moxiecode.com'
        }
    ],
    image_class_list: [{
            title: 'None',
            value: ''
        },
        {
            title: 'Some class',
            value: 'class-name'
        }
    ],
    importcss_append: true,
    file_picker_callback: function(callback, value, meta) {
        /* Provide file and text for the link dialog */
        if (meta.filetype === 'file') {
            callback('https://www.google.com/logos/google.jpg', {
                text: 'My text'
            });
        }
        /* Provide image and alt text for the image dialog */
        if (meta.filetype === 'image') {
            callback('https://www.google.com/logos/google.jpg', {
                alt: 'My alt text'
            });
        }

        /* Provide alternative source and posted for the media dialog */
        if (meta.filetype === 'media') {
            callback('movie.mp4', {
                source2: 'alt.ogg',
                poster: 'https://www.google.com/logos/google.jpg'
            });
        }
    },
    templates: [{
            title: 'New Table',
            description: 'creates a new table',
            content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
        },
        {
            title: 'Starting my story',
            description: 'A cure for writers block',
            content: 'Once upon a time...'
        },
        {
            title: 'New list with dates',
            description: 'New List with dates',
            content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
        }
    ],
    template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
    template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
    height: 300,
    image_caption: true,
    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
    noneditable_noneditable_class: 'mceNonEditable',
    toolbar_mode: 'sliding',
    contextmenu: 'link image imagetools table',
    skin: useDarkMode ? 'oxide-dark' : 'oxide',
    content_css: useDarkMode ? 'dark' : 'default',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:14px }'
});
</script>

<script type="text/javascript">
// ----------------- làm biểu đồ trong --------------
google.charts.load("current", {
    packages: ["corechart"]
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    var data = google.visualization.arrayToDataTable([
        ['Loại', 'Số Lượng'],
        <?php
               if($tks){
                    foreach ($tks as $item){
                        echo "['$item[ten_loai]',$item[sl]],";
                    }
               }
                ?>
    ]);

    var options = {
        is3D: true,
    };

    var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
    chart.draw(data, options);
}
</script>

<script>
// làm biểu đồ doanh thu   

var ctx = document.getElementById('lineChart').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        // labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','October','October','December'],
        labels : [<?php
              foreach ($dt as $key) {
                  echo   $key['nt'] . "," ; 
                
              } 
        ?>] ,
        datasets: [{
            label: 'Thống kê doanh thu theo tháng (Tỉ lệ nghìn đồng)',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: '#FFFF00',
            // data: [0, 10, 5, 2, 20, 30, 45,67,42,10,23,17]
            data : [<?php 
                 foreach ($dt as $key) {
                     echo  $key['tt']."," ; 
                 }
            ?>]
        }]
    },

    // Configuration options go here
    options: {}
});
</script>
</html><?php /**PATH D:\xampp\htdocs\php2\demo2-php2\app\views/layout_admin/main.blade.php ENDPATH**/ ?>