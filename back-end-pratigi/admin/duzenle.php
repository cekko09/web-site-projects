<?php  require_once "header.php";
require_once "sidebar.php";
$id = $_GET["id"];
$kategorisor=$baglan->prepare("SELECT * FROM kategori where kategori_id=?");
$kategorisor->execute(array($id));
$kategoricek=$kategorisor->fetch(PDO::FETCH_ASSOC);

$altkategorisor=$baglan->prepare("SELECT * FROM altkategori where id=?");
$altkategorisor->execute(array($id));
$altkategoricek=$altkategorisor->fetch(PDO::FETCH_ASSOC);


$galerisor=$baglan->prepare("SELECT * FROM galeri where id=?");
$galerisor->execute(array($id));
$galericek=$galerisor->fetch(PDO::FETCH_ASSOC);

$urunlersor=$baglan->prepare("SELECT * FROM urunler where id=?");
$urunlersor->execute(array($id));
$urunlercek=$urunlersor->fetch(PDO::FETCH_ASSOC);


$slidersor=$baglan->prepare("SELECT * FROM slider where id=?");
$slidersor->execute(array($id));
$slidercek=$slidersor->fetch(PDO::FETCH_ASSOC);



?>
  <!-- Left side column. contains the logo and sidebar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<?php if($_GET["sayfa"]== "kategori") {   ?>
   <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Kategori düzenle</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="yukle.php" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">başlık</label>
                  <input type="text" value="<?php echo $kategoricek["kategori_baslik"] ?>"   class="form-control"  name="baslik">
                </div>
             
                <input type="hidden" name="katid" value="<?php echo $kategoricek["kategori_id"] ?>">
            

                <div class="form-group">
                  <label for="exampleInputEmail1">sira</label>
                  <input type="text" value="<?php echo $kategoricek["kategori_sira"] ?>"  class="form-control"  name="sira">
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="kategoriduzenle" class="btn btn-primary">kaydet</button>
              </div>
            </form>
          </div>
  
    <!-- /.content -->
  </div>

<?php  }

else if($_GET["sayfa"]== "altkategori") {   ?>
   <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> alt Kategori düzenle</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="yukle.php" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">başlık</label>
                  <input type="text" value="<?php echo $altkategoricek["alt_baslik"] ?>"   class="form-control"  name="baslik">
                </div>
             
                <input type="hidden" name="id" value="<?php echo $altkategoricek["id"] ?>">
                <input type="hidden" name="katid" value="<?php echo $altkategoricek["kategori_id"] ?>">
            

                <div class="form-group">
                  <label for="exampleInputEmail1">sira</label>
                  <input type="text" value="<?php echo $altkategoricek["alt_sira"] ?>"  class="form-control"  name="sira">
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="altkategoriduzenle" class="btn btn-primary">kaydet</button>
              </div>
            </form>
          </div>
  
    <!-- /.content -->
  </div>

<?php  }

else if($_GET["sayfa"]== "galeri") {   ?>
   <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> galeri düzenle</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="yukle.php" method="post" enctype="multipart/form-data">
              <div class="box-body">


              <img src="../resimler/galeri/<?php echo $galericek["resim"] ?>" width="300" height="200" alt="">
              <div class="form-group">
                 
                  <label for="exampleInputEmail1">RESİM</label>
                  <input type="file" value="<?php echo $galericek["resim"] ?>"  class="form-control"  name="resim">
                </div>






                <div class="form-group">
                  <label for="exampleInputEmail1">sira</label>
                  <input type="text" value="<?php echo $galericek["sira"] ?>"   class="form-control"  name="sira">
                </div>
                <input type="hidden" name="eskiresim" value="<?php echo $galericek["resim"] ?>">
             
                <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
                
            

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="galeriduzenle" class="btn btn-primary">kaydet</button>
              </div>
            </form>
          </div>
  
    <!-- /.content -->
  </div>

<?php  }


else if($_GET["sayfa"]== "urunler") {   ?>
   <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> urun düzenle</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="yukle.php" method="post" enctype="multipart/form-data">
              <div class="box-body">


              <img src="../resimler/urunler/<?php echo $urunlercek["resim"] ?>" width="300" height="200" alt="">
              <div class="form-group">
                 
                  <label for="exampleInputEmail1">RESİM</label>
                  <input type="file" value="<?php echo $urunlercek["resim"] ?>"  class="form-control"  name="resim">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">sira</label>
                  <input type="text" value="<?php echo $urunlercek["sira"] ?>"   class="form-control"  name="sira">
                </div>               

                <div class="form-group">
                  <label for="exampleInputEmail1">baslik</label>
                  <input type="text" value="<?php echo $urunlercek["baslik"] ?>"   class="form-control"  name="baslik">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">fiyat</label>
                  <input type="text" value="<?php echo $urunlercek["fiyat"] ?>"   class="form-control"  name="fiyat">
                </div>

                
                <div class="form-group">
                            <label for="exampleInputEmail1">aciklama</label>
                            <textarea name="aciklama" id="editor" cols="30" rows="60"><?php echo $urunlercek["aciklama"] ?></textarea>
                        </div>





                <input type="hidden" name="eskiresim" value="<?php echo $urunlercek["resim"] ?>">
             
                <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
                <input type="hidden" name="altid" value="<?php echo $urunlercek["altkat_id"] ?>">
                
            

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="urunduzenle" class="btn btn-primary">kaydet</button>
              </div>
            </form>
          </div>
  
    <!-- /.content -->
  </div>

<?php  }

else if($_GET["sayfa"]== "slider") {   ?>
   <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> urun düzenle</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="yukle.php" method="post" enctype="multipart/form-data">
              <div class="box-body">


              <img src="../resimler/slider/<?php echo $slidercek["resim"] ?>" width="300" height="200" alt="">
              <div class="form-group">
                 
                  <label for="exampleInputEmail1">RESİM</label>
                  <input type="file" value="<?php echo $slidercek["resim"] ?>"  class="form-control"  name="resim">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">sira</label>
                  <input type="text" value="<?php echo $slidercek["sira"] ?>"   class="form-control"  name="sira">
                </div>               

                <div class="form-group">
                  <label for="exampleInputEmail1">baslik</label>
                  <input type="text" value="<?php echo $slidercek["baslik"] ?>"   class="form-control"  name="baslik">
                </div>

             
                
                <div class="form-group">
                            <label for="exampleInputEmail1">aciklama</label>
                            <textarea name="aciklama" id="editor" cols="30" rows="60"><?php echo $slidercek["aciklama"] ?></textarea>
                        </div>





                <input type="hidden" name="eskiresim" value="<?php echo $slidercek["resim"] ?>">
             
                <input type="hidden" name="id" value="<?php echo $slidercek["id"] ?>">
                
                
            

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="sliderduzenle" class="btn btn-primary">kaydet</button>
              </div>
            </form>
          </div>
  
    <!-- /.content -->
  </div>

<?php  }?>




  <!-- /.content-wrapper -->
  <?php require_once "footer.php";  ?>