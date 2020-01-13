<?php
require('phpmailer/class.phpmailer.php');

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "ssl";
$mail->Port     = 465;  
$mail->Username = "mamij.polije@gmail.com";
$mail->Password = "mamij1@gmail.com";
$mail->Host     = "smtp.gmail.com";
//$mail->Mailer   = "smtp.gmail.com";
$mail->SetFrom($_POST["email"], $_POST["nama"]);
//$mail->AddReplyTo($_POST["email"], $_POST["nama"]);
$mail->AddAddress('mamij.polije@gmail.com', 'Joe User');
$mail->Subject="Komentar dari".$_POST['nama'];
$mail->WordWrap   = 80;
$mail->MsgHTML($_POST["message"]);

// foreach ($_FILES["attachment"]["name"] as $k => $v) {
//  $mail->AddAttachment( $_FILES["attachment"]["tmp_name"][$k], $_FILES["attachment"]["name"][$k] );
// }

$mail->IsHTML(true);

if(!$mail->Send()) {
   echo "<script>alert('Gagal Terkirim, ulangi lagi...');</script>";
    echo "<script>location='contact.php';</script>";
} else {
    echo "<script>alert('Pesan Anda Telah Terkirim');</script>";
    echo "<script>location='index.php';</script>";

}   
?>