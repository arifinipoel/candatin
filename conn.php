<?php 
$host = "localhost";
$user = "root";
$pass = "";
$db = "monitoring_pusdatin";
$koneksi = mysqli_connect($host, $user, $pass, $db);
if(!$koneksi) 
{
die("Koneksi gagal : ".mysql_connect_error());
}
?>
