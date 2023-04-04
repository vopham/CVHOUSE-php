<?php
session_start();
include_once('include/dbcon.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>CVHOUSE</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/style.css" rel="stylesheet" type="text/css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap.css.map" rel="stylesheet">
  <link rel="stylesheet" href="/img/favicon.jpg">
  <link href="css/all.min.css" rel="stylesheet">
  <link href="css/fontawesome-free-5.15.4-web/css/all.min.css" rel="stylesheet">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body>

  <header>

    <?php
    if (isset($_SESSION['email'])) {
      $cust_id =  $_SESSION['id'];
      $query = "SELECT * FROM cart Where cust_id=$cust_id";
      $run   = mysqli_query($con, $query);

      $count = mysqli_num_rows($run);
    } else {
      $count = 0;
    }
    ?>
    <!--header --->
    <div class="bigheader" style="height:100px">
        <nav class="navbar navbar-expand-md navbar-light fixed-top" style="background-color: #eef9ff;">
      
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapisblenav" aria-controls="collapsiblenav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapisblenav">
          <ul class="navbar-nav" style="margin: auto;">
            <li class="nav-item mr-4"><a class="nav-link" href="../index.php">
                <h5 style="font-size: 20px; color: #0b4260; font-weight: 500; font-family: monospace;">Trang chủ</h5>
              </a></li>
            <li class="nav-item mr-4"><a class="nav-link" href="../product.php">
                <h5 style="font-size: 20px; color: #0b4260; font-weight: 500; font-family: monospace;">Sản phẩm</h5>
              </a></li>
            <li class="nav-item mr-4"><a class="nav-link" href="../about-us.php">
                <h5 style="font-size: 20px; color: #0b4260; font-weight: 500; font-family: monospace;" >Giới thiệu</h5>
              </a></li>
            <li class="nav-item mr-4"><a class="nav-link" href="../contact-us.php">
                <h5 style="font-size: 20px; color: #0b4260; font-weight: 500; font-family: monospace;" >Liên hệ</h5>
              </a></li>

              <div class="search" style="margin: 3px 0px 0px 185px;">
                <form method="post">
                  <div class="input-group">
                    <input type="text" class="form-control" style="font-family: monospace;" name="search" placeholder="Tìm sản phẩm">
                    <div class="input-group-append">
                      <input class="btn rounded-left" style="font-family: monospace; background-color: #62bbca; color: #ffffff;" type="submit" name="sear_submit" value="Tìm kiếm">

                    </div>
                  </div>
                </form>
              </div>
            



            <?php if (!isset($_SESSION['email'])) {


            ?>

              <li class="nav-item ml-5"><a class="nav-link" href="sign-in.php"><button type="button" class="btn wave-effect btn-sm pl-3 pr-3 " style="font-family: monospace; background-color: #62bbca; color: #ffffff;" > Đăng nhập</button></a></li>
              <!-- <li class="nav-item mr-5"><a class="nav-link" href="register.php"><button type="button" class="btn btn-primary wave-effect btn-sm pl-3 pr-3 "> Đăng ký thành viên</button></a></li> -->
              <li class="nav-item">
                <h2 class="nav-link" href="index.php"></h2>
              </li>
            <?php
            }

            if (isset($_SESSION['email'])) {


            ?>
              <li class="nav-item ml-5"><a class="nav-link" href="../customer/index.php"><i class="far fa-user top-icon"></i> Tài khoản</a></li>
            <?php }
            ?>
            <li class="nav-item"><a class="nav-link" href="../cart.php"><i class="fal fa-shopping-cart top-icon"></i><span class="badge" style="position:absolute; margin-left:-5px; background-color: #f4cc70; border-radius: 10px;" ><?php echo $count; ?> </span></a></li>

          </ul>
        </div>
        </div>
        
        </div>
        


      </nav>
      
    </div>
      <div class="logoweb" style="display: flex; justify-content: center;">
        <div class="namecon">
          <a href="">
            <img src="../img/logocvhouse.png" width="90px" height="90px">
            <span style="font-family: monospace; font-size: 28px; color: #7a7007; position: relative; top: 10px;"> CVHOUSE</span> 
          </a>
        </div>
        
      </div>
        

  </header>