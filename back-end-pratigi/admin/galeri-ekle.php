<?php  require_once "header.php";
require_once "sidebar.php";


?>
  <!-- Left side column. contains the logo and sidebar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

   <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">galeri ekle</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form  action="yukle.php" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">sira</label>
                  <input type="text"   class="form-control" id="exampleInputEmail1" name="sira">
                </div>
             
            

                <div class="form-group">
                  <label for="exampleInputEmail1">resim</label>
                  <input type="file" class="form-control" name="resim">
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" name="galerikaydet" class="btn btn-primary">kaydet</button>
              </div>
            </form>
          </div>
  
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php require_once "footer.php";  ?>