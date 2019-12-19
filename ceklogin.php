<?php
session_start(); //mengawali session
include "Koneksi.php"; //menghubungkan dg koneksi
$error = '';
    if (isset($_POST['submit'])) { 
        if (empty($_POST['username']) || empty($_POST['password'])) //pendeklarasian user & pw
        {
            $error = 'Username and Password Invalid!'; //dialogbox jika user & pw tdk sesuai
        } else {
            $username = $_POST['username']; 
            $password = $_POST['password'];
            $username = stripslashes($username);
            $password = stripslashes($password);
            $username = mysqli_real_escape_string($koneksi, $username);
            $password = mysqli_real_escape_string($koneksi, $password);

            $sql = "select * from user where username='$username' and password='$password'"; //menyamakan dengan db
            $query = mysqli_query($koneksi, $sql); //menghubungkan dg mysql
            $count= mysqli_num_rows($query);
            if ($count==1) { 
                $cek = mysqli_fetch_array($query);
                $_SESSION['username'] = $cek['username']; //check kesesuaian user dg session
                $_SESSION['akses'] = $cek['id_akses']; //check kesekuaian akses dg session

                if($cek['akses']=="admin"){
                    header("location:bismillah/login/login.php"); //lokasi target jika berhasil login
                }
                else{
                    die("error");
                }
            } else {
                ?>
                <script language="JavaScript"> //pendeklarasian js
                        alert('Username atau Password Salah !'); //pemberitahuan jika pw / username salah
                        setTimeout(function() {window.location.href='index.php'},10); //tujuan jika username dan pw benar 
                    </script>
                <?php
            }
        }
    }

 ?>
