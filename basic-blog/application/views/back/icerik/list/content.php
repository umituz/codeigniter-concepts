<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <a href="<?php echo base_url("admin/icerikler/ekle"); ?>"><button class="btn btn-primary" style="margin-bottom: 15px;">+ Ekle</button></a>
        <div class="box">
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Sıra</th>
                <th>Resim</th>
                <th>Başlık</th>
                <th>Kategori</th>
                <th>Seo Linki</th>
                <th>Eklenme Tarihi</th>
                <th>Hit</th>
                <th colspan="2">İşlemler</th>
              </tr>
              </thead>
              <tbody class="siralamaListesi" postUrl="admin/icerikler/sirala">
              <?php foreach($rows as $row){ ?>
              <tr id="siralamaID-<?php echo $row->id; ?>">
                <td><?php echo $row->sira ?></td>
                <td><img src="<?php echo base_url("$row->resim_konumu"); ?>" width="75" height="50"></td>
                <td><?php echo $row->baslik ?></td>
                <td><?php echo $row->kategori ?></td>
                <td><?php echo $row->seo ?></td>
                <td><?php echo $row->eklenme_tarihi ?></td>
                <td><?php echo $row->hit ?></td>
                <td width="10"><a href="<?php echo base_url("admin/icerikler/duzenle/$row->id"); ?>"><i class="fa fa-edit fa-2x"></i></a></td>
                <td width="10"><a onclick="return confirm('Silmek istediğinize emin misiniz?');" href="<?php echo base_url("admin/icerikler/delete/$row->id"); ?>"><i class="fa fa-trash-o fa-2x"></i></a></td>
              </tr>              
            <?php } ?>
            </table>
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