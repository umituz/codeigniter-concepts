<div class="main col-lg-8">

  <!-- page-title start -->
  <!-- ================ -->
  <h1 class="page-title"><?php echo $news->title; ?></h1>
  <!-- page-title end -->

  <!-- blogpost start -->
  <!-- ================ -->
  <article class="blogpost full">
    <header>
      <div class="post-info mb-4">
        <span class="post-date">
          <i class="icon-calendar"></i>
          <span class="month"><?php echo get_readable_date($news->createdAt); ?></span>
        </span>
        <span class="comments"><i class="icon-eye"></i> <a href="#"><?php echo $news->viewCount; ?> Görüntülenme</a></span>
      </div>
    </header>
    <div class="blogpost-content">

      <?php if($news->news_type == "image"){ ?>
        <div class="overlay-container">
          <img src="<?php echo base_url("panel/uploads/news/$news->img_url"); ?>" alt="">
          <a class="overlay-link popup-img" href="<?php echo base_url("panel/uploads/news/$news->img_url"); ?>"><i class="fa fa-search-plus"></i></a>
        </div>
      <?php } else{?>
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="//www.youtube.com/embed/<?php echo $news->video_url; ?>"></iframe>
        </div>
      <?php } ?>


      <p>
        <?php echo $news->description; ?>
      </p>

    </div>
    <footer class="clearfix">
      <div class="link pull-right">
        <ul class="social-links circle small colored clearfix margin-clear text-right animated-effect-1">
          <li class="twitter"><a target="_blank" href="http://www.twitter.com"><i class="fa fa-twitter"></i></a></li>
          <li class="googleplus"><a target="_blank" href="http://plus.google.com"><i class="fa fa-google-plus"></i></a></li>
          <li class="facebook"><a target="_blank" href="http://www.facebook.com"><i class="fa fa-facebook"></i></a></li>
        </ul>
      </div>
    </footer>
  </article>
  <!-- blogpost end -->

</div>
