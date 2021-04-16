<?php
/*
    namespace App\Models ; 
    use PDO ; 
    class BaseModel{

        function __construct()
        {
            $this->conn = new PDO("mysql:host=localhost;dbname=demo-php2;charset:utf8","root","") ; 
        }

        // hàm lấy tất cae dữ liệu 
        static function all(){
            // từ khóa new static thay thể cho class bao chum lấy nó . class nào kế thừa BaseModel thì class đó sẽ thay cho new static kia 
            $model = new static; 

            // dùng da hình với table . khi vào class nó sẽ tìm trong class đó có table ko để nó trỏ tới 
            $sql = "SELECT * FROM " . $model->table ; 
            $stmt = $model->conn->prepare($sql) ; 
            $stmt->execute() ; 
            // laay toan bo du lieu tra ve cau lenh 
            return $stmt->fetchAll() ; 
        }

        // hàm xóa sữ liệu 
        static function destroy($id){
            $model = new static; 
            $sql = "DELETE FROM " . $model->table . " where id = $id" ; 
            $stmt = $model->conn->prepare($sql) ; 
            $stmt->exucute() ; 

        }

        // hàm timf kiem duw lieu 
        static function find($id){
            $model = new static; 
            $sql = "SELECT * FROM " . $model->table . " where id = $id" ; 
            $stmt = $model->conn->prepare($sql) ; 
            $stmt->exucute() ;
            
            $data = $stmt->fetchAll() ; 
            if(count($data) == 0){
                return $data[0] ; 
            }
            return [] ; 

        }

    }

*/
?>