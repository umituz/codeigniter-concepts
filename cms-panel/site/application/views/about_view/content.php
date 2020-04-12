<div class="banner dark-translucent-bg" style="background-image:url('<?php echo base_url("panel/uploads/"); ?>about_us/default.jpg'); background-position: 50% 27%;">

  <div class="container">
    <div class="row justify-content-lg-center">
      <div class="col-lg-8 text-center pv-20">
        <h3 class="title logo-font object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100"><?php echo $setting->company_name ?></h3>
        <div class="separator object-non-visible mt-10" data-animation-effect="fadeIn" data-effect-delay="100"></div>
        <p class="text-center object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100">
          <?php echo character_limiter(strip_tags($setting->about_us),200); ?>
        </p>
      </div>
    </div>
  </div>
</div>
<!-- banner end -->

<!-- main-container start -->
<!-- ================ -->
<section class="main-container padding-bottom-clear">

  <div class="container">
    <div class="row">

      <!-- main start -->
      <!-- ================ -->
      <div class="main col-12">
        <h3 class="title">Hakkımızda</h3>
        <div class="separator-2"></div>
        <div class="row">
          <div class="col-lg-12">
            <?php echo $setting->about_us; ?>
          </div>
        </div>
      </div>
      <!-- main end -->

    </div>
  </div>

  <!-- section start -->
  <!-- ================ -->
  <div class="section">
    <div class="container">
      <h3 class="mt-4">Neden Bizi <strong>Seçmelisiniz</strong></h3>
      <div class="separator-2"></div>
      <div class="row">
        <!-- accordion start -->
        <!-- ================ -->
        <div class="col-lg-12">
          <div id="accordion" class="collapse-style-1" role="tablist" aria-multiselectable="true">
            <div class="card">
              <div class="card-header" role="tab" id="headingOne">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    <i class="fa fa-check pr-10"></i>Vizyon
                  </a>
                </h4>
              </div>
              <div id="collapseOne" class="collapse show" role="tabpanel" aria-labelledby="headingOne">
                <div class="card-block">
                  <?php echo strip_tags($setting->vision); ?>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header" role="tab" id="headingTwo">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" class="collapsed" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fa fa-check pr-10"></i>Misyon
                  </a>
                </h4>
              </div>
              <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="card-block">
                  <?php echo strip_tags($setting->mission); ?>
                </div>
              </div>
            </div>
            
          </div>
        </div>
        <!-- accordion end -->
      </div>
      <!-- clients start -->
      <!-- ================ -->
      <div class="separator"></div>
      <div class="clients-container">
        <!--<div class="clients">
          <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="100">
            <a href="#"><img src="<?php echo base_url("assets/"); ?>images/client-1.png" alt=""></a>
          </div>
          <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="200">
            <a href="#"><img src="<?php echo base_url("assets/"); ?>images/client-2.png" alt=""></a>
          </div>
          <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="300">
            <a href="#"><img src="<?php echo base_url("assets/"); ?>images/client-3.png" alt=""></a>
          </div>
          <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="400">
            <a href="#"><img src="<?php echo base_url("assets/"); ?>images/client-4.png" alt=""></a>
          </div>
          <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="500">
            <a href="#"><img src="<?php echo base_url("assets/"); ?>images/client-5.png" alt=""></a>
          </div>
          <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="600">
            <a href="#"><img src="<?php echo base_url("assets/"); ?>images/client-6.png" alt=""></a>
          </div>
          <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="700">
            <a href="#"><img src="<?php echo base_url("assets/"); ?>images/client-7.png" alt=""></a>
          </div>
          <div class="client-image object-non-visible" data-animation-effect="fadeIn" data-effect-delay="800">
            <a href="#"><img src="<?php echo base_url("assets/"); ?>images/client-8.png" alt=""></a>
          </div>-->
        </div>
      </div>
      <!-- clients end -->
    </div>
  </div>
  <!-- section end -->

</section>
<!-- main-container end -->