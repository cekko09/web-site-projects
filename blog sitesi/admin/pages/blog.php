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

    <title>bloglar</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

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
<!-- AKTİF DEĞİŞ -->

<?php   
//intval ile sayı olma durumunu belrittik
$id = intval(@$_GET["id"]);
if(@$_GET["is"]=="aktif") { 
    
    if($_GET["drm"]==1) {
        $durum=0;
    }else {
        $durum=1;
    }

    $aktif = $db->prepare("UPDATE blog SET aktif = :a WHERE id = :i");
    $aktif->bindValue(":a",$durum);
    $aktif->bindValue(":i",$id);

    if($aktif->execute()) {
        header("Location: blog.php");
    } else {
        header("Location: blog.php");

    }

 }


   if(@$_GET["islem"]=="sil") {
    $sil = $db->prepare("DELETE  FROM blog WHERE id = :i");
    $sil->bindValue(":i",$id,PDO::PARAM_INT);
    if($sil->execute()) {
    header("Location:blog.php");
                }else {

                    header("Location:blog.php?ekle=hata");
                }
}


   ?>
   

    <div id="wrapper">

        <!-- Navigation -->
       <?php
       
       require_once "inc-menu.php"
       ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bloglar</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <a href="blog-ekle.php" class="btn btn-primary">BLOK EKLE +</a> <?php     if(@$_GET["blog"]=="ok") {

echo '<span class=" text-success font-weight-bold "> Bloğunuz başarıyla eklendi </span>';
} ?>
 <?php     if(@$_GET["blog"]=="updated") {

echo '<span class=" text-success font-weight-bold "> Bloğunuz başarıyla guncellendi </span>';
} ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Başlık</th>
                                            <th>Tarih</th>
                                            <th>Aktif</th>
                                            <th>sil-duzenle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 

                                        $cek = $db->prepare("SELECT * FROM blog ORDER BY id DESC");
                                        $cek->execute();
                                        while($row = $cek->fetch(PDO::FETCH_ASSOC)) {


                                    ?>  
                                    
                                    <tr class="odd gradeX">
                                            <td><?php echo $row["id"] ?></td>
                                            <td><?php echo $row["baslik"] ?></td>
                                            <td><?php echo $row["tarih"] ?></td>
                                            <td class="center">
                                            
                                            <?php 
                                            if($row["aktif"]==1){ ?>

                                                <a href="blog.php?is=aktif&id=<?php echo $row["id"]; ?>&drm=<?php echo $row["aktif"]; ?>" onclick="return confirm('değiştirmek istediğinize emin misiniz')" class="btn btn-success">aktif</a>

                                        <?php    }else {   ?>
                                                 <a href="blog.php?is=aktif&id=<?php echo $row["id"]; ?>&drm=<?php echo $row["aktif"];?>" onclick="return confirm('değiştirmek istediğinize emin misiniz')" class="btn btn-danger">pasif</a>
                                          <?php  }
                                            
                                            ?>
                                        </td>
                                            <td class="center">
                                            <a href="blog-duzenle.php?islem=duzenle&id=<?php echo $row['id']?>" class="btn btn-warning">duzenle</a>
                                            <a href="blog.php?islem=sil&id=<?php echo $row["id"] ?>" onclick="return confirm('silmek istediğinize emin misiniz')" class="btn btn-danger">sil</a>
                                        </td>
                                        </tr>
                                  <?php  } ?>  
                                       
                                    </tbody>
                                </table>
                            </div>
                      
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

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="../bower_components/datatables-responsive/js/dataTables.responsive.js"></script>
    
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
