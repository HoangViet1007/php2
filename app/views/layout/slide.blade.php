<div class="col-md-10">
    <div class="row">
        <div class="col-md-9">
        <!-- -------------- search -----------------------  -->
            <form action="./search" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-9">
                            <input type="text" placeholder="Bạn cần gi nào ..?" name="keyword" class="form-control"
                                style="height: 40px; border-radius: 0%; width: 580px;">

                        </div>
                        <div class="col-md-3">
                            <input type="submit" value="Tìm kiếm"
                                style="border:none ; background-color: #CCA772; width: 130px; text-align: center; color: white; height: 40px;margin-left: -20px;">
                        </div>
                    </div>
                </div>
            </form>
           <!-- -------------------end search ------------------  -->
        </div>

        <div class="col-md-3">
            <?php
                $number = 0 ; 
                if(isset($_SESSION['cart'])){
                    $cart = $_SESSION['cart'] ; 
                    foreach ($cart as $value) {
                        $number += (int)$value['number'] ; 
                    }
                }
            ?>
            <a href="./shopppcart" style="text-decoration: none;">
                <p style="font-size: 25px; color: #CCA772;">GIỎ HÀNG : <i class="fa fa-shopping-cart"
                        aria-hidden="true"></i>&ensp;(<span style="color: red;" id="pty"><?php echo $number ?></span>)</p>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                @if(count($banners) > 0)
                <div class="carousel-inner">
                    <?php $i = 0 ;  ?>
                        @foreach($banners as $slide)
                            <div 
                                @if($i == 0)
                                    class="carousel-item active"
                                @else
                                    class="carousel-item"
                                @endif 
                            >
                            <?php $i++ ;  ?>
                                <img class="d-block w-100" src="{{$slide->image}}" width="100%" height="542px" alt="First slide">
                            </div>
                        @endforeach
                </div>
                @else
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="./public/image/banner2.jpg" alt="First slide">
                        </div>
                    
                    </div>
                @endif
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
    </div>
</div>