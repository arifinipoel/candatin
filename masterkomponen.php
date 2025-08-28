<?php
session_start();

if ($_SESSION['tipe_login'] != "1" and $_SESSION['tipe_login'] != "4") {
  header("location:logout.php");
}
include "conn.php";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <?php include 'icon.php'; ?>
  <title><?php include 'title.php'; ?></title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- bootstrap 3.0.2 -->
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- font Awesome -->
  <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <!-- Ionicons -->
  <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <!-- Morris chart -->
  <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />

  <!-- DataTables CSS (dengan tema Bootstrap 5) -->
  <!-- <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet"> -->

  <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css" rel="stylesheet">

  <!-- Select2 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

  <!-- Theme style -->
  <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

</head>

<body class="skin-blue">
  <!-- header logo: style can be found in header.less -->
  <header class="header">
    <a href="#" class="logo">
      <!-- Add the class icon to your logo image or logo icon to add the margining -->
      Monitoring <?php echo "$_SESSION[tahun]"; ?>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-right">
        <ul class="nav navbar-nav">



          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="glyphicon glyphicon-user"></i>
              <span><?php echo "$_SESSION[nama_petugas]"; ?> <i class="caret"></i></span>
            </a>

          </li>
        </ul>
      </div>
    </nav>
  </header>
  <div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <!--
                        <div class="pull-center image">
                            <img src="img/avatar3.png" class="img-circle" alt="User Image"  style='text-align:center'/>
                        </div>
                        !-->
          <div class="pull-left info">
            <p>Welcome, <?php echo "$_SESSION[nama_petugas]"; ?></p>

            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>


        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php include "menu.php"; ?>
        <!-- /.sidebar -->
    </aside>

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h3>
          RO <b><?php echo $_REQUEST['nama_kegiatan']; ?></b> >>
          Komponen <b><?php echo $_REQUEST['nama_subkegiatan']; ?></b>
          <h4></h4>
        </h3>

      </section><br>

      <div class="modal fade" id="exampleModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">

        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel"><b>Tambah Jenis Belanja</b></h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">

              </button>
            </div>
            <div class="modal-body">
              <table width="606" border="0">
                <form role="form" method="post" action="qinsert_komponen" onsubmit="return validasi_input(this)" enctype='multipart/form-data'>
                  <input type="hidden" name="idsubkegiatan" value="<?php echo $_REQUEST['idsubkegiatan']; ?>">
                  <input type="hidden" name="kode_subkegiatan" value="<?php echo $_REQUEST['kode_subkegiatan']; ?>">
                  <input type="hidden" name="nama_subkegiatan" value="<?php echo $_REQUEST['nama_subkegiatan']; ?>">
                  <input type="hidden" name="kode_kegiatan" value="<?php echo $_REQUEST['kode_kegiatan']; ?>">
                  <input type="hidden" name="nama_kegiatan" value="<?php echo $_REQUEST['nama_kegiatan']; ?>">
                  <tr>
                    <td>RO <font color="red"></font>
                    </td>
                    <td>
                      <input type="text" size='35' name='kode_kegiatans'
                        value="<?php echo isset($_REQUEST['kode_kegiatan'], $_REQUEST['nama_kegiatan'])
                                  ? $_REQUEST['kode_kegiatan'] . ' - ' . $_REQUEST['nama_kegiatan']
                                  : ''; ?>"
                        class="form-control" id="kode_kegiatan" readonly>
                    </td>
                  </tr>
                  <tr>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Komponen <font color="red"></font>
                    </td>
                    <td>
                      <input type="text" size='35' name='kode_subkegiatans'
                        value="<?php echo isset($_REQUEST['kode_subkegiatan'], $_REQUEST['nama_subkegiatan'])
                                  ? $_REQUEST['kode_subkegiatan'] . ' - ' . $_REQUEST['nama_subkegiatan']
                                  : ''; ?>"
                        class="form-control" id="kode_subkegiatan" readonly>
                    </td>
                  </tr>
                  <tr>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Pilih Jenis Belanja
                    </td>
                    <td>
                      <select class="form-control kegiatan-dropdown"
                        name="id_kegiatan"
                        id="id_kegiatan_create"
                        data-modal="exampleModalAdd"
                        data-kode="kode_kegiatan_create"
                        data-nama="nama_kegiatan_create"
                        style="width: 100%;" required>
                        <option value="">-- Pilih Jenis Belanja --</option>
                        <?php
                        $query = mysqli_query($koneksi, "SELECT idkegiatan, kode_kegiatan, nama_kegiatan FROM tm_kegiatan ORDER BY nama_kegiatan ASC");
                        while ($row = mysqli_fetch_assoc($query)) {
                          echo "<option value='" . $row['idkegiatan'] . "'>" . $row['kode_kegiatan'] . " - " . $row['nama_kegiatan'] . "</option>";
                        }
                        ?>
                      </select>
                    </td>
                  </tr>
                  <tr>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Kode Belanja<font color="red">*)</font>
                    </td>
                    <td>
                      <input type="text" size='35' name='kode_komponen' class="form-control" id="kode_kegiatan_create" readonly required>
                    </td>
                  </tr>
                  <tr>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Jenis Belanja <font color="red">*)</font>
                    </td>
                    <td>
                      <input type="text" size='35' class="form-control" name="nama_komponen" id="nama_kegiatan_create" cols="30" readonly required>
                    </td>
                  </tr>
                  <tr>
                    <td></td>
                  </tr>
                  <tr>
                    <td>PAGU<font color="red">*)</font>
                    </td>
                    <td><input type="number" min="0" size='35' name='pagu' class="form-control" id="pagu" required></td>
                  </tr>
                  <tr>
                    <td></td>
                  </tr>
                  <tr>
                    <td>Tagging<font color="red">*)</font>
                    </td>
                    <td>
                      <select name="tagging" id="tagging" class="form-control" required>
                        <option value="">Pilih</option>
                        <option value="perjadin">Perjadin</option>
                        <option value="non_perjadin">Non Perjadin</option>
                      </select>
                    </td>
                  </tr>
              </table>
            </div>
            <div class="modal-footer" style="text-align:right">
              <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batalkan</button>
              <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> &nbsp; Simpan</a>
                </form>
            </div>
          </div>
        </div>
      </div>
      <div style='margin-left:20px'>
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalAdd">Tambah Jenis Belanja</button>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box-body table-responsive">
                <table id="tabelPegawai" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode</th>
                      <th>Jenis Belanja</th>
                      <th>PAGU</th>
                      <th>Tagging</th>
                      <th>Aksi</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    $qryx = "select * from tb_komponen where idsubkegiatan='$_REQUEST[idsubkegiatan]' and tahun='$_SESSION[tahun]'";
                    $resultx = mysqli_query($koneksi, $qryx);
                    while ($yapx = mysqli_fetch_array($resultx)) {
                      $pagu_format = number_format($yapx['pagu']);
                      echo "
                                            <tr>
                                                <td>$i</td>
                                            ";

                      echo "
                                        <td>$yapx[kode_komponen]</td>
                                        <td>$yapx[nama_komponen]</td>    
										<td align='right'>$pagu_format</td>
										<td>$yapx[tagging]</td>
                                        ";
                    ?>
                      <td align="left">
                        <div class="btn-group">
                          <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            Aksi <span class="caret"></span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li>
                              <!-- Tombol Trigger Modal Edit -->
                              <button type="button" class="btn btn-link" data-toggle="modal" data-target="#editModal_<?php echo $yapx['idkomponen']; ?>">Edit Data</button>
                            </li>
                            <li>
                              <!-- Tombol Hapus -->
                              <form method="post" action="qhapus_komponen" onsubmit="return confirm('Apakah anda akan menghapus data ini ?')" style="margin: 0;">
                                <input type="hidden" name="idkomponen" value="<?php echo "$yapx[idkomponen]"; ?>">
                                <input type="hidden" name="idsubkegiatan" value="<?php echo $_REQUEST['idsubkegiatan']; ?>">
                                <input type="hidden" name="kode_subkegiatan" value="<?php echo $_REQUEST['kode_subkegiatan']; ?>">
                                <input type="hidden" name="nama_subkegiatan" value="<?php echo $_REQUEST['nama_subkegiatan']; ?>">
                                <input type="hidden" name="kode_kegiatan" value="<?php echo $_REQUEST['kode_kegiatan']; ?>">
                                <input type="hidden" name="nama_kegiatan" value="<?php echo $_REQUEST['nama_kegiatan']; ?>">
                                <button type="submit" class="btn btn-link">Hapus Data</button>
                              </form>
                            </li>

                          </ul>
                        </div>

                        <!-- MODAL EDIT -->
                        <div class="modal fade" id="editModal_<?php echo $yapx['idkomponen']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel_<?php echo $yapx['idkomponen']; ?>" aria-hidden="true" data-backdrop="static" data-keyboard="false">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">

                              <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel_<?php echo $yapx['idkomponen']; ?>">Edit Belanja</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>

                              <div class="modal-body">
                                <table width="606" border="0">
                                  <form role="form" method="post" action="qedit_komponen" onsubmit="return validasi_input(this)" enctype='multipart/form-data'>
                                    <input type="hidden" name="idkomponen" value="<?php echo "$yapx[idkomponen]"; ?>">
                                    <input type="hidden" name="idsubkegiatan" value="<?php echo "$_REQUEST[idsubkegiatan]"; ?>">
                                    <input type="hidden" name="kode_subkegiatan" value="<?php echo "$_REQUEST[kode_subkegiatan]"; ?>">
                                    <input type="hidden" name="nama_subkegiatan" value="<?php echo "$_REQUEST[nama_subkegiatan]"; ?>">
                                    <input type="hidden" name="kode_kegiatan" value="<?php echo "$_REQUEST[kode_kegiatan]"; ?>">
                                    <input type="hidden" name="nama_kegiatan" value="<?php echo "$_REQUEST[nama_kegiatan]"; ?>">
                                    <tr>
                                      <td>RO <font color="red"></font>
                                      </td>
                                      <td>
                                        <input type="text" size='35' name='kode_kegiatans'
                                          value="<?php echo isset($_REQUEST['kode_kegiatan'], $_REQUEST['nama_kegiatan'])
                                                    ? $_REQUEST['kode_kegiatan'] . ' - ' . $_REQUEST['nama_kegiatan']
                                                    : ''; ?>"
                                          class="form-control" id="kode_kegiatan" readonly>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td></td>
                                    </tr>
                                    <tr>
                                      <td>Komponen <font color="red"></font>
                                      </td>
                                      <td>
                                        <input type="text" size='35' name='kode_subkegiatans'
                                          value="<?php echo isset($_REQUEST['kode_subkegiatan'], $_REQUEST['nama_subkegiatan'])
                                                    ? $_REQUEST['kode_subkegiatan'] . ' - ' . $_REQUEST['nama_subkegiatan']
                                                    : ''; ?>"
                                          class="form-control" id="kode_subkegiatan" readonly>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td></td>
                                    </tr>
                                    <tr>
                                      <td>Pilih Jenis Belanja
                                      </td>
                                      <td>
                                        <select class="form-control kegiatan-dropdown"
                                          name="id_kegiatans"
                                          id="id_kegiatan_edit_<?php echo $yapx['idkomponen']; ?>"
                                          data-modal="editModal_<?php echo $yapx['idkomponen']; ?>"
                                          data-kode="kode_kegiatan_<?php echo $yapx['idkomponen']; ?>"
                                          data-nama="nama_kegiatan_<?php echo $yapx['idkomponen']; ?>"
                                          style="width: 100%;">
                                          <option value="">-- Pilih Jenis Belanja --</option>
                                          <?php
                                          $query = mysqli_query($koneksi, "SELECT idkegiatan, kode_kegiatan, nama_kegiatan FROM tm_kegiatan ORDER BY nama_kegiatan ASC");
                                          while ($row = mysqli_fetch_assoc($query)) {
                                            echo "<option value='" . $row['idkegiatan'] . "' $selected>" . $row['kode_kegiatan'] . " - " . $row['nama_kegiatan'] . "</option>";
                                          }
                                          ?>
                                        </select>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>Kode Belanja <font color="red">*)</font>
                                      </td>
                                      <td>
                                        <input type="text" size='35' name="kode_komponen" id="kode_kegiatan_<?php echo $yapx['idkomponen']; ?>"
                                          value="<?php echo $yapx['kode_komponen']; ?>" class="form-control" readonly required>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td></td>
                                    </tr>
                                    <tr>
                                      <td>Jenis Belanja <font color="red">*)</font>
                                      </td>
                                      <td>
                                        <textarea class="form-control" name="nama_komponen" id="nama_kegiatan_<?php echo $yapx['idkomponen']; ?>"
                                          cols="30" readonly required><?php echo $yapx['nama_komponen']; ?></textarea>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td></td>
                                    </tr>
                                    <tr>
                                      <td>PAGU <font color="red">*)</font>
                                      </td>
                                      <td><input type="text" size='35' name='pagu' value="<?php echo $yapx['pagu']; ?>" class="form-control"
                                          id="pagu" required></td>
                                    </tr>
                                    <tr>
                                      <td></td>
                                    </tr>
                                    <tr>
                                      <td>Tagging<font color="red">*)</font>
                                      </td>
                                      <td>
                                        <select name="tagging" id="tagging" class="form-control" required>
                                          <option value="perjadin" <?php echo ($yapx['tagging'] == 'perjadin' ? 'selected' : ''); ?>>perjadin</option>
                                          <option value="non_perjadin" <?php echo ($yapx['tagging'] == 'non_perjadin' ? 'selected' : ''); ?>>non_perjadin</option>
                                        </select>
                                      </td>
                                    </tr>
                                </table>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batalkan</button>
                                  <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan</button>
                                </div>
                                </form>
                              </div>
                            </div>
                          </div>
                      </td>

                      </tr>
                    <?php
                      $i++;
                    }
                    echo "</tbody>";

                    ?>

                </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
          </div>
      </div>

      </section><!-- /.content -->
    </aside><!-- /.right-side -->
  </div><!-- ./wrapper -->


  <!-- jQuery 2.0.2 -->
  <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script> -->
  <!-- Bootstrap -->
  <!-- <script src="js/bootstrap.min.js" type="text/javascript"></script> -->
  <!-- DATA TABES SCRIPT -->
  <!-- <script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script> -->
  <!-- <script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script> -->

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

  <!-- Bootstrap 3 -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- slimScroll -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.min.js"></script>

  <!-- DataTables JS & Bootstrap 5 Integration -->
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>

  <!-- Select2 JS -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

  <!-- AdminLTE App -->
  <script src="js/AdminLTE/app.js" type="text/javascript"></script>

  <script>
    $(document).ready(function() {
      $('#tabelPegawai').DataTable({
        responsive: true,
        pageLength: 10,
        lengthMenu: [5, 10, 25, 50, 100],
        language: {
          search: "Cari:",
          lengthMenu: "Tampilkan _MENU_ data",
          info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
          paginate: {
            previous: "Sebelumnya",
            next: "Selanjutnya"
          }
        }
      });

      // Untuk semua select kegiatan (create & edit)
      $('.kegiatan-dropdown').each(function() {
        const dropdown = $(this);
        const modalId = dropdown.data('modal'); // id modal

        // Aktifkan Select2
        dropdown.select2({
          placeholder: "-- Pilih Komponen --",
          allowClear: true,
          dropdownParent: $('#' + modalId)
        });

        // Event onchange (create & edit)
        dropdown.on('change', function() {
          const id = $(this).val();

          const kodeField = $(this).data('kode'); // target input kode
          const namaField = $(this).data('nama'); // target textarea nama

          if (id) {
            $.ajax({
              url: 'get_data_kegiatan.php',
              type: 'GET',
              dataType: 'json',
              data: {
                id: id
              },
              success: function(data) {
                if (data) {
                  $('#' + kodeField).val(data.kode_kegiatan);
                  $('#' + namaField).val(data.nama_kegiatan);
                } else {
                  $('#' + kodeField).val('');
                  $('#' + namaField).val('');
                }
              },
              error: function(xhr, status, error) {
                console.error("AJAX Error: " + status + " - " + error);
              }
            });
          } else {
            $('#' + kodeField).val('');
            $('#' + namaField).val('');
          }
        });
      });
    });
  </script>

</body>

</html>