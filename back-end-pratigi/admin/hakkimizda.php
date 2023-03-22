<?php  require_once "header.php";
require_once "sidebar.php";

$hakkimizdasor=$baglan->prepare("SELECT * FROM hakkimizda where hakkimizda_id=?");
$hakkimizdasor->execute(array(1));
$hakkimizdacek=$hakkimizdasor->fetch(PDO::FETCH_ASSOC);

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
            <form role="form" action="yukle.php" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">başlık</label>
                  <input type="text"  value="<?php echo $hakkimizdacek["hakkimizda_baslik"] ?>" class="form-control" id="exampleInputEmail1" name="baslik">
                </div>
             
                <div class="form-group">
                  <label for="exampleInputEmail1">aciklama</label>
                 <textarea name="aciklama" id="editor" cols="30" rows="60"><?php echo $hakkimizdacek["hakkimizda_aciklama"] ?></textarea>
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">vizyon</label>
                  <input type="text" value="<?php echo $hakkimizdacek["hakkimizda_vizyon"] ?>" class="form-control" id="exampleInputEmail1" name="vizyon">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">misyon</label>
                  <input type="text" value="<?php echo $hakkimizdacek["hakkimizda_misyon"] ?>" class="form-control" id="exampleInputEmisyon1" name="misyon">
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="hakkimizdakaydet" class="btn btn-primary">kaydet</button>
              </div>
            </form>
          </div>
  
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php require_once "footer.php";  ?>