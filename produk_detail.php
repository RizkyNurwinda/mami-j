<?php session_start(); ?>
<?php include 'koneksi.php'; ?>
<?php 
$id_produk = $_GET["id"];

$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");

$detail = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detail);
// echo "</pre>";

?>
<!DOCTYPE html>
<html>
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
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">+6285600000000</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">mamij_polije@gmail.com</span>
					    </div>
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
		<!-- <div class="form-inline navbar-search">
			<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
			<input class="srchTxt" style=" " type="text" name="q" placeholder="Mau Belanja Apa Hari ini?" value="<?php $q = isset($_REQUEST['q']) ? urldecode($_REQUEST['q']) : ''; echo $q ?>"/>
                                <?php
                                if ($q <> '')
                                {
                                ?>
                                <a href="<?php echo $_SERVER['PHP_SELF'] ?>"><span class="btn btn-medium btn-default"><i class="icon-refresh"></i></span></a>
                                <?php
                                }
                                ?>
                                 <button type="submit" id="submit" class="btn btn-primary">Search!</button>
                                 <a href="kategorisayuran.php"></a> 
		 
    </form>
      
   </div> -->

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item active"><a href="login/index.php" class="nav-link">Login</a></li>
	          	

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
	          <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
	          <!-- <li class="nav-item"><a href="cart.php" class="nav-link">Checkout</a></li> -->
	          <li class="nav-item"><a href="about.php" class="nav-link">About Me</a></li>
	          <li class="nav-item"><a href="login.php" class="nav-link">Akun</a></li>
	          <li class="nav-item cta cta-colored"><a href="cart.php" class="nav-link"><span class="icon-shopping_cart"></span>[0]</a></li>

	        </ul>
	      </div>
	    </div>
	  </nav>
	  <div class="container-fluid">
    <div class="row">
    		<div class="hero-unit" style="margin-left: 100px;">	  
			<!-- <div class="span6"> -->
				 <img src="rotisip/foto_produk/<?= $detail['foto_produk'] ?>" class="img-responsive" width="300">
			</div>

			

			<div class="span3">
				<div class="hero-unit" style="margin-left: 10px;">
				<h3><?php echo $detail["nama_produk"] ?>  </h3>
				<h4>Rp. <?php echo number_format($detail["harga_produk"]); ?></h4>
					
				
				<form method="post">
				<div class="form-group">
					<div class="input-group">
						<input type="number" min="1" class="form-control" placeholder="Masukkan jumlah item " name="jumlah">
						</div> 
						<br>
						<div class="input-group-btn">
							<button class="btn btn-primary" name="beli">Beli</button>
						</div>
					</div>
				</div>
				</form>
				<?php 
				if (isset($_POST["beli"])) 
				{
					
					$jumlah	= $_POST["jumlah"];
					if (empty($jumlah)) {
						$jumlah=1;
					}



				$_SESSION["cart"]["$id_produk"] = $_SESSION["cart"]["$id_produk"] +$jumlah;
				
				echo "<script>alert('produk sudah masuk dikeranjang');</script>";
				echo "<script>location='cart.php'</script>";
				}

				 ?>
			</div>

			<<!-- div class="span3" >
				<h5>Deskripsi</h5>
				<hr class="soft clr"/>
				
				<p><?php echo $detail["deskripsi"];?></p>
				
			</div>
				  <div class="row"></div> -->
		
				
		

	</div>
	<div class="row" style="height: 85px;"></div>
</div>
</div>


<br>
<br>
<br>
<br>
<br><br><br><br>

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