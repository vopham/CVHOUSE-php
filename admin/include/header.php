<?php
ob_start();
session_start();
require_once('include/dbcon.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CVHOUSE</title>

  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/bootstrap.css" rel="stylesheet">
  <link href="css/all.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>

<body id="page-top">
  <nav class="navbar navbar-expand-md navbar-dark" style="background-color: #eef9ff;">
    <a class="navbar-brand" href="index.php" style="color: #000000; font-family: monospace; position: relative; left: 645px;">TRANG QUẢN LÝ CVHOUSE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="../index.php" target="_blank" style="color: #000000; font-family: monospace;"><i class="fas fa-store"></i> Trang web </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php" style="color: #000000; font-family: monospace;"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
        </li>
        <?php
        if (isset($_SESSION['email'])) {
          $session_email = $_SESSION['email'];
          $query = "SELECT image from admin WHERE email='$session_email'";
          $run = mysqli_query($con, $query);
          $row = mysqli_fetch_array($run);
          $image = $row['image'];
        }
        ?>
        <li class="nav-item">
          <a class="nav-link" href="profile.php" style="color: #000000; font-family: monospace;"><img src="img/<?php echo $image; ?>" alt="Tài khoản" class="rounded-circle" width="37px" height="32px"></a>
        </li>

      </ul>
    </div>
  </nav>