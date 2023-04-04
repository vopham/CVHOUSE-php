<?php include('include/header.php'); ?>

<div class="container sign-in-up">
  <div class="row">
    <div class="col-md-6">
    <div class="cuahang_title" style="font-size: 1.8rem; color: #21537e; font-family: monospace;">Cửa hàng vật liệu xây dựng và thiết kế nhà 2House</div>
      <p style="font-size: 1.2rem;font-family: monospace;color: #7b7b7b;">
        Cửa hàng vật liêu xây dựng luôn cung cấp đến khách hàng sản phẩm chất lượng và hợp thời đại, mang đến tổ ấm cho gia đình </p>
    </div>

    <div class="col-md-6">
      <div class="card"style="background-image: linear-gradient(#f8f8f8, #abd9ffa3);">
        <div class="card-body">
          <h1 class="text-center mt-5"style="font-family: monospace; color: #004085;">Đăng ký thành viên</h1>


          <form method="post" class="mt-5 p-3">

            <?php
            if (isset($_POST['register'])) {

              $fullname = $_POST['fullname'];
              $email = $_POST['email'];
              $password = $_POST['password'];
              $conf_pass = $_POST['confirm-password'];
              $address = $_POST['address'];
              $city = $_POST['city'];
              $postal_code = $_POST['code'];
              $number = $_POST['phone_number'];

              if (!empty($fullname) or !empty($email) or !empty($password) or !empty($conf_pass) or !empty($address) or !empty($city) or !empty($postal_code) or !empty($number)) {

                if ($password === $conf_pass) {

                  $cust_query = "INSERT INTO customer(`cust_name`,`cust_email`,`cust_pass`,`cust_add`,`cust_city`,`cust_postalcode`,`cust_number`) VALUES('$fullname','$email','$password','$address','$city','$postal_code','$number')";


                  if (mysqli_query($con, $cust_query)) {
                    $message = "Bạn tạo tài khoản thành công!";
                  }
                } else {
                  $error = "Mật khẩu không khớp";
                }
              } else {
                $error = "Vui lòng điền đủ thông tin";
              }
            }

            ?>
            <?php
            if (isset($error)) {

              echo "<div class='alert bg-danger' role='alert'>
                                <span class='text-white text-center'> $error</span>
                              </div>";
            } else if (isset($message)) {

              echo "<div class='alert bg-success' role='alert'>
                                <span class='text-white text-center'> $message</span>
                              </div>";
            }

            ?>
            <div class="form-group">

              <input type="text" name="fullname"style="font-family: monospace;" placeholder="Họ tên*" class="form-control">
            </div>

            <div class="form-group">
              <input type="text" name="email"style="font-family: monospace;" placeholder="Email*" class="form-control">
            </div>

            <div class="row">
              <div class="col-md-6 col-sm-6 col-12">
                <div class="form-group">
                  <input type="password" name="password"style="font-family: monospace;" placeholder="Mật khẩu*" class="form-control">
                </div>
              </div>
              <div class="col-sm-6 col-12 col-md-6 ">
                <div class="form-group">
                  <input type="password" name="confirm-password"style="font-family: monospace;" placeholder="Nhập lại mật khẩu*" class="form-control">
                </div>
              </div>
            </div>


            <div class="form-group">
              <input type="text" name="address"style="font-family: monospace;" placeholder="Địa chỉ*" class="form-control">
            </div>

            <div class="row">
              <div class="col-md-6 col-6">
                <div class="form-group">
                  <input type="text" name="city"style="font-family: monospace;" placeholder="Thành phố*" class="form-control">
                </div>
              </div>

              <div class="col-md-6 col-6">
                <div class="form-group">
                  <input type="number" name="code"style="font-family: monospace;" placeholder="Mã bưu điện" class="form-control" >
                </div>
              </div>

            </div>

            <div class="form-group">
              <input type="number" name="phone_number"style="font-family: monospace;" placeholder="Số điện thoại*" class="form-control">
            </div>

            <div class="form-group text-center mt-4">
              <input type="submit" name="register"style="font-family: monospace;" class="btn btn-primary" value="Đăng ký">
            </div>

            <div class="text-center mt-4"style="font-family: monospace;"> Bạn đã có tài khoản? <a href="sign-in.php"style="font-family: monospace;"> Đăng nhập </a></div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include('include/footer.php'); ?>