<?php
   namespace App\Controllers ; 
   use App\Models\VaiTro ; 

   class VaiTroController extends BaseController{

       public function listVaiTro(){        
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
        $number = VaiTro::all()->count() ; 
        $page2 = ceil($number / $data);
        $tin = ($page - 1) * $data;

          $model = VaiTro::skip($tin)->limit($data)->get() ; 
          $this->render('admin.vai-tro.list-vai-tro',[
                     'ListItem' => $model ,
                     'errMsg' => $msg ,
                     'page2'  => $page2 , 
                     'next'  => $next , 
                     'prew'  => $prew
              ]) ; 
           
       }

       public function addVaiTro(){
           $this->render('admin.vai-tro.add-vai-tro') ; 
       }

       public function saveAddVaiTro(){
             // lấy dữ liệu bên form
             $requesData = $_POST ;
             $msg = "" ;
             $nameErr = "" ;  
 
             // khởi tạo dối tượng
             $model = new VaiTro() ; 
             
             // validate 
            if(empty($requesData['name'])){
                $nameErr = "Hãy nhập tên vai trò !" ; 
            }else{
                if(strlen($requesData['name']) < 3 || strlen($requesData['name']) > 30){
                    $nameErr = "Tên vai trò không hợp lệ !" ; 
                }else{
                     // liểm tra xem trong database có tên vừa thêm chưa 
                    $kt = VaiTro::where('name','=',$requesData['name'])->get() ; 

                    if(count($kt) > 0 ){
                        $nameErr = "Tên vai trò này đã tồn tại , vui lòng nhập một tên khác !" ; 
                    }
                }
            }
          
            if($nameErr != ""){
                $this->render('admin.vai-tro.add-vai-tro',['nameErr'=>$nameErr]) ; 
                die ; 
            }

             $model->name = $requesData['name'] ; 
             $model->save() ; 
             $msg = "Thêm vai trò thành công" ; 
             header("location:./list-vai-tro?msg=$msg") ; 
             die ; 
       }


       public function editVaiTro(){
        //    lấy id xuống 
        $msg = "" ; 
        $id = isset($_GET['id']) ? $_GET['id'] : "" ; 
        if(!$id){
            $msg = "Không đủ thông tin để sửa vai trò !" ; 
            header("location:./list-vai-tro?msg=$msg") ; 
            die ; 
        }
        // lấy za thông tin cũ 
        $model = VaiTro::find($id) ; 

        // chuyerern đến giao dien sua 
        $this->render('admin.vai-tro.edit-vai-tro',['vaiTro' => $model]) ; 
       }

       public function saveEditVaiTro(){
            $msg = "" ; 
            $id = isset($_GET['id']) ? $_GET['id'] : "" ; 
            if(!$id){
                $msg = "Vai trò này không tồn tại !" ; 
                header("location:./list-vai-tro?msg=$msg") ; 
                die ; 
            }
            $model = VaiTro::find($id) ; 

            if(!$model){
                $msg = "Sản phẩm này không tồn tại !" ; 
                header("location:./list-vai-tro?msg=$msg") ; 
                die ; 
            }
            $requesData = $_POST ;

            // validate 
            if(empty($requesData['name'])){
                $nameErr = "Hãy nhập tên vai trò !" ; 
            }else{
                if(strlen($requesData['name']) < 3 || strlen($requesData['name']) > 30){
                    $nameErr = "Tên vai trò không hợp lệ !" ; 
                }else{
                    // kiểm tra xem tên người dùng sửa đã tồn tại trong database chưa 
                    $kt = VaiTro::where('name','=',$requesData['name'])->get() ; 

                    if(count($kt) > 0 ){
                        $nameErr = "Tên vai trò này đã tồn tại , vui lòng nhập một tên khác !" ; 
                    }
                }
            }
          
            if($nameErr != ""){
                $this->render('admin.vai-tro.edit-vai-tro',['nameErr'=>$nameErr,'vaiTro'=>$model]) ; 
                die ; 
            }

 
            // ok hết zồi thì lưu thôi 
            $model->name = $requesData['name'] ; 
            $model->save() ; 
            $msg = "Sửa tên vai trò thành công !" ; 
            header("location:./list-vai-tro?msg=$msg") ; 
            die ; 
         
       }

       public function deleteVaiTro(){
        $msg = "" ; 
        // lấy id trên đường dẫn xuống
        $id = isset($_GET['id']) ? $_GET['id'] : "" ; 
        if(!$id){
            $msg = "Vai trò này không tồn tại !" ; 
            header("location:./list-vai-tro?msg=$msg") ; 
            die ; 
        }

        // kiểm tra xem id này có tồn tại trong databasse ko thì mới xóa 
        $model = VaiTro::find($id) ; 
        if(!$model){
            $msg = "Vai trò này không tồn tại !" ; 
            header("location:./list-vai-tro?msg=$msg") ; 
            die ;
        }else{
            VaiTro::destroy($id) ; 
            $msg = "Xóa vai trò thành công !" ; 

        }
        header("location:./list-vai-tro?msg=$msg") ; 
       }
   }


?>