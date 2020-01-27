<?php 
session_start();

include 'koneksi.php';

if (!isset($_SESSION["user"]) OR empty($_SESSION["user"])) 
{
  echo "<script>alert('Silahkan login'); </script>";
    echo "<script>location='login.php';</script>";
    exit();
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
      <input class="srchTxt" style="width:350px" type="text" disabled="disabled" name="q" placeholder="Mau Belanja Apa Hari ini?" value="<?php $cari = isset($_REQUEST['cari']) ? urldecode($_REQUEST['cari']) : ''; echo $cari ?>"/>
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

    <!-- END nav -->
    <!-- END nav -->


<div id="mainBody">
<div class="container">
  <hr class="soften">
  <h1>NOTA</h1>
  <hr class="soften"/>  
  <div class="row">
    <div class="span12">
      <section class="konten">
        <div class="container">
          <h2> Detail pembelian</h2>

<?php
$ambil = $koneksi -> query("SELECT * FROM pembelian JOIN user ON pembelian.id_user=user.id_user WHERE pembelian.id_pembelian='$_GET[id]'"); 

$detail=$ambil->fetch_assoc();
  ?>

<!-- jika pelanggan yang beli tidak sama dengan pelanggan yang login,maka akan dilarikan ke riwayat.php.karena dia tidak berhak melihat nota orang laen-->

 <?php 
//mendapatkan id_pelanggan yang beli
$idpelangganygbeli = $detail["id_user"];
$idpelangganyglogin = $_SESSION["user"]["id_user"];

if ($idpelangganygbeli!== $idpelangganyglogin) {
  echo "<script>alert('anda salah masuk');</script>";
  echo "<script>location='riwayat.php';</script>";
}

 ?>


<div class="container">
  <div class="row">
  <div class="span4" style="margin-left: 100px;">
    <h3>Pembelian</h3>
    <strong>No.pembelian&nbsp;: <?php echo $detail['id_pembelian'] ?></strong><br>
    Tanggal Pesan&nbsp;&nbsp;: <?php echo $detail['tanggal_beli'] ?><br>
   <!--  Tanggal Kirim&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $detail['tanggal_kirim'] ?><br> -->
  </div>

  <div class="span4" style="margin-left: 100px;">
    <h3>Pelanggan</h3>
    <strong>Atas nama&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $detail['username'] ?></strong> <br>
    No. Telepon&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $detail['nomor'] ?> <br>
    Alamat pengiriman : <?php echo $detail['alamat']; ?>
  </div>

  <div class="span4" style="margin-left: 100px;">
    <h3>Pengiriman</h3>
    <strong>Asal Kota&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $detail['nama_kota'] ?></strong><br>
    Ongkos Kirim&nbsp;: Rp. <?php echo number_format($detail['tarif']) ?><br>
    Total Tagihan&nbsp;&nbsp;: Rp. <?php echo number_format($detail['total']) ?><br>

</div>
</div>
</div>
<br>
<hr>

<table class="table table-bordered">
  <thead>
    <tr>
      <th> No </th>
      <th> nama produk</th>
      <th> harga</th>
      <th> jumlah</th>
      <th> subtotal </th>
    </tr>
  </thead>
  <tbody>
<?php $nomor=1; ?>
<?php $totalbelanja=0; ?>
<?php $ambil=$koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>

<?php $row = mysqli_num_rows($ambil); ?>
    <?php while($pecah=$ambil->fetch_assoc()){ ?> 
     <!--  <?php $subharga=$pecah['subharga']+$row['subharga']; ?> -->
    <tr>
      <td><?php echo $nomor;  ?></td>
      <td><?php echo $pecah['nama_produk'];  ?></td>
      <td>Rp. <?php echo number_format($pecah['harga_produk']); ?></td>
      <td><?php echo $pecah['jumlah'];  ?></td>
      <td>
        <?php $total = $pecah['harga_produk']*$pecah['jumlah']?>
        Rp. <?php echo number_format($total); ?>
      </td>
    </tr>
    <?php $totalbelanja+=$subharga; ?>
    <?php $nomor++; ?>
  <?php } ?>
  </tbody>
  <tfoot>
    <tr>  
                     <td colspan="4"> Tarif Ongkir</td>
                     <td>Rp. <?php echo number_format($detail['tarif']) ?> (<?php echo $detail['nama_kota']; ?>)</td>
                     
               </tr>
               <tr>
                <th colspan="4"> Total Belanja</th>
                <th> Rp. <?php echo number_format($detail['total'])?></th></tr>
  </tfoot>
</table>
  <div class="container">
    <div class="col-md-10">
      <div class="alert alert-info" style="height: 170px">
        <p>
          <ul>
            <li>Silahkan menunggu konfirmasi dari admin. Apabila anda telah disetujui oleh admin anda sudah bisa melakukan pembayaran dengan mengklik tombol pembayaran.</li>
            <li>Tombol pembayaran akan muncul ketika status anda "disetujui"</li>
            <li>Silahkan mengklik opsi "Riwayat" </li>

          </ul>
          <br>
           
        </p>
        
      </div>
    </div>
  </div>
  
  
    
    <!--<h4>Email Us</h4>
    <form class="form-horizontal">
        <fieldset>
          <div class="control-group">
           
              <input type="text" placeholder="name" class="input-xlarge"/>
           
          </div>
       <div class="control-group">
           
              <input type="text" placeholder="email" class="input-xlarge"/>
           
          </div>
       <div class="control-group">
           
              <input type="text" placeholder="subject" class="input-xlarge"/>
          
          </div>
          <div class="control-group">
              <textarea rows="3" id="textarea" class="input-xlarge"></textarea>
           
          </div>

            <button class="btn btn-large" type="submit">Send Messages</button>

        </fieldset>
      </form>
    </div> -->
  </div>
  <div class="row">
  
  </div>
</div>
</div>


<span id="themesBtn"></span>

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