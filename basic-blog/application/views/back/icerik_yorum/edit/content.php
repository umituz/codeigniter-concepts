<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-body">
          <form role="form" action="<?php echo base_url("admin/icerikler/edit/$row->id") ?>" method="post">
          
          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Yüklü Resim</label><br>
              <img width="200" src="<?php echo base_url().$row->resim_konumu; ?>">
            </div>
          </div>

          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Başlık</label>
              <input type="text" class="form-control" name="baslik" value="<?php echo $row->baslik; ?>">
            </div>
          </div>

          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Etiketler</label>
              <input type="text" class="form-control" name="etiketler" value="<?php echo $row->etiketler; ?>">
            </div>
          </div>

          <div class="box-body">
            <div class="form-group">
              <label for="exampleInputEmail1">Detaylar</label>
              <textarea id="detay" name="detay" class="form-control"><?php echo $row->detay; ?></textarea>
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