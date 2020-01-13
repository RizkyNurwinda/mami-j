<?php
session_start(); //mengawali session
include "Koneksi.php"; //menghubungkan dg koneksi
$error = '';
    if (isset($_POST['submit'])) { 
        $username = $_POST["username"];
    $password= $_POST["password"];
    $ambil = $koneksi->query("SELECT * FROM user WHERE username='$username' AND password='$password'");

    $akuncocok = $ambil->num_rows;

       if ($akuncocok==1)
     {
        //mendapat akun dalam array
        $akun= $ambil->fetch_assoc();
            // simpan di session customer/user
        $_SESSION["user"] = $akun;
        echo "<script>alert('sukses login'); </script>";
                $_SESSION['akses'] = $akun['id_akses']; //check kesekuaian akses dg session

                if($akun['id_akses']=="1"){
                    header("location:/mami-j/baradmin/admin/index.php"); //lokasi target jika berhasil login
                }

                elseif($akun['id_akses']=="2"){
        if (isset($_SESSION["cart"]) OR !empty($_SESSION["cart"])) 
    {
    echo "<script>location='/mami-j/checkout.php';</script>";
    }
    else
    {
        echo "<script>location='/mami-j/index.php';</script>";
    }

                // header("location:/bismillahok/checkout.php"); //lokasi target jika berhasil login
                }
               else
    {

        echo "<script>alert('gagal login silahkan masuk lagi'); </script>";
        echo "<script>location='login.php';</script>";
    }
}
}
?>
