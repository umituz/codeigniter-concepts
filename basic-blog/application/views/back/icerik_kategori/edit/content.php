<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-body">
          <form role="form" action="<?php echo base_url("admin/icerik_kategoriler/edit/$row->id") ?>" method="post">
          
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Kategori Adı</label>
              <input type="text" class="form-control" name="kategori_ad" value="<?php echo $row->kategori_ad; ?>">
            </div>
          </div>

          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Sıra</label>
              <input type="text" class="form-control" name="sira" value="<?php echo $row->sira; ?>">
            </div>
          </div>

          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Düzenle</button>
          </div>
        </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->