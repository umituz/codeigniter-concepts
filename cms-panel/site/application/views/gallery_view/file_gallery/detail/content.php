<section class="main-container">

  <div class="container">
    <div class="row">

      <div class="main col-lg-12">

        <h2 class="mt-4"><?php echo $gallery->title; ?></h2>

        <div class="space-bottom"></div>
        <div class="row grid-space-20">
          <?php $loop = 1; ?>
          <?php if(!empty($files)){ ?>
            <table class="table table-striped table-hover table-bordered table-colored">
              <thead>
                <th>Dosya Adı</th>
                <th>İndir</th>
              </thead>
              <tbody>
               <?php foreach($files as $file){ ?>
                <tr>
                  <td><?php echo $file->url ?></td>
                  <td width="100">
                    <a 
                    target="_blank" 
                    download="PrensipMeselesi - <?php echo $file->url ?>"
                    href="<?php echo base_url("uploads/gallery/file/$gallery->folder_name/$file->url"); ?>" 
                    class="btn btn-animated btn-default">İndir<i class="pl-10 fa fa-download"></i></a>
                  </td>
                </tr>
              <?php } ?>

            </tbody>
          </table>
          <?php foreach($files as $file){ ?>

          <?php } }  else{?>
            <div class="col-md-12">
              <div class="alert alert-warning text-center">
                Herhangi bir veri bulunamadı!
              </div>
            </div>
          <?php } ?>
          <div class="col-md-12">
            <a class="btn btn-default" href="<?php echo base_url("file-galerisi"); ?>">
              <i class="fa fa-arrow-left"></i> Geri Dön
            </a>
          </div>
        </div>

      </div>     

    </div>
  </div>
</section>