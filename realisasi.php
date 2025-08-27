<?php 
//memulai session yang disimpan pada browser
session_start();

//cek apakah sesuai status sudah login? kalau belum akan kembali ke form login
if($_SESSION['tipe_login']!="1" and $_SESSION['tipe_login']!="4"){
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
       
        <!-- DataTables CSS (dengan tema Bootstrap 5) -->
		<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
        <!-- Theme style -->
        <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="my.js"></script>
		<script type="text/javascript" src="jquery.min.js"></script>
	<style>
 .display {font-size:12px;color:#333333;width:100%;border-width: 1px;border-color: black;border-collapse: collapse;}
        .display th {font-size:12px;color:black;background-color:#e3f5fa;border-width: 1px;border-style: solid;border-color: #729ea5;text-align:left;}
        .display tr {background-color:white;}
        .display td {font-size:14px;border-width: 1px;padding: 8px;border-style: solid;border-color: silver;}
        .display tr:hover {background-color:#FFFFA4;}
		
		
  .scroll-wrapper {
    max-width: 100%;
    position: relative;
  }

  .scroll-top,
  .scroll-bottom {
    overflow-x: auto;
    overflow-y: hidden;
  }

  .scroll-top {
    height: 20px;
  }

  .scroll-top div {
    height: 1px;
  }

  .scroll-bottom {
    overflow-x: auto;
  }

  .scroll-bottom table {
    width: max-content; /* agar mengikuti isi tabel */
    min-width: 100%;
  }
</style>

<style>
  .table-container {
    position: relative;
    width: 100%;
    overflow: hidden;
  }
  .scroll-sync-wrapper {
    overflow-x: auto;
    overflow-y: hidden;
    height: 20px;
  }
  .scroll-sync-wrapper div {
    height: 1px;
  }
  .freeze-wrapper {
    display: flex;
  }
  .frozen-column {
    position: sticky;
    left: 0;
    background-color: #fff;
    z-index: 2;
  }
  .display th, .display td {
    white-space: nowrap;
  }
  
  .scroll-sync-wrapper-top {
  position: sticky;
  top: 0;
  background-color: white;
  z-index: 999;
  border-bottom: 1px solid #ccc;
}

</style>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const scrollTop = document.getElementById('scroll-top');
    const scrollBottom = document.getElementById('scroll-bottom');
    const table = scrollBottom.querySelector('table');
    const dummyDiv = scrollTop.querySelector('div');

    function syncWidth() {
      dummyDiv.style.width = table.scrollWidth + 'px';
    }

    // Sync scroll position
    scrollTop.addEventListener('scroll', () => {
      scrollBottom.scrollLeft = scrollTop.scrollLeft;
    });
    scrollBottom.addEventListener('scroll', () => {
      scrollTop.scrollLeft = scrollBottom.scrollLeft;
    });

    // Update dummy width when content/table loaded
    window.addEventListener('resize', syncWidth);
    syncWidth();
  });
</script>


  <script>
    // Sinkronisasi scroll atas dan bawah
    window.addEventListener('DOMContentLoaded', function () {
      var topScroll = document.getElementById('scroll-top');
      var bottomScroll = document.getElementById('scroll-bottom');

      topScroll.addEventListener('scroll', function () {
        bottomScroll.scrollLeft = topScroll.scrollLeft;
      });

      bottomScroll.addEventListener('scroll', function () {
        topScroll.scrollLeft = bottomScroll.scrollLeft;
      });
    });
  </script>
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="#" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Monitoring <?php echo "$_SESSION[tahun]";?>
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
                        Realisasi 1 Tahun <?php echo "$_SESSION[tahun]";?>
                        <h4></h4>
                    </h1>
                    
                </section><br>
                     <div style='margin-left:20px'>
  <form class="form-horizontal" name="registrasi" action="" method="post">	
  <div class="box-body">
    <div class="form-group row align-items-end"> <!-- agar label & input sejajar -->
      
      <!-- Kolom Minggu -->
      <div class="col-sm-2">
        <label for="minggu">Minggu</label>
        <select name="minggu" class="form-control" id="minggu" required>
          <option value="">- Pilih -</option>
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
        </select>
      </div>

      <!-- Kolom Bulan -->
      <div class="col-sm-3">
        <label for="fakultas">Bulan</label>
        <select class="form-control" name="bulan" id="fakultas" required>
          <option value="" selected>- Pilih -</option>
          <?php
          $querykeg = "SELECT * FROM tb_bulan order by id";
          $hasilkeg = mysqli_query($koneksi,$querykeg);
          while ($datakeg = mysqli_fetch_array($hasilkeg)) {
              echo "<option value='$datakeg[id]'>$datakeg[bulan]</option>";
          }
          ?>
        </select>
      </div>

      <!-- Tombol -->
      <div class="col-sm-2">
        <button type="submit" class="btn btn-primary" name="btn" style="margin-top:25px;" value="Tampilkan">
          Tampilkan
        </button>
      </div>

    </div>
  </div>
</form>
				<?php
				if (isset($_REQUEST['btn']) && $_REQUEST['btn'] == "Tampilkan") {

                ?>


						
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            
                               
                            
							<?php 
							 $queryBulan = "SELECT * FROM tb_bulan where id='$_REQUEST[bulan]'";
							  $hasilBulan = mysqli_query($koneksi,$queryBulan);
							 $dataBulan = mysqli_fetch_array($hasilBulan);
							
							
							?>
							<div class='alert alert-success' role='alert'><i class='fa fa-check'></i><b>Realisasi Minggu  <?php echo "$_REQUEST[minggu] Bulan $dataBulan[bulan] $_SESSION[tahun]";?></b></div>
                
							
                               
						<div class="table-container">
						  <div class="scroll-sync-wrapper" id="scroll-top">
							<div style="width: 2000px"></div>
						</div>
						
						<div class="scroll-bottom" id="scroll-bottom">
						   
                        
                            <table class="display">
                                        <thead>
                                            <tr style='background-color:#61ba57;font-weight: bold'>
                                                <td>Kode</th>
                                                <td>Nama Kegiatan</th>
                                                <td>Pagu <?php echo "$_SESSION[tahun]";?></th>
												<!--
                                                <td>Blokir</th>
												<td>Total Pagu-<br>Blokir (Pagu Aktif)</th>
												!-->
												<td>Realisasi (Rp)</th>
												<td>% Realisasi</th>
												<td>Pagu Perjadin</th>
												<td>Realisasi Perjadin</th>
												<td>%</th>
												<td>Sisa</th>
												<td>Pagu Non Perjadin</th>
												<td>Realisasi Non Perjadin</th>
												<td>%</th>
												<td>Sisa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i=1;
                                        $qryx="select * from tb_kegiatan where tahun='$_SESSION[tahun]'";
                                        $resultx=mysqli_query($koneksi,$qryx);
                                        while ($yapx = mysqli_fetch_array($resultx))
                                        {
										//total pagu 
										$qrypagukomp="select sum(pagu) as pagusubkeg from view_kegiatan where tahun='$_SESSION[tahun]' and idkegiatan='$yapx[idkegiatan]'";
                                        $resultpagukomp=mysqli_query($koneksi,$qrypagukomp);
                                        $yapxpagukomp = mysqli_fetch_array($resultpagukomp);
										$pagu_subkeg_format=number_format($yapxpagukomp['pagusubkeg']);
										
										//total realisasi 
										$qryrealisasikomp="select sum(rp_realisasi) as total_realisasi from view_realisasi where tahun='$_SESSION[tahun]' and bulan='$_REQUEST[bulan]' and minggu='$_REQUEST[minggu]' and idkegiatan='$yapx[idkegiatan]'";
                                        $resultrealisasikomp=mysqli_query($koneksi,$qryrealisasikomp);
                                        $yapxrealisasikomp = mysqli_fetch_array($resultrealisasikomp);
										$total_realisasi_format=number_format($yapxrealisasikomp['total_realisasi']);
										
										//persen realisasi
										if (!empty($yapxrealisasikomp['total_realisasi']) && $yapxpagukomp['pagusubkeg'] != 0) 
										{
											$persen = ($yapxrealisasikomp['total_realisasi'] / $yapxpagukomp['pagusubkeg']) * 100;
										} 
										else 
										{
											$persen = 0; // atau bisa dikosongkan/null tergantung kebutuhan
										}
										$persen_realisasi_format=number_format($persen,2);
										
										//pagu perjadin
										$qrypaguperjadin="select sum(pagu) as pagu_perjadin from view_kegiatan where tahun='$_SESSION[tahun]' and idkegiatan='$yapx[idkegiatan]' and tagging='perjadin'";
                                        $resultpaguperjadin=mysqli_query($koneksi,$qrypaguperjadin);
                                        $yapxpaguperjadin = mysqli_fetch_array($resultpaguperjadin);
										$pagu_perjadin_format=number_format($yapxpaguperjadin['pagu_perjadin']);
										
										//total realisasi perjadin
										$qry_realisasi_total_perjadin="select sum(rp_realisasi) as total_realisasi_perjadin from view_realisasi where tahun='$_SESSION[tahun]' and bulan='$_REQUEST[bulan]' and minggu='$_REQUEST[minggu]' and idkegiatan='$yapx[idkegiatan]' and tagging='perjadin'";
                                        $result_realisasi_total_perjadin=mysqli_query($koneksi,$qry_realisasi_total_perjadin);
                                        $yapx_realisasi_total_perjadin = mysqli_fetch_array($result_realisasi_total_perjadin);
										$total_realisasi_total_perjadin_format=number_format($yapx_realisasi_total_perjadin['total_realisasi_perjadin']);
										
										//persen realisasi perjadin
										if (!empty($yapx_realisasi_total_perjadin['total_realisasi_perjadin']) && $yapxpaguperjadin['pagu_perjadin'] != 0) 
										{
											$persen_perjadin = ($yapx_realisasi_total_perjadin['total_realisasi_perjadin'] / $yapxpaguperjadin['pagu_perjadin']) * 100;
										} 
										else 
										{
											$persen_perjadin = 0; // atau bisa dikosongkan/null tergantung kebutuhan
										}
										$persen_perjadin_format=number_format($persen_perjadin,2);
										
										//sisa perjadin
										$sisa_total_perjadin=number_format($yapxpaguperjadin['pagu_perjadin']-$yapx_realisasi_total_perjadin['total_realisasi_perjadin']);
										
										//pagu non perjadin
										$qrypagu_nonperjadin="select sum(pagu) as pagu_non_perjadin from view_kegiatan where tahun='$_SESSION[tahun]' and idkegiatan='$yapx[idkegiatan]' and tagging='non_perjadin'";
                                        $resultpagu_nonperjadin=mysqli_query($koneksi,$qrypagu_nonperjadin);
                                        $yapxpagu_nonperjadin = mysqli_fetch_array($resultpagu_nonperjadin);
										$pagu_nonperjadin_format=number_format($yapxpagu_nonperjadin['pagu_non_perjadin']);
										
										//total realisasi non perjadin
										$qry_realisasi_total_nonperjadin="select sum(rp_realisasi) as total_realisasi_nonperjadin from view_realisasi where tahun='$_SESSION[tahun]' and bulan='$_REQUEST[bulan]' and minggu='$_REQUEST[minggu]' and idkegiatan='$yapx[idkegiatan]' and tagging='non_perjadin'";
                                        $result_realisasi_total_nonperjadin=mysqli_query($koneksi,$qry_realisasi_total_nonperjadin);
                                        $yapx_realisasi_total_nonperjadin = mysqli_fetch_array($result_realisasi_total_nonperjadin);
										$total_realisasi_total_nonperjadin_format=number_format($yapx_realisasi_total_nonperjadin['total_realisasi_nonperjadin']);
										
										//persen realisasi non perjadin
										if (!empty($yapx_realisasi_total_nonperjadin['total_realisasi_nonperjadin']) && $yapxpagu_nonperjadin['pagu_non_perjadin'] != 0) 
										{
											$persen_non_perjadin = ($yapx_realisasi_total_nonperjadin['total_realisasi_nonperjadin'] / $yapxpagu_nonperjadin['pagu_non_perjadin']) * 100;
										} 
										else 
										{
											$persen_non_perjadin = 0; // atau bisa dikosongkan/null tergantung kebutuhan
										}
										$persen_non_perjadin_format=number_format($persen_non_perjadin,2);
										
										//sisa non perjadin
										$sisa_total_non_perjadin=number_format($yapxpagu_nonperjadin['pagu_non_perjadin']-$yapx_realisasi_total_nonperjadin['total_realisasi_nonperjadin']);
										
										
										echo "
										<tr>
                                        <td style='background-color:yellow'><b>$yapx[kode_kegiatan]</b></td>
                                        <td style='background-color:yellow'><b>$yapx[nama_kegiatan]</b></td>   
										<td style='background-color:yellow;text-align:right'><b>$pagu_subkeg_format</b></td>
										<td style='background-color:yellow;text-align:right'><b>$total_realisasi_format</b></td>
										<td style='background-color:yellow;text-align:right'><b>";
										
										echo "$persen_realisasi_format</b></td>
										<td style='background-color:yellow;text-align:right'><b>$pagu_perjadin_format</b></td>
										<td style='background-color:yellow;text-align:right'><b>$total_realisasi_total_perjadin_format</b></td>
										<td style='background-color:yellow;text-align:right'><b>$persen_perjadin_format</b></td>
										<td style='background-color:yellow;text-align:right'><b>$sisa_total_perjadin</b></td>
										<td style='background-color:yellow;text-align:right'><b>$pagu_nonperjadin_format</b></td>
										<td style='background-color:yellow;text-align:right'><b>$total_realisasi_total_nonperjadin_format</b></td>
										<td style='background-color:yellow;text-align:right'><b>$persen_non_perjadin_format</b></td>
										<td style='background-color:yellow;text-align:right'><b>$sisa_total_non_perjadin</b></td>
                                        </tr>";
										
										//subkegiatan 
										$qrysubkeg = "SELECT * 
													  FROM tb_subkegiatan 
													  WHERE tahun='" . mysqli_real_escape_string($koneksi, $_SESSION['tahun']) . "' 
														AND idkegiatan='" . mysqli_real_escape_string($koneksi, $yapx['idkegiatan']) . "' 
													  ORDER BY kode_subkegiatan"; 
                                        $resultsubkeg=mysqli_query($koneksi,$qrysubkeg);
                                        while($yapxsubkeg = mysqli_fetch_array($resultsubkeg))
										{
										$pagu_format=number_format($yapxsubkeg['pagu']);	
										echo "
                                        <tr>  
										<td align='center'><b>$yapxsubkeg[kode_subkegiatan]</b></td>
										<td>"; ?>
										
										
									
										
										<?php 
										echo "<b>$yapxsubkeg[nama_subkegiatan]</b></td>
										<td align='right'>$pagu_format</td>
										<td align='right'>-</td>
										<td align='right'>-</td>
										<td align='right'></td>
										<td align='right'></td>
										<td align='right'></td>
										<td align='right'></td>
										<td align='right'></td>
										<td align='right'></td>
										<td align='right'></td>
										<td align='right'></td>
										
										</tr>";
										
										
										//komponen
										$qrykomp="select * from tb_komponen where tahun='$_SESSION[tahun]' and idsubkegiatan='$yapxsubkeg[idsubkegiatan]'";
                                        $resultkomp=mysqli_query($koneksi,$qrykomp);
                                        while($yapxkomp = mysqli_fetch_array($resultkomp))
                                        {
										$pagu_format=number_format($yapxkomp['pagu']);	
										//$realisasi_format=number_format($yapxkomp['rp_realisasi']);
										//$qryrealisasi="select * from tb_realisasi where minggu='$_REQUEST[minggu]' and bulan='$_REQUEST[bulan]' and idsubkegiatan='$yapxsubkeg[idsubkegiatan]' order by kode_subkegiatan";
                                        $qryrealisasi = "SELECT * 
														 FROM tb_realisasi 
														 WHERE minggu='" . mysqli_real_escape_string($koneksi, $_REQUEST['minggu']) . "' 
														   AND bulan='" . mysqli_real_escape_string($koneksi, $_REQUEST['bulan']) . "' 
														   AND idkomponen='" . mysqli_real_escape_string($koneksi, $yapxkomp['idkomponen']) . "' 
														 ORDER BY idkomponen";  // pakai idsubkegiatan, bukan kode_subkegiatan
										//echo "<br><br>bbb $qryrealisasi<br><br>";
											$resultrealisasi=mysqli_query($koneksi,$qryrealisasi);
                                        $yapxrealisasi = mysqli_fetch_array($resultrealisasi);
										
										$realisasi_format=number_format($yapxrealisasi['rp_realisasi']);
										echo "
										<tr>  
										<td align='center'>$yapxkomp[kode_komponen]</td>
										<td>";?>
										<div class="modal fade" id="editModal_<?php echo $yapxkomp['idkomponen']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
										
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Input Realisasi</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
											<form class="form-horizontal" action="qinsertRealisasi" name="modal-popup" enctype="multipart/form-data" method="POST" id="form-edit">
											<input type="hidden" name="idkomponen" value="<?php echo "$yapxkomp[idkomponen]"; ?>" >
	                                        <input type="hidden" name="minggu" value="<?php echo "$_REQUEST[minggu]"; ?>" >
											<input type="hidden" name="bulan" value="<?php echo "$_REQUEST[bulan]"; ?>" >
											<input type="hidden" name="id" value="<?php echo "$yapxrealisasi[id]"; ?>" > 
											
											<div style='margin-left:25px'>
											<br>
                                            <table width="550" border="0">
											  
											  <tr>
												<td>Realisasi </td>
												<td><input type='number' min="0" max="<?php echo "$yapxkomp[pagu]";?>" size='10' class="form-control" name="rp_realisasi" id="cmbProvinsi" value="<?php echo "$yapxrealisasi[rp_realisasi]";?>"></td>
											  </tr>
											  
											
											</table>
											</div>		

											<div class="modal-footer">
											<button type="button" class="btn btn-danger" data-dismiss="modal">Batalkan</button>
											<button type="submit" class="btn btn-success"><i class="fa fa-check"></i> &nbsp; Simpan</a>
											</div>
											</div>
															
														</div>
													</div>
												</div>
											</form>
								<!-- end modal edit !-->
								
								<div class="btn-group">
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#editModal_<?php echo $yapxkomp['idkomponen']; ?>">Realisasi</button>
								</div>										
										
										<?php 
										echo "$yapxkomp[nama_komponen]
										</td>
										<td align='right'>$pagu_format</td>
										<td align='right'>$realisasi_format</td>
										<td align='right'>-</td>
										<td align='right'></td>
										<td align='right'></td>
										<td align='right'></td>
										<td align='right'></td>
										<td align='right'></td>
										<td align='right'></td>
										<td align='right'></td>
										<td align='right'></td>
										</tr>";
										}
                                         }   $i++;
                                        
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
       <?php 
	}
	?>

        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

        <script>
    $(document).ready(function () {
        $('#tabelPegawai').DataTable();
    });
</script>

    </body>
</html>