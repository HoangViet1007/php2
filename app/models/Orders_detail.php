<?php
    namespace App\Models ; 
    use Illuminate\Database\Eloquent\Model ; 
    class Orders_detail extends Model{
        protected $table = "orders_detail" ; 
        public $timestamps = false;
          /*
          Vào : https://laravel.com/docs/8.x/eloquent
           chú í : ---> Nếu đặt khóa chính ko phải là id thì phải sét lại khóa chính : protected $primaryKey = 'flight_id';
                   ---> Nếu khóa chính không tự tăng : public $incrementing = false; thì khí thêm giá trị phải điền gái trị cho id 
                   ---> Nếu databasse không có create_at và update_at thì phải sét : public $timestamps = false;  
                   ---> Lấy ra tất cả các dữ liệu : ::all() là lấy toàn bộ dữ liệu ra ngoài 
                   ---> Hàm điều diện :     ::where('active', 1)
                                            ->orderBy('name','desc')
                                            ->take(10)
                                            ->get(); 
                                            :: where có 3 tham số : Nếu ghi như trên nó sẽ là = ; vd : id = 9 ; Còn nếu thêm điều kiện thì nó sẽ id > 5 
                                            Bắt bộc phải có get() ; Lấy giá trị bản ghi tìm được còn firt() tìm giá bane ghi đấu tiên (Đây là kết thúc câu lệnh  )
                   ---> Tìm id : ::find() 
                                  vd : $product = Pruduct::find(9) là tìm ra bản ghi có id bằng 9 

        */ 
    }

?>