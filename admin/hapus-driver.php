<?php
include "../conn.php";
$user_id = $_GET['id'];

$query = mysqli_query($koneksi, "DELETE FROM driver WHERE id_driver='$id_driver'");
if ($query){
	echo "<script>alert('Data Berhasil dihapus!'); window.location = 'driver.php'</script>";	
} else {
	echo "<script>alert('Data Gagal dihapus!'); window.location = 'driver.php'</script>";	
}
?>