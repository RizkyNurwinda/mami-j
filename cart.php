<?php 
session_start();

 
include 'koneksi.php';

if (empty($_SESSION["cart"]) OR !isset($_SESSION["cart"])) 
{
	echo "<script>alert('keranjang kosong, silahkan belanja dulu');</script>";
	echo "<script>location='index.php';</script>";
}

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
      <input class="srchTxt" style="width:350px" disabled="disabled" type="text" name="q" placeholder="Mau Belanja Apa Hari ini?" value="<?php $cari = isset($_REQUEST['cari']) ? urldecode($_REQUEST['cari']) : ''; echo $cari ?>"/>
                                <?php
                                if ($cari <> '')
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
  $cari = $_POST['cari'];
  $sql = "select * from produk where nama_produk like '%".$cari."%'";
  $result = mysql_query($sql);
  if (mysql_num_rows($result) > 0) {
  }else{
    while ($row = mysql_fetch_array($sql)) {
      $nama_produk = $row['nama_produk'];
      $id_produk = $row['id_produk'];
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

         <div class="hero-wrap hero-bread" style="background-image: url('images/bg_1.jpg');">
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Checkout</span></p>
            <h1 class="mb-0 bread">KERANJANG BELANJAAN  </h1>
          </div>
        </div>
      </div>
    </div>
     
    </section>


    <div class="span9" align="center">
	<!-- <h3>  KERANJANG BELANJAAN  <small> </small> -->
    <a href="special_offer.php" class="btn btn-large pull-right"> <!-- <i class="icon-arrow-left"> --></i>  </a></h3>	
	<hr class="soft"/>
			
			
	<table class="table table-bordered">
              <thead>
             	<tr>
			<th>No</th>
			<th>Poduk</th>
			<th>harga</th>
			<th>Jumlah</th>
			<th>subtotal</th>
			<th> Aksi</th>
		</tr>
	</thead>
	<tbody>
		
		<?php $nomor=1; ?>
		<?php foreach ($_SESSION["cart"] as $id_produk=> $jumlah): ?>
		<?php 
		$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
		$pecah = $ambil->fetch_assoc();
		$total = $pecah["harga_produk"]*$jumlah;

	
				?>

		<tr style="height: 50px">
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah["nama_produk"]; ?></td>
			<td><?php echo number_format($pecah["harga_produk"]);  ?></td>
			<td><?php echo $jumlah;?></td>
			<td><?php echo number_format($total);  ?></td>
			<td>
				<a href="hapuskeranjang.php?id=<?php echo 
				$id_produk ?>" class="btn btn-danger btn-xs"> hapus </a>
			</td>

		 <?php $nomor++; ?>
         <?php endforeach ?>
         
		
		</tr>
        
                
				</tbody>
            </table>
            <a href="yukbelanja.php" class="btn btn-primary"><i class="icon-arrow-left"></i> Lanjutkan belanja</a>
	<a href="checkout.php" class="btn btn-primary pull-right">Checkout <i class="icon-arrow-right"></i></a>
				  </div>			  
			  </td>
			  </tr>
            </table>
	
</div>
</div>
</div>
</div>
</small>
</h3>
</div>
<hr>


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