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
        <title>Halaman Admin | Warung Bebek Srundeng</title>
		<link rel="icon" href="img/favicon.png">
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
                        Laporan Penjualan Produk Per Item
                        <small>Administrator</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Laporan Penjualan Produk Per Item</a></li>
                        <li class="active">Laporan Penjualan Produk Per Item</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
					<div class="col-lg-4">
					<form action='po-item.php' method="POST">
						<input name="nama" type="text" class="form-control" style="margin-bottom: 4px;" placeholder='Masukkan Nama Makanan' required />
						<input name="tgl_awal" type="date" class="form-control" style="margin-bottom: 4px;" placeholder='Dari Tanggal' required />
						<input name="tgl_akhir" type="date" class="form-control" style="margin-bottom: 4px;" placeholder='Sampai Tanggal' required />
						<input name="simpan" type="submit" value="Cari Data" class="btn btn-sm btn-primary" /> 
						<a href='po-item.php' class="btn btn-sm btn-success" >Refresh</i></a>
					</div>
					</div>
				<!-- /.row -->
                    <br />
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-lg-12">
						</div>
					</div>
						<div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Laporan Data Penjualan Per Item</h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
						<?php
						
						//proses jika sudah klik tombol pencarian data
						if(isset($_POST['simpan'])){
						//menangkap nilai form
						$nama		=$_POST['nama'];
						$tgl_awal	=$_POST['tgl_awal'];
						$tgl_akhir	=$_POST['tgl_akhir'];
						$gabung = "";
						
						$query1 = "select * from po_terima ";
						if (isset($tgl_awal) and isset($tgl_akhir)) {
							$query1.=" where nama like '%$nama%' AND tanggal between '$tgl_awal' and '$tgl_akhir' "; //kolom disesuaikan
						}
						
						
						
						if(empty($nama) || empty($tgl_awal) || empty($tgl_akhir)){
						//jika data tanggal kosong
						?>
						<script language="JavaScript">
							alert('Nama Dan Tanggal Harap Di Isi Harap di Isi!');
							document.location='po-item.php';
						</script>
						<?php
						}else{
						?><i><b>Informasi : </b> Hasil pencarian data berdasarkan Nama Produk<b>&nbsp;&nbsp; <b><?php echo $_POST['nama']?></b> & <b><?php echo $_POST['tgl_awal']?></b> s/d <b><?php echo $_POST['tgl_akhir']?></b></i>
						<?php
						//$query1="select * from booking order by id_booking DESC limit 1";
						
						}
						$tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
						?>
					
					
					<table id="example" class="table table-hover table-bordered">
					<thead>
                     <tr>
                        <th><center>No </center></th>
                        <!--<th><center>No PO </i></center></th>
                        <th><center>Customer </center></th>-->
                        <th><center>Produk </center></th>
                        <th><center>Tanggal </center></th>
                        <th><center>Qty </center></th>
                        <th><center>Total </center></th>
						<!--<th><center>Status </center></th>-->
						<th><center>Tools </center></th>
                      </tr>
					</thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil))
						{ $no++; ?>
                    <tbody>
                    <tr>
                    <td><center><?php echo $no; ?></center></td>
                    <!--<td><?php echo $data['nopo'];?></td>
                    <td><a href="detail-customer.php?hal=edit&kd=<?php echo $data['kd_cus'];?>"><span class="glyphicon glyphicon-user"></span> <?php echo $data['kd_cus'];?></td>-->
                    <td><a href="produk.php?hal=edit&kd=<?php echo $data['nama'];?>"><span class="glyphicon glyphicon-cutlery"></span> <?php echo $data['nama'];?></td>
                    <td><center><?php echo $data['tanggal'];?></center></td>
                    <td><center><?php echo $data['qty'];?></center></td>
                    <td>Rp. <?php echo number_format($data['total'],2,",",".");?></td>
					<!--<td><center><?php echo $data['status_makanan'];?></center></td>-->
                    <td><center>
					<div id="thanks">
					<a class="btn btn-sm btn-success" data-placement="bottom" data-toggle="tooltip" title="Cetak Laporan Penjualan" href="cetak-po.php?hal=cetak&kd=<?php echo $data['nopo'];?>">
					<span class="glyphicon glyphicon-print"></span>
					</a></div>
					<?php   
					} 
					?>
                   </tbody>
				   <tr>
						<td colspan="10" align="center"> 
						<?php
						//jika pencarian data tidak ditemukan
						if(mysqli_num_rows($tampil)==0){
							echo "<font color=red><blink>Pencarian data tidak ditemukan!</blink></font>";
						}
						?>
						</td>
					</tr>
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
					<?php
						}
						else{
							unset($_POST['simpan']);
						}
					?>
					
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
