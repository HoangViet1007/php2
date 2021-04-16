<?php
    // tat ca cac file deu duoc xu li o index nen phai tinh tu index
    namespace App\Models ; 
    use Illuminate\Database\Eloquent\Model ; 
    
    class Orders extends Model{
        protected $table = "orders" ; 
        const UPDATED_AT = null;
    }

?>