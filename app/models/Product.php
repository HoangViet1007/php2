<?php
    // tat ca cac file deu duoc xu li o index nen phai tinh tu index
    namespace App\Models ; 
    use Illuminate\Database\Eloquent\Model ; 
    
    class Product extends Model{
        protected $table = "product" ; 
        public $timestamps = false;
    }

?>