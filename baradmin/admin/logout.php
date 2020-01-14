
 <?php
session_start();
if(session_destroy()) // Menghapus Sessions
{
echo "<script>alert('anda telah logout');</script>";
echo "<script>location='/mami-j/index.php';</script>";

}
?>
