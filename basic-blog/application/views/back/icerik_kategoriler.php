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
  <?php $this->load->view("back/icerik_kategori/list/breadcrumbs"); ?>
  <section class="content">
  <div class="row">
  <?php $this->load->view("back/icerik_kategori/list/content"); ?>
  </div>
  </section>
  </div>
  <?php $this->load->view("back/inc/footer"); ?>
</div>
<?php $this->load->view("back/inc/script"); ?>
</body>
</html>
