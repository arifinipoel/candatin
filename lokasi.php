<?php 
//memulai session yang disimpan pada browser
session_start();

//cek apakah sesuai status sudah login? kalau belum akan kembali ke form login
if($_SESSION['tipe_login']!="1"){
//melakukan pengalihan
header("location:logout.php");
} 
include "conn.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <?php include 'icon.php';?>
		<title><?php include 'title.php';?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- fullCalendar -->
        <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="#" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Emonev DAK
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
                                <span><?php echo "$_SESSION[nama_petugas]";?> <i class="caret"></i></span>
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
                            <p>Welcome, <?php echo "$_SESSION[nama_petugas]";?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    
                   
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <?php include "menu.php";?>
                    <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Lokasi Kegiatan
                        <h4><?php echo "$_REQUEST[namasubkegiatan]";?></h4>
                    </h1>
                    
                </section><br>
                        <!--
                        <form method="post" action="tambah_lokasi">
						<div style='margin-left:20px'>
                        <input type='hidden' name='idkegiatan' value='<?php echo "$_REQUEST[idkegiatan]";?>'>
                        <input type='hidden' name='idsubkeg' value='<?php echo "$_REQUEST[idsubkeg]";?>'>
                        <input type='hidden' name='namasubkegiatan' value='<?php echo "$_REQUEST[namasubkegiatan]";?>'>
						<button type="submit" class="btn btn-success">Tambah Lokasi</button>
						</div>
						</form>
                        !-->
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                               
                                
                                <div class="box-body table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Aksi</th>
                                                <th>Kecamatan</th>
                                                <th>Desa</th>
                                                <th>Alokasi Anggaran Fisik</th>
                                                <th>Alokasi Anggaran Penunjang</th>
                                                <th>Volume</th>
                                                <th>Mekanisme Pelaksanaan</th>
                                                <th>Jumlah Penerima Manfaat</th>
                                                <th>Foto Lokasi</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i=1;
                                        $qryx="select * from tb_trans_dpa where idkegiatan='$_REQUEST[idkegiatan]' and idsubkeg='$_REQUEST[idsubkeg]'";
                                        $resultx=mysqli_query($koneksi,$qryx);
                                        while ($yapx = mysqli_fetch_array($resultx))
                                        {
                                            
                                            echo "
                                            <tr>
                                                <td>$i</td>
                                                <td align=left>"; 
                                        ?>
										<div class="btn-group">
										<button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Aksi <span class="caret"></span></button>
										<ul class="dropdown-menu" role="menu">
										
										<form method='post' action='frmedit_lokasi'>
										<button type="submit" class="btn btn-link">Edit Data</button>
                                        <input type='hidden' name='iddak' value='<?php echo "$yapx[iddak]";?>'>
										<input type='hidden' name='idkegiatan' value='<?php echo "$_REQUEST[idkegiatan]";?>'>
                                        <input type='hidden' name='idsubkeg' value='<?php echo "$_REQUEST[idsubkeg]";?>'>
                                        <input type='hidden' name='namasubkegiatan' value='<?php echo "$_REQUEST[namasubkegiatan]";?>'>
										</form>
										<form method='post' action='qdel_lokasi'>
										<button type="submit" class="btn btn-link" onclick="return confirm('Apakah anda akan menghapus data ini ?')">Hapus Data</button>
										<input type='hidden' name='iddak' value='<?php echo "$yapx[iddak]";?>'>
                                        <input type='hidden' name='idkegiatan' value='<?php echo "$_REQUEST[idkegiatan]";?>'>
                                        <input type='hidden' name='idsubkeg' value='<?php echo "$_REQUEST[idsubkeg]";?>'>
                                        <input type='hidden' name='namasubkegiatan' value='<?php echo "$_REQUEST[namasubkegiatan]";?>'>
										<input type='hidden' name='foto_lokasi' value='<?php echo "$yapx[foto_lokasi]";?>'>
										</form>
										<form method='post' action='kegiatan_penunjang'>
										<button type="submit" class="btn btn-link">Dana Penunjang</button>
										<input type='hidden' name='iddak' value='<?php echo "$yapx[iddak]";?>'>
										<input type='hidden' name='idkegiatan' value='<?php echo "$_REQUEST[idkegiatan]";?>'>
                                        <input type='hidden' name='idsubkeg' value='<?php echo "$_REQUEST[idsubkeg]";?>'>
                                        <input type='hidden' name='namasubkegiatan' value='<?php echo "$_REQUEST[namasubkegiatan]";?>'>
                                        <input type='hidden' name='kode_kec' value='<?php echo "$yapx[iddak]";?>'>
                                        <input type='hidden' name='kode_desa' value='<?php echo "$yapx[iddak]";?>'>
                                        </form>
                                        
										</ul>
										</div>
										</td>";
                                        ?>

                                                <td valign="top">
                                                <?php 
                                                $qryKec="SELECT * FROM tbldaerah where id_daerah='$yapx[kdkec]'";
                                                $resultKec=mysqli_query($koneksi,$qryKec);
                                                $dataKec=mysqli_fetch_array($resultKec);
                                                echo $dataKec['deskripsi'];
                                                ?>
                                            </td>
                                            <td valign=top>
                                               
                                                 <?php 
                                                 $qryDesa="SELECT * FROM tbldesa where id_desa='$yapx[kddesa]'";
                                                 $resultDesa=mysqli_query($koneksi,$qryDesa);
                                                 $dataDesa=mysqli_fetch_array($resultDesa);
                                                 echo "$dataDesa[nm_desa]";
                                                 echo "
                                            </td>

                                                <td>$yapx[alokasi_anggaran_fisik]</td>
                                                <td>-</td>
                                                <td>$yapx[volume]</td>
                                                <td>$yapx[mekanisme_pelaksanaan]</td>
                                                <td>$yapx[jum_penerima_manfaat] $yapx[jenis_penerima_manfaat]</td>
                                                <td>$yapx[foto_lokasi]</td>";
                                                
                                          
                                            echo "</tr>";
                                           
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
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>

    </body>
</html>