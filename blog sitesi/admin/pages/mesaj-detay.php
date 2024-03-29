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

$okundu = $db->prepare("UPDATE  iletisim SET okundu = :a WHERE id = :id");
$okundu->bindValue(":a",1);
$okundu->bindValue(":id",$id);
$okundu->execute();

        

            $cek = $db->prepare("SELECT * FROM iletisim where id=:i");
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
                    <h1 class="page-header">mesaj</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="gelen-kutusu.php" class="btn btn-danger">Geri Dön</a>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form   >

                                        <div class="form-group">
                                           <p> <b>Ad:</b> <?php echo $row["ad"]; ?> </p>
                                           <p> <b>e-mail:</b> <?php echo $row["email"]; ?> </p>
                                           <p> <b>telefon:</b> <?php echo $row["telefon"]; ?> </p>
                                           <p> <b>mesaj:</b> <?php echo $row["mesaj"]; ?> </p>
                                        </div>
                                       


                                        <a href="gelen-kutusu.php?islem=sil&id=<?php echo $row["id"] ?>" onclick="return confirm('silmek istediğinize emin misiniz')" class="btn btn-danger">sil</a>


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