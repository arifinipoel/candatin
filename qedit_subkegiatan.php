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

$qryFrm2 = "update tb_subkegiatan set  
		  tahun='$_SESSION[tahun]',
		  kode_subkegiatan='$_POST[kode_subkegiatan]',
		  nama_subkegiatan='$_POST[nama_subkegiatan]',
		  updated_at = NOW()
		  where idsubkegiatan='$_POST[idsubkegiatan]'";

$resQryFrm2 = mysqli_query($koneksi, $qryFrm2);
$idsubkegiatan = $_REQUEST['idsubkegiatan'];
$idkegiatan = $_REQUEST['idkegiatan'];
$kode_kegiatan = $_REQUEST['kode_kegiatan'];
$nama_kegiatan = $_REQUEST['nama_kegiatan'];

?>
<!-- Redirect menggunakan POST -->
<form id="redirectForm" action="mastersubkegiatan" method="POST" style="display:none;">
	<input type="hidden" name="idsubkegiatan" value="<?php echo htmlspecialchars($idsubkegiatan); ?>">
	<input type="hidden" name="idkegiatan" value="<?php echo htmlspecialchars($idkegiatan); ?>">
	<input type="hidden" name="kode_kegiatan" value="<?php echo htmlspecialchars($kode_kegiatan); ?>">
	<input type="hidden" name="nama_kegiatan" value="<?php echo htmlspecialchars($nama_kegiatan); ?>">
</form>

<script type="text/javascript">
	document.getElementById('redirectForm').submit();
</script>