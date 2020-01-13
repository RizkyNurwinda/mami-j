<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>

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
<body>
  <?php
    include "pages/header.php"; 
    ?>
    <?php
    include "pages/sidebar.php"; 
    ?>

</body>


<div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                  <div class="overview-wrap">
                                     <h2 class="title-1">Detail Pembelian</h2>
                                
                              </div>
                </div>
            </div>
            <hr>
<?php
$id_pembelian = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM pembelian JOIN user ON pembelian.id_user=user.id_user WHERE pembelian.id_pembelian='$_GET[id]'"); 
$detail=$ambil->fetch_assoc();
  ?>
  

<!-- echo "<pre>";
      print_r($ambill);
      echo "</pre>"; -->
<div class="row">
  <div class="col-md-6">
<table class="table">

      <tr>
        <th>Nama</th>
        <td><?php echo $detail['username']; ?></td>
      </tr>
      <?php 
      $ambil = $koneksi->query("SELECT * FROM pembelian join status on pembelian.id_status=status.id_status join ongkir on pembelian.id_ongkir=ongkir.id_ongkir WHERE id_pembelian='$id_pembelian'");
      $ambill = $ambil->fetch_assoc();
      
      
      ?>
      <tr><th>Tanggal Pesan</th>
        <td><?php echo $ambill['tanggal_beli']; ?></td>
      </tr>
      <tr><th>Tanggal Kirim</th>
        <td><?php echo $ambill['tanggal_kirim']; ?></td>
      </tr>
      <form method="post">
        <tr><th>Status</th>
        <td><strong>
     <select class="form-control" name="status" ><?php
                    $ambila = $koneksi->query("SELECT * FROM status") or die (mysqli_error());
                    while($ambilll = $ambila->fetch_assoc()) {
                      ?>
      <option value="<?php echo $ambilll['id_status'] ?>" <?php if($ambill['status'] == $ambilll['id_status']){ echo 'selected'; } ?>><?php echo $ambilll['status'];?></option>
  <?php }?>
     </select>
    
        </strong><br>
        <div style="float: right;">
          <input type="submit" class="btn btn-success btn-sm" name="update" value="UPDATE">
          <!-- <h7>UPDATE</h7>
          </button> -->
        </div>
      </form>

        
<?php
if(isset($_POST['update'])){
  $statusnya=$_POST['status'];
  $query_update=mysqli_query($koneksi,"UPDATE pembelian SET id_status='$statusnya' WHERE id_pembelian='$id_pembelian'");
  echo '<script>window.location="pembelian.php"</script>';
  // echo $statusnya;
  // echo'berhasil ubah';
}
?>


      </td>
      </tr>
      <tr><th>Telepon</th>
        <td><?php echo $detail['nomor']; ?></td>
      </tr>
      <tr><th>Alamat</th>
        <td><?php echo $detail['alamat']; ?></td>
      </tr>
      <tr><th>Tarif Ongkir</th>
        <td>Rp. <?php echo number_format($ambill['tarif']); ?></td>
      </tr>
    </table>  
</p></div>

  <div class="col-md-6">
    

  </div>
  
</div>
<br>
<br>
<hr>

<h3> <strong>Data Pembelian Produk</strong></h3>
<br>
<!-- <a href="bukti.php">Versi Cetak</a> -->
<br>
<br>
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

  