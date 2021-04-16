<?php
   namespace App\Controllers ; 
   use App\Models\Slide ; 

   class SlideController extends BaseController{

     // thêm mới slide ảnh 
        public function addSlide(){
             $this->render('admin.slide.add-slide') ; 
        }


        public function saveAddSlide(){
             // lấy dữ liệu bên form
             $requesData = $_POST ;
             $image = $_FILES['image'] ;  
             $msg = "" ; 
 
             // khai báo các biến lỗi ; 
             $titleErr = $imageErr = $linkErr = $activeErr = "" ; 

             // validate 

             // title
            if(empty($requesData['title'])){
                $titleErr = "Hãy nhập tên tiêu đề !" ; 
            }else{
                if(strlen($requesData['title']) < 3 || strlen($requesData['title']) > 30){
                    $titleErr = "Tên tiêu đề không hợp lệ !" ; 
                }else{
                     // xem trong databasse có tồn tại ko 
                     $kt = Slide::all() ; 
                     foreach ($kt as $key) {
                         if($key['title'] == $requesData['title']){
                             $titleErr = "Tên tiêu đề này đã tồn tại , vui lòng nhập một tên khác !" ; 
                         }
                     }
                }
            }

            // link
            if(empty($requesData['link'])){
                $linkErr = "Hãy nhập đường dẫn cho slide !" ; 
            }else{
                if(strlen($requesData['link']) < 3 || strlen($requesData['link']) > 30){
                    $linkErr = "Tên đường dẫn không hợp lệ !" ; 
                }
                // else{
                //      // xem trong databasse có tồn tại ko 
                //      $kt = Slide::all() ; 
                //      foreach ($kt as $key) {
                //          if($key['link'] == $requesData['link']){
                //              $linkErr = "Tên đường dẫn này đã tồn tại , vui lòng nhập một tên khác !" ; 
                //          }
                //      }
                // }
            }

           
            //   title
            if(($requesData['active']) == ""){
                $activeErr = "Hãy chọn trạng thái hoạt động cho slide !" ; 
            }

            // hình ảnh
            $dir = "./public/image/slide/";
            $target_file = $dir . basename($image['name']);
            $filename = "";
            $path = "";
            $sizeanh = 1500000;
            $typeanh =  array('jpg', 'png', 'jpeg','bmp');
            $kieu = pathinfo($target_file, PATHINFO_EXTENSION);
            // $check = getimagesize($_FILES['image']['tmp_name']);
            if($_FILES['image']['size'] <= 0  ){
                $imageErr = "Hãy nhập hình ảnh cho slide !" ;
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
                    move_uploaded_file($image['tmp_name'], "./public/image/slide/" . $filename);
                    $path = "public/image/slide/" . $filename;
                } 
                else {
                    $imageErr = "";
                }
            }
            
            // lỗi chuỗi lỗi 
            if($titleErr.$imageErr.$linkErr.$activeErr != ""){
                $this->render('admin.slide.add-slide',[
                     'titleErr'  =>$titleErr,
                     'imageErr'  =>$imageErr,
                     'linkErr'   =>$linkErr,
                     'activeErr' =>$activeErr
                ]) ; 
                die ; 
            }

            //  print_r($requesData) ; 
            $model = new Slide() ; 
            $model->title = $requesData['title'] ; 
            $model->link = $requesData['link'] ; 
            $model->active = $requesData['active'] ; 
            $model->image = $path ; 
            $model->save() ; 
            $msg = "Thêm slide ảnh thành công !" ; 

            header("location:./list-slide?msg=$msg") ; 

        }

        // danh sacsh slide 
        public function listslide(){
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

            $data = 4;
            $number = Slide::all()->count() ; 
            $page2 = ceil($number / $data);
            $tin = ($page - 1) * $data;
            
            $model = Slide::skip($tin)->limit($data)->get() ; 
            $this->render('admin.slide.list-slide',['slide'=>$model,'errMsg' => $msg , 'page2'=>$page2,'next'=>$next,'prew'=>$prew]) ; 
        }


        public function editSlide(){
            $msg = "" ; 
            $id = isset($_GET['id']) ? $_GET['id'] : "" ; 
            if(!$id){
                header("location:./list-slide?msg=Không đủ thông tin để sửa slide ảnh !") ; 
                die ; 
            }

            // khi mà đủ thông tin zồi thì find lại dữ liệu cũ 
            $model = Slide::find($id) ; 
            if(!$model){
                $msg = "Slide ảnh này không tồn tại !" ; 
                header("location:./list-slide?msg=$msg") ; 
                die ; 
             }

             $this->render('admin.slide.edit-slide',['slide'=>$model]) ;  
             
            
        }
        
        public function saveEditSlide(){
            $msg = "" ; 
            $id = isset($_GET['id']) ? $_GET['id'] : "" ;
            if(!$id){
                header("location:./list-slide?msg=slide ảnh này không tồn tại !") ; 
                die ; 
            }
            $model = Slide::find($id) ; 

            if(!$model){
                $msg = "Slide ảnh này không tồn tại !" ; 
                header("location:./list-product?msg=$msg") ; 
                die ; 
             }

            $requesData = $_POST ;

            $image = $_FILES['image'] ; 
            $titleErr = $imageErr = $linkErr = $activeErr = "" ; 

            // validate
            // title
             if(empty($requesData['title'])){
                $titleErr = "Hãy nhập tên tiêu đề !" ; 
            }else{
                if(strlen($requesData['title']) < 3 || strlen($requesData['title']) > 30){
                    $titleErr = "Tên tiêu đề không hợp lệ !" ; 
                }else{
                     // xem trong databasse có tồn tại ko 
                     $kt = Slide::all() ; 
                     foreach ($kt as $key) {
                         if($key['title'] == $requesData['title']){
                             $titleErr = "Tên tiêu đề này đã tồn tại , vui lòng nhập một tên khác !" ; 
                         }
                     }
                }
            }

            // link
            if(empty($requesData['link'])){
                $linkErr = "Hãy nhập đường dẫn cho slide !" ; 
            }else{
                if(strlen($requesData['link']) < 3 || strlen($requesData['link']) > 30){
                    $linkErr = "Tên đường dẫn không hợp lệ !" ; 
                }
                // else{
                //      // xem trong databasse có tồn tại ko 
                //      $kt = Slide::all() ; 
                //      foreach ($kt as $key) {
                //          if($key['link'] == $requesData['link']){
                //              $linkErr = "Tên đường dẫn này đã tồn tại , vui lòng nhập một tên khác !" ; 
                //          }
                //      }
                // }
            }

           
            //   title
            if(($requesData['active']) == ""){
                $activeErr = "Hãy chọn trạng thái hoạt động cho slide !" ; 
            }

            // hình ảnh
            $dir = "./public/image/slide/";
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
                    move_uploaded_file($image['tmp_name'], "./public/image/slide/" . $filename);
                    $path = "public/image/slide/" . $filename;
                } 
                else {
                    $imageErr = "";
                }
            }
            
            // lỗi chuỗi lỗi 
            if($titleErr.$imageErr.$linkErr.$activeErr != ""){
                $this->render('admin.slide.edit-slide',[
                     'titleErr'  =>$titleErr,
                     'imageErr'  =>$imageErr,
                     'linkErr'   =>$linkErr,
                     'activeErr' =>$activeErr,
                     'slide'     => $model
                ]) ; 
                die ; 
            }

            //  print_r($requesData) ; 
            $model->title = $requesData['title'] ; 
            $model->link = $requesData['link'] ; 
            $model->active = $requesData['active'] ; 

            // $filename = $model->image ; 
            // if($image['size'] > 0){
            //     $filename = uniqid()."-".$image['name'] ; 
            //     move_uploaded_file($image['tmp_name'], "public/image/slide/" . $filename);
            //     $filename = "public/image/slide/".$filename;
            // }
         
            $model->image = $path ; 
            $model->save() ; 
            $msg = "Chỉnh sửa slide ảnh thành công !" ; 
            header("location:./list-slide?msg=$msg") ; 

        }


        public function Active(){
            $msg = "" ; 
            $id = isset($_GET['id']) ? $_GET['id'] : "" ;
            if(!$id){
                header("location:./list-slide?msg=Cập nhật trạng thái không thành công !") ; 
                die ; 
            }

            $model = Slide::find($id) ; 

            if(!$model){
                $msg = "Cập nhật trạng thái không thành công !" ; 
                header("location:./list-slide?msg=$msg") ; 
                die ; 
             }

             $model->active = '1' ; 
             $model->save() ; 
             $msg = "Cập nhật trạng thái thành công !" ;
             header("location:./list-slide?msg=$msg") ; 
             die ; 

        }

        public function noActive(){
            $msg = "" ; 
            $id = isset($_GET['id']) ? $_GET['id'] : "" ;
            if(!$id){
                header("location:./list-slide?msg=Cập nhật trạng thái không thành công !") ; 
                die ; 
            }

            $model = Slide::find($id) ; 

            if(!$model){
                $msg = "Cập nhật trạng thái không thành công !" ; 
                header("location:./list-slide?msg=$msg") ; 
                die ; 
             }

             $model->active = '0' ; 
             $model->save() ; 
             $msg = "Cập nhật trạng thái thành công !" ;
             header("location:./list-slide?msg=$msg") ; 
             die ; 

        }

        public function deleteSlide(){
            // xóa sản phẩm
            $msg = "" ; 
            $id = isset($_GET['id']) ? $_GET['id'] : "" ; 
            if(!$id){
                header("location:./list-slide?msg=Slide ảnh này không tồn tại !") ; 
                die ; 
            }

            // kiem tra xem id đó có thật hay ko 
            $model = Slide::find($id) ; 

            if(!$model){
                $msg = "Slide ảnh này không tồn tại !" ; 
            }
            else{
                Slide::destroy($id) ; 
                $msg = "Xóa slide ảnh thành công !" ; 
                
            }
            header("location:./list-slide?msg=$msg") ; 
        }
   }


?>