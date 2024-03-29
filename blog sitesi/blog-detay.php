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

       <?php   
       $id = $_GET["id"];
       
       $cek = $db->prepare("SELECT * FROM blog WHERE id=:id LIMIT 1");
       $cek->bindValue("id",$id);
       $cek->execute();
       $row = $cek->fetch(PDO::FETCH_ASSOC);
       if($row["aktif"]==0) {

        header("Location:index.php");
       }
       
       ?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/post-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1><?php echo $row["baslik"];  ?></h1>
                            <h2 class="subheading"><?php echo $row["alt_baslik"];  ?></h2>
                            <span class="meta">
                                Posted by
                                <a href="#!">Start Bootstrap</a>
                                <?php echo $row["tarih"];  ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Post Content-->
        <article class="mb-4">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                      <?php  echo htmlspecialchars_decode($row["aciklama"]); ?>
                    </div>
                </div>
            </div>
        </article>
        <!-- Footer-->
      <?php require_once "includess/inc-footer.php" ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
