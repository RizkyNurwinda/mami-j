<h2>Tambah Pelanggan</h2>

<a href="index.php?halaman=pelanggan"><button class="btn btn-danger" name="save"><i class="glyphicon glyphicon-triangle-left"></i> Kembali</button></a>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>Email</label>
		<input type="text" class="form-control" name="email">
	</div>
	<div class="form-group">
		<label>Kata sandi</label>
		<input type="text" class="form-control" name="sandi">
	</div>
	<div class="form-group">
		<label>telepon</label>
		<input type="number" class="form-control" name="telepon">
	</div>
	
	<button class="btn btn-primary" name="save"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>

</form>
<?php 
if (isset($_POST['save']))
{
	
	$koneksi->query("INSERT INTO pelanggan
		(nama_pelanggan,email_pelanggan,password_pelanggan,telepon_pelanggan)
		VALUES('$_POST[nama]','$_POST[email]','$_POST[sandi]','$_POST[telepon]')");

	echo "<div class='alert alert-info'>Data Tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";
 }
?>
