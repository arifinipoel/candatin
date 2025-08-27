<?php
// Ambil dan validasi input
$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');
$tahun = intval($_POST['tahun'] ?? 0);

if (empty($username) || empty($password)) {
    header("location:index");
    exit;
}

// Buat koneksi
$koneksi = new mysqli("localhost", "root", "", "monitoring_pusdatin");

if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}

// Query menggunakan prepared statement
$sql = "SELECT id_user, edited, username, password_new AS password, tipe_dana, kode_prop, kode_kab, id_prop, id_dati2, nama_kab, level 
        FROM tb_user 
        WHERE username = ? ";
if (!$stmt = $koneksi->prepare($sql)) {
    die("Error pada prepare statement: " . $koneksi->error);
}
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

// Cek apakah user ditemukan
if ($result && $result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Verifikasi password
    if (password_verify($password, $user['password'])) {
        // Set session
        session_start();
        $_SESSION['username'] = $user['username'];
        $_SESSION['id_user'] = $user['id_user'];
        $_SESSION['status'] = "sudah_login";
        $_SESSION['tipe_login'] = $user['tipe_dana'];
        $_SESSION['nama_petugas'] = $user['nama_kab'];
        $_SESSION['level'] = $user['level'];
        $_SESSION['tahun'] = $tahun;
        $_SESSION['edited'] = $user['edited'];

        // Redirect sesuai tipe dana
        if ($user['edited'] == 1) {
            header("location:main.php");
        } else {
            header("location:accountEdit.php");
        }
        exit;
    } else {
        // Password salah
        header("location:index");
        exit;
    }
} else {
    // User tidak ditemukan
    header("location:index");
    exit;
}

// Tutup koneksi
$stmt->close();
$koneksi->close();
?>
