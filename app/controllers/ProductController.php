<?php
    namespace App\Controllers ; 
    use App\Models\Product ; 
    use App\Models\Category ; 

    class ProductController extends BaseController{

        
        public function listProduct(){
            $msg = isset($_GET['msg']) ? $_GET['msg'] : "" ; 

            // làm phân trang 
            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
                if (!is_numeric($page) || $page <= 0) {
                    header("location:./list-product?page=1");
                }
            }
            $next = $page + 1 ; 
            $prew = $page - 1 ; 


            $data = 5;
            $number = Product::all()->count() ; 
            $page2 = ceil($number / $data);
            $tin = ($page - 1) * $data;

            // làm yêu cầu 
            // lấy za các danh mục sản phẩm 
            $cates = Product::join('category','category.id','product.id_category')->select('product.id_category as id_category','category.name as name_category')->groupBy('product.id_category')->get() ; 
        

            // bắt đầu lọc 
            if(isset($_POST['sx'])){
                $requesData = $_POST ; 
                if($requesData['id_category'] != ""){
                    $model = Product::join('category','category.id','product.id_category')->select('product.*','category.name as name_cate')->where('id_category','=',$requesData['id_category'])->orderBy('id','desc')->get() ; 
                    $this->render('admin.product.list-product',
                    [
                        'products' => $model ,
                        'errMsg' => $msg ,
                        'cates'=>$cates , 
                        'page2'=> $page2 
                    ]); 
                }else{
                    $model = Product::join('category','category.id','product.id_category')->select('product.*','category.name as name_cate')->skip($tin)->limit($data)->orderBy('id','desc')->get() ; 
                        
                    $this->render('admin.product.list-product',
                    [
                        'products' => $model ,
                        'errMsg' => $msg ,
                        'page2'=> $page2 , 
                        'cates'=>$cates
                    ]); 
                }
               
            }
            elseif(isset($_POST['tk'])){
                $requesData = $_POST ; 
                // print_r($requesData) ; 
                // die ; 
                if(($requesData['name'] != "") && ($requesData['price'] == "") ){
                    $model = Product::join('category','category.id','product.id_category')->select('product.*','category.name as name_cate')->where('product.name','like','%'.$requesData['name'].'%')->orderBy('id','desc')->get() ; 
                    $this->render('admin.product.list-product',
                    [
                        'products' => $model ,
                        'errMsg' => $msg ,
                        'cates'=>$cates , 
                        // 'page2'=> $page2 
                    ]); 
                       
                }
                elseif(($requesData['price'] != "") && ($requesData['name'] == "") ){
                    $model = Product::join('category','category.id','product.id_category')->select('product.*','category.name as name_cate')->where('price','>', $requesData['price'])->orderBy('id','desc')->get() ; 
                    $this->render('admin.product.list-product',
                    [
                        'products' => $model ,
                        'errMsg' => $msg ,
                        'cates'=>$cates , 
                        // 'page2'=> $page2 
                    ]); 
                       
                }
                elseif(($requesData['name'] . $requesData['price']) != ""){
                    $model = Product::join('category','category.id','product.id_category')->select('product.*','category.name as name_cate')->where('price','>', $requesData['price'])->where('product.name','like','%'.$requesData['name'].'%')->orderBy('id','desc')->get() ; 
                    $this->render('admin.product.list-product',
                    [
                        'products' => $model ,
                        'errMsg' => $msg ,
                        'cates'=>$cates , 
                        // 'page2'=> $page2 
                    ]);

                }
                else{
                    $model = Product::join('category','category.id','product.id_category')->select('product.*','category.name as name_cate')->skip($tin)->limit($data)->orderBy('id','desc')->get() ; 
                        
                    $this->render('admin.product.list-product',
                    [
                        'products' => $model ,
                        'errMsg' => $msg ,
                        'page2'=> $page2 , 
                        'cates'=>$cates
                    ]); 
                }
            }
            else{
                // trường hợp ko có j 
                $model = Product::join('category','category.id','product.id_category')->select('product.*','category.name as name_cate')->skip($tin)->limit($data)->orderBy('id','desc')->get() ; 
                        
                $this->render('admin.product.list-product',
                [
                    'products' => $model ,
                    'errMsg' => $msg ,
                    'page2'=> $page2 , 
                    'cates'=>$cates ,
                    'next' =>$next , 
                    'prew' => $prew
                ]); 
            }

        }

        public function addProduct(){

            // lấy za danh mục sản phẩm 
            $cates = Category::all() ; 
            $this->render('admin.product.add-product',['cates' => $cates]) ; 
        }

        public function saveAddProduct(){
            // lấy dữ liệu bên form
            $requesData = $_POST ;
            $msg = "" ; 
            $image = $_FILES['image'] ; 
            $nameErr = $imageErr = $priceErr = $saleErr = $number_of_viewsErr = $id_categoryErr = $descriptionErr = "" ; 

            $model = new Product() ;
            $cates = Category::all() ;  

            // validate
            // name 
            if(empty($requesData['name'])){
                $nameErr = "Hãy nhập tên cho sản phẩm !" ; 
            }else{
                if(strlen($requesData['name']) < 3 || strlen($requesData['name']) > 30){
                    $nameErr = "Tên vai trò không hợp lệ !" ; 
                }
            }

            // image 
            $dir = "./public/image/product/";
            $target_file = $dir . basename($image['name']);
            $filename = "";
            $path = "";
            $sizeanh = 1500000;
            $typeanh =  array('jpg', 'png', 'jpeg','bmp');
            $kieu = pathinfo($target_file, PATHINFO_EXTENSION);
            // $check = getimagesize($_FILES['image']['tmp_name']);
            if($_FILES['image']['size'] <= 0  ){
                $imageErr = "Hãy thêm hình ảnh cho sản phẩm !"; 
            }    
            elseif ($_FILES['image']['size'] > $sizeanh) {
                $imageErr = "File ảnh quá lớn. Vui lòng chọn ảnh khác !";
            }
            // elseif(!($check !== false)) {
            //     $imageErr = "Hãy nhập ảnh hợp lệ !";
            // } 
            else{        
                if (!in_array($kieu, $typeanh)) {
                    $imageErr = "Chỉ được upload các định dạng JPG, PNG, JPEG";
                }
                elseif ($image['size'] > 0 && $image['size'] < $sizeanh) {
                    $filename = uniqid() . "_" . $image['name'];
                    move_uploaded_file($image['tmp_name'], "./public/image/product/" . $filename);
                    $path = "public/image/product/" . $filename;
                } 
                else {
                    $imageErr = "";
                }
            }

            // price 
            if(empty($requesData['price'])){
                $priceErr = "Hãy nhập giá cho sản phẩm !" ; 
            }else{
                if( strlen($requesData['price']) == 0 || $requesData['price'] <= 0 ){
                    $priceErr = "Gía không hợp lệ !" ; 
                }
            }

            // sale 
            if(empty($requesData['sale'])){
                $saleErr = "Hãy nhập giảm giá cho sản phẩm !" ; 
            }else{
                if( strlen($requesData['sale']) == 0 || $requesData['sale'] <= 0 ){
                    $saleErr = "Giảm gía không hợp lệ !" ; 
                }
            }
            
            // view
            if(empty($requesData['number_of_views'])){
                $number_of_viewsErr = "Hãy nhập giảm giá cho sản phẩm !" ; 
            }else{
                if( strlen($requesData['number_of_views']) == 0 || $requesData['number_of_views'] <= 0 ){
                    $number_of_viewsErr = "Số lượt xem không hợp lệ !" ; 
                }
            }

            // danh mục sản phẩm 
            if($requesData['id_category'] == ""){
                $id_categoryErr = "Hãy chọn danh mục sản phẩm !" ; 
            }
            
            // description
            if(empty($requesData['description'])){
                $descriptionErr = "Hãy nhập mô tả cho sản phẩm !" ; 
            }

            // lối chuối lỗi 
            if($nameErr.$imageErr.$priceErr.$saleErr.$number_of_viewsErr.$id_categoryErr.$descriptionErr != ""){
                $this->render('admin.product.add-product',[
                    'nameErr'              =>$nameErr,
                    'imageErr'             =>$imageErr,
                    'priceErr'             =>$priceErr,
                    'saleErr'              =>$saleErr,
                    'number_of_viewsErr'   =>$number_of_viewsErr,
                    'descriptionErr'       =>$descriptionErr,
                    'id_categoryErr'       =>$id_categoryErr,
                    'cates'                => $cates
                ]) ; 
                die ; 
            }
            


            // ok hết zồi thì lưu

            $model->name = $requesData['name'] ; 
            $model->price = $requesData['price'] ; 
            $model->sale = $requesData['sale'] ; 
            $model->description = $requesData['description'] ; 
            $model->number_of_views = $requesData['number_of_views'] ; 
            $model->id_category = $requesData['id_category'] ;      
            $model->image = $path ; 
        
            $model->save() ; 
            $msg = "Thêm sản phẩm thành công !" ; 

            header("location:./list-product?msg=$msg") ; 

        }


        public function deleteProduct(){
            // xóa sản phẩm
            $msg = "" ; 
            $id = isset($_GET['id']) ? $_GET['id'] : "" ; 
            if(!$id){
                header("location:./list-product?msg=Sản phẩm này không tồn tại !") ; 
                die ; 
            }

            // kiem tra xem id đó có thật hay ko 
            $model = Product::find($id) ; 

            if(!$model){
                $msg = "Sản phẩm này không tồn tại !" ; 
            }
            else{
                Product::destroy($id) ; 
                $msg = "Xóa sản phẩm thành công !" ; 
                
            }
            header("location:./list-product?msg=$msg") ; 
        }
        
        public function editProduct(){
            $msg = "" ; 
            $id = isset($_GET['id']) ? $_GET['id'] : "" ; 
            if(!$id){
                header("location:./list-product?msg=Không đủ thông tin để sửa sản phẩm !") ; 
                die ; 
            }

            // khi mà đủ thông tin zồi thì find lại dữ liệu cũ 
            $cates = Category::all() ; 
            $product = Product::find($id) ; 
            if(!$product){
                $msg = "Sản phẩm này không tồn tại !" ; 
                header("location:./list-product?msg=$msg") ; 
                die ; 
             }

             $this->render('admin.product.edit-product',['cates' => $cates , 'product' => $product]) ; 
        }

        public function saveEditProduct(){
            $msg = "" ; 
            $id = isset($_GET['id']) ? $_GET['id'] : "" ;
            if(!$id){
                header("location:./list-product?msg=Mã sản phẩm không tồn tại !") ; 
                die ; 
            }
            $model = Product::find($id) ; 
            $cates = Category::all() ; 

            if(!$model){
                $msg = "Sản phẩm này không tồn tại !" ; 
                header("location:./list-product?msg=$msg") ; 
                die ; 
             }
             // bắt đầu update
             $requesData = $_POST ;
             $image = $_FILES['image'] ; 
             $nameErr = $imageErr = $priceErr = $saleErr = $number_of_viewsErr = $id_categoryErr = $descriptionErr = "" ; 

             // validate 
          // name 
          if(empty($requesData['name'])){
            $nameErr = "Hãy nhập tên cho sản phẩm !" ; 
            }else{
                if(strlen($requesData['name']) < 3 || strlen($requesData['name']) > 30){
                    $nameErr = "Tên sản phẩm không hợp lệ !" ; 
                }
            }

        // image 
        $dir = "./public/image/product/";
        $target_file = $dir . basename($image['name']);
        $filename = "";
        $path = "";
        $sizeanh = 1500000;
        $typeanh =  array('jpg', 'png', 'jpeg','bmp');
        $kieu = pathinfo($target_file, PATHINFO_EXTENSION);
        // $check = getimagesize($_FILES['image']['tmp_name']);
        if($_FILES['image']['size'] <= 0  ){
            $path = $model->image ; 
        }    
        elseif ($_FILES['image']['size'] > $sizeanh) {
            $imageErr = "File ảnh quá lớn. Vui lòng chọn ảnh khác !";
        }
        // elseif(!($check !== false)) {
        //     $imageErr = "Hãy nhập ảnh hợp lệ !";
        // } 
        else{        
            if (!in_array($kieu, $typeanh)) {
                $imageErr = "Chỉ được upload các định dạng JPG, PNG, JPEG";
            }
            elseif ($image['size'] > 0 && $image['size'] < $sizeanh) {
                $filename = uniqid() . "_" . $image['name'];
                move_uploaded_file($image['tmp_name'], "./public/image/product/" . $filename);
                $path = "public/image/product/" . $filename;
            } 
            else {
                $imageErr = "";
            }
        }

        // price 
        if(empty($requesData['price'])){
            $priceErr = "Hãy nhập giá cho sản phẩm !" ; 
        }else{
            if( strlen($requesData['price']) == 0 || $requesData['price'] <= 0 ){
                $priceErr = "Gía không hợp lệ !" ; 
            }
        }

        // sale 
        if(empty($requesData['sale'])){
            $saleErr = "Hãy nhập giảm giá cho sản phẩm !" ; 
        }else{
            if( strlen($requesData['sale']) == 0 || $requesData['sale'] <= 0 ){
                $saleErr = "Giảm gía không hợp lệ !" ; 
            }
        }
        
        // view
        if(empty($requesData['number_of_views'])){
            $number_of_viewsErr = "Hãy nhập giảm giá cho sản phẩm !" ; 
        }else{
            if( strlen($requesData['number_of_views']) == 0 || $requesData['number_of_views'] <= 0 ){
                $number_of_viewsErr = "Số lượt xem không hợp lệ !" ; 
            }
        }

        // danh mục sản phẩm 
        if($requesData['id_category'] == ""){
            $id_categoryErr = "Hãy chọn danh mục sản phẩm !" ; 
        }
        
        // description
        if(empty($requesData['description'])){
            $descriptionErr = "Hãy nhập mô tả cho sản phẩm !" ; 
        }

        // lối chuối lỗi 
        if($nameErr.$imageErr.$priceErr.$saleErr.$number_of_viewsErr.$id_categoryErr.$descriptionErr != ""){
            $this->render('admin.product.edit-product',[
                'nameErr'              =>$nameErr,
                'imageErr'             =>$imageErr,
                'priceErr'             =>$priceErr,
                'saleErr'              =>$saleErr,
                'number_of_viewsErr'   =>$number_of_viewsErr,
                'descriptionErr'       =>$descriptionErr,
                'id_categoryErr'       =>$id_categoryErr,
                'cates'                => $cates,
                'product'              =>$model
            ]) ; 
            die ; 
        }

        // ok hết zồi thì luu

        $model->name = $requesData['name'] ; 
        $model->price = $requesData['price'] ; 
        $model->sale = $requesData['sale'] ; 
        $model->description = $requesData['description'] ; 
        $model->number_of_views = $requesData['number_of_views'] ; 
        $model->id_category = $requesData['id_category'] ; 
        $model->image = $path ; 
    
        $model->save() ; 
        $msg = "Chỉnh sửa sản phẩm thành công !" ; 

        header("location:./list-product?msg=$msg") ; 

        }


    }


?>