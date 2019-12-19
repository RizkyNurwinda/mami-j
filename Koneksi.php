<?php
$db_host = "localhost";//pendeklarasian model host
$db_user = "root"; 
$db_pass = "";
$db_name = "db_mamij1"; //nama databse

$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name); //koneksi 

if(mysqli_connect_errno()){
	echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
}else{

}
?>
