<?php 
include "../conn.php";
if(isset($_POST['update'])){
				$id	     			= $_POST['id'];
				$nopo	 			= $_POST['nopo'];
				$kd_cus	 			= $_POST['kd_cus'];
				$kode	 			= $_POST['kode'];
				$tanggal 			= $_POST['tanggal'];
                $qty     			= $_POST['qty'];
                $total   			= $_POST['total'];
				$status_pelayanan 	= $_POST['status_pelayanan'];
				
				$update = mysqli_query($koneksi, "UPDATE po_terima SET nopo='$nopo', kd_cus='$kd_cus', kode='$kode', tanggal='$tanggal', qty='$qty', total='$total', status_pelayanan='$status_pelayanan' WHERE id='$id'") or die(mysqli_error());
				if($update){
					echo "<script>alert('Data Po berhasil diupdate!'); window.location = 'po-terima.php'</script>";
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data gagal disimpan, silahkan coba lagi.</div>';
				}
			}
            ?>