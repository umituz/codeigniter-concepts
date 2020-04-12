<section class="main-container">

  <div class="container">
    <div class="row">

      <!-- main start -->
      <!-- ================ -->
      <div class="main col-12">

        <!-- page-title start -->
        <!-- ================ -->
        <h1 class="page-title">Referans Listesi</h1>
        <div class="separator-2"></div>
        <!-- page-title end -->
        <p class="lead">Referanslarımızı aşağıdaki listeden görebilirsiniz.</p>
        
        <?php $index = 0; ?>
        <?php foreach($references as $reference){ ?>
         <div class="image-box style-4 light-gray-bg">
          <div class="row grid-space-0">

            <?php if(($index % 2) == 0){ ?>
                <div class="col-lg-6">
              <div class="overlay-container">
                <img width="300" height="300" src="<?php echo base_url("panel/uploads/reference/$reference->img_url"); ?>" alt="<?php echo $reference->title ?>">
                <div class="overlay-to-top">
                  <p class="small margin-clear"><em><?php echo $reference->title ?></em></p>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="body">
                <div class="pv-30 hidden-lg-down"></div>
                <h3><?php echo $reference->title ?></h3>
                <div class="separator-2"></div>
                <p class="margin-clear"><?php echo character_limiter(strip_tags($reference->description),500); ?></p>
                <br>
              </div>
            </div>
          <?php }else { ?>
            

            <div class="col-lg-6">
              <div class="body">
                <div class="pv-30 hidden-lg-down"></div>
                <h3><?php echo $reference->title ?></h3>
                <div class="separator-2"></div>
                <p class="margin-clear"><?php echo character_limiter(strip_tags($reference->description),500); ?></p>
                <br>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="overlay-container">
                <img width="300" height="300" src="<?php echo base_url("panel/uploads/reference/$reference->img_url"); ?>" alt="<?php echo $reference->title ?>">
                <div class="overlay-to-top">
                  <p class="small margin-clear"><em><?php echo $reference->title ?></em></p>
                </div>
              </div>
            </div>
          <?php } ?>

          </div>
        </div>
      <?php $index++; ?>
      <?php } ?>

        <!-- pagination start
        <nav aria-label="Page navigation">
          <ul class="pagination justify-content-center">
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Previous">
                <i aria-hidden="true" class="fa fa-angle-left"></i>
                <span class="sr-only">Previous</span>
              </a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">4</a></li>
            <li class="page-item"><a class="page-link" href="#">5</a></li>
            <li class="page-item">
              <a class="page-link" href="#" aria-label="Next">
                <i aria-hidden="true" class="fa fa-angle-right"></i>
                <span class="sr-only">Next</span>
              </a>
            </li>
          </ul>
        </nav>
        pagination end -->

      </div>
      <!-- main end -->

    </div>
  </div>
</section>