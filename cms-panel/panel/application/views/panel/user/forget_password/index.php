<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view('panel/inc/head'); ?>
	<?php $this->load->view("panel/{$viewFolder}/{$subViewFolder}/page_style"); ?>
</head>

<body class="simple-page">

   <?php $this->load->view("panel/{$viewFolder}/{$subViewFolder}/content"); ?>
   <?php $this->load->view("panel/{$viewFolder}/{$subViewFolder}/page_script"); ?>

</body>
</html>