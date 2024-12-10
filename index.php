<?php require_once("conn.php");
    if (!isset($_SESSION)) {
        session_start();
    } ?>
<!DOCTYPE html>
<html lang="en">
<?php include "head.php"; ?>
<body>
    
	<?php include "header.php"; ?>
	
	<!-- start: Slider -->
	<div class="slider-wrapper">

		<div id="da-slider" class="da-slider">
			<div class="da-slide">
				<h2>Imagine Organizer</h2>
				<p>Kami siap memberikan pelayanan terbaik kami untuk anda. </p>
				<a href="produk.php" class="da-link">Lihat Produk</a>
				<div class="da-img"><img src="img/parallax-slider/wedding3.jpg" style="border: 3px solid whitesmoke; border-radius: 15px;" alt="Imagine Organizer" /></div>
			</div>
			<div class="da-slide">
				<h2>Dekorasi</h2>
				<p>Kami memiliki paket yang bisa di sesuaikan dengan kebutuhan anda dan yang pasti harga kami yang terbaik.</p>
				<a href="produk.php" class="da-link">Lihat Produk</a>
				<div class="da-img"><img src="img/parallax-slider/wedding5.jpg" style="border: 3px solid whitesmoke; border-radius: 10px;" alt="Dekorasi" /></div>
			</div>
			<div class="da-slide">
			<h2>Make Up Artist</h2>
				<p>Memiliki tenaga ahli yang profesional di tiap bidangnya.</p>
				<a href="produk.php" class="da-link">Lihat Produk</a>
				<div class="da-img"><img src="img/parallax-slider/wedding4.jpg" style="border: 3px solid whitesmoke; border-radius: 10px;" alt="Make Up Artist" /></div>
			</div>
			<div class="da-slide">
				<h2>Photo dan Video</h2>
				<p>Jaminan diskon hingga 30% jika anda booking hari ini.</p>
				<a href="produk.php" class="da-link">Lihat Produk</a>
				<div class="da-img"><img src="img/parallax-slider/wedding1.jpg" style="border: 3px solid whitesmoke; border-radius: 10px;" alt="Photo dan Video" /></div>
			</div>
			<div class="da-slide">
				<h2>Sound dan Lighting</h2>
				<p>Abadikan setiap moment indah mu dan pasangan mu bersama kami, pesan sekarang juga.</p>
				<a href="produk.php" class="da-link">Lihat Produk</a>
				<div class="da-img"><img src="img/parallax-slider/wedding6.jpg" style="border: 3px solid whitesmoke; border-radius: 10px;" alt="Sound dan Lighting" /></div>
			</div>
			<nav class="da-arrows">
				<span class="da-arrows-prev"></span>
				<span class="da-arrows-next"></span>
			</nav>
		</div>
		
	</div>
	<!-- end: Slider -->
			
	<!--start: Wrapper-->
	<div id="wrapper">
				
		<!--start: Container -->
    	<div class="container">
	
      		<!-- start: Hero Unit - Main hero unit for a primary marketing message or call to action -->
      		<div class="hero-unit">
        		<p>
                 Kami Hadir Untuk Memudahkan Anda Dalam Menangani Perencanaan Pernikahan Anda.
				</p>
        		<p><a class="btn btn-basic btn-large" href="produk.php">Pesan Sekarang &raquo;</a></p>
                                
      		</div>
            <!--<div class="title"><h3>Keranjang Anda</h3></div>
            <div class="hero-unit">
            </div> -->
			<!-- end: Hero Unit -->

      		<!-- start: Row -->
            
      		<!--<div class="row">
	                <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY kode DESC limit 9");
                    while($data = mysqli_fetch_array($sql)){
                    ?>
        		<div class="span4">
          			<div class="icons-box">
                        <div class="title"><h3><?php echo $data['nama']; ?></h3></div>
                        <img src="admin/<?php echo $data['gambar']; ?>" style="border: 2px solid grey; border-radius: 5px; width: 250px; height: 200px;"  />
						<div><h3>Rp.<?php echo number_format($data['harga'],2,",",".");?></h3></div>
					<!--	<p>
						
						</p>
						<div class="clear"><a href="detailproduk.php?kd=<?php echo $data['kode'];?>" class="btn btn-lg btn-danger">Detail</a> <a href="detailproduk.php?kd=<?php echo $data['kode'];?>" class="clear"> <a href="index.html" class="btn btn-lg btn-success">Beli &raquo;</a></div>
					
                    </div>
        		</div>
                <?php   
              }
              
              
              ?>

      		</div>-->
			
			

    <!-- start: Footer Menu -->
	<div id="footer-menu" class="hidden-tablet hidden-phone">

		<!-- start: Container -->
		<div class="container">
			
			<!-- start: Row -->
			<div class="row">

				<!-- start: Footer Menu Logo -->
				<div class="span2">
					<div id="footer-menu-logo">
						<a href="#"><img src="img/Tulisanbarulagi.jpg" alt="logo" /></a>
					</div>
				</div>
				<!-- end: Footer Menu Logo -->

				<!-- start: Footer Menu Links-->
				<div class="span9">
					
					<div id="footer-menu-links">

						<ul id="footer-nav">

							<li><a href="#">Pesan Sekarang</a></li>

							<li><a href="#">Dapatakan Diskon Hingga 30%</a></li>

							<li><a href="#">Proses cepat dan mudah</a></li>

						</ul>

					</div>
					
				</div>
				<!-- end: Footer Menu Links-->

				<!-- start: Footer Menu Back To Top -->
				<!--div class="span1">
						
					<div id="footer-menu-back-to-top">
						<a href="#"></a>
					</div>
				
				</div>
				<!-- end: Footer Menu Back To Top -->
			
			</div>
			<!-- end: Row -->
			
		</div>
		<!-- end: Container  -->	

	</div>	
	<!-- end: Footer Menu -->
<?php include "footer.php"; ?>

<!-- start: Java Script -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-1.8.2.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/flexslider.js"></script>
<script src="js/carousel.js"></script>
<script src="js/jquery.cslider.js"></script>
<script src="js/slider.js"></script>
<script defer="defer" src="js/custom.js"></script>
<!-- end: Java Script -->

</body>
</html>