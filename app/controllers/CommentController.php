<?php
    namespace App\Controllers ; 
    use App\Models\Comment ; 
    use App\Controllers\BaseController;
    use App\Models\User;

class CommentController extends BaseController{
         
        // ------------------- bình luận ------------------- 
        public function addComent(){
            // lấy id product 
            $msg = "" ; 

            $id_product = isset($_GET['id_product']) ? $_GET['id_product'] : "" ; 
            if(!$id_product){
                header("location:./chi-tiet-sp?id=$id_product&msg=Bình luận không thành công !") ; 
                die ; 
            }
            // lấy nội dung ở from 
            // code bình luận cho khách hàng
            if(isset($_POST['luu'])){
                if(!(isset($_SESSION['admin']) || isset($_SESSION['khach_hang']))){
                    header("location:./login?msg=Vui lòng đăng nhập trước khi bình luận !") ;  
                    die ; 
                }else{
                    // code cho khách hàng
                    if(isset($_SESSION['khach_hang'])){
                        $requesData = $_POST ; 
                         $model = new Comment() ; 
                         $model->content = $requesData['content'] ; 
                         $model->id_product = $id_product ; 
                         $model->id_user = $_SESSION['khach_hang']['id'] ; 
                         $msg = "Thêm bình luận thành công !" ; 
                         $model->save(); 
                         header("location:./chi-tiet-sp?id=$id_product&msg=$msg") ; 
                    }

                    // code cho admin 
                    if(isset($_SESSION['admin'])){
                        $requesData = $_POST ; 
                        $model = new Comment() ; 
                        $model->content = $requesData['content'] ; 
                        $model->id_product = $id_product ; 
                        $model->id_user = $_SESSION['admin']['id'] ; 
                        $msg = "Thêm bình luận thành công !" ;
                        $model->save() ;  
                        header("location:./chi-tiet-sp?id=$id_product&msg=$msg") ; 
                    }
                }
            }

        }


        public function deleteComment(){
            // lấy id sản phẩm để tí lữa header về trang cũ 
            $id = isset($_GET['id_product']) ? $_GET['id_product'] : "" ; 

            // lấy id comment để xóa 
            $id_comment = isset($_GET['id']) ? $_GET['id'] : "" ; 

            // kiểm tra xem comment này có tồn tại ko 
            $model = Comment::find($id_comment) ; 
            // kiem tra xem id đó có thật hay ko 

            if(!$model){
                $msg = "Bình luận này không tồn tại !" ; 
            }
            else{
                Comment::destroy($id_comment) ; 
                $msg = "Xóa bình luận thành công !" ; 
                
            }
            header("location:./chi-tiet-sp?id=$id&msg=$msg") ; 

        }

        public function deleteCommentAdmin(){
            $id = isset($_GET['id']) ? $_GET['id'] : "" ; 

            $model = Comment::find($id) ; 
            // kiem tra xem id đó có thật hay ko 

            if(!$model){
                $msg = "Bình luận này không tồn tại !" ; 
            }
            else{
                Comment::destroy($id) ; 
                $msg = "Xóa bình luận thành công !" ; 
                
            }
            header("location:./list-comment?msg=$msg") ; 

        }

        public function listComment(){
            $msg = isset($_GET['msg']) ? $_GET['msg'] : "" ; 
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
            $number = Comment::all()->groupBy('id_product')->count() ; 
            $page2 = ceil($number / $data);
            $tin = ($page - 1) * $data;

            $model = Comment::join('product','comment.id_product','=','product.id')
            ->select('comment.id',Comment::raw("count(comment.id) as sbl"),Comment::raw("max(comment.created_at) as max"),Comment::raw("min(comment.created_at) as min"),'product.image as image_product','product.name as name_product','product.id as id_product')
            ->groupBy('product.id')->skip($tin)->limit($data)->get(); 
            $this->render('admin.comment.list-comment',[
                'errMsg' => $msg,
                'comments'=> $model , 
                'page2'  => $page2 , 
                'next'   => $next , 
                "prew"   => $prew
            ]) ; 
        }


        public function commentDetail(){
            // lấy id sản phẩm 
            $msg = isset($_GET['msg']) ? $_GET['msg'] : "" ; 
            $id_product = isset($_GET['id']) ? $_GET['id'] : "" ; 
            $model = Comment::join('user','comment.id_user','=','user.id')
            ->select('comment.*','user.id as id_user','user.name as name_user','user.image as image_user')
            ->where('comment.id_product','=',$id_product)
            ->get() ; 
            
            $this->render('admin.comment.detail-comment',[
                'errMsg' => $msg ,
                'comments' => $model
            ]) ; 
        }
        
    }


?>