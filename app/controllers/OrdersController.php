<?php
   namespace App\Controllers ; 
   use App\Models\Orders ; 
   use App\Models\Orders_detail ; 

   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;


   class OrdersController extends BaseController{
       
        public function order(){
            $msg = "" ; 
            $customer_nameErr = $customer_addressErr = $customer_phoneErr = $customer_emailErr = "" ; 
            $requesData = $_POST ; 

            // echo $requesData['id'] ; 
            // die ; 

            // echo "<pre>" ; 
            // print_r($requesData) ; 
            // die ; 
            if(isset($_SESSION['cart'])){
               $products = $_SESSION['cart'] ; 

            }

            // validate 
            if(empty($requesData['customer_name'])){
               $customer_nameErr = "Hãy nhập họ và tên !" ; 
            }else{
               if (!preg_match("/^[a-zA-Z-'(àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐD) ]*$/", $requesData['customer_name'])) {
                  $customer_nameErr = "Họ và tên không hợp lệ";
              }
            }

               // địa chỉ 
            if(empty($requesData['customer_address'])){
               $customer_addressErr = "Hãy nhập địa chỉ !" ; 
            }

            // số điện thoại 
            $sdt_hop_le = '/((^0)(32|33|34|35|36|37|38|39|56|58|59|70|76|77|78|79|81|82|83|84|85|86|88|89|90|92|91|93|94|96|97|98|99)+([0-9]{7}))$/' ; 
            if (empty($requesData['customer_phone'])) {
               $customer_phoneErr = "Vui lòng nhập số điện thoại !";
         
            }else{
               if(!preg_match($sdt_hop_le , $requesData['customer_phone'])){
                     $customer_phoneErr = "Số điện thoại không hợp lệ !";
               }
            }

            // email 
            $email_hop_le = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/" ; 

            if(empty($requesData['customer_email'])){
                  $customer_emailErr = "Hãy nhập email cho user !" ; 
            }else{
                  if(!preg_match($email_hop_le , $requesData['customer_email'])){
                     $customer_emailErr = "Email không hợp lệ !" ;  
                  }else{
                     $customer_emailErr = "" ; 
                  }
            }

            // lỗi chuỗi lỗi 
            if($customer_nameErr.$customer_emailErr.$customer_addressErr.$customer_phoneErr != ""){
                  $this->render('homepage.listshoppingCart',[
                     'customer_nameErr'       => $customer_nameErr,
                     'customer_addressErr'    => $customer_addressErr,
                     'customer_phoneErr'      => $customer_phoneErr,
                     'customer_emailErr'      => $customer_emailErr,
                     'products'               =>$products,
                     'errMsg'                 => $msg
                  ]) ; 
                  die ; 
            }
            
            // tính tổng tiền
            // $number = 0 ; 
            // $price = 0 ; 
            // if(isset($_SESSION['cart'])){
            //     $cart = $_SESSION['cart'] ; 
            //     foreach ($cart as $key => $value) {
            //         $number += (int)$value['number'] ; 
            //         $price += (int)$value['price'] * $value['number']  ; 
            //     }
            // }



            // ok hết zồi thì lưu vào bảng orders
            $model = new Orders() ; 
            $model->customer_id = $requesData['id'] ; 
            $model->customer_name = $requesData['customer_name'] ; 
            $model->customer_address = $requesData['customer_address'] ; 
            $model->customer_phone   = $requesData['customer_phone'] ; 
            $model->customer_email   = $requesData['customer_email'] ; 
            $model->total_price      = $requesData['total_price'] ; 
            $model->save() ; 

            // luu vào bảng orders_detail
            // lấy za id hóa đơn vừa zồi mới lưu 
            $order = Orders::limit(1)->orderBy('id','desc')->get();
            // echo "<pre>" ; 
            // print_r($order) ; 
            // die ; 
            foreach ($order as $value) {
                $id_order = $value->id ; 
            }
            // echo $id_order ; 
            // die ; 

            if(isset($_SESSION['cart'])){
                  $cart = $_SESSION['cart'] ; 
                  // khởi tạo đối tượng orders-datel
                  foreach ($cart as $value) {
                       $model2 = new Orders_detail() ; 
                       $model2->id_product      = $value['id'] ; 
                       $model2->name_product    = $value['name'] ; 
                       $model2->image_product   = $value['image'] ; 
                       $model2->quantity        = $value['number'] ; 
                       $model2->id_orders       = $id_order ; 
                       $model2->save() ; 
                  }
            }
          
            // lấy za order 
            $model3 = Orders::find($id_order) ; 

            // laays za những sản phâ có trong háo đơn 
            $model4 = Orders_detail::join('product','product.id','orders_detail.id_product')->select('orders_detail.*','product.price as price_product')->where('id_orders','=',$id_order)->get() ; 
            // print_r($model4) ; 
            // die ; 
            $msg = "Đặt hàng thành công !" ; 

            // gửi thông tin đơn hàng về cho khách hàng 

            $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
            try {
                //Server settings
               //  $mail->SMTPDebug = 2;                                 // Enable verbose debug output
                $mail->isSMTP();  
                $mail->CharSet = 'utf8' ;                                         // Send using SMTP
                // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'sendemailcuaviet@gmail.com';                 // SMTP username
                $mail->Password = 'viet10072001';                           // SMTP password
                $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to
            
                //Recipients
                $mail->setFrom('sendemailcuaviet@gmail.com', 'Shop quần áo nam The Men');
                $mail->addAddress("$model3->customer_email","$model3->customer_name");     // Add a recipient
                // $mail->addAddress('ellen@example.com');               // Name is optional
                $mail->addReplyTo('hoangviet10172001@gmail.com', 'Chủ Shop');
                // $mail->addCC('cc@example.com');
                // $mail->addBCC('bcc@example.com');
            
                //Attachments
                // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = "Shop quần áo nam The Men : Update mật khẩu";
                $mail->Body    = "
                <h3>THÔNG TIN HÓA ĐƠN</h3>
                <table class='table table-bordered'>
                     <tbody>
                        <tr>
                           <td>Mã hóa đơn</td>
                           <td class='text-danger'>:&ensp;TM-{$model3->id}</td>                        
                        </tr>
                        <tr>
                           <td>Tên người đặt</td>
                           <td>:&ensp; {$model3->customer_name}</td>                        
                        </tr>
                        <tr>
                           <td>Địa chỉ</td>
                           <td>:&ensp; {$model3->customer_address}</td>                        
                        </tr>
                        <tr>
                           <td>Số điện thoại</td>
                           <td>:&ensp; {$model3->customer_phone}</td>                        
                        </tr>
                        <tr>
                           <td>Email</td>
                           <td>:&ensp; {$model3->customer_email}</td>                        
                        </tr>
                        <tr>
                           <td>Tổng tiền</td>
                           <td>:&ensp; {$model3->total_price}&ensp;đ</td>                        
                        </tr>
                        <tr>
                           <td>Ngày đặt hàng</td>
                           <td>:&ensp; {$model3->created_at}</td>                        
                        </tr>
                     </tbody>
                </table>
                ";
                $mail->send();
                            // rennder za thông itn đơn hàng cho khách hàng xem 
               $this->render('homepage.byeCart',[
                  'orders'    => $model3 , 
                  'orders-detal'   => $model4
               ]);

               unset($_SESSION['cart']) ; 

                // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
                echo 'Gửi email không thành công !' ; 
            }



        }

        public function listOrders(){
            $msg = isset($_GET['msg']) ? $_GET['msg'] : "" ; 
               // làm phân trang 
            if (!isset($_GET['page'])) {
            $page = 1;
            } else {
               $page = $_GET['page'];
               if (!is_numeric($page) || $page <= 0) {
                     header("location:./list-product?page=1");
               }
            }
            $next = $page + 1 ; 
            $prew = $page - 1 ; 

            $data = 4;
            $number = Orders::all()->count() ; 
            $page2 = ceil($number / $data);
            $tin = ($page - 1) * $data;

            // lấy za tất cả các hóa đoen 
            $model = Orders::skip($tin)->limit($data)->get() ; 
            $this->render('admin.orders.list-orders',['orders'=>$model,'errMsg' => $msg , 'page2'=>$page2,'next'=>$next,'prew'=>$prew]) ; 

        }

        public function OrdersDetail(){
            // lấy id xuống
            $msg = "" ; 
            $id = isset($_GET['id']) ? $_GET['id'] : "" ;
            // echo $id ; 
            // die ;  
            if(!$id){ 
               $msg = "Hóa đơn này không tồn tại !" ; 
               header("location:./list-orders?msg=$msg") ; 
            } 

            //   lấy hóa đơn chi tiế 
            $model = Orders_detail::where('id_orders','=',$id)->get() ; 
            $this->render('admin.orders.orders-detail',['ordersDetail' =>$model,'errMsg' =>$msg,'id'=>$id]) ; 

        }



   }




?>
 <!-- <h3>THÔNG TIN CHI TIẾT ĐƠN HÀNG</h3>
                <table class='table table-bordered'>
                    <thead style='background-color: #cca772; color: white;'>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                    </thead>
                    <tbody>
                       <?php foreach ($model4 as $value) { ?>
                           <tr>
                              <td><?php echo $value.'[name_product]' ?></td>
                              <td><?php echo $value.'[quantity]' ?></td>
                              <td><?php echo $value.'[price_product]' ?></td>
                           </tr>
                        <?php } ?>
                    </tbody>
                </table> -->