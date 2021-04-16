<?php
    // tat ca cac file deu duoc xu li o index nen phai tinh tu index
    namespace App\Models ; 
    use Illuminate\Database\Eloquent\Model ; 
    
    class Comment extends Model{
        protected $table = "comment" ; 
        const UPDATED_AT = null;
    }

?>