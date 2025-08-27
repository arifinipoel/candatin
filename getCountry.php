<?php

//ini_set('display_errors',0);
include "conn.php";

//ambil parameter
$idNegara = $_POST['idNegara'];

if ($idNegara == '') {
     exit;
} else {
     echo "<option value=''>--Pilih Kabupaten--</option>";

     $sql = "select * from tbldati2 where id_prop='$idNegara'";
     $getNamaProvinsi = mysqli_query($koneksi, $sql);
     while ($data = mysqli_fetch_array($getNamaProvinsi)) {
          //  $desa1=strtolower($data[nm_desa]);
          $desa2 = ucwords($desa1);
          echo "<option value='$data[id_dati2]'>$data[nama_dati2]</option>";
     }
     exit;
}
