<?php
 namespace App\Controllers ; 
 use App\Models\Product ; 
 class CartController extends BaseController{
      
    public function addCart(){
        $msg = "" ; 
        if(isset($_POST['id'])){
            $id = $_POST['id'] ; 
            // lấy za sản phẩm đó 
            $model = Product::find($id) ; 
            if(!$model){
                $msg = "Thêm sản phẩm không thành công !" ; 
                header("location:./?msg=$msg") ; 
                die ; 
            }
            // code cart 
            if(!isset($_SESSION['cart'])){
                $cart[$id] = array(
                        'id'              => $id , 
                        'name'            => $model->name ,
                        'image'           => $model->image ,
                        'price'           => $model->price ,
                        'sale'            => $model->sale , 
                        'description'     => $model->description , 
                        'number_of_views' => $model->number_of_views,
                        'id_category'     => $model->id_category ,
                        'number'          => 1

                ) ; 
            }else{
                $cart = $_SESSION['cart'] ; 
                if(array_key_exists($id,$cart)){
                    $cart[$id] = array(
                        'id'              => $id , 
                        'name'            => $model->name ,
                        'image'           => $model->image ,
                        'price'           => $model->price ,
                        'sale'            => $model->sale , 
                        'description'     => $model->description , 
                        'number_of_views' => $model->number_of_views,
                        'id_category'     => $model->id_category ,
                        'number'          => (int)$cart[$id]['number'] + 1

                ) ;  
                }else{
                    $cart[$id] = array(
                        'id'              => $id , 
                        'name'            => $model->name ,
                        'image'           => $model->image ,
                        'price'           => $model->price ,
                        'sale'            => $model->sale , 
                        'description'     => $model->description , 
                        'number_of_views' => $model->number_of_views,
                        'id_category'     => $model->id_category ,
                        'number'          => 1

                ) ; 
                }
            }

          $_SESSION['cart'] = $cart ; 
        //   echo "<pre>" ; 
        //   print_r($_SESSION['cart']) ; 
        // unset($_SESSION['cart']);
            $number = 0 ; 
            foreach ($cart as $value) {
                $number += (int)$value['number'] ; 
            }

            echo $number ; 
        }
    }


    public function listShoppingCart(){
        $msg = isset($_GET['msg']) ? $_GET['msg'] : "" ; 
        if(isset($_SESSION['cart'])){
            $products = $_SESSION['cart'] ; 
            $this->render('homepage.listShoppingCart',['products'=>$products,'errMsg' => $msg]) ; 
        }else{
            $this->render('homepage.listShoppingCart',['errMsg' => $msg]) ; 
        }
    }

    public function deleteProductShoppingCart(){
        $msg = "" ; 
        // lấy id xuống 
        $id = isset($_GET['id']) ? $_GET['id'] : "" ; 
        if(!$id){
            $msg = "Xóa sản phẩm khói giỏ hàng không thành công !" ; 
            header("location:./shopppcart?msg=$msg") ; 
        }else{
            unset($_SESSION['cart'][$id]) ; 
            $msg = "Xóa sản phẩm khói giỏ hàng thành công !" ; 
            header("location:./shopppcart?msg=$msg") ; 
        }
    }


    public function updatecart(){
        $msg = "" ; 
       foreach ($_POST['number'] as $id => $number) {
            if($number <= 0){
                unset($_SESSION['cart'][$id]); 
            }else{
                $_SESSION['cart'][$id]['number'] = $number ; 
            }
       }
       $msg = "Update giỏ hàng thành công !" ; 
       header("location:./shopppcart?msg=$msg") ; 
    }


    public function deletecart(){
        $msg = "" ; 
        unset($_SESSION['cart']) ; 
        $msg = "Xóa giỏ hàng thành công !" ; 
        header("location:./shopppcart?msg=$msg") ; 
    }
 }


?>