<?php
if (isset($_POST['simpan'])) {
require ("Koneksi.php");
	
		# code...
	//memanggil sebuah nilai dari sebuah inputan dari form pendaftaran.php
	$user = $_POST['user'];
    $email = $_POST['email']
	$pass = $_POST['password'];
    $nomor = $_POST['nomor telepon'];
    $akses = 'USER';

    // if ($pass==$pass2) {

    	//sebuah query untuk menginputkan data ke table tb_siswa
    	$query = "INSERT INTO user (username, email, password, nomor telepon, user) VALUES ('$user', '$email', '$pass', '$nomor', '$akses')";

    	$result = mysqli_query($koneksi, $query);

    	if ($result) {?>
    		<script language="JavaScript">
    		alert('Tambah Berhasil !');
    		setTimeout(function() {window.location.href='daftar.php'},10);
    		</script><?php
    }} else {
        ?>
    		<script language="JavaScript">
    		alert('Password awal dan akhir harus sama !');
    		setTimeout(function() {window.location.href='daftar.php'},10);
    		</script><?php
    }
    mysqli_close($koneksi);
}
