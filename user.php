<?php 
//memulai session yang disimpan pada browser
session_start();

//cek apakah sesuai status sudah login? kalau belum akan kembali ke form login
if($_SESSION['tipe_login']!="2"){
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
        <link href="xcss/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
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

        <style type="text/css">
        .display {font-size:12px;color:#333333;width:100%;border-width: 1px;border-color: black;border-collapse: collapse;}
        .display th {font-size:12px;color:black;background-color:#e3f5fa;border-width: 1px;border-style: solid;border-color: #729ea5;text-align:left;}
        .display tr {background-color:white;}
        .display td {font-size:14px;border-width: 1px;padding: 8px;border-style: solid;border-color: silver;}
        .display tr:hover {background-color:#FFFFA4;}
        </style>

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
                        Daftar User
                        
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
                  
                            
                            <div class="panel-body">
							<div class="table-responsive">
								<table width=100% class="display"  id="example1">
									<thead>       
                                            <tr>
                                                <th>No</th>
                                                <th>Kabupaten</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i=1;
                                       $qryx="select * from tb_user where tipe_dana='$_REQUEST[tipe]'";
                                        $resultx=mysqli_query($koneksi,$qryx);
                                        while ($yapx = mysqli_fetch_array($resultx))
                                        {
                                            
                                            echo "
                                            <tr>
                                                <td>$i</td>
                                                <td>$yapx[nama_kab]</td>
                                                <td>$yapx[username]</td>
                                                <td>$yapx[password]</td>
                                            </tr>";
                                           
                                            $i++;
                                        
                                        }
                                        echo "</tbody>";
                                           
                                        ?>
                                       
                                        <tfoot>
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
					$('#example1').dataTable();
					});
					</script>
					
					<script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
</script>

    </body>
</html>