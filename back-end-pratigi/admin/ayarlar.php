<?php require_once "header.php";
require_once "sidebar.php";

$ayarsor = $baglan->prepare("SELECT * FROM ayarlar where id=?");
$ayarsor->execute(array(1));
$ayarcek = $ayarsor->fetch(PDO::FETCH_ASSOC);

?>
<!-- Left side column. contains the logo and sidebar -->


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->

  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Quick Example</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form action="yukle.php" method="post" enctype="multipart/form-data">
      <div class="box-body">

      <div class="form-group">
          <label for="exampleInputEmail1"> Logo</label>
          <input type="hidden" value="<?= $ayarcek["logo"] ?>" name="eskiresim">
      <img src="./resimler/ayar/<?php echo $ayarcek["logo"] ?>" alt="">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">Resim</label>
          <input type="file"  class="form-control" id="exampleInputEmail1" name="resim">
        </div>
        <button type="submit" class="btn btn-block btn-success" name="logokaydet">LOGO YÜKLE</button>
      </div>
    </form>


    <form role="form" action="yukle.php" method="post">
      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputEmail1">başlık</label>
          <input type="text" value="<?php echo $ayarcek["baslik"] ?>" class="form-control" id="exampleInputEmail1" name="baslik">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">aciklama</label>
          <input type="text" value="<?php echo $ayarcek["aciklama"] ?>" class="form-control" id="exampleInputEmail1" name="aciklama">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">anahtar</label>
          <input type="text" value="<?php echo $ayarcek["anahtar"] ?>" class="form-control" id="exampleInputEmail1" name="anahtar">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">mail</label>
          <input type="text" value="<?php echo $ayarcek["mail"] ?>" class="form-control" id="exampleInputEmail1" name="mail">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">adres</label>
          <input type="text" value="<?php echo $ayarcek["adres"] ?>" class="form-control" id="exampleInputEmail1" name="adres">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">tel no</label>
          <input type="text" value="<?php echo $ayarcek["tel"] ?>" class="form-control" id="exampleInputEmail1" name="tel">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">whatsapp</label>
          <input type="text" value="<?php echo $ayarcek["wp"] ?>" class="form-control" id="exampleInputEmail1" name="whatsapp">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">facebook</label>
          <input type="text" value="<?php echo $ayarcek["face"] ?>" class="form-control" id="exampleInputEmail1" name="facebook">
        </div>

        <div class="form-group">
          <label for="exampleInputEmail1">twitter</label>
          <input type="text" value="<?php echo $ayarcek["twt"] ?>" class="form-control" id="exampleInputEmail1" name="twitter">
        </div>

      </div>
      <!-- /.box-body -->

      <div class="box-footer">
        <button type="submit" name="ayarkaydet" class="btn btn-primary">kaydet</button>
      </div>
    </form>
  </div>

  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require_once "footer.php";  ?>