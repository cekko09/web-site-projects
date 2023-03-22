<?php require_once "header.php";  ?>




<!-- portfolio -->
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

		<?php $galerisor = $baglan->prepare("SELECT * FROM galeri order by sira asc");
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

<?php require_once "footer.php";  ?>


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