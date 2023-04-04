<?php session_start();
include('customer/include/dbcon.php');
?>

<?php ob_start();
include('include/header.php'); ?>
<div class="container sign-in-up">
  <div class="row mb-5">
    <div class="col-md-6">
      <div class="cuahang_title" style="font-size: 1.8rem; color: #21537e; font-family: monospace;">Cửa hàng vật liệu xây dựng và thiết kế nhà CVHOUSE</div>
      <p style="font-size: 1.2rem;font-family: monospace;color: #7b7b7b;">
        Cửa hàng vật liêu xây dựng luôn cung cấp đến khách hàng sản phẩm chất lượng và hợp thời đại, mang đến tổ ấm cho gia đình </p>
    </div>


    <div class="col-md-6" style="height:66.5vh;">
      <div class="card" style="background-image: linear-gradient(#f8f8f8, #abd9ffa3);">
        <div class="card-body">
          <h1 class="text-center mt-5" style="font-family: monospace; color: #004085;">Đăng nhập</h1>

          <form method="post" class="mt-5 p-3">

            <?php if (isset($_POST['signin'])) {

              $email     = mysqli_real_escape_string($con, $_POST['email']);
              $password  = mysqli_real_escape_string($con, $_POST['password']);

              $query = "SELECT * FROM customer";
              $run   = mysqli_query($con, $query);

              if (mysqli_num_rows($run) > 0) {
                while ($row = mysqli_fetch_array($run)) {

                  $db_cust_id    = $row['cust_id'];
                  $db_cust_name  = $row['cust_name'];
                  $db_cust_email = $row['cust_email'];
                  $db_cust_pass  = $row['cust_pass'];
                  $db_cust_add   = $row['cust_add'];
                  $db_cust_city  = $row['cust_city'];
                  $db_cust_pcode = $row['cust_postalcode'];
                  $db_cust_number = $row['cust_number'];

                  if ($email == $db_cust_email && $password == $db_cust_pass) {

                    $_SESSION['id']    = $db_cust_id;
                    $_SESSION['name']  = $db_cust_name;
                    $_SESSION['email'] = $db_cust_email;
                    $_SESSION['add']   = $db_cust_add;
                    $_SESSION['city']  = $db_cust_city;
                    $_SESSION['pcode'] = $db_cust_pcode;
                    $_SESSION['number'] = $db_cust_number;
                    header('location:customer/index.php');
                  } else {
                    $error = "Email hoặc mật khẩu sai";
                  }
                }
              } else {
                $error = "Tài khoản không tồn tại";
              }
            }

            ?>


            <?php
            if (isset($error)) {

              echo "<div class='alert bg-danger' role='alert'>
                                  <span class='text-white text-center'> $error</span>
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                      <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>";
            }

            ob_end_flush(); ?>


            <div class="form-group">
              <input type="text" name="email" placeholder="Email*"style="font-family: monospace;" class="form-control" required>
            </div>
            <div class="form-group">
              <input type="password" name="password"style="font-family: monospace;" placeholder="Mật khẩu*" class="form-control" required>
            </div>

            <a href="#" style="font-family: monospace;"> Quên mật khẩu?</a>

            <div class="form-group text-center mt-4">
              <input type="submit" name="signin" class="btn btn-primary"style="font-family: monospace;" value="Đăng nhập">
            </div>

            <div class="text-center mt-4 "style="font-family: monospace;"> Chưa có tài khoản? <a href="register.php"style="font-family: monospace;"> Đăng ký ngay</a></div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<meta charset="UTF-8">
  <title>HOME DECOR</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/signin.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="/img/favicon.jpg">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php include('include/footer.php'); ?>