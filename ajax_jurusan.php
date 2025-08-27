<?php 
include("conn.php");
$fakultas = $_POST['fakultas_id'];
$tampil=mysqli_query($koneksi,"SELECT * FROM tb_subkegiatan_dak_lap WHERE idkegiatan='$fakultas'");
$jml=mysqli_num_rows($tampil);
?>
<option value="9999">Semua sub kegiatan</option>
<?php 
if($jml > 0)
{    
    while($r=mysqli_fetch_array($tampil))
	{
?>
		
        <option value="<?php echo $r['idsubkegiatan'] ?>"><?php echo $r['namasubkegiatan'] ?></option>
        <?php        
    }
}else{
    echo "";
}
 
?>