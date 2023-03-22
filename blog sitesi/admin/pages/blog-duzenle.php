<?php 

require_once "inc-functions.php";

?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog duzenle</title>
    <script src="../js/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<?php

$id= intval(@$_GET["id"]);
        if(@$_POST["update"]) {
            

            $baslik = htmlspecialchars(@$_POST["baslik"] , ENT_QUOTES, 'UTF-8');
            $alt_baslik = htmlspecialchars(@$_POST["alt_baslik"] , ENT_QUOTES, 'UTF-8');
            $aciklama = htmlspecialchars(@$_POST["aciklama"] , ENT_QUOTES, 'UTF-8');
            $aktif = htmlspecialchars(@$_POST["aktif"] , ENT_QUOTES, 'UTF-8');
            
                $duzenle = $db->prepare("UPDATE blog SET baslik = :baslik, alt_baslik = :alt_baslik, aciklama = :aciklama, aktif = :aktif
               where id=:i");

                $duzenle->bindValue(":baslik",$baslik);
                $duzenle->bindValue(":alt_baslik",$alt_baslik);
                $duzenle->bindValue(":aciklama",$aciklama);
                $duzenle->bindValue(":aktif",$aktif);
                $duzenle->bindValue(":i",$id);
                if($duzenle->execute()) {
                    header("Location:blog.php?blog=updated");

                }else {
                    header("Location:blog-duzenle.php?blog=no");


                }
       
       
            }

            $cek = $db->prepare("SELECT * FROM blog where id=:i");
            $cek->bindValue(":i",$id);
            $cek->execute();
            $row = $cek->fetch(PDO::FETCH_ASSOC);



            


?>


    <div id="wrapper">

        <!-- Navigation -->
        <?php

        require_once "inc-menu.php";

        ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Düzenle</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="blog.php" class="btn btn-danger">Geri Dön</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form enctype="multipart/form-data" role="form" action="" method="POST"  >

                                        <div class="form-group">
                                            <label>Başlık</label>
                                            <input class="form-control" name="baslik" value="<?php echo $row["baslik"] ?>"placeholder="baslık giriniz">
                                        </div>
                                        <div class="form-group">
                                            <label>Alt Başlık</label>
                                            <input class="form-control" name="alt_baslik" value="<?php echo $row["alt_baslik"] ?>" placeholder="alt baslık giriniz">
                                        </div>


                                        <div class="form-group">
                                            <label>Açıklama</label>
                                            <textarea id="mytextarea" name="aciklama"  class="form-control" placeholder="Açıklama giriniz" rows="3"><?php echo $row["aciklama"] ?></textarea>
                                        </div>


                                        <div class="form-group">
                                            <label>Durum</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="aktif" value="<?php echo $row["aktif"] ?>" <?php  if(@$row["aktif"]==1){
                                                        echo "checked";
                                                    } ?>>aktif
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="aktif" value="<?php echo $row["aktif"] ?>"  <?php  if(@$row["aktif"]==0){
                                                        echo "checked";
                                                    } ?>>pasif
                                                </label>
                                            </div>

                                        </div>

                                        <input type="submit" value="guncelle" name="update" class="btn btn-default">
                                        <input type="reset" value="temizle" name="reset" class="btn btn-default">


                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->

                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>
</body>

</html>