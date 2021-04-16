<?php
    namespace App\Controllers ; 
    use App\Models\Category;

    class CategoryController extends BaseController{
        
        public function addCategory(){
            $this->render('admin.category.add-category') ; 
        }


        public function listCategory(){
            $msg = isset($_GET['msg']) ? $_GET['msg'] : "" ; 

            // làm phân trang 
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
            $number = Category::all()->count() ; 
            $page2 = ceil($number / $data);
            $tin = ($page - 1) * $data;



            // chiển hiển thị 
            $model = Category::skip($tin)->limit($data)->get() ; 
            $this->render('admin.category.list-category',['ListItem' => $model ,'errMsg' => $msg,'page2'=>$page2,'next'=>$next,'prew'=>$prew ]) ; 
        }

        public function saveAddCategory(){
            // lấy dữ liệu bên form
            $requesData = $_POST ;
            $msg = "" ;
            $nameErr = "" ; 
            
            // khởi tạo dối tượng
            $model = new Category() ; 

            // validate 
            if(empty($requesData['name'])){
                $nameErr = "Hãy nhập tên danh mục !" ; 
            }else{
                if(strlen($requesData['name']) < 3 || strlen($requesData['name']) > 30){
                    $nameErr = "Tên danh mục không hợp lệ !" ; 
                }else{
                     // xem trong databasse có tồn tại ko 
                    $kt = Category::all() ; 
                    foreach ($kt as $key) {
                        if($key['name'] == $requesData['name']){
                            $nameErr = "Tên danh mục này đã tồn tại , vui lòng nhập một tên khác !" ; 
                        }
                    }
                }
            }
           
            // lối chuỗi lỗi
            if($nameErr != ""){
                $this->render('admin.category.add-category',['nameErr'=>$nameErr]) ; 
                die ; 
            }

            // ok zồi thì luu 

            $model->name = $requesData['name'] ; 
            $model->save() ; 
            $msg = "Thêm danh mục thành công" ; 
            header("location:./list-category?msg=$msg") ; 
            die ; 

        }

        public function deleteCategory(){
            $msg = "" ; 
            // lấy id trên đường dẫn xuống
            $id = isset($_GET['id']) ? $_GET['id'] : "" ; 
            if(!$id){
                $msg = "Danh mục này không tồn tại !" ; 
                header("location:./list-category?msg=$msg") ; 
                die ; 
            }

            // kiểm tra xem id này có tồn tại trong databasse ko thì mới xóa 
            $model = Category::find($id) ; 
            if(!$model){
                $msg = "Danh mục này không tồn tại !" ; 
                header("location:./list-category?msg=$msg") ; 
                die ;
            }else{
                Category::destroy($id) ; 
                $msg = "Xóa danh mục thành công !" ; 

            }
            header("location:./list-category?msg=$msg") ; 
            
        }

        public function editCategory(){
            $msg = "" ; 
            $id = isset($_GET['id']) ? $_GET['id'] : "" ; 
            if(!$id){
                $msg = "Không đủ thông tin để sửa sản phẩm !" ; 
                header("location:./list-product?msg=$msg") ; 
                die ; 
            }
            // lấy za thông tin cũ 
            $model = Category::find($id) ; 

            // chuyerern đến giao dien sua 
            $this->render('admin.category.edit-category',['cates' => $model]) ; 
        }

        public function saveEditCategory(){
            $msg = "" ; 
            $id = isset($_GET['id']) ? $_GET['id'] : "" ; 
            if(!$id){
                $msg = "Danh mục này không tồn tại !" ; 
                header("location:./list-category?msg=$msg") ; 
                die ; 
            }
            $model = Category::find($id) ; 

            if(!$model){
                $msg = "Sản phẩm này không tồn tại !" ; 
                header("location:./list-category?msg=$msg") ; 
                die ; 
             }
            $requesData = $_POST ;
            $nameErr = "" ; 

            // validate 
            if(empty($requesData['name'])){
                $nameErr = "Hãy nhập tên danh mục !" ; 
            }else{
                if(strlen($requesData['name']) < 3 || strlen($requesData['name']) > 30){
                    $nameErr = "Tên danh mục không hợp lệ !" ; 
                }else{
                     // xem trong databasse có tồn tại ko 
                    $kt = Category::all() ; 
                    foreach ($kt as $key) {
                        if($key['name'] == $requesData['name']){
                            $nameErr = "Tên danh mục này đã tồn tại , vui lòng nhập một tên khác !" ; 
                        }
                    }
                }
            }

            // lối chuỗi lỗi
            if($nameErr != ""){
                $this->render('admin.category.edit-category',['nameErr'=>$nameErr,'cates'=>$model]) ; 
                die ; 
            }
            

            // khởi tạo dối tượng
            $model->name = $requesData['name'] ; 
            $model->save() ; 
            $msg = "Sửa danh mục thành công" ; 
            header("location:./list-category?msg=$msg") ; 
            die ; 
             

        }
    }

?>