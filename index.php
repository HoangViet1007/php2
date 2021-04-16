<?php
  session_start() ; 
  // lấy url trên đường dẫn xuống 
  $url = isset($_GET['url']) ? $_GET['url'] : "" ; 


    // chỉ cần require autoload thôi 
    require_once "./vendor/autoload.php" ;
    // require sau autoload 
    require_once "./commons/database-config.php" ; 
    // require mailler
    include "./lib/PHPMailer-master/src/PHPMailer.php";
    include "./lib/PHPMailer-master/src/Exception.php";
    include "./lib/PHPMailer-master/src/OAuth.php";
    include "./lib/PHPMailer-master/src/POP3.php";
    include "./lib/PHPMailer-master/src/SMTP.php";

    
    // use các controller 
    use App\Controllers\CategoryController;
    use App\Controllers\HomeController ; 
    use App\Controllers\ProductController ;
    use App\Controllers\SlideController;
    use App\Controllers\UserController ; 
    use App\Controllers\AdminController ;                               
    use App\Controllers\CartController;
    use App\Controllers\CommentController;
    use App\Controllers\Image_product_galleryController;
    use App\Controllers\OrdersController;
    use App\Controllers\VaiTroController;
    use App\Controllers\WebsettingController;

switch ($url) {
     case '':
       $ctr = new HomeController() ; 
       $ctr->index() ; 
       break;

    case 'dashboard':
        $ctr = new AdminController() ; 
        $ctr->index() ; 
    break;   

    // category
    case 'add-category':
        $ctr = new CategoryController() ; 
        $ctr->addCategory() ; 
    break;

    case 'save-add-category':
        $ctr = new CategoryController() ; 
        $ctr->saveAddCategory() ; 
    break;
    
    case 'list-category':
        $ctr = new CategoryController() ; 
        $ctr->listCategory() ; 
    break;

    case 'edit-category':
        $ctr = new CategoryController() ; 
        $ctr->editCategory() ; 
    break;

    case 'save-edit-category':
        $ctr = new CategoryController() ; 
        $ctr->saveEditCategory() ; 
    break;

    case 'delete-category':
        $ctr = new CategoryController() ; 
        $ctr->deleteCategory() ; 
    break;

    // websetting 
    case 'add-web':
        $ctr = new WebsettingController() ; 
        $ctr->addWeb() ; 
    break;

    case 'save-add-web':
        $ctr = new WebsettingController() ; 
        $ctr->saveAddWeb() ; 
    break;

    case 'list-web':
        $ctr = new WebsettingController() ; 
        $ctr->listWeb() ; 
    break;

    case 'edit-web':
        $ctr = new WebsettingController() ; 
        $ctr->editWeb() ; 
    break;

    case 'save-edit-web':
        $ctr = new WebsettingController() ; 
        $ctr->saveEditWeb() ; 
    break;

    case 'delete-web':
        $ctr = new WebsettingController() ; 
        $ctr->deleteWeb() ; 
    break;


    // product 
    case 'add-product':
        $ctr = new ProductController() ; 
        $ctr->addProduct() ; 
    break;

    case 'save-add-product':
        $ctr = new ProductController() ; 
        $ctr->saveAddProduct() ; 
    break;

    case 'list-product':
        $ctr = new ProductController() ; 
        $ctr->listProduct() ; 
    break;

    case 'delete-product':
        $ctr = new ProductController() ; 
        $ctr->deleteProduct() ; 
    break;

    case 'edit-product':
        $ctr = new ProductController() ; 
        $ctr->editProduct() ; 
    break;

    case 'save-edit-product':
        $ctr = new ProductController() ; 
        $ctr->saveEditProduct() ; 
    break;
    
    // hóa đơn 
    case 'list-orders':
        $ctr = new OrdersController() ; 
        $ctr->listOrders() ; 
    break;

    case 'orders-detail':
        $ctr = new OrdersController() ; 
        $ctr->OrdersDetail() ; 
    break;

    // bộ sưu tập ảnh cho produt 
    case 'add-image':
        $ctr = new Image_product_galleryController() ; 
        $ctr->addImage() ; 
    break;

    // bộ sưu tập ảnh cho produt 
    case 'save-add-image':
        $ctr = new Image_product_galleryController() ; 
        $ctr->saveAddImage() ; 
    break;

    case 'list-image':
        $ctr = new Image_product_galleryController() ; 
        $ctr->listImage() ; 
    break;

    case 'edit-image':
        $ctr = new Image_product_galleryController() ; 
        $ctr->editImage() ; 
    break;

    case 'save-edit-image':
        $ctr = new Image_product_galleryController() ; 
        $ctr->saveEditImage() ; 
    break;

    case 'delete-image':
        $ctr = new Image_product_galleryController() ; 
        $ctr->dateleImage() ; 
    break;

    // lây za sản phẩm cùng danh mục 
    case 'product-cate':
        $ctr = new HomeController() ; 
        $ctr->productCate() ; 
    break;


    // vai tro 
    case 'list-vai-tro':
        $ctr = new VaiTroController() ; 
        $ctr->listVaiTro() ; 
    break;

    case 'add-vai-tro':
        $ctr = new VaiTroController() ; 
        $ctr->addVaiTro() ; 
    break;

    case 'save-add-vai-tro':
        $ctr = new VaiTroController() ; 
        $ctr->saveAddVaiTro() ; 
    break;

    case 'edit-vai-tro':
        $ctr = new VaiTroController() ; 
        $ctr->editVaiTro() ; 
    break;

    case 'save-edit-vai-tro':
        $ctr = new VaiTroController() ; 
        $ctr->saveEditVaiTro() ; 
    break;

    case 'delete-vai-tro':
        $ctr = new VaiTroController() ; 
        $ctr->deleteVaiTro() ; 
    break;

    //  giao dien index 
    case 'chi-tiet-sp':
        $ctr = new HomeController() ; 
        $ctr->chiTietSP() ; 
    break;


    case 'giao-dien-admin' : 
        $ctr = new HomeController() ; 
        $ctr->giaoDienAdmin() ;    
        break ; 

    case 'giao-dien' : 
        $ctr = new HomeController() ; 
        $ctr->giaoDienTrangChu() ;    
        break ;


    // user
    case 'add-user' : 
        $ctr = new UserController() ; 
        $ctr->addUser() ;    
        break ; 
    
    // user
    case 'save-add-user' : 
        $ctr = new UserController() ; 
        $ctr->saveAddUser() ;    
        break ;
        
    case 'save-edit-user' : 
        $ctr = new UserController() ; 
        $ctr->saveEditUser() ;    
        break ;     
        
    // user
    case 'list-user' : 
        $ctr = new UserController() ; 
        $ctr->listUser() ;    
        break ;   
        
    case 'delete-user' : 
        $ctr = new UserController() ; 
        $ctr->deleteUser() ;    
        break ; 

    case 'edit-user' : 
        $ctr = new UserController() ; 
        $ctr->editUser() ;    
        break ; 
        
    // bình luận 
    case 'add-comment' : 
        $ctr = new CommentController() ; 
        $ctr->addComent() ;    
        break ; 

    case 'delete-comment' : 
        $ctr = new CommentController() ; 
        $ctr->deleteComment() ;    
        break ;  

    case 'comment-delete-admin' : 
        $ctr = new CommentController() ; 
        $ctr->deleteCommentAdmin() ;    
        break ; 
    
    case 'list-comment' : 
        $ctr = new CommentController() ; 
        $ctr->listComment() ;    
        break ;    
        
    case 'comment-detail' : 
            $ctr = new CommentController() ; 
            $ctr->commentDetail() ;    
            break ; 


    // slide     
    case 'add-slide' : 
        $ctr = new SlideController() ; 
        $ctr->addSlide() ;    
        break ;

    case 'save-add-slide' : 
        $ctr = new SlideController() ; 
        $ctr->saveAddSlide() ;    
        break ; 
        
    case 'edit-slide' : 
        $ctr = new SlideController() ; 
        $ctr->editSlide() ;    
        break ;  
    
    case 'save-edit-slide' : 
        $ctr = new SlideController() ; 
        $ctr->saveEditSlide() ;    
        break ;  
    
    case 'active' : 
        $ctr = new SlideController() ; 
        $ctr->Active() ;    
        break ;  

    case 'no-active' : 
        $ctr = new SlideController() ; 
        $ctr->noActive() ;    
        break ; 

    case 'delete-slide' : 
        $ctr = new SlideController() ; 
        $ctr->deleteSlide() ;    
        break ; 
        
    case 'list-slide' : 
        $ctr = new SlideController() ; 
        $ctr->listSlide() ;    
        break ;
    
        // tai khoản 
    case 'login' : 
        $ctr = new UserController() ; 
        $ctr->login() ;    
        break ; 
        
    case 'forgot' : 
        $ctr = new UserController() ; 
        $ctr->forgot() ;    
        break ; 
        
    case 'post-forgot' : 
        $ctr = new UserController() ; 
        $ctr->postForgot() ;    
        break ;  


    case 'register' : 
        $ctr = new UserController() ; 
        $ctr->register() ;    
        break ; 
        
    case 'save-register' : 
        $ctr = new UserController() ; 
        $ctr->saveRegister() ;    
        break ;     
        
    case 'post-login' : 
        $ctr = new UserController() ; 
        $ctr->postLogin() ;    
        break ;

    case 'edit-password' : 
        $ctr = new UserController() ; 
        $ctr->editPassword() ;    
        break ; 
        
    case 'save-edit-password' : 
        $ctr = new UserController() ; 
        $ctr->saveEditPassword() ;    
        break ; 

    case 'edit-user-clien' : 
        $ctr = new UserController() ; 
        $ctr->editUserClien() ;    
        break ;  
        
    case 'save-edit-user-clien' : 
        $ctr = new UserController() ; 
        $ctr->saveEditUserClien() ;    
        break ; 
        
    case 'account' : 
        $ctr = new UserController() ; 
        $ctr->account() ;    
        break ;

    case 'orders-ed' : 
        $ctr = new UserController() ; 
        $ctr->orders_ed() ;    
        break ;

        
    case 'logout' : 
        $ctr = new UserController() ; 
        $ctr->logout() ;    
        break ; 
     
    // search 
    case 'search' : 
        $ctr = new HomeController() ; 
        $ctr->search() ;    
        break ; 
    
    // giỏ hàng 
    case 'cart' : 
        $ctr = new CartController ; 
        $ctr->addCart() ;    
        break ;   

    case 'shopppcart' : 
        $ctr = new CartController ; 
        $ctr->listShoppingCart() ;    
        break ;

    case 'delete-shoppingcart' : 
        $ctr = new CartController ; 
        $ctr->deleteProductShoppingCart() ;    
        break ;

    case 'updatecart' : 
        $ctr = new CartController ; 
        $ctr->updatecart() ;    
        break ;

     // xóa tất cả giỏ hàng   
    case 'deletecart' : 
        $ctr = new CartController ; 
        $ctr->deletecart() ;    
        break ;

    // mua hàng     
    
    case 'order' : 
        $ctr = new OrdersController ; 
        $ctr->order() ;    
        break ;

    

     default:
       echo "Đường dẫn không tồn tại !" ; 
       break;
   }

?>