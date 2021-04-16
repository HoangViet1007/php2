 <div class="row d-flex justify-content-center align-items-center mb-5">
     <div class="col-md-9" style="background-color: #f1f1f1;">
         <form action="./product-cate?id={{$id}}" method="POST">
             <div class="row">
                 <div class="col-md-3">
                     <div class="form-group">
                         <input type="text" name="name" placeholder="Tên sản phẩm" class="form-control ip">
                     </div>
                 </div>

                 <div class="col-md-3">
                     <div class="form-group">
                         <input type="number" name="price_from" placeholder="Giá từ" class="form-control ip">
                     </div>
                 </div>

                 <div class="col-md-3">
                     <div class="form-group">
                         <input type="number" name="price_to" placeholder="Giá đến" class="form-control ip">
                     </div>
                 </div>

                 <div class="col-md-3">
                     <div class="form-group">
                         <input type="submit" value="Tìm kiếm" class="bu" name="luu">
                     </div>
                 </div>
             </div>
         </form>
     </div>
 </div>