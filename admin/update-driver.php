<?php
include "../conn.php";
if(isset($_POST['update'])){
$namafolder="gambar_customer/"; //tempat menyimpan file

if (!empty($_FILES["nama_file"]["tmp_name"]))
{
		$jenis_gambar=$_FILES['nama_file']['type'];
        $id_driver  = $_POST['id_driver'];
        $nama     	= $_POST['nama'];
		$alamat   	= $_POST['alamat'];
		$no_telp  	= $_POST['no_telp'];
		$nopol  	= $_POST['nopol'];
        $username 	= $_POST['username'];
        $password1 	= $_POST['password'];
		$password   = sha1($password1);
		
	if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/x-png")
	{			
		$gambar = $namafolder . basename($_FILES['nama_file']['name']);		
		if (move_uploaded_file($_FILES['nama_file']['tmp_name'], $gambar)) {
			$sql="UPDATE driver SET nama='$nama', alamat='$alamat', no_telp='$no_telp', nopol='$nopol', username='$username', password='$password', gambar='$gambar' WHERE id_driver='$id_driver'" or die(mysqli_error());
			$res=mysqli_query($koneksi, $sql) or die (mysqli_error());
			//echo "Gambar berhasil dikirim ke direktori".$gambar;
            echo "<script>alert('Data Driver berhasil diupdate!'); window.location = 'driver.php'</script>";	   
		} else {
		   echo "<p>Gambar gagal dikirim</p>";
		}
   } else {
		echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
   }
} else {
	echo "Anda belum memilih gambar";
}
} ?>