<?php $settings = get_settings(); ?>
<footer id="footer" class="clearfix dark">

  <!-- .footer start -->
  <!-- ================ -->
  <div class="footer">
    <div class="container">
      <div class="footer-inner">
        <div class="row">
          <div class="col-lg-6">
            <div class="footer-content">
              <div class="logo-footer"><img width="100" id="logo-footer" src="<?php echo base_url("panel/uploads/setting/$settings->logo"); ?>" alt="<?php echo $settings->company_name; ?>"></div>
              <?php echo character_limiter(strip_tags($settings->about_us),150); ?>

              <ul class="list-inline mb-20">
                <li class="list-inline-item"><i class="text-default fa fa-map-marker pr-1"></i><?php echo $settings->address; ?></li>
                <li class="list-inline-item"><i class="text-default fa fa-phone pl-10 pr-1"></i> <?php echo $settings->phone_1; ?></li>
                <li class="list-inline-item"><a href="mailto:<?php echo $settings->email; ?>" class="link-dark"><i class="text-default fa fa-envelope-o pl-10 pr-1"></i> <?php echo $settings->email; ?></a></li>
              </ul>
              <div class="separator-2"></div>
              <ul class="social-links circle animated-effect-1">
                <?php if($settings->facebook){ ?>
                  <li class="facebook"><a target="_blank" href="<?php echo $settings->facebook; ?>"><i class="fa fa-facebook"></i></a></li>
                <?php } ?>
                <?php if($settings->twitter){ ?>
                  <li class="twitter"><a target="_blank" href="<?php echo $settings->twitter; ?>"><i class="fa fa-twitter"></i></a></li>
                <?php } ?>
                <?php if($settings->instagram){ ?>
                  <li class="instagram"><a target="_blank" href="<?php echo $settings->instagram; ?>"><i class="fa fa-instagram"></i></a>
                  </li>
                <?php } ?>
                <?php if($settings->linkedin){ ?>
                  <li class="linkedin"><a target="_blank" href="<?php echo $settings->linkedin; ?>"><i class="fa fa-linkedin"></i></a>
                  </li>
                <?php } ?>
              </ul>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="footer-content">
              <div id="map-canvas"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- .footer end -->

  <!-- .subfooter start -->
  <!-- ================ -->
  <div class="subfooter">
    <div class="container">
      <div class="subfooter-inner">
        <div class="row">
          <div class="col-md-12">
            <p class="text-center">Tüm Hakları Saklıdır. <?php echo date("Y"); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- .subfooter end -->

</footer>