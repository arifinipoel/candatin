<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Monitoring Perencanaan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .nav-bar {
      background-color: #008000;
      padding: 10px 30px;
    }

    .nav-bar a {
      color: white;
      margin: 0 10px;
      font-weight: 500;
      text-decoration: none;
    }

    .nav-bar a:hover {
      text-decoration: underline;
    }

    .login-box {
      background-color: white;
      border-radius: 10px;
      padding: 30px;
      width: 100%;
      max-width: 400px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .login-header {
      background-color: #3B8B4C;
      color: white;
      padding: 15px;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      display: flex;
      align-items: center;
    }

    .login-header img {
      height: 40px;
      margin-right: 10px;
    }

    .form-select,
    .form-control {
      margin-bottom: 15px;
    }

    body,
    html {
      margin: 0;
      padding: 0;
      height: 100%;
      font-family: 'Arial', sans-serif;
    }

    .dak-reguler {
      background: url('assets/img/narrow-pathway-field-background-village.jpg') no-repeat center center/cover;
      height: 100%;
      position: relative;
    }

    .dak-reguler::before {
      content: "";
      position: absolute;
      inset: 0;
      background-color: rgba(255, 255, 255, 0.2);
      /* transparansi putih */
      z-index: 1;
    }

    .dak-reguler-content {
      position: relative;
      z-index: 4;
      padding: 100px 15px;
      text-align: left;
      font-family: 'Arial', sans-serif;
      /* Ganti sesuai kebutuhan */
      font-size: 18px;
      font-weight: 100;
      color: black;
      /* Warna teks, bisa disesuaikan */
      line-height: 1;
      letter-spacing: 0.5px;
    }

    .hero h1 {
      font-size: 3rem;
      font-weight: bold;
      color: #222;
    }

    .hero h4 {
      font-weight: bold;
      color: #222;
      right: auto;
    }

    .hero p {
      color: #222;
      max-width: 800px;
      margin: 0 auto;
    }


    .dekon-tp {
      background: url('assets/img/freepik__beautiful-free-wallpaper-of-a-lush-green-rice-fiel__38759.png') no-repeat center center/cover;
      height: 100%;
      position: relative;
    }

    .dekon-tp-content {
      position: relative;
      z-index: 4;
      padding: 100px 15px;
      text-align: left;
    }

    .navbar-nav {
      margin-left: 400px;
      /* Dorong navbar-nav ke kanan */
      display: flex;
      /* Pastikan display flex */
      justify-content: flex-end;
      /* Ratakan isi ke kanan */
      /* div-align: right; */
    }

    @media (min-width: 992px) {
      .navbar-nav {
        margin-right: 10px;
      }
    }

    .navbar-custom {
      background-color: #008000;

    }

    .navbar-custom .navbar-brand,
    .navbar-custom .nav-link,
    .navbar-custom .dropdown-toggle {
      color: white;
    }

    .navbar-toggler {
      border-color: rgba(255, 255, 255, 0.5);
    }

    .navbar-toggler-icon {
      background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3e%3cpath stroke='rgba%28255, 255, 255, 1%29' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }


    .btn-green {
      background-color: #008000;
      color: white;
      border: none;
    }

    .btn-green:hover {
      background-color: #006400;
    }

    .social-icons {
      position: absolute;
      bottom: 20px;
      right: 20px;
      z-index: 2;
    }

    .social-icons a {
      color: black;
      margin: 0 5px;
      font-size: 1.2rem;
    }

    footer {
      font-size: 0.9rem;
      text-align: right;
      padding: 0 20px;
      margin-top: 10px;
    }

    section {
      scroll-margin-top: 100px;
      /* Sesuaikan dengan tinggi navbar */
      padding: 90px 20px;
    }
  </style>
</head>

<body>
  <?php
  require_once "conn.php";
  ?>
  <!-- Navigation Bar -->
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-custom fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="assets/img/logo.png" alt="Logo" width="30" class="me-2" style='margin-left:10px'> Monitoring Perencanaan
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>


    </div>
  </nav>

  <section id="dak-reguler" class="dak-reguler d-flex align-items-center justify-content-center">
    <div class="container dak-reguler-content col-md-8">
      <!-- Login Box -->
      <div class="d-flex justify-content-center align-items-center" style="height: 90%;">
        <div class="login-box">
          <div class="login-header">
            <img src="assets/img/logo.png" alt="Logo">
            <h5 class="mb-0">Monitoring Perencanaan</h5>
          </div>
          <form class="p-3" action="login.php" method="post">
            <label class="form-label" for="form3Example3">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Isikan Username" autofocus required>
            <label class="form-label" for="form3Example4">Password</label>
            <input type="password" name="password" class="form-control" placeholder="Isikan Password" required>
            <label class="form-label" for="form3Example4">Tahun </label>
            <select name="tahun" class="form-select" required>
              <option value="">Pilih</option>
              <?php
              $qStrpro = "SELECT * FROM tb_tahun";
              $qExecjab = mysqli_query($koneksi, $qStrpro);
              while ($resultjab = mysqli_fetch_array($qExecjab)) {
                echo "<option value='" . $resultjab['tahun'] . "'>" . $resultjab['tahun'] . "</option>";
              }
              ?>
            </select>
            <button class="btn btn-primary w-100">LOGIN</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>