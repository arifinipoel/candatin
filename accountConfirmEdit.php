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
$pass = $_POST['password_baru']; 
$hash = password_hash($pass, PASSWORD_DEFAULT);
$qryUpdate = "UPDATE tb_user SET password_new ='$hash',edited='1' WHERE id_user='$_SESSION[id_user]'";

$resUpdate = mysqli_query($koneksi, $qryUpdate);

session_destroy();
header("location:index?pesan=Silakan login menggunakan akun yang baru");
?>

