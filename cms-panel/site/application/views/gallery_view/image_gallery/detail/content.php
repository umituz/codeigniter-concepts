<section class="main-container">

  <div class="container">
    <div class="row">

      <div class="main col-lg-12">

        <h2 class="mt-4"><?php echo $gallery->title; ?></h2>

        <div class="space-bottom"></div>
        <div class="row grid-space-20">
          <?php $loop = 1; ?>
          <?php if(!empty($images)){ ?>
            <?php foreach($images as $image){ ?>
              <div class="col-3 mb-20">
                <div class="overlay-container">
                  <img src="<?php echo get_picture("gallery/image/$gallery->folder_name",$image->url,"252x156"); ?>" alt="">
                  <a href="<?php echo get_picture("gallery/image/$gallery->folder_name",$image->url,"851x606"); ?>" class="overlay-link small popup-img" title="<?php echo $gallery->title.' - '. $loop++; ?>">
                    <i class="fa fa-plus"></i>
                  </a>
                </div>
              </div>
            <?php } }  else{?>
              <div class="col-md-12">
                <div class="alert alert-warning text-center">
                  Herhangi bir veri bulunamadı!
                </div>
              </div>
            <?php } ?>
            <div class="col-md-12">
              <a class="btn btn-default" href="<?php echo base_url("fotograf-galerisi"); ?>">
                <i class="fa fa-arrow-left"></i> Geri Dön
              </a>
            </div>
          </div>

        </div>     

      </div>
    </div>
  </section>