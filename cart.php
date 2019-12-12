<?php 
session_start();

 
include 'koneksi.php';

if (empty($_SESSION["cart"]) OR !isset($_SESSION["cart"])) 
{
	echo "<script>alert('keranjang kosong, silahkan belanja dulu');</script>";
	echo "<script>location='index.php';</script>";
}

?>

<?php
    include "pages/header.php"; 
    ?>

    <div class="span9" align="center">
	<h3>  KERANJANG BELANJAAN  <small><!-- </small>]<a href="special_offer.php" class="btn btn-large pull-right"><i class="icon-arrow-left">--></i>  </a></h3>	
	<hr class="soft"/>
			
			
	<table class="table table-bordered">
              <thead>
             	<tr>
			<th>No</th>
			<th>Poduk</th>
			<th>harga</th>
			<th>Jumlah</th>
			<th>total</th>
			<th> Aksi</th>
		</tr>
	</thead>
	<tbody>
		
		<?php $nomor=1; ?>
		<?php foreach ($_SESSION["cart"] as $id_produk=> $jumlah): ?>
		<?php 
		$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
		$pecah = $ambil->fetch_assoc();
		$total = $pecah["harga_produk"]*$jumlah;

	
				?>

		<tr style="height: 50px">
			<td><?php echo $nomor; ?></td>
			<td><?php echo $pecah["nama_produk"]; ?></td>
			<td><?php echo number_format($pecah["harga_produk"]);  ?></td>
			<td><?php echo $jumlah;?></td>
			<td><?php echo number_format($total);  ?></td>
			<td>
				<a href="hapuskeranjang.php?id=<?php echo 
				$id_produk ?>" class="btn btn-danger btn-xs"> hapus </a>
			</td>

		 <?php $nomor++; ?>
         <?php endforeach ?>
         
		
		</tr>
        
                
				</tbody>
            </table>
            <a href="yukbelanja.php" class="btn btn-primary"><i class="icon-arrow-left"></i> Lanjutkan belanja</a>
	<a href="checkout.php" class="btn btn-primary pull-right">Checkout <i class="icon-arrow-right"></i></a>
				  </div>			  
			  </td>
			  </tr>
            </table>		
	
	
</div>
</div></div>
</div>

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