<?php
session_start();
include 'conn.php';
if ($_SESSION['tipe_login'] != "1") {
	header("location:logout.php");
	die;
}

$tglfile = date('dmY');

$qryFrm2 = "insert into tb_subkegiatan set  
		  tahun='$_SESSION[tahun]',
		  idkegiatan='$_REQUEST[idkegiatan]',
		  kode_subkegiatan='$_POST[kode_subkegiatan]',
		  nama_subkegiatan='$_POST[nama_subkegiatan]'";


$resQryFrm2 = mysqli_query($koneksi, $qryFrm2);

$idkegiatan = $_REQUEST['idkegiatan'];
$kode_kegiatan = $_REQUEST['kode_kegiatan'];
$nama_kegiatan = $_REQUEST['nama_kegiatan'];
?>

<!-- Redirect menggunakan POST -->
<form id="redirectForm" action="mastersubkegiatan" method="POST" style="display:none;">
	<input type="hidden" name="idkegiatan" value="<?php echo htmlspecialchars($idkegiatan); ?>">
	<input type="hidden" name="kode_kegiatan" value="<?php echo htmlspecialchars($kode_kegiatan); ?>">
	<input type="hidden" name="nama_kegiatan" value="<?php echo htmlspecialchars($nama_kegiatan); ?>">
</form>

<script type="text/javascript">
	document.getElementById('redirectForm').submit();
</script>