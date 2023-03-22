<?php  require_once "header.php";
require_once "sidebar.php";


?>
  <!-- Left side column. contains the logo and sidebar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

   <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Alt Kategori ekle</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="yukle.php" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">başlık</label>
                  <input type="text"   class="form-control" id="exampleInputEmail1" name="baslik">
                </div>
             
            

                <div class="form-group">
                  <label for="exampleInputEmail1">sira</label>
                  <input type="text" class="form-control" id="exampleInputEsira1" name="sira">
                </div>

              </div>
              <!-- /.box-body -->
    <input type="hidden" name="katid" value="<?php echo $_GET["katid"] ?>">
              <div class="box-footer">
                <button type="submit" name="altkategorikaydet" class="btn btn-primary">kaydet</button>
              </div>
            </form>
          </div>
  
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php require_once "footer.php";  ?>