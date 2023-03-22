<?php require_once "header.php"; 
	require_once "admin/baglanti.php"
?>
<?php 

$hakkimizdasor=$baglan->prepare("SELECT * FROM hakkimizda where hakkimizda_id=?");
$hakkimizdasor->execute(array(1));
$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);


?>

<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
         
          <h1 class="text-capitalize mb-5 text-lg"><?php echo $hakkimizdacek["hakkimizda_baslik"] ?></h1>

          <!-- <ul class="list-inline breadcumb-nav">
            <li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
            <li class="list-inline-item"><span class="text-white">/</span></li>
            <li class="list-inline-item"><a href="#" class="text-white-50">About Us</a></li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</section>

<section class="section about-page" style="padding-top: 30px !important; padding-bottom:30px !important;">
	<div class="container">
		<div class="row">
			
			<div class="col-lg-12">
				<p><?php echo $hakkimizdacek["hakkimizda_aciklama"] ?></p>
				
			</div>
		</div>
	</div>
</section>


<section class="section team" style="padding-top: 30px !important; padding-bottom:30px !important;">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="section-title text-center">
					<h2 class="mb-4">Vizyonumuz</h2>
					<div class="divider mx-auto my-4"></div>
					<p><?php echo $hakkimizdacek["hakkimizda_vizyon"] ?></p>
				</div>
			</div>
		</div>

		<div class="row justify-content-center">
			<div class="col-lg-6">
				<div class="section-title text-center">
					<h2 class="mb-4">misyonumuz</h2>
					<div class="divider mx-auto my-4"></div>
					<p><?php echo $hakkimizdacek["hakkimizda_misyon"] ?></p>
				</div>
			</div>
		</div>

		
	</div>
</section>


<!-- footer Start --><?php  require_once "footer.php";  ?>

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