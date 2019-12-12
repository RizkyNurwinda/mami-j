<?php 
session_start();

include 'koneksi.php'; 
// if (!isset($_SESSION["user"])) 
// {
// 	echo "<script>alert('Silahkan login');</script>";
// 	echo "<script>location='login/index.php';</script>";
// }
// if (empty($_SESSION["cart"]) OR !isset($_SESSION["cart"])) 
// {
// 	echo "<script>alert('keranjang kosong, silahkan belanja dulu');</script>";
// 	echo "<script>location='shop.php';</script>";
// }
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
		<div class="form-inline navbar-search">
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
      
   </div>
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
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
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

	<div id="mainBody">
  <section class="konten">
  <div class="container">	
	<hr class="soft"/>
	<div class="span2" align="center">
	<h1> Checkout</h1>
	<hr class="soft"/>
	<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>produk</th>
					<th>harga</th>
					<th>jumlah</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor=1;  ?>
				<?php $totalbelanja =0;  ?>
				<?php foreach ($_SESSION["cart"] as $id_produk => $jumlah): ?>
					<?php
					$ambil = $koneksi->query("SELECT *FROM produk WHERE id_produk='$id_produk'");
					$pecah = $ambil->fetch_assoc();
					$total = $pecah["harga_produk"]*$jumlah;


					  ?>
					  <tr>
					  	<td><?php echo $nomor; ?></td>
					  	<td><?php echo $pecah["nama_produk"]; ?></td>
					  	<td>Rp. <?php echo number_format($pecah["harga_produk"]); ?></td>
					  	<td><?php echo $jumlah?></td>
					  	<td>Rp. <?php echo number_format($total);?></td>

					  </tr>
						<?php $nomor++; ?>
					<?php $totalbelanja+=$total; ?>
					<?php endforeach  ?>				
			</tbody>
			<tfoot><tr>
				<th colspan="4"> Total Belanja</th>
				<th>Rp. <?php echo number_format($totalbelanja) ?></th>
			</tr>
			</tfoot>

		</table>
     <form method="post">
       <!--  <div class="row">
                <div class="span3" align="center">
                  <label>Nama</label>
                  <div class="form-group">
                <input type="text" readonly value="<?php echo $_SESSION["user"]['usernama']?>" class="form-control">    
              </div> -->

        <div class="span2" align="center">
                  <label>Total belanja langsung ditambahkan dengan Ongkir, Rp. 5000</label>
                </div>

	            	<a href="selesai.php"></a><button class="btn btn-primary" name="next">Next</button>
             </form> 
            	<?php 
            	if (isset($_POST["checkout"])) 
            	{
            		$id_user = $_SESSION["user"]["id_user"];
            		$tanggal_beli = date("Y-m-d");
            		$tanggal_kirim = $_POST['tanggal_kirim'];
            		$alamat = $_POST['alamat'];


            		$ambil=$koneksi->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
            		$arrayongkir = $ambil->fetch_assoc();
            		$namakota = $arrayongkir['tempat_kiriman'];
            		$tarif = $arrayongkir['tarif'];
            		$total_pembelian = $totalbelanja+$tarif;


           			$koneksi->query("INSERT INTO pembelian(id_user,tanggal_beli,tanggal_kirim,total, nama_terima,alamat) VALUES ('$id_user','$tanggal_beli','$tanggal_kirim','$total','$nama_terima, '$alamat')");

            		$id_pembelian_barusan = $koneksi->insert_id;
            		foreach ($_SESSION["cart"] as $id_produk => $jumlah)
            		 	{
            		 		$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
            		 		$perproduk = $ambil->fetch_assoc();

            		 		$nama = $perproduk['nama_produk'];
            		 		$harga = $perproduk['harga'];
            		 		$total = $perproduk['total']*$jumlah;
                    $jumlah =$perproduk ['jumlah'];
                    $tarif = $arrayongkir['tarif'];
                    $total_pembelian = $totalbelanja+$tarif;

            			$koneksi->query("INSERT INTO pembelian_produk(id_pembelian_produk,id_produk,id_pembelian, nama_produk,jumlah,harga,total) VALUES ('$id_pembelian_produk','$id_produk','$id_pembelian',$nama_produk','$jumlah','$harga','$total')");
            		}
            		//mengkosongkan keranjang
            		unset($_SESSION["cart"]);

            		echo "<script>alert('pembelian sukses');</script>";
            		echo "<script>location='nota.php?id=$id_pembelian_barusan';</script>";
            	}
      			?>

				  </div>
        </div>
				</section><br> 
      </div>
				<br>
				<br>

			</body>
			</html>


				<!-- <?php
    include "pages/footer.php"; 
    ?> -->

  <!-- loader -->
  <!-- <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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
</html> -->
            


	
	