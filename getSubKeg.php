<?php

ini_set('display_errors', 0);
include "conn.php";

//ambil parameter
$cmbProvinsi2 = $_POST['cmbProvinsi2'];

if ($cmbProvinsi2 == '') {
     exit;
} else {


     $sqlx = "select * from tb_subkegiatan_dak_lap";
     $getNamaProvinsix = mysqli_query($koneksi, $sqlx);
     while ($datax = mysqli_fetch_array($getNamaProvinsix)) {
          //  $desa1=strtolower($data[nm_desa]);
          $desa2 = ucwords($desa1);
          echo "<option value='9999'>Semua Kabupatensss</option>";
          echo "<option value='$data[kd_kab]'>$datax[namasubkegiatan]</option>";
     }
}
