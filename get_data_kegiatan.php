<?php
include "conn.php";

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($koneksi, $_GET['id']);
    $query = mysqli_query($koneksi, "SELECT * FROM tm_kegiatan WHERE idkegiatan='$id' LIMIT 1");
    $row = mysqli_fetch_assoc($query);
    echo json_encode($row);
}
