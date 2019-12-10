<h2>Data pelanggan</h2><br>
<a href="index.php?halaman=tambahpelanggan" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah Pelanggan</a>
<br><br>
<table class="table table-bordered">
	<thead>
		<tr>
			<th class="alert alert-info" role="alert">No</th>
			<th class="alert alert-info" role="alert">Nama</th>
			<th class="alert alert-info" role="alert">Email</th>
			<th class="alert alert-info" role="alert">Telepon</th>
			<th class="alert alert-info" role="alert">Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php $nomer=1; ?>
	<?php $ambil=$koneksi->query("SELECT * FROM user"); ?>
	<?php while($pecah=$ambil->fetch_assoc()) { ?>
		<tr>
			<td><?php echo $nomer; ?></td>
			<td><?php echo $pecah['username']; ?></td>
			<td><?php echo $pecah['email']; ?></td>
			<td><?php echo $pecah['nomor']; ?></td>
			<td>
				<a href="index.php?halaman=hapuspelanggan&id=<?php echo $pecah['id_pelanggan']; ?>" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i>Hapus</a>
				<a href="index.php?halaman=ubahpelanggan&id=<?php echo $pecah['id_pelanggan']; ?>" class="btn btn-primary"><i class="glyphicon glyphicon-repeat"></i> Ubah</a>
			</td>
		</tr>
		<?php $nomer++; ?>
		<?php } ?>
	</tbody>
</table>
