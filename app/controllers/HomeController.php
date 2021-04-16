<?php
    namespace App\Controllers ; 
    use App\Models\Category ; 
    use App\Models\Product ;
    use App\Models\Slide;
    use App\Models\Comment ; 
    use App\Models\Image_product_gallery ; 

Class HomeController extends BaseController{

        public function index(){
            // lấy za danh mục ở menu 
            $cates =  Category::all() ;

            // lấy za banner 
            $banners = Slide::where('active','=','1')->get() ; 

            // lấy za 8 sản phẩm mwois về 
            $spmv  =  Product::limit(8)->orderBy('id','desc')->get();

            // lấy za các loại danh mục ở chữ áo 
            $variable = "Áo" ; 
            $shirt = Category::where('name','LIKE',$variable.'%')->get();

            $ao = "Áo" ; 
            // lấy za áo 
            $shirtAo = Product::where('name','LIKE',$ao.'%')->limit(4)->orderBy('id','desc')->get();

            // lấy za các loại danh mục ở chữ quần 
            $quan = "Quần" ; 
            $quan = Category::where('name','LIKE',$quan.'%')->get();
            // lấy ra sản phẩm quân 
            $quanss = "Quần" ; 
            $quans = Product::where('name','LIKE',$quanss.'%')->limit(4)->orderBy('id','desc')->get();

     
            // lấy za các phụ kiện balo và giày
            $balo = "Balo" ; 
            $giay = "Giày" ; 
            $cate_pk =  Category::where('name','LIKE',$balo.'%')->orWhere('name', 'LIKE', $giay.'%')->get();

            $phuKien = Product::where('name','LIKE',$balo.'%')->orWhere('name', 'LIKE', $giay.'%')->limit(4)->orderBy('id','desc')->get();


            $this->render('homepage.trangchu',[
                    'cates'=> $cates,
                    'banners'=>$banners,
                    'spmv'=>$spmv,
                    'shirt'=>$shirt,
                    'shirtAo'=>$shirtAo,
                    'quan'=>$quan ,
                    'quans'=>$quans,
                    'phuKien' => $phuKien,
                    'cate_pk' => $cate_pk
                ]) ; 
            // ListItem là biến được hiện bên file views (có thẻ chuyền được nhiều biến)
            // homepage.index là homepage/index tưc file index trong thư mục homepage 
        }

        public function chiTietSP(){
            // lấy id xuống 
            $msg = "" ; 
            $id = isset($_GET['id']) ? $_GET['id'] : "" ;
            if(!$id){
                header("location:./?msg=Sản phẩm này không tồn tại !") ; 
                die ; 
            } 

            // kiem tra xem id đó có thật hay ko 
            $model = Product::find($id) ;

            if(!$model){
                $msg = "Sản phẩm này không tồn tại !" ; 
                header("location:./?msg=Sản phẩm này không tồn tại !") ; 
                die ; 
            }
            // lấy za bình luận 
            $comment = Comment::join('user','user.id','comment.id_user')->select('comment.*','user.name as name_user','user.image as image_user','user.id as id_user')->where('comment.id_product','=',$model->id)->get() ; 

            // lấy za danh mục sp 
            $cate = Category::find($model->id_category) ; 
            // lấy za sản phẩm liên quan
            $spmv  =  Product::where('id','!=',$id)->Where('id_category', '=', $model->id_category)->inRandomOrder()->limit(4)->get();

            // lấy hình ảnh sản phẩm 
            $images = Image_product_gallery::where('id_product','=',$id)->limit(4)->get() ; 

            // upadte lượt xem của bảng product 
            $number_of_view = 1 ; 
            $model->number_of_views += $number_of_view ; 
            $model->save() ;  

            $this->render('homepage.chi-tiet-sp',[
                    'spmv'=>$spmv ,
                    'sp'=>$model,
                    'cate'=>$cate , 
                    'comment'=>$comment,
                    'images' =>$images

                ]) ; 
        }


        public function productCate(){
            $msg = "" ; 

            // lâyz id xuống 
            $id = isset($_GET['id']) ? $_GET['id'] : "" ;
            if(!$id){
                header("location:./?msg=Sản phẩm này không tồn tại !") ; 
                die ; 
            } 
            // laay za danh mucj 
            $cate = Category::find($id) ; 
            if(!isset($_POST['luu'])){
                // lay za sản phẩm có id_category = $id ; 
                $product = Product::where('id_category','=', $id)->get() ; 
                // $requesData = $_POST ; 
                // print_r($requesData) ; 
                // die ; 
                $this->render('homepage.product-cate',[
                        'product' => $product , 
                        'cate' =>$cate, 
                        'id' => $id
                    ]) ; 
            }else{
                $requesData = $_POST ; 
                // print_r($requesData) ; 
                // die ; 
                if(($requesData['name'] != "") && ($requesData['price_to'].$requesData['price_from'] == "")) {
                    $product = Product::where('id_category','=', $id)->where('name','like','%'.$requesData['name'].'%')->get() ;
                    $this->render('homepage.product-cate',[
                        'product' => $product , 
                        'cate' =>$cate, 
                        'id' => $id
                    ]) ; 
                }

                if(($requesData['price_from'] != "") && ($requesData['name'].$requesData['price_to'] == "")){
                    $product = Product::where('id_category','=', $id)->where('price','>', $requesData['price_from'])->get() ;
                    $this->render('homepage.product-cate',[
                        'product' => $product , 
                        'cate' =>$cate, 
                        'id' => $id
                    ]) ; 
                }

                if(($requesData['price_to'] != "") && ($requesData['name'].$requesData['price_from'] == "")){
                    $product = Product::where('id_category','=', $id)->where('price','<', $requesData['price_to'])->get() ;
                    $this->render('homepage.product-cate',[
                        'product' => $product , 
                        'cate' =>$cate, 
                        'id' => $id
                    ]) ; 
                }

                if(($requesData['name'].$requesData['price_from'] != "") && ($requesData['price_to'] == "")){
                    $product = Product::where('id_category','=', $id)->where('name','like','%'.$requesData['name'].'%')->where('price','>', $requesData['price_from'])->get() ;
                    $this->render('homepage.product-cate',[
                        'product' => $product , 
                        'cate' =>$cate, 
                        'id' => $id
                    ]) ;
                }

                if(($requesData['name'].$requesData['price_to'] != "") && ($requesData['price_from'] == "")){
                    $product = Product::where('id_category','=', $id)->where('name','like','%'.$requesData['name'].'%')->where('price','<', $requesData['price_to'])->get() ;
                    $this->render('homepage.product-cate',[
                        'product' => $product , 
                        'cate' =>$cate, 
                        'id' => $id
                    ]) ;
                }

                if(($requesData['price_to'].$requesData['price_from']) && ($requesData['name'] == "")){
                    $product = Product::where('id_category','=', $id)->where('price','>', $requesData['price_from'])->where('price','<', $requesData['price_to'])->get() ;
                    $this->render('homepage.product-cate',[
                        'product' => $product , 
                        'cate' =>$cate, 
                        'id' => $id
                    ]) ;
                }

                if($requesData['name'].$requesData['price_from'].$requesData['price_to'] != ""){
                    $product = Product::where('id_category','=', $id)->where('name','like','%'.$requesData['name'].'%')->where('price','>', $requesData['price_from'])->where('price','<', $requesData['price_to'])->get() ;
                    $this->render('homepage.product-cate',[
                        'product' => $product , 
                        'cate' =>$cate, 
                        'id' => $id
                    ]) ;
                }

                if($requesData['name'].$requesData['price_from'].$requesData['price_to'] == ""){
                        // lay za sản phẩm có id_category = $id ; 
                    $product = Product::where('id_category','=', $id)->get() ; 
                    // $requesData = $_POST ; 
                    // print_r($requesData) ; 
                    // die ; 
                    $this->render('homepage.product-cate',[
                            'product' => $product , 
                            'cate' =>$cate, 
                            'id' => $id
                        ]) ; 
                }


            }
          
        }


        // search 
        public function search(){
            $requesData = $_POST ; 
            if($requesData['keyword'] == ""){
                header("location:./?msg=Hãy nhập từ khóa tìm kiếm !") ; 
                die ; 
            }else{
                $model = Product::where('name','like','%'.$requesData['keyword'].'%')->orwhere('price',$requesData['keyword'])->get() ;
                $model2 = Product::where('name','like','%'.$requesData['keyword'].'%')->orwhere('price',$requesData['keyword'])->count() ; 
                $this->render('homepage.search',['search'=>$model,'search2'=>$model2]) ; 
            }


           
            
        }

        public function giaoDienAdmin(){
            $this->render('layout_admin.main') ; 

        }

        public function giaoDienTrangChu(){
            $this->view('layout.header') ;  ; 

        }


 

    }

?>