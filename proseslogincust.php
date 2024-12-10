<?php
include ("conn.php");
date_default_timezone_set('Asia/Jakarta');

session_start();

$username = $_POST['username'];
$password1 = $_POST['password'];
$password = sha1($password1);

//$username = mysqli_real_escape_string($username);
//$password = mysqli_real_escape_string($password);

if (empty($username) && empty($password)) {
	header('location:index.php?error1');
	
} else if (empty($username)) {
	header('location:index.php?error=2');
	
} else if (empty($password)) {
	header('location:index.php?error=3');
	
}

$q 		= mysqli_query($koneksi, "select * from customer where username='$username' and password='$password'");
$row 	= mysqli_fetch_array ($q);
$query 	= mysqli_query($koneksi, "select * from user where username='$username' and password='$password'");
$r 		= mysqli_fetch_array ($query);
$query1 = mysqli_query($koneksi, "select * from driver where username='$username' and password='$password'");
$r1 	= mysqli_fetch_array ($query1);

if (mysqli_num_rows($q) == 1) {
    $_SESSION['user_id']  = $row['kd_cus'];
	$_SESSION['username'] = $row['username'];
	$_SESSION['fullname'] = $row['nama'];
    $_SESSION['gambar']   = $row['gambar'];	
	header('location:customer/index.php');
	
} 	
elseif (mysqli_num_rows($query) == 1) {
    $_SESSION['user_id']  = $r['user_id'];
	$_SESSION['username'] = $r['username'];
	$_SESSION['fullname'] = $r['fullname'];
    $_SESSION['gambar']   = $r['gambar'];	
	header('location:admin/index.php');
}
elseif (mysqli_num_rows($query1) == 1) {
    $_SESSION['id_driver'] = $r1['id_driver'];
	$_SESSION['username']  = $r1['username'];
	$_SESSION['fullname']  = $r1['nama'];
    $_SESSION['gambar1']   = $r1['gambar'];	
	header('location:driver/index.php');
}
else {
	header('location:index.php?error=4');
}
?>