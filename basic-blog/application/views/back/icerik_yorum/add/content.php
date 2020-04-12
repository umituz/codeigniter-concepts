<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
              <form role="form" enctype="multipart/form-data" action="<?php echo base_url("admin/icerikler/add") ?>" method="post">
              
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Resim Seç</label>
                  <input type="file" class="form-control" name="resim_konumu" id="exampleInputEmail1">
                </div>
              </div>
              
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Başlık</label>
                  <input type="text" class="form-control" name="baslik" id="exampleInputEmail1">
                </div>
              </div>

              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Etiketler</label>
                  <input type="text" class="form-control" name="etiketler" id="exampleInputEmail1">
                </div>
              </div>

              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Detaylar</label>
                  <textarea id="detay" name="detay" class="form-control"></textarea>
                </div>
              </div>

              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Sıra</label>
                  <input type="text" class="form-control" name="sira" id="exampleInputEmail1">
                </div>
              </div>

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Ekle</button>
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