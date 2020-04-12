<section class="main-container">

  <div class="container">
    <div class="row">

      <div class="main col-lg-12">

        <h2 class="mt-4"><?php echo $gallery->title; ?></h2>

        <div class="space-bottom"></div>
        <div class="row grid-space-20">
          <?php $loop = 1; ?>
          <?php if(!empty($videos)){ ?>
            <?php foreach($videos as $video){ ?>
              <div class="col-3 mb-20">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="//www.youtube.com/embed/91J8pLHdDB0"></iframe>
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
              <a class="btn btn-default" href="<?php echo base_url("video-galerisi"); ?>">
                <i class="fa fa-arrow-left"></i> Geri Dön
              </a>
            </div>
          </div>

        </div>     

      </div>
    </div>
  </section>