<?php 
//memulai session yang disimpan pada browser
session_start();
include 'conn.php';
//cek apakah sesuai status sudah login? kalau belum akan kembali ke form login
if($_SESSION['tipe_login']!="1" and $_SESSION['tipe_login']!="2" and $_SESSION['tipe_login']!="3" and $_SESSION['tipe_login']!="4")
{
//melakukan pengalihan
header("location:logout.php");
die;
} 


$qryFrm2="update tb_user set 
			password='$_POST[password]' where id_user='$_SESSION[id_user]'";

$resQryFrm2=mysqli_query($koneksi,$qryFrm2);
//echo "$qryFrm2";
?>

<script type="text/javascript">
window.location = "logout"
</script>
