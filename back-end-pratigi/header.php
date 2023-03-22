<?php require_once "admin/baglanti.php";
require_once "function.php";

$ayarsor = $baglan->prepare("SELECT * FROM ayarlar where id=?");
$ayarsor->execute(array(1));
$ayarcek = $ayarsor->fetch(PDO::FETCH_ASSOC);

$ksor=$baglan->prepare("SELECT * FROM kullanici where mail=? and sifre=?");

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<meta name="aciklama" content="<?php echo $ayarcek["aciklama"] ?></">
	<meta name="keywords" content="<?php echo $ayarcek["anahtar"] ?></">
	<meta name="author" content="cenk yalçın">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php echo $ayarcek["baslik"] ?></title>

	<!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico" />

	<!-- bootstrap.min css -->
	<link rel="stylesheet" href="plugins/bootstrap/css/bootstrap.min.css">
	<!-- Icon Font Css -->
	<link rel="stylesheet" href="plugins/icofont/icofont.min.css">
	<!-- Slick Slider  CSS -->
	<link rel="stylesheet" href="plugins/slick-carousel/slick/slick.css">
	<link rel="stylesheet" href="plugins/slick-carousel/slick/slick-theme.css">

	<!-- Main Stylesheet -->
	<link rel="stylesheet" href="css/style.css">

</head>

<body id="top">

	<header>
		<div class="header-top-bar">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6">
						<ul class="top-bar-info list-inline-item pl-0 mb-0">
							<li class="list-inline-item"><a href="mailto:<?php echo $ayarcek["mail"] ?>"><i class="icofont-support-faq mr-2"></i><?php echo $ayarcek["mail"] ?></a></li>
							<li class="list-inline-item"><i class="icofont-location-pin mr-2"></i><?php echo $ayarcek["adres"] ?> </li>
						</ul>
					</div>
					<div class="col-lg-6">
						<div class="text-lg-right top-right-bar mt-2 mt-lg-0">
							<a href="tel:+23-345-67890">
								<span>Call Now : </span>
								<span class=""><?php echo $ayarcek["tel"] ?></span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="navbar navbar-expand-lg navigation" id="navbar">
			<div class="container">
				<a class="navbar-brand" href="index.html">
					<img src="./resimler/ayar/<?= $ayarcek["logo"] ?>" alt="" class="img-fluid">
				</a>

				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarmain" aria-controls="navbarmain" aria-expanded="false" aria-label="Toggle navigation">
					<span class="icofont-navigation-menu"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarmain">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item active">
							<a class="nav-link" href="index">Anasayfa</a>
						</li>
						<li class="nav-item"><a class="nav-link" href="hakkimizda">hakkımızda</a></li>

						<?php $kategori = $baglan->prepare("SELECT * FROM kategori");
						$kategori->execute()
						?>
						<?php while ($kategoricek = $kategori->fetch(PDO::FETCH_ASSOC)) {
							$katid = $kategoricek["kategori_id"];
						?>

							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="department.php" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $kategoricek["kategori_baslik"] ?> <i class="icofont-thin-down"></i></a>
								<ul class="dropdown-menu" aria-labelledby="dropdown02">

									<?php $altkategori = $baglan->prepare("SELECT * FROM altkategori where kategori_id=? order by alt_sira asc");
									$altkategori->execute(array($katid))
									?>
									<?php while ($altkategoricek = $altkategori->fetch(PDO::FETCH_ASSOC)) {  ?>

										<li><a class="dropdown-item" href="urunler-<?=seo($altkategoricek['alt_baslik']).'-'.$altkategoricek['id']?>"><?php echo $altkategoricek["alt_baslik"] ?></a></li>
									<?php }  ?>
								</ul>
							</li>
						<?php }  ?>

						<li class="nav-item"><a class="nav-link" href="galeri">galeri</a></li>
						<li class="nav-item"><a class="nav-link" href="iletisim">iletisim</a></li>
					</ul>
				</div>
			</div>
		</nav>
	</header>