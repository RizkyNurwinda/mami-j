<h2>Detail Pembelian</h2>
   
    <?php 
    $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pelanggan
      ON pembelian.id_pelanggan=pelanggan.id_pelanggan
      WHERE pembelian.id_pembelian='$_GET[id]'");
    $detail = $ambil->fetch_assoc();
    ?>
    <br>

    <strong><i class="glyphicon glyphicon-user"></i> Nama___________    :</strong>  <?php echo $detail['nama_pelanggan']; ?><br>
    ------------------------------------------------------
    <br>
    <p> <strong><i class="glyphicon glyphicon-earphone"></i>
      No Telepon______ : </strong><?php echo $detail['telepon_pelanggan']; ?> <br>
      ------------------------------------------------------
      <br> <strong><i class="glyphicon glyphicon-envelope"></i>
      Email___________:</strong> <?php echo $detail['email_pelanggan']; ?>
    </p>
    ------------------------------------------------------
    <br>

    <p><strong> <i class="glyphicon glyphicon-pushpin"></i>
      Tanggal_________ :</strong><?php echo $detail['tanggal_pembelian']; ?> <br>
      ------------------------------------------------------
      <br>
      <strong><i class="glyphicon glyphicon-usd"> </i> Total___________ :</strong>Rp <?php echo $detail['total_pembelian']; ?> <br>
      ------------------------------------------------------
      <br>
    </p>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th class="alert alert-info" role="alert">No</th>
          <th class="alert alert-info" role="alert">Gambar</th>
          <th class="alert alert-info" role="alert">Nama Produk</th>
          <th class="alert alert-info" role="alert">Harga</th>
          <th class="alert alert-info" role="alert">Jumlah</th>
          <th class="alert alert-info" role="alert">Subtotal</th>
        </tr>
      </thead>
      <tbody>
        <?php $detail['total_pembelian']; ?>
        <?php $nomer=1; ?>
        <?php $totalbelanja = 0; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM pembelian_produk JOIN produk ON pembelian_produk.id_produk=produk.id_produk WHERE pembelian_produk.id_pembelian='$_GET[id]'"); ?>
        <?php while($pecah=$ambil->fetch_assoc()){  ?>
        <tr>
          <td><?php echo $nomer; ?></td>
          <td><img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="100"></td>
          <td><?php echo $pecah['nama_produk']; ?></td>
          <td><?php echo number_format($pecah['harga_produk']); ?></td>
          <td><?php echo $pecah['jumlah']; ?></td>
          <td>
            <?php echo $pecah['harga_produk']*$pecah['jumlah']; ?>
          </td>
        </tr>
        <?php $detail['total_pembelian']; ?>
        <?php $nomer++ ?>
        <?php } ?>
      </tbody>
      <tfoot>
        <th colspan="5"  class="alert alert-info" role="alert"><i class="glyphicon glyphicon-gift"></i> Total Belanja</th>
        <th colspan="5"  class="alert alert-info" role="alert">Rp. <?php echo number_format($detail['total_pembelian']); ?> (Termasuk Ongkir) </th>
      </tfoot>
    </table>