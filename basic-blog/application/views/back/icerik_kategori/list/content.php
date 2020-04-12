<!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <a href="<?php echo base_url("admin/icerik_kategoriler/ekle"); ?>"><button class="btn btn-primary" style="margin-bottom: 15px;">+ Ekle</button></a>
        <div class="box">
          <div class="box-body">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>Sıra</th>
                <th>Kategori Adı</th>
                <th>Kategori SEO</th>
                <th>Eklenme Tarihi</th>
                <th colspan="2">İşlemler</th>
              </tr>
              </thead>
              <tbody class="siralamaListesi" postUrl="admin/icerikler/sirala">
              <?php foreach($rows as $row){ ?>
              <tr id="siralamaID-<?php echo $row->id; ?>">
                <td><?php echo $row->sira ?></td>
                <td><?php echo $row->kategori_ad ?></td>
                <td><?php echo $row->kategori_seo ?></td>
                <td><?php echo $row->eklenme_tarihi ?></td>
                <td width="10"><a href="<?php echo base_url("admin/icerik_kategoriler/duzenle/$row->id"); ?>"><i class="fa fa-edit fa-2x"></i></a></td>
                <td width="10"><a onclick="return confirm('Silmek istediğinize emin misiniz?');" href="<?php echo base_url("admin/icerik_kategoriler/delete/$row->id"); ?>"><i class="fa fa-trash-o fa-2x"></i></a></td>
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