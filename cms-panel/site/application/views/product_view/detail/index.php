<!DOCTYPE html>
<!--[if IE 9]> <html lang="tr" class="ie9"> <![endif]-->
<!--[if gt IE 9]> <html lang="tr" class="ie"> <![endif]-->
<!--[if !IE]><!-->
<html dir="ltr" lang="tr">
	<!--<![endif]-->
<head>
	<?php $this->load->view("inc/head"); ?>
</head>
<body class="transparent-header front-page page-loader-5">
	<div class="scrollToTop circle"><i class="icon-up-open-big"></i></div>
	<div class="page-wrapper">
		<?php $this->load->view("inc/header"); ?>
		<?php $this->load->view("$view_folder/content"); ?>
  		<?php $this->load->view("inc/footer"); ?>
	</div>
	<?php $this->load->view("inc/include_script"); ?>
</body>
</html>