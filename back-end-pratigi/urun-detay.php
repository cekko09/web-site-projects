<?php require_once "header.php";  

$id=$_GET["id"];

$urunlersor=$baglan->prepare("SELECT * FROM urunler where id=?");
$urunlersor->execute(array($id));
$urunlercek=$urunlersor->fetch(PDO::FETCH_ASSOC);


?>

	




<section class="section department-single">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="department-img">
					<img style="height: 500px;" src="./resimler/urunler/<?php echo $urunlercek["resim"] ?>" alt="" class="img-fluid">
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-12">
				<div class="department-content mt-5">
					<h3 class="text-md"><?php echo $urunlercek["baslik"] ?></h3>
					<div class="divider my-4"></div>
					
					<p class="lead"><?php echo $urunlercek["aciklama"] ?></p>

		



					<p class="lead"><?php echo $urunlercek["fiyat"]  ?> $ <a href="appoinment.html" class="btn btn-main-2 btn-round-full">Satın al<i class="icofont-simple-right ml-2  "></i></a></p>
					
				</div>
			</div>

			
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