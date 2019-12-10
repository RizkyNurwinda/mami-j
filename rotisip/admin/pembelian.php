<h2>Data Pembelian</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th class="alert alert-info" role="alert">No</th>
			<th class="alert alert-info" role="alert">Nama Pelanggan</th>
			<th class="alert alert-info" role="alert">Tanggal Beli</th>
			<th class="alert alert-info" role="alert">Tanggal Kirim</th>
			<th class="alert alert-info" role="alert">Total</th>
			<th class="alert alert-info" role="alert">Alamat</th>
			<th class="alert alert-info" role="alert">Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomer=1; ?>
		<?php $ambil=$koneksi->query("SELECT * FROM pembelian JOIN user ON pembelian.id_user=user.id_user"); ?>
		<?php while($pecah=$ambil->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomer; ?></td>
			<td><?php echo $pecah['nama_terima']; ?></td>
			<td><?php echo $pecah['tanggal_beli']; ?></td>
			<td><?php echo $pecah['tanggal_kirim']; ?></td>
			<td><?php echo $pecah['total']; ?></td>
			<td><?php echo $pecah['alamat']; ?></td>
			<td>
				<a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-info">Detail</a>
			</td>
		</tr>
		<?php $nomer++; ?>
		<?php } ?>
	</tbody>
</table>