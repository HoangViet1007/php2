<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THE MEN | @yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
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

    <link rel="stylesheet" href="./lib/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="./lib/owlcarousel/assets/owl.theme.default.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="./lib/owlcarousel/owl.carousel.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 30,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    });
    </script>

    <link rel="stylesheet" href="./public/css/main.css">

</head>

<body>
    <div class="container-fluid" style="height: 30px; background-color: #F2F2F2; padding: 0px 30px;">
        <div class="row">
            <div class="col-md-2">
                <p style="font-family: 'Redressed', cursive; font-size: 16px;">
                    <i class="fa fa-envelope" aria-hidden="true"></i>&ensp;hoangviet@gmail.com</a>

                </p>
            </div>

            <div class="col-md-7">
                <p style="font-family: 'Redressed', cursive; font-size: 16px;">
                    |&ensp; Free Shipping for all Oder of $99
                </p>
            </div>

            <div class="col-md-3">
                <div class="tai_khoan" style="float: right;font-family: 'Redressed', cursive; font-size: 16px;">
                    <i class="fa fa-phone-square" aria-hidden="true"></i>&ensp;0355755697
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row" style="box-shadow: 0px 5px 20px 0px rgba(0, 0, 0, 0.1);">
            <div class="col-md-2">
                <img src="./public/image/logothemen.png" alt="" width="100%" height="70px">
            </div>
            <div class="col-md-6 mt-3">
                <ul class="nav main-menu" style="margin-left: 10px;">
                    <li class="nav-item">
                        <a class="nav-link" href="" style="font-family: 'Redressed', cursive; font-size: 18px;">TRANG
                            CHỦ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" style="font-family: 'Redressed', cursive; font-size: 18px;">SẢN
                            PHẨM</a>
                        <ul class="sub-menu">
                            <li class="nav-item">
                                <a href="" class="nav-link">Room1</a>
                            </li>

                            <li class="nav-item">
                                <a href="" class="nav-link">Room1</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style="font-family:'Redressed', cursive; font-size: 18px;">GIỚI
                            THIỆU</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" style="font-family: 'Redressed', cursive; font-size: 18px;">TIN
                            TỨC</a>
                        <!-- <ul class="sub-menu">
                            <li class="nav-item">
                                <a href="" class="nav-link">BLOG DETAIL</a>
                            </li>
                        </ul> -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" style="font-family: 'Redressed', cursive; font-size: 18px;">LIÊN
                            HỆ</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-4" style="padding-left: 45px;">
                <div class="tt_menu mt-3">
                    @if(isset($_SESSION['khach_hang']) && !empty($_SESSION['khach_hang']))
                    <ul>
                        <li class="nav-item" style="padding-top: 17px; width: 240px;">
                            <!-- <a class="nav-link a" href="./account"
                                style="border: none;" ><i class="fa fa-user-o" aria-hidden="true" style="font-size: 40px;color: #CCA772;"></i>Tài khoản <br>{{$_SESSION['khach_hang']['name']}}</a> -->
                            <a class="nav-link" href="./account" style="margin-top: -15px;">
                                <div class="row">
                                    <div class="col-md-3"><i class="fa fa-user-o" aria-hidden="true"
                                            style="font-size: 40px;color: #CCA772;margin-top: 8px;"></i></div>
                                    <div class="col-md-9">
                                        <div class="row">Tài khoản</div>
                                        <div class="row">
                                            <span>{{$_SESSION['khach_hang']['name']}}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item" style="padding-top: 17px; width: 100px;">
                            <a class="nav-link a" href="./logout"
                                style="color: gray;border: 2px solid #CCA772;font-family:'Redressed', cursive; font-size: 15px;text-align: center;">Đăng
                                xuất</a>
                        </li>
                    </ul>
                    @elseif (isset($_SESSION['admin']) && !empty($_SESSION['admin']))
                    <ul style="margin-left: -100px;">
                        <li class="nav-item" style="padding-top: 17px; width: 220px;">
                            <a class="nav-link" href="./account" style="margin-top: -15px;">
                                <div class="row">
                                    <div class="col-md-3"><i class="fa fa-user-o" aria-hidden="true"
                                            style="font-size: 40px;color: #CCA772;margin-top: 8px;"></i></div>
                                    <div class="col-md-9">
                                        <div class="row">Tài khoản</div>
                                        <div class="row">
                                            <span>{{$_SESSION['admin']['name']}}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" style="padding-top: 17px; width: 100px;">
                            <a class="nav-link a" href="./dashboard"
                                style="color: gray;border: 2px solid #CCA772;font-family:'Redressed', cursive; font-size: 15px;text-align: center;">Admin</a>
                        </li>
                        <li class="nav-item" style="padding-top: 17px; width: 100px;">
                            <a class="nav-link a" href="./logout"
                                style="color: gray;border: 2px solid #CCA772;font-family:'Redressed', cursive; font-size: 15px;text-align: center;">Đăng
                                xuất</a>
                        </li>
                    </ul>
                    @else
                    <ul style="margin-left: 80px;">
                        <li class="nav-item" style="padding-top: 10px;width: 100px;">
                            <a class="nav-link a" href="./login"
                                style="color: gray; border: 2px solid #CCA772;font-family:'Redressed', cursive; font-size: 15px;text-align: center;">Đăng
                                nhập</a>
                        </li>
                        <li class="nav-item" style="padding-top: 10px;width: 100px;">
                            <a class="nav-link a" href="./register"
                                style="color: gray;border: 2px solid #CCA772;font-family:'Redressed', cursive; font-size: 15px;text-align: center;">Đăng
                                kí</a>
                        </li>
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- --------------------------------------------------- phần conten để các file kia thừa kế ------------------------------------------------->
    @yield('conten')
    <!-- -------------------------------------------------------------- end conten ----------------------------------------------------------------->
    <?php  require_once "./app/views/layout/footer.blade.php" ?>
</body>

</html>