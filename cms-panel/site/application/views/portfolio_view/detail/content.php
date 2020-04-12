
<div class="main-container">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <!-- banner start -->
        <!-- ================ -->
        <div class="pv-40 banner">
          <div class="container clearfix">

            <!-- slideshow start -->
            <!-- ================ -->
            <div class="slideshow">

              <!-- slider revolution start -->
              <!-- ================ -->
              <div class="slider-revolution-5-container">
                <div id="slider-banner-boxedwidth" class="slider-banner-boxedwidth rev_slider" data-version="5.0">
                  <ul class="slides">

                   <?php foreach($portfolio_images as $image){ ?> 
                      <li class="text-center" data-transition="slidehorizontal" data-slotamount="default" data-masterspeed="default" data-title="Project Image 1">

                      <!-- main image -->
                      <img src="<?php echo base_url("panel/uploads/portfolio/$image->img_url"); ?>" alt="" data-bgposition="center top"  data-bgrepeat="no-repeat" data-bgfit="cover" class="rev-slidebg">

                      <!-- Transparent Background -->
                      <div class="tp-caption dark-translucent-bg"
                      data-x="center"
                      data-y="center"
                      data-start="0"
                      data-transform_idle="o:1;"
                      data-transform_in="o:0;s:600;e:Power2.easeInOut;"
                      data-transform_out="o:0;s:600;"
                      data-width="5000"
                      data-height="450">
                    </div>


            </li>
                   <?php } ?>

                  </ul>
                  <div class="tp-bannertimer"></div>
                </div>
              </div>
              <!-- slider revolution end -->

            </div>
            <!-- slideshow end -->

          </div>
        </div>
        <!-- banner end -->

        <!-- main-container start -->
        <!-- ================ -->
        <section class="main-container padding-ver-clear">
          <div class="container pv-40">
            <div class="row">

              <!-- main start -->
              <!-- ================ -->
              <div class="main col-lg-8">
                <h1 class="title"><?php echo $portfolio->title ?></h1>
                <div class="separator-2"></div>
                <p><?php echo $portfolio->description ?></p>

              </div>

              <aside class="col-lg-4 col-xl-3 ml-xl-auto">
              <div class="sidebar">
                <div class="block clearfix">
                  <h3 class="title">Proje Bilgileri</h3>
                  <div class="separator-2"></div>
                  <ul class="list margin-clear">
                    <li><strong>Müşteri: </strong> <span class="text-right"><?php echo $portfolio->client; ?></span></li>
                    <li><strong>Bitiş Tarihi: </strong> <span class="text-right"><?php echo get_readable_date($portfolio->finishedAt); ?></span></li>
                    <li><strong>Kategori: </strong> <span class="text-right"><?php echo get_category_title($portfolio->category_id); ?></span></li>
                    <li><strong>Yer: </strong> <span class="text-right"><?php echo $portfolio->place ?></span></li>
                    <li><strong>URL: </strong> <span class="text-right"><a target="_blank" href="<?php echo $portfolio->portfolio_url ?>"><?php echo $portfolio->portfolio_url ?></a></span></li>
                  </ul>
                  <a target="_blank" href="<?php echo $portfolio->portfolio_url ?>" class="btn btn-animated btn-default btn-lg">Siteye Git <i class="fa fa-external-link"></i></a>
                </div>
              </div>
            </aside>
              <!-- main end -->
            </div>
          </div>
        </section>
        <!-- main-container end -->

        <!-- section start -->
        <!-- ================ -->
        <?php if(!empty($other_portfolios)){ ?>
        <section class="section pv-40 clearfix">
          <div class="container">
            <h3 class="mt-3">Diğer <strong>Çalışmalarımız</strong></h3>
            <div class="row grid-space-10">
              <?php foreach($other_portfolios as $portfolio){ ?>
                <div class="col-sm-4">
                  <div class="image-box style-2 mb-20 bordered">
                    <div class="overlay-container overlay-visible">

                      <?php  
                      $image = get_portfolio_cover_image($portfolio->id);
                      $image = ($image) ? base_url("panel/uploads/portfolio/$image") :"";
                      ?>

                      <img width="300" height="300" src="<?php echo $image; ?>" alt="">
                      <div class="overlay-bottom text-left">
                        <p class="lead margin-clear"><?php echo $portfolio->title; ?></p>
                      </div>
                    </div>
                    <div class="body">
                      <p><?php echo character_limiter(strip_tags($portfolio->description),60); ?></p>
                      <a href="<?php echo base_url("portfolyo-detay/$portfolio->url"); ?>" class="btn btn-default btn-sm btn-hvr hvr-sweep-to-right margin-clear">Görüntüle<i class="fa fa-arrow-right pl-10"></i></a>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>
          </div>
        </section>
      <?php } ?>
        <!-- section end -->


      </div>
    </div>
  </div>
</div>