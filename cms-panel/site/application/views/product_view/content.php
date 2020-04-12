<section class="main-container">

  <div class="container">
    <h1 class="page-title">Ürünlerimiz</h1>
    <p>Ürünlerimizi detaylı bir şekilde inceleyebilirsiniz. Ürün listemiz...</p>
    <div class="separator-2"></div>
    <div class="row">
         
         <?php foreach($products as $product){ ?>
                <div class="col-sm-4">
                  <div class="image-box style-2 mb-20 bordered light-gray-bg">
                    <div class="overlay-container overlay-visible">
                      
                      <?php  
                      $image = get_product_cover_image($product->id);
                      $image = ($image) ? base_url("panel/uploads/product/$image") :"";
                       ?>
  
                      <img src="<?php echo $image; ?>" alt="<?php echo $product->title; ?>">
                      <div class="overlay-bottom text-left">
                        <p class="lead margin-clear"><?php echo $product->title; ?></p>
                      </div>
                    </div>
                    <div class="body">
                      <p><?php echo character_limiter(strip_tags($product->description),60); ?></p>
                      <a href="<?php echo base_url("urun-detay/$product->url"); ?>" class="btn btn-default btn-sm btn-hvr hvr-sweep-to-right margin-clear">Görüntüle<i class="fa fa-arrow-right pl-10"></i></a>
                    </div>
                  </div>
                </div>
          <?php } ?>
        </div>
  </div>
</section>
