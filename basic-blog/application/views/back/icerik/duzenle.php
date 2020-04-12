<!DOCTYPE html>
<html>
<head>
<?php $this->load->view("back/inc/head"); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php $this->load->view("back/inc/header"); ?>
  <?php $this->load->view("back/inc/sidebar"); ?>
  <div class="content-wrapper">
  <?php $this->load->view("back/icerik/edit/title"); ?>
  <section class="content">
  <div class="row">
  <?php $this->load->view("back/icerik/edit/content"); ?>
  </div>
  </section>
  </div>
  <?php $this->load->view("back/inc/footer"); ?>
</div>
<?php $this->load->view("back/inc/script"); ?>
<?php $this->load->view("back/icerik/edit/page_script"); ?>
</body>
</html>
