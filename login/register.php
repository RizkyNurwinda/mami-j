<?php 
session_start();
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Register</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-success">

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block">
                <img class="img-fluid" src="a1.jpg" alt="Colorlib Template">
              </div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
              </div>
              <form class="user" action="" method="POST">
                <div class="form-group">
                  <input type="username" name="username" class="form-control form-control-user" id="exampleInputEmail" placeholder="Username">
                </div>
                  <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email">
                  </div>
                  <div class="col-sm-6">
                    <input type="nomor" name="nomor" class="form-control form-control-user" id="exampleRepeatNomor" placeholder="No Handphone">
                  </div>
                </div>
                <div class="form-group row">
                    <input type="password" name="password"  class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
                  </div>
                  <button class="btn btn-success btn-user btn-block" name="daftar"><i></i> Daftar</button>
              <!--   <a href="index.html" class="btn btn-primary btn-user btn-block">
                  Daftar
                </a> -->
                <a href="index.php" class="btn btn-danger btn-user btn-block">
                  <i class="fab fa-fw"></i> Cancel
                </a>
              </form>
              <hr>
              <!-- <div class="text-center">
                <a class="small" href="forgot-password.html">Forgot Password?</a>
              </div> -->
              <div class="text-center">
                <a class="small" href="index.php">Already have an account? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

<?php 
if (isset($_POST["daftar"]))
 {
  $nama = $_POST["username"];
  $email = $_POST["email"];
  $password= $_POST["password"];
  $alamat= $_POST["alamat"];
  $telepon= $_POST["nomor"];
  $ambil = $koneksi->query("SELECT * FROM user WHERE email='$email'");
  $yangcocok = $ambil->num_rows;
  if ($yangcocok==1)
   {
    echo "<script>alert('pendaftaran gagal,email sudah digunakan); </script>";
    echo "<script>location='../login/index.php';</script>";
  }
  else
  {
    $koneksi->query("INSERT INTO user (email,password,username,nomor,alamat,id_akses) VALUES('$email','$password','$nama','$telepon','$alamat','2')");
    echo "<script>alert('sukses, silahkan Login'); </script>";
    echo "<script>location='../login/index.php';</script>";
  }
}
?>
 <!-- <?php 
if (isset($_POST['daftar']))
{
	
	$koneksi->query("INSERT INTO user
		(id_akses,username,email,password,nomor)
		VALUES('2','$_POST[username]','$_POST[email]','$_POST[password]','$_POST[nomor]')");

	echo "<script>alert('Daftar Berhasil, silahkan Anda Login');</script>";
	echo "<script>location='../login/index.php';</script>";
    
 }
?>  -->

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
