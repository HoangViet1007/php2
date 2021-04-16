<?php
    namespace App\Controllers ; 
    use App\Models\Websetting ; 

    class WebsettingController extends BaseController{

        public function addWeb(){
            $this->render('admin.websetting.add-web') ; 
        }

        public function saveAddWeb(){
            $requesData = $_POST ;
            $msg = "" ; 
            $logo = $_FILES['logo'] ;

            // các lỗi khi người dùng nhập sai 
            $nameErr = $addressErr = $phoneErr = $emailErr = $logoErr = "" ; 
            
            // khởi tạo đối tượng 
            $model = new Websetting() ; 

            // validate 
             // name 
             if(empty($requesData['name'])){
                $nameErr = "Hãy nhập tên cho website !" ; 
            }else{
                if(strlen($requesData['name']) < 3 || strlen($requesData['name']) > 30){
                    $nameErr = "Tên website không hợp lệ !" ; 
                }
            }

            // address 
            if(empty($requesData['address'])){
                $addressErr = "Hãy nhập địa chỉ cho website !" ; 
            }

            // số điện thoại 
            $sdt_hop_le = '/((^0)(32|33|34|35|36|37|38|39|56|58|59|70|76|77|78|79|81|82|83|84|85|86|88|89|90|92|91|93|94|96|97|98|99)+([0-9]{7}))$/' ; 
            if (empty($requesData['phone'])) {
                $phoneErr = "Vui lòng nhập số điện thoại của website !";
        
            }else{
                if(!preg_match($sdt_hop_le , $requesData['phone'])){
                    $phoneErr = "Số điện thoại không hợp lệ !";
                }
            }

            // email 
            $email_hop_le = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/" ; 

            if(empty($requesData['email'])){
                $emailErr = "Hãy nhập email cho website !" ; 
            }else{
                if(!preg_match($email_hop_le , $requesData['email'])){
                    $emailErr = "Email không hợp lệ !" ;  
                }else{
                    $emailErr = "" ; 
                }
            }

            // logo 
            // image 
            $dir = "./public/image/websetting/";
            $target_file = $dir . basename($logo['name']);
            $filename = "";
            $path = "";
            $sizeanh = 1500000;
            $typeanh =  array('jpg', 'png', 'jpeg','bmp');
            $kieu = pathinfo($target_file, PATHINFO_EXTENSION);
            // $check = getimagesize($_FILES['image']['tmp_name']);
            if($_FILES['logo']['size'] <= 0  ){
                $logoErr = "Hãy nhập logo cho website !"; 
            }    
            elseif ($_FILES['logo']['size'] > $sizeanh) {
                $logoErr = "File ảnh quá lớn. Vui lòng chọn ảnh khác !";
            }
            // elseif(!($check !== false)) {
            //     $imageErr = "Hãy nhập ảnh hợp lệ !";
            // } 
            else{        
                if (!in_array($kieu, $typeanh)) {
                    $logoErr = "Chỉ được upload các định dạng JPG, PNG, JPEG";
                }
                elseif ($logo['size'] > 0 && $logo['size'] < $sizeanh) {
                    $filename = uniqid() . "_" . $logo['name'];
                    move_uploaded_file($logo['tmp_name'], "./public/image/websetting/" . $filename);
                    $path = "public/image/websetting/" . $filename;
                } 
                else {
                    $imageErr = "";
                }
            }

            // in za lỗi 
            if($nameErr.$addressErr.$phoneErr.$emailErr.$logoErr != ""){
                $this->render('admin.websetting.add-web',[
                    'nameErr'    => $nameErr , 
                    'addressErr' => $addressErr , 
                    'phoneErr'   =>$phoneErr , 
                    'emailErr'   => $emailErr , 
                    'logoErr'    => $logoErr
                ]) ;
                die ;  
            }

            // bắt dầu luwu 
            $model->name = $requesData['name'] ; 
            $model->address = $requesData['address'] ; 
            $model->email = $requesData['email'] ; 
            $model->phone = $requesData['phone'] ; 
            $model->logo = $path ; 
            $model->save() ; 

            $msg = "Thêm thông tin cho website thành công  !" ; 

            header("location:./list-web?msg=$msg") ; 

        }


        // danh sách thông tin khách sannj 
        public function listWeb(){
            $msg = isset($_GET['msg']) ? $_GET['msg'] : "" ; 
            // lấy za tất cả các hóa đoen 
            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
                if (!is_numeric($page) || $page <= 0) {
                    header("location:./list-web?page=1");
                }
            }
            $next = $page + 1 ; 
            $prew = $page - 1 ; 

            $data = 5;
            $number = Websetting::all()->count() ; 
            $page2 = ceil($number / $data);
            $tin = ($page - 1) * $data;


            $model = Websetting::all() ; 
            $this->render('admin.websetting.list-web',[
                'web'=>$model,
                'errMsg' => $msg , 
                'page2'=>$page2 , 
                'next' => $next , 
                'prew' => $prew
            ]) ; 
        }


        public function editWeb(){
            $msg = "" ; 
            $id = isset($_GET['id']) ? $_GET['id'] : "" ; 
            if(!$id){
                header("location:./list-web?msg=Không đủ thông tin để sửa thông tin này !") ; 
                die ; 
            }

            // khi mà đủ thông tin zồi thì find lại dữ liệu cũ 
            $web = Websetting::find($id) ; 
            if(!$web){
                $msg = "Thông tin khách sạn này không tồn tại !" ; 
                header("location:./list-web?msg=$msg") ; 
                die ; 
             }

             $this->render('admin.websetting.edit-web',[
                 'web' => $web 
             ]) ;
             die; 

        }

        public function saveEditWeb(){
            $msg = "" ; 
            $id = isset($_GET['id']) ? $_GET['id'] : "" ; 
            if(!$id){
                header("location:./list-web?msg=Không đủ thông tin để sửa thông tin này !") ; 
                die ; 
            }

            // kiểm tra xem dât có id đó ko 
            $model = Websetting::find($id) ; 
            if(!$model){
                $msg = "Thông tin khách sạn này không tồn tại !" ; 
                header("location:./list-web?msg=$msg") ; 
                die ; 
             }

             // lấy thông tin bên from 
             $requesData = $_POST ;
             $msg = "" ; 
             $logo = $_FILES['logo'] ;
 
             // các lỗi khi người dùng nhập sai 
             $nameErr = $addressErr = $phoneErr = $emailErr = $logoErr = "" ; 
              // validate 
             // name 
             if(empty($requesData['name'])){
                $nameErr = "Hãy nhập tên cho website !" ; 
            }else{
                if(strlen($requesData['name']) < 3 || strlen($requesData['name']) > 30){
                    $nameErr = "Tên website không hợp lệ !" ; 
                }
            }

            // address 
            if(empty($requesData['address'])){
                $addressErr = "Hãy nhập địa chỉ cho website !" ; 
            }

            // số điện thoại 
            $sdt_hop_le = '/((^0)(32|33|34|35|36|37|38|39|56|58|59|70|76|77|78|79|81|82|83|84|85|86|88|89|90|92|91|93|94|96|97|98|99)+([0-9]{7}))$/' ; 
            if (empty($requesData['phone'])) {
                $phoneErr = "Vui lòng nhập số điện thoại của website !";
        
            }else{
                if(!preg_match($sdt_hop_le , $requesData['phone'])){
                    $phoneErr = "Số điện thoại không hợp lệ !";
                }
            }

            // email 
            $email_hop_le = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/" ; 

            if(empty($requesData['email'])){
                $emailErr = "Hãy nhập email cho website !" ; 
            }else{
                if(!preg_match($email_hop_le , $requesData['email'])){
                    $emailErr = "Email không hợp lệ !" ;  
                }else{
                    $emailErr = "" ; 
                }
            }

            // logo 
            // image 
            $dir = "./public/image/websetting/";
            $target_file = $dir . basename($logo['name']);
            $filename = "";
            $path = $model->logo;
            $sizeanh = 1500000;
            $typeanh =  array('jpg', 'png', 'jpeg','bmp');
            $kieu = pathinfo($target_file, PATHINFO_EXTENSION);
            // $check = getimagesize($_FILES['image']['tmp_name']);
            if($_FILES['logo']['size'] <= 0  ){
                $path = $model->logo ;  
            }    
            elseif ($_FILES['logo']['size'] > $sizeanh) {
                $logoErr = "File ảnh quá lớn. Vui lòng chọn ảnh khác !";
            }
            // elseif(!($check !== false)) {
            //     $imageErr = "Hãy nhập ảnh hợp lệ !";
            // } 
            else{        
                if (!in_array($kieu, $typeanh)) {
                    $logoErr = "Chỉ được upload các định dạng JPG, PNG, JPEG";
                }
                elseif ($logo['size'] > 0 && $logo['size'] < $sizeanh) {
                    $filename = uniqid() . "_" . $logo['name'];
                    move_uploaded_file($logo['tmp_name'], "./public/image/websetting/" . $filename);
                    $path = "public/image/websetting/" . $filename;
                } 
                else {
                    $imageErr = "";
                }
            }

            // in za lỗi 
            if($nameErr.$addressErr.$phoneErr.$emailErr.$logoErr != ""){
                $this->render('admin.websetting.edit-web',[
                    'nameErr'    => $nameErr , 
                    'addressErr' => $addressErr , 
                    'phoneErr'   =>$phoneErr , 
                    'emailErr'   => $emailErr , 
                    'logoErr'    => $logoErr ,
                    'web'        => $model
                ]) ;
                die ;  
            }

            $model->name = $requesData['name'] ; 
            $model->address = $requesData['address'] ; 
            $model->phone = $requesData['phone'] ; 
            $model->email = $requesData['email'] ; 
            $model->logo = $path ; 
            $model->save() ; 

            $msg = "Chỉnh sửa thông tin website thành công  !" ; 

            header("location:./list-web?msg=$msg") ; 
             
        }

        public function deleteWeb(){
             // xóa sản phẩm
             $msg = "" ; 
             $id = isset($_GET['id']) ? $_GET['id'] : "" ; 
             if(!$id){
                 header("location:./list-web?msg=Thông tin website này không tồn tại !") ; 
                 die ; 
             }
 
             // kiem tra xem id đó có thật hay ko 
             $model = Websetting::find($id) ; 
 
             if(!$model){
                 $msg = "Thông tin này không tồn tại !" ; 
             }
             else{
                Websetting::destroy($id) ; 
                 $msg = "Xóa thông tin website thành công !" ; 
                 
             }
             header("location:./list-web?msg=$msg") ; 
        }



    }


?>