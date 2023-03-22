<?php require_once "header.php";  ?>
<?php  $slider=$baglan->prepare("SELECT * FROM slider");
		$slider->execute();
		$slidercek=$slider->fetch(PDO::FETCH_ASSOC);
?>

<!-- Slider Start -->
<section class="banner" style="background: url(./resimler/slider/<?php echo $slidercek["resim"] ?>);">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-12 col-xl-7">
			<div class="block">
				
					
					<h1 class="mb-3 mt-3"><?php echo $slidercek["baslik"] ?></h1>
					
					<p class="mb-4 pr-5"><?php echo $slidercek["aciklama"] ?></p>
					
				</div>
			</div>
		</div>
	</div>
</section>
<section class="features">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="feature-block d-lg-flex">
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-surgeon-alt"></i>
						</div>
						<span>24  saat hizmet</span>
						<h4 class="mb-3">Online randevu</h4>
						<p class="mb-4">7/24 bizden destek alabilirsiniz</p>
						<a href="iletisim.php" class="btn btn-main btn-round-full">iletisim</a>
					</div>
				
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-ui-clock"></i>
						</div>
					
						<h4 class="mb-3">çalışma saatleri</h4>
						<ul class="w-hours list-unstyled">
		                    <li class="d-flex justify-content-between">hafta içi: <span>8:00 - 17:00</span></li>
		                    <li class="d-flex justify-content-between">cumartesi: <span>9:00 - 17:00</span></li>
		                    <li class="d-flex justify-content-between">pazar : <span>10:00 - 17:00</span></li>
		                </ul>
					</div>
				
					<div class="feature-item mb-5 mb-lg-0">
						<div class="feature-icon mb-4">
							<i class="icofont-support"></i>
						</div>
						<span>Telefon Numaramız</span>
						<h4 class="mb-3"><?php echo $ayarcek["tel"] ?>	</h4>
						<p>bizimle iletişime geçmek için bu numarayı kullanabilirsiniz</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>



<section class="cta-section ">
	<div class="container">
		<div class="cta position-relative">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-doctor"></i>
						<span class="h3">58</span>k
						<p>Müşteri</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-flag"></i>
						<span class="h3">700</span>+
						<p>yorum</p>
					</div>
				</div>
				
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-badge"></i>
						<span class="h3">40</span>+
						<p>Ürün sayısı</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 col-sm-6">
					<div class="counter-stat">
						<i class="icofont-globe"></i>
						<span class="h3">20</span>
						<p>Kategori sayisi</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section doctors">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6 text-center">
				<div class="section-title">
					<h2>fotoğraf galerisi</h2>
					<div class="divider mx-auto my-4"></div>
					<p>Bize ait fotoğrafları alt tarafta bulabilirsiniz </p>
				</div>
			</div>
		</div>



		<div class="row shuffle-wrapper portfolio-gallery">

		<?php $galerisor = $baglan->prepare("SELECT * FROM galeri order by sira asc limit 12");
                        $galerisor->execute();
                        ?>

                        <?php while ($galericek = $galerisor->fetch(PDO::FETCH_ASSOC)) { ?>
			<div class="col-lg-4 col-sm-6 col-md-6 mb-4 shuffle-item" data-groups="[&quot;cat1&quot;,&quot;cat2&quot;]">
				<div class="position-relative doctor-inner-box">
					<div class="doctor-profile">
						<div class="doctor-img">
							<img style="width: 400px !important; height:200px !important; " src="resimler/galeri/<?php echo $galericek["resim"] ?>" alt="doctor-image" class="img-fluid w-100">
						</div>
					</div>
					
				</div>
			</div>
<?php  } ?>
			

		</div>
	</div>
</section>



<?php  require_once "footer.php";  ?>
    <!-- 
    Essential Scripts
    =====================================-->

    
    <!-- Main jQuery -->
    <script src="plugins/jquery/jquery.js"></script>
    <!-- Bootstrap 4.3.2 -->
    <script src="plugins/bootstrap/js/popper.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="plugins/counterup/jquery.easing.js"></script>
    <!-- Slick Slider -->
    <script src="plugins/slick-carousel/slick/slick.min.js"></script>
    <!-- Counterup -->
    <script src="plugins/counterup/jquery.waypoints.min.js"></script>
    
    <script src="plugins/shuffle/shuffle.min.js"></script>
    <script src="plugins/counterup/jquery.counterup.min.js"></script>
    <!-- Google Map -->
    <script src="plugins/google-map/map.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap"></script>    
    
    <script src="js/script.js"></script>
    <script src="js/contact.js"></script>

  </body>
  </html>
   