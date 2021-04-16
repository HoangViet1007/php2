<?php
    namespace App\Controllers ; 
    use App\Models\Category;
    use App\Models\Comment;
    use App\Models\Slide ; 
    use App\Models\Product ; 
    use App\Models\User ; 
    use App\Models\VaiTro ; 
    use App\Models\Orders ; 

    class AdminController extends BaseController{

        public function index(){
            // phần index admin

            // đếm xem có bao nhiêu sản phẩm 
            $products = Product::all()->count() ; 

            // đếm xem có bao nhiêu danh mục
            $categorys = Category::all()->count() ; 
            
            // đếm vai tro
            $vaitro = VaiTro::all()->count() ; 

            // đếm slide ảnh
            $slides = Slide::all()->count() ; 

            // đếm bình luận 
            $bl = Comment::all()->count() ; 

           // đến danh thu 
           $tong_tien = Orders::sum('total_price') ; 

           // đếm hóa đơn 
           $hd = Orders::all()->count() ; 

           // đếm người 
           $user = User::all()->count() ; 

 
            // làm biểu đồ tròn
            $tks = Product::select('id','name as ten_loai',Product::raw("count(id_category) as sl"))->groupBy('id_category')->get() ; 

            

            // laays za doanh thu 
            $dt = Orders::select(Orders::raw("MONTH(created_at) nt"),Orders::raw("SUM(total_price) as tt"))
                                ->groupBy(Orders::raw("MONTH(created_at)"))
                                ->get(); 


            $this->render('admin.dashboard.dashboard',[
                    'products'       =>$products ,
                    'categorys'      =>$categorys , 
                    'vaitro'         =>$vaitro,
                    'slides'         =>$slides,
                    'bl'             =>$bl,
                    'dt'             =>$dt,
                    'tks'            =>$tks,
                    'tong_tien'      =>$tong_tien,
                    'hd'             => $hd,
                    'user'           => $user
                ]);

        }



    }