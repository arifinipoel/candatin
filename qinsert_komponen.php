<?php 
session_start();
include 'conn.php';
if($_SESSION['tipe_login']!="1")
{
header("location:logout.php");
die;
} 

$tglfile=date('dmY');

$qryFrm2="insert into tb_komponen set  
		  tahun='$_SESSION[tahun]',
		  idsubkegiatan='$_REQUEST[idsubkegiatan]',
		  kode_komponen='$_POST[kode_komponen]',
		  nama_komponen='$_POST[nama_komponen]',
		  pagu='$_POST[pagu]',
		  tagging='$_POST[tagging]'";


$resQryFrm2=mysqli_query($koneksi,$qryFrm2);

$idsubkegiatan = $_REQUEST['idsubkegiatan'];
$kode_kegiatan = $_REQUEST['kode_kegiatan'];
$kode_subkegiatan = $_REQUEST['kode_subkegiatan'];
?>

<!-- Redirect menggunakan POST -->
<form id="redirectForm" action="masterkomponen" method="POST" style="display:none;">
    <input type="hidden" name="idsubkegiatan" value="<?php echo htmlspecialchars($idsubkegiatan); ?>">
	<input type="hidden" name="kode_subkegiatan" value="<?php echo htmlspecialchars($kode_subkegiatan); ?>">
	<input type="hidden" name="kode_kegiatan" value="<?php echo htmlspecialchars($kode_kegiatan); ?>">
</form>

<script type="text/javascript">
    document.getElementById('redirectForm').submit();
</script>



