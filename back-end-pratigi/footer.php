<?php
require_once "admin/baglanti.php";

$ayarsor=$baglan->prepare("SELECT * FROM ayarlar where id=?");
$ayarsor->execute(array(1));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);
  ?>
<!-- footer Start -->
<footer class="footer section gray-bg">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 mr-auto col-sm-6">
				<div class="widget mb-5 mb-lg-0">
					<div class="logo mb-4">
						<img src="./resimler/ayar/<?= $ayarcek["logo"] ?>" alt="" class="img-fluid">
					</div>
					<p><?php echo $ayarcek["aciklama"] ?></p>

					<ul class="list-inline footer-socials mt-4">
						<li class="list-inline-item"><a href="<?php echo $ayarcek["face"] ?>"><i class="icofont-facebook"></i></a></li>
						<li class="list-inline-item"><a href="<?php echo $ayarcek["twt"] ?>"><i class="icofont-twitter"></i></a></li>
						<li class="list-inline-item"><a href="<?php echo $ayarcek["wp"] ?>"><i class="icofont-linkedin"></i></a></li>
					</ul>
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="widget mb-5 mb-lg-0">
					<h4 class="text-capitalize mb-3">Sayfalar</h4>
					<div class="divider mb-4"></div>

					<ul class="list-unstyled footer-menu lh-35">
					<?php $altkategori = $baglan->prepare("SELECT * FROM altkategori order by alt_sira asc");
									$altkategori->execute(array())
									?>
									<?php while ($altkategoricek = $altkategori->fetch(PDO::FETCH_ASSOC)) {  ?>

						<li><a href="urunler-<?=seo($altkategoricek['alt_baslik']).'-'.$altkategoricek['id']?>"><?=  $altkategoricek["alt_baslik"]  ?> </a></li>
						<?php } ?>
					</ul>
				</div>
			</div>

			<div class="col-lg-2 col-md-6 col-sm-6">
				<div class="widget mb-5 mb-lg-0">
					<h4 class="text-capitalize mb-3">Support</h4>
					<div class="divider mb-4"></div>

					<ul class="list-unstyled footer-menu lh-35">
						<li><a href="Anasayfa">Anasayfa</a></li>
						<li><a href="galeri">Fotoğraf galerisi</a></li>
						<li><a href="hakkimizda">Hakkımızda</a></li>
						<li><a href="iletisim">İletişim</a></li>
						
					</ul>
				</div>
			</div>

			<div class="col-lg-3 col-md-6 col-sm-6">
				<div class="widget widget-contact mb-5 mb-lg-0">
					<h4 class="text-capitalize mb-3">İletişim</h4>
					<div class="divider mb-4"></div>

					<div class="footer-contact-block mb-4">
						<div class="icon d-flex align-items-center">
							<i class="icofont-email mr-3"></i>
							<span class="h6 mb-0">24/7 iletişim</span>
						</div>
						<h4 class="mt-2"><a href="mailto:<?php echo $ayarcek["mail"] ?>"><?php echo $ayarcek["mail"] ?></a></h4>
					</div>

					<div class="footer-contact-block">
						<div class="icon d-flex align-items-center">
							<i class="icofont-support mr-3"></i>
							<span class="h6 mb-0">hafta içi : 08:30 - 18:00</span>
						</div>
						<h4 class="mt-2"><a href="tel:<?php echo $ayarcek["tel"] ?>"><?php echo $ayarcek["tel"] ?></a></h4>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-btm py-4 mt-5">
			<div class="row align-items-center justify-content-between">
				<div class="col-lg-6">
				
				</div>
			
			</div>

			<div class="row">
				<div class="col-lg-4">
					<a class="backtop js-scroll-trigger" href="#top">
						<i class="icofont-long-arrow-up"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</footer>

   