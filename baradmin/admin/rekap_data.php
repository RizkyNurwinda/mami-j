<?php
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">
     <meta name="viewport" content="width=device-width, initial-scale=1.0" />

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


            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
             <div id="wrapper">
           
         <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
                                  
<br>
   <div class="container">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">LAPORAN PEMBELIAN</h1>
          </div>


                    <form method="get" action="">
                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Filter Berdasarkan</label>
                        <div class="col-sm-5">
                          <select class="form-control" name="filter" id="filter">
                              <option value="" selected="">Pilih</option>
                              <option value="1">Per Tanggal</option>
                              <option value="2">Per Bulan</option>
                              <option value="3">Per Tahun</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-group row" id="form-tanggal">
                        <label class="col-sm-2 col-form-label">Tanggal</label>
                        <div class="col-sm-5">
                            <input type="date" name="tanggal" class="form-control" size="4"/><!-- class="input-tanggal"  -->
                        </div>
                      </div>

                        <div class="form-group row" id="form-bulan">
                          <label class="col-sm-2 col-form-label">Bulan</label>
                          <div class="col-sm-5">
                            <select class="form-control" name="bulan">
                                <option value="">Pilih</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                                <option value="4">April</option>
                                <option value="5">Mei</option>
                                <option value="6">Juni</option>
                                <option value="7">Juli</option>
                                <option value="8">Agustus</option>
                                <option value="9">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                          </div>
                        </div>

                        <div class="form-group row" id="form-tahun">
                          <label class="col-sm-2 col-form-label">Tahun</label>
                          <div class="col-sm-5">
                            <select class="form-control" name="tahun">
                                <option value="">Pilih</option>
                                    <?php
                                    $query = "SELECT YEAR(tanggal_beli) AS tahun FROM pembelian GROUP BY YEAR(tanggal_beli)"; // Tampilkan tahun sesuai di tabel transaksi
                                    $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query

                                    while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                                        echo '<option value="'.$data['tahun'].'">'.$data['tahun'].'</option>';
                                    }
                                    ?>
                            </select>
                            </div>
                        </div>

                        <div class="form-group row">
                          <label class="col-sm-2 col-form-label">&nbsp;</label>
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" value="">Tampilkan</button>
                            <a href="rekap_data.php" class="btn btn-danger">Reset Filter</a>
                          </div>
                        </div>

                        <!-- <button type="submit">Tampilkan</button>
                        <a href="rekap_data.php">Reset Filter</a> -->
                    </form>
     <hr />

    <?php
    if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
        $filter = $_GET['filter']; // Ambil data filder yang dipilih user
        
        if($filter == '1'){ // Jika filter nya 1 (per tanggal)
            
            $tgl = date('d-m-y', strtotime($_GET['tanggal']));

            echo '<b>Data Penjualan Tanggal '.$tgl.'</b><br /><br />';
            echo '<a href="print.php?filter=1&tanggal='.$_GET['tanggal'].'">Cetak PDF</a><br /><br />';

            $query = "SELECT * FROM pembelian, user WHERE pembelian.id_user=user.id_user and DATE(tanggal_beli)='".$_GET['tanggal']."'"; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
        }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
            
            $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

            echo '<b>Data Penjualan Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</b><br /><br />';

            echo '<a href="print.php?filter=2&bulan='.$_GET['bulan'].'&tahun='.$_GET['tahun'].'">Cetak PDF</a><br /><br />';

            $query = "SELECT * FROM pembelian, user WHERE pembelian.id_user=user.id_user and MONTH(pembelian.tanggal_beli)='".$_GET['bulan']."' AND YEAR(pembelian.tanggal_beli)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
        }else{ // Jika filter nya 3 (per tahun)
            echo '<b>Data Penjualan Tahun '.$_GET['tahun'].'</b><br /><br />';
            echo '<a href="print.php?filter=3&tahun='.$_GET['tahun'].'">Cetak PDF</a><br /><br />';

            $query = "SELECT * FROM pembelian, user WHERE pembelian.id_user=user.id_user and YEAR(tanggal_periksa)='".$_GET['tahun']."'"; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
        }
    }else{ // Jika user tidak mengklik tombol tampilkan
        echo '<b>Semua Data Penjualan</b><br /><br />';
        echo '<a href="print.php" class="btn btn-success"><i class="fas fa-print"></i> Cetak PDF</a><br /><br />';

        $query = "SELECT * FROM pembelian,user WHERE pembelian.id_user=user.id_user ORDER BY tanggal_beli"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
    }
    ?>

      <table class="table table-bordered"> 
         <thead>  
               <tr>  
                  <th>Tanggal Beli</th>
                  <th>Id Pembelian</th>
                  <th>Nama</th>
                    <th>Alamat</th>
                  <th>Total Harga</th> 
               </tr>
         </thead>
         <tbody>  
            
               <?php
               $totalbelanja=0;
                  $sql = mysqli_query($koneksi, $query); // Eksekusi/Jalankan query dari variabel $query
                  $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql

                  if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)

                     while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                           $tgl = date('d-m-Y', strtotime($data['tanggal_beli'])); // Ubah format tanggal jadi dd-mm-yyyy
                           $subharga=$data['total']+$row['total'];
                           echo "<tr>";
                           echo "<td>".$tgl."</td>";
                           echo "<td>".$data['id_pembelian']."</td>";
                           echo "<td>".$data['username']."</td>";
                            echo "<td>".$data['alamat']."</td>";
                           echo "<td>"."Rp.".number_format($data['total'])."</td>";
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
                     <th colspan="3"> total belanja</th>
                     <th>Rp. <?php echo number_format($totalbelanja) ?> </th>
               </tr>
         </tfoot>
       </table> 
       <script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
        });

        $('#form-tanggal, #form-bulan, #form-tahun').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            }else{ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }

            $('#form-tanggal input, #form-bulan select, #form-tahun select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
    </script>
</div>
</div>


                                </div>
                            </div>
                        </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
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
            <
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
 <?php include 'assets/js.php'; ?>
</body>

<script>
function searchTable() {
    var input;
    var saring;
    var status; 
    var tbody; 
    var tr; 
    var td;
    var i; 
    var j;
    input = document.getElementById("input");
    saring = input.value.toUpperCase();
    tbody = document.getElementsByTagName("tbody")[0];;
    tr = tbody.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td");
        for (j = 0; j < td.length; j++) {
            if (td[j].innerHTML.toUpperCase().indexOf(saring) > -1) {
                status = true;
            }
        }
        if (status) {
            tr[i].style.display = "";
            status = false;
        } else {
            tr[i].style.display = "none";
        }
    }
}
</script>
</html>
<!-- end document-->
