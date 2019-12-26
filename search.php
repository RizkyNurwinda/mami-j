 <?php 
  if (isset($_POST['cari'])) {
  $koneksi = mysql_connect("localhost","root","","db_mamij1");
  $cari = $_POST['cari'];
  $sql = "select * from produk where nama_produk like '%".$cari."%'";
  $result = mysql_query($sql);
  if (mysql_num_rows($result) > 0) {
  }else{
    while ($row = mysql_fetch_array($sql)) {
      $nama_produk = $row['nama_produk'];
      $id_produk = $row['id_buku'];
    }
  }
}
  ?>