<?php require_once "admin/pages/inc-functions.php"           ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Clean Blog - Start Bootstrap Theme</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Navigation-->
    <?php
    require_once "includess/inc-menu.php";

    ?>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>Hoşgeldiniz</h1>
                        <span class="subheading">İlk blog sitemiz hayırlı olsun</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Post preview-->
                <?php

    @$kelime = $_GET["q"];
    //EĞER ARAMA YAPILDIYSA
   if($kelime) {
       $cek = $db->prepare("SELECT*FROM blog WHERE aktif = :aktif&& baslik LIKE :kelime ORDER BY id DESC");
        $cek->bindValue(":aktif",1);
        $cek->bindValue(":kelime","%$kelime%");
  
    }else{
        //eğer arama yapılmadıysa varsayılan kayıtlar gelsin
   

                $cek = $db->prepare("SELECT * FROM blog where aktif = :aktif ORDER BY id desc");
                $cek->bindValue(':aktif',1);
             }
                $cek->execute();
                while ($row = $cek->fetch(PDO::FETCH_ASSOC)) {

                ?>

                    <div class="post-preview">
                        <a href="blog-detay.php?id=<?php echo $row["id"] ?>">
                            <h2 class="post-title"><?php echo $row["baslik"];  ?></h2>
                            <h3 class="post-subtitle"><?php echo $row["alt_baslik"];  ?> </h3>
                        </a>
                       
                        <span> <?php  echo $row["tarih"] ?></span>
                    </div>
                    <!-- Divider-->
                    <hr class="" />
                    <!-- Post preview-->
                <?php  } ?>


                <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
            </div>
        </div>
    </div>
    <!-- Footer-->
    <?php

    require_once "includess/inc-footer.php";


    ?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>