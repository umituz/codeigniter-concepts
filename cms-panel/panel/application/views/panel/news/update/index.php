<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('panel/inc/head'); ?>
</head>

<body class="menubar-left menubar-unfold menubar-light theme-primary">

  <?php $this->load->view('panel/inc/navbar'); ?>

  <?php $this->load->view('panel/inc/sidebar'); ?>

  <?php $this->load->view('panel/inc/navbar_search'); ?>

  <main id="app-main" class="app-main">
    <div class="wrap">
     <section class="app-content">
      <?php $this->load->view("panel/{$viewFolder}/$subViewFolder/content"); ?>
  <?php $this->load->view('panel/inc/footer'); ?>
  </main>

<?php $this->load->view('panel/inc/include_script'); ?>	
<?php $this->load->view("panel/{$viewFolder}/{$subViewFolder}/page_script"); ?> 
</body>
</html>