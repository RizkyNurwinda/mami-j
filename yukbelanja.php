<?php 
session_start();
//koneksi data base
$koneksi = new mysqli("localhost","root","","db_mamij1");
 ?>

 <!DOCTYPE html>
<html lang="en">
  
<?php
    include "pages/header_all.php"; 
    ?>




    <!-- <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
          <div class="col-md-12 heading-section text-center ftco-animate">
            <span class="subheading"></span>
            <h2 class="mb-4">Semua Produk MAMI-J</h2>
          </div>
        </div>      
      </div> -->

       <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 mb-5 text-center">
                    <ul class="product-category">
                        <!-- <li><a href="" class="active">All</a></li> -->
                     <?php $ambil = $koneksi->query("SELECT * FROM kategori"); ?>
        <?php while($perproduk=$ambil->fetch_assoc()) { ?>
    
          <a class="active" href="yukbelanja.php?id=<?php echo $perproduk['id_kategori']; ?>" name="">
          <i class="icon-chevron-right"></i>
          <?php echo $perproduk['kategori']; ?>
          </a>
        <?php } ?>
   
                    </ul>
                </div>
            </div>
  <div id="myTab" class="pull-right">
  
   </div>
<div class="tab-pane  active" id="blockView">
    <?php
                                include'koneksi.php';
                                if (empty($_GET["id"])) {
                                  $query = "SELECT COUNT(*) as total FROM produk WHERE nama_produk LIKE '%$q%' ORDER BY nama_produk";
                                 } elseif (isset($_GET["id"])) {
                                  $query = "SELECT COUNT(*) as total FROM produk WHERE id_kategori='$_GET[id]' LIKE '%$q%' ORDER BY nama_produk";
                                 }
                                
                                $result = mysqli_query($koneksi, $query);
                                while($row = mysqli_fetch_array($result)){
                                ?>

                                <p align="right">Total : <strong><?php echo $row['total'];?> </strong>data Produk</p>
                                <?php
                                }
                                ?>
                                <?php
                                //includekan fungsi paginasi
                                //silahkan di komen atau di hapus saja baris yang tidak ingin digunakan
                                // include 'pagination1.php';
                                //pagination config start
                                // $q = isset($_REQUEST['q']) ? urldecode($_REQUEST['q']) : ''; // untuk keyword pencarian
                                $page = isset($_GET['page']) ? intval($_GET['page']) : 1; // untuk nomor halaman
                                $adjacents = isset($_GET['adjacents']) ? intval($_GET['adjacents']) : 3; // khusus style pagination 2 dan 3
                                $rpp = 10; // jumlah record per halaman
                                if (empty($_GET["id"])) {
                                  $sql = "SELECT * FROM produk WHERE nama_produk LIKE '%$q%' ORDER BY nama_produk";
                                 } elseif (isset($_GET["id"])) {

                                  $sql = "SELECT * FROM produk WHERE id_kategori='$_GET[id]' ORDER BY nama_produk";
                                 } 

                               // query silahkan disesuaikan
                                $result = mysqli_query($koneksi, $sql); // eksekusi query
                                $tcount = mysqli_num_rows($result); // jumlah total baris
                                $tpages = isset($tcount) ? ceil($tcount / $rpp) : 1; // jumlah total halaman
                                $count = 0; // untuk paginasi
                                $i = ($page - 1) * $rpp; // batas paginasi
                                $no_urut = ($page - 1) * $rpp; // nomor urut
                                $reload = $_SERVER['PHP_SELF'] . "?q=" . $q . "&amp;adjacents=" . $adjacents; // untuk link ke halaman lain
                                //pagination config end

                                
    ?>
    <div class="row">                            
    <ul class="thumbnails">
      <?php 
      while (($count < $rpp) && ($i<$tcount)) {
        
                                                mysqli_data_seek($result, $i);
                                                $perproduk = mysqli_fetch_array($result);
       ?>





          <li class="span3">
      <div class="container">
        <div class="hero-unit" style="margin-left: 10px;">
          <div class="hero-unit" style="margin-right: 30px;">
        <div class="thumbnail pagination-centered">
          <div class="col-md-6 col-lg-3 ftco-animate">
            <div class="text py-3 pb-4 px-3 text-center">
            <div class="product">
              <div class="item active">
              <img style="margin-bottom: 20px;" src="rotisip/foto_produk/<?= $perproduk['foto_produk'] ?>" width="200">
                <h5   ><?php echo $perproduk['nama_produk']; ?></h5>

            <div class="text py-3 pb-4 px-3 text-center">
                <div class="d-flex">
                  <div class="pricing">
                    <p class="price"><span class="mr-2 price-dc"></span><span class="price-sale">Rp.<?php echo number_format($perproduk['harga_produk']); ?></span></p>
                  </div>
                </div>
              </div>
                <div class="bottom-area center-block d-flex px-3">
                  <h4 style="text-align:center;"><a class="btn btn-primary text-center" href="produk_detail.php?id=<?php echo $perproduk["id_produk"]; ?>"> Detail </a>
                  </h4>
               </div>
           </div>  
         </div>
                  </div>
                </div>
              </div>
            </div>
        </ul>
        </li>
      <?php $i++ ?>
                  <?php $count++ ?>
      <?php } ?>

      </ul>


  <hr class="soft"/>
  </div>
</div> 

<br>
<br>
<br>


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


