<?php 
include "../conn.php";
if(isset($_POST['update'])){
				$id	     			= $_POST['id'];
				$nopo	 			= $_POST['nopo'];
				$kd_cus	 			= $_POST['kd_cus'];
				$kode	 			= $_POST['kode'];
				$nama	 			= $_POST['nama'];
				$tanggal 			= $_POST['tanggal'];
                $qty     			= $_POST['qty'];
                $total   			= $_POST['total'];
				$status_pelayanan 	= $_POST['status_pelayanan'];
				
				$update = mysqli_query($koneksi, "UPDATE po_terima SET tanggal='$tanggal' WHERE id='$id'") or die(mysqli_error());
				if($update){
					echo "<script>alert('Data Pemesanan berhasil disimpan!'); window.location = 'index1.php'</script>";
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
				}
			}
            ?>