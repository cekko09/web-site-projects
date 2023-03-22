<?php require_once "header.php" ?>
<?php require_once "sidebar.php" ?>
<div class="content-wrapper">

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Alt Kategoriler</h3>

                    <?php if (@$_GET["durum"] == "ok") { ?>
                        <span class="text-success "> Başarılı</span>
                    <?php                } else if(@$_GET["durum"] == "no") { ?>
                        <span class="text-danger "> başarısız</span>



                    <?php                } ?>

                </div>
                <a href="alt-kategori-ekle.php?katid=<?php echo $_GET["katid"] ?>"> <button class="btn btn-info  btn-block"> alt kategori ekle+</button></a>
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
                        <?php $altkategorisor = $baglan->prepare("SELECT * FROM altkategori where kategori_id=? ");
                        $altkategorisor->execute(array($_GET["katid"]));
                        ?>

                        <?php while ($altkategoricek = $altkategorisor->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr style="height:50px !important ;">
                                <td><?php echo $altkategoricek["alt_sira"] ?></td>
                                <td><?php echo $altkategoricek["alt_baslik"] ?></td>
                                <td><a style="width:75px !important; height:35px !important; " href="urunler.php?altid=<?php echo  $altkategoricek["id"] ?>" class="btn btn-primary ">git</a></td>
                                <td><a style="width:75px !important; height:35px !important; " href="duzenle.php?id=<?php echo $altkategoricek["id"] ?>&sayfa=altkategori&katid=<?php  echo $altkategoricek["kategori_id"] ?>"  class="btn btn-success"> düzenle </a></td>
                                <td><a style="width:75px !important; height:35px !important; " href="yukle.php?id=<?php   echo $altkategoricek["id"]   ?>&altkategorisil&katid=<?php echo $altkategoricek["kategori_id"] ?>" > <button name="sil" class="btn btn-danger">  Sil </button></a></td>


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