<?php 
session_start();
include 'koneksi.php';
?>


 <!DOCTYPE html>
<html lang="en">
  <head>
    <title>MAMI-J</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
   <body class="goto-here">
    <div class="py-1 bg-primary">
      <div class="container">
        <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
          <div class="col-lg-12 d-block">
            <div class="row d-flex">
              <div class="col-md pr-4 d-flex topper align-items-center">
                <div class="icon mr-2 d-flex justify-content-center align-items-center"></div>
                <span class="text">Welcome!<?php if (empty($_SESSION['user'])): ?>
      user
      <?php elseif (isset($_SESSION['user'])): ?>
        <strong> <h7><?php echo $_SESSION['user']['username']; ?></h7></strong> <!-- <a href="logout.php" class="btn-danger btn-md">Logout</a> -->
    <?php endif ?>
  </span>
              </div>
              <!-- <div class="col-md pr-4 d-flex topper align-items-center">
                <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
                <span class="text">mamij_polije@gmail.com</span>
              </div> -->
              <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right">
                <span class="text"></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
      <div class="container">
        <a class="navbar-brand" href="index.html">MAMI-J</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="oi oi-menu"></span> Menu
        </button>
   <div class="form-inline navbar-search">
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
      <input class="srchTxt" style="width:350px" type="text" name="q" placeholder="Mau Belanja Apa Hari ini?" value="<?php $q = isset($_REQUEST['q']) ? urldecode($_REQUEST['q']) : ''; echo $q ?>"/>
                                <?php
                                if ($q <> '')
                                {
                                ?>
                          
                                <?php
                                }
                                ?>
                                 <button type="submit" id="submit" class="btn btn-primary"><i class="icon-search"></i></button>

            </form>
      </div>
                                 <?php 
                                if (isset($_POST['cari'])) {
  $koneksi = mysql_connect("localhost","root","","db_mamij1");
  $cari = $_POST['cari'];
  $sql = "select * from produk where nama_produk like '%".$cari."%'";
  $result = mysql_query($sql);
  if (mysql_num_rows($result) > 0) {
  }else{
    while ($row = mysql_fetch_array($query)) {
      $nama_produk = $row['nama_produk'];
      $id_produk = $row['id_buku'];
    }
  }
}
  ?>

        <div class="collapse navbar-collapse" id="ftco-nav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
           <!--  <li class="nav-item active"><a href="login.php" class="nav-link">Masuk</a></li>
 -->
          <?php
          if (!isset($_SESSION["user"])) { ?>
             <li class="nav-item active"><a href="login/index.php" class="nav-link">Akun</a></li>
            <?php
          }else{ ?>
          
             <li class="nav-item active"><a href="riwayat.php" class="nav-link">Riwayat</a></li>
             <li class="nav-item active"><a href="logout.php" class="nav-link">Logout</a></li>
            <?php
          }
          ?>

            <!-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login</a> -->
              <!-- <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="shop.html">Shop</a>
                <a class="dropdown-item" href="wishlist.html">Wishlist</a>
                <a class="dropdown-item" href="product-single.html">Single Product</a>
                <a class="dropdown-item" href="cart.html">Cart</a>
                <a class="dropdown-item" href="checkout.html">Checkout</a>
              </div> -->
            <!-- </li> -->
            <!-- <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li> -->
            <!-- <li class="nav-item"><a href="cart.php" class="nav-link">Checkout</a></li> -->
            <li class="nav-item"><a href="about.php" class="nav-link">Tentang Kami</a></li>
            <li class="nav-item"><a href="contact.php" class="nav-link">Kontak</a></li>
            <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[<?php if (empty($_SESSION["cart"]) OR !isset($_SESSION["cart"])) {
          echo 0;

        }elseif (isset($_SESSION["cart"])) {
           echo count($_SESSION["cart"]);
        } 
        ?>]</a></li>

          </ul>
        </div>
      </div>
    </nav>
    <!-- END nav -->

    <section id="home-section" class="hero">
      <div class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url(images/bg_1.jpg);">
          <div class="overlay"></div>
          <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

              <div class="col-md-12 ftco-animate text-center">
                <h1 class="mb-2">SELAMAT DATANG DI WEBSITE MAMI-J</h1>
                <h2 class="subheading mb-4">MAKANAN &amp; MINUMAN POLIJE</h2>
                
              </div>

            </div>
          </div>
        </div>

        <div class="slider-item" style="background-image: url(images/bg_2.jpg);">
          <div class="overlay"></div>
          <div class="container">
            <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

              <div class="col-sm-12 ftco-animate text-center">
                <h1 class="mb-2">MAMI-J</h1>
                <h2 class="subheading mb-4">MAKANAN &amp; MINUMAN POLIJE</h2>

              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

    
    <section class="ftco-section">
      <div class="container">
        <div class="row no-gutters ftco-services">
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
                <span class="flaticon-shipped"></span>
              </div>
              <div class="media-body">
                 <h3 class="heading">Pembayaran COD</h3>
                <span>Hanya 5000 Tunggu di Rumah</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
                <span class="flaticon-diet"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Selalu Fresh</h3>
                <span>Dipetik langsung dari kebun</span>
              </div>
            </div>    
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
                <span class="flaticon-award"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Kualitas Terjamin</h3>
                <span>Produk Asli dari POLIJE</span>
              </div>
            </div>      
          </div>
          <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services mb-md-0 mb-4">
              <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
                <span class="flaticon-customer-service"></span>
              </div>
              <div class="media-body">
                <h3 class="heading">Support</h3>
                <span>Support By Politeknik Negeri Jember dan Bootstrap</span>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section>


    <!-- <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <span class="subheading"></span>
            <h2 class="mb-4">Semua Produk MAMI-J</h2>
          </div>
        </div>      
      </div> -->

       <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 mb-5 text-center">
                <ul class="product-category">
                       <!--   <li><a href="" class="active">All</a></li> 
                        <li><a href="kategorisayuran.php">Sayuran</a></li>
                        <li><a href="kategoribuah.php">Buah</a></li>
                        <li><a href="kategoriminuman.php">Minuman</a></li>
                        <li><a href="kategoriroti.php">Roti SIP</a></li>
                    </ul> --> 
                    <?php $ambil = $koneksi->query("SELECT * FROM kategori"); ?>
        <?php while($perproduk=$ambil->fetch_assoc()) { ?>
    
          <a class="active" href="yukbelanja.php?id=<?php echo $perproduk['id_kategori']; ?>" name="">
          <i class="icon-chevron-right"></i>
          <?php echo $perproduk['kategori']; ?>
          </a>
        <?php } ?>
                </div>
            </div>
  <div id="myTab" class="pull-right">
  
   </div>
<div class="tab-pane  active" id="blockView">
    <!-- <?php
                                include'koneksi.php';
                                if (empty($_GET["id"])) {
                                  $query = "SELECT COUNT(*) as total FROM produk WHERE nama_produk LIKE '%$q%' ORDER BY nama_produk";
                                 } elseif (isset($_GET["id"])) {
                                  $query = "SELECT COUNT(*) as total FROM produk WHERE id_kategori='$_GET[id]' LIKE '%$q%' ORDER BY nama_produk";
                                 }
                                
                                $result = mysqli_query($koneksi, $query);
                                while($row = mysqli_fetch_array($result)){
                                ?>

                                <p align="right">Total : <strong><?php echo $row['total'];?> </strong>data Produk</p>
                                <?php
                                }
                                ?> -->
                                <?php
                                //includekan fungsi paginasi
                                //silahkan di komen atau di hapus saja baris yang tidak ingin digunakan
                                // include 'pagination1.php';
                                //pagination config start
                                // $q = isset($_REQUEST['q']) ? urldecode($_REQUEST['q']) : ''; // untuk keyword pencarian
                                $page = isset($_GET['page']) ? intval($_GET['page']) : 1; // untuk nomor halaman
                                $adjacents = isset($_GET['adjacents']) ? intval($_GET['adjacents']) : 3; // khusus style pagination 2 dan 3
                                $rpp = 12; // jumlah record per halaman
                                if (empty($_GET["id"])) {
                                  $sql = "SELECT * FROM produk WHERE nama_produk LIKE '%$q%' ORDER BY nama_produk";
                                 } elseif (isset($_GET["id"])) {

                                  $sql = "SELECT * FROM produk WHERE id_kategori='$_GET[id]' ORDER BY nama_produk";
                                 } 

                               // query silahkan disesuaikan
                                $result = mysqli_query($koneksi, $sql); // eksekusi query
                                $tcount = mysqli_num_rows($result); // jumlah total baris
                                $tpages = isset($tcount) ? ceil($tcount / $rpp) : 4; // jumlah total halaman
                                $count = 0; // untuk paginasi
                                $i = ($page - 1) * $rpp; // batas paginasi
                                $no_urut = ($page - 1) * $rpp; // nomor urut
                                $reload = $_SERVER['PHP_SELF'] . "?q=" . $q . "&amp;adjacents=" . $adjacents; // untuk link ke halaman lain
                                //pagination config end

                                
    ?>
    <div class="row">                            
    <ul class="thumbnails">
      <?php 
      while (($count < $rpp) && ($i<$tcount)) {
        
      mysqli_data_seek($result, $i);
        $perproduk = mysqli_fetch_array($result);
       ?>





         
       
    <div class="row"> 
    <div class="col-xs-100 col-sm-1">   
    <div  id="hover-cap-100col">
      <div class="thumbnail">
            <div class="product ">
              <div class="item active">
              <img style="margin-bottom: 20px;" src="baradmin/foto_produk/<?= $perproduk['foto_produk'] ?>" width="250">
               <div class="bottom-area center-block d-flex px-5">
                <h5   ><?php echo $perproduk['nama_produk']; ?></h5> </div>
              <div class="bottom-area center-block d-flex px-5">
                <div class="d-flex">
                  <div class="pricing">
                    <p class="price"><span class="mr-5price-dc"></span><span class="price-sale">Rp.<?php echo number_format($perproduk['harga_produk']); ?></span></p>
                  </div>
                </div>
              </div>
                <div class="bottom-area center-block d-flex px-5">
                  <h4 style="text-align:center;"><a class="btn btn-primary text-center" href="produk_detail.php?id=<?php echo $perproduk["id_produk"]; ?>"> Detail </a>
                  </h4>
               </div>
           </div>  
         </div>
                  </div>
                </div>
              </div>
            </div>
        </ul>
        </li>
      <?php $i++ ?>
                  <?php $count++ ?>
      <?php } ?>

      </ul>


  <hr class="soft"/>
  </div>
</div> 

<br>
<br>
<br>


     <?php
    include "pages/footer.php"; 
    ?>

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>


