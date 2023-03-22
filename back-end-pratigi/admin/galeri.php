<?php require_once "header.php" ?>
<?php require_once "sidebar.php" ?>
<div class="content-wrapper">

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">galeriler</h3>

                    <?php if (@$_GET["durum"] == "ok") { ?>
                        <span class="text-success "> Başarılı</span>
                    <?php                } else if(@$_GET["durum"] == "no") { ?>
                        <span class="text-danger "> başarısız</span>



                    <?php                } ?>

                </div>
                <a href="galeri-ekle.php"> <button class="btn btn-info  btn-block"> galeri ekle+</button></a>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>sira</th>                          
                            <th>resim</th>                          
                            <th>Düzenle</th>
                            <th>Sil</th>

                        </tr>
                        <?php $galerisor = $baglan->prepare("SELECT * FROM galeri order by sira asc");
                        $galerisor->execute();
                        ?>

                        <?php while ($galericek = $galerisor->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr style="height:50px !important ;">
                                <td><?php echo $galericek["sira"] ?></td>
                                <td><img src="../resimler/galeri/<?php echo $galericek["resim"] ?>" width="300" height="150" alt=""></td>
                                <td><a style="width:75px !important; height:35px !important; " href="duzenle.php?id=<?php echo $galericek["id"] ?>&sayfa=galeri"  class="btn btn-success"> düzenle </a></td>

<form action="yukle.php" method="post">
                                <input type="hidden" name="resim" value="<?php echo $galericek["resim"] ?>">
                                <input type="hidden" name="id" value="<?php echo $galericek["id"] ?>">
                                <td><a style="width:75px !important; height:35px !important; " > <button name="galerisil" class="btn btn-danger">  Sil </button></a></td>
                                </form>

                            </tr>
                        <?php } ?>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>
<?php require_once "footer.php" ?>