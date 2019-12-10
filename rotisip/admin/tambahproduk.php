<?php 
// session_start();
//koneksi data base
$koneksi = new mysqli("localhost","root","","db_mamij");

 ?><h2>Tambah Produk</h2>
<a href="index.php?halaman=produk"><button class="btn btn-danger" name="save"><i class="glyphicon glyphicon-triangle-left"></i> Kembali</button></a>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>Harga (Rp)</label>
		<input type="number" class="form-control" name="harga">
	</div>
	<div class="form-group">
		<label>Kategori</label>
		<select type="text" class="form-control" name="kategori">
			<?php
						$ambil = $koneksi->query ("SELECT * FROM kategori");
						while ($data = mysqli_fetch_array($ambil)) { ?>
							<option value="<?php echo $data['id_kategori'];?>">
								<?php echo $data['kategori'];?>
							</option>
						<?php } ?>
				</select>
		</select>
	</div>
	<div class="form-group">
		<label>Foto</label>
		<input type="file" class="form-control" name="foto">
	</div>
	<div class="form-group">
		<label>deskripsi</label>
		<textarea class="form-control" name="deskripsi" rows="10"></textarea>
	</div>
	<button class="btn btn-primary" name="save"><i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>

</form>
<?php 
if (isset($_POST['save']))
{
	$nama = $_FILES['foto']['name'];
	$lokasi = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasi, "../foto_produk/".$nama);
	$koneksi->query("INSERT INTO produk
		(nama_produk,harga_produk,id_kategori,foto_produk,deskripsi)
		VALUES('$_POST[nama]','$_POST[harga]','$_POST[kategori]','$nama','$_POST[deskripsi]')");

	echo "<div class='alert alert-info'>Data Tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";
 }
?>
