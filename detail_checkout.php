<?php 
session_start();

include 'koneksi.php'; 
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
  <div class="container">
    <table>
      <th><div class="span4"></div>
        <div class="span4">
        <div class="panel-heading">
          <h3 class="panel-ttitle"> DETAIL PEMBELIAN</h3>
        </div>
        <br>
        <div class="panel-body">
          <?php 
          $id_user = $_SESSION['user']['id_user'];
          $ambil = $koneksi->query("SELECT * FROM user WHERE id_user = '$id_user'"); 
          $detail=$ambil->fetch_assoc();
           ?>
          <form method="post" >
            <div class="form-group">
              <label><b><h5>Nama</h5></b></label>
              <input type="text" class="form-control" name="nama" readonly value="<?php echo $_SESSION["user"]['username']?>" >
            </div>
            <div class="form-group">
              <label><b><h5>email</h5></b></label>
               <input type="text" class="form-control" name="email" readonly value="<?php echo $_SESSION["user"]['email']?>" >
            </div>
             <div class="form-group">
              <label><b><h5>Detail Alamat</h5></b></label>
              <input type="text" class="form-control" name="nama" readonly value="" >
            </div>
            <div class="form-group">
              <label><b><h5>Ongkos Kirim</h5></b></label>
               <input type="text" class="form-control" name="email" readonly value=" langsung ditambahkan di Total Belnja Sebesar Rp. 5000,00" >
            </div>
            <button class="btn btn-primary" name="save">SAVE</button>
          </form>
          <?php 
          if (isset($_POST['save'])) {
            

            $ambil =$koneksi->query("UPDATE user SET email_customer='$_POST[email]',password_customer='$_POST[pass]', nama='$_POST[nama]',telepon='$_POST[telepon]',alamat='$_POST[alamat]' WHERE id_customer='$id'");
          echo "<div class='alert alert-info'>Data tersimpan</div>";
          echo "<meta http-equiv='refresh' content='1;url=akun.php'>";
          }
          
          

           ?>
        </div>
      </div>
        <div class="span4" id="maincol">
      <div class="panel-panel-default">
      </div>
    </div>
  </div>
  </th>
    </table>
    
  </div>
</div>
	  