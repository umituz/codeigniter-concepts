<!DOCTYPE html>
<html>
<head>
  <?php $this->load->view('back/inc/head'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php $this->load->view('back/inc/header'); ?>
  <?php $this->load->view('back/inc/sidebar'); ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        SAYFA BULUNAMADI
      </h1>
    </section>
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2><br>
        <div class="error-content">
          <h3><i class="fa fa-warning text-yellow"></i> Bir şeyler yanlış gitti!</h3>
          <p>
            Aradığınız sayfa bulunamadı ya da hiç var olmadı!
          </p>
        </div>
      </div>
    </section>
  </div>
  <?php $this->load->view('back/inc/footer'); ?>
</div>
<!-- ANA ŞABLON BİTİŞ -->
<?php $this->load->view('back/inc/script'); ?>
</body>
</html>
