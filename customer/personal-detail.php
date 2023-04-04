<?php 
include('include/header.php');

if(!isset($_SESSION['email'])){
    header('location:../sign-in.php');
}

if(isset($_SESSION['email'])){
  
    $customer_id    = $_SESSION['id'];

    $query = "SELECT * FROM customer WHERE cust_id=$customer_id";
    $run   = mysqli_query($con,$query);
    $row = mysqli_fetch_array($run);

    $cust_name = $row['cust_name'];
    $cust_email = $row['cust_email'];
    $cust_add = $row['cust_add'];
    $cust_city = $row['cust_city'];
    $cust_pcode = $row['cust_postalcode'];
    $cust_number = $row['cust_number'];

    
    if(isset($_POST['update'])){
      $fullname = $_POST['fullname'];
     echo $email    = $_POST['email'];
      $address  = $_POST['address'];
      $city     = $_POST['city'];
      $code     = $_POST['code'];
      $number   = $_POST['phone_number'];
       
      $up_query = "UPDATE `customer` SET `cust_name`='$fullname',
     `cust_add`='$address',`cust_city`='$city',`cust_postalcode`='$code',`cust_number`='$number' 
       WHERE cust_id=$customer_id ";
       if(mysqli_query($con,$up_query)){

        $_SESSION['msg']="<div class='alert alert-success alert-dismissible fade show pt-1 pb-1 pl-3'  role='alert'>
          <strong><i class='fas fa-check-circle'></i> Xin chúc mừng! </strong>Thông tin tài khoản đã được cập nhật.
          <button type='button' class='close p-2' data-dismiss='alert' aria-label='Close'>
           <span  aria-hidden='true'>&times;</span>
          </button>
           </div>";
           header('location:personal-detail.php');
       }
      }
}

?>






<div class="">
   <h1 class="text-center text-dark mt-5"style="font-family: monospace;">Thông tin cá nhân</h1>
 </div>

<div class="container mt-5">
    <div class="row">

     <div class="col-md-3">
     <?php include('include/sidebar.php');?>
     </div>

     <div class="col-md-9">
       <h3>Thông tin cá nhân:</h3><hr>
       <h6>THAY ĐỔI THÔNG TIN CÁ NHÂN</h6>
        <p>Bạn có thể truy cập và sửa đổi chi tiết cá nhân của mình (tên, địa chỉ thanh toán, số điện thoại, v.v.) để tạo điều kiện thuận lợi cho việc mua hàng trong tương lai và thông báo cho chúng tôi về bất kỳ thay đổi nào trong chi tiết liên hệ của bạn.</p>
          
          <?php 
          
               if(isset($_SESSION['msg'])){
                 echo $_SESSION['msg'];
                }
               ?>
            
          <form method="post" class="w-75">
            
            <div class="form-group ">
              <input type="text" name="fullname" placeholder="Họ tên" value="<?php echo $cust_name;?>" class="form-control" >
             </div>

            <div class="form-group">
              <input type="text" name="email" placeholder="Email" class="form-control" value="<?php echo $cust_email;?>" disabled>
             </div>
          

              <div class="form-group">
                <input type="text" name="address" placeholder="Địa chỉ" value="<?php echo $cust_add;?>" class="form-control" >
            </div>
             
            <div class="row">
              <div class="col-md-6 col-6">
                <div class="form-group">
                  <input type="text" name="city" placeholder="Thành phố" value="<?php echo $cust_city;?>" class="form-control" >
               </div>
              </div>
              
              <div class="col-md-6 col-6">
                <div class="form-group">
                  <input type="number" name="code" placeholder="Mã bưu điện" value="<?php echo $cust_pcode;?>" class="form-control" >
               </div>
              </div>

            </div>

            <div class="form-group">
              <input type="number" name="phone_number" placeholder="Số điện thoại" value="<?php echo $cust_number;?>" class="form-control" >
           </div>

              <div class="form-group text-center mt-4">
                <input type="submit" name="update" class="btn btn-primary" value="Cập nhật">
              </div>

          </form> 
        
      </div>
    </div>
</div>

        
<?php include('include/footer.php');?>