<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>ADMIN MAMI-J</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>
<?php
    include "pages/header.php"; 
    ?>
    <?php
    include "pages/sidebar.php"; 
    ?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Ubah Produk</h2>
                                 
                                 </div>
                             </div>
                         </div>


<?php 
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN user ON pembelian.id_user=user.id_user join status on pembelian.id_status=status.id_status WHERE id_pembelian='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>

 <form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Id Pembelian</label>
        <input type="text" name="id_pem" class="form-control" value="<?php echo $pecah['id_pembelian']; ?>">
    </div>
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama" value="<?php echo $pecah['username']; ?>">
    </div>
    <div class="form-group">
        <label>Status</label>
        <select type="text" class="form-control" name="status">
            <?php
                        $ambil = $koneksi->query ("SELECT * FROM status");
                        while ($data = mysqli_fetch_array($ambil)) { ?>
                            <option value="<?php echo $data['id_status'];?>">
                                <?php echo $data['status'];?>
                            </option>
                        <?php } ?>
                </select>
        </select>
        <br>
    <div class="form-group">
        <label>Keteragan</label>
        <textarea name=ket class="form-control" rows="10">
            <?php echo $pecah['ket']; ?>
        </textarea>
    </div>
    <button class="btn btn-primary" name="ubah">Ubah</button>
 </form>

 <?php 
if (isset($_POST['ubah'])) 
{
  
        $koneksi->query("UPDATE pembelian SET id_status='$_POST[status]',ket='$_POST[ket]' WHERE id_pembelian='$_GET[id]'");

    echo "<script>alert('Data status telah diubah');</script>";
echo "<script>location='status.php';</script>";

}

  ?>


                                </div>
                            </div>
                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2019 Rizky Nurwinda and Bootstrap</a>.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
