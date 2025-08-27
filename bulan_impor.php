<?php
include "conn.php";
$kdprop = $_GET['idprop'];
$kdkab = $_GET['idkab'];
?>
<option value="">-- Pilih Bulan Akhir--</option>
<?php 
$sqlKec="select distinct procmth from bulan_impor_asem where procyear='$kdprop' order by procmth";
$rKec=mysqli_query($koneksi,$sqlKec);
while ($bulan_akhir=mysqli_fetch_array($rKec))
{
$h_kec=$bulan_akhir[procmth];
echo "<option value=$h_kec>";
if($h_kec == "01")
{
 echo "Januari";
}
elseif($h_kec == "02")
{
 echo "Pebruari";
}
elseif($h_kec == "03")
{
 echo "Maret";
}
elseif($h_kec == "04")
{
 echo "April";
}
elseif($h_kec == "05")
{
 echo "Mei";
}
elseif($h_kec == "06")
{
 echo "Juni";
}
elseif($h_kec == "07")
{
 echo "Juli";
}
elseif($h_kec == "08")
{
 echo "Agustus";
}
elseif($h_kec == "09")
{
 echo "September";
}
elseif($h_kec == "10")
{
 echo "Oktober";
}
elseif($h_kec == "11")
{
 echo "Nopember";
}
elseif($h_kec == "12")
{
 echo "Desember";
}
echo "</option>";
}
?>