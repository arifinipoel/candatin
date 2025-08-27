<?php
//memulai session yang disimpan pada browser
session_start();
include 'conn.php';
//cek apakah sesuai status sudah login? kalau belum akan kembali ke form login
if ($_SESSION['tipe_login'] != "1") {
    //melakukan pengalihan
    header("location:logout.php");
    die;
}

$tglfile = date('dmY');

$qryFrm2 = "delete from tm_kegiatan where idkegiatan='$_POST[idkegiatan]'";
$resQryFrm2 = mysqli_query($koneksi, $qryFrm2);

?>

<script type="text/javascript">
    window.location = "masterkegiatan"
</script>