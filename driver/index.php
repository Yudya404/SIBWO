<?php 
session_start();
if (empty($_SESSION['username'])){
	header('location:../index.php');	
} else {
	include "../conn.php";
    $_SESSION['id_driver'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Warung Bebek Srundeng</title>
		<link rel="icon" href="../img/favicon.png">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
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
            <a href="index1.php" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Selamat Datang 
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
                                    <img src="<?php echo $_SESSION['gambar1']; ?>" class="img-circle" alt="User Image" />
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
                                <?php //include "menu1.php"; ?>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="detail-driver.php?hal=edit&id=<?php echo $_SESSION['id_driver'];?>" class="btn btn-default btn-flat">Profil</a>
                                   </div>
                                    <div class="pull-right">
                                        <a href="../logout.php" class="btn btn-default btn-flat" onclick="return confirm ('Apakah Anda Akan Keluar.?');">Keluar</a>
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
                            <img src="<?php echo $_SESSION['gambar']; ?>" class="img-circle" alt="User Image" style="border: 1px solid #3C8DBC;" />
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
                        Dashboard
                        <small>Driver</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
					 
				 
                        

                    <!-- Main row -->
                    <div class="row">
                    
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-12 connectedSortable"> 
                        <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-user"></span> Data Profil Driver </h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
                    <?php
                    $kodesaya = $_SESSION['id_driver'];
                    $query2="select * from driver where id_driver='$kodesaya' limit 1";
                    $hasil1=mysqli_query($koneksi, $query2) or die(mysqli_error());
                    ?>
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <!--<th><center>Kode Pelanggan </center></th>-->
                        <th><center>Nama </center></th>
                        <th><center>Alamat </center></th>
                        <th><center>No Telp </center></th>
						<th><center>Nopol </center></th>
                        <!--<th><center>Username </center></th>-->
                        <!--<th><center>Password </center></th>-->
                        <th><center>Tools </center></th>
                      </tr>
                  </thead>
                     <?php 
                     
                     while($data1=mysqli_fetch_array($hasil1))
                    { ?>
                    <tbody>
                    <tr>
                    <!--<td><center><?php echo $data1['id_driver']; ?></center></td>-->
                    <td><center><?php echo $data1['nama']; ?></center></td>
                    <td><center><?php echo $data1['alamat']; ?></center></td>
                    <td><center><?php echo $data1['no_telp']; ?></center></td>
					<td><center><?php echo $data1['nopol']; ?></center></td>
                    <!--<td><center><?php echo $data1['username']; ?></center></td>-->
                    <!--<td><center><?php echo $data1['password']; ?></center></td>-->
                    <td><center><div id="thanks"><a class="btn btn-sm btn-warning" data-placement="bottom" data-toggle="tooltip" title="Detail Driver" href="detail-driver.php?hal=edit&id=<?php echo $data1['id_driver'];?>"><span class="glyphicon glyphicon-search"></span></a>
                    <a class="btn btn-sm btn-info" data-placement="bottom" data-toggle="tooltip" title="Edit Driver" href="edit-driver.php?hal=edit&id=<?php echo $data1['id_driver'];?>"><span class="glyphicon glyphicon-edit"></span></a>  
                      
                    </tr></div>
                 <?php   
              } 
              ?>
                   </tbody>
                   </table>
                  <!-- </div>-->
              </div> 
                        </section><!-- right col -->
                        <!-- Left col -->
                        
                       <!-- <section class="col-lg-12 connectedSortable">                            


                            <div class="panel panel-danger">
                        <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-barcode"></span> Data Pemesanan</h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive">
                       
                    <?php
                    $kodeku = $_SESSION['user_id'];
                    $query1="select * from po_terima where kd_cus='$kodeku'";
                    $hasil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <!--<th><center>ID </center></th>
                        <th><center>No Pemessanan</i></center></th>
                        <th><center>Tanggal</center></th>
                        <th><center>Item</center></th>
                        <th><center>Total Pembayaran</center></th>
                        <!--<th><center>Cetak Struk</center></th>
                      </tr>
                  </thead>
                     <?php 
                     while($data=mysqli_fetch_array($hasil))
                    { ?>
                    <tbody>
                    <!--<td><center><?php echo $data['id'];?></center></td>
                    <td><center><?php echo $data['nopo'];?></center></td>
                    <td><center><?php echo $data['tanggal'];?></center></td>
                    <td><center><?php echo $data['qty'];?></center></td>
                    <td><center>Rp. <?php echo number_format($data['total'],2,",",".");?></center></td>
                    <!--<td><center><div id="thanks">
					<a class="btn btn-sm btn-danger" data-placement="bottom" data-toggle="tooltip" title="Cetak Invoice" href="cetak-po.php?hal=cetak&kd=<?php echo $data['nopo'];?>"><span class="glyphicon glyphicon-print"></span></a>
                    <a class="btn btn-sm btn-success" data-placement="bottom" data-toggle="tooltip" title="Status PO" href="status-po.php?hal=status&kd=<?php echo $data['nopo'];?>"><span class="glyphicon glyphicon-tag"></span></a> 
                    </div></center></td>
                    <!--<td><center><?php
                            /**if($data['status'] == 'tetap'){
								echo '<span class="label label-success">Tetap</span>';
							}
                            else if ($data['status'] == 'kontrak' ){
								echo '<span class="label label-primary">Kontrak</span>';
							}
                            else if ($data['status'] == 'magang' ){
								echo '<span class="label label-info">Magang</span>';
							}
                            else if ($data['status'] == 'outsource' ){
								echo '<span class="label label-warning">Outsourcing</span>';
							}**/
                    
                    ?></center></td>
                    </tr></div>
                 <?php   
              } 
              ?>
                   </tbody>
                   </table>
                  <!-- </div>
              </div> 
              </div>


                </section> --> <!-- /.Left col
                <section class="col-lg-12 connectedSortable"> 
					<div class="panel panel-info">
					<div class="panel-heading">
                    <h3 class="panel-title"><span class="glyphicon glyphicon-tag"></span>Riwayat Pengantaran</h3> 
                    </div>
                    <div class="panel-body">
                    <div class="table-responsive">
                    <?php
                    $kd = $_SESSION['id_driver'];
					$query3="select * from po_terima where nopo='$kd' order by id DESC limit 5";
                    //$query3="select * from po_terima where nopo='$kd' order by id DESC limit 5";
                    $hasil2=mysqli_query($koneksi, $query3) or die(mysqli_error());
                    ?>
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <td><th><center>ID </center></th>
                        <th><center>No Pemesanan</center></th>
                        <th><center>Nama Pelanggan</center></th>
						<th><center>Tanggal</center></th>
                        <th><center>Pesanan</center></th>
                        <th><center>Item</center></th>
                        <th><center>Status Pengantaran</center></th>
						<th><center>Tools </center></th>
                      </tr>
                  </thead>
                     <?php 
                     while($data2=mysqli_fetch_array($hasil2))
                    { ?>
                    <tbody>
                    <td><center><?php echo $data2['id'];?></center></td>
                    <td><center><?php echo $data2['nopo'];?></center></td>
					<td><center><?php echo $data2['tanggal'];?></center></td>
                    <td><center><?php echo $data2['nama'];?></center></td>
                    <td><center><?php echo $data2['qty'];?></center></td>
                    <td><center><?php
                            if($data2['status_makanan'] == 'Selesai'){
								echo '<span class="label label-success">Pesanan Sudah Diantar</span>';
							}
                            else if ($data2['status_makanan'] == 'Otw Kirim' ){
								echo '<span class="label label-danger">Pesanan Dalam Perjalanan</span>';
							}
							else if ($data2['status_makanan'] == 'Proses Masak' ){
								echo '<span class="label label-danger">Pesanan Dalam Proses Dimasak</span>';
							}
							else if ($data2['status_makanan'] == 'Belum Diproses' ){
								echo '<span class="label label-danger">Pesanan Belum Diproses Menunggu Antrian</span>';
							}
                    ?>
                    
                    </center></td>
                    <td><center><div id="thanks">
					<a class="btn btn-sm btn-success" data-placement="bottom" data-toggle="tooltip" title="Detail Pembayaran" href="detail-konfirmasi.php?hal=detail&kd=<?php echo $data2['id'];?>"><span class="glyphicon glyphicon-search"></span></a>
                    <a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Konfirmasi Prmbayaran" href="edit-konfirmasi.php?hal=edit&kode=<?php echo $data2['id'];?>"><span class="glyphicon glyphicon-edit"></span></a>
                    </div></center></td>
                    </tr></div>
                 <?php   
              } 
              ?>
                   </tbody>
                   </table>
                   </div>
              </div> 
              </section>right col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-12 connectedSortable"> 
                        <div class="panel panel-info">
                        <div class="panel-heading">
                        <h3 class="panel-title"><span class="glyphicon glyphicon-tag"></span>Konfirmasi Pembayaran Pelanggan</h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
                    <?php
                    //$id_driver = $_SESSION['id'];
                    $query3="select * from konfirmasi order by id_kon DESC Limit 5";
                    $hasil2=mysqli_query($koneksi, $query3) or die(mysqli_error());
                    ?>
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <!--<td><th><center>ID </center></th>-->
                        <th><center>No Pemesanan</i></center></th>
                        <!--<th><center>Nama Pelanggan</center></th>-->
                        <th><center>Pembayaran</center></th>
                        <th><center>Tanggal</center></th>
                        <th><center>Total Pembayaran</center></th>
                        <th><center>Status Pembayaran</center></th>
						<th><center>Tools </center></th>
                      </tr>
                  </thead>
                     <?php 
                     while($data2=mysqli_fetch_array($hasil2))
                    { ?>
                    <tbody>
                    <!--<td><center><?php echo $data2['id_kon'];?></center></td>-->
                    <td><center><?php echo $data2['nopo'];?></center></td>
                    <!--<td><center><?php echo $data2['kd_cus'];?></center></td>-->
                    <td><center><?php echo $data2['bayar_via'];?></center></td>
                    <td><center><?php echo $data2['tanggal'];?></center></td>
                    <td><center>Rp. <?php echo number_format($data2['jumlah'],2,",",".");?></center></td>
                    <td><center><?php
                        if($data2['status'] == 'Sudah'){
							echo '<span class="label label-success">Sudah Bayar</span>';
						}
                            else if ($data2['status'] == 'Belum' ){
							
							echo '<span class="label label-danger">Belum Bayar</span>';
						}
                    ?>
                    </center></td>
                    <td><center><div id="thanks">
					<a class="btn btn-sm btn-success" data-placement="bottom" data-toggle="tooltip" title="Detail Pembayaran" href="detail-konfirmasi.php?hal=detail&kd=<?php echo $data2['id_kon'];?>"><span class="glyphicon glyphicon-search"></span></a>
                    <a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Konfirmasi Prmbayaran" href="edit-konfirmasi.php?hal=edit&kode=<?php echo $data2['id_kon'];?>"><span class="glyphicon glyphicon-edit"></span></a>
                    </div></center></td>
                    </tr></div>
                 <?php   
              } 
              ?>
                   </tbody>
                   </table>
                  <!-- </div>-->
              </div> 
                        </section><!-- right col -->
						
                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


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
