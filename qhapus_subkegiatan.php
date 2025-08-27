<?php 
//memulai session yang disimpan pada browser
session_start();
include 'conn.php';
//cek apakah sesuai status sudah login? kalau belum akan kembali ke form login
if($_SESSION['tipe_login']!="1")
{
//melakukan pengalihan
header("location:logout.php");
die;
} 

$tglfile=date('dmY');

$qryFrm2="delete from tb_subkegiatan where idsubkegiatan='$_POST[idsubkegiatan]'";
$resQryFrm2=mysqli_query($koneksi,$qryFrm2);
$kode_kegiatan = $_REQUEST['kode_kegiatan'];
$idkegiatan = $_REQUEST['idkegiatan'];

?>
<!-- Redirect menggunakan POST -->
<form id="redirectForm" action="mastersubkegiatan" method="POST" style="display:none;">
	<input type="hidden" name="idkegiatan" value="<?php echo htmlspecialchars($idkegiatan); ?>">
	<input type="hidden" name="kode_kegiatan" value="<?php echo htmlspecialchars($kode_kegiatan); ?>">
</form>

<script type="text/javascript">
    document.getElementById('redirectForm').submit();
</script>



