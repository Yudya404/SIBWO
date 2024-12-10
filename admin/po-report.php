<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";
?>
<?php 
include('date-helper.php');
?>
<?php
echo "<script>
function popup(form) {
 window.open('', 'cetak', 'menubar=yes,scrollbars=yes,resizable=yes,width=800,height=400,top=50,left=200');
 form.target = 'cetak';
}
</script>";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Halaman Admin | Imagine Organizer</title>
		<link rel="icon" href="img/logo.jpg">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="../dist/css/bootstrap.css" rel="stylesheet" type="text/css" />
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="../css/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="../css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Date Picker -->
        <link href="../css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="../css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="../css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- Data Tables -->
        <link rel="stylesheet" href="datatables/dataTables.bootstrap.css"/>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
		
		<style>
		* {
margin: 0;
padding: 0;
}

body, html {
font-family: Calibri, "times new roman", sans-serif;
}

#button {
margin: 5% auto;
width: 100px;
text-align: center;
}

#button a {
background-image: linear-gradient(to bottom,#2a95c5,#21759b);
background-image: -o-linear-gradient(to bottom,#2a95c5,#21759b);
background-image: -ms-linear-gradient(to bottom,#2a95c5,#21759b);
background-image: -moz-linear-gradient(to bottom,#2a95c5,#21759b);
background-image: -webkit-linear-gradient(to bottom,#2a95c5,#21759b);
background-color: #2e9fd2;
width: 86px;
height: 30px;
vertical-align: middle;
padding: 10px;
color: #fff;
text-decoration: none;
border: 1px solid transparent;
border-radius: 5px;
}

#popup {
width: 100%;
height: 100%;
position: fixed;
background: rgba(0,0,0,.7);
top: 0;
left: 0;
z-index: 9999;
visibility: hidden;
}

.window {
width: 400px;
height: 10px;
background: #fff;
border-radius: 10px;
position: relative;
padding: 10px;
box-shadow: 0 0 5px rgba(0,0,0,.4);
text-align: center;
margin: 15% auto;
}

.close-button {
width: 20px;
height: 20px;
background: #000;
border-radius: 50%;
border: 3px solid #fff;
display: block;
text-align: center;
color: #fff;
text-decoration: none;
position: absolute;
top: -10px;
right: -10px;
}

#popup:target {
visibility: visible;
}
</style>
		
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="index.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Administrator
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
                                <span><?php echo $_SESSION['fullname']; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo $_SESSION['gambar']; ?>" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $_SESSION['fullname']; ?>
                                    
                                    </p>
                                </li>
                                <?php
								$timeout = 120; // Set timeout minutes
								$logout_redirect_url = "../index.php"; // Set logout URL

								$timeout = $timeout * 60; // Converts minutes to seconds
								if (isset($_SESSION['start_time'])) {
									$elapsed_time = time() - $_SESSION['start_time'];
									if ($elapsed_time >= $timeout) {
										session_destroy();
										echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
									}
								}
								$_SESSION['start_time'] = time();
								?>
								<?php } ?>
                                <!-- Menu Body -->
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="detail-admin.php?hal=edit&kd=<?php echo $_SESSION['user_id'];?>" class="btn btn-default btn-flat">Profil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="../logout.php" class="btn btn-default btn-flat" onclick="return confirm ('Apakah Anda Akan Keluar.?');"> Keluar </a>
                                    </div>
                                </li>
                            </ul>
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
                        <div class="pull-left image">
                            <img src="<?php echo $_SESSION['gambar']; ?>" class="img-circle" alt="User Image" style="border: 2px solid #3C8DBC;" />
                        </div>
                        <div class="pull-left info">
                            <p>Selamat Datang,<br /><?php echo $_SESSION['fullname']; ?></p>

                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <?php include "menu.php"; ?>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Laporan Data Pemesanan
                        <small>Administrator</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Laporan Data Pemesanan</a></li>
                        <li class="active">Laporan Data Pemesanan</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
					<div class="col-lg-4">
					<form action='print-pemesanan.php' method="POST">
					<!--<input type='text' class="form-control" style="margin-bottom: 4px;" name='qcari' placeholder='Cari No PO & Kode Customer' required /> 
					<input type='submit' value='Cari Data' class="btn btn-sm btn-primary" /> <a href='po-report.php' class="btn btn-sm btn-success" >Refresh</i></a>-->
					</div>
					</div>
				<!-- /.row -->
                    <br />
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-lg-12">
					<div class="text-right">
						<a href="#popup" class="btn btn-sm btn-success" >Cetak Laporan<i class="fa fa-arrow-circle-right"></i></a>
					</div>
				  <br />
				  <td>
					<center>
					<div id="popup">
					<div class="window">
					<!-- Main content -->
					<section class="content">
					<!-- /.row -->
                    <!-- Main row -->
					
                    <div class="row">
                        <div class="col-lg-12">
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Input Tanggal</h3> 
                        </div>
                        <div class="panel-body">
					  <div class="form-panel">
                      <form class="form-horizontal style-form" action="cetak.php" onsubmit="popup(this);" target="_blank" method="post" enctype="multipart/form-data" name="form1" id="form1">
                         <div class="form-group">
                            <label class="col-sm-3 col-sm-3 control-label">Dari Tanggal</label>
							<div class="input-group">
							<div class="input-group-prepend">
							<span class="input-group-text">
							<i class="far fa-calendar-alt"></i>
							</span>
							</div>
							<input type="date" name="tgl_awal" class="form-control float-right" id="tgl_awal">
							</div>
							<!-- /.input group -->
							</div>
							<div class="form-group">
							<label class="col-sm-3 col-sm-3 control-label">Sampai Tanggal </label>
							<div class="input-group">
							<div class="input-group-prepend">
							<span class="input-group-text">
							<i class="far fa-calendar-alt"></i>
							</span>
							</div>
							<input type="date" name="tgl_akhir" class="form-control float-right" id="tgl_akhir">
							</div>
							<br/>
                         </div>
                          <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label"></label>
                            <div class="col-sm-10">
                            <input type="submit" name="cari" value="Cetak" class="btn btn-sm btn-primary" />&nbsp;
	                          <a href="po-report.php" class="btn btn-sm btn-danger">Batal </a>
                            </div>
                          </div>
                     </form>
					 </form>
                  </div>
                  </div>
          		</div>
                </div>
                </section><!-- /.content -->
				</div>
				</div>
				</center></td>
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Laporan Data Pemesanan</h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
                    <?php
                    $query1="select * from po_terima order by id DESC";
                    
                    if(isset($_POST['qcari'])){
	               $qcari=$_POST['qcari'];
	               $query1="SELECT * FROM  po_terima 
	               where nopo like '%$qcari%'
	               or kd_cus like '%$qcari%'  ";
                    }
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>
					
					<?php
						$batas = 10;
						$halaman = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
						$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;	
		 
						$previous = $halaman - 1;
						$next = $halaman + 1;
						
						$data = mysqli_query($koneksi,"select * from po_terima");
						$jumlah_data = mysqli_num_rows($data);
						$total_halaman = ceil($jumlah_data / $batas);
		 
						$tampil = mysqli_query($koneksi,"select * from po_terima order by id DESC limit $halaman_awal, $batas");
						$nomor = $halaman_awal+1;
                    ?>
					
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>No PO </i></center></th>
                        <th><center>Produk </center></th>
                        <th><center>Tanggal </center></th>
                        <th><center>Qty </center></th>
                        <th><center>Total </center></th>
						<th><center>Status </center></th>
                      </tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
                    { $no++; ?>
                    <tbody>
                    <tr>
                    <td><center><?php echo $no; ?></center></td>
                    <td><center><span class="glyphicon glyphicon-user"></span> <?php echo $data['kd_cus'];?></center></td>
                    <td><center><?php echo $data['nama'];?></center></td>
                    <td><center><?php echo convertDateDBtoIndo($data['tanggal']);?></center></td>
                    <td><center><?php echo $data['qty'];?></center></td>
                    <td><center>Rp. <?php echo number_format($data['total'],2,",",".");?></center></td>
					<td><center><?php echo $data['status_pelayanan'];?></center></td>
                    <!--<td><center><div id="thanks"><a class="btn btn-sm btn-success" data-placement="bottom" data-toggle="tooltip" title="Cetak Laporan Penjualan" href="cetak-po.php?hal=cetak&kd=<?php echo $data['nopo'];?>"><span class="glyphicon glyphicon-print"></span></a> </div>-->
					<?php   
					} 
					?>
                   </tbody>
                   </table>
				   <li>
					<?php
					$qy = "select sum(total) as total from po_terima";
						if (isset($tgl_awal) and isset($tgl_akhir)) {
							$qy.=" where tanggal between '$tgl_awal' and '$tgl_akhir' "; //kolom disesuaikan
						}
						$q=mysqli_query($koneksi,$qy);
						// select sum(total_harga) as total from barang_laku where tanggal='$tanggal'
						while($total=mysqli_fetch_array($q)){	
					?>
					<tr>
					<td>Total Harga &nbsp;:</td></a>
					<td><?php echo "Rp." .number_format($total['total'],2,",",".");?></td>
					</tr>
					<?php
					}
					?>
					</li>
					<li>
					<?php
					$qy = "select sum(qty) as total from po_terima";
						if (isset($tgl_awal) and isset($tgl_akhir)) {
							$qy.=" where tanggal between '$tgl_awal' and '$tgl_akhir' "; //kolom disesuaikan
						}
						$q=mysqli_query($koneksi,$qy);
						// select sum(total_harga) as total from barang_laku where tanggal='$tanggal'
						while($total=mysqli_fetch_array($q)){	
					?>
					<tr>
					<td>Total Item &nbsp;:</td></a>
					<td><?php echo ($total['total']."&nbsp;Item");?></td>
					</tr>
					<?php
					}
					?>
					</li>
				   <center>
						<nav>
						<ul class="pagination justify-content-center">
							<li class="page-item">
								<a class="page-link" <?php if($halaman > 1){ echo "href='?halaman=$previous'"; } ?>>Previous</a>
							</li>
						<?php 
						for($x=1;$x<=$total_halaman;$x++){
						?> 
							<li class="page-item"><a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
						<?php
						}
						?>				
							<li class="page-item">
								<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
							</li>
						</ul>
						</nav>
						</center>
				   
                  <!-- </div>-->
               <!-- <div class="text-right">
                  <a href="input-po-terima.php" class="btn btn-sm btn-warning">Tambah Produk <i class="fa fa-arrow-circle-right"></i></a>
              
                </div>-->
              </div> 
              </div>
            </div><!-- col-lg-12--> 
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <script src="../dist/jquery.js"></script>
        <script src="../dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../js/jquery-ui.core.js" type="text/javascript"></script>
        
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="../js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="../js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="../js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="../js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="../js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="../js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="../js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="../js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="../js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="../js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="../js/AdminLTE/dashboard.js" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="../js/AdminLTE/demo.js" type="text/javascript"></script>
        
    </body>
</html>
