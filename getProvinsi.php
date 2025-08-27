<?php

//ini_set('display_errors',0);
include "conn.php";

//ambil parameter
$idNegara = $_POST['idNegara'];

if ($idNegara == '') {
     exit;
} else {
     echo "<option value=''>--Pilih--</option>";

     $sql = "select * from tab_subsek_klasifik where kode='$idNegara' order by klasifik";
     $getNamaProvinsi = mysqli_query($koneksi, $sql);
     while ($data = mysqli_fetch_array($getNamaProvinsi)) {
          //  $desa1=strtolower($data[desc_klasifik]);
          $desa2 = ucwords($desa1);
          echo "<option value='$data[klasifik]'>$desa2</option>";
     }
     exit;
}
