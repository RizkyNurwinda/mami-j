<?php 
include 'koneksi.php';

if (isset($_POST['loginadmin'])) {
	$usernameadmin =$_POST['usernameadmin'];

	$passwordadmin =$_POST['passwordadmin'];

	$query = mysqli_query($koneksi,"SELECT * FROM user WHERE username = '$usernameadmin' AND password ='$passwordadmin'");
    $cek = mysqli_num_rows($query);

    if($cek > 0){
    	session_start();
    	$_SESSION['username'] = $usernameadmin;
    	$_SESSION['status'] = 'login';
    	header("location:index.php");

    }else{
    	header("location:login.php");
    }
    }
 ?>