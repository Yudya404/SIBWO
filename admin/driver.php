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
include('pagination1.php');
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
                        Driver
                        <small>Administrator</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i>Driver</a></li>
                        <li class="active">Data Driver</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                    
              <div class="col-lg-4">
              <form action='driver.php' method="POST">
          
	       <input type='text' class="form-control" style="margin-bottom: 4px;" name='keyword' placeholder='Cari Data Fullname/Username' required /> 
           <input type='submit' value='Cari Data' class="btn btn-sm btn-primary" /> <a href='admin.php' class="btn btn-sm btn-success" >Refresh</i></a>
          	</div>
              </div>
           <!-- /.row -->
                    <br />
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-lg-12">
					<div class="text-right">
						<a href="input-driver.php" class="btn btn-sm btn-success">Tambah Driver <i class="fa fa-arrow-circle-right"></i></a>
					</div>
					<br />
                    <div class="panel panel-success">
                        <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-user"></i> Data Driver </h3> 
                        </div>
                        <div class="panel-body">
                       <!-- <div class="table-responsive"> -->
                    
					<?php
					if(isset($_REQUEST['keyword']) && $_REQUEST['keyword']<>""){
					#jika ada kata kunci pencarian (artinya form pencarian disubmit dan tidak kosong) pakai ini
					$keyword = $_REQUEST['keyword'];
					$reload  = "?pagination=true&keyword=$keyword";
					$sql     =  "SELECT * FROM driver WHERE nama LIKE '%$keyword%' or username like '%$keyword%' or nopol like '%$keyword%'";
					$result  = mysqli_query($koneksi, $sql);
					}else{
					#jika tidak ada pencarian pakai ini
					$reload = "?pagination=true";
					$sql =  "SELECT * FROM driver order by id_driver DESC";
					$result = mysqli_query($koneksi, $sql);
					}
			
					#pagination config start
					$rpp = 10; // jumlah record per halaman
					$page = isset($_GET['page'])?(int)$_GET['page'] : 1;
					if($page<=0) $page = 1;  
					$tcount = mysqli_num_rows($result);
					$tpages = ($tcount) ? ceil($tcount/$rpp) : 1; // total pages, last page number
					$count = 0;
					$i = ($page-1)*$rpp;
					$no_urut = ($page-1)*$rpp;
					//pagination config end
					?>
					
                  <table id="example" class="table table-hover table-bordered">
                  <thead>
                      <tr>
                        <th><center>No </center></th>
                        <th><center>Nama </center></th>
                        <th><center>Alamat </center></th>
                        <th><center>No Telepon </center></th>
						<th><center>Nopol </center></th>
                        <th><center>Username </center></th>
                        <th><center>Password </center></th>
                        <th><center>Tools</center></th>
                      </tr>
                  </thead>
                    <?php
                     while(($count<$rpp) && ($i<$tcount)) {
                     mysqli_data_seek($result,$i);
                     $data = mysqli_fetch_array($result);
                     ?>
                    <tbody>
                    <tr>
                    <td><center><?php echo ++$no_urut; ?></center></td>
                    <td><center><span class="glyphicon glyphicon-user"></span><?php echo $data['nama'];?><center></td>
                    <td><center><?php echo $data['alamat']; ?><center></td>
                    <td><center><?php echo $data['no_telp']; ?></center></td>
					<td><center><?php echo $data['nopol']; ?></center></td>
                    <td><center><?php echo $data['username']; ?></center></td>
                    <td><center><?php echo $data['password']; ?></center></td>
                    <!--<td><center><?php 
                            /**if($data['level'] == 'admin'){
								echo '<span class="label label-success">Admin</span>';
							}
                            else if ($data['level'] == 'superuser' ){
								echo '<span class="label label-primary">Super User</span>';
							}
                            else if ($data['level'] == 'user' ){
								echo '<span class="label label-info">User</span>';
							}**/
                             ?></center></td>-->
                    <!--<td><center><img src="<?php //echo $data['gambar']; ?>" class="img-circle" height="80" width="75" style="border: 3px solid #888;" /></center></td>-->
                    <td><center><div id="thanks"><a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit Admin" href="edit-driver.php?hal=edit&id=<?php echo $data['id_driver'];?>"><span class="glyphicon glyphicon-edit"></span></a>  
                        <a onclick="return confirm ('Yakin hapus <?php echo $data['nama'];?>.?');" class="btn btn-sm btn-danger tooltips" data-placement="bottom" data-toggle="tooltip" title="Hapus Driver" href="hapus-driver.php?hal=hapus&id=<?php echo $data['id_driver'];?>"><span class="glyphicon glyphicon-trash"></a></center></td></tr></div>
					<?php
						$i++; 
                        $count++;
                        }
                    ?>
                   </tbody>
                   </table>
				   <div class="text-center"><?php echo paginate_one($reload, $page, $tpages); ?></div>
                  <!-- </div>-->
                
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
