<?php 

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

<!--  <?php 
//mendapatkan id_pelanggan yang beli
$idpelangganygbeli = $detail["id_user"];
$idpelangganyglogin = $_SESSION["user"]["id_user"];

if ($idpelangganygbeli!== $idpelangganyglogin) {
  echo "<script>alert('anda salah masuk');</script>";
  echo "<script>location='riwayat.php';</script>";
}

 ?>
 -->

<div class="container">
  <div class="row">
  <div class="span4" style="margin-left: 100px;">
    <h3>Pembelian</h3>
    <strong>No.pembelian&nbsp;: <?php echo $detail['id_pembelian'] ?></strong><br>
    Tanggal Pesan&nbsp;&nbsp;: <?php echo $detail['tanggal_beli'] ?><br>
    Tanggal Kirim&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $detail['tanggal_kirim'] ?><br>
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
