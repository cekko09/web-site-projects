<?php require_once "header.php" ?>
<?php require_once "sidebar.php" ?>
<div class="content-wrapper">

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">slider</h3>

                    <?php if (@$_GET["durum"] == "ok") { ?>
                        <span class="text-success "> Başarılı</span>
                    <?php                } else if(@$_GET["durum"] == "no") { ?>
                        <span class="text-danger "> başarısız</span>



                    <?php                } ?>

                </div>
                <a href="slider-ekle.php"> <button class="btn btn-info  btn-block"> slider ekle+</button></a>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>sira</th>                          
                            <th>resim</th>                          
                            <th>baslik</th>                          
                                                  
                            <th>Düzenle</th>
                            <th>Sil</th>

                        </tr>
                        <?php $slidersor = $baglan->prepare("SELECT * FROM slider order by sira asc");
                        $slidersor->execute();
                        ?>

                        <?php while ($slidercek = $slidersor->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr style="height:50px !important ;">
                                <td><?php echo $slidercek["sira"] ?></td>
                                <td><img src="../resimler/slider/<?php echo $slidercek["resim"] ?>" width="300" height="150" alt=""></td>
                                <td><?php echo $slidercek["baslik"] ?></td>
                                <td><a style="width:75px !important; height:35px !important; " href="duzenle.php?id=<?php echo $slidercek["id"] ?>&sayfa=slider"  class="btn btn-success"> düzenle </a></td>

<form action="yukle.php" method="post">
                                <input type="hidden" name="resim" value="<?php echo $slidercek["resim"] ?>">
                                <input type="hidden" name="id" value="<?php echo $slidercek["id"] ?>">
                                <td><a style="width:75px !important; height:35px !important; " > <button name="slidersil" class="btn btn-danger">  Sil </button></a></td>
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