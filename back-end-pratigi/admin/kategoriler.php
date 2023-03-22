<?php require_once "header.php" ?>
<?php require_once "sidebar.php" ?>
<div class="content-wrapper">

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Kategoriler</h3>

                    <?php if (@$_GET["durum"] == "ok") { ?>
                        <span class="text-success "> Başarılı</span>
                    <?php                } else if(@$_GET["durum"] == "no"){ ?>
                        <span class="text-danger "> başarısız</span>



                    <?php                } ?>

                </div>
                <a href="kategori-ekle.php"> <button class="btn btn-info  btn-block"> kategori ekle+</button></a>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>sira</th>
                            <th>baslik</th>
                            <th>görüntüle</th>
                            <th>Düzenle</th>
                            <th>Sil</th>

                        </tr>
                        <?php $kategorisor = $baglan->prepare("SELECT * FROM kategori order by kategori_sira asc");
                        $kategorisor->execute();
                        ?>

                        <?php while ($kategoricek = $kategorisor->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr style="height:50px !important ;">
                                <td><?php echo $kategoricek["kategori_sira"] ?></td>
                                <td><?php echo $kategoricek["kategori_baslik"] ?></td>
                                <td><a style="width:75px !important; height:35px !important; " href="alt-kategori.php?katid=<?php echo $kategoricek["kategori_id"] ?>" class="btn btn-primary ">git</a></td>
                                <td><a style="width:75px !important; height:35px !important; " href="duzenle.php?id=<?php echo $kategoricek["kategori_id"] ?>&sayfa=kategori"  class="btn btn-success"> düzenle </a></td>
                                <td><a style="width:75px !important; height:35px !important; " href="yukle.php?id=<?php echo $kategoricek["kategori_id"] ?>&kategorisil" > <button name="sil" class="btn btn-danger">  Sil </button></a></td>


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