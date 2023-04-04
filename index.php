<?php include('include/header.php');

if (isset($_SESSION['email'])) {
  $custid = $_SESSION['id'];

  if (isset($_GET['cart_id'])) {
    $p_id = $_GET['cart_id'];

    $sel_cart = "SELECT * FROM cart WHERE cust_id = $custid and product_id = $p_id ";
    $run_cart    = mysqli_query($con, $sel_cart);

    if (mysqli_num_rows($run_cart) == 0) {
      $cart_query = "INSERT INTO `cart`(`cust_id`, `product_id`,quantity) VALUES ($custid,$p_id,1)";
      if (mysqli_query($con, $cart_query)) {
        header('location:index.php');
      }
    }
    if (mysqli_num_rows($run_cart) > 0) {
      while ($row = mysqli_fetch_array($run_cart)) {
        $exist_pro_id = $row['product_id'];
        if ($p_id == $exist_pro_id) {
          $error = "<script> alert('⚠️ Sản phẩm này đã có trong giỏ hàng của bạn  ');</script>";
        }
      }
    }
  }
} else if (!isset($_SESSION['email'])) {
  echo "<script> function a(){alert('⚠️ Cần đăng nhập để thêm sản phẩm này vào giỏ hàng');}</script>";
}
?>
<!--Carousel Wrapper-->
<div class="carousel slide" id="slider" data-ride="carousel">
  <!---Indicators-->
  <ol class="carousel-indicators">
    <li data-target="#slider" data-slide-to="0" class="active"></li>
    <li data-target="#slider" data-slide-to="1"></li>
    <li data-target="#slider" data-slide-to="2"></li>
  </ol>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/slide_05.jpg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="img/slide_01.jpg" class="d-block w-100">
    </div>
    <div class="carousel-item">
      <img src="img/slide_07.jpg" class="d-block w-100">
    </div>

    <!---Controlers-->
    <a class="carousel-control-prev" data-slide="prev" href="#slider">
      <span class="carousel-control-prev-icon"></span>
    </a>

    <a class="carousel-control-next" href="#slider" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>

  </div>

</div>
<!--/.Carousel Wrapper-->


<div class="background_gradient">

    <section>
      <div class="title1">
        <div class="text_title1"> Các sản phẩm </div> 
      </div>
    <div class="container" style="margin-top: 100px;">
      

      <!---Row 1-->
      <div class="row mt-5">
        <div class="col-md-4 product_homepage4 hover-effect">
          <img src="img/gachmen.jpg" class="product_img" width="100%" alt="bedset">
          <div class="mt-3">
            <h4 class="text-center producthomepage_title">Gạch men cao cấp</h4>
            <p class="text-center producthomepage_text">Chúng tôi giao dịch với Tất cả các loại bàn Phong cách Hiện đại Nó thể hiện đẳng cấp và phong cách đồng thời rất sang trọng và hiện đại trong thiết kế, được làm từ một loại gỗ nguyên khối bền.</p>
          </div>
        </div>
        <div class="col-md-4 product_homepage5 hover-effect">
          <img src="img/cua.jpg" class="product_img" width="100%" alt="bedset">
          <div class="mt-3">
            <h4 class="text-center producthomepage_title">Các loại cửa</h4>
            <p class="text-center producthomepage_text">Chúng tôi cung cấp Tất cả các loại Ghế sofa / Đi văng phong cách hiện đại, có thiết kế rất sang trọng và hiện đại, được làm từ gỗ nguyên khối bền.</p>
          </div>
        </div>

        <div class="col-md-4 product_homepage6 hover-effect">
          <img src="img/luoi.jpg" class="product_img" width="100%" alt="bedset">
          <div class="mt-3">
            <h4 class="text-center producthomepage_title">Lưới rào B40</h4>
            <p class="text-center producthomepage_text">Chúng tôi đối phó với Tất cả các loại tủ phong cách hiện đại, tủ tích hợp là không gian lưu trữ tạo thành một phần của thiết kế của căn phòng.</p>
          </div>
        </div>

      </div>
    <!-- Row2 -->
      <div class="row mt-5">
        <div class="col-md-4 product_homepage1 hover-effect">
          <img src="img/ximang.jpg" class="product_img" width="100%" alt="bedset">
          <div class="mt-3">
            <h4 class="text-center producthomepage_title">Xi măng tây đô</h4>
            <p class="text-center producthomepage_text">Chúng tôi cung cấp thiết kế bộ trải giường hiện đại được làm từ gỗ sản xuất với vân gỗ nguyên khối. Giá cả phải chăng với sản phẩm chất lượng cao..</p>
          </div>
        </div>
        <div class="col-md-4 product_homepage2 hover-effect">
          <img src="img/catxay.jpg" class="product_img" width="100%" alt="bedset">
          <div class="mt-3">
            <h4 class="text-center producthomepage_title">Cát vàng xây dựng</h4>
            <p class="text-center producthomepage_text">Chúng tôi đối phó với Bàn ăn Nó thể hiện đẳng cấp và phong cách và rất sang trọng và hiện đại trong thiết kế. Bàn ăn làm từ gỗ nguyên khối bền đẹp.</p>
          </div>
        </div>

        <div class="col-md-4 product_homepage3 hover-effect">
          <img src="img/daxay.jfif" class="product_img" width="100%" alt="bedset">
          <div class="mt-3">
            <h4 class="text-center producthomepage_title">Đá xây dựng</h4>
            <p class="text-center producthomepage_text">Chúng tôi đối phó với Tất cả Ghế tay Phong cách Hiện đại Nó thể hiện đẳng cấp và phong cách, đồng thời rất sang trọng và hiện đại trong thiết kế, được làm từ một loại gỗ cứng bền.</p>
          </div>
        </div>

      </div>
      <!---end-->


     

    </div>
  </section>
  <!--end deal with-->

  <section>
    <div class="container pt-5 pb-5">
      <div>
        <?php
        if (isset($msg)) {
          echo $msg;
        } else if (isset($error)) {
          echo $error;
        }
        ?>
      </div>

      <div class="title2">
        <span class="text_title2">Sản phẩm mới</span>
      </div>

      <div class="row mt-4">

        <?php
        $p_query = "SELECT * FROM furniture_product ORDER BY pid DESC LIMIT 4";
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

            <div class="col-md-3 mt-3 new_product1">
              <img src="img/<?php echo $img1; ?>" class="hover-effect" width="100%" height="190px">
              <div class="text-center mt-3">
                <h5 title="<?php echo $ptitle; ?>"><?php echo substr($ptitle, 0, 20); ?>...</h5>
                <h6><?php echo number_format($p_price); ?> VND</h6>
              </div>

              <div class="row">
                <div class="col-md-12 col-sm-12 col-12 text-center">

                  <a href="index.php?cart_id=<?php echo $pid; ?>" type="submit" onclick="a()" class="btn btn-primary btn-sm hover-effect" style="background-color: #7ac8d4;">
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
          echo "<h3 class='text-center'> No Product Available Yet </h3>";
        }

        ?>

      </div>
    </div>
  </section>


</div>



<!---How to Shop -->
    
<section class="background_howbuy pt-4">
    <div class="title3">
      <div class="text_title3"> Thiết kế mái ấm cho bạn  </div> 
    </div>
  <div class="container howbuy">
    <div class="row">

      <!--choose product card-->
      <div class="col-md-4 p-5">
        <div class="card hover-effect" id="border-less">
          <div class="card-body mt-3 text-center">
            <img class="designhouse" src="img/nhacap4.jpg">
            <!-- <i class="fal fa-phone-laptop fa-3x"></i> -->
            <div class="buttonttexthouse">
              <div class="texthouse">Nhà cấp 4</div>
            </div>
            <p class="textdetail mt-2">Mái nhà cấp 4 với chi phí và diện tích phù hợp với đôi vợ chồng trẻ, nhiều thiết kế đa dạng. </p>

          </div>
        </div>
      </div>
      <!---end choose product-->


      <!--cash on deliver-->
      <div class="col-md-4 p-5">
        <div class="card hover-effect" id="border-less">
          <div class="card-body mt-3 text-center">
          <img class="designhouse" src="img/nhacap42.jpg">
            <!-- <i class="fal fa-hand-holding-box fa-3x"></i> -->
            <div class="buttonttexthouse">
              <div class="texthouse">Nhà 2 mái</div>
            </div>
            <p class="textdetail mt-2">Mái nhà 2 mái với chi phí và diện tích tầm trung phù hợp với gia đình 4 đến 5 thành viên. </p>

          </div>
        </div>
      </div>
      <!---end cash on delivery-->


      <!--cash on deliver-->
      <div class="col-md-4 p-5">
        <div class="card hover-effect" id="border-less">
          <div class="card-body mt-3 text-center">
          <img class="designhouse" src="img/nhacap43.jpg">
            <!-- <i class="fal fa-wallet fa-3x"></i> -->
            <div class="buttonttexthouse">
              <div class="texthouse">Nhà dài</div>
            </div>
            <p class="textdetail mt-2">Được thiết kế theo phong cách phương tây sân vườn thoáng mát tạo sự hiện đại và gần gũi với thiên nhiên. </p>

          </div>
        </div>
      </div>
      <!---end cash on delivery-->

    </div>
  </div>

  <div class="backhowbuy">
    <img class="backhowbuy_1" src="img/backnhacaotang.png">
    <img class="backhowbuy_2" src="img/backnhacaotang2.png">
  </div>

  <!-- contact -->
  <div class="container_contact">
      <div class="box_contact1">
        <div class="title_contact">
          Đặt hàng như thế nào?
        </div>
        <!-- <a href="" class="icon_pay"><i class="fas fa-shopping-basket"></i></a> -->
        
        <div class="text_contact">
          Bạn cần đăng nhập chọn sản phẩm cần mua thêm vào giỏ hàng và tiến hành các bước thanh toán
        </div>
      </div>

      <div class="box_contact2">
        <div class="title_contact">
          Địa chỉ liên hệ
        </div>
        <div class="text_contact">
          Đường 3/2, phường Xuân Khánh, quận Ninh Kiều, TP-Cần Thơ
        </div>
      </div>

      <div class="box_contact1">
        <div class="title_contact">
          Kênh mạng xã hội của cửa hàng
        </div>
        <div class="text_contact">
          
        </div>
      </div>
  </div>
</section>
<!---end How to shop-->
<meta charset="UTF-8">
  <title>HOME DECOR</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/homepage.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="/img/favicon.jpg">
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php include('include/footer.php'); ?>