<?php
include "conn.php";
$kdprop = $_REQUEST['idprop'];
?>
<option value="">-- Pilih Bulan Awal--</option>
<?php 
$sqlKab="select distinct procmth from export2012_tempor where procyear='$kdprop' and procmth ='01' order by procmth";
$p_kab=mysqli_query($koneksi,$sqlKab);
while ($dataBulan=mysqli_fetch_array($p_kab))
{
$h_kab=$dataBulan['procmth'];
echo "<option value=$h_kab>";
if($h_kab == "01")
{
 echo "Januari";
}
elseif($h_kab == "02")
{
 echo "Pebruari";
}
elseif($h_kab == "03")
{
 echo "Maret";
}
elseif($h_kab == "04")
{
 echo "April";
}
elseif($h_kab == "05")
{
 echo "Mei";
}
elseif($h_kab == "06")
{
 echo "Juni";
}
elseif($h_kab == "07")
{
 echo "Juli";
}
elseif($h_kab == "08")
{
 echo "Agustus";
}
elseif($h_kab == "09")
{
 echo "September";
}
elseif($h_kab == "10")
{
 echo "Oktober";
}
elseif($h_kab == "11")
{
 echo "Nopember";
}
elseif($h_kab == "12")
{
 echo "Desember";
}
echo "</option>";
}
?>
