<?php
session_start();
include 'koneksi.php';
?>
<?php 

$ambil=$koneksi->query("SELECT * FROM user WHERE id_user='$_GET[id]'");
$pecah=$ambil->fetch_assoc();

$koneksi->query("DELETE FROM user WHERE id_user='$_GET[id]'");

echo "<script>alert('Member berhasil dihapus');</script>";
echo "<script>location='index.php?halaman=pelanggan';</script>";
 ?>