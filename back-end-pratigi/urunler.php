<?php require_once "header.php";  ?>




<section class="section service-2">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-7 text-center">
				<div class="section-title">
					<h2>Ürünler sayfamız</h2>
					<div class="divider mx-auto my-4"></div>
					<p>Bu kategoriye ait ürünleri bu sayfada bulabilirsiniz</p>
				</div>
			</div>
		</div>

		<div class="row">
		<?php $urunlersor = $baglan->prepare("SELECT * FROM urunler where altkat_id=? order by sira asc ");
                        $urunlersor->execute(array($_GET["id"]));
                        ?>

                        <?php while ($urunlercek = $urunlersor->fetch(PDO::FETCH_ASSOC)) { ?>
			<div class="col-lg-4 col-md-6 ">
				<div class="department-block mb-5">


<a href="urun-detay-<?=seo($urunlercek['baslik']).'-'.$urunlercek['id'] ?>">
					<img style="height: 320px !important;" src="./resimler/urunler/<?php echo $urunlercek["resim"] ?>" alt="" class="img-fluid w-100">
					
					</a>
					
					<div class="content">
						<h4 class="mt-4 mb-2 title-color"><?php echo $urunlercek["baslik"] ?></h4>
						
						<a href="urun-detay-<?=seo($urunlercek['baslik']).'-'.$urunlercek['id'] ?>" class="read-more">daha fazla... <i class="icofont-simple-right ml-2"></i></a>
					</div>
				</div>
			</div>
							<?php  }?>

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