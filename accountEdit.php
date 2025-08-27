<?php 
//memulai session yang disimpan pada browser
session_start();

//cek apakah sesuai status sudah login? kalau belum akan kembali ke form login
if($_SESSION['tipe_login']!="1" and $_SESSION['tipe_login']!="2" and $_SESSION['tipe_login']!="3" and $_SESSION['tipe_login']!="4"){
//melakukan pengalihan
header("location:logout.php");
} 
include "conn.php";
$sqlData  = "select * from tb_user where id_user='$_SESSION[id_user]'";
$qryData  = mysqli_query($koneksi,$sqlData);
$data = mysqli_fetch_array($qryData);

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
                    <?php include "menuEdit.php";?>
                    <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h4>
                        Untuk melanjutkan anda diwajibkan merubah password terlebih dahulu<br>
                    </h4>
                   
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="box box-default">
                            
                                <!-- form start -->
                                
                                <form method="post" action="accountConfirm" onsubmit="return validasi_input(this)">	
                                    
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Username</font></label>
                                            <input type="text" name='username' value="<?php echo "$data[username]";?>" class="form-control" id="exampleInputEmail1" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Password Baru<font color="red">*)</font></label>
                                            <input type="password" name='password' minlength="8" class="form-control" id="password" placeholder="Password">*) Min 8 karakter kombinasi huruf dan angka
                                        </div>

                                        
                                      
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <input type='hidden' name='idkegiatan' value='<?php echo "$_POST[idkegiatan]";?>'>
                                        <input type='hidden' name='idsubkeg' value='<?php echo "$_POST[idsubkeg]";?>'>
                                        <input type='hidden' name='namasubkegiatan' value='<?php echo "$_POST[namasubkegiatan]";?>'>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        </form><br><br>
                                       
                                    </div>
       
                            </div><!-- /.box -->

                            

                                    </form>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <script src="select2-master/dist/js/select2.min.js"></script>
        <script>
            $(document).ready(function () {
                $("#cmbNegara").select2({
                    placeholder: "Please Select"
                });

                $("#cmbProvinsi").select2({
                    placeholder: "Please Select"
                });
            });
        </script>
    </body>
</html>