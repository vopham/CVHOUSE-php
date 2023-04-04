<?php ob_start();
include('include/header.php');




if (isset($_SESSION['id'])) {
  $custid = $_SESSION['id'];

  if (isset($_GET['cart_id'])) {
    $p_id = $_GET['cart_id'];

    $sel_cart = "SELECT * FROM cart WHERE cust_id = $custid and product_id = $p_id ";
    $run_cart    = mysqli_query($con, $sel_cart);

    if (mysqli_num_rows($run_cart) == 0) {
      $cart_query = "INSERT INTO `cart`(`cust_id`, `product_id`,quantity) VALUES ($custid,$p_id,1)";
      if (mysqli_query($con, $cart_query)) {
        header("location:product.php");
        $msg = "<script>alert('Sản phẩm đã được thêm vào giỏ hàng  '); </script>";
      }
    }
    if (mysqli_num_rows($run_cart) > 0) {
      while ($row = mysqli_fetch_array($run_cart)) {
        $exist_pro_id = $row['product_id'];
        if ($p_id == $exist_pro_id) {
          $error = "<script>alert('⚠️ Sản phẩm này đã có trong giỏ hàng của bạn  '); </script>";
        }
      }
    }
  }
} else if (!isset($_SESSION['email'])) {
  echo "<script> function a(){alert('⚠️ Cần đăng nhập để thêm sản phẩm này vào giỏ hàng');}</script>";
}


?>


<div class="">
  <h2 class="text-center"></h2>
  <h1 class="nentitlesanpham"><div class="titlesanpham">Sản phẩm</div></h1>

</div>




<div class="container mt-5">
  <div class="row">
    <div class="col-md-3 col-12">
      <div class="list-group">
        <a href='product.php' class='list-group-item-title'><i class='fal fa-home ml-2'></i> Tất cả sản phẩm </a>
        <?php
        $cat_query = "SELECT * FROM categories ORDER BY id ASC";
        $cat_run   = mysqli_query($con, $cat_query);
        if (mysqli_num_rows($cat_run) > 0) {
          while ($cat_row = mysqli_fetch_array($cat_run)) {
            $cid      = $cat_row['id'];
            $cat_name = ucfirst($cat_row['category']);
            $font     = $cat_row['fontawesome-icon'];
            echo " <a href='product.php?cat_id=$cid' class='list-group-item2'><i class='fal $font ml-2'></i> $cat_name </a>";
          }
        } else {
          echo " <a class='list-group-item'> Không có sản phẩm </a>";
        }

        ?>
      </div>
    </div>

    <div class="col-md-9 col-12">
      <div class="row">
        <div class="col-md-6"></div>
        <div class="col-md-6">
        <div class="search" style="margin: 3px 0px 0px 50px;">
                <form method="post">
                  <div class="input-group">
                    <input type="text" class="form-control" style="font-family: monospace;" name="search" placeholder="Tìm sản phẩm">
                    <div class="input-group-append">
                      <input class="btn rounded-left" style="font-family: monospace; background-color: #62bbca; color: #ffffff;" type="submit" name="sear_submit" value="Tìm kiếm">

                    </div>
                  </div>
                </form>
              </div>
          <!-- <form method="post">
            <div class="input-group">
              <input type="text" class="form-control" name="search" placeholder="Tìm sản phẩm">
              <div class="input-group-append">
                <input class="btn btn-primary rounded-left" type="submit" name="sear_submit" value="Tìm">
              </div>
            </div>
          </form> -->
        </div>
      </div>

      <?php
      if (isset($msg)) {
        echo $msg;
      } else if (isset($error)) {
        echo $error;
      }
      ?>

      <!----Product list-->
      <div class="row">

        <?php

        if (isset($_GET['cat_id'])) {


          $catid = $_GET['cat_id'];
          $cat_query = "SELECT * FROM categories WHERE id=$catid ORDER BY id ASC";
          // $run   = mysqli_query($con, $cat_query);
          // $row   = mysqli_fetch_array($run);
          // $catname = $row['category'];

          if (isset($_GET['page'])) {
            $page_id = $_GET['page'];
          } else {
            $page_id = 1;
          }

          $required_pro = 12;

          //$query = "SELECT * FROM furniture_product Where status = 'Công khai' ORDER  BY pid";
          $run   = mysqli_query($con, $cat_query);
          $count_rows = mysqli_num_rows($run);

          $pages = ceil($count_rows / $required_pro);
          $product_start = ($page_id - 1) * $required_pro;


          $p_query = "SELECT * FROM furniture_product WHERE category=$catid ORDER BY pid DESC LIMIT $product_start,$required_pro";
        } else if (isset($_POST['sear_submit'])) {
          $search = $_POST['search'];
          $p_query1 = "SELECT * FROM furniture_product WHERE title LIKE '%$search%' ";

          if (isset($_GET['page'])) {
            $page_id = $_GET['page'];
          } else {
            $page_id = 1;
          }

          $required_pro = 12;
          $run   = mysqli_query($con, $p_query1);
          $count_rows = mysqli_num_rows($run);

          $pages = ceil($count_rows / $required_pro);
          $product_start = ($page_id - 1) * $required_pro;

          $p_query = "SELECT * FROM furniture_product WHERE title LIKE '%$search%' ORDER BY pid DESC LIMIT $product_start,$required_pro ";
        } else {
          if (isset($_GET['page'])) {
            $page_id = $_GET['page'];
          } else {
            $page_id = 1;
          }

          $required_pro = 12;

          $query = "SELECT * FROM furniture_product Where status = 'Công khai' ORDER  BY pid";
          $run   = mysqli_query($con, $query);
          $count_rows = mysqli_num_rows($run);

          $pages = ceil($count_rows / $required_pro);
          $product_start = ($page_id - 1) * $required_pro;

          $p_query = "SELECT * FROM furniture_product WHERE status='Công khai' ORDER BY pid DESC LIMIT $product_start,$required_pro";
        }

        $p_run   = mysqli_query($con, $p_query);

        if (mysqli_num_rows($p_run) > 0) {
          while ($p_row = mysqli_fetch_array($p_run)) {
            $pid      = $p_row['pid'];
            $ptitle  = $p_row['title'];
            $pcat    = $p_row['category'];
            $p_price = $p_row['price'];
            $size    = $p_row['size'];
            $img1    = $p_row['image'];
        ?>

            <div class="col-md-4 mt-4">
              <img src="img/<?php echo $img1; ?>" class="hover-effect" width="100%" height="190px">
              <div class="text-center mt-3">
                <h5 title="<?php echo $ptitle; ?>"><?php echo substr($ptitle, 0, 20); ?>...</h5>
                <h6><?php echo number_format($p_price); ?> VND</h6>
              </div>

              <div class="row">
                <div class="col-md-12 col-sm-12 col-12 text-center">

                  <a href="product.php?cart_id=<?php echo $pid; ?>" type="submit" onclick="a()" class="btn btn-primary btn-sm hover-effect" style="background-color: #7ac8d4;">
                  <i class="fal fa-cart-arrow-down"></i>
                  </a>
                  <a href="product-detail.php?product_id=<?php echo $pid; ?>" class="btn btn-default btn-sm hover-effect text-dark">
                    <i class="fas fa-info-circle"></i> Xem chi tiết
                  </a>

                </div>

              </div>
            </div>

        <?php
          }
        } else {
          echo "<h3 class='text-center'> Sản phẩm không tồn tại </h3>";
        }

        ?>
      </div>
      <!--end product list-->

      <!---Pagination-->
        <div class="nextpage">
          <ul class="pagination pagination-md mt-5">
          <?php for ($i = 1; $i <= $pages; $i++) {
            echo "<li class='page-item " . ($i == $page_id ? ' active ' : '') . "'><a class='page-link' href='product.php?page=$i'>$i</a></li>";
          } ?>
          </ul>
        </div>
      
      <!---end pagination-->

    </div>
  </div>
</div>
<meta charset="UTF-8">
  <title>CVHOUSE</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/product.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="/img/favicon.jpg">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php include('include/footer.php'); ?>