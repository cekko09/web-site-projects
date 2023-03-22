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

    <title>Hakkımızda</title>
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

        if(@$_POST["reset"]) {

            $sil = $db->prepare("DELETE FROM hakkimizda");
            $sil->execute();
            if($sil->execute()) {

                header("Location: hakkımızda.php?hakkımızdasil=ok");
            }
            else {
                header("Location: hakkımızda.php?hakkımızdasil=no");

            }


        }



    if (@$_POST["submit"]) {

        // her eklendiğinde diğerlerini silmek için
        $otosil = $db->prepare("DELETE FROM hakkimizda ");
        $otosil->execute();


        // eklemek için
        $aciklama = htmlspecialchars(@$_POST["aciklama"]);

        $hakkimizda = $db->prepare("INSERT INTO hakkimizda (aciklama) VALUES (:aciklama) ");
        $hakkimizda->bindValue(":aciklama", $aciklama);

        if ($hakkimizda->execute()) {
            header("Location:hakkımızda.php?hakkımızda=ok");
        } else {

            header("Location:hakkımızda.php?hakkımızda=no");
        }
    }

// çekmek için
    $cek = $db->prepare("SELECT * FROM hakkimizda order by id DESC LIMIT 1");
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
                    <h1 class="page-header">Hakkımızda <span class="text-success " style="font-size:16px;"> <?php if (@$_GET['hakkımızda'] == "ok") {

                                                                    echo "hakkımızda yazınız eklendi/güncellendi";
                                                                }
                                                                if(@$_GET["hakkımızdasil"]=="ok"){
                                                                    echo "başarıyla silindi";

                                                                }else if(@$_GET["hakkımzıdasil"]=="no"){
                                                                    echo "başarısız silme işlemi";

                                                                } ?></span></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="anasayfa.php" class="btn btn-danger">Geri Dön</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form enctype="multipart/form-data" role="form" action="" method="POST">


                                        <div class="form-group">
                                            <label>Açıklama</label>
                                            <textarea id="mytextarea" name="aciklama" class="form-control" placeholder="Açıklama giriniz" rows="3"> <?php echo @$row["aciklama"]; ?></textarea>
                                        </div>



                                        <input type="submit" name="submit" class="btn btn-default">
                                        <input type="submit" name="reset" value="sil" class="btn btn-default">


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