<?php require_once "header.php" ?>
<?php require_once "sidebar.php" ?>
<div class="content-wrapper">

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"> Ürünler</h3>

                    <?php if (@$_GET["durum"] == "ok") { ?>
                        <span class="text-success "> Başarılı</span>
                    <?php                } else if(@$_GET["durum"] == "no") { ?>
                        <span class="text-danger "> başarısız</span>



                    <?php                } ?>

                </div>
                <a href="urun-ekle.php?altid=<?php echo $_GET["altid"] ?>"> <button class="btn btn-info  btn-block"> urun  ekle+</button></a>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                        <th>resim</th>
                            <th>sira</th>
                            <th>baslik</th>
                            <th>aciklama</th>
                            <th>fiyat</th>
                          

                            <th>Düzenle</th>
                            <th>Sil</th>

                        </tr>
                        <?php $urunlersor = $baglan->prepare("SELECT * FROM urunler where altkat_id=? order by sira asc ");
                        $urunlersor->execute(array($_GET["altid"]));
                        ?>

                        <?php while ($urunlercek = $urunlersor->fetch(PDO::FETCH_ASSOC)) { ?>
                            <tr style="height:50px !important ;">
                                <td><img width="200" height="100" src="../resimler/urunler/<?php echo $urunlercek["resim"] ?>" alt=""></td>
                                <td><?php echo $urunlercek["sira"] ?></td>
                                <td><?php echo $urunlercek["baslik"] ?></td>
                                <td><?php echo $urunlercek["aciklama"] ?></td>
                                <td><?php echo $urunlercek["fiyat"] ?></td>
                                                <td><a style="width:75px !important; height:35px !important; " href="duzenle.php?urunlersil&id=<?php echo $urunlercek["id"] ?>&sayfa=urunler&altid=<?php  echo $_GET["altid"] ?>"   class="btn btn-success"> düzenle </a></td>
                                
                                
                                                <form action="yukle.php" method="post">
                                <input type="hidden" name="resim" value="<?php echo $urunlercek["resim"] ?>">
                                <input type="hidden" name="id" value="<?php echo $urunlercek["id"] ?>">
                                <input type="hidden" name="altid" value="<?php echo $urunlercek["altkat_id"] ?>">
                                <td><a style="width:75px !important; height:35px !important; " > <button name="urunlersil" class="btn btn-danger">  Sil </button></a></td>
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