<?php
    global $koneksi;

    $nameserver = "localhost";
    $username = "root";
    $password = "senaviana14";
    $namadb = "onlineshop";

    $koneksi = mysqli_connect($nameserver,$username,$password,$namadb);

    if(!$koneksi){
        die("koneksi gagal".mysqli_connect_error());s
    }


?>