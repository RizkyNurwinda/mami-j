<h2>Data Produk</h2><br>
<a href="index.php?halaman=tambahproduk" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah Produk</a>
<br><br>


<table class="table table-bordered">
	<thead>
		<tr>
			<th class="alert alert-info" role="alert">No</th>
			<th class="alert alert-info" role="alert">Nama</th>
			<th class="alert alert-info" role="alert">Harga</th>
			<th class="alert alert-info" role="alert">Kategori</th>
			<th class="alert alert-info" role="alert">Foto</th>
			<th class="alert alert-info" role="alert">Diskripsi</th>
			<th class="alert alert-info" role="alert">Aksi</th>
		</tr>
	</thead>

	<tbody>
		<?php $nomer=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM produk"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){?>
		<tr>
			<td><?php echo $nomer; ?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td><?php echo $pecah['harga_produk']; ?></td>
			<td><?php echo $pecah['id_kategori']; ?></td>
			<td>
				<img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="100">
			</td>
			<td><?php echo $pecah['deskripsi']; ?></td>

			
			
			<td>
				<a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn-danger btn"><i class="glyphicon glyphicon-remove"></i>Hapus</a>
				<a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-warning"><i class="glyphicon glyphicon-repeat"></i> Ubah</a>
			</td>
		</tr>
		<?php $nomer++; ?>
		<?php } ?>
	</tbody>

</table>
