<?php
   namespace App\Controllers ; 
   use App\Models\User ; 
   use App\Models\VaiTro ; 
   use App\Models\Orders ; 
   use App\Models\Orders_detail ; 

   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;


   class UserController extends BaseController{
   
        public function addUser(){
            // lấy za chức vụ 
            $model = VaiTro::all() ; 
            $this->render('admin.user.add-user',['vai_tro'=>$model]) ; 
        }

        public function saveAddUser(){
            // lấy dữ liệu bên form
            $requesData = $_POST ;
            $msg = "" ; 

            $image = $_FILES['image'] ; 
            // print_r($image) ; 
            // die ; 
            $idErr = $passwordErr = $cf_passwordErr = $nameErr = $imageErr = $emailErr = $vai_troErr = $addressErr = $phoneErr = "" ; 

            // print_r($requesData) ; 
            $model = new User() ; 
            $model_vt = VaiTro::all() ; 

            // validate 
            // id 
            $id_hop_le = '/^[a-zA-Z0-9_]{3,30}$/' ;
            if(empty($requesData['id'])){
                $idErr = "Hãy nhập tên đăng nhập cho user !" ; 
            }else{
                if(strlen($requesData['id']) < 3 || strlen($requesData['id']) > 30){
                    $idErr = "Tên đăng nhập không hợp lệ !" ; 
                } else if(!preg_match($id_hop_le , $requesData['id'])){
                    $idErr = "Tên đăng nhập không hợp lệ !" ; 
            
                }else{
                    //  xem trong databasse có tồn tại ko 
                     $kt = User::all() ; 
                     foreach ($kt as $key) {
                         if($key['id'] == $requesData['id']){
                             $idErr = "Tên đăng nhập này đã tồn tại , vui lòng nhập một tên khác !" ; 
                         }
                     }
                }
            }

            // password 
            $removeWhiteSpacePassword = str_replace(" ", "", $requesData['password']);

            if(empty($requesData['password'])){
                $passwordErr = "Hãy nhập mật khẩu cho user !" ; 
            }else{
                // if(strlen($requesData['password']) < 6 || (strlen($removeWhiteSpacePassword) != strlen($requesData['password']))){
                //     $passwordErr = "Mật khẩu không thỏa mãn đk (ít nhất 6 ký tự và không chứa khoảng trắng)";
                // }
                $passCheck = "/(^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,})$/";
                if(!preg_match($passCheck,$requesData['password'])){
                     $passwordErr = "Mật khẩu không thỏa mãn đk (ít nhất 6 kí tự bao gồm ít nhất 1 kí tự viết hoa 1 kí tự thường và 1 kí tự số )";
                }
            }

            // cf_pas
            if(empty($requesData['cf_password'])){
                $cf_passwordErr = "Hãy nhập xác nhận mật khẩu !" ; 
            }else{
                if($requesData['cf_password'] != $requesData['password']){
                    $cf_passwordErr = "Mật khẩu và xác nhận mật khẩu không khớp";
                }
            }

            // họ tên 
            if(empty($requesData['name'])){
                $nameErr = "Hãy nhập họ và tên cho user !" ; 
            }else{
                if (!preg_match("/^[a-zA-Z-'(àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐD) ]*$/", $requesData['name'])) {
                    $nameErr = "Họ và tên không hợp lệ";
                }
            }

            // địa chỉ 
            if(empty($requesData['address'])){
                $addressErr = "Hãy nhập địa chỉ cho user !" ; 
            }

            // số điện thoại 
            // $sdt_hop_le = '/((^0)(32|33|34|35|36|37|38|39|56|58|59|70|76|77|78|79|81|82|83|84|85|86|88|89|90|92|91|93|94|96|97|98|99)+([0-9]{7}))$/' ; 
            $sdt_hop_le = '/(^[\+]{0,1}+(84){1}+[0-9]{9})|((^0)(32|33|34|35|36|37|38|39|56|58|59|70|76|77|78|79|81|82|83|84|85|86|88|89|90|92|91|93|94|96|97|98|99)+([0-9]{7}))$/' ; 

            if (empty($requesData['phone'])) {
                $phoneErr = "Vui lòng nhập số điện thoại !";
         
            }else{
                if(!preg_match($sdt_hop_le , $requesData['phone'])){
                    $phoneErr = "Số điện thoại không hợp lệ !";
                }
            }
            

            // hình ảnh 
            $dir = "./public/image/user/";
            $target_file = $dir . basename($image['name']);
            $filename = "";
            $path = "";
            $sizeanh = 1500000;
            $typeanh =  array('jpg', 'png', 'jpeg','bmp');
            $kieu = pathinfo($target_file, PATHINFO_EXTENSION);
            // $check = getimagesize($image['tmp_name']);
            if($_FILES['image']['size'] <= 0  ){
                $imageErr = "Hãy thêm hình ảnh cho user !" ;
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
                    move_uploaded_file($image['tmp_name'], "./public/image/user/" . $filename);
                    $path = "public/image/user/" . $filename;
                } 
                else {
                    $imageErr = "";
                }
            }

            // email 
            $email_hop_le = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/" ; 

            if(empty($requesData['email'])){
                $emailErr = "Hãy nhập email cho user !" ; 
            }else{
                if(!preg_match($email_hop_le , $requesData['email'])){
                    $emailErr = "Email không hợp lệ !" ;  
                }else{
                    $emailErr = "" ; 
                }
            }

            // vai tro 
            if($requesData['vai_tro'] == ""){
                $vai_troErr = "Hãy chọn vai trò cho user !" ; 
            }

            // lối chuỗi lôi
            if($idErr.$passwordErr.$cf_passwordErr.$nameErr.$imageErr.$emailErr.$vai_troErr != ""){
                $this->render('admin.user.add-user',[
                        'vai_tro'      =>$model_vt ,
                        'idErr'       =>$idErr,
                        'passwordErr' =>$passwordErr,
                        'cf_passwordErr' =>$cf_passwordErr,
                        'nameErr'     =>$nameErr,
                        'imageErr'    =>$imageErr,
                        'emailErr'    =>$emailErr,
                        'vai_troErr'  => $vai_troErr ,
                        'addressErr'  => $addressErr , 
                        'phoneErr'    => $phoneErr
                    ]
                    ) ; 
                    die ; 
            }

            // ok thì mới lưu 

            $model->id = $requesData['id'] ; 
            $model->password = $requesData['password'] ; 
            $model->name = $requesData['name'] ; 
            $model->email = $requesData['email'] ; 
            $model->address = $requesData['address'] ; 
            $model->phone = $requesData['phone'] ; 
            $model->vai_tro = $requesData['vai_tro'] ; 
            $model->image = $path ; 
        
            $model->save() ; 
            $msg = "Thêm user thành công !" ; 

            header("location:./list-user?msg=$msg") ; 
  

        }


        public function listUser(){
            $msg = isset($_GET['msg']) ? $_GET['msg'] : "" ; 

            // làm phân trang 
            // làm phân trang 
            if (!isset($_GET['page'])) {
                $page = 1;
            } else {
                $page = $_GET['page'];
                if (!is_numeric($page) || $page <= 0) {
                    header("location:./list-user?page=1");
                }
            }
            $next = $page + 1 ; 
            $prew = $page - 1 ; 


            $data = 4;
            $number = User::all()->count() ; 
            $page2 = ceil($number / $data);
            $tin = ($page - 1) * $data;

            // lấy za vai tro 
            $vai_tro = VaiTro::all() ; 
            
            if(isset($_POST['sx'])){
                $requesData = $_POST ; 
                if($requesData['vai_tro'] == ""){
                    $model = User::join('vai_tro','vai_tro.id','user.vai_tro')->select('user.*','vai_tro.name as name_vt')->skip($tin)->limit($data)->get() ; 
                    $this->render('admin.user.list-user',[
                            'users' => $model ,
                            'errMsg' => $msg ,
                            'vai_tro' => $vai_tro , 
                            'page2'   =>$page2 , 
                            'next'  => $next , 
                            'prew'  => $prew
                        ]) ; 
                        die ; 
                }else{
                    $model = User::join('vai_tro','vai_tro.id','user.vai_tro')->select('user.*','vai_tro.name as name_vt')->where('vai_tro.id','=',$requesData['vai_tro'])->get() ; 
                    $this->render('admin.user.list-user',[
                        'users' => $model ,
                        'errMsg' => $msg ,
                        'vai_tro' => $vai_tro 
                    ]) ; 
                    die ; 
                }
            }
            if(isset($_POST['tk'])){
                $requesData = $_POST ; 
                if(($requesData['id'] != "") && ($requesData['name'] == "")){
                    $model = User::join('vai_tro','vai_tro.id','user.vai_tro')->select('user.*','vai_tro.name as name_vt')->where('user.id','=',$requesData['id'])->get() ; 
                    $this->render('admin.user.list-user',[
                        'users' => $model ,
                        'errMsg' => $msg ,
                        'vai_tro' => $vai_tro
                    ]) ; 
                }
                elseif(($requesData['id'] == "") && ($requesData['name'] != "")){
                    $model = User::join('vai_tro','vai_tro.id','user.vai_tro')->select('user.*','vai_tro.name as name_vt')->where('user.name','like','%'.$requesData['name'].'%')->get() ; 
                    $this->render('admin.user.list-user',[
                        'users' => $model ,
                        'errMsg' => $msg ,
                        'vai_tro' => $vai_tro
                    ]) ; 
                    die ; 
                }
                elseif(($requesData['id'] != "") && ($requesData['name'] != "")){
                    $model = User::join('vai_tro','vai_tro.id','user.vai_tro')->select('user.*','vai_tro.name as name_vt')->where('user.name','like','%'.$requesData['name'].'%')->where('user.id','=',$requesData['id'])->get() ; 
                    $this->render('admin.user.list-user',[
                        'users' => $model ,
                        'errMsg' => $msg ,
                        'vai_tro' => $vai_tro
                    ]) ; 
                    die ; 
                }else{
                    $model = User::join('vai_tro','vai_tro.id','user.vai_tro')->select('user.*','vai_tro.name as name_vt')->skip($tin)->limit($data)->get() ; 
                    $this->render('admin.user.list-user',[
                            'users' => $model ,
                            'errMsg' => $msg ,
                            'vai_tro' => $vai_tro , 
                            'page2'   =>$page2 , 
                            'next'  => $next , 
                            'prew'  => $prew
                        ]) ; 
                        die ; 
                }
            }
            else{
                $model = User::join('vai_tro','vai_tro.id','user.vai_tro')->select('user.*','vai_tro.name as name_vt')->skip($tin)->limit($data)->get() ; 
                $this->render('admin.user.list-user',[
                        'users' => $model ,
                        'errMsg' => $msg ,
                        'vai_tro' => $vai_tro , 
                        'page2'   =>$page2 , 
                        'next'  => $next , 
                        'prew'  => $prew
                    ]) ; 
            }


           
        }


        public function deleteUser(){
              // xóa sản phẩm
              $msg = "" ; 
              $id = isset($_GET['id']) ? $_GET['id'] : "" ; 
              if(!$id){
                  header("location:./list-user?msg=Người dùng này không tồn tại !") ; 
                  die ; 
              }
  
              // kiem tra xem id đó có thật hay ko 
              $model = User::find($id) ; 
  
              if(!$model){
                  $msg = "Người dùng này không tồn tại !" ; 
              }
              else{
                User::destroy($id) ; 
                  $msg = "Xóa user thành công !" ; 
                  
              }
              header("location:./list-user?msg=$msg") ; 
        }


        public function editUser(){
            $msg = "" ; 
            $id = isset($_GET['id']) ? $_GET['id'] : "" ; 
            if(!$id){
                header("location:./list-user?msg=Không đủ thông tin để sửa user !") ; 
                die ; 
            }

            // khi mà đủ thông tin zồi thì find lại dữ liệu cũ 
            $vai_tro = VaiTro::all() ; 
            $product = User::find($id) ; 
            if(!$product){
                $msg = "User này không tồn tại !" ; 
                header("location:./list-user?msg=$msg") ; 
                die ; 
             }

             $this->render('admin.user.edit-user',['vai_tro' => $vai_tro , 'user' => $product]) ; 
        }


        public function saveEditUser(){
            $msg = "" ; 
            $id = isset($_GET['id']) ? $_GET['id'] : "" ;
            if(!$id){
                header("location:./list-user?msg=User này không tồn tại !") ; 
                die ; 
            }

            // tìm user thông qua id 
            $model = User::find($id) ; 

            // lấy tất cả vai trò
            $model_vt = VaiTro::all() ; 


            if(!$model){
                $msg = "User này không tồn tại !" ; 
                header("location:./list-user?msg=$msg") ; 
                die ; 
             }
             // bắt đầu update
             $requesData = $_POST ;
             $msg = "" ; 

             $passwordErr = $cf_passwordErr = $nameErr = $imageErr = $emailErr = $vai_troErr = $addressErr = $phoneErr = "" ; 

             $image = $_FILES['image'] ; 

            //  print_r($requesData['id']) ; 
            //  die ; 
            // 
            // validate 
            // id 
            // $id_hop_le = '/^[a-zA-Z0-9_]{3,30}$/' ;
            // if(empty($requesData['id'])){
            //     $idErr = "Hãy nhập tên đăng nhập cho user !" ; 
            // }else{
            //     if(strlen($requesData['id']) < 3 || strlen($requesData['id']) > 30){
            //         $idErr = "Tên đăng nhập không hợp lệ !" ; 
            //     } else if(!preg_match($id_hop_le , $requesData['id'])){
            //         $idErr = "Tên đăng nhập không hợp lệ !" ; 
            
            //     }else{
            //         //  xem trong databasse có tồn tại ko 
            //             $kt = User::all() ; 
            //             foreach ($kt as $key) {
            //                 if($key['id'] == $requesData['id']){
            //                     $idErr = "Tên đăng nhập này đã tồn tại , vui lòng nhập một tên khác !" ; 
            //                 }
            //             }
            //     }
            // }
          


            // password 
            $password_hop_le = "" ; 

            $removeWhiteSpacePassword = str_replace(" ", "", $requesData['password']);

            if(empty($requesData['password'])){
                $passwordErr = "Hãy nhập mật khẩu cho user !" ; 
            }else{
                // if(strlen($requesData['password']) < 6 || (strlen($removeWhiteSpacePassword) != strlen($requesData['password']))){
                //     $passwordErr = "Mật khẩu không thỏa mãn đk (ít nhất 6 ký tự và không chứa khoảng trắng)";
                // }
                $passCheck = "/(^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,})$/";
                if(!preg_match($passCheck,$requesData['password'])){
                     $passwordErr = "Mật khẩu không thỏa mãn đk (ít nhất 6 kí tự bao gồm ít nhất 1 kí tự viết hoa 1 kí tự thường và 1 kí tự số )";
                }
            }

            // cf_pas
            if(empty($requesData['cf_password'])){
                $cf_passwordErr = "Hãy nhập xác nhận mật khẩu !" ; 
            }else{
                if($requesData['cf_password'] != $requesData['password']){
                    $cf_passwordErr = "Mật khẩu và xác nhận mật khẩu không khớp";
                }
            }

            // họ tên 
            if(empty($requesData['name'])){
                $nameErr = "Hãy nhập họ và tên cho user !" ; 
            }else{
                if (!preg_match("/^[a-zA-Z-'(àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐD) ]*$/", $requesData['name'])) {
                    $nameErr = "Họ và tên không hợp lệ";
                }
            }

            // hình ảnh 
            $dir = "./public/image/user/";
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
                    move_uploaded_file($image['tmp_name'], "./public/image/user/" . $filename);
                    $path = "public/image/user/" . $filename;
                } 
                else {
                    $imageErr = "";
                }
            }

            // email 
            $email_hop_le = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/" ; 

            if(empty($requesData['email'])){
                $emailErr = "Hãy nhập email cho user !" ; 
            }else{
                if(!preg_match($email_hop_le , $requesData['email'])){
                    $emailErr = "Email không hợp lệ !" ;  
                }else{
                    $emailErr = "" ; 
                }
            }

            // địa chỉ 
            if(empty($requesData['address'])){
                $addressErr = "Hãy nhập địa chỉ cho user !" ; 
            }

            // số điện thoại 
            $sdt_hop_le = '/(^[\+]{0,1}+(84){1}+[0-9]{9})|((^0)(32|33|34|35|36|37|38|39|56|58|59|70|76|77|78|79|81|82|83|84|85|86|88|89|90|92|91|93|94|96|97|98|99)+([0-9]{7}))$/' ; 
            if (empty($requesData['phone'])) {
                $phoneErr = "Vui lòng nhập số điện thoại !";
        
            }else{
                if(!preg_match($sdt_hop_le , $requesData['phone'])){
                    $phoneErr = "Số điện thoại không hợp lệ !";
                }
            }

            // vai tro 
            if($requesData['vai_tro'] == ""){
                $vai_troErr = "Hãy chọn vai trò cho user !" ; 
            }

            // lối chuỗi lôi
            if($passwordErr.$cf_passwordErr.$nameErr.$addressErr.$phoneErr.$imageErr.$emailErr.$vai_troErr){
                $this->render('admin.user.edit-user',[
                    'vai_tro' => $model_vt , 
                    'passwordErr' => $passwordErr , 
                    'cf_password'  => $cf_passwordErr , 
                    'nameErr'         => $nameErr , 
                    'addressErr'    => $addressErr , 
                    'phoneErr'    => $phoneErr , 
                    'imageErr'   => $imageErr , 
                    'emailErr'   => $emailErr , 
                    'vai_troErr' => $vai_troErr , 
                    'user'     => $model
                ]) ; 
            }else{
            // ok thì lưu
            //  print_r($requesData) ; 
            //  $model->$requesData['id'] ; 
            $model->password = $requesData['password'] ; 
            $model->name = $requesData['name'] ; 
            $model->email = $requesData['email'] ; 
            $model->address = $requesData['address'] ; 
            $model->phone = $requesData['phone'] ; 
            $model->vai_tro = $requesData['vai_tro'] ; 
            $model->image = $path ; 
        
            $model->save() ; 
            $msg = "Chỉnh sửa user thành công !" ; 

            header("location:./list-user?msg=$msg") ; 
  
            } 
        }




        // ------------- phần tài khoản --------------- 


        public function login(){
            $this->render('tai-khoan.login') ; 
        }


        public function postLogin(){
            $requesData = $_POST ;
            $msg = "" ;
            
            $id = $requesData['id'] ; 
            $password = $requesData['password'] ; 
            $nv = 1 ; 
            $kh = 2 ; 

           // check nhân viên 
           $admin = User::where('id','=',$id)->where('password','=', $password)->where('vai_tro','=', $nv)->first() ; 

           // check khach hang 
           $khach_hang = User::where('id','=', $id)->where('password','=', $password)->where('vai_tro','=', $kh)->first() ; 

        //    var_dump($admin) ; 
        //    die ; 

           if(count($admin) > 0){
                $_SESSION['admin'] = [
                    'id' => $admin->id,
                    'password' =>$admin->password,    
                    'name' => $admin->name,
                    'image' => $admin->image,
                    'email'=> $admin->email,
                    'address' => $admin->address,
                    'phone'   => $admin->phone,
                    'vai_tro'=>$admin->vai_tro
                ];
                $msg = "Đăng nhập thành công !" ; 
                // print_r($_SESSION) ; 
                // die ; 
                header("location:./dashboard?msg=$msg") ;
           }

           elseif(count($khach_hang) > 0){
                $_SESSION['khach_hang'] = [
                    'id' => $khach_hang->id,
                    'password' => $khach_hang->password,
                    'name' => $khach_hang->name,
                    'image' => $khach_hang->image,
                    'address' => $khach_hang->address,
                    'phone'   => $khach_hang->phone,
                    'email'=> $khach_hang->email,
                    'vai_tro'=>$khach_hang->vai_tro
                ];
                $msg = "Đăng nhập thành công !" ; 
                header("location:./?msg=$msg") ;
           }

           else{
               $msg = "Tài khoản hoặc mật khẩu không chính xác !" ; 
               header("location:./login?msg=$msg") ; 
           }

        }


        public function logout(){     
            if (isset($_SESSION['khach_hang'])) {
                unset($_SESSION['khach_hang']);
                header("location:./login?msg=Đăng xuất thành công !") ; 
            } elseif (isset($_SESSION['admin'])) {
                unset($_SESSION['admin']);
                header("location:./login?msg=Đăng xuất thành công !") ; 
            }
        }


        public function register(){
            $this->render('tai-khoan.register') ; 
        }

        public function saveRegister(){
              // lấy dữ liệu bên form
              $requesData = $_POST ;
              $msg = "" ; 
  
              $image = $_FILES['image'] ; 
              // print_r($image) ; 
              // die ; 
              $idErr = $passwordErr = $cf_passwordErr = $nameErr = $imageErr = $emailErr = $addressErr = $phoneErr = "" ; 
  
              // print_r($requesData) ; 
              $model = new User() ; 
              $model_vt = VaiTro::all() ; 
  
              // validate 
              // id 
              $id_hop_le = '/^[a-zA-Z0-9_]{3,30}$/' ;
              if(empty($requesData['id'])){
                  $idErr = "Hãy nhập tên đăng nhập !" ; 
              }else{
                  if(strlen($requesData['id']) < 3 || strlen($requesData['id']) > 30){
                      $idErr = "Tên đăng nhập không hợp lệ !" ; 
                  } else if(!preg_match($id_hop_le , $requesData['id'])){
                      $idErr = "Tên đăng nhập không hợp lệ !" ; 
              
                  }else{
                      //  xem trong databasse có tồn tại ko 
                       $kt = User::all() ; 
                       foreach ($kt as $key) {
                           if($key['id'] == $requesData['id']){
                               $idErr = "Tên đăng nhập này đã tồn tại !" ; 
                           }
                       }
                  }
              }
  
              // password 
              $removeWhiteSpacePassword = str_replace(" ", "", $requesData['password']);
  
              if(empty($requesData['password'])){
                  $passwordErr = "Hãy nhập mật khẩu !" ; 
              }else{
                // if(strlen($requesData['password']) < 6 || (strlen($removeWhiteSpacePassword) != strlen($requesData['password']))){
                //     $passwordErr = "Mật khẩu không thỏa mãn đk (ít nhất 6 ký tự và không chứa khoảng trắng)";
                // }
                $passCheck = "/(^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,})$/";
                if(!preg_match($passCheck,$requesData['password'])){
                     $passwordErr = "Mật khẩu không thỏa mãn đk (ít nhất 6 kí tự bao gồm ít nhất 1 kí tự viết hoa 1 kí tự thường và 1 kí tự số )";
                }
              }
  
              // cf_pas
              if(empty($requesData['cf_password'])){
                  $cf_passwordErr = "Hãy nhập xác nhận mật khẩu !" ; 
              }else{
                  if($requesData['cf_password'] != $requesData['password']){
                      $cf_passwordErr = "Mật khẩu và xác nhận mật khẩu không khớp";
                  }
              }
  
              // họ tên 
              if(empty($requesData['name'])){
                  $nameErr = "Hãy nhập họ và tên cho user !" ; 
              }else{
                  if (!preg_match("/^[a-zA-Z-'(àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐD) ]*$/", $requesData['name'])) {
                      $nameErr = "Họ và tên không hợp lệ";
                  }
              }
  
              // địa chỉ 
              if(empty($requesData['address'])){
                  $addressErr = "Hãy nhập địa chỉ !" ; 
              }
  
              // số điện thoại 
            //   $sdt_hop_le = '/((^0)(32|33|34|35|36|37|38|39|56|58|59|70|76|77|78|79|81|82|83|84|85|86|88|89|90|92|91|93|94|96|97|98|99)+([0-9]{7}))$/' ; 
              $sdt_hop_le = '/(^[\+]{0,1}+(84){1}+[0-9]{9})|((^0)(32|33|34|35|36|37|38|39|56|58|59|70|76|77|78|79|81|82|83|84|85|86|88|89|90|92|91|93|94|96|97|98|99)+([0-9]{7}))$/' ; 

              if (empty($requesData['phone'])) {
                  $phoneErr = "Vui lòng nhập số điện thoại !";
           
              }else{
                  if(!preg_match($sdt_hop_le , $requesData['phone'])){
                      $phoneErr = "Số điện thoại không hợp lệ !";
                  }
              }
              
  
              // hình ảnh 
              $dir = "./public/image/user/";
              $target_file = $dir . basename($image['name']);
              $filename = "";
              $path = "";
              $sizeanh = 1500000;
              $typeanh =  array('jpg', 'png', 'jpeg','bmp');
              $kieu = pathinfo($target_file, PATHINFO_EXTENSION);
              // $check = getimagesize($image['tmp_name']);
              if($_FILES['image']['size'] <= 0  ){
                  $imageErr = "Hãy thêm hình ảnh !" ;
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
                      move_uploaded_file($image['tmp_name'], "./public/image/user/" . $filename);
                      $path = "public/image/user/" . $filename;
                  } 
                  else {
                      $imageErr = "";
                  }
              }
  
              // email 
              $email_hop_le = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/" ; 
  
              if(empty($requesData['email'])){
                  $emailErr = "Hãy nhập email !" ; 
              }else{
                  if(!preg_match($email_hop_le , $requesData['email'])){
                      $emailErr = "Email không hợp lệ !" ;  
                  }else{
                      $emailErr = "" ; 
                  }
              }
  
  
              // lối chuỗi lôi
              if($idErr.$passwordErr.$cf_passwordErr.$nameErr.$imageErr.$emailErr != ""){
                  $this->render('tai-khoan.register',[
                          'vai_tro'      =>$model_vt ,
                          'idErr'       =>$idErr,
                          'passwordErr' =>$passwordErr,
                          'cf_passwordErr' =>$cf_passwordErr,
                          'nameErr'     =>$nameErr,
                          'imageErr'    =>$imageErr,
                          'emailErr'    =>$emailErr,
                          'addressErr'  => $addressErr , 
                          'phoneErr'    => $phoneErr
                      ]
                      ) ; 
                      die ; 
              }
  
              // ok thì mới lưu 
  
              $model->id = $requesData['id'] ; 
              $model->password = $requesData['password'] ; 
              $model->name = $requesData['name'] ; 
              $model->email = $requesData['email'] ; 
              $model->address = $requesData['address'] ; 
              $model->phone = $requesData['phone'] ; 
              $model->vai_tro = 2 ; 
              $model->image = $path ; 
          
              $model->save() ; 
              $msg = "Tạo tài khoản thành công !" ; 
  
              header("location:./register?msg=$msg") ; 
    
  
        }


        public function editPassword(){
            if(isset($_SESSION['khach_hang'])) {
                $id = $_SESSION['khach_hang']['id'] ; 
             } elseif(isset($_SESSION['admin'])){ 
               $id = $_SESSION['admin']['id'] ; 
             } 
            $this->render('tai-khoan.edit-password',['id'=>$id]) ; 
        }

        public function saveEditPassword(){
            $msg = "" ; 
            $requesData = $_POST ; 
            $old_passwordErr = $passwordErr = $cf_passwordErr = "" ; 
            $id = isset($_GET['id']) ? $_GET['id'] : "" ; 
            if(!$id){
               $msg = "Đổi mật khẩu không thành công !" ; 
               header("location:./edit-password?msg=$msg") ; 
               die ; 
            }

            // kiểm tra xem id này có trong databasse hay ko 
            $model = User::find($id) ; 
            if(!$model){
                $msg = "User này không tồn tại !" ; 
                header("location:./edit-password?msg=$msg") ; 
                die ;
            }

            // validate 
            if(empty($requesData['old_password'])){
                 $old_passwordErr = "Hãy nhập mật khẩu cũ !" ; 
            }else{
                if($requesData['old_password'] != $model->password){
                    $old_passwordErr = "Mật khẩu cũ không đúng !" ; 
                }
            }

            $removeWhiteSpacePassword = str_replace(" ", "", $requesData['password']);
            if(empty($requesData['password'])){
                $passwordErr = "Hãy nhập mật khẩu !" ; 
            }else{
                // if(strlen($requesData['password']) < 6 || (strlen($removeWhiteSpacePassword) != strlen($requesData['password']))){
                //     $passwordErr = "Mật khẩu không thỏa mãn đk (ít nhất 6 ký tự và không chứa khoảng trắng)";
                // }
                $passCheck = "/(^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,})$/";
                if(!preg_match($passCheck,$requesData['password'])){
                     $passwordErr = "Mật khẩu không hợp lệ (Ít nhất 6 kt ,ít nhất 1 hoa , 1 thường , 1 số ";
                }
            }

            if(empty($requesData['cf_password'])){
                $cf_passwordErr = "Hãy nhập xác nhận mật khẩu !" ; 
            }else{
                if($requesData['cf_password'] != $requesData['password']){
                    $cf_passwordErr = "Xác nhận mật khẩu không thành công !" ; 
                }
            }

            /// 
            if(isset($_SESSION['khach_hang'])) {
                $id = $_SESSION['khach_hang']['id'] ; 
             } elseif(isset($_SESSION['admin'])){ 
               $id = $_SESSION['admin']['id'] ; 
             } 


            if($old_passwordErr.$passwordErr.$cf_passwordErr != ""){
                $this->render('tai-khoan.edit-password',[
                        'old_passwordErr'    => $old_passwordErr,
                        'passwordErr'        => $passwordErr,
                        'cf_passwordErr'     => $cf_passwordErr,
                        'id'                 => $id
                    ]) ; 
                    die ; 
            }


            // ok hết zồi 
            $model->password = $requesData['password'] ; 
            $model->save() ; 
            $msg = "Đổi mật khẩu thành công - Vui lòng đăng nhập lại" ; 
            header("location:./login?msg=$msg") ; 
            
        }

        public function editUserClien(){
              /// 
              if(isset($_SESSION['khach_hang'])) {
                $id = $_SESSION['khach_hang']['id'] ; 
             } elseif(isset($_SESSION['admin'])){ 
               $id = $_SESSION['admin']['id'] ; 
             } 

             // lấy za thông tin người đó 
             $model = User::find($id) ; 

            $this->render('tai-khoan.edit-user',['user'=>$model]) ; 
        }


        public function saveEditUserClien(){
            $id = isset($_GET['id']) ? $_GET['id'] : '' ; 
            $msg = "" ; 
             
            if(!$id){
                $msg = "Cập nhật tài khoản không thành công !" ; 
                header("location:./edit-user-clien?msg=$msg") ; 
            }
            $model = User::find($id) ; 
            if(!$model){
                $msg = "User này không tồn tại !" ; 
                header("location:./edit-user-clien?msg=$msg") ; 
            }
            else{
                    $image = $_FILES['image'] ; 
                    $nameErr =  $imageErr = $addressErr = $phoneErr = $emailErr = $phoneErr = "" ;
                    $requesData = $_POST ; 
                    // validate 
                    if(empty($requesData['name'])){
                        $nameErr = "Hãy nhập tên cho user !" ; 
                    }else{
                        if (!preg_match("/^[a-zA-Z-'(àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐD) ]*$/", $requesData['name'])) {
                            $nameErr = "Họ và tên không hợp lệ";
                        }
                    }

                    // hình ảnh 
                    $dir = "./public/image/user/";
                    $target_file = $dir . basename($image['name']);
                    $filename = "";
                    $path = $model->image;
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
                            move_uploaded_file($image['tmp_name'], "./public/image/user/" . $filename);
                            $path = "public/image/user/" . $filename;
                        } 
                        else {
                            $imageErr = "";
                        }
                    }

                               // địa chỉ 
                    if(empty($requesData['address'])){
                        $addressErr = "Hãy nhập địa chỉ cho user !" ; 
                    }

                    // số điện thoại 
                    // $sdt_hop_le = '/((^0)(32|33|34|35|36|37|38|39|56|58|59|70|76|77|78|79|81|82|83|84|85|86|88|89|90|92|91|93|94|96|97|98|99)+([0-9]{7}))$/' ; 
                    $sdt_hop_le = '/(^[\+]{0,1}+(84){1}+[0-9]{9})|((^0)(32|33|34|35|36|37|38|39|56|58|59|70|76|77|78|79|81|82|83|84|85|86|88|89|90|92|91|93|94|96|97|98|99)+([0-9]{7}))$/' ; 

                    if (empty($requesData['phone'])) {
                        $phoneErr = "Vui lòng nhập số điện thoại !";
                
                    }else{
                        if(!preg_match($sdt_hop_le , $requesData['phone'])){
                            $phoneErr = "Số điện thoại không hợp lệ !";
                        }
                    }

                    // email 
                    $email_hop_le = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/" ; 
        
                    if(empty($requesData['email'])){
                        $emailErr = "Hãy nhập email !" ; 
                    }else{
                        if(!preg_match($email_hop_le , $requesData['email'])){
                            $emailErr = "Email không hợp lệ !" ;  
                        }else{
                            $emailErr = "" ; 
                        }
                    }



                    // in za nhu edit-usser
                     /// 
                    if(isset($_SESSION['khach_hang'])) {
                        $id = $_SESSION['khach_hang']['id'] ; 
                    } elseif(isset($_SESSION['admin'])){ 
                        $id = $_SESSION['admin']['id'] ; 
                    } 

                    // lấy za thông tin người đó 
                    $models = User::find($id) ; 

                    // lỗi 
                    if($nameErr.$imageErr.$addressErr.$phoneErr.$emailErr != ""){
                        $this->render('tai-khoan.edit-user',[
                            'nameErr'   => $nameErr,
                            'imageErr'  => $imageErr,
                            'addressErr' => $addressErr,
                            'phoneErr'   => $phoneErr,
                            'emailErr'   => $emailErr ,
                            'user'      => $models
                        ]) ; 
                    }

                    // ok hết zồi
                    $model->name = $requesData['name'] ; 
                    $model->address = $requesData['address'] ; 
                    $model->image  = $path ; 
                    $model->phone = $requesData['phone'] ; 
                    $model->email = $requesData['email'] ; 
                    $model->save() ; 
                    $msg = "Cập nhật tài khoản thành công - Vui lòng đăng nhập lại" ; 
                    header("location:./login?msg=$msg") ; 
                // -------- end code ---------    
               }
        //    ---- end save edit user --------      
        }

        public function account(){
            if(isset($_SESSION['khach_hang'])) {
                $id = $_SESSION['khach_hang']['id'] ; 
                       // lấy za thông tin người đó 
                $models = User::find($id) ;
                $this->render('tai-khoan.account-user',['user'=>$models]) ;
            } elseif(isset($_SESSION['admin'])){ 
                $id = $_SESSION['admin']['id'] ; 
                       // lấy za thông tin người đó 
                $models = User::find($id) ;
                $this->render('tai-khoan.account-user',['user'=>$models]) ;
            } else{
                header("location:./") ; 
            }

      
        }

        public function orders_ed(){
            // lấy id của user 
            if(isset($_SESSION['khach_hang'])) {
                $id = $_SESSION['khach_hang']['id'] ; 
                $model = Orders::where('customer_id','=',$id)->get() ; 

                $this->render('tai-khoan.orders_ed',[
                    'orders_ed'   => $model
                ]) ;

            } elseif(isset($_SESSION['admin'])){ 
                $id = $_SESSION['admin']['id'] ; 
                $model = Orders::where('customer_id','=',$id)->get() ; 

                $this->render('tai-khoan.orders_ed',[
                    'orders_ed'   => $model
                ]) ;
                
            } else{
                header("location:./") ; 
            }
            

        }

        public function forgot(){
            $this->render('tai-khoan.forgot') ; 
        }

        public function postForgot(){
            $requesData = $_POST ;
            $msg = "" ;
            
            // kiểm tra xem id đó có tồn tại trong databasse ko 
            $model = User::find($requesData['id']) ; 
            if(!$model){
                header("location:./forgot?msg=Username này không tồn tại !") ; 
                die ; 
            }else{
                if($model->email == $requesData['email']){

                    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
                    try {
                        //Server settings
                        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
                        $mail->isSMTP();  
                        $mail->CharSet = 'utf8' ;                                         // Send using SMTP
                        // Set mailer to use SMTP
                        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                        $mail->SMTPAuth = true;                               // Enable SMTP authentication
                        $mail->Username = 'sendemailcuaviet@gmail.com';                 // SMTP username
                        $mail->Password = 'viet10072001';                           // SMTP password
                        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                        $mail->Port = 587;                                    // TCP port to connect to
                    
                        //Recipients
                        $mail->setFrom('sendemailcuaviet@gmail.com', 'Shop quần áo nam The Men');
                        $mail->addAddress("$model->email","$model->name");     // Add a recipient
                        // $mail->addAddress('ellen@example.com');               // Name is optional
                        $mail->addReplyTo('hoangviet10172001@gmail.com', 'Chủ Shop');
                        // $mail->addCC('cc@example.com');
                        // $mail->addBCC('bcc@example.com');
                    
                        //Attachments
                        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                    
                        $mkm = rand() ; 
                        // Content
                        $mail->isHTML(true);                                  // Set email format to HTML
                        $mail->Subject = "Shop quần áo nam The Men : Update mật khẩu";
                        $mail->Body    = "Mật khẩu mới của bạn là : $mkm";
                        // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                    
                        $mail->send();
                        // update lai mật khẩu 
                        $model->password = $mkm ; 
                        $model->save() ; 
                        header("location:./forgot?msg=Vui lòng check email để biết mật khẩu !") ; 
                        die ; 

                    } catch (Exception $e) {
                        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                        echo 'Gửi email không thành công !' ; 
                    }
            
                }else{
                    header("location:./forgot?msg=Email đăng kí tài khoản không đúng !") ; 
                    die ; 
                }
            }
        }




        // ------------- end class ---------
   }



?>