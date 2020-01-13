<?php ob_start(); ?>
<html>
<head>
  <title>Cetak PDF</title>
  <style>
    table {
      border-collapse:collapse;
      table-layout:fixed;width: 630px;
    }
    table td {
      word-wrap:break-word;
      width: 20%;
    }

    
  </style>
  <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link rel="stylesheet" href="plugin/jquery-ui/jquery-ui.min.css" /> <!-- Load file css jquery-ui -->
    <script src="js/jquery.min.js"></script> <!-- Load file jquery -->
</head>
<body>
  <?php
  // Load file koneksi.php
  include "koneksi.php";

  if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter
    $filter = $_GET['filter']; // Ambil data filder yang dipilih user

    if($filter == '1'){ // Jika filter nya 1 (per tanggal)
      $tgl = date('d-m-y', strtotime($_GET['tanggal']));

      echo '<h1><b>Data Transaksi Tanggal '.$tgl.'</b></h1><br /><br />';

      $query = "SELECT * FROM pembelian  JOIN user ON pembelian.id_user=user.id_user Join pembelian_produk on pembelian.id_pembelian=pembelian_produk.id_pembelian WHERE DATE(tanggal_kirim)='".$_GET['tanggal']."'"; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
    }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
      $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

      echo '<b>Data Transaksi Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</b><br /><br />';

      $query = "SELECT * FROM pembelian  JOIN user ON pembelian.id_user=user.id_user Join pembelian_produk on pembelian.id_pembelian=pembelian_produk.id_pembelian WHERE MONTH(tanggal_kirim)='".$_GET['bulan']."' AND YEAR(tanggal_kirim)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
    }else{ // Jika filter nya 3 (per tahun)
      echo '<b>Data Transaksi Tahun '.$_GET['tahun'].'</b><br /><br />';

      $query = "SELECT * FROM pembelian JOIN user ON pembelian.id_user=user.id_user Join pembelian_produk on pembelian.id_pembelian=pembelian_produk.id_pembelian WHERE YEAR(tanggal_kirim)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
    }
  }else{ // Jika user tidak memilih filter
    echo '<b>Semua Data Transaksi</b><br /><br />';

    $query = "SELECT * FROM pembelian  JOIN user ON pembelian.id_user=user.id_user Join pembelian_produk on pembelian.id_pembelian=pembelian_produk.id_pembelian ORDER BY tanggal_kirim"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
  }
  ?>
  <table border="1" cellpadding="3" > 
         <thead>  
               <tr>  
               
                  <th>No</th>
                   <th>Nama Produk</th>
                  <th>Tanggal Kirim</th>
                  <th>Nama</th>
                   <th>Banyak Produk</th> 
                  <th>Tagihan</th> 
               </tr>
         </thead>
         <tbody>  
               <?php
               $totalbelanja=0;
                  $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
                  $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

                  if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)

                     while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                          $tgl1 = date('d-m-Y', strtotime($data['tanggal_beli']));
                           $tgl = date('d-m-Y', strtotime($data['tanggal_kirim'])); // Ubah format tanggal jadi dd-mm-yyyy
                           $subharga=$data['total']+$row['total'];
                           echo "<tr>";
                           echo "<td>".$data['id_pembelian']."</td>";
                           echo "<td>".$tgl."</td>";
                             echo "<td>".$tgl1."</td>";
                              echo "<td>".$data['username']."</td>";
                      
                            echo "<td>".$data['jumlah']."</td>";
                           echo "<td>".$data['total']."</td>";
                           echo "</tr>";
                           $totalbelanja+=$subharga;
                     }
           
                     }else{ // Jika data tidak ada
                     echo "<tr><td colspan='5'>Data tidak ada</td></tr>";
                     }
                  ?>
         </tbody>
         <tfoot>  
               <tr>  
                     <th colspan="5"> total belanja</th>
                     <th>Rp. <?php echo number_format($totalbelanja) ?> </th>
               </tr>
         </tfoot>
       </table> 
</body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();

require_once('plugin/html2pdf/html2pdf.class.php');
$pdf = new HTML2PDF('P','A4','en');
$pdf->WriteHTML($html);
$pdf->Output();
?>
