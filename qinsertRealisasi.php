<?php 
session_start();
include 'conn.php';
if($_SESSION['tipe_login']!="1")
{
header("location:logout.php");
die;
} 

$tglfile=date('dmY');
//$kode_kegiatan    = isset($_REQUEST['kode_kegiatan']) ? $_POST['kode_kegiatan'] : '';
//$kode_subkegiatan = isset($_REQUEST['kode_subkegiatan']) ? $_POST['kode_subkegiatan'] : '';
$minggu           = isset($_REQUEST['minggu']) ? $_POST['minggu'] : '';
$bulan            = isset($_REQUEST['bulan']) ? $_POST['bulan'] : '';

$qryCek="select idkomponen from tb_realisasi where idkomponen='$_REQUEST[idkomponen]' and minggu='$minggu' and bulan='$bulan' and tahun='$_SESSION[tahun]'"; 
$resCek=mysqli_query($koneksi,$qryCek);
$resNumCek=mysqli_num_rows($resCek);

if($resNumCek=="0")
{
	$qryFrm2="insert into tb_realisasi set 
	          idkomponen='$_REQUEST[idkomponen]',
			  rp_realisasi='$_REQUEST[rp_realisasi]',
			  minggu='$minggu',
			  bulan='$bulan',
			  tahun='$_SESSION[tahun]'";
	$resQryFrm2=mysqli_query($koneksi,$qryFrm2);
	
}
else 
{
	$qryFrm2="update tb_realisasi set 
	          rp_realisasi='$_REQUEST[rp_realisasi]',
			  minggu='$minggu',
			  bulan='$bulan',
			  tahun='$_SESSION[tahun]' where id='$_REQUEST[id]'";
	$resQryFrm2=mysqli_query($koneksi,$qryFrm2);
}


$btn = "Tampilkan";

?>

<!-- Redirect menggunakan POST -->
<form id="redirectForm" action="realisasi" method="POST" style="display:none;">
    <input type="hidden" name="minggu" value="<?php echo htmlspecialchars($minggu); ?>">
	<input type="hidden" name="bulan" value="<?php echo htmlspecialchars($bulan); ?>">
	<input type="hidden" name="btn" value="Tampilkan">
</form>

<script type="text/javascript">
    document.getElementById('redirectForm').submit();
</script>



