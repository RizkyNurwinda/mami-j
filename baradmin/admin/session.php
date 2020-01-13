<?php
error_reporting(0);
include "koneksi.php"; //mengarah pada koneksi.php
session_start(); //mengawali session

$user_check = $_SESSION['USERNAME'];  //mengecheck kesesuaian session

$sql = "select * from user where username='$user_check'"; //menghubungkan session dengan db
$ses_sql = mysqli_query($koneksi, $sql); 
$row = mysqli_fetch_assoc($ses_sql);
$login_session = $row['id']; //mengakses session login dg id
$akses = $row['akses']; //koreksi akses
$pass = $row['PASSWORD']; //koreksi password
 ?>
