<?php
    // view engine 
    // cho cacs controller còn lại thừa kế file này 
    // dặt tên file trong views phải đặt a.blade.php (phải có đuôi blade) . Dịch code từ file blade sang 1 file php thuần . được viết trong thue mục storage 
    // tài liệu : https://laravel.com/docs/8.x/blade/ 
    // echo ra biến thì dùng : {{$name}}
    // echo za html thì dùng : {{!!$name!!}} 

    namespace App\Controllers ; 
    use Jenssegers\Blade\Blade;

    class BaseController{

        const VIEW_FOLDER_NAME = './app/views' ; 
        
        protected function render($view,$data=[]){
            $blade = new Blade('./app/views/', 'storage');

            echo $blade->make($view,$data)->render();
        }


        // hàm load view 
        public function view($viewPath , array $data = []){
            foreach ($data as $key => $value) {
                 $key = $value ; 
            }
            require_once(self::VIEW_FOLDER_NAME . '/' . str_replace('.','/' , $viewPath) . '.blade.php') ; 
        }
    }


?>