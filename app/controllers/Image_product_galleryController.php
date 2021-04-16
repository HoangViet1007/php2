<?php
    namespace App\Controllers ; 
    use App\Models\Image_product_gallery ; 
    use App\Models\Product ; 
    
    class Image_product_galleryController extends BaseController{
         
        public function addImage(){
            // lấy id sản phẩm xuống 
            $id = isset($_GET['id']) ? $_GET['id'] : "" ; 
            $product = Product::find($id) ; 
            $this->render('admin.image_product_gallery.add-image',['product'=>$product]) ; 
        }

        public function listImage(){
            $id = isset($_GET['id']) ? $_GET['id'] : "" ; 
            $product = Product::find($id) ; 
            if(!$id){
                header("location:./list-product?msg=Hình ảnh của sản phẩm này không tồn tại !") ; 
                die ; 
            }
            $msg = isset($_GET['msg']) ? $_GET['msg'] : "" ; 
            $model = Image_product_gallery::join('product','image_product_gallery.id_product','product.id')->select('image_product_gallery.*','product.name as name_product')->where('id_product','=',$id)->get() ; 
            $this->render('admin.image_product_gallery.list-image',['images' => $model ,'errMsg' => $msg, 'product'=>$product]) ; 
        }

        public function saveAddImage(){
            $msg = "" ; 
            // lấy id 
            $id = isset($_GET['id']) ? $_GET['id'] : "" ; 
            if(!$id){
                header("location:./list-product?msg=Sản phẩm này không tồn tại !") ; 
                die ; 
            }
            // lấy id sản phẩm xuống 
            $product = Product::find($id) ; 

            $requesData = $_POST ; 
            $image = $_FILES['image'] ; 
            $nameErr = $imageErr = "" ; 

            // validate 
               // name 
            if(empty($requesData['name'])){
                $nameErr = "Hãy nhập tên cho hình ảnh !" ; 
            }else{
                    if(strlen($requesData['name']) < 3 || strlen($requesData['name']) > 30){
                        $nameErr = "Tên hình ảnh không hợp lệ !" ; 
                    }
            }

                // hình ảnh
                // image 
            $dir = "./public/image/image_gallery/";
            $target_file = $dir . basename($image['name']);
            $filename = "";
            $path = "";
            $sizeanh = 1500000;
            $typeanh =  array('jpg', 'png', 'jpeg','bmp');
            $kieu = pathinfo($target_file, PATHINFO_EXTENSION);
            // $check = getimagesize($_FILES['image']['tmp_name']);
            if($_FILES['image']['size'] <= 0  ){
                $imageErr = "Hãy nhập hình ảnh cho sản phẩm !" ; 
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
                    move_uploaded_file($image['tmp_name'], "./public/image/image_gallery/" . $filename);
                    $path = "public/image/image_gallery/" . $filename;
                } 
                else {
                    $imageErr = "";
                }
            }

            // lỗi chuỗi lỗi 
            if($nameErr.$imageErr != ""){
                $this->render('admin.image_product_gallery.add-image',[
                        'product'=>$product,
                        'nameErr'=>$nameErr,
                        'imageErr'=>$imageErr
                    ]) ;
                    die ;             
            }

            // ok hết zồi thì lưu vào bảng imahe_product_gallery
            $model = new Image_product_gallery() ; 
            $model->name = $requesData['name'] ; 
            $model->image = $path ; 
            $model->id_product = $id ;
            $model->save() ; 
            $msg = "Thêm hình ảnh cho sản phẩm " . $product->name . " thành công !" ; 
            header("location:./list-image?id=$id&msg=$msg") ; 
            
        }


        public function editImage(){
            $msg = "" ; 
            // lấy id sản phẩm xuống 
            $id = isset($_GET['id']) ? $_GET['id'] : "" ; 
            $id_product = isset($_GET['id_product']) ? $_GET['id_product'] : "" ; 

            if(!$id){
                $msg = "Hình ảnh này không tồn tại !" ; 
                header("location:./list-image?id=$id_product&msg=$msg") ; 
            }

            if(!$id_product){
                $msg = "Hình ảnh này không tồn tại !" ; 
                header("location:./list-image?id=$id_product&msg=$msg") ; 
            }

            // lấy thông tin của hình ảnh để fill lại dũ liệu cũ naod 
            $model = Image_product_gallery::find($id) ; 
            $model2 = Product::find($id_product) ; 
            $this->render('admin.image_product_gallery.edit-image',['image'=>$model,'product'=>$model2,'id'=>$id]) ; 
            
        }

        public function saveEditImage(){
            $msg = "" ; 
            // lấy id xuống 
            $id = isset($_GET['id']) ? $_GET['id'] : "" ; 
            $id_product = isset($_GET['id_product']) ? $_GET['id_product'] : "" ; 

            if(!$id){
                $msg = "Hình ảnh này không tồn tại !" ; 
                header("location:./edit-image?id=$id&id_product=$id_product&msg=$msg") ; 
            }

            if(!$id_product){
                $msg = "Hình ảnh này không tồn tại !" ; 
                header("location:./edit-image?id=$id&id_product=$id_product&msg=$msg") ; 
            }
            $product = Product::find($id_product) ; 
            $model = Image_product_gallery::find($id) ; 
            // 
            $requesData = $_POST ; 
            $image = $_FILES['image'] ; 
            $nameErr = $imageErr = "" ; 

            // validate 
               // name 
            if(empty($requesData['name'])){
                $nameErr = "Hãy nhập tên cho hình ảnh !" ; 
            }else{
                    if(strlen($requesData['name']) < 3 || strlen($requesData['name']) > 30){
                        $nameErr = "Tên hình ảnh không hợp lệ !" ; 
                    }
            }

                // hình ảnh
                // image 
            $dir = "./public/image/image_gallery/";
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
                    move_uploaded_file($image['tmp_name'], "./public/image/image_gallery/" . $filename);
                    $path = "public/image/image_gallery/" . $filename;
                } 
                else {
                    $imageErr = "";
                }
            }

            // lỗi chuỗi lỗi 
            if($nameErr.$imageErr != ""){
                $this->render('admin.image_product_gallery.edit-image',[
                        'product'=>$product,
                        'nameErr'=>$nameErr,
                        'imageErr'=>$imageErr
                    ]) ;
                    die ;             
            }
            // ok hết zồi
            $model->name = $requesData['name'] ; 
            $model->image = $path ; 
            $model->id_product = $id_product ; 
            $model->save() ; 
            $msg = "Chỉnh sửa hình ảnh cho sản phẩm ".$product->name." thành công !" ; 
            header("location:./list-image?id=$product->id&msg=$msg");
       
        }

        public function dateleImage(){
            $msg = "" ; 
            // lấy id sản phẩm xuống 
            $id = isset($_GET['id']) ? $_GET['id'] : "" ; 
            $id_product = isset($_GET['id_product']) ? $_GET['id_product'] : "" ; 

            if(!$id){
                $msg = "Hình ảnh này không tồn tại !" ; 
                header("location:./list-image?id=$id_product&msg=$msg") ; 
            }

            if(!$id_product){
                $msg = "Hình ảnh này không tồn tại !" ; 
                header("location:./list-image?id=$id_product&msg=$msg") ; 
            }

            // ok hết zồi 
                   // kiem tra xem id đó có thật hay ko 
            $model = Image_product_gallery::find($id) ; 

            if(!$model){
                $msg = "Hình ảnh sản phẩm này không tồn tại !" ; 
            }
            else{
                Image_product_gallery::destroy($id) ; 
                $msg = "Xóa hình ảnh sản phẩm thành công !" ; 
                
            }
            header("location:./list-image?id=$id_product&msg=$msg") ; 
        }

    }


?>