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

$qryFrm2 = "insert into tb_kegiatan set  
		  tahun='$_SESSION[tahun]',
		  kode_kegiatan='$_POST[kode_kegiatan]',
		  nama_kegiatan='$_POST[nama_kegiatan]',
		  pj='$_POST[pj]'";


$resQryFrm2 = mysqli_query($koneksi, $qryFrm2);

?>
<script type="text/javascript">
	window.location = "masterkegiatan"
</script>