
<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('back/inc/head'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- ANA ŞABLON BAŞLANGIÇ -->
<div class="wrapper">
  <?php $this->load->view('back/inc/header'); ?>
  <?php $this->load->view('back/inc/sidebar'); ?>
  <div class="content-wrapper">
    <!-- BREADCRUMBS BAŞLANGIÇ -->
    <?php $this->load->view('back/anasayfa/list/breadcrumbs'); ?>
    <!-- BREADCRUMBS BİTİŞ -->
    <!-- CONTENT BAŞLANGIÇ -->
    <?php $this->load->view('back/anasayfa/list/content'); ?>
    <!-- CONTENT BİTİŞ -->
  </div>
  <?php $this->load->view('back/inc/footer'); ?>
</div>
<!-- ANA ŞABLON BİTİŞ -->
<?php $this->load->view('back/inc/script'); ?>
</body>
</html>
