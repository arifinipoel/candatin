<?php 
//memulai session yang disimpan pada browser
session_start();

//cek apakah sesuai status sudah login? kalau belum akan kembali ke form login
if($_SESSION['tipe_login']!="1" and $_SESSION['tipe_login']!="2" and $_SESSION['tipe_login']!="3" and $_SESSION['tipe_login']!="4"){
//melakukan pengalihan
header("location:logout.php");
} 
include "conn.php";
$text = str_replace(' ', '', $_REQUEST['password']); 
$password_ok = mysqli_real_escape_string($koneksi,$text); 

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
        
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />


    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="#" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                <?php include "title.php"; echo "$_SESSION[tahun]";?>
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
                        Konfirmasi Ubah Password<br>
                    </h4>
                   
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            
                            
                                <!-- form start -->
                                <div class="alert alert-warning">
								<font size='3'><?php 
						$pwd = trim($password_ok);
						if(!preg_match("/^[a-zA-Z0-9]*$/", $pwd))
						{
						?>
						Password baru anda tidak sesuai ketentuan, password harus terdiri dari huruf dan angka<br>silahkan diulangi kembali
						<input type='hidden' name='password_baru' value='<?php echo "$pwd";?>'>
						<br><a href="accountEdit" class="btn btn-warning" role="button">KEMBALI</a></div></div>
						<?php 
						}
						else
						{
							if($pwd=="")
							{
							?>
							Password baru anda tidak sesuai ketentuan, password harus terdiri dari huruf dan angka<br>silahkan diulangi kembali
							<br><a href="accountEdit" class="btn btn-warning" role="button">KEMBALI</a></div>
							<?php 
						    }
							elseif($pwd!="")
							{
							?>
							Password baru anda adalah <br>
							<b><div style='background-color:red;color:white'><?php echo "$pwd";?></div></b>
							Selanjutnya anda akan diarahkan keluar dari aplikasi dan silahkan login dengan password baru
							<form class="form-horizontal" role="form" method="post" action="accountConfirmEdit">
							<input type='hidden' name='password_baru' value='<?php echo "$pwd";?>'>
							<button class="btn btn-primary" name="submit" type="submit"   onclick="return confirm('Apakah anda akan merubah password, jika ya silahkan login dengan pasword yang baru ?')">YA, UBAH PASSWORD</button>
							<a href="accountEdit" class="btn btn-warning" role="button">BATALKAN</a></div>
							</form>
							
							<?php 
							}
						}
						?>
                               
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