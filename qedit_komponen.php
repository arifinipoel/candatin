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

$qryFrm2 = "update tb_komponen set  
		  tahun='$_SESSION[tahun]',
		  kode_komponen='$_POST[kode_komponen]',
		  nama_komponen='$_POST[nama_komponen]',
		  pagu='$_POST[pagu]',
		  tagging='$_POST[tagging]',
		  updated_at = NOW()
		  where idkomponen='$_POST[idkomponen]'";

$resQryFrm2 = mysqli_query($koneksi, $qryFrm2);
$idkomponen = $_REQUEST['idkomponen'];
$idsubkegiatan = $_REQUEST['idsubkegiatan'];
$kode_subkegiatan = $_REQUEST['kode_subkegiatan'];
$nama_subkegiatan = $_REQUEST['nama_subkegiatan'];
$kode_kegiatan = $_REQUEST['kode_kegiatan'];
$nama_kegiatan = $_REQUEST['nama_kegiatan'];

?>
<!-- Redirect menggunakan POST -->
<form id="redirectForm" action="masterkomponen" method="POST" style="display:none;">
	<input type="hidden" name="idkomponen" value="<?php echo htmlspecialchars($idkomponen); ?>">
	<input type="hidden" name="idsubkegiatan" value="<?php echo htmlspecialchars($idsubkegiatan); ?>">
	<input type="hidden" name="kode_subkegiatan" value="<?php echo htmlspecialchars($kode_subkegiatan); ?>">
	<input type="hidden" name="nama_subkegiatan" value="<?php echo htmlspecialchars($nama_subkegiatan); ?>">
	<input type="hidden" name="kode_kegiatan" value="<?php echo htmlspecialchars($kode_kegiatan); ?>">
	<input type="hidden" name="nama_kegiatan" value="<?php echo htmlspecialchars($nama_kegiatan); ?>">
</form>

<script type="text/javascript">
	document.getElementById('redirectForm').submit();
</script>