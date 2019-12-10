<?php 
//koneksi ke database
session_start();
$koneksi = new mysqli("localhost","root","","db_mamij");
//=====================//

// if (!isset($_SESSION['admin'])) 
// {
//     echo "<script>alert('Anda harus login');</script>";
//     echo "<script>location='login.php';</script>";
//     header('location:login.php');
//     exit();
// }


?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Area</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="images/iconkecil.png">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
   
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

   

</head>
<body>


    <!-- Menu Kiri -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                
                <a class="navbar-brand" href="./">Admin Roti SIP</a>
                <a class="navbar-brand hidden" href="./"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"> <i class="glyphicon glyphicon-home"></i> Home</a>
                    </li>
                    <h3 class="menu-title">Fitur</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Admin Area</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="glyphicon glyphicon-home"></i><a href="index.php">Home</a></li>
                            <li><i class="glyphicon glyphicon-picture"></i><a href="index.php?halaman=produk">Produk</a></li>
                            <li><i class="glyphicon glyphicon-shopping-cart"></i><a href="index.php?halaman=pembelian">Pembelian</a></li>
                            <li><i class="glyphicon glyphicon-user"></i><a href="index.php?halaman=pelanggan">Pelanggan</a></li>
                            <li><i class="fa fa-share-square-o"></i><a href="index.php?halaman=logout">Logout</a></li>
                            
                        </ul>
                    </li>
                    </div><!-- /.navbar-collapse -->
                </nav>
            </aside><!-- /#left-panel -->

            <!-- Left Panel -->

            <!-- Right Panel -->

            <div id="right-panel" class="right-panel">

                <!-- Header-->
                <header id="header" class="header">

                    <div class="header-menu">

                        <div class="col-sm-7">
                            <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                            <div class="header-left">
                                <button class="search-trigger"><i class="fa fa-search"></i></button>
                                <div class="form-inline">
                                    <form class="search-form">
                                        <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                                    </form>
                                </div>

                                <div class="dropdown for-notification">
                                  <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bell"></i>
                                  
                                </button>

                            </div>

                            <div class="dropdown for-message">
                              <button class="btn btn-secondary dropdown-toggle" type="button"
                              id="message"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="ti-email"></i>
                            
                          </button>
                          
                      </div>
                  </div>
              </div>

              <div class="col-sm-5">
                



            </div>
        </div>

    </header><!-- /header -->
    <!-- Header-->



    <div class="breadcrumbs">
        <div class="col-sm-12">

            <?php 
            if (isset($_GET['halaman']))
            {
                if ($_GET['halaman']=="produk")
                {
                    include 'produk.php';
                }
                elseif ($_GET['halaman']=="pembelian")
                {
                    include 'pembelian.php';
                }
                elseif ($_GET['halaman']=="pelanggan") 
                {
                    include 'pelanggan.php';
                }
                elseif ($_GET['halaman']=="detail")
                {
                    include 'detail.php';
                }
                elseif ($_GET['halaman']=="tambahproduk")
                {
                    include 'tambahproduk.php';
                }
                elseif ($_GET['halaman']=="hapusproduk")
                {
                    include 'hapusproduk.php';
                }
                elseif ($_GET['halaman']=="ubahproduk")
                {
                    include 'ubahproduk.php';
                }
                elseif ($_GET['halaman']=="logout")
                {
                    include 'logout.php';
                }
                elseif ($_GET['halaman']=="hapuspelanggan")
                {
                    include 'hapuspelanggan.php';
                }
                elseif ($_GET['halaman']=="ubahpelanggan")
                {
                    include 'ubahpelanggan.php';
                }
                elseif ($_GET['halaman']=="tambahpelanggan")
                {
                    include 'tambahpelanggan.php';
                }
            }
            else
            {
                include'home.php';
            }
            ?>
        </div>
<br><br><br><br>

        <hr>
        <strong><i class="glyphicon glyphicon-triangle-left"></i> Menu fitur admin ada di samping</strong>
        <hr>
    </div>














    <!-- Right Panel -->

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>


</body>
</html>


